<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransporterController extends Controller
{
    public function showDashboard(Request $request){
        
        return view('transporter.dashboard');
    }
}
