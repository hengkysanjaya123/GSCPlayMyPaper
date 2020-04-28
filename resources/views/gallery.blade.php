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


            <div class="row" style="margin-top: 25px;">
                <div class="col-md-12">
                    <div class="">
                        <div class="row">
                            <div class="col-md-12 text-center" style="padding-top: 15px;padding-bottom: 15px;">
                                <h1>Gallery</h1>
                            </div>
                        </div>


                        <div class="row">

                            @foreach ($images as $image)
                                {{--@if($loop->index % 3 == 0)--}}
                                {{--@endif--}}

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
                                <div class="col-md-6">
                                    <div style="padding:15px;">
                                        <h3>Title</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut autem deserunt dolor doloribus eius error expedita illo minima natus neque nihil omnis provident quidem, sapiente ullam, unde velit voluptas voluptate.</p>
                                        <button id="play">Play</button>
                                    </div>
                                </div>

                                <div style="height: 35px;" class="col-md-12"></div>
                            @endforeach
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
