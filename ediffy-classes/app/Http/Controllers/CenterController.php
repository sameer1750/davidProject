<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Center;
use Illuminate\Http\Request;
use Session;

class CenterController extends Controller
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
            $center = Center::where('name', 'LIKE', "%$keyword%")
				->orWhere('code', 'LIKE', "%$keyword%")
				->orWhere('logo', 'LIKE', "%$keyword%")
				->orWhere('address', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $center = Center::paginate($perPage);
        }

        return view('center.index', compact('center'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('center.create');
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
        
        if ($request->hasFile('logo')) {
                $uploadPath = public_path('uploads');
                $extension = $request->logo->getClientOriginalExtension();
                $fileName = rand(11111, 99999) . '.' . $extension;

                $request->logo->move($uploadPath, $fileName);
                $requestData['logo'] = $fileName;
        }
        Center::create($requestData);

        Session::flash('flash_message', 'Center added!');

        return redirect('center');
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
        $center = Center::findOrFail($id);

        return view('center.show', compact('center'));
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
        $center = Center::findOrFail($id);

        return view('center.edit', compact('center'));
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
        

        if ($request->hasFile('logo')) {
            foreach($request['logo'] as $file){
                $uploadPath = public_path('/uploads/logo');

                $extension = $file->getClientOriginalExtension();
                $fileName = rand(11111, 99999) . '.' . $extension;

                $file->move($uploadPath, $fileName);
                $requestData['logo'] = $fileName;
            }
        }

        $center = Center::findOrFail($id);
        $center->update($requestData);

        Session::flash('flash_message', 'Center updated!');

        return redirect('center');
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
        Center::destroy($id);

        Session::flash('flash_message', 'Center deleted!');

        return redirect('center');
    }
}
