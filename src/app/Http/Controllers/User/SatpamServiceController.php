<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class SatpamServiceController extends Controller
{
    public function index()
    {
        return view('user.management.satpam');
    }
}