<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuyerController extends Controller
{
    public function showDashboard(Request $request){
        //fetch produce from database and show
        $allProduce = \DB::select("select * from produce order by rand()");


        return view('buyer.dashboard', ["data"=>$allProduce]);
    }

}
