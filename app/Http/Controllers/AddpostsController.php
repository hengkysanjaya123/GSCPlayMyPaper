<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Storage;

class AddpostsController extends Controller
{
    public function index()
    {
        return view('addpostspage');
    }

    public function insertDB(Request $request)
    {

        $postTitle = $request->input('postTitle');
        $name = $request->input('name');
        $caption = $request->input('caption');
        $image = $request->file(('uploadedImage'));
        // if ($request->hasFile('uploadedImage')) {
        //           $image      = $request->file('uploadedImage');
        //           $fileName   = time() . '.' . $image->getClientOriginalExtension();

        //           $img = Image::make($image->getRealPath());
        //           $img->resize(120, 120, function ($constraint) {
        //               $constraint->aspectRatio();
        //           });

        //           $img->stream();

        //           Storage::disk('local')->put('images/1/smalls'.'/'.$fileName, $img, 'public');
        //       }
        //       else{
        //       	echo "<script>";
        // 	echo "alert('Something went wrong with the image upload! Please try again');";
        // 	echo "</script>";
        // 	return view('addpostspage');
        //       }
        //       $picture = 'images/1/smalls'.'/'.$fileName;
        $time = Carbon::now();
        // // $time = $time->format('d F y H:i');

        // $data=array('postTitle'=>$postTitle,"user"=>$name,"caption"=>$caption,"picture"=>$picture,"time"=>$time);
        // DB::table('posts')->insert($data);

        $text = '	
		<div class="row">
			<div class="col l5 s5 m5">
			<div class="card large">	

				<div class="card-title center-middle"> <p> <b>' . $postTitle . '</b> </p></div>
				<div class="card-image preview-img">
					<a target="_blank" href="' . $image . '">
						<img src="' . $image . '" class="responsive-img">
				</a>
				</div>	
				<div class="card-content">
					<p class="top-left"><i class="small material-icons">account_circle</i><b>&nbsp; ' . $name . ' &nbsp;</b> ' . $caption . '</p>
					<p class="card-action bottom-right"> <i>' . $time . '</i></p>


				</div>	
			</div>
		</div>	
		<div class="col l7 s7 m7">
			<div class="card large">	
				<div class="card-title center-middle"> <p> <b>Comments </b></p></div>
					<hr>
				<div class="card-content">
					<p class="valign-wrapper"> <i class="small material-icons">account_circle</i> <b>&nbsp; millen321 &nbsp;</b>  Already sounds good tbh 
						<p> <i class="bottom-left" style="font-size: 12px">March 23 2020, 4.00 p.m.</i> </p>

						<div class="right-align"> <i class="tiny material-icons right-align">thumb_up</i> 2 </div> </p>
					<hr>
<!-- 					<p class="valign-wrapper"><i class="small material-icons">account_circle</i><b>&nbsp; ryan123 &nbsp;</b> makes me cry at night D: 
						<div class="right-align"><i class="tiny material-icons right-align">thumb_up</i> 2 </div> </p>
					<hr>	 -->

				</div>

			</div>	


		</div>';
        return view('community', ['text' => $text]);
    }
}
