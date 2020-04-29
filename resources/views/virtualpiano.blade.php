@extends('master')
@section('assets')
    <script src="{{asset('js/index.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/gallery.css')}}">

@endsection
@section('section')
    <div class="form">
        <div class="container">

            <div class="row" style="margin-top: 25px;">
                <div class="col-md-12">
                    <div class="">
                        <div class="row">
                            <div class="col-md-12 text-center" style="padding-top: 15px;padding-bottom: 15px;">
                                <h1>Play Virtual Piano</h1>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="shadow" style="padding:10px">
                                    <img src="{{ asset('sheetmusic_examples/indonesia raya.png') }}" class=""
                                         alt=""
                                         width="100%">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div style="padding: 5px 15px;">
                                    <h3>Indonesia Raya</h3>
                                    <p>"Indonesia Raya" (English: Great Indonesia) is the national anthem of Indonesia.
                                        It has been the national anthem since the proclamation of Indonesian
                                        independence on 17 August 1945. The song was introduced by its composer, Wage
                                        Rudolf Supratman, on 28 October 1928 during the Second Indonesian Youth Congress
                                        in Batavia.The song marked the birth of the all-archipelago nationalist movement
                                        in Indonesia that supported the idea of one single "Indonesia" as successor to
                                        the Dutch East Indies, rather than split into several colonies. The first
                                        newspaper to openly publish the musical notation and lyrics of "Indonesia Raya"
                                        — an act of defiance towards the Dutch authorities — was the Chinese Indonesian
                                        weekly Sin Po. Source: Wikipedia</p>
                                    <button id="play"><a href="/playpiano?m=41194_Indonesia-Raya.mid">Play</a></button>
                                </div>
                            </div>

                            <div style="height: 35px;" class="col-md-12"></div>
                        </div>




                        <div class="row">
                            <div class="col-md-6">
                                <div class="shadow" style="padding:10px">
                                    <img src="{{ asset('sheetmusic_examples/carmen.png') }}" class=""
                                         alt=""
                                         width="100%">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div style="padding: 5px 15px;">
                                    <h3>Carmen</h3>
                                    <p>Carmen [kaʁ.mɛn] is an opera in four acts by French composer Georges Bizet. The
                                        libretto was written by Henri Meilhac and Ludovic Halévy, based on a novella of
                                        the same title by Prosper Mérimée. The opera was first performed by the
                                        Opéra-Comique in Paris on 3 March 1875, where its breaking of conventions
                                        shocked and scandalized its first audiences. Source: Wikipedia</p>
                                    <button id="play"><a href="/15471056521134292584">Play</a></button>
                                </div>
                            </div>

                            <div style="height: 35px;" class="col-md-12"></div>
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
