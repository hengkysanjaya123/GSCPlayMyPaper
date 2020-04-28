<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller{
    public function index(){
        $images = \File::allFiles(public_path('sheetmusic_examples'));
        return view('gallery')->with('images',$images);
    }
}
