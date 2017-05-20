<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Admission;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
    public function getStudentDetails(Request $request){
        $keyWord = $request->q;
        $group = Enquiry::where('student_name','LIKE','%'.$keyWord.'%')->select(['_id','student_name'])->get()->toArray();
        foreach ($group as $key=>$value) {
            $group[$key]['id'] = $group[$key]['_id'];
            unset($group[$key]['_id']);
        }

        return json_encode(['items'=>$group]);
    }

    public function getStudent(Request $request){
        $id = $request->val;
        return Enquiry::find($id);
    }

    public function dashboard(){
        $totalAdm = Admission::count();
        $totalEnq = Enquiry::count();
        return view('dashboard.index',compact('totalAdm','totalEnq'));
    }
}
