@extends('layouts.guest', ['class' => 'bg-light'])

@section('content')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <div class="container-fluid bg-white" id="conventionCenter">
        <div class="row justify-content-center">
            <div class="col-md-2 mt-7 d-none d-md-block" style="background-color: #f5f5f5">
                <div class="accordion mt-2" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    item1
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                                squid.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                    data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    item2
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                                squid.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                    data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    item3
                                </button>
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                                squid.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-7">
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
            <div class="col-md-2 mt-7 d-none d-md-block" style="background-color: #f5f5f5">
                <div class="row mt-2">
                    <div class="col-md-12">
                        <a href="">Lorem ipsum dolor sit, amet consectetur</a>
                    </div>
                    <div class="col-md-12">
                        <a href="">Lorem ipsum dolor sit, amet consectetur</a>
                    </div>
                    <div class="col-md-12">
                        <a href="">Lorem ipsum dolor sit, amet consectetur</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <!-- Add Reservation -->
    <div class="modal fade" id="reserve" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                <form action="{{ url('/guest_reservation') }}" class="prevent_submit" method="POST"
                    enctype="multipart/form-data">

                    {{ csrf_field() }}

                    <div class="modal-body">
                        <div class="row">
                            <div class="card-body bg-white" style="border-radius: 18px">
                                <div class="row">
                                    <div class="col">
                                        <p class="text-left">Check in Date/Time: </p>
                                        <input class="form-control chck" name="checkIn" type="date"
                                            onkeydown="return false" id="example-datetime-local-input" required>
                                    </div>
                                    <div class="col">
                                        <p class="text-left">Check out Date/Time: </p>
                                        <input class="form-control chck" name="checkOut" type="date"
                                            onkeydown="return false" id="example-datetime-local-input" required>
                                    </div>
                                </div>

                                <p class="text-left">Room No - Beds: </p>
                                <select name="room_no" class="form-control" required>
                                    <option selected="true" disabled="disabled">Select</option>
                                    @foreach ($room as $rooms)
                                        @if ($rooms->Status == 'Available')
                                            <option value="{{ $rooms->Room_No }}">{{ $rooms->Room_No }} -
                                                {{ $rooms->No_of_Beds }} - {{ $rooms->Extra_Bed }}</option>
                                        @endif
                                    @endforeach
                                </select>

                                <div class="row">
                                    <div class="col">
                                        <p class="text-left">Number of Pax: </p>
                                        <select name="pax" class="form-control" id="pax_num"
                                            onchange="price_count()" required>
                                            <option selected="true" disabled="disabled">Select</option>
                                            @for ($count = 1; $count <= 4; $count++)
                                                <option value="{{ $count }}" id="room_pax">
                                                    {{ $count }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col">
                                        <p class="text-left">Mobile No.: </p>
                                        <input class="form-control" type="tel" minlength="11" maxlength="11"
                                            name="mobile" required>
                                    </div>
                                </div>

                                <!--
                                                                                                            <div class="row">
                                                                                                                <div class="col">
                                                                                                                    <p class="text-left">Number of Adult: </p>
                                                                                                                    <select name="adult" class="form-control" required>
                                                                                                                        <option selected="true" disabled="disabled">Select</option>
                                                                                                                        @for ($count = 1; $count <= 4; $count++)
    <option value="{{ $count }}">{{ $count }}</option>
    @endfor
                                                                                                                    </select>
                                                                                                                </div>
                                                                                                                <div class="col">
                                                                                                                    <p class="text-left">Number of Children: </p>
                                                                                                                    <select name="child" class="form-control" required>
                                                                                                                        <option selected="true" disabled="disabled">Select</option>
                                                                                                                        @for ($count = 1; $count <= 4; $count++)
    <option value="{{ $count }}">{{ $count }}</option>
    @endfor
                                                                                                                    </select>
                                                                                                                </div>
                                                                                                            </div>-->

                                <p class="text-left">Guest Name: </p>
                                @foreach ($guest as $guests)
                                    <input type="hidden" name="gName" value="{{ $guests->name }}" />
                                    <input class="form-control" type="text" name="gName"
                                        value="{{ $guests->name }}" readonly>
                                @endforeach
                                <p class="mt-5 display-4">Price: </p>
                                <input class="form-control" id="room_price" readonly>
                                <p>Additional P1,500.00/pax</p>
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
    <div class="container-fluid bg-white">
        <div class="row d-flex justify-content-center">
            <div class="col-md-3 brighten">
            <div class="image-container">
                <a href="{{url('suites') }}">
                    <img class="card-img-top mt-3" src="{{ asset('nvdcpics') }}/hotel1.jpg" alt="Card image cap" style="max-height: 14rem">
                        <div class="image-overlay card-img-top mt-3" style="max-height: 14rem">
                            <p>View</p>
                        </div>
                </a>
            </div>
            <div class="card-body ">
                    <h5 class="card-title">Suites</h5>
                    <p class="card-text">P2,500.00 per night with breakfast
                        /P1,500.00 per additional pax with free breakfast.</p>
                    <!-- Button trigger modal -->
                    <br>
                    <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#reserve"
                        style="border-radius: 20px;">
                        Book Now
                    </button> -->
                </div>
            </div>
            <div class="col-md-3">
                <div class="image-container">
                    <a href="{{url('convention_center') }}">
                        <img class="card-img-top mt-3" src="{{ asset('nvdcpics') }}/convention2.jpg" alt="Card image cap" style="max-height: 14rem">
                            <div class="image-overlay card-img-top mt-3" style="max-height: 14rem">
                                <p>View</p>
                            </div>
                    </a>
                </div>
                    <div class="card-body">
                        <h5 class="card-title">Convention Center</h5>
                            <p class="card-text">Venue for personal and corporate
                                celebrations,
                                training/learning sessions and sports activities.</p>
                            <!-- Button trigger modal -->
                        <br>
                        <!-- <button type="button" class="btn btn-success" style="border-radius: 20px;">
                            <a href="{{ url('guest_event') }}" class="text-white">
                                Inquire Now
                            </a> -->

                    </button>
                </div>
            </div>
            <div class="col-md-3">
                <div class="image-container">
                    <a href="{{url('function_room') }}">
                        <img class="card-img-top mt-3" src="{{ asset('nvdcpics') }}/functionroom3.jpg" alt="Card image cap" style="max-height: 14rem">
                            <div class="image-overlay card-img-top mt-3" style="max-height: 14rem">
                                <p>View</p>
                            </div>
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Function Rooms</h5>
                    <p class="card-text">Function room basic inclusions for either social event or trainings/seminar or
                        convention center.</p>

                    <!-- <button type="button" class="btn btn-success" style="border-radius: 20px;">
                        <a href="{{ url('guest_event') }}" class="text-white">
                            Inquire Now
                        </a>
                    </button> -->
                </div>
            </div>
            <div class="col-md-3">
            <div class="image-container">
                    <a href="{{url('commercial_spaces') }}">
                        <img class="card-img-top mt-3" src="{{ asset('nvdcpics') }}/cspaces2.jpg" alt="Card image cap" style="max-height: 14rem">
                            <div class="image-overlay card-img-top mt-3" style="max-height: 14rem">
                                <p>View</p>
                            </div>
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Commercial Spaces</h5>
                    <p class="card-text">We are offering commercial spaces for lease with an introductory rate for as low
                        as Php 3,500 per
                        month! </p>

                    <!-- <button type="button" class="btn btn-success" style="border-radius: 20px;">
                        <a href="{{ url('guest_commercial') }}" class="text-white">
                            Apply Now
                        </a>
                    </button> -->
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

        .imgslider {
            filter: brightness(70%);
        }
       
        .image-container {
    position: relative;
    }

    .image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* black with 50% opacity */
    color: white;
    text-align: center;
    visibility: hidden;
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
    }

    .image-container:hover .image-overlay {
    visibility: visible;
    opacity: 1;
    }

    .image-overlay p {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 20px;
    font-weight:bold;
    font-family:sans-serif;
    letter-spacing:1px;
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

        function price_count() {
            var pax_num = document.getElementById("pax_num");
            var room_price = document.getElementById("room_price");
            if (pax_num.value == 1) {
                room_price.value = "P2,500.00";
            } else if (pax_num.value == 2) {
                room_price.value = "P4,000.00";
            } else if (pax_num.value == 3) {
                room_price.value = "P5,500.00";
            } else if (pax_num.value == 4) {
                room_price.value = "P6,500.00";
            }
        }

    </script>
    </div>
    @include('layouts.footers.guest')
    <div class="container mt--5 pb-5"></div>
@endsection
