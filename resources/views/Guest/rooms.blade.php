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
                    <img class="img-fluid" src="{{ asset('nvdcpics') }}/nvdcpic1.jpg" title="Convention Center" style="width:100%">
                </a>
            </div>
            <div class="col-md-8">
                @foreach ($room as $room)
                    <div class="card float-left gal col-md-3 mt-2" style="min-height: 450px">
                        <img class="card-img-top img1 mt-3" src="{{ $room->Hotel_Image }}" alt="Card image cap">
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
    </div>
    @include('layouts.footers.guest')
@endsection
