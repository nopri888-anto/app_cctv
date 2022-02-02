<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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

        $rules = [
            'userid' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required_with:confirmpassword|same:confirmpassword|min:6',
            'status' => 'required',
            'level' => 'required',
            'confirmpassword' => 'min:6',
        ];

        $messages = [
            'userid.required' => 'ID must be filled!',
            'username.required' => 'Username must be filled!',
            'email.required' => 'E-mail must be filled!',
            'email.unique' => 'E-mail has been register!',
            'password.required' => 'Password must be filled!',
            'password.same' => 'Password must be the same!',
            'password.min' => 'Password to shoort!',
            'email.required' => 'E-mail must be filled!',
            'status.required' => 'Status must be filled!',
            'level.required' => 'Role must be filled!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $musers = new User();
        $musers->userid = $request->userid;
        $musers->username = $request->username;
        $musers->email = $request->email;
        $musers->password = bcrypt($request->password, ['rounds' => 10]);
        $musers->status = $request->status;
        $musers->level = $request->level;
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
        User::where('id', $id)->delete();
        return back()->with('success', 'User has been deleted');
    }
}