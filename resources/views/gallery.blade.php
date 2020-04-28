@extends('master')
@section('assets')
    <script src="{{asset('js/index.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/gallery.css')}}">
@endsection
@section('section')
    <div class="form">
        <div class="container">
            <div class="logo text-center">
                <img src="{{asset('images/logo.png')}}" alt="logo" width="250px;">
            </div>

            <div class="row">
                <div class="col-md-12" style="padding: 15px;">
                    <div class="text-center">
                        {{--<h1>Sheet Music Gallery</h1>--}}
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($images as $image)
                    @if($loop->index % 3 == 0)
                        {{--</div>--}}
                        {{--<div class="row">--}}

                    @endif

                    <div class="col-md-6">
                        <div class="shadow" style="padding:10px">
                            {{--<div style="overflow:hidden;max-height: 350px;">--}}
                            <img src="{{ asset('sheetmusic_examples/' . $image->getFilename()) }}" class="" alt=""
                                 width="100%">
                            {{--</div>--}}
                            {{--<div class="">--}}
                            {{--<h4><b>{{}}</b></h4>--}}
                            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum error explicabo--}}
                            {{--facere ipsa--}}
                            {{--iusto--}}
                            {{--labore odit quidem quisquam quos repellendus sint, sit voluptates voluptatum. </p>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                    <div class="col-md-6" style="vertical-align: center;">
                        <button id="play">Play</button>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
    <div class="modal">
        <div class="loading">
        </div>
    </div>
@endsection
