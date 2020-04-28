@extends('master')
@section('assets')
    <script src="{{asset('js/index.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/gallery.css')}}">

@endsection
@section('section')
    <div class="form">
        <div class="container">

            <div class="row" style="margin-top: 15px;">
                <div class="col-md-12">
                    <div class="" style="padding:20px;">
                        <div class="logo text-center">
                            <img src="{{asset('images/logo.png')}}" alt="logo" width="250px;">
                        </div>

                        <div class="form-group">
                            <input type="file" id="file">
                            <button id="go">Play</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal">
        <div class="loading">
        </div>
    </div>
@endsection
