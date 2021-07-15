<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mscorecard;
use App\Models\Maspek;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MscorecardController extends Controller
{
    public function __construct()
    {
        $this->Mscorecard = new Mscorecard();
    }

    public function index()
    {
        //
        $mscoredcards = [
            'mscoredcard' => $this->Mscorecard->getDataAspek(),
        ];
        return view('admin.scorecard.index', $mscoredcards);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $maspeks = Maspek::orderBy('id', 'DESC')->get();
        return view('admin.scorecard.create', compact('maspeks'));
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
            'scorecarname' => 'required|max:40',
            'description' => 'required|max:200',
            'status' => 'required',
            'maspectfk' => 'required',
        ];

        $messages = [
            'scorecarname.required' => 'Scorecard name must be filled!',
            'scorecarname.max' => 'Scorecardname max filled!',
            'description.required' => 'Description must be filled!',
            'description.max' => 'Description max filled!',
            'status.required' => 'Status must be filled!',
            'maspectfk.required' => 'Status must be filled!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $mscorecard = new Mscorecard;
        $mscorecard->scorecarname = $request->scorecarname;
        $mscorecard->description = $request->description;
        $mscorecard->status = $request->status;
        $mscorecard->updatedby = 'Admin';
        $mscorecard->maspectfk = $request->maspectfk;
        $insertdata = $mscorecard->save();


        if ($insertdata) {
            Session::flash('success', 'Scorecardname has been created!');
            return redirect()->route('admin.scorecard');
        } else {
            Session::flash('errors', ['' => 'Scorecardname Failed to created!']);
            return redirect()->route('admin.scorecard.create');
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
        Mscorecard::whereId($id)->delete();
        return back()->with('success', 'Scorecard has been deleted!');
    }
}
