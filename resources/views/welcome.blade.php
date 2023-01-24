@extends('layouts.welcome_layout', ['class' => 'bg-light'])

@section('content')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">

    <div class="container-fluid bg-white" id="conventionCenter">
        <div class="row justify-content-center">
            <div class="col-md-1 mt-7 d-none d-md-block" style="background-color: #f5f5f5">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Labore dolore nesciunt obcaecati consequuntur
                    reiciendis delectus incidunt magni recusandae voluptatem, iure at ipsam, beatae ad saepe est dolorem
                    voluptatibus a necessitatibus.</p>
            </div>
            <div class="col-md-9 mt-7">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"
                    style="text-shadow: rgb(0, 0, 0) 0.1em 0.1em 0.2em;">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100 imgslider" src="{{ asset('nvdcpics') }}/BCourt1.jpg">
                            <div class="carousel-caption d-none d-md-block">
                                <img src="{{ asset('nvdcpics') }}/nvdc-logo.png" style="width: 20vh; height: 20vh">
                                <h1 class="display-1 text-white">NVDC PROPERTIES
                                </h1>
                                <h1 class="text-white">Convention Center</h1>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('nvdcpics') }}/hotel12.jpg">
                            <div class="carousel-caption d-none d-md-block">
                                <h1 class="display-1 text-white">Suites</h1>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('nvdcpics') }}/FunctionRoom7.jpg">
                            <div class="carousel-caption d-none d-md-block">
                                <h1 class="display-1 text-white">Function Roms</h1>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 imgslider" src="{{ asset('nvdcpics') }}/cspaces2.jpg">
                            <div class="carousel-caption d-none d-md-block">
                                <h1 class="display-1 text-white">Commercial Spaces</h1>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-1 mt-7 d-none d-md-block" style="background-color: #f5f5f5">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque illo reprehenderit impedit veniam
                    laboriosam sunt facere aliquid nihil ducimus reiciendis dicta earum quam omnis hic possimus maxime,
                    accusantium voluptas placeat!</p>
            </div>
        </div>
    </div>


    <div class="container-fluid bg-white">
        <div class="row d-flex justify-content-center">
            <div class="col-md-3">
                <img class="card-img-top mt-3" src="{{ asset('nvdcpics') }}/hotel1.jpg" alt="Card image cap"
                    style="max-height: 14rem">
                <div class="card-body">
                    <h5 class="card-title">Suites</h5>
                    <p class="card-text">P2,500.00 per night with breakfast
                        /P1,500.00 per additional pax with free breakfast.</p>
                    <button type="button" class="btn btn-success" style="border-radius: 20px;">
                        <a href="{{ route('login') }}" class="text-white">
                            Book Now
                        </a>
                    </button>
                </div>
            </div>
            <div class="col-md-3">
                <img class="card-img-top mt-3" src="{{ asset('nvdcpics') }}/convention2.jpg" alt="Card image cap"
                    style="max-height: 14rem">
                <div class="card-body">
                    <h5 class="card-title">Convention Center</h5>
                    <p class="card-text">Venue for personal and corporate
                        celebrations,
                        training/learning sessions and sports activities.</p>
                    <button type="button" class="btn btn-success" style="border-radius: 20px;">
                        <a href="{{ route('login') }}" class="text-white">
                            Book Now
                        </a>
                    </button>
                </div>
            </div>
            <div class="col-md-3">
                <img class="card-img-top mt-3" src="{{ asset('nvdcpics') }}/FunctionRoom3.jpg" alt="Card image cap"
                    style="max-height: 14rem">
                <div class="card-body">
                    <h5 class="card-title">Function Rooms</h5>
                    <p class="card-text">Function room basic inclusions for either social event or trainings/seminar or
                        convention center.</p>

                    <button type="button" class="btn btn-success" style="border-radius: 20px;">
                        <a href="{{ route('login') }}" class="text-white">
                            Book Now
                        </a>
                    </button>
                </div>
            </div>
            <div class="col-md-3">
                <img class="card-img-top mt-3" src="{{ asset('nvdcpics') }}/cspaces2.jpg" alt="Card image cap"
                    style="max-height: 14rem">
                <div class="card-body">
                    <h5 class="card-title">Commercial Spaces</h5>
                    <p class="card-text">Looking for a place for your business to grow your market? Here at NVDC
                        Properties,
                        we are offering commercial spaces for lease with an introductory rate for as low as Php 3,500 per
                        month! </p>

                    <button type="button" class="btn btn-success" style="border-radius: 20px;">
                        <a href="{{ route('login') }}" class="text-white">
                            Book Now
                        </a>
                    </button>
                </div>
            </div>
        </div>

    </div>
    {{-- Convention center intro --}}
    <div class="container-fluid bg-white" id="hotelRooms">
        <div class="row d-flex justify-content-center">
            <div class="cards1" style="">
                <img class="card-img-top mt-5 shadow1" src="{{ asset('nvdcpics') }}/hotel12.jpg" alt="Card image cap"
                    style="height: 350px;">
            </div>
            <div class="col-md-6 text-left mt-6 ">
                <h1>_______</h1>
                <h3>We'd love to have you here in your coming events</h3>
                <h1>Welcome to NOVADECI Convention Center</h1>
                <div style="margin-left: 7%;">
                    <p>
                        The convention center houses function rooms which can accommodate from small groups and up to 400
                        guests. Its main activity center, very much appropriate for large-scale events can be filled up to
                        2,500 guests!
                        <br>
                        <br>
                        Also within the complex is a 17-room hotel with room size of 26-38 sq. meters. The perfect pre-event
                        prep place or post-event recharging place!
                        Parking concerns? Never a problem with over a hundred parking spaces for 2-wheel and 4-wheel
                        vehicles.

                    </p>
                </div>

            </div>

        </div>

    </div>
    {{-- Commmercial spaces gallery --}}
    <div class="container-fluid bg-white" id="commercialSpaces">

        <div class="row d-flex justify-content-center">
            <div class="row d-flex justify-content-center mt-5" style="height: 50%">
                <div class="col-md-3">
                    <img class="card-img-top" src="{{ asset('nvdcpics') }}/commercial1.jpg" alt="Card image cap">
                </div>
                <div class="col-md-3">
                    <img class="card-img-top" src="{{ asset('nvdcpics') }}/function1.jpg" alt="Card image cap">
                </div>
                <div class="col-md-3">
                    <img class="card-img-top" src="{{ asset('nvdcpics') }}/convention1.jpg" alt="Card image cap">
                </div>
                <div class="col-md-3">
                    <img class="card-img-top" src="{{ asset('nvdcpics') }}/suite1.jpg" alt="Card image cap">
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-white" id="functionRooms">
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                <img src="{{ asset('nvdcpics') }}/FunctionRoom1.jpg" class="w-100 shadow-1-strong rounded mb-4" />

                <img src="{{ asset('nvdcpics') }}/FunctionRoom2.jpg" class="w-100 shadow-1-strong rounded mb-4" />
            </div>

            <div class="col-lg-4 mb-4 mb-lg-0">
                <img src="{{ asset('nvdcpics') }}/FunctionRoom3.jpg" class="w-100 shadow-1-strong rounded mb-4" />

                <img src="{{ asset('nvdcpics') }}/FunctionRoom4.jpg" class="w-100 shadow-1-strong rounded mb-4" />
            </div>

            <div class="col-lg-4 mb-4 mb-lg-0">
                <img src="{{ asset('nvdcpics') }}/FunctionRoom5.jpg" class="w-100 shadow-1-strong rounded mb-4" />

                <img src="{{ asset('nvdcpics') }}/FunctionRoom6.jpg" class="w-100 shadow-1-strong rounded mb-4" />
            </div>
        </div>
    </div>



    <style>
        p {
            text-align: justify;
            text-justify: inter-word;
        }

        h5 {
            letter-spacing: 2px;
        }

        .slide1 {
            height: 13%;
        }

        .shadow1 {
            -webkit-box-shadow: 12px 12px 7px -7px rgba(0, 0, 0, 0.61);
            -moz-box-shadow: 12px 12px 7px -7px rgba(0, 0, 0, 0.61);
            box-shadow: 12px 12px 7px -7px rgba(0, 0, 0, 0.61);
        }

        .cards1 {
            margin: 10px;
        }

        .cards1 img {
            width: 100%;
            height: 300px;
        }

        html {
            scroll-behavior: smooth;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .carousel-inner img {
            aspect-ratio: 16/9;
            object-fit: cover;
        }

        .nvdcbgslider img {
            width: 100%;
        }

        .imgslider {
            filter: brightness(70%);
        }
    </style>

    <script>
        $(document).ready(function() { //DISABLED PAST DATES IN APPOINTMENT DATE
            var dateToday = new Date();
            var month = dateToday.getMonth() + 1;
            var day = dateToday.getDate();
            var year = dateToday.getFullYear();

            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;

            $('.chck').attr('min', maxDate);
        });

        $('.prevent_submit').on('submit', function() {
            $('.prevent_submit').attr('disabled', 'true');
        });
    </script>
    </div>
    <div class="container mt--5 pb-5"></div>
@endsection
