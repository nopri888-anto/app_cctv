<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mregion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MregionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mregions = Mregion::orderBy('regionname', 'DESC')->get();
        return view('admin.regional.index', compact('mregions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $mregions = Mregion::get();
        return view('admin.regional.create', compact('mregions'));
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
            'regionid' => 'required|unique:mregions,regionid',
            'regionname' => 'required|unique:mregions,regionname',
        ];

        $messages = [
            'regionid.required' => 'ID Regional must be filled!',
            'regionid.unique' => 'ID Regional already available!',
            'regionname.required' => 'Name Regional must be filled!',
            'regionname.unique' => 'Name Regional already available!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $mregion = new Mregion;
        $mregion->regionid = $request->regionid;
        $mregion->regionname = $request->regionname;
        $mregion->updatedby = 'Admin';
        $insertdata = $mregion->save();

        if ($insertdata) {
            //Session::flash('success', 'Regional has been created!');
            return redirect()->route('admin.regional')->with('success', 'Regional has been created!');
        } else {
            Session::flash('errors', ['' => 'Regional Failed to created!']);
            return redirect()->route('admin.regional.create');
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
