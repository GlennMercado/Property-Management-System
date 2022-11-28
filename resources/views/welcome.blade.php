@extends('layouts.app', ['class' => 'bg-light'])

@section('content')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">



    <div class="container-fluid nvdcbg">
        <div class="text-center mt-7">
            <div style="text-shadow: black 0.1em 0.1em 0.2em;">
                <h1 class="display-1 text-white">NOVADECI PROPERTIES</h1>
                <h3><a href="#hotelRooms" class="text-white">Hotel</a> | <a href="#conventionCenter"
                        class="text-white">Convention Center</a> | <a href="#commercialSpaces" class="text-white">Commercial
                        Spaces</a> | <a href="#functionRooms" class="text-white">Function Rooms</a>
                </h3>
                <br>
            </div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">
                Book Now
            </button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-left display-4" id="exampleModalLabel">Book a Hotel Room</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="card-body bg-white" style="border-radius: 18px">
                                    <p class="text-left">Check In: </p>
                                    <input class="form-control" type="datetime-local" value="<?php echo date('Y-m-d'); ?>"
                                        id="example-datetime-local-input" required>
                                    <p class="text-left">Check Out: </p>
                                    <input class="form-control" type="datetime-local" value="<?php echo date('Y-m-d'); ?>"
                                        id="example-datetime-local-input" required>
                                    <p class="text-left">Room: </p>
                                    <input class="form-control" type="number" value="1" id="example-number-input"
                                        min="0" required>
                                    <p class="text-left">No. of Adult: </p>
                                    <input class="form-control" type="number" value="1" id="example-number-input"
                                        min="0" required>
                                    <p class="text-left">No. of Child: </p>
                                    <input class="form-control" type="number" value="1" id="example-number-input"
                                        min="0" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success">Book now</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>



    </div>
    <div class="container-fluid bg-white" id="#hotelRooms">
        <div class="row d-flex justify-content-center">
            <div class="card col-md-5 cards1">
                <img class="card-img-top mt-4" src="{{ asset('nvdcpics') }}/nvdcpic3.jpg" alt="Card image cap"
                    style="height: 350px">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the card's content.</p>
                </div>
            </div>
            <div class="col-md-6 text-left mt-6 ">
                <h2>RAISING COMFORT AND CONVINIENCE</h2>
                <h1>Welcome to NOVADECI Convention Center</h1>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ullam odit asperiores in aspernatur possimus dolores dignissimos, sunt voluptas officiis blanditiis iste assumenda, quidem laboriosam. Exercitationem ipsum officiis illum quo tempora.
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ullam odit asperiores in aspernatur possimus dolores dignissimos, sunt voluptas officiis blanditiis iste assumenda, quidem laboriosam. Exercitationem ipsum officiis illum quo tempora.
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ullam odit asperiores in aspernatur possimus dolores dignissimos, sunt voluptas officiis blanditiis iste assumenda, quidem laboriosam. Exercitationem ipsum officiis illum quo tempora.
                </p>
                <button type="button" class="btn btn-default shadow1" style="border-radius: 25px;">Read more</button>


            </div>

        </div>

    </div>

    <div class="container-fluid bg-white" id="conventionCenter">
        <div class="row d-flex justify-content-center">
            <div class="card col-md-5 cards1">
                <img class="card-img-top mt-4" src="{{ asset('nvdcpics') }}/nvdcpic3.jpg" alt="Card image cap"
                    style="height: 350px">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the card's content.</p>
                </div>
            </div>
            <div class="col-md-6 text-center mt-6">
               


            </div>

        </div>

    </div>

    <div class="container-fluid bg-white" id="commercialSpaces">
        <div class="row d-flex justify-content-center">
            <div class="card col-md-5 cards1">
                <img class="card-img-top mt-4" src="{{ asset('nvdcpics') }}/nvdcpic3.jpg" alt="Card image cap"
                    style="height: 350px">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the card's content.</p>
                </div>
            </div>
            <div class="col-md-6 text-center mt-6">
                <h1>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero dolore, labore eveniet aliquam
                    doloremque, aliquid quibusdam distinctio tenetur cum voluptatum eos, commodi corporis nobis
                    possimus provident ullam autem rerum a.
                </h1>


            </div>

        </div>

    </div>
    <div class="container-fluid bg-white" id="commercialSpaces">
        <div class="row d-flex justify-content-center">
            <div class="card col-md-5 cards1">
                <img class="card-img-top mt-4" src="{{ asset('nvdcpics') }}/nvdcpic3.jpg" alt="Card image cap"
                    style="height: 350px">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the card's content.</p>
                </div>
            </div>
            <div class="col-md-6 text-center mt-6" id="functionRooms">
                <h1>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero dolore, labore eveniet aliquam
                    doloremque, aliquid quibusdam distinctio tenetur cum voluptatum eos, commodi corporis nobis
                    possimus provident ullam autem rerum a.
                </h1>


            </div>

        </div>

    </div>

    <div class="container-fluid bg-white" id="commercialSpaces">

        <div class="row d-flex justify-content-center">
            <div class="card col-md-5 cards1">
                <div class="strike">
                    <span>
                        <h1>MAP</h1>
                    </span>
                </div>
                <h3 class="text-center">RAISING COMFORT AND CONVINIENCE</h3>
                <div class="shadow1">">
                    <div class="mapouter">
                        <div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0"
                                scrolling="no" marginheight="0" marginwidth="0"
                                src="https://maps.google.com/maps?width=660&amp;height=369&amp;hl=en&amp;q=Brgy, 123 General Luis, Novaliches, Lungsod Quezon, Kalakhang Maynila&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a
                                href="https://formatjson.org/">format json</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text">Brgy, 123 General Luis, Novaliches, Lungsod Quezon, Kalakhang Maynila</p>
                </div>
            </div>
        </div>

    </div>

    <style>
        .shadow1 {
            -webkit-box-shadow: 14px 11px 18px -9px rgba(92, 92, 92, 1);
            -moz-box-shadow: 14px 11px 18px -9px rgba(92, 92, 92, 1);
            box-shadow: 14px 11px 18px -9px rgba(92, 92, 92, 1);
        }

        .mapouter {
            position: relative;
            text-align: right;
            width: 100%;
            height: 369px;
        }

        .gmap_canvas {
            overflow: hidden;
            background: none !important;
            width: 100%;
            height: 369px;
        }

        .gmap_iframe {
            height: 369px !important;
        }

        .cards1 {
            margin: 10px;
        }

        .cards1 img {
            width: 100%;
            height: 250px;
        }

        html {
            scroll-behavior: smooth;
        }

        .nvdcbg {
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-family: Montserrat, sans-serif;
            width: 100%;
            min-height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)), url("nvdcpics/nvdcpic4.png");
            background-size: cover;
        }

        @media screen and (max-width: 768px) {
            .parallax-item h2 {
                font-size: 1.5rem;
            }
        }

        h4 {
            margin-top: 5px;
        }

        .strike {
            display: block;
            text-align: center;
            overflow: hidden;
            white-space: nowrap;
        }

        .strike>span {
            position: relative;
            display: inline-block;
        }

        .strike>span:before,
        .strike>span:after {
            content: "";
            position: absolute;
            top: 50%;
            width: 9999px;
            height: 3px;
            background: rgb(94, 94, 94);
        }

        .strike>span:before {
            right: 100%;
            margin-right: 15px;
        }

        .strike>span:after {
            left: 100%;
            margin-left: 15px;
        }
    </style>

    </div>
    <div class="container mt--10 pb-5"></div>
@endsection
