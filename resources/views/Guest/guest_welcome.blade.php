@extends('layouts.guest', ['class' => 'bg-light'])

@section('content')
    <link rel="stylesheet" href="{{ asset('css') }}/guest_welcome.css">
    <script src="{{ asset('Javascript') }}/guest_welcome.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <div class="position-relative">
        <img src="{{ asset('nvdcpics') }}/NovadeciHomepage.png" class="img-fluid" style="max-height: 700px; width: 100%">
        <div class="position-absolute d-flex align-items-center text-center"
            style="top:0; left:0; right:0; bottom:0; background-color: rgba(0, 0, 0, 0.5); color: white;">
            <div class="container mx-auto">
                <h1 class="image-text font-weight-light uppercase text-uppercase display-4 pt-6 " style="color:#B4B4B4">
                    Welcome to</h1>
                <h1 class="image-text font-weight-light uppercase text-white text-uppercase display-1 pb-4">Novadeci
                    CONVENTION CENTER</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-white pt-4" id="section2">
        <div class="d-flex justify-content-center">
            <p class="pt-2 text-uppercase position-absolute align-items-center txt1 text-light txt d-none d-lg-block">
                our</p>
        </div>
        <p class="pt-5 d-flex justify-content-center text-uppercase txt txt2">services</p>
        <div class="row d-flex justify-content-center pt-4">
            <div class="col-md-3">
                <div class="image-container">
                    <a href="{{ url('rooms') }}">
                        <img class="card-img-top" src="{{ asset('nvdcpics') }}/suites.png" alt="Card image cap"
                            style="max-height: 12.3rem">
                        <div class="image-overlay card-img-top" style="max-height: 12.3rem">
                            <p>View</p>
                        </div>
                    </a>
                </div>
                <div class="card-body">
                    <p class="txt" style="font-weight:bold;">Suites</p>
                    <p class="card-text txt">P2,500.00 per night with breakfast
                        /P1,500.00 per additional pax with free breakfast.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="image-container">
                    <a href="{{ url('convention_center') }}">
                        <img class="card-img-top" src="{{ asset('nvdcpics') }}/ConventionCenter.png" alt="Card image cap"
                            style="max-height: 12.3rem">
                        <div class="image-overlay card-img-top" style="max-height: 12.3rem">
                            <p>View</p>
                        </div>
                    </a>
                </div>
                <div class="card-body">
                    <p class="card-title txt" style="font-weight:bold;">Convention Center</p>
                    <p class="card-text txt">Venue for personal and corporate
                        celebrations,
                        training/learning sessions and sports activities.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="image-container">
                    <a href="{{ url('commercial_spaces') }}">
                        <img class="card-img-top" src="{{ asset('nvdcpics') }}/CommercialSpaces.png" alt="Card image cap"
                            style="max-height: 12.3rem">
                        <div class="image-overlay card-img-top" style="max-height: 12.3rem">
                            <p>View</p>
                        </div>
                    </a>
                </div>
                <div class="card-body sec2">
                    <p class="card-title txt" style="font-weight:bold;">Commercial Spaces</p>
                    <p class="card-text txt">Looking for a place for your business to grow your market? Here at NVDC
                        Properties,
                        we are offering commercial spaces for lease with an introductory rate for as low as Php 3,500 per
                        month! </p>
                </div>
            </div>
        </div>
    </div>
    <!-- section 3 -->
    <div class="container-fluid bg-white pt-4">
        <div class="card-body">
            <div class="d-flex justify-content-center">
                <p class="pt-3 text-uppercase position-absolute align-items-center txt1 text-light txt d-none d-lg-block">
                    Nvdc</p>
            </div>
            <p class="pt-5 d-flex justify-content-center text-uppercase txt txt2">novadeci properties</p>

            <div class="row d-flex justify-content-center">
                <div class="cards1" style="">
                    <img class="card-img-top mt-5 shadow1" src="{{ asset('nvdcpics') }}/convention.jpg"
                        alt="Card image cap" style="max-height:17rem;">
                </div>
                <div class="col-md-6 text-left mt-5 ">
                    <div style="margin-left: 7%;">
                        <p class="txt txt3 justify-content">The convention center houses function rooms which can
                            accomodate from small groups
                            and up to 400 guests.
                            <br>
                            <br>
                            Its main activity center, very much appropriate for large-scale events can be filled
                            up to 2,500 guests!
                            <br>
                            <br>
                            Also within the complex is a 17-room hotel with room size of 26-38 sq. meters.
                            <br>
                            <br>
                            The perfect pre-event prep place or post-event recharging place! Parking
                            concerns
                            <br>
                            <br>
                            Never a problem with over a hundred parking spaces for 2-wheel and 4-wheel
                            vehicles
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-white pt-6 ">
        <div class="card-body ">
            <div class="d-flex justify-content-center">
                <p class="pt-3 text-uppercase position-absolute align-items-center txt1 text-light txt d-none d-lg-block">
                    Nvdc</p>
            </div>
            <p class="pt-5 d-flex justify-content-center text-uppercase txt txt2">novadeci properties</p>
        </div>
    </div>
    <div class="container-fluid bg-white pt-4 ">
        <div class="card-body ">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block imgslider w-100" src="{{ asset('nvdcpics') }}/BCourt1.jpg">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block imgslider w-100" src="{{ asset('nvdcpics') }}/hotel12.JPG">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block imgslider w-100" src="{{ asset('nvdcpics') }}/FunctionRoom7.jpg">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block imgslider w-100" src="{{ asset('nvdcpics') }}/cspaces2.jpg">
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
    </div>
    <!-- section 6 -->
    <div class="container-fluid bg-white pt-6" id="section6">
        <div class="card-body">
            <div class="d-flex justify-content-center">
                <p class="pt-3 text-uppercase position-absolute align-items-center txt1 text-light txt d-none d-lg-block">
                    Nvdc</p>
            </div>
            <p class="pt-5 d-flex justify-content-center text-uppercase txt txt2">Novadeci Location</p>
            <div class="container-fluid bg-white">
                <div class="text-center mt-7">
                    <!-- <h1 class="display-1">NVDC Properties Location</h1> -->
                    <br>
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8 cards1">
                            <div class="shadow1">
                                <div class="mapouter">
                                    <div class="gmap_canvas"><iframe class="gmap_iframe" height="400px" width="100%"
                                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                                            src="https://maps.google.com/maps?width=660&amp;height=500px&amp;hl=en&amp;q=Brgy, 123 General Luis, Novaliches, Lungsod Quezon, Kalakhang Maynila&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a
                                            href="https://formatjson.org/"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="card-text">Brgy, 123 General Luis, Novaliches, Lungsod Quezon, Kalakhang Maynila
                                </p>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <!-- scroll-top button -->
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="bi bi-chevron-double-up"></i></button>
    <div class="container mt--5 pb-5"></div>
@endsection
