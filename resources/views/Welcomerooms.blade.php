@extends('layouts.welcome_layout', ['class' => 'bg-light'])

@section('content')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <div class="container-fluid bg-white mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 mt-5 banner1">
                <a href="{{ url('convention_center') }}">
                    <img class="img-fluid" src="{{ asset('nvdcpics') }}/nvdcpic1.jpg" title="Convention Center">
                </a>
            </div>
            @foreach ($list as $list)
                <div class="card p-4 col-md-7 m-3 card1 rounded">
                    <a href="{{ url('login') }}">
                        <div class="row">
                            <div class="col-md-6">
                                <img class="img-fluid" src="{{ $list->Hotel_Image }}" alt="Card image cap">
                            </div>
                            <div class="col-md-6">
                                <h2 class="pt-2">
                                    Room Number {{ $list->Room_No }}
                                </h2>
                                <h3 class="text-dark">
                                    <span class="badge badge-pill pills border"><i class="bi bi-wifi"></i> Free Wifi</span>
                                    <span class="badge badge-pill pills border"><i class="bi bi-egg-fried"></i> Breakfast
                                        Included</span>
                                    <span class="badge badge-pill pills border"><i class="bi bi-car-front-fill"></i>
                                        Parking</span>
                                </h3>
                                <h4 class="card-body">
                                    <i class="bi bi-rulers"></i> {{ $list->Room_Size }} Square Meters
                                    <br>
                                    <i><img src="{{ asset('nvdcpics') }}/p1.svg" style="height: 20px; width: 20px"></i>
                                    {{ $list->No_of_Beds }} bed
                                    <br>
                                    <i><img src="{{ asset('nvdcpics') }}/person1.svg" style="height: 20px; width: 20px"></i>
                                    2 pax (Maximum of 4)
                                    <br>
                                    <i class="bi bi-person-plus-fill" style="font-size: 20px"></i> PHP 1,500 per additional
                                    pax
                                </h4>
                                <h1 class="text-green card-footer" id="money">
                                    PHP {{ $list->Rate_per_Night }}
                                </h1>
                            </div>
                        </div>
                        <div class="col-md-12 pt-4">
                            <h4>Note: The standard check-in / out time is after 1400 hours (02:00 pm) and the check-out time
                                is 12:00 noon.</h4>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <style>
        .card1:hover {
            background-color: aliceblue;
            box-shadow: -1px 3px 35px 0px rgba(0, 0, 0, 0.29);
            -webkit-box-shadow: -1px 3px 35px 0px rgba(0, 0, 0, 0.29);
            -moz-box-shadow: -1px 3px 35px 0px rgba(0, 0, 0, 0.29);
        }

        .pills {
            background-color: rgb(227, 237, 243);
        }

        .banner1 {
            height: 60%;
            width: 100%;
        }

        .banner1 img {
            width: 100%;
        }
    </style>
    <script></script>
@endsection
