<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Admission;
use App\Models\AdmissionCourse;
use App\Models\AdmissionInstallment;
use App\Models\Course;
use App\Models\Enquiry;
use App\Models\TaxType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;

class FeesController extends Controller
{
    public function index(Request $request)
    {

        $fees = AdmissionInstallment::with('admission')
            ->where('due_date','>=',Carbon::now())->orderBy('due_date');


        if($request->paid)
        {
            $fees = $fees->where('paid',($request->paid == 'paid')?1:0);
        }
        $fees = $fees->paginate(25);

        return view('fees.index',compact('fees'));
    }

    public function create()
    {
        $taxType = TaxType::get();
        $admissionIds = AdmissionInstallment::where('paid',0)->pluck('admission_id')->unique();
        $admission = Admission::whereIn('_id',$admissionIds)->orderBy('created_at','DESC')->get();
        return view('fees.create',compact('admission','taxType'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if($data['installment_amount'] > $data['received_amount']){
            $remainingAmount = (float)$data['installment_amount'] - (float)$data['received_amount'];
            $nai = AdmissionInstallment::where('admission_id',$data['admission_id'])->where('paid',0)
                ->orderBy('due_date','DESC')->first();
            $rcreate = new AdmissionInstallment();
            $rcreate->admission_id = $data['admission_id'];
            $rcreate->amount = $remainingAmount;
            $rcreate->due_date = Carbon::parse($nai->due_date)->addMonth(1);
            $rcreate->paid = 0;
            $rcreate->save();
        }

        $ai = AdmissionInstallment::where('admission_id',$data['admission_id'])->where('paid',0)
            ->orderBy('due_date')->first();
        $updatedData = [
            'paid'=>1,
            'received_amount'=>$data['received_amount'],
            'account'=>$data['account'],
            'fees_recieved_by'=>auth()->user()->id,
            'cheque_date'=>$data['cheque_date'],
            'cheque_no'=>$data['cheque_no'],
            'bank_name'=>$data['bank_name'],
            'mode_of_payment'=>$data['mode_of_payment'],
            'tax_amount'=>$data['tax_amount'],
            'receipt_date'=>$data['receipt_date']
        ];
        $ai->update($updatedData);
//        $ai->paid = 1;
//        $ai->received_amount = $data['received_amount'];
//        $ai->account = $data['account'];
//        $ai->fees_recieved_by = auth()->user()->id;
//        $ai->cheque_date = $data['cheque_date'];
//        $ai->cheque_no = $data['cheque_no'];
//        $ai->bank_name = $data['bank_name'];
//        $ai->mode_of_payment = ;
//        $ai->tax_amount = $data['tax_amount'];
//        $ai->receipt_date = $data['receipt_date'];
//        $ai->save();

        Session::flash('flash_message', 'Fees Received Successfully!');

        return redirect()->back();
    }

    public function getDetails(Request $request)
    {
        $id = $request->val;
        $courseDetails = null;
        $admission = Admission::with(['fees'=>function($q){
            $q->where('paid',0)->orderBy('due_date','ASC')->first();
        }])->find($id);

        $courseId = AdmissionCourse::where('admission_id',$id)->where('course_completion','>=',Carbon::now())->pluck('course_id');
        $courseDetails = Course::whereIn('id',$courseId)->get();
        $totalFees = 0;
        foreach ($courseDetails as $cd) {
            $totalFees += (int)$cd->default_fees;
        }
        $latestInstallment = AdmissionInstallment::where('admission_id',$id)->where('paid',0)->orderBy('due_date')->first();
        $feesBalance = AdmissionInstallment::where('admission_id',$id)->where('paid',0)->get();
        $rbalance = 0;
        if(count($feesBalance)){
            foreach ($feesBalance as $key=>$value) {
                if($key != 0){
                    $rbalance += $value->amount;
                }
            }
        }

        $lastInstallment = AdmissionInstallment::where('admission_id',$id)->where('paid',1)->orderBy('due_date','DESC')->first();
        return ['ls'=>$lastInstallment,'adms'=>$admission,'crs'=>$courseDetails,'tf'=>$totalFees,'rb'=>$rbalance,'latestInstallment'=>$latestInstallment];
    }
}
