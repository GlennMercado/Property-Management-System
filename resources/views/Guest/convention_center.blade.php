@extends('layouts.guest', ['class' => 'bg-light'])

@section('content')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <div class="card mt-6 d-flex justify-content-center" style="width: 100%;">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
        <div class="card-body">
            <h1 class=" d-flex justify-content-center pt-4" id="section1">Convention Center</h1>
            <div class="container-fluid bg-white mt-4" id="conventionCenter">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-9 pt-4">

                        <div class="row align-items-center pt-4">
                            <div class="col">
                                <h3><span><button class="btn btn-success" disabled>1</button></span> &nbsp Event Application
                                    Form</h3>
                            </div>
                        </div>
                        {{-- <h4 style="color: #8898aa;">Tell us about you </h4> --}}
                        <form action="{{ url('/convention_center_submit') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row ">
                                <div class="col-md pt-4">
                                    <p>Client Name <span class="text-danger">*</span></p>
                                    <input type="text" name="client_name" class="form-control"
                                        placeholder="Enter client name" required>
                                </div>
                                <div class="col-md pt-4">
                                    <p>Contact Number <span class="text-danger">*</span></p>
                                    <input type="number" name="contact_no" class="form-control"
                                        placeholder="Enter contact no." required>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md pt-4">
                                    <p>Contact Person <span class="text-danger">*</span></p>
                                    <input type="text" name="contact_person" class="form-control"
                                        placeholder="Enter contact person" required>
                                </div>
                                <div class="col-md pt-4">
                                    <p>Contact Number <span class="text-danger">*</span></p>
                                    <input type="number" name="contact_person_no" class="form-control"
                                        placeholder="Enter contact no." required>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md pt-4">
                                    <p>Billing Address <span class="text-danger">*</span></p>
                                    <input type="text" name="billing_address" class="form-control"
                                        placeholder="Enter billing address" required>
                                </div>
                                <div class="col-md pt-4">
                                    <p>Contact Email <span class="text-danger">*</span></p>
                                    <input type="text" name="email_address" class="form-control"
                                        placeholder="Enter email address" required>
                                </div>
                            </div>

                            <h3 class="pt-6"><span><button class="btn btn-success" disabled>2</button></span> &nbsp Event
                                Information</h3>
                            <div class="row">
                                <div class="col-md pt-4">
                                    <p>Event Name <span class="text-danger">*</span></p>
                                    <input type="text" name="event_name" class="form-control"
                                        placeholder="Enter event name" required>
                                </div>
                                <div class="col-md pt-4">
                                    <p>Event Type <span class="text-danger">*</span></p>
                                    <input type="text" name="event_type" class="form-control"
                                        placeholder="Enter event type" required>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md pt-4">
                                    <p>Event Date/Time <span class="text-danger">*</span></p>
                                    <input class="form-control" name="event_date" type="date" onkeydown="return false"
                                        id="example-datetime-local-input" required>
                                </div>
                                <div class="col-md pt-4">
                                    <span>
                                        <p>Expected No. of Guest <span class="text-danger">*</span></p>
                                        <input type="number" name="no_of_guest"
                                            class="form-control form-control-alternative"
                                            placeholder="Enter expected no. of guest" required>
                                    </span>
                                </div>
                            </div>
                            <br>
                            <br>
                            <p>Corkage fee of P50.00 per head will apply for non-accredited caterer.</p>
                            <br>
                            <br>
                            <br>
                            <p>
                                This information requested in this profiling is voluntary and confidential and is not to
                                be
                                used for any purpose. The bearer understand its content and voluntarily give his/her
                                consent
                                for the collection use, processing, storage and retention of his/her personal data
                                subject
                                to RA 10173 - Data Privacy Act of 2021.
                            </p>
                            <input type="submit" class="btn btn-success btn-lg btn-block"></button>
                    </div>
                    </form>
                </div>
            </div>
            <div class="position-relative">
                <div class="image-grid pt-6">
                    <div class="image-container">
                        <img class="hw-20 img" src="{{ asset('nvdcpics') }}/convention2.jpg" style="width:100%;">
                        <div class="container mx-auto">

                            <div class="btn-container">
                                <h1 class="image-text font-weight-light uppercase text-light text-uppercase display-1">
                                    Convention Center</h1>
                                <a href="#section1" class="btn btn-outline-light txt mt-6">Make Event</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- section 2 -->


            {{-- <div class="row first" id="section2">
                <div class="col-8 pt-8"> --}}

                    <!-- <h3>Description</h3> -->

                    {{-- <div class="card">
                        <img class="card-img-top">
                        <div class="card-body">
                            <h2 class="card-title d-flex justify-content-center uppercase text-uppercase title">Upcoming
                                Events</h2>
                            <div class="row">
                                <div class="col-md-5">
                                    <p style="color:#8898aa;">Date</p>
                                </div>
                                <div class="col-md-4">
                                    <p style="color:#8898aa;">Time</p>
                                </div>
                                <div class="col-md-3">
                                    <p style="color:#8898aa;">Event</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <p class="card-text">February 10, 2023</p>
                                </div>
                                <div class="col-md-4">
                                    <p class="card-text">7:00 pm</p>
                                </div>
                                <div class="col-md-3">
                                    <p class="card-text">E-sport</p>
                                </div>
                                <hr class="hr" />
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <p class="card-text">February 20, 2023</p>
                                </div>
                                <div class="col-4">
                                    <p class="card-text">8:00 pm</p>
                                </div>
                                <div class="col-3">
                                    <p class="card-text">Business</p>
                                </div>
                                <hr class="hr" />
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <p class="card-text">March 1, 2023</p>
                                </div>
                                <div class="col-4">
                                    <p class="card-text">8:00 am</p>
                                </div>
                                <div class="col-3">
                                    <p class="card-text">Wedding</p>
                                </div>
                                <hr class="hr" />
                            </div>
                            <a href="#section3" class="btn btn-success d-flex justify-content-center">Inquire Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-4 pt-8 second">
                    <ul class="list-group">
                        <li class="list-group-item disabled">FAQs:</li>
                        <li class="list-group-item list-group-item-action list-group-item-light">What are the hours of
                            operation for the convention center?</li>
                        <li class="list-group-item list-group-item-action list-group-item-light">What are the capacity
                            limits for the various event spaces?</li>
                        <li class="list-group-item list-group-item-action list-group-item-light">What types of events can
                            be
                            held at the convention center?</li>
                        <li class="list-group-item list-group-item-action list-group-item-light">Are there any parking
                            facilities available for attendees?</li>
                    </ul>

                </div>
            </div> --}}
            <div class="row pt-8">
                <div class="col">
                    <p class="" id="section2">A convention center is a large facility that is designed to host conventions, trade
                        shows,
                        conferences, and other events. They typically feature large exhibit halls, meeting rooms,
                        and banquet spaces, as well as amenities such as on-site hotels and restaurants. Convention
                        centers can be found in cities across the world and are often the centerpiece of a city's
                        convention and tourism industry. They provide a central location for businesses and organizations
                        to showcase their products, services, and ideas to a large audience. Additionally, convention
                        centers also provide a platform for networking and knowledge sharing among professionals in
                        various industries.</p>
                </div>
            </div>
            {{--  --}}

        </div>
    </div>
    {{-- <div class="btn-container">
        <a href="#section2" class="btn btn-outline-light txt">Events</a>
        <a href="#section3" class="btn btn-outline-light txt">Make Event</a>
    </div> --}}
    <style>
        /* Information */
        .img {
            height: 700px;
            object-fit: cover;
            filter: brightness(50%)
        }

        .image-text {
            position: absolute;
            top: 11%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 36px;
            font-weight: bold;
            text-align: center;
        }

        .btn-container {
            position: absolute;
            top: 350px;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            text-align: center;
        }

        p {
            font-family: montserrat;
            text-align: justify;
            font-size: 18px;
        }

        h1,
        h3,
        .text {
            font-family: montserrat;
        }

        .title {
            font-family: montserrat;
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

        html {
            scroll-behavior: smooth;
        }

        @media (max-width: 800px) {
            .btn-container {
                top: 400px;
            }
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
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script> -->
    <script>
        function enableinput() {
            $('input[type=radio][name=customRadioInline1]').change(function() {
                if (this.id == 'customRadioInline2') {
                    $('#others').attr('readonly', false);
                } else {
                    $('#others').val('');
                    $('#others').attr('readonly', true);

                }
            })
        }

        function enableinput2() {
            $('input[type=radio][name=customRadioInline2]').change(function() {
                if (this.id == 'customRadioInline4') {
                    $('#others2').attr('readonly', false);
                } else {
                    $('#others2').val('');
                    $('#others2').attr('readonly', true);

                }
            })
        }
    </script>
    @include('layouts.footers.guest')
@endsection
