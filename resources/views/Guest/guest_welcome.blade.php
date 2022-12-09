@extends('layouts.guest', ['class' => 'bg-light'])

@section('content')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <div class="container-fluid nvdcbg">
        <div class="text-center mt-7">
            <div style="text-shadow: black 0.1em 0.1em 0.2em;">
                <h1 class="display-1 text-white">NVDC PROPERTIES</h1>

            </div>

            <!-- Modal -->

            <!-- Add Reservation -->
            <div class="modal fade" id="reserve" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-left display-4" id="exampleModalLabel">
                            Hotel Reservation
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ url('/guest_reservation') }}" class="prevent_submit" method="POST" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        <div class="modal-body">
                            <div class="row">
                                <div class="card-body bg-white" style="border-radius: 18px">
                                    <div class="row">
                                        <div class="col">
                                            <p class="text-left">Check in Date/Time: </p>
                                            <input class="form-control chck" name="checkIn" type="date" onkeydown="return false" id="example-datetime-local-input" required>
                                        </div>
                                        <div class="col">
                                            <p class="text-left">Check out Date/Time: </p>
                                            <input class="form-control chck" name="checkOut" type="date" onkeydown="return false" id="example-datetime-local-input" required>
                                        </div>
                                    </div>

                                    <p class="text-left">Room No - Beds: </p>
                                    <select name="room_no" class="form-control" required>
                                        <option selected="true" disabled="disabled">Select</option>
                                        @foreach($room as $rooms)
                                            @if($rooms->Status == 'Available')
                                                <option value="{{$rooms->Room_No}}">{{$rooms->Room_No}} - {{$rooms->No_of_Beds}} - {{$rooms->Extra_Bed}}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                    <div class="row">
                                        <div class="col">
                                            <p class="text-left">Number of Pax: </p>
                                            <select name="pax" class="form-control" required>
                                                <option selected="true" disabled="disabled">Select</option>
                                                @for($count = 1; $count <= 4; $count++)
                                                <option value="{{$count}}">{{$count}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col">
                                            <p class="text-left">Mobile No.: </p>
                                            <input class="form-control" type="tel" minlength="11" maxlength="11" name="mobile" required>
                                        </div>
                                    </div>

                                    <!--
                                    <div class="row">
                                        <div class="col">
                                            <p class="text-left">Number of Adult: </p>
                                            <select name="adult" class="form-control" required>
                                                <option selected="true" disabled="disabled">Select</option>
                                                @for($count = 1; $count <= 4; $count++)
                                                <option value="{{$count}}">{{$count}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col">
                                            <p class="text-left">Number of Children: </p>
                                            <select name="child" class="form-control" required>
                                                <option selected="true" disabled="disabled">Select</option>
                                                @for($count = 1; $count <= 4; $count++)
                                                <option value="{{$count}}">{{$count}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>-->

                                    <p class="text-left">Guest Name: </p>
                                    @foreach($guest as $guests)
                                        <input type="hidden" name="gName" value="{{$guests->name}}" />
                                        <input class="form-control" type="text" name="gName" value="{{$guests->name}}" readonly>
                                    @endforeach

                                    
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                            <input type="submit" class="btn btn-success prevent_submit" value="Submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

        </div>
    </div>
    <div class="container-fluid bg-white">
        <div class="row d-flex justify-content-center">
            <div class="col-md-3">
                <img class="card-img-top mt-3" src="{{ asset('nvdcpics') }}/nvdcpic3.jpg" alt="Card image cap" style="max-height: 14rem">
                <div class="card-body">
                    <h5 class="card-title">Suites</h5>
                    <p class="card-text">P2,500.00 per night with breakfast
                        /P1,500.00 per additional pax with free breakfast.</p>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#reserve"
                        style="border-radius: 20px;">
                        Book Now
                    </button>
                </div>
            </div>
            <div class="col-md-3">
                <img class="card-img-top mt-3" src="{{ asset('nvdcpics') }}/convention2.jpg" alt="Card image cap" style="max-height: 14rem">
                <div class="card-body">
                    <h5 class="card-title">Convention Center</h5>
                    <p class="card-text">Venue for personal and corporate
                        celebrations,
                        training/learning sessions and sports activities.</p>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#reserve"
                        style="border-radius: 20px;">
                        View Details
                    </button>
                </div>
            </div>
            <div class="col-md-3">
                <img class="card-img-top mt-3" src="{{ asset('nvdcpics') }}/FunctionRoom3.jpg" alt="Card image cap" style="max-height: 14rem">
                <div class="card-body">
                    <h5 class="card-title">Function Rooms</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#reserve"
                        style="border-radius: 20px;">
                        View Details
                    </button>
                </div>
            </div>
            <div class="col-md-3">
                <img class="card-img-top mt-3" src="{{ asset('nvdcpics') }}/cspaces2.jpg" alt="Card image cap" style="max-height: 14rem">
                <div class="card-body">
                    <h5 class="card-title">Commercial Spaces</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#reserve"
                        style="border-radius: 20px;">
                        View Details
                    </button>
                </div>
            </div>
        </div>

    </div>
    {{-- Convention center intro --}}
    <div class="container-fluid bg-white" id="hotelRooms">
        <div class="row d-flex justify-content-center">
            <div class="cards1" style="">
                <img class="card-img-top mt-5 shadow1" src="{{ asset('nvdcpics') }}/nvdcpic3.jpg" alt="Card image cap"
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
    {{-- Convention center slider --}}
    <div class="container-fluid bg-white" id="conventionCenter">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5 shadow1">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ asset('nvdcpics') }}/BCourt1.jpg">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('nvdcpics') }}/BCourt2.jpg">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('nvdcpics') }}/BCourt3.jpg">
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
    </div>
    {{-- Commmercial spaces gallery --}}
    <div class="container-fluid bg-white" id="commercialSpaces">

        <div class="row d-flex justify-content-center">
            <div class="strike col-md-12 mt-5">
                <span>
                    <h1>Commercial Spaces</h1>
                </span>
            </div>
            <div class="row d-flex justify-content-center" style="height: 50%">
                <div class="col-md-3">
                    <img class="card-img-top" src="{{ asset('nvdcpics') }}/cspaces.jpg" alt="Card image cap">
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-white" id="functionRooms">
        <div class="row">
            <div class="strike col-md-12 mt-5">
                <span>
                    <h1>Function Rooms</h1>
                </span>
            </div>
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

    <div class="container-fluid bg-white" id="commercialSpaces">

        <div class="row d-flex justify-content-center">
            <div class="col-md-8 cards1">
                <div class="strike">
                    <span>
                        <h1>MAP</h1>
                    </span>
                </div>
                <h3 class="text-center">NVDC Properties Location</h3>
                <div class="shadow1">
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
        .slide1 {
            height: 13%;
        }

        .shadow1 {
            -webkit-box-shadow: 12px 12px 7px -7px rgba(0, 0, 0, 0.61);
            -moz-box-shadow: 12px 12px 7px -7px rgba(0, 0, 0, 0.61);
            box-shadow: 12px 12px 7px -7px rgba(0, 0, 0, 0.61);
        }

        .shadow2 {
            -webkit-box-shadow: 8px 8px 7px -7px rgba(0, 0, 0, 0.61);
            -moz-box-shadow: 8px 8px 7px -7px rgba(0, 0, 0, 0.61);
            box-shadow: 8px 8px 7px -7px rgba(0, 0, 0, 0.61);
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
            height: 300px;
        }

        html {
            scroll-behavior: smooth;
        }

        .nvdcbg {
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Montserrat, sans-serif;
            width: 100%;
            min-height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url("nvdcpics/convention.jpg");
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
            width: 200px;
            height: 5px;
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

        .strike span h1 {
            font-size: 35px;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
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

        $('.prevent_submit').on('submit', function(){
            $('.prevent_submit').attr('disabled','true');
        });
</script>
    </div>
    <div class="container mt--5 pb-5"></div>
@endsection
