<?php

namespace App\Observers;

use App\Models\ActivityLog;
use App\Models\Course;
use App\Models\Enquiry;
use App\Models\EnquiryCourse;
use App\Models\AdmissionInstallment;
use App\Models\Admission;

class FeesObserver
{
    public function created(AdmissionInstallment $ae)
    {
        $admission =  Admission::find($ae->admission_id);
        $log ='Student Name : '.$admission->student_name.'. Mobile No: '.$admission->mobile_no.' Amount Paid : '.$ae->received_amount;

        ActivityLog::create([
            'event_created_at'=>$enquiry->created_at,
            'module'=>'FEES',
            'action'=>'CREATE',
            'user_id'=>$ae->fees_recieved_by,
            'center_id'=>$admission->center_id,
            'log_text'=>$log
        ]);
    }
}
