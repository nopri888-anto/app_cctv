<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mcam;
use App\Models\Moutlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CamController extends Controller
{
    public function __construct()
    {
        $this->Mcam = new Mcam();
    }

    public function index()
    {
        //
        $mcams = [
            'mcam' => $this->Mcam->getDataOutlet(),
        ];
        return view('admin.cam.index', $mcams);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $moutlets = Moutlet::orderBy('outlatename', 'DESC')->get();
        return view('admin.cam.create', compact('moutlets'));
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
            'moutletfk' => 'required',
            'camid' => 'required|unique:mbranches,branchid',
            'camip' => 'required|unique:mbranches,branchname',
            'camport' => 'required',
            'camusername' => 'required',
            'campassword' => 'required',
            'camrtsp' => 'required',
            'camdeviceport' => 'required',
        ];

        $messages = [
            'moutletfk.required' => 'ID Outlet must be filled!',
            'camid.required' => 'ID must be filled!',
            'camid.unique' => 'ID already available!',
            'camip.required' => 'IP must be filled!',
            'camip.unique' => 'IP already available!',
            'camport.required' => 'Port must be filled!',
            'camusername.required' => 'Username must be filled!',
            'campassword.required' => 'Password must be filled!',
            'camrtsp.required' => 'RTSP must be filled!',
            'camdeviceport.required' => 'Device Port must be filled!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $mcams = new Mcam;
        $mcams->moutletfk = $request->moutletfk;
        $mcams->camid = $request->camid;
        $mcams->camip = $request->camip;
        $mcams->camport = $request->camport;
        $mcams->camusername = $request->camusername;
        $mcams->campassword = $request->campassword;
        $mcams->camrtsp = $request->camrtsp;
        $mcams->camdeviceport = $request->camdeviceport;
        $insertdata = $mcams->save();

        if ($insertdata) {
            Session::flash('success', 'Cam has been created!');
            return redirect()->route('admin.cam');
        } else {
            Session::flash('errors', ['' => 'Camera Failed to created!']);
            return redirect()->route('admin.cam.create');
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
