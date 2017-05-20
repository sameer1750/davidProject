<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\EnquirySource;
use Illuminate\Http\Request;
use Session;

class EnquirySourceController extends Controller
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
            $enquirysource = EnquirySource::where('name', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $enquirysource = EnquirySource::paginate($perPage);
        }

        return view('enquiry-source.index', compact('enquirysource'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('enquiry-source.create');
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
        
        EnquirySource::create($requestData);

        Session::flash('flash_message', 'EnquirySource added!');

        return redirect('enquiry-source');
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
        $enquirysource = EnquirySource::findOrFail($id);

        return view('enquiry-source.show', compact('enquirysource'));
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
        $enquirysource = EnquirySource::findOrFail($id);

        return view('enquiry-source.edit', compact('enquirysource'));
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
        
        $enquirysource = EnquirySource::findOrFail($id);
        $enquirysource->update($requestData);

        Session::flash('flash_message', 'EnquirySource updated!');

        return redirect('enquiry-source');
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
        EnquirySource::destroy($id);

        Session::flash('flash_message', 'EnquirySource deleted!');

        return redirect('enquiry-source');
    }
}
