<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\TaxType;
use Illuminate\Http\Request;
use Session;

class TaxTypeController extends Controller
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
            $taxtype = TaxType::where('name', 'LIKE', "%$keyword%")
				->orWhere('rate_percent', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $taxtype = TaxType::paginate($perPage);
        }

        return view('tax-type.index', compact('taxtype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('tax-type.create');
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
        
        TaxType::create($requestData);

        Session::flash('flash_message', 'TaxType added!');

        return redirect('tax-type');
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
        $taxtype = TaxType::findOrFail($id);

        return view('tax-type.show', compact('taxtype'));
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
        $taxtype = TaxType::findOrFail($id);

        return view('tax-type.edit', compact('taxtype'));
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
        
        $taxtype = TaxType::findOrFail($id);
        $taxtype->update($requestData);

        Session::flash('flash_message', 'TaxType updated!');

        return redirect('tax-type');
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
        TaxType::destroy($id);

        Session::flash('flash_message', 'TaxType deleted!');

        return redirect('tax-type');
    }
}
