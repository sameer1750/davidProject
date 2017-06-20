<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\AccountGroup;
use Illuminate\Http\Request;
use Session;

class AccountGroupController extends Controller
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
            $accountgroup = AccountGroup::where('name', 'LIKE', "%$keyword%")
				->orWhere('nature', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $accountgroup = AccountGroup::paginate($perPage);
        }

        return view('account-group.index', compact('accountgroup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('account-group.create');
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
        
        AccountGroup::create($requestData);

        Session::flash('flash_message', 'AccountGroup added!');

        return redirect('account-group');
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
        $accountgroup = AccountGroup::findOrFail($id);

        return view('account-group.show', compact('accountgroup'));
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
        $accountgroup = AccountGroup::findOrFail($id);

        return view('account-group.edit', compact('accountgroup'));
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
        
        $accountgroup = AccountGroup::findOrFail($id);
        $accountgroup->update($requestData);

        Session::flash('flash_message', 'AccountGroup updated!');

        return redirect('account-group');
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
        AccountGroup::destroy($id);

        Session::flash('flash_message', 'AccountGroup deleted!');

        return redirect('account-group');
    }
}
