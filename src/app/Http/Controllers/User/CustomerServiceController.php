<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Mscoreitem;

class CustomerServiceController extends Controller
{
    public function index()
    {
        $reportcustomer = Mscoreitem::with('mscorecardaspect')->get();
        return response()->json($reportcustomer);
        // return view('user.management.customer', compact('reportcustomer'));
    }
}
