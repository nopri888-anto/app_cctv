<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class MuserController extends Controller
{

    public function index()
    {
        //
        $users = User::orderBy('username', 'DESC')->get();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::orderBy('username', 'DESC')->get();
        return view('admin.user.create', compact('users'));
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
            'userid' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'confirmpassword' => 'required|min:6|same:password',
            'status' => 'required',
        ];

        $messages = [
            'userid.required' => 'ID must be filled!',
            'username.required' => 'Username must be filled!',
            'email.required' => 'E-mail must be filled!',
            'password.required' => 'Password must be filled!',
            'password.confirmed' => 'Password must be the same!',
            'password.min' => 'Password to shoort!',
            'email.required' => 'E-mail must be filled!',
            'confirmpassword.required' => 'Confirm Password must be filled!',
            'confirmpassword.min' => 'Password to shoort!',
            'confirmpassword.same' => 'Password must be same!',
            'status.required' => 'Status must be filled!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }


        $musers = new User();
        $musers->userid = $request->userid;
        $musers->username = $request->username;
        $musers->email = $request->email;
        $musers->email_verified_at = $request->email;
        $musers->password = $request->password;
        $musers->status = $request->password;
        $musers->updateby = 'Admin';
        $insertdata = $musers->save();

        if ($insertdata) {
            Session::flash('success', 'User has been created!');
            return redirect()->route('admin.user');
        } else {
            Session::flash('errors', ['' => 'User Failed to created!']);
            return redirect()->route('admin.user.create');
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
