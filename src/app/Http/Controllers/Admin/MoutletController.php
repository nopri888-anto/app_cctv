<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mbranch;
use App\Models\Moutlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MoutletController extends Controller
{
    public function __construct()
    {
        $this->Moutlet = new Moutlet();
    }

    public function index()
    {
        //
        $moutlets = [
            'moutlet' => $this->Moutlet->getDataBranch(),
        ];
        return view('admin.outlet.index', $moutlets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $mbranchs = Mbranch::get();
        return view('admin.outlet.create', compact('mbranchs'));
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
            'mbranch' => 'required',
            'outlatename' => 'required|unique:moutlets,outlatename',
        ];

        $messages = [
            'mbranch.required' => 'ID Branch must be filled!',
            'outlatename.required' => 'Name must be filled!',
            'outlatename.unique' => 'Name already available!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $moutlet = new Moutlet;
        $moutlet->mbranchfk = $request->mbranch;
        $moutlet->outlatename = $request->outlatename;
        $moutlet->updated = 'Admin';
        $insertdata = $moutlet->save();

        if ($insertdata) {
            // Session::flash('success', 'Branch has been created!');
            return redirect()->route('admin.outlet')->with('success', 'Outlate has been created!');
        } else {
            Session::flash('errors', ['' => 'Branch Failed to created!']);
            return redirect()->route('admin.branch.outlet');
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
