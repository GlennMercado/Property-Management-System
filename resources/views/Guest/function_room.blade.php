@extends('layouts.guest', ['class' => 'bg-light'])

@section('content')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <div class="card mt-6 d-flex justify-content-center" style="width: 100%;">
        <h1 class="mx-auto pt-6 text-uppercase title">Function Room</h1>
        <div class="card-body">
            <div class="image-grid">
                <img class="image-grid-col-2 image-grid-row-2" src="{{ asset('nvdcpics') }}/FunctionRoom2.jpg">
                <img class="" src="{{ asset('nvdcpics') }}/FunctionRoom1.jpg">
                <!-- <img class="" src="{{ asset('nvdcpics') }}/FunctionRoom3.jpg"> -->
                <img class="" src="{{ asset('nvdcpics') }}/FunctionRoom4.jpg">
                <img class="" src="{{ asset('nvdcpics') }}/FunctionRoom5.jpg">
                <!-- <img class="" src="{{ asset('nvdcpics') }}/FunctionRoom6.jpg"> -->
                <img class="" src="{{ asset('nvdcpics') }}/FunctionRoom7.jpg">
            </div> 
        </div>
        <style>
            body {
                margin: 0;
            }

            .image-grid {
                --gap: 14px;
                --num-cols: 4;
                --row-height: 200px;

                box-sizing: border-box;
                padding: var(--gap);

                display: grid;
                grid-template-columns: repeat(var(--num-cols), 1fr);
                grid-auto-rows: var(--row-height);
                gap: var(--gap);
            }

            .image-grid>img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .image-grid-col-2 {
                grid-column: span 4;
            }

            .image-grid-row-2 {
                grid-row: span 2;
            }

            /* Anything udner 1024px */
            @media screen and (max-width: 1024px) {
                .image-grid {
                    --num-cols: 1;
                    --row-height: 200px;
                }
            }

            .centered {
                position: absolute;
                font-weight: bold;
                font-size: 30px;
                text-decoration: underline;
                color: white;
                top: 36.5%;
                left: 86%;
                transform: translate(-50%, -50%);
                cursor: pointer;
            }

            .seventh {
                filter: brightness(0.25);

            }

            /* Information */
            .container {}

            p {
                font-family: sans-serif;
                text-align: justify;
            }

            .txt {
                font-family: sans-serif;
            }

            .title {
                letter-spacing: 1px;
            }

            .scrl {
                scroll-behavior: smooth;
            }

            .animate__animated {
                animation-duration: 1s;
                animation-fill-mode: both;
            }

            .parent {
                display: flex;
                justify-content: center;
            }

            /* .centered {
        font-size:30px;
      position: absolute;
      bottom: 410px;
      right: 200px;
      color:white;
      -webkit-text-stroke-width: 1px;
      -webkit-text-stroke-color: black;
    } */
        </style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
        <!-- <img class="card-img-top mt-2 ml-5 largepic" src="{{ asset('nvdcpics') }}/hotel1.jpg"> -->
        @include('layouts.footers.guest')
        <!-- <div class="container mt--5 pb-5"></div> -->
        <!-- {{ asset('nvdcpics') }}/hotel1.jpg -->
    @endsection
