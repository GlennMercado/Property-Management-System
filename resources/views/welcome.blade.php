@extends('layouts.welcome_layout', ['class' => 'bg-light'])

@section('content')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <div class="position-relative">
        <img class="img" src="{{ asset('nvdcpics') }}/NovadeciHomepage.png" style="width:100%;">
        <h2 class="image-text font-weight-light uppercase">Welcome to</h2>
        <h1 class="image-text2 font-weight-light uppercase">Novadeci Properties</h1>
        <div class="group">
            <a href="#">
                <p class="mr-2">hotels </p>
            </a>
            <a href="#">
                <p class="mr-2">convention center </p>
            </a>
            <a href="#">
                <p class="mr-2">function rooms </p>
            </a>
            <a href="#">
                <p class="mr-2">commercial spaces </p>
            </a>
        </div>
    </div>
    <div class="container-fluid bg-white pt-4">
        <p
            class=" pt-2 pr-6 d-flex justify-content-center text-uppercase position-absolute w-100 align-items-center txt txt1 text-light">
            our</p>

        <p class="pt-5 d-flex justify-content-center text-uppercase txt txt2">services</p>
        <div class="row d-flex justify-content-center pt-4">
            <div class="col-md-3">
                <div class="image-container">
                    <a href="{{ url('suites') }}">
                        <img class="card-img-top" src="{{ asset('nvdcpics') }}/Suites.jpg" alt="Card image cap"
                            style="max-height: 12.3rem">
                        <div class="image-overlay card-img-top" style="max-height: 12.3rem">
                            <p>View</p>
                        </div>
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Suites</h5>
                    <p class="card-text">P2,500.00 per night with breakfast
                        /P1,500.00 per additional pax with free breakfast.</p>
                    <!-- <button type="button" class="btn btn-success" style="border-radius: 20px;">
                            <a href="{{ route('login') }}" class="text-white">
                                Book Now
                            </a>
                        </button> -->
                </div>
            </div>
            <div class="col-md-3">
                <div class="image-container">
                    <a href="{{ url('convention_center') }}">
                        <img class="card-img-top" src="{{ asset('nvdcpics') }}/ConventionCenter.jpg"
                            alt="Card image cap" style="max-height: 12.3rem">
                        <div class="image-overlay card-img-top" style="max-height: 12.3rem">
                            <p>View</p>
                        </div>
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Convention Center</h5>
                    <p class="card-text">Venue for personal and corporate
                        celebrations,
                        training/learning sessions and sports activities.</p>
                    <!-- <button type="button" class="btn btn-success" style="border-radius: 20px;">
                            <a href="{{ route('login') }}" class="text-white">
                                Book Now
                            </a>
                        </button> -->
                </div>
            </div>
            <div class="col-md-3">
                <div class="image-container">
                    <a href="{{ url('function_room') }}">
                        <img class="card-img-top" src="{{ asset('nvdcpics') }}/FunctionRooms.jpg" alt="Card image cap"
                            style="max-height: 12.3rem">
                        <div class="image-overlay card-img-top" style="max-height: 12.3rem">
                            <p>View</p>
                        </div>
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Function Rooms</h5>
                    <p class="card-text">Function room basic inclusions for either social event or trainings/seminar or
                        convention center.</p>

                    <!-- <button type="button" class="btn btn-success" style="border-radius: 20px;">
                            <a href="{{ route('login') }}" class="text-white">
                                Book Now
                            </a>
                        </button> -->
                </div>
            </div>
            <div class="col-md-3">
                <div class="image-container">
                    <a href="{{ url('commercial_spaces') }}">
                        <img class="card-img-top" src="{{ asset('nvdcpics') }}/CommercialSpaces.jpg"
                            alt="Card image cap" style="max-height: 12.3rem">
                        <div class="image-overlay card-img-top" style="max-height: 12.3rem">
                            <p>View</p>
                        </div>
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Commercial Spaces</h5>
                    <p class="card-text">Looking for a place for your business to grow your market? Here at NVDC
                        Properties,
                        we are offering commercial spaces for lease with an introductory rate for as low as Php 3,500 per
                        month! </p>

                    <!-- <button type="button" class="btn btn-success" style="border-radius: 20px;">
                            <a href="{{ route('login') }}" class="text-white">
                                Book Now
                            </a>
                        </button> -->
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-white pt-4">
        <div class="card-body">
            <p
                class="pt-3 pr-7 d-flex justify-content-center text-uppercase position-absolute w-100 align-items-center txt txt1 text-light">
                Nvdc</p>
            <p class="pt-5 d-flex justify-content-center text-uppercase txt txt2">novadeci properties</p>

            <div class="row ml-2 pt-4">
                <div class="col-7">
                    <p class="txt txt3">The convention center houses function rooms which can accomodate from small groups
                        and up to 400 guests.
                    </p>
                    <p class="txt txt3">Its main activity center, very much appropriate for large-scale events can be filled
                        up to 2,500 guests!
                    </p>
                    <p class="txt txt3">Also within the complex is a 17-room hotel with room size of 26-38 sq. meters.
                    </p>
                    <p class="txt txt3">
                        The perfect pre-event prep place or post-event recharging place! Parking
                        concerns
                    </p>
                    <p class="txt txt3">
                        Never a problem with over a hundred parking spaces for 2-wheel and 4-wheel
                        vehicles
                    </p>
                </div>
                <div class="col-5">
                    <img src="{{ asset('nvdcpics') }}/convention.jpg" alt="" style="max-height: 15rem">
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-white pt-6">
        <div class="card-body">
            <div class="container">
                <div class="row g-2">
                    <div class="col-3">
                        <i class="bi bi-people-fill d-flex justify-content-center fa-4x" style="color:#159D9D;"></i>
                        <p class="uppercase d-flex justify-content-center txt txt4">Accomodate Guests</p>
                        <p class="uppercase d-flex justify-content-center txt txt5 mx-auto">2,500</p>
                    </div>
                    <div class="col-3">
                        <i class="fas fa-bed d-flex justify-content-center fa-4x" style="color:#159D9D;"></i>
                        <p class="uppercase d-flex justify-content-center txt txt4">Suite Rooms</p>
                        <p class="uppercase d-flex justify-content-center txt txt5 mx-auto">17</p>
                    </div>
                    <div class="col-3">
                        <i class="fas fa-door-closed d-flex justify-content-center fa-4x" style="color:#159D9D;"></i>
                        <p class="uppercase d-flex justify-content-center txt txt4">Function Rooms</p>
                        <p class="uppercase d-flex justify-content-center txt txt5 mx-auto">5</p>
                    </div>
                    <div class="col-3">
                        <i class="fas fa-building d-flex justify-content-center fa-4x" style="color:#159D9D;"></i>
                        <p class="uppercase d-flex justify-content-center txt txt4">Convention center</p>
                        <p class="uppercase d-flex justify-content-center txt txt5 mx-auto">1</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-white pt-4 ">
        <div class="card-body ">
            <p
                class="pt-3 pr-7 d-flex justify-content-center text-uppercase position-absolute w-100 align-items-center txt1 text-light txt ">
                Nvdc</p>
            <p class="pt-5 d-flex justify-content-center text-uppercase txt txt2">novadeci properties</p>
        </div>
    </div>
    <div class="container-fluid bg-white pt-4 ">
        <div class="card-body ">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100 imgslider" src="{{ asset('nvdcpics') }}/BCourt1.jpg">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 imgslider" src="{{ asset('nvdcpics') }}/hotel12.jpg">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 imgslider" src="{{ asset('nvdcpics') }}/FunctionRoom7.jpg">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 imgslider" src="{{ asset('nvdcpics') }}/cspaces2.jpg">
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
    </div>
    <div class="container-fluid bg-white pt-6">
        <div class="card-body">
            <p
                class="pt-3 pr-7 d-flex justify-content-center text-uppercase position-absolute w-100 align-items-center txt1 text-light txt ">
                Nvdc</p>
            <p class="pt-5 d-flex justify-content-center text-uppercase txt txt2">Novadeci Location</p>
            <div class="container-fluid bg-white">
                <div class="text-center mt-7">
                    <!-- <h1 class="display-1">NVDC Properties Location</h1> -->
                    <br>
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8 cards1">
                            <div class="shadow1">
                                <div class="mapouter">
                                    <div class="gmap_canvas"><iframe class="gmap_iframe" height="400px" width="100%"
                                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                                            src="https://maps.google.com/maps?width=660&amp;height=500px&amp;hl=en&amp;q=Brgy, 123 General Luis, Novaliches, Lungsod Quezon, Kalakhang Maynila&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a
                                            href="https://formatjson.org/"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="card-text">Brgy, 123 General Luis, Novaliches, Lungsod Quezon, Kalakhang Maynila
                                </p>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-white pt-6">
        <div class="card-body">
            <p
                class="pt-3 pr-7 d-flex justify-content-center text-uppercase position-absolute w-100 align-items-center txt1 text-light txt ">
                Nvdc</p>
            <p class="pt-5 d-flex justify-content-center text-uppercase txt txt2">Frequently asked questions</p>
        </div>
    </div>
    <div class="container-fluid bg-white pt-2">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="dropdown show d-flex justify-content-center">
                        <a class="btn dropdown-toggle uppercase txt5" href="#" role="button"
                            id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Convention center
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">Answer 1</a>
                            <a class="dropdown-item" href="#">Answer 2</a>
                            <a class="dropdown-item" href="#">Answer 3</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="dropdown show d-flex justify-content-center pt-4">
                        <a class="btn dropdown-toggle uppercase txt5" href="#" role="button"
                            id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Hotel
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">Answer 1</a>
                            <a class="dropdown-item" href="#">Answer 2</a>
                            <a class="dropdown-item" href="#">Answer 3</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="dropdown show d-flex justify-content-center pt-4">
                        <a class="btn dropdown-toggle uppercase txt5" href="#" role="button"
                            id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            function rooms
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">Answer 1</a>
                            <a class="dropdown-item" href="#">Answer 2</a>
                            <a class="dropdown-item" href="#">Answer 3</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="dropdown show d-flex justify-content-center pt-4 mb-8">
                        <a class="btn dropdown-toggle uppercase txt5" href="#" role="button"
                            id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            commercial spaces
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">Answer 1</a>
                            <a class="dropdown-item" href="#">Answer 2</a>
                            <a class="dropdown-item" href="#">Answer 3</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        /* section1 */
        .img {
            height: 700px;
            object-fit: cover;
            filter: brightness(50%)
        }
        .image-text {
            position: absolute;
            top: 44%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 36px;
            font-weight: bold;
            text-align: center;
            filter: brightness(50%);
            font-family: montserrat;
        }

        .image-text2 {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-weight: bold;
            text-align: center;
            font-size: 65px;
            letter-spacing: 1px;
            font-family: montserrat;
        }

        .group {
            display: flex;
            position: absolute;
            top: 58%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-weight: bold;
            text-align: center;
            letter-spacing: 1px;
            font-family: montserrat;
        }

        .group p {
            text-transform: uppercase;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .txt {
            font-family: montserrat;
        }

        .txt1 {
            font-size: 60px;
        }

        .txt2 {
            color: #000000;
            filter: brightness(100%);
            font-size: 30px;

        }

        .txt3 {
            font-size: 13px;
        }

        .txt4 {}

        .txt5 {
            width: 200px;
        }

        .imgslider {
            max-height: 30rem;
            object-fit: cover;
        }

        /* overlay */
        .image-container {
            position: relative;
            overflow: hidden;
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* black with 50% opacity */
            color: white;
            text-align: center;
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.4s ease-in-out;
        }
        img{
            transition: 0.4s ease-in-out;
        }
        .image-container:hover .image-overlay {
            visibility: visible;
            opacity: 1;
        }
        .image-container:hover img{
            transform: scale(1.2);   
        }
        .image-overlay p {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 20px;
            font-weight: bold;
            font-family: sans-serif;
            letter-spacing: 1px;
        }

        @media (max-width: 600px) {
            .image-text {
                font-size: 15px;
            }

            .image-text2 {
                font-size: 20px;
            }

            .group {}

            .group p {
                font-size: 5px;
            }

            .txt5 {
                padding-right: 185px;
            }

        }
    </style>
@endsection
