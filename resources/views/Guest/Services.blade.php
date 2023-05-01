@extends('layouts.guest', ['title' => __('User Profile')])

@section('content')
    @include('layouts.navbars.navs.guestloggedin')

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
    <div class="row">
        <div class="col-md-4" style="margin: 0; padding: 0">
            <img src="{{ asset('nvdcpics') }}/nv9.png" class="img-fluid">
        </div>
        <div class="col-md-4" style="margin: 0; padding: 0">
            <img src="{{ asset('nvdcpics') }}/nv9.png" class="img-fluid">
        </div>
        <div class="col-md-4" style="margin: 0; padding: 0">
            <img src="{{ asset('nvdcpics') }}/nv9.png" class="img-fluid">
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
