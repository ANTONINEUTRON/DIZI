<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showDashboard(Request $request){

        return view('admin.dashboard');
    }
}
