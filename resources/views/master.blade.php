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
    <div class="container">
        Copyright &copy; 2018. Made For PKM-KC Purpose. Author: Luki Centuri, Dito Bagus Sutanto, Kelwin Tantono
    </div>
</footer>
</body>
</html>