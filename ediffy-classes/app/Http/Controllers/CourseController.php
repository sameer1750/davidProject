<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Center;
use App\Models\Course;
use App\Models\CourseModule;
use Illuminate\Http\Request;
use Session;

class CourseController extends Controller
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
            $course = Course::where('name', 'LIKE', "%$keyword%")
				->orWhere('short_name', 'LIKE', "%$keyword%")
				->orWhere('Duration', 'LIKE', "%$keyword%")
				->orWhere('start_date', 'LIKE', "%$keyword%")
				->orWhere('govt_course', 'LIKE', "%$keyword%")
				->orWhere('default_fees', 'LIKE', "%$keyword%")
				->orWhere('default_royalty_fees', 'LIKE', "%$keyword%")
				->orWhere('name', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $course = Course::paginate($perPage);
        }

        return view('course.index', compact('course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $modules = CourseModule::select(['name','id'])->get();
        $centers = Center::select(['name','id'])->get();
        return view('course.create',compact('modules','centers'));
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
            'name' => 'required',
            'short_name' => 'required',
            'Duration' => 'required|integer',
            'start_date' => 'required',
            'govt_course' => 'required',
            'default_fees' => 'required',
            'module_ids' => 'required|array',
            'center_ids' => 'required|array'
        ]);

        $requestData = $request->all();
        $course = Course::create($requestData);
        $course->modules()->sync($requestData['module_ids']);
        $course->center()->sync($requestData['center_ids']);

        Session::flash('flash_message', 'Course added!');

        return redirect('course');
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
        $course = Course::findOrFail($id);

        return view('course.show', compact('course'));
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
        $course = Course::findOrFail($id);

        return view('course.edit', compact('course'));
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
        
        $course = Course::findOrFail($id);
        $course->update($requestData);

        Session::flash('flash_message', 'Course updated!');

        return redirect('course');
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
        Course::destroy($id);

        Session::flash('flash_message', 'Course deleted!');

        return redirect('course');
    }

    public function getSingleCourse(Request $request){
        $id = $request->id;
        return Course::with(['modules'])->find($id);
    }
}
