<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Area;
use App\Models\Batch;
use App\Models\Caste;
use App\Models\Center;
use App\Models\Course;
use App\Models\Education;
use App\Models\Enquiry;
use App\Models\EnquiryCourse;
use App\Models\EnquirySource;
use Illuminate\Http\Request;
use Session;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $perPage = 25;
        $data = $request->all();
        $enquiry = new Enquiry();
        if(isset($data['student_name']) & !empty($data['student_name'])){
            $enquiry = $enquiry->where('student_name','LIKE','%'.$data['student_name'].'%');
        }
        if(isset($data['job_required']) & !empty($data['job_required'])){
            $enquiry = $enquiry->where('job_required',$data['job_required']);
        }
        if(isset($data['father_name']) & !empty($data['father_name'])){
            $enquiry = $enquiry->where('father_name','LIKE','%'.$data['father_name'].'%');
        }
        if(isset($data['mother_name']) & !empty($data['mother_name'])){
            $enquiry = $enquiry->where('mother_name','LIKE','%'.$data['mother_name'].'%');
        }
        if(isset($data['caste']) & !empty($data['caste'])){
            $enquiry = $enquiry->where('caste','LIKE','%'.$data['caste'].'%');
        }
        if(isset($data['gender']) & !empty($data['gender'])){
            $enquiry = $enquiry->where('gender','LIKE','%'.strtoupper($data['gender']).'%');
        }
        if(isset($data['marital_status']) & !empty($data['marital_status'])){
            $enquiry = $enquiry->where('marital_status','LIKE','%'.strtoupper($data['marital_status']).'%');
        }
        if(isset($data['aadhaar_card_no']) & !empty($data['aadhaar_card_no'])){
            $enquiry = $enquiry->where('aadhaar_card_no','LIKE','%'.$data['aadhaar_card_no'].'%');
        }
        if(isset($data['gender']) & !empty($data['gender'])){
            $enquiry = $enquiry->where('gender','LIKE','%'.$data['gender'].'%');
        }
        if(isset($data['gender']) & !empty($data['gender'])){
            $enquiry = $enquiry->where('gender','LIKE','%'.$data['gender'].'%');
        }
        if(isset($data['gender']) & !empty($data['gender'])){
            $enquiry = $enquiry->where('gender','LIKE','%'.$data['gender'].'%');
        }
        if(isset($data['gender']) & !empty($data['gender'])){
            $enquiry = $enquiry->where('gender','LIKE','%'.$data['gender'].'%');
        }

        $enquiry = $enquiry->paginate($perPage);


        return view('enquiry.index', compact('enquiry'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $caste = Caste::pluck('name','id');
        $area = Area::pluck('name','id');
        $education = Education::pluck('name','id');
        $courseName = Course::pluck('name','id');
        $enquirySource = EnquirySource::pluck('name','id');
        $center = Center::pluck('name','id');
        $batch = Batch::select([\DB::raw("CONCAT_WS('-', start_time, start_am_pm, '', end_time,end_am_pm) as time"),'id'])->pluck('time','id');
        $feesOption = [
            'DOWN PAYMENT'=>'Down Payment',
            'ONE INSTALLMENT'=>'One Installment',
            'TWO INSTALLMENT'=>'Two Installment',
            'THREE INSTALLMENT'=>'Three Installment',
            'FOUR INSTALLMENT'=>'Four Installment',
            'FIVE INSTALLMENT'=>'Five Installment',
            'SIX INSTALLMENT'=>'Six Installment',
            'SEVEN INSTALLMENT'=>'Seven Installment',
            'EIGHT INSTALLMENT'=>'Eight Installment',
            'NINE INSTALLMENT'=>'Nine Installment',
            'TEN INSTALLMENT'=>'Ten Installment',

        ];

        return view('enquiry.create',compact('caste','area','education','courseName','feesOption','enquirySource','batch','center'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'student_name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'birth_date' => 'required',
            'aadhaar_card_no' => 'required|unique:mongodb.enquiries',
            'res_address' => 'required',
            'telephone_r' => 'required_without:telephone_o',
            'telephone_o' => 'required_without:telephone_r',
            'email' => 'required|unique:mongodb.enquiries',
            'selected_course'=>'json',
            'enquiry_on'=>'required|date'
        ]);

        $requestData = $request->all();
        $courseModules = json_decode($requestData['selected_course'],true);
        $enquiry = Enquiry::create($requestData);
        foreach ($courseModules as $cm) {
            EnquiryCourse::create(['enquiry_id'=>$enquiry->id,'course_id'=>$cm['course_id'],'module_id'=>$cm['module_id'],'batch_id'=>$cm['batch_id']]);
        }

        Session::flash('flash_message', 'Enquiry added!');

        if(isset($requestData['adbtn'])){
            return redirect()->route('admission.create');
        }else{
            return redirect('enquiry');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $enquiry = Enquiry::findOrFail($id);

        return view('enquiry.show', compact('enquiry'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $enquiry = Enquiry::findOrFail($id);

        return view('enquiry.edit', compact('enquiry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $enquiry = Enquiry::findOrFail($id);
        $enquiry->update($requestData);

        Session::flash('flash_message', 'Enquiry updated!');

        return redirect('enquiry');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Enquiry::destroy($id);

        Session::flash('flash_message', 'Enquiry deleted!');

        return redirect('enquiry');
    }
}
