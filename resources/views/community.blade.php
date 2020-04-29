@extends('master')
@section('assets')
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Materialize CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Sacramento&display=swap" rel="stylesheet">

	<!-- Animate CSS -->
	<link rel="stylesheet" href="https://cdn.boomcdn.com/libs/animate-css/3.7.0/animate.css">
	<title>Community</title>

	<style>

		.brand-logo img {
			height: 64px;
		}
		.brand-logo {
			font-family: 'Sacramento';
			align-items: center;
		}
		.preview-img {
		  border: 1px solid #ddd;
		  border-radius: 4px;
		  padding: 5px;
		}

		.center-middle {
		    display: flex;
		    align-items: center;
		    justify-content: center;
		}
		
		.center-right {
		    display: flex;
		    align-items: center;
		    justify-content: flex-end;
		}
		.top-left {
		    display: flex;
		    align-items: center;
		    justify-content: flex-start;
		    font-size: 1.01vw;
		}
		.bottom-right {
		    display: flex;
		    align-items: bottom;
		    justify-content: flex-end;
		    font-size: 1.01vw;
		}
		.bottom-right {
		    display: flex;
		    align-items: bottom;
		    justify-content: flex-start;
		    font-size: 1.01vw;
		}
		.btn-block {
	    width: 86%;
	}
	</style>

@endsection
@section('section')
<!-- <ul id="dropdown" class="dropdown-content">
	<li><a href="">Dashboard</a></li>
	<li><a href="">Logout</a></li>
</ul> -->

{{--<nav>--}}
	{{--<div class="nav-wrapper white lighten-1">--}}
		{{--<div class="container">--}}
			{{--<!-- <img class="brand-logo" src="pmpLogo.png"> -->--}}
			{{--<a href="{{ url('/community/') }}" class="brand-logo">PlayMyPaper Community</a>--}}
			{{--<ul class="right">--}}
				{{--<!-- Dropdown trigger -->--}}
			{{--</ul>--}}
		{{--</div>--}}
	{{--</div>--}}
{{--</nav>--}}
<div class="row">
	<div class="col-md-12 text-center" style="padding-top: 15px;padding-bottom: 15px;">
		<h1>PlayMyPaper Community</h1>
	</div>
</div>
	<br><br>
	<!-- ADD POST -->
	<div class="row">
		<div class="col l10 s10 m10 offset-l2 offset-m2 offset-s2">
			<a href="{{ url('/addpostspage/') }}" class="btn-block waves-effect waves-light btn-large purple lighten-1"><i class="material-icons left">note_add</i>Add Post</a>

			</div>
		</div>
{!! $text !!}

	</div>
	<br> <br>
	<div class="row">
		<div class="col l5 s5 m5">
			<div class="card large">	

				<div class="card-title center-middle" style="margin-top: 20px;"> <p> <b>Sharing awesome songs</b> </p></div>
				<div class="card-image preview-img">
					<a target="_blank" href="{{ asset('sheetmusic_examples/ode to joy.png') }}">
						<img src="{{ asset('sheetmusic_examples/ode to joy.png') }}" class="responsive-img">
				</a>
				</div>	
				<div class="card-content">
					<p class="top-left"><i class="small material-icons">account_circle</i><b>&nbsp; andi123 &nbsp;</b> Any thoughts on how to improve it?</p>
					<p class="card-action bottom-right"> <i>Posted on March 23 2020, 3.59 p.m.</i></p>
			   <!-- <p class="top-left"><i class="small material-icons">account_circle</i><b>&nbsp; millen321 &nbsp;</b> What do you guys think about this song?</p> -->

				</div>

			</div>
		</div>	
		<div class="col l7 s7 m7">
			<div class="card large">
				<div class="card-title center-middle"  style="margin-top: 20px;"> <p> <b>Comments </b></p></div>
					<hr>
				<div class="card-content">
					<p class="valign-wrapper"> <i class="small material-icons">account_circle</i> <b>&nbsp; budi123 &nbsp;</b>  Already sounds good tbh
						<p> <i class="bottom-left" style="font-size: 12px">March 23 2020, 4.00 p.m.</i> </p>

						<div class="right-align"> <i class="tiny material-icons right-align">thumb_up</i> 15 </div> </p>
					<hr>

					<p class="valign-wrapper"> <i class="small material-icons">account_circle</i> <b>&nbsp; cendi000 &nbsp;</b>  Its awesome guys
					<p> <i class="bottom-left" style="font-size: 12px">March 23 2020, 4.05 p.m.</i> </p>

					<div class="right-align"> <i class="tiny material-icons right-align">thumb_up</i> 10 </div> </p>
					<hr>
<!-- 					<p class="valign-wrapper"><i class="small material-icons">account_circle</i><b>&nbsp; ryan123 &nbsp;</b> makes me cry at night D:
						<div class="right-align"><i class="tiny material-icons right-align">thumb_up</i> 2 </div> </p>
					<hr>	 -->

				</div>
			</div>


		</div>

	</div>
	<br> <br>


<!-- 	POST NUMBER 2
 -->
	<div class="row">
		<div class="col l5 s5 m5">
			<div class="card large">	

				<div class="card-title center-middle"  style="margin-top: 20px;"> <p> <b>Canon</b> </p></div>
				<div class="card-image preview-img">
					<a target="_blank" href="{{ asset('sheetmusic_examples/canon in d.png') }}">
						<img src="{{ asset('sheetmusic_examples/canon in d.png') }}" class="responsive-img">
				</a>
				</div>	
				<div class="card-content">
					<p class="top-left"><i class="small material-icons">account_circle</i><b>&nbsp; millen321 &nbsp;</b> What do you guys think about this song?</p>
					<p class="card-action bottom-right"> <i>Posted on March 22 2020, 2.17 p.m.</i></p>
				</div>


			</div>
		</div>	
		<div class="col l7 s7 m7">
			<div class="card large">	
				<div class="card-title center-middle"  style="margin-top: 20px;"> <p> <b>Comments </b></p></div>
					<hr>
				<div class="card-content">
					<p class="valign-wrapper"> <i class="small material-icons">account_circle</i> <b>&nbsp;   hengky223 &nbsp;</b> I personally love it!
					<p> <i class="bottom-left" style="font-size: 12px">March 22 2020, 2.19 p.m.</i> </p>
						<div class="right-align"> <i class="tiny material-icons right-align">thumb_up</i> 19 </div> </p>
					<hr>
					<p class="valign-wrapper"><i class="small material-icons">account_circle</i><b>&nbsp; ryan123 &nbsp;</b> This song definitely has a lot of meaning.
					<p> <i class="bottom-left" style="font-size: 12px">March 22 2020, 2.25 p.m.</i> </p>
 
						<div class="right-align"><i class="tiny material-icons right-align">thumb_up</i> 15 </div> </p>
					<hr>	

				</div>

			</div>	


		</div>

	</div>

	<script src="https://code.jquery-3.3.1.min.js"></script>
	<!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
@endsection
