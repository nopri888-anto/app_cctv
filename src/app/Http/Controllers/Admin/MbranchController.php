<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mbranch;
use App\Models\Mregion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MbranchController extends Controller
{
    public function __construct()
    {
        $this->Mbranch = new Mbranch();
    }
    public function index()
    {
        //
        $mbranchs = [
            'mbranch' => $this->Mbranch->getDataRegion(),
        ];
        return view('admin.branch.index', $mbranchs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$mregions = Mregion::get();
        $mregions = Mregion::get();
        return view('admin.branch.create', compact('mregions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $rules = [
            'mregionfk' => 'required',
            'branchid' => 'required|unique:mbranches,branchid',
            'branchname' => 'required|unique:mbranches,branchname',
            'branchaddress' => 'required',
            'branchcity' => 'required',
        ];

        $messages = [
            'mregionfk.required' => 'ID Regional must be filled!',
            'branchid.required' => 'ID must be filled!',
            'branchid.unique' => 'ID already available!',
            'branchname.required' => 'Name must be filled!',
            'branchname.unique' => 'Name already available!',
            'branchaddress.required' => 'Address must be filled!',
            'branchcity.required' => 'City must be filled!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $mbranch = new Mbranch;
        $mbranch->mregionfk = $request->mregionfk;
        $mbranch->branchid = $request->branchid;
        $mbranch->branchname = $request->branchname;
        $mbranch->branchaddress = $request->branchaddress;
        $mbranch->branchcity = $request->branchcity;
        $mbranch->updatedby = 'Admin';
        $insertdata = $mbranch->save();

        if ($insertdata) {
            Session::flash('success', 'Branch has been created!');
            return redirect()->route('admin.branch');
        } else {
            Session::flash('errors', ['' => 'Branch Failed to created!']);
            return redirect()->route('admin.branch.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
