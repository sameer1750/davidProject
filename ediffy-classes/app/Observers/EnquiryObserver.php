<?php

namespace App\Observers;

use App\Models\ActivityLog;
use App\Models\Course;
use App\Models\Enquiry;
use App\Models\EnquiryCourse;

class EnquiryObserver
{
    public function created(Enquiry $enquiry)
    {
        $log ='Student Name : '.$enquiry->student_name.'. Mobile No: '.$enquiry->mobile_no;
        $courseDetails = EnquiryCourse::where('enquiry_id',$enquiry->id)->pluck('course_id');
        if(count($courseDetails)){
            $courses = Course::whereIn('id',$courseDetails)->get();
            $log .= ' Course : ';
            foreach ($courses as $cs) {
                $log .= ' '.$cs->name;
            }
        }

        ActivityLog::create([
            'event_created_at'=>$enquiry->created_at,
            'module'=>'ENQUIRY',
            'action'=>'CREATE',
            'user_id'=>auth()->user()->id,
            'center_id'=>$enquiry->center_id,
            'log_text'=>$log
        ]);
    }

    public function deleting(Enquiry $enquiry)
    {
        $log ='Student Name : '.$enquiry->student_name.'. Mobile No: '.$enquiry->mobile_no;
        $courseDetails = EnquiryCourse::where('enquiry_id',$enquiry->id)->pluck('course_id');
        if(count($courseDetails)){
            $courses = Course::whereIn('id',$courseDetails)->get();
            $log .= ' Course : ';
            foreach ($courses as $cs) {
                $log .= ' '.$cs->name;
            }
        }

        ActivityLog::create([
            'event_created_at'=>$enquiry->created_at,
            'module'=>'ENQUIRY',
            'action'=>'DELETE',
            'user_id'=>auth()->user()->id,
            'center_id'=>$enquiry->center_id,
            'log_text'=>$log
        ]);
    }
}
