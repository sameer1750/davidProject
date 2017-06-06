<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Admission;
use App\Models\AdmissionInstallment;
use App\Models\Enquiry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;

class FeesController extends Controller
{
    public function index()
    {
        $fees = AdmissionInstallment::with('admission')
            ->where('due_date','>=',Carbon::now())->orderBy('due_date')->paginate(25);
        return view('fees.index',compact('fees'));
    }

    public function create()
    {
        $admission = Admission::orderBy('created_at','DESC')->get();
        return view('fees.create',compact('admission'));
    }

    public function getDetails(Request $request)
    {
        $id = $request->val;
        return Admission::find($id);

    }
}
