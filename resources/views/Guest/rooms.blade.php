@extends('layouts.guest', ['class' => 'bg-light'])

@section('content')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <div class="container-fluid bg-white mt-6">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <h1 class="mt-5">Rooms</h1>
                @foreach ($list as $list)
                    <div class="card float-left gal" style="width: 18rem; min-height: 550px">
                        <img class="card-img-top" src="{{ asset('nvdcpics') }}/hotel5.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h2 class="text-green">₱{{ $list->Rate_per_Night }}</h2>
                            <h5 class="card-title">Room {{ $list->Room_No }}</h5>
                            <p class="card-text">
                            <h4 class="text-muted">Room Size:</h4> {{ $list->Room_Size }}
                            <br>
                            <h4 class="text-muted">Number of Beds:</h4> {{ $list->No_of_Beds }}
                            </p>
                            <a href="#" class="text-decoration-none"><button
                                    class="form-control bg-green text-white">Reserve Now</button></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <style>
        .gal img:hover {
            transform: scale(1.01);
        }
    </style>
    @include('layouts.footers.guest')
@endsection
