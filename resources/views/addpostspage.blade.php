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

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

	<title>Add Post</title>
	<style>

		.brand-logo {
			font-family: 'Sacramento';
			align-items: center;
		}
	</style>
@endsection
@section('section')
<nav>
	<div class="nav-wrapper purple lighten-1">
		<div class="container">
			<!-- <img class="brand-logo" src="pmpLogo.png"> -->
			<a href="{{ url('/community/') }}" class="brand-logo">PlayMyPaper Community</a>
			<ul class="right">
				<!-- Dropdown trigger -->
			</ul>
		</div>
	</div>
</nav>

<div class="row">
	<div class="col s6 m4 l4 offset-s1 offset-l1 offset-m1">
		<h3>Add a Post</h3>
	</div>
</div>

<div class="row">
	<div class="col s11 m11 l11 offset-s1 offset-m1 offset-l1	">
		<hr>
	</div>
</div>
<!-- action=" {{ url('addPost') }}" -->
<form method="POST" enctype="multipart/form-data" action="/insertpost">
	<div class="row">
		<div class="input-field col s8 m8 l8 offset-m1 offset-l1 offset-s1">
	        <input placeholder="Post Title" id="postTitle" type="text" class="validate" name ="postTitle">
	    </div>
	</div>
	<div class="row">
		<div class="input-field col s8 m8 l8 offset-m1 offset-l1 offset-s1">
	        <input placeholder="Name" id="name" type="text" class="validate" name="name">
	    </div>
	</div>
	<script type="text/javascript">
     function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#imgpreview')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
	</script>
	<div class="row">
		<div class="file-field input-field col s8 m8 l8 offset-m1 offset-l1 offset-s1" action>
				<div class="btn">
					<span>Insert Image Here</span>
					<input type="file" accept="image/*" name="uploadedImage" onchange="readURL(this);">
				</div> 
<!-- 				<div class="file-path-wrapper">
			        <input class="file-path validate" type="text">
			    </div> -->
		</div>	
	</div>
	<div class="row">
		<div class="input-field col s8 m8 l8 offset-m1 offset-l1 offset-s1">
			<img id="imgpreview" src="http://placehold.it/180" alt="your image" style="max-width: 180px;" />
	    </div>
	</div>
	<div class="row">
		<div class="input-field col s8 m8 l8 offset-m1 offset-l1 offset-s1">
	        <input placeholder="Caption" id="caption" type="text" class="validate" name="caption">
		</div>
	</div>
	<div class="row">
		<div class="input-field col s8 m8 l8 offset-m1 offset-l1 offset-s1">
			<button class="btn waves-effect waves-light" type="submit" name="action">Upload Post
			    <i class="material-icons right">send</i>
     		</button>
		</div>
	</div>
</form>


@endsection