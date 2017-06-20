<?php

namespace App\Observers;

use App\Models\ActivityLog;
use App\Models\Admission;
use App\Models\AdmissionCourse;
use App\Models\Course;
use App\Models\Enquiry;
use App\Models\EnquiryCourse;

class AdmissionObserver
{
    public function created(Admission $adm)
    {
        $log ='Student Name : '.$adm->student_name.'. Mobile No: '.$adm->mobile_no;
        $courseDetails = AdmissionCourse::where('admission_id',$adm->id)->pluck('course_id');
        if(count($courseDetails)){
            $courses = Course::whereIn('id',$courseDetails)->get();
            $log .= ' Course : ';
            foreach ($courses as $cs) {
                $log .= ' '.$cs->name;
            }
        }

        ActivityLog::create([
            'event_created_at'=>$adm->created_at,
            'module'=>'ADMISSION',
            'action'=>'CREATE',
            'user_id'=>auth()->user()->id,
            'center_id'=>$adm->center_id,
            'log_text'=>$log
        ]);
    }

    public function deleting(Admission $adm)
    {
        $log ='Student Name : '.$adm->student_name.'. Mobile No: '.$adm->mobile_no;
        $courseDetails = AdmissionCourse::where('admission_id',$adm->id)->pluck('course_id');
        if(count($courseDetails)){
            $courses = Course::whereIn('id',$courseDetails)->get();
            $log .= ' Course : ';
            foreach ($courses as $cs) {
                $log .= ' '.$cs->name;
            }
        }

        ActivityLog::create([
            'event_created_at'=>$adm->created_at,
            'module'=>'ADMISSION',
            'action'=>'DELETE',
            'user_id'=>auth()->user()->id,
            'center_id'=>$adm->center_id,
            'log_text'=>$log
        ]);
    }
}
