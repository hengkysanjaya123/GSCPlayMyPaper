@extends('master')
@section('assets')
    <script src="{{asset('js/index.js')}}"></script>
@endsection
@section('section')
    <div class="form">
        <div class="container">
            <div class="logo">
                <img src="{{asset('images/logo.png')}}" alt="logo">
            </div>
            <div class="form-group">
                <input type="file" id="file" accept="image/*">
                <button id="go">GO</button>
            </div>
        </div>
    </div>
    <div class="modal">
        <div class="loading">
        </div>
    </div>
@endsection