@extends('layouts.guest', ['class' => 'bg-light'])

@section('content')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <div class="card mt-6 d-flex justify-content-center" style="width: 100%;">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
        <div class="card-body">
            <div class="image-grid">
                <div class="image-container">
                    <img class="hw-20 img" src="{{ asset('nvdcpics') }}/convention2.jpg" style="width:100%;">
                    <p class="image-text title">Convention Center</p>
                    <div class="btn-container">
                        <a href="#section2" class="btn btn-outline-light txt">Events</a>
                        <a href="#section3" class="btn btn-outline-light txt">Make Event</a>
                    </div>
                </div>
            </div>
            <!-- section 2 -->
            <div class="row first" id="section2">
                <div class="col-8 pt-8">
                    <!-- <h3>Description</h3> -->
                    <div class="card" style="width: 100%;">
                        <img class="card-img-top">
                        <div class="card-body">
                            <h2 class="card-title d-flex justify-content-center uppercase text-uppercase title">Upcoming
                                Events</h2>
                            <div class="row">
                                <div class="col-5">
                                    <p style="color:#8898aa;">Date</p>
                                </div>
                                <div class="col-4">
                                    <p style="color:#8898aa;">Time</p>
                                </div>
                                <div class="col-3">
                                    <p style="color:#8898aa;">Event</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <p class="card-text">February 10, 2023</p>
                                </div>
                                <div class="col-4">
                                    <p class="card-text">7:00 pm</p>
                                </div>
                                <div class="col-3">
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
                        <li class="list-group-item list-group-item-action list-group-item-light">What types of events can be
                            held at the convention center?</li>
                        <li class="list-group-item list-group-item-action list-group-item-light">Are there any parking
                            facilities available for attendees?</li>
                    </ul>

                </div>
            </div>
            <div class="row pt-4">
                <div class="col">
                    <p class="">A convention center is a large facility that is designed to host conventions, trade
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
            <div class="container-fluid bg-white mt-7" id="conventionCenter">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-9 mt-5">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="mb-0">Event Application Form (Step 1)</h3>
                            </div>
                        </div>
                        <h3 style="color: #8898aa;">Tell us about you</h3>
                        <form action="{{ url('/convention_center_submit') }}" id="myform" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col">
                                    <h4>Client Name: </h4>
                                    <input type="text" name="client_name" class="form-control"
                                        placeholder="Enter client name" required>
                                </div>
                                <div class="col">
                                    <h4>Contact Number: </h4>
                                    <input type="number" name="contact_no" class="form-control"
                                        placeholder="Enter contact no." id="mobile" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h4>Contact Person: </h4>
                                    <input type="text" name="contact_person" class="form-control"
                                        placeholder="Enter contact person" required>
                                </div>
                                <div class="col">
                                    <h4>Contact Person Mobile Number: </h4>
                                    <input type="number" name="contact_person_no" class="form-control"
                                        placeholder="Enter contact no." id="mobile1" required>
                                </div>
                            </div>
                            <h4>Billing Address: </h4>
                            <input type="text" name="billing_address" class="form-control"
                                placeholder="Enter billing address" required>
                            <h4>Contact Email: </h4>
                            <input type="email" name="email_address" class="form-control"
                                placeholder="Enter email address" required>
                            <br>
                            <h3 style="color: #8898aa;">Tell us about your event</h3>
                            <br>
                            <h4>Event Name: </h4>
                            <input type="text" name="event_name" class="form-control" placeholder="Enter event name"
                                required>
                            <h4>Event Type: </h4>
                            <input type="text" name="event_type" class="form-control" placeholder="Enter event type"
                                required>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <h4>Event Date: </h4>
                                    <input class="form-control chck" name="event_date" type="date"
                                        onkeydown="return false" id="" required>
                                </div>
                                <div class="col">
                                    <h4>Event Time: </h4>
                                    <input class="form-control" name="event_time" type="time"
                                        onkeydown="return false" id="example-datetime-local-input" required>
                                </div>
                                <div class="col">
                                    <span>
                                        <h4>Expected No. of Guest: </h4>
                                        <input type="number" name="no_of_guest"
                                            class="form-control form-control-alternative"
                                            placeholder="Enter expected no. of guest" required>
                                    </span>
                                </div>
                                <div class="col-md-12">
                                    <span>
                                        <br>
                                        <br>
                                        <h4>Venue</h4>
                                        <div class="row">
                                            <div class="col-md-3">
                                                Yes <input type="radio" name="venue" value="yes" />
                                            </div>
                                            <div class="col-md-3">
                                                No (If no, please specify venue) <input type="radio" name="venue"
                                                    value="venue_value_no" />
                                            </div>
                                            <div class="col-md-3">
                                                <input style="display:none;" class="form-control-sm" type="text" name="venue"
                                                    id="specify_venue_text" />
                                            </div>
                                        </div>
                                    </span>
                                </div>
                                <div class="col-md-12">
                                    <span>
                                        <br>
                                        <br>
                                        <h4>Caterer</h4>
                                        <div class="row">
                                            <div class="col-md-3">
                                                Yes <input type="radio" name="caterer" value="yes" />
                                            </div>
                                            <div class="col-md-3">
                                                No (If no, please specify venue) <input type="radio" name="caterer"
                                                    value="caterer_value_no" />
                                            </div>
                                            <div class="col-md-3">
                                                <input style="display:none;" class="form-control-sm" type="text" name="caterer"
                                                    id="specify_caterer_text" />
                                            </div>
                                        </div>
                                    </span>
                                </div>
                                <div class="col-md-12">
                                    <span>
                                        <br>
                                        <br>
                                        <h4>Audio/Visual</h4>
                                        <div class="row">
                                            <div class="col-md-3">
                                                Yes <input type="radio" name="audio_visual" value="yes" />
                                            </div>
                                            <div class="col-md-3">
                                                No (If no, please specify venue) <input type="radio" name="audio_visual"
                                                    value="audio_visual_value_no" />
                                            </div>
                                            <div class="col-md-3">
                                                <input style="display:none;" class="form-control-sm" type="text" name="audio_visual"
                                                    id="specify_audio_visual_text" />
                                            </div>
                                        </div>
                                    </span>
                                </div>
                                <div class="col-md-12">
                                    <span>
                                        <br>
                                        <br>
                                        <h4>Event concept and styling</h4>
                                        <div class="row">
                                            <div class="col-md-3">
                                                Yes <input type="radio" name="concept" value="yes" />
                                            </div>
                                            <div class="col-md-3">
                                                No (If no, please specify venue) <input type="radio" name="concept"
                                                    value="concept_value_no" />
                                            </div>
                                            <div class="col-md-3">
                                                <input style="display:none;" class="form-control-sm" type="text" name="concept"
                                                    id="specify_concept_text" />
                                            </div>
                                        </div>
                                    </span>
                                </div>

                            </div>
                            <br>
                            <br>
                            <p class="text-red">Corkage fee of P50.00 per head will apply for non-accredited caterer.</p>
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
                    </div>
                    <br>
                    <input type="submit" class="btn btn-success btn-lg btn-block col-md-9"></button>
                    <br>
                    </form>
                </div>
            </div>
            {{--  --}}

        </div>
    </div>
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

        .btn:hover {
            background-color: #909090;
            transition: 0.5s ease-in-out;
        }

        p {
            font-family: montserrat;
            text-align: justify;
            font-size: 18px;
        }

        .txt {
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

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
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
    <script>
        $(document).ready(function() { //DISABLED PAST DATES IN APPOINTMENT DATE
            var dateToday = new Date();
            var month = dateToday.getMonth() + 1;
            var day = dateToday.getDate();
            var year = dateToday.getFullYear();

            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;

            $('.chck').attr('min', maxDate);
        });


        var max_chars = 10;

        $('#mobile').keydown(function(e) {
            if ($(this).val().length >= max_chars) {
                $(this).val($(this).val().substr(0, max_chars));
            }
        });

        $('#mobile').keyup (function(e) {
            if ($(this).val().length >= max_chars) {
                $(this).val($(this).val().substr(0, max_chars));
            }
        });

        $('#mobile1').keydown(function(e) {
            if ($(this).val().length >= max_chars) {
                $(this).val($(this).val().substr(0, max_chars));
            }
        });

        $('#mobile1').keyup (function(e) {
            if ($(this).val().length >= max_chars) {
                $(this).val($(this).val().substr(0, max_chars));
            }
        });

        $("input[name='venue']").change(function() {

            if ($(this).val() == "venue_value_no") {
                $("#specify_venue_text").show();
            } else {
                $("#specify_venue_text").hide();
            }
        });
        $("input[name='caterer']").change(function() {
            if ($(this).val() == "caterer_value_no") {
                $("#specify_caterer_text").show();
            } else {
                $("#specify_caterer_text").hide();
            }
        })       
        $("input[name='audio_visual']").change(function() {
            if ($(this).val() == "audio_visual_value_no") {
                $("#specify_audio_visual_text").show();
            } else {
                $("#specify_audio_visual_text").hide();
            }
        })   
        $("input[name='concept']").change(function() {
            if ($(this).val() == "concept_value_no") {
                $("#specify_concept_text").show();
            } else {
                $("#specify_concept_text").hide();
            }
        })
    </script>
    @include('layouts.footers.guest')
@endsection
