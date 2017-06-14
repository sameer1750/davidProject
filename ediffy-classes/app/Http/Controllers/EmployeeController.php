<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Center;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\SalaryDetail;
use Illuminate\Http\Request;
use Session;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $employee = Employee::where('center', 'LIKE', "%$keyword%")
				->orWhere('emp_id', 'LIKE', "%$keyword%")
				->orWhere('full_name', 'LIKE', "%$keyword%")
				->orWhere('dob', 'LIKE', "%$keyword%")
				->orWhere('address', 'LIKE', "%$keyword%")
				->orWhere('mobile_no', 'LIKE', "%$keyword%")
				->orWhere('email', 'LIKE', "%$keyword%")
				->orWhere('designation', 'LIKE', "%$keyword%")
				->orWhere('joining_date', 'LIKE', "%$keyword%")
				->orWhere('image', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $employee = Employee::paginate($perPage);
        }

        return view('employee.index', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $centers = Center::pluck('name','id');
        $designation = Designation::pluck('name','id');
        return view('employee.create',compact('centers','designation'));
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
        
        $requestData = $request->all();

        if ($request->hasFile('image')) {
            $data = \Cloudinary\Uploader::upload($requestData['image']);
            $requestData['image'] = $data['secure_url'];
        }

        Employee::create($requestData);

        Session::flash('flash_message', 'Employee added!');

        return redirect('employee');
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
        $employee = Employee::findOrFail($id);

        return view('employee.show', compact('employee'));
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
        $employee = Employee::findOrFail($id);

        return view('employee.edit', compact('employee'));
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
        

        if ($request->hasFile('image')) {
            foreach($request['image'] as $file){
                $uploadPath = public_path('/uploads/image');

                $extension = $file->getClientOriginalExtension();
                $fileName = rand(11111, 99999) . '.' . $extension;

                $file->move($uploadPath, $fileName);
                $requestData['image'] = $fileName;
            }
        }

        $employee = Employee::findOrFail($id);
        $employee->update($requestData);

        Session::flash('flash_message', 'Employee updated!');

        return redirect('employee');
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
        Employee::destroy($id);

        Session::flash('flash_message', 'Employee deleted!');

        return redirect('employee');
    }

    public function salaryDetail(Request $request)
    {
        $id = $request->id;
        return SalaryDetail::where('employee_id',$id)->first();
    }
}
