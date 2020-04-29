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
                            {{--<div class="col-md-6">--}}
                                {{--<div class="shadow" style="padding:10px">--}}
                                    {{--<img src="{{ asset('sheetmusic_examples/indonesia raya.png') }}" class=""--}}
                                         {{--alt=""--}}
                                         {{--width="100%">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="col-md-12">
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
                            {{--<div class="col-md-6">--}}
                            {{--<div class="shadow" style="padding:10px">--}}
                            {{--<img src="{{ asset('sheetmusic_examples/indonesia raya.png') }}" class=""--}}
                            {{--alt=""--}}
                            {{--width="100%">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            <div class="col-md-12">
                                <div style="padding: 5px 15px;">
                                    <h3>I Want It That Way</h3>
                                    <p>"I Want It That Way" is a song by American boy band the Backstreet Boys. It was released on April 12, 1999, as the lead single from their third studio album, Millennium. It was written by Max Martin and Andreas Carlsson, while Martin and Kristian Lundin produced it. The pop ballad talks about a relationship strained by matters of emotional or physical distance.
                                        Source: Wikipedia</p>
                                    <button id="play"><a href="/playpiano?m=Backstreet_Boys_i-want-it-that-way.mid">Play</a></button>
                                </div>
                            </div>

                            <div style="height: 35px;" class="col-md-12"></div>
                        </div>


                        <div class="row">
                            {{--<div class="col-md-6">--}}
                            {{--<div class="shadow" style="padding:10px">--}}
                            {{--<img src="{{ asset('sheetmusic_examples/indonesia raya.png') }}" class=""--}}
                            {{--alt=""--}}
                            {{--width="100%">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            <div class="col-md-12">
                                <div style="padding: 5px 15px;">
                                    <h3>A Whole New World</h3>
                                    <p>"A Whole New World" is a song from Disney's 1992 animated feature film Aladdin, with music by Alan Menken and lyrics by Tim Rice.[3] A duet originally recorded by singers Brad Kane and Lea Salonga in their respective roles as the singing voices of the main characters Aladdin and Jasmine, the ballad serves as both the film's love and theme song. Lyrically, "A Whole New World" describes Aladdin showing the confined princess a life of freedom and the pair's acknowledgment of their love for each other while riding on a magic carpet.
                                        Source: Wikipedia</p>
                                    <button id="play"><a href="/playpiano?m=A-Whole-New-World-(Theme-From-Aladdin).mid">Play</a></button>
                                </div>
                            </div>

                            <div style="height: 35px;" class="col-md-12"></div>
                        </div>


                        <div class="row">
                            {{--<div class="col-md-6">--}}
                            {{--<div class="shadow" style="padding:10px">--}}
                            {{--<img src="{{ asset('sheetmusic_examples/indonesia raya.png') }}" class=""--}}
                            {{--alt=""--}}
                            {{--width="100%">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            <div class="col-md-12">
                                <div style="padding: 5px 15px;">
                                    <h3>Beethoven Moonlight Sonata</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam cum doloremque explicabo harum incidunt laborum minima, modi nemo, obcaecati quis sit suscipit voluptatem voluptatum. Amet corporis distinctio fugiat optio quibusdam.</p>
                                    <button id="play"><a href="/playpiano?m=Beethoven-Moonlight-Sonata.mid">Play</a></button>
                                </div>
                            </div>

                            <div style="height: 35px;" class="col-md-12"></div>
                        </div>


                        <div class="row">
                            {{--<div class="col-md-6">--}}
                            {{--<div class="shadow" style="padding:10px">--}}
                            {{--<img src="{{ asset('sheetmusic_examples/indonesia raya.png') }}" class=""--}}
                            {{--alt=""--}}
                            {{--width="100%">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            <div class="col-md-12">
                                <div style="padding: 5px 15px;">
                                    <h3>My Heart Will Go On (From-'Titanic')</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam cum doloremque explicabo harum incidunt laborum minima, modi nemo, obcaecati quis sit suscipit voluptatem voluptatum. Amet corporis distinctio fugiat optio quibusdam.</p>
                                    <button id="play"><a href="/playpiano?m=My-Heart-Will-Go-On-(From-'Titanic').mid">Play</a></button>
                                </div>
                            </div>

                            <div style="height: 35px;" class="col-md-12"></div>
                        </div>


                        <div class="row">
                            {{--<div class="col-md-6">--}}
                            {{--<div class="shadow" style="padding:10px">--}}
                            {{--<img src="{{ asset('sheetmusic_examples/indonesia raya.png') }}" class=""--}}
                            {{--alt=""--}}
                            {{--width="100%">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            <div class="col-md-12">
                                <div style="padding: 5px 15px;">
                                    <h3>Pirates of the Caribbean</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam cum doloremque explicabo harum incidunt laborum minima, modi nemo, obcaecati quis sit suscipit voluptatem voluptatum. Amet corporis distinctio fugiat optio quibusdam.</p>
                                    <button id="play"><a href="/playpiano?m=Pirates of the Caribbean - He's a Pirate (2).mid">Play</a></button>
                                </div>
                            </div>

                            <div style="height: 35px;" class="col-md-12"></div>
                        </div>


                        <div class="row">
                            {{--<div class="col-md-6">--}}
                            {{--<div class="shadow" style="padding:10px">--}}
                            {{--<img src="{{ asset('sheetmusic_examples/indonesia raya.png') }}" class=""--}}
                            {{--alt=""--}}
                            {{--width="100%">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            <div class="col-md-12">
                                <div style="padding: 5px 15px;">
                                    <h3>The Avengers</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam cum doloremque explicabo harum incidunt laborum minima, modi nemo, obcaecati quis sit suscipit voluptatem voluptatum. Amet corporis distinctio fugiat optio quibusdam.</p>
                                    <button id="play"><a href="/playpiano?m=The-Avengers.mid">Play</a></button>
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
