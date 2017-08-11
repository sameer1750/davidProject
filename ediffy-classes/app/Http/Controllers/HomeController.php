<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Admission;
use App\Models\Batch;
use App\Models\Course;
use App\Models\CourseModule;
use App\Models\CourseToModule;
use App\Models\Enquiry;
use App\Models\EnquiryCourse;
use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
    public function getStudentDetails(Request $request){
        $keyWord = $request->q;
        $inquiryIds = Admission::pluck('inquiry_id');
        $group = Enquiry::where(function($q) use($keyWord){
            $q->where('student_name','LIKE','%'.$keyWord.'%')
                ->orWhere('aadhaar_card_no','Like','%'.$keyWord.'%');
        })->whereNotIn('_id',$inquiryIds)->select(['_id','student_name','aadhaar_card_no'])->get()->toArray();

        foreach ($group as $key=>$value) {
            $group[$key]['id'] = $group[$key]['_id'];

            if(isset($group[$key]['aadhaar_card_no'])){
                $concatString = $group[$key]['student_name'].' - '.$group[$key]['aadhaar_card_no'];
            }else{
                $concatString = $group[$key]['student_name'];
            }

            $group[$key]['student_name'] = $concatString;
            unset($group[$key]['_id']);
            unset($group[$key]['aadhaar_card_no']);
        }
        return json_encode(['items'=>$group]);
    }

    public function getStudent(Request $request){
        $id = $request->val;
        $cdetails = [];
        $courseIds = EnquiryCourse::where('enquiry_id',$id)->get();
        foreach ($courseIds as $ci) {
            $course = Course::find($ci->course_id);
            $batch = Batch::find($ci->batch_id);
            $module = CourseModule::find($ci->module_id);
            $temp = [
                'course'=>$course,
                'batch'=>$batch,
                'module'=>$module
            ];
            array_push($cdetails,$temp);
        }

        $enq = Enquiry::find($id)->toArray();
        $enq['course_details'] = $cdetails;
        return $enq;
    }

    public function dashboard(){
        $totalAdm = Admission::count();
        $totalEnq = Enquiry::count();
        return view('dashboard.index',compact('totalAdm','totalEnq'));
    }
}
