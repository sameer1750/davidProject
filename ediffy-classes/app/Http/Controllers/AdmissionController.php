<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Admission;
use App\Models\AdmissionCourse;
use App\Models\Area;
use App\Models\Batch;
use App\Models\Center;
use App\Models\Course;
use App\Models\Education;
use App\Models\Enquiry;
use App\Models\EnquirySource;
use App\Models\User;
use Illuminate\Http\Request;
use Session;

class AdmissionController extends Controller
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

        $admission = new Admission();
        $course = Course::pluck('name','id');
        $enquirySource = EnquirySource::pluck('name','id');
        if(isset($data['student_name']) & !empty($data['student_name'])){
            $admission = $admission->where('student_name','LIKE','%'.$data['student_name'].'%');
        }
        if(isset($data['admission_course']) & !empty($data['admission_course'])){
            $courseIds = AdmissionCourse::where('course_id',$data['admission_course'])->pluck('admission_id');
            $admission = $admission->whereIn('_id',$courseIds);
        }
        if(isset($data['job_required']) & !empty($data['job_required'])){
            $admission = $admission->where('job_required',$data['job_required']);
        }
        if(isset($data['father_name']) & !empty($data['father_name'])){
            $admission = $admission->where('father_name','LIKE','%'.$data['father_name'].'%');
        }
        if(isset($data['mother_name']) & !empty($data['mother_name'])){
            $admission = $admission->where('mother_name','LIKE','%'.$data['mother_name'].'%');
        }
        if(isset($data['caste']) & !empty($data['caste'])){
            $admission = $admission->where('caste','LIKE','%'.$data['caste'].'%');
        }
        if(isset($data['gender']) & !empty($data['gender'])){
            $admission = $admission->where('gender','LIKE','%'.strtoupper($data['gender']).'%');
        }
        if(isset($data['marital_status']) & !empty($data['marital_status'])){
            $admission = $admission->where('marital_status','LIKE','%'.strtoupper($data['marital_status']).'%');
        }
        if(isset($data['aadhaar_card_no']) & !empty($data['aadhaar_card_no'])){
            $admission = $admission->where('aadhaar_card_no','LIKE','%'.$data['aadhaar_card_no'].'%');
        }
        if(isset($data['gender']) & !empty($data['gender'])){
            $admission = $admission->where('gender','LIKE','%'.$data['gender'].'%');
        }
        if(isset($data['gender']) & !empty($data['gender'])){
            $admission = $admission->where('gender','LIKE','%'.$data['gender'].'%');
        }
        if(isset($data['gender']) & !empty($data['gender'])){
            $admission = $admission->where('gender','LIKE','%'.$data['gender'].'%');
        }
        if(isset($data['gender']) & !empty($data['gender'])){
            $admission = $admission->where('gender','LIKE','%'.$data['gender'].'%');
        }

        $admission = $admission->paginate($perPage);

        return view('admission.index', compact('admission','course','enquirySource'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $courseName = Course::pluck('name','id');
        $source = EnquirySource::pluck('name','id');
        $education = Education::pluck('name','id');
        $center = Center::pluck('name','id');
        $area = Area::pluck('name','id');
        $admissionIds = Admission::pluck('inquiry_id');
        $enquiry = Enquiry::whereNotIn('_id',$admissionIds)->orderBy('created_at','DESC')->limit(50)->get();

        $enqTaken = User::select([\DB::raw('CONCAT(first_name," ",last_name) as name'),'id'])->pluck('name','id');
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
        $batch = Batch::select([\DB::raw("CONCAT_WS('-', start_time, start_am_pm, '', end_time,end_am_pm) as time"),'id'])->pluck('time','id');

        return view('admission.create',compact('courseName','center','feesOption','batch','source','education','enqTaken','area','enquiry'));
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
            'image' => 'required|image',
            'father_name' => 'required',
            'father_occupation' => 'required',
            'aadhaar_card_no' => 'required|unique:mongodb.admissions',
            'email' => 'required|unique:mongodb.admissions',
            'mobile_no' => 'required',
            'course_name' => 'required',
            'selected_course' => 'required'
        ]);

        $requestData = $request->all();
        $center = Center::find($requestData['center_id']);

        $requestDataData['inquiry_id'] = $requestData['student_name'];
        $password =  str_random(8);
        $subPass = explode('@',$requestData['email'])[0];
        $check = Admission::where('email','Like',$subPass.'@'.'%')->count();
        $requestData['username'] = 'n'.$center->code.$subPass.$check;
        $requestData['password'] = bcrypt($password);

        if ($request->hasFile('image')) {
            $data = \Cloudinary\Uploader::upload($requestData['image']);
            $requestData['image'] = $data['secure_url'];
        }
        $courseModules = json_decode($requestData['selected_course'],true);

        unset($requestData['selected_course']);
        unset($requestData['course_name']);
        unset($requestData['course_module']);

        $admission = Admission::create($requestData);
        foreach ($courseModules as $cm) {
            AdmissionCourse::create(['admission_id'=>$admission->id,'course_id'=>$cm['course_id'],'module_id'=>$cm['module_id'],'batch_id'=>$cm['batch_id']]);
        }
        Session::flash('flash_message', 'Admission added!');

        return redirect('admission');
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
        $admission = Admission::findOrFail($id);

        return view('admission.show', compact('admission'));
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
        $admission = Admission::findOrFail($id);

        return view('admission.edit', compact('admission'));
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
        
        $admission = Admission::findOrFail($id);
        $admission->update($requestData);

        Session::flash('flash_message', 'Admission updated!');

        return redirect('admission');
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
        Admission::destroy($id);

        Session::flash('flash_message', 'Admission deleted!');

        return redirect('admission');
    }

}
