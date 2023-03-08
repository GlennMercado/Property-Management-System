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
                    <img class="img-fluid" src="{{ asset('nvdcpics') }}/nvdcpic1.jpg" title="Convention Center">
                </a>
            </div>
            <div class="col-md-8 mt-3">

            </div>
            <div class="col-md-8">
                @foreach ($room as $room)
                    <div class="card float-left gal col-md-3 mt-2" style="min-height: 550px">
                        <img class="card-img-top img1 mt-3" src="{{ $room->Hotel_Image }}" alt="Card image cap">
                        <div class="card-body">
                            <h2 class="text-green">₱{{ $room->Rate_per_Night }}</h2>
                            <h5 class="card-title">Room {{ $room->Room_No }}</h5>
                            <p class="card-text">
                            <h4 class="text-muted">Room Size:</h4> {{ $room->Room_Size }}
                            <br>
                            <h4 class="text-muted">Number of Beds:</h4> {{ $room->No_of_Beds }}
                            </p>
                            <a href="{{ url('/suites', ['id' => $room->Room_No]) }}" class="text-decoration-none">
                                <button class="form-control bg-green text-white">Reserve Now</button>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @include('layouts.footers.guest')
@endsection
