<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller{

    public $data = [
        "filename" => "",
        "title" => "",
        "description" => "",
    ];

    public function index(){
        $images = \File::allFiles(public_path('sheetmusic_examples'));
        return view('gallery')->with('images',$images);
    }

    public function uploadFile(Request $request){
        $file = $request->file('file');
        $image = File::get($file);
        $name = strtotime(date('y-m-d h:i:s')) . rand();
        $ext = '.' . $file->extension();
        File::put('scan/' . $name . $ext, $image);

        return $this->convert($name, $ext);
    }

    public function convert($name, $ext){
//        return PHP_OS;
//        WINNT

        exec('cd '. base_path('audiveris') .' &&
        gradlew run -PcmdLineArgs="-batch,-export,-output,'. base_path('public/xml') .',--,'. base_path('public/scan/'. $name . $ext).'" &&
        cd '. base_path('public/xml/' . $name) . '
         tar -xf '. $name . '.mxl');

        $returnJSON = [
            'name' => $name,
        ];

        return response()->json($returnJSON);
    }
}
