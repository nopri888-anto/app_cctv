<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mscore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MscoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mscores = Mscore::orderBy('bottomscore', 'DESC')->get();
        return view('admin.bobot.index', compact('mscores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $mscores = Mscore::orderBy('yudisium', 'DESC')->get();
        return view('admin.bobot.create', compact('mscores'));
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
            'bottomscore' => 'required|integer|min:0',
            'topscore' => 'required|integer|min:1',
            'yudisium' => 'required|string',
        ];

        $messages = [
            'bottomscore.required' => 'Nilai awal must be filled!',
            'bottomscore.integer' => 'Nilai must be number!',
            'bottomscore.min' => 'Nilai awal must be filled min 1!',
            'topscore.required' => 'Batas Nilai must be filled!',
            'topscore.integer' => 'Batas Nilai must be number!',
            'topscore.min' => 'Batas Nilai must be filled min 1!',
            'yudisium.required' => 'Yudisium must be filled',
            'yudisium.string' => 'Yudisium must be Alpabhet',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $mscore = new Mscore;
        $mscore->bottomscore = $request->bottomscore;
        $mscore->topscore = $request->topscore;
        $mscore->yudisium = $request->yudisium;
        $mscore->updatedby = 'Admin';
        $insertdata = $mscore->save();

        if ($insertdata) {
            //Session::flash('success', 'Score has been created!');
            return redirect()->route('admin.bobot')->with('success', 'Bobot has been created!');;
        } else {
            Session::flash('errors', ['' => 'Score Failed to created!']);
            return redirect()->route('admin.bobot.create');
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
