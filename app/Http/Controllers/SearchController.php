<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function search(Request $request){
        $produce = \DB::table('produce')
                    ->where('title','LIKE','%'.$request->input('search').'%')
                    ->get();
        // if($produce){
        //     return response()->json($request->input('search'));
        // }
        return response()->json($produce);
    }

    public function fetchRecord(Request $request){
        $produce = \DB::select('select id,title,farmer_id,description, price from produce');
        
        //loop through record and append images
        foreach ($produce as $item) {
            $listOfImages = [];
            $relativePath = "/produces/".$item->farmer_id."/".$item->id."/";
            $path = public_path().$relativePath;
            $files = \File::files($path);
            foreach($files as $file){
                $listOfImages[] = $relativePath.$file->getRelativePathname();
                // if(ends_with($file, ['.png','.jpg'])){
                    
                // }
            }
            $item->listOfImages = $listOfImages;
        }
        
        if($produce){
            return response()->json($produce);
        }else{
            return response()->json([]);
        }
    }
}
