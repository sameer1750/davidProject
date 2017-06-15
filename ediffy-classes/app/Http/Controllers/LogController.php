<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Admission;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use Session;
use App\Models\ActivityLog;
use App\Models\Center;
use Carbon\Carbon;

class LogController extends Controller
{
    public function index(Request $req)
    {
        $data = $req->all();
        $logs = [];
        if($req->center_id OR $req->date){
            $logs = new ActivityLog();
            if(isset($data['center_id']) & !empty($data['center_id'])){
              $logs = $logs->where('center_id',$data['center_id']);
            }

            if(isset($data['date']) && !empty($data['date'])){
              $dates = explode(' - ',$data['date']);
              $startDate = Carbon::parse($dates[0]);
              $endDate = Carbon::parse($dates[1]);
              $logs = $logs->where('event_created_at','>=',$startDate)
              ->where('event_created_at','<=',$endDate);
            }
            $logs = $logs->with('user')->get();
        }

        $centers =  Center::pluck('name','id');
        return view('logs.index',compact('centers','logs'));
    }
}
