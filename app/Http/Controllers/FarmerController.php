<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produce;

class FarmerController extends Controller
{
    public function showDashboard(Request $request){

        return view('farmer.dashboard');
    }

    public function showProduce(Request $request){
        //fetch produce from database and show
        $allProduce = \DB::select("select * from produce where farmer_id = ?",[auth()->user()->id]);


        return view('farmer.produce', ["data"=>$allProduce]);
    }

    public function deleteProduce(Request $request){
        //die($request->input('path'));

        $id = $request->input('id');
        //delete from db
        \DB::table('produce')->where('id', '=', $id)->delete();

        //Delete from filesystem
        $path = $request->input('path');
        \File::deleteDirectory($path);

        //redirect to produce page
        return redirect()->route("farmer/produce")->with(['actionResponse' => "The Product was Deleted successfully"]);
    }

    public function addProduce(Request $request){
        //validate user input
        $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric']
        ]);
        $title = $request->input('title');
        $farmerId = auth()->user()->id;
        $id = $title."_".$farmerId."_".time();
        $createdAt = date('Y-m-d H:i:s');

        $data = [
            'id'=>$id,
            'title'=>$title,
            'farmer_id'=>$farmerId,
            'description'=>$request->input('description'),
            'price'=>$request->input('price'),
            'created_at'=>$createdAt
        ];
        
        //insert into db
        \DB::table('produce')->insertGetId($data);

        // if($request->hasFile('images')){
        //     die('E dey!'.var_dump($request->file('images')));
        // }
        //Save to filesystem
        $index = 1;
        foreach ($request->file('images') as $imagefile) {
            $imagefile->move(public_path('produces/'.$farmerId.'/'.$id),'image_'.$index.'.png');
            $index++;
        } 

        return redirect()->route("farmer/produce")->with(['actionResponse' => "The Product was inserted successfully"]);
    }
}
