<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CommunityController extends Controller
{
    public function index()
    {
//   		$posts = DB::select('select * from posts');
   		$text = "";
        return view('community', ['text'=>$text]);
    }
}
