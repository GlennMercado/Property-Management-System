@extends('layouts.guest', ['title' => __('User Profile')])

@section('content')
    @include('layouts.navbars.navs.guestloggedin')

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
    <div class="row">
        <div class="col-md-6" style="margin: 0; padding: 0">
            <img src="{{ asset('nvdcpics') }}/nv9.png" class="img-fluid">
        </div>
        <div class="col-md-6 p-6" style="background-color: rgb(51, 60, 82)">
            <h1 class="text-white mt-6">Hotel</h1>
            <p class="text-white mt-4">Looking for a place for your business to grow your market? Here at NVDC Properties,
                we are offering commercial spaces for lease with an introductory rate for as low as Php 3,500 per month!
            </p>
            <a class="btn btn-success   " href="#appli" title="">Checked</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 p-6" style="background-color: rgb(51, 60, 82)">
            <h1 class="text-white mt-6">Convetion center</h1>
            <p class="text-white mt-4">Looking for a place for your business to grow your market? Here at NVDC Properties,
                we are offering commercial spaces for lease with an introductory rate for as low as Php 3,500 per month!
            </p>
            <a class="btn btn-success   " href="#appli" title="">Checked</a>
        </div>
        <div class="col-md-6" style="margin: 0; padding: 0">
            <img src="{{ asset('nvdcpics') }}/nv9.png" class="img-fluid">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6" style="margin: 0; padding: 0">
            <img src="{{ asset('nvdcpics') }}/nv9.png" class="img-fluid">
        </div>
        <div class="col-md-6 p-6" style="background-color: rgb(51, 60, 82)">
            <h1 class="text-white mt-6">Commercial spaces</h1>
            <p class="text-white mt-4">Looking for a place for your business to grow your market? Here at NVDC Properties,
                we are offering commercial spaces for lease with an introductory rate for as low as Php 3,500 per month!
            </p>
            <a class="btn btn-success   " href="#appli" title="">Checked</a>
        </div>
    </div>
    <style>
        .img1 img{
            filter: blur(1px) brightness(49%);
            -webkit-filter: blur(1px) brightness(49%);
            -moz-filter: blur(1px) brightness(49%);
        }
    </style>
@endsection
