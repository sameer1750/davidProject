<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Admission;
use App\Models\Batch;
use App\Models\Course;
use Illuminate\Http\Request;
use Session;

class BatchController extends Controller
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
            $batch = Batch::where('start_time', 'LIKE', "%$keyword%")
				->orWhere('end_time', 'LIKE', "%$keyword%")
				->orWhere('max_students', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $batch = Batch::paginate($perPage);
        }

        return view('batch.index', compact('batch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('batch.create');
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
        Batch::create($requestData);

        Session::flash('flash_message', 'Batch added!');

        return redirect('batch');
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
        $batch = Batch::findOrFail($id);

        return view('batch.show', compact('batch'));
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
        $batch = Batch::findOrFail($id);

        return view('batch.edit', compact('batch'));
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
        
        $batch = Batch::findOrFail($id);
        $batch->update($requestData);

        Session::flash('flash_message', 'Batch updated!');

        return redirect('batch');
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
        Batch::destroy($id);

        Session::flash('flash_message', 'Batch deleted!');

        return redirect('batch');
    }

    public function batchDetails(Request $request){
        $data = $request->all();
        $totalEnrolled = Admission::where('id',$data['course_id'])->count();
        $batch = Batch::find($data['batch_id'])->toArray();
        $batch['available'] = (int)$batch['max_students'] - $totalEnrolled;
        return $batch;
    }
}
