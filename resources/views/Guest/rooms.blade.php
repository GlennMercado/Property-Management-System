@extends('layouts.guest', ['class' => 'bg-light'])

@section('content')
    <link rel="stylesheet" href="{{ asset('css') }}/rooms.css">
    <script src="{{ asset('Javascript') }}/suites.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <div class="container-fluid bg-white mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 mt-5 banner1">
                <a href="{{ url('convention_center') }}">
                    <img class="img-fluid" src="{{ asset('nvdcpics') }}/nvdcpic1.png" title="Convention Center">
                </a>
            </div>
            @forelse ($room as $list)
                <div class="card p-4 col-md-7 m-3 card1 rounded">
                    <a href="{{ url('/suites', ['id' => $list->Room_No]) }}">
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
                                    <i><img src="{{ asset('nvdcpics') }}/person1.svg"
                                            style="height: 20px; width: 20px"></i>
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
                            <h4>Note: The standard check-in is 2:00 pm and the standard check-out time
                                is 12:00 pm.</h4>
                        </div>
                    </a>
                </div>
            @empty
                <img src="{{ asset('nvdcpics') }}/roomempty.svg" class="img-fluid" style="width: 100%; height: 300px">
                <p class="text-center display-4">There are no rooms available</p>
            @endforelse
        </div>
    </div>
    {{-- <div class="container-fluid bg-white mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 mt-5 banner1">
                <a href="{{ url('convention_center') }}">
                    <img class="img-fluid" src="{{ asset('nvdcpics') }}/nvdcpic1.jpg" title="Convention Center" style="width:100%">
                </a>
            </div>
            <div class="col-md-10">
                @foreach ($room as $room)
                    <div class="card float-left gal col-md-3 p-2 mt-2" style="min-height: 450px">
                        <img class="card-img-top img1" src="{{ $room->Hotel_Image }}" alt="Card image cap">
                        <div class="card-body">
                            <h1 class="text-green">₱{{ $room->Rate_per_Night }}</h1>
                            <h2 class="card-title">Room {{ $room->Room_No }}</h2>
                            <h4 class="text-muted">{{ $room->Room_Size }} sqr m</h4>
                            <h4 class="text-muted">{{ $room->No_of_Beds }} Bed</h4>
                            <a href="{{ url('/suites', ['id' => $room->Room_No]) }}" class="text-decoration-none">
                                <button class="form-control bg-green text-white">Reserve Now</button>
                            </a>
                        </div>
                    </div>  
                @endforeach
            </div>
        </div>
    </div> --}}
@endsection
