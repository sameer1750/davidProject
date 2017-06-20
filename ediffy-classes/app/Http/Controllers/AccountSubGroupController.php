<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\AccountGroup;
use App\Models\AccountSubGroup;
use Illuminate\Http\Request;
use Session;

class AccountSubGroupController extends Controller
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
            $accountsubgroup = AccountSubGroup::where('name', 'LIKE', "%$keyword%")
				->orWhere('account_group', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $accountsubgroup = AccountSubGroup::paginate($perPage);
        }

        return view('account-sub-group.index', compact('accountsubgroup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $accountGroup = AccountGroup::pluck('name','id');
        return view('account-sub-group.create',compact('accountGroup'));
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
        
        AccountSubGroup::create($requestData);

        Session::flash('flash_message', 'AccountSubGroup added!');

        return redirect('account-sub-group');
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
        $accountsubgroup = AccountSubGroup::findOrFail($id);

        return view('account-sub-group.show', compact('accountsubgroup'));
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
        $accountsubgroup = AccountSubGroup::findOrFail($id);

        return view('account-sub-group.edit', compact('accountsubgroup'));
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
        
        $accountsubgroup = AccountSubGroup::findOrFail($id);
        $accountsubgroup->update($requestData);

        Session::flash('flash_message', 'AccountSubGroup updated!');

        return redirect('account-sub-group');
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
        AccountSubGroup::destroy($id);

        Session::flash('flash_message', 'AccountSubGroup deleted!');

        return redirect('account-sub-group');
    }
}
