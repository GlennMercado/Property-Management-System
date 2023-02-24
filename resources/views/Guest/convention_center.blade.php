@extends('layouts.guest', ['class' => 'bg-light'])

@section('content')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <div class="card mt-6 d-flex justify-content-center" style="width: 100%;">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
        <div class="image-container" style="height: 25vh">
            <a href="{{ asset('nvdcpics') }}/convention2.jpg" data-lightbox="photos">
                <img class="hw-20 img" src="{{ asset('nvdcpics') }}/convention2.jpg" style="width:100%; height: 50vh">
            </a>
        </div>
        <div class="card-body">
            <div class="container-fluid bg-white mt-1" id="conventionCenter">
                <div class="row d-flex justify-content-center">
                    <div class="card col-md-7 pt-4 shadow p-3 mb-5">

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
                                        placeholder="Enter client name" maxlength="64" required>
                                </div>
                                <div class="col-md pt-4">
                                    <p>Contact Number <span class="text-danger">*</span></p>
                                    <input type="number" onKeyPress="if(this.value.length==10) return false;"
                                        title="Please use a 10 digit mobile number with no dashes or dots" name="contact_no"
                                        class="form-control" placeholder="09XXXXXXXX" required>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md pt-4">
                                    <p>Contact Person <span class="text-danger">*</span></p>
                                    <input type="text" name="contact_person" class="form-control"
                                        placeholder="Enter contact person" maxlength="64" required>
                                </div>
                                <div class="col-md pt-4">
                                    <p>Contact Person Number <span class="text-danger">*</span></p>
                                    <input type="number" onKeyPress="if(this.value.length==10) return false;"
                                        title="Please use a 10 digit mobile number with no dashes or dots"
                                        name="contact_person_no" class="form-control" placeholder="09XXXXXXXX" required>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md pt-4">
                                    <p>Billing Address <span class="text-danger">*</span></p>
                                    <input type="text" name="billing_address" maxlength="82" class="form-control"
                                        placeholder="Enter billing address" required>
                                </div>
                                <div class="col-md pt-4">
                                    <p>Contact Email <span class="text-danger">*</span></p>
                                    <input type="email" name="email_address" class="form-control"
                                        placeholder="Enter email address" maxlength="32" required>
                                </div>
                            </div>

                            <p class="pt-4">&nbsp Event
                                Information</p>
                            <div class="row">
                                <div class="col-md pt-4">
                                    <p>Event Name <span class="text-danger">*</span></p>
                                    <input type="text" name="event_name" class="form-control"
                                        placeholder="Enter event name" maxlength="64" required>
                                </div>
                                <div class="col-md pt-4">
                                    <p>Event Type <span class="text-danger">*</span></p>
                                    <input type="text" name="event_type" class="form-control"
                                        placeholder="Enter event type" maxlength="32" required>
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
                                        <input type="number" name="no_of_guest" class="form-control"
                                            placeholder="Enter expected no. of guest" required>
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <span>
                                        <br>
                                        <br>
                                        <p>Venue<span class="text-danger">*</span></p>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="radio" name="venue" value="yes">
                                                Yes
                                            </div>
                                            <div class="col-md-4">
                                                <input type="radio" name="venue" value="venue_value_no">
                                                No (If no, please specify)
                                            </div>
                                            <div class="col-md-4">
                                                <input style="display:none" class="form-control-sm" type="text"
                                                    name="venue" id="specify_venue_text" maxlength="32">
                                            </div>
                                        </div>
                                    </span>
                                </div>
                                <div class="col-md-12">
                                    <span>
                                        <br>
                                        <br>
                                        <p>Caterer <span class="text-danger">*</span></p>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="radio" name="caterer" value="yes">
                                                Yes
                                            </div>
                                            <div class="col-md-4">
                                                <input type="radio" name="caterer" value="caterer_value_no">
                                                No (If no, please specify)
                                            </div>
                                            <div class="col-md-4">
                                                <input style="display:none;" class="form-control-sm" type="text"
                                                    name="caterer" id="specify_caterer_text" maxlength="32">
                                            </div>
                                        </div>
                                    </span>
                                </div>
                                <div class="col-md-12">
                                    <span>
                                        <br>
                                        <br>
                                        <p>Audio/Visual <span class="text-danger">*</span></p>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="radio" name="audio_visual" value="yes">
                                                Yes
                                            </div>
                                            <div class="col-md-4">
                                                <input type="radio" name="audio_visual" value="audio_visual_value_no">
                                                No (If no, please specify)
                                            </div>
                                            <div class="col-md-4">
                                                <input style="display:none;" class="form-control-sm" type="text"
                                                    name="audio_visual" id="specify_audio_visual_text" maxlength="32">
                                            </div>
                                        </div>
                                    </span>
                                </div>
                                <div class="col-md-12">
                                    <span>
                                        <br>
                                        <br>
                                        <p>Event Concept And Styling <span class="text-danger">*</span></p>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="radio" name="concept" value="yes">
                                                Yes
                                            </div>
                                            <div class="col-md-4">
                                                <input type="radio" name="concept" value="concept_value_no">
                                                No (If no, please specify)
                                            </div>
                                            <div class="col-md-4">
                                                <input style="display:none;" class="form-control-sm" type="text"
                                                    name="concept" id="specify_concept_text" maxlength="32">
                                            </div>
                                        </div>
                                    </span>
                                </div>
                            </div>
                            <br>
                            <br>
                            <p class="text-red">Corkage fee of P50.00 per head will apply for non-accredited caterer.</p>
                            <br>
                            <br>
                            <br>
                            <p class="text-center font-weight-bold">
                                This information requested in this profiling is voluntary and confidential and is not to
                                be
                                used for any purpose. The bearer understand its content and voluntarily give his/her
                                consent
                                for the collection use, processing, storage and retention of his/her personal data
                                subject
                                to RA 10173 - Data Privacy Act of 2021.
                            </p>
                            <input type="submit"
                                class="btn btn-outline-success text-white bg-green mx-auto d-flex justify-content-center"
                                style="width:40%;">
                            <br>
                            <br>
                    </div>
                    </form>
                    <div class="col-md-4" style="margin-top: 12%">
                        <h2 class="ml-3 title1" style="font-size: 2.5rem;">Convention Center</h2>
                        <!-- Gallery -->
                        <div class="row shadow p-3 mb-5 gal" style="margin: 15px">
                            <div class="col-md-12">
                                <p class="display-5">Photos</p>
                            </div>
                            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                                <a href="{{ asset('nvdcpics') }}/BCourt1.jpg" data-lightbox="photos"
                                    data-gallery="gallery">
                                    <img src="{{ asset('nvdcpics') }}/BCourt1.jpg"
                                        class="w-100 shadow-1-strong rounded mb-4" />
                                </a>
                                <a href="{{ asset('nvdcpics') }}/functionport.jpg" data-lightbox="photos"
                                    data-gallery="gallery">
                                    <img src="{{ asset('nvdcpics') }}/functionport.jpg"
                                        class="w-100 shadow-1-strong rounded mb-4 d-none d-md-block " />
                                </a>
                            </div>

                            <div class="col-lg-4 mb-4 mb-lg-0">
                                <a href="{{ asset('nvdcpics') }}/hotel3.jpg" data-lightbox="photos"
                                    data-gallery="gallery">
                                    <img src="{{ asset('nvdcpics') }}/hotel3.jpg"
                                        class="w-100 shadow-1-strong rounded mb-4 d-none d-md-block " />
                                </a>
                                <a href="{{ asset('nvdcpics') }}/hotel14.jpg" data-lightbox="photos"
                                    data-gallery="gallery">
                                    <img src="{{ asset('nvdcpics') }}/hotel14.jpg"
                                        class="w-100 shadow-1-strong rounded mb-4 d-none d-md-block " />
                                </a>
                                <a href="{{ asset('nvdcpics') }}/convention3.jpg" data-lightbox="photos"
                                    data-gallery="gallery">
                                    <img src="{{ asset('nvdcpics') }}/convention3.jpg"
                                        class="w-100 shadow-1-strong rounded mb-4 d-none d-md-block " />
                                </a>
                            </div>

                            <div class="col-lg-4 mb-4 mb-lg-0">
                                <a href="{{ asset('nvdcpics') }}/BCourt3.jpg" data-lightbox="photos"
                                    data-gallery="gallery">
                                    <img src="{{ asset('nvdcpics') }}/BCourt3.jpg"
                                        class="w-100 shadow-1-strong rounded mb-4 d-none d-md-block " />
                                </a>
                                <a href="{{ asset('nvdcpics') }}/functionport1.jpg" data-lightbox="photos"
                                    data-gallery="gallery">
                                    <img src="{{ asset('nvdcpics') }}/functionport1.jpg"
                                        class="w-100 shadow-1-strong rounded mb-4 d-none d-md-block " />
                                </a>


                            </div>
                            <div class="col-md-12">
                                <p id="section2">A convention center is a large facility that is designed to host
                                    conventions, trade
                                    shows,
                                    conferences, and other events. They typically feature large exhibit halls, meeting
                                    rooms,
                                    and banquet spaces, as well as amenities such as on-site hotels and restaurants.</p>
                            </div>
                        </div>
                        <!-- Gallery -->
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
            </div> --}}

            <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
            </body>

            <style>
                input[type="number"]::-webkit-outer-spin-button,
                input[type="number"]::-webkit-inner-spin-button {
                    -webkit-appearance: none;
                    margin: 0;
                }

                input[type="number"] {
                    -moz-appearance: textfield;
                }

                .gal img:hover {
                    transform: scale(1.05);
                }

                .title1:hover {
                    transform: scale(1.01);
                    cursor: pointer;
                }

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
                $(document).on("click", '[data-toggle="lightbox"]', function(event) {
                    event.preventDefault();
                    $(this).ekkoLightbox();
                });
                $("input[name='venue']").change(function() {
                    if ($(this).val() == "yes") {
                        $("#specify_venue_text").hide();
                        $('#specify_venue_text').removeAttr('required');
                    } else {
                        $("#specify_venue_text").show();
                        $('#specify_venue_text').attr('required', true);
                    }
                })
                $("input[name='caterer']").change(function() {
                    if ($(this).val() == "yes") {
                        $("#specify_caterer_text").hide();
                        $('#specify_caterer_text').removeAttr('required');
                    } else {
                        $("#specify_caterer_text").show();
                        $('#specify_caterer_text').attr('required', true);
                    }
                })
                $("input[name='audio_visual']").change(function() {
                    if ($(this).val() == "yes") {
                        $("#specify_audio_visual_text").hide();
                        $('#specify_audio_visual_text').removeAttr('required');
                    } else {
                        $("#specify_audio_visual_text").show();
                        $('#specify_audio_visual_text').attr('required', true);
                    }
                })
                $("input[name='concept']").change(function() {
                    if ($(this).val() == "yes") {
                        $("#specify_concept_text").hide();
                        $('#specify_concept_text').removeAttr('required');
                    } else {
                        $("#specify_concept_text").show();
                        $('#specify_concept_text').attr('required', true);
                    }
                })
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
                $('.prevent_submit').on('submit', function() {
                    $('.prevent_submit').attr('disabled', 'true');
                });
            </script>
            @include('layouts.footers.guest')
        @endsection
