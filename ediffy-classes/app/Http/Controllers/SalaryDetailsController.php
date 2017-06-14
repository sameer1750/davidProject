<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Employee;
use App\Models\SalaryDetail;
use Illuminate\Http\Request;
use Session;

class SalaryDetailsController extends Controller
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
            $salarydetails = SalaryDetail::where('employee_id', 'LIKE', "%$keyword%")
				->orWhere('gross_salary', 'LIKE', "%$keyword%")
				->orWhere('applicable_from_date', 'LIKE', "%$keyword%")
				->orWhere('basic_salary', 'LIKE', "%$keyword%")
				->orWhere('hra', 'LIKE', "%$keyword%")
				->orWhere('special_allowance', 'LIKE', "%$keyword%")
				->orWhere('medical_allowance', 'LIKE', "%$keyword%")
				->orWhere('other_allowance', 'LIKE', "%$keyword%")
				->orWhere('conveyance', 'LIKE', "%$keyword%")
				->orWhere('incentive', 'LIKE', "%$keyword%")
				->orWhere('income_tax', 'LIKE', "%$keyword%")
				->orWhere('profession_tax', 'LIKE', "%$keyword%")
				->orWhere('pf_deduction', 'LIKE', "%$keyword%")
				->orWhere('per_month_deduction', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $salarydetails = SalaryDetail::paginate($perPage);
        }

        return view('salary-details.index', compact('salarydetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $employees = Employee::pluck('full_name','id');
        return view('salary-details.create',compact('employees'));
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
        
        SalaryDetail::updateOrCreate(
            ['employee_id' => $requestData['employee_id']],
            $requestData
        );

        Session::flash('flash_message', 'SalaryDetail added!');

        return redirect('salary-details');
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
        $salarydetail = SalaryDetail::findOrFail($id);

        return view('salary-details.show', compact('salarydetail'));
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
        $salarydetail = SalaryDetail::findOrFail($id);

        return view('salary-details.edit', compact('salarydetail'));
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
        
        $salarydetail = SalaryDetail::findOrFail($id);
        $salarydetail->update($requestData);

        Session::flash('flash_message', 'SalaryDetail updated!');

        return redirect('salary-details');
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
        SalaryDetail::destroy($id);

        Session::flash('flash_message', 'SalaryDetail deleted!');

        return redirect('salary-details');
    }
}
