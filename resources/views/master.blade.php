<!doctype html>
<html lang="en">
<head>
    <meta name="home_url" content="{{url('/')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
    <link rel="icon" href="{{asset('images/logo.png')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{asset('js/jquery.js')}}"></script>
    @yield('assets')
    <title>PlayMyPaper</title>
</head>
<body>
@yield('section')
<footer>
    <div class="container-fluid">
        <div class="row">
            {{--<div class="col-md-12 text-center" style="margin-top:15px;padding: 15px;background:#414141;color:white">--}}
                {{--PlayMyPaper2020 | Developer Student Clubs [DSC] Solution Challenge 2020--}}
            {{--</div>--}}
        </div>
    </div>
</footer>
</body>
</html>
