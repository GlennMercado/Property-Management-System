@extends('layouts.guest', ['class' => 'bg-light'])

@section('content')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <div class="card mt-6 d-flex justify-content-center" style="width: 100%;">
        <h1 class="mx-auto pt-6 text-uppercase title">Function Room Photos</h1>
        <div class="card-body">
            <div class="row shadow p-3 mb-5" style="margin: 15px">
                <div class="col-md-6">
                    <a href="{{ asset('nvdcpics') }}/FunctionRoom1.jpg" data-lightbox="photos" data-gallery="gallery">
                        <img src="{{ asset('nvdcpics') }}/FunctionRoom1.jpg" class="w-100 shadow-1-strong rounded mb-4" />
                    </a>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <a href="{{ asset('nvdcpics') }}/FunctionRoom2.jpg" class="col-md-6" data-lightbox="photos"
                            data-gallery="gallery">
                            <img src="{{ asset('nvdcpics') }}/FunctionRoom2.jpg"
                                class="w-100 shadow-1-strong rounded mb-4 img-fluid" />
                        </a>
                        <a href="{{ asset('nvdcpics') }}/FunctionRoom3.jpg" class="col-md-6" data-lightbox="photos"
                            data-gallery="gallery">
                            <img src="{{ asset('nvdcpics') }}/FunctionRoom3.jpg"
                                class="w-100 shadow-1-strong rounded mb-4 img-fluid" />
                        </a>
                        <a href="{{ asset('nvdcpics') }}/FunctionRoom4.jpg" class="col-md-6" data-lightbox="photos"
                            data-gallery="gallery">
                            <img src="{{ asset('nvdcpics') }}/FunctionRoom4.jpg"
                                class="w-100 shadow-1-strong rounded mb-4 img-fluid" />
                        </a>
                        <a href="{{ asset('nvdcpics') }}/FunctionRoom5.jpg" class="col-md-6" data-lightbox="photos"
                            data-gallery="gallery">
                            <img src="{{ asset('nvdcpics') }}/FunctionRoom5.jpg"
                                class="w-100 shadow-1-strong rounded mb-4 img-fluid" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
@endsection
