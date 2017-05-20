<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\CourseModule;
use Illuminate\Http\Request;
use Session;

class CourseModuleController extends Controller
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
            $coursemodule = CourseModule::where('name', 'LIKE', "%$keyword%")
				->orWhere('duration', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $coursemodule = CourseModule::paginate($perPage);
        }

        return view('course-module.index', compact('coursemodule'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('course-module.create');
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
            'duration' => 'required|integer',
        ]);
        $requestData = $request->all();
        
        CourseModule::create($requestData);

        Session::flash('flash_message', 'CourseModule added!');

        return redirect('course-module');
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
        $coursemodule = CourseModule::findOrFail($id);

        return view('course-module.show', compact('coursemodule'));
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
        $coursemodule = CourseModule::findOrFail($id);

        return view('course-module.edit', compact('coursemodule'));
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
        
        $coursemodule = CourseModule::findOrFail($id);
        $coursemodule->update($requestData);

        Session::flash('flash_message', 'CourseModule updated!');

        return redirect('course-module');
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
        CourseModule::destroy($id);

        Session::flash('flash_message', 'CourseModule deleted!');

        return redirect('course-module');
    }
}
