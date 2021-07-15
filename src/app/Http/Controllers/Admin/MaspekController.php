<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Maspek;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class MaspekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $maspeks = Maspek::orderBy('aspectname', 'DESC')->get();
        return view('admin.aspek.index', compact('maspeks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $maspeks = Maspek::orderBy('aspectname', 'DESC')->get();
        return view('admin.aspek.create', compact('maspeks'));
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
            'aspectname' => 'required|min:3|max:50|unique:maspeks,aspectname',
        ];

        $messages = [
            'aspectname.required' => 'Aspek name must be filled!',
            'aspectname.min' => 'Aspek name must be filled min 3!',
            'aspectname.max' => 'Aspek name must be filled max 50!',
            'aspectname.unique' => 'Aspek name has been register!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $maspek = new Maspek();
        $maspek->aspectname = $request->aspectname;
        $maspek->updateby = 'Admin';
        $insertdata = $maspek->save();

        if ($maspek) {
            Session::flash('success', 'Aspek has been created!');
            return redirect()->route('admin.aspek');
        } else {
            Session::flash('errors', ['' => 'Aspek Failed to created!']);
            return redirect()->route('admin.aspek.create');
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
