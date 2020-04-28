<!doctype html>
<html lang="en">
<head>
    <meta name="home_url" content="{{url('/')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
    <link rel="icon" href="{{asset('images/logo.png')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/jquery.js')}}"></script>


    <script src="{{asset('js/index.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">

    <link href="{{asset('dashboard/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('dashboard/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('dashboard/css/ruang-admin.min.css')}}" rel="stylesheet">
    @yield('assets')
    <title>PlayMyPaper</title>
</head>
<body>

<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon">
                <img src="images/logo.png">
            </div>
            <div class="sidebar-brand-text mx-3">PlayMyPaper</div>
        </a>
        <hr class="sidebar-divider my-0">
        <li class="nav-item active">
            <a class="nav-link" href="index.html">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Features
        </div>

        <li class="nav-item">
            <a class="nav-link" href="openmusic">
                <i class="fab fa-fw fa-wpforms"></i>
                <span>Open Music Sheet</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="gallery">
                <i class="fab fa-fw fa-wpforms"></i>
                <span>Gallery Music</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="community">
                <i class="fab fa-fw fa-wpforms"></i>
                <span>Community</span>
            </a>
        </li>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <!-- TopBar -->
            <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
            </nav>
            <!-- Topbar -->

            <!-- Container Fluid-->
            <div class="container-fluid" id="container-wrapper">
                @yield('section')
            </div>
            <!---Container Fluid-->
        </div>
        <!-- Footer -->
    </div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
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

<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('js/ruang-admin.min.js')}}"></script>
<script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
