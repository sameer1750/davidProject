<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserData;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function saveData(Request $request)
    {
      $data = $request->all();
      $data['user_id'] = $request->user()->id;

      $data['street1'] = (isset($data['address']['street'][0]))?$data['address']['street'][0]:null;
      $data['street2'] = (isset($data['address']['street'][1]))?$data['address']['street'][1]:null;
      $data['street3'] = (isset($data['address']['street'][2]))?$data['address']['street'][2]:null;
      $data['city'] = (isset($data['address']['city']))?$data['address']['city']:null;
      $data['state'] = (isset($data['address']['state']))?$data['address']['state']:null;
      $data['zip'] = (isset($data['address']['zip']))?$data['address']['zip']:null;
      UserData::updateOrCreate(
        ['user_id' => $request->user()->id],
        $data
      );
    }

    public function fetchData(Request $request)
    {
        $user_id = $request->user_id;
        $data = UserData::where('user_id',$user_id)->first();
        if($data){
            $data = $data->toArray();
            $data['address'] = [];
            $data['address']['city'] = $data['city'];
            $data['address']['state'] = $data['state'];
            $data['address']['zip'] = $data['zip'];
            $data['address']['street'] = [];
            array_push($data['address']['street'],$data['street1']);
            array_push($data['address']['street'],$data['street2']);
            if($data['street3']){
              array_push($data['address']['street'],$data['street3']);
            }
            unset($data['street1']);
            unset($data['street2']);
            unset($data['street3']);
            unset($data['city']);
            unset($data['state']);
            unset($data['zip']);
            unset($data['user_id']);
            return $data;
        }else{
          return \File::get(public_path().'/data/customer-profile-data.json');
        }
    }
}
