@extends('layouts.guest', ['class' => 'bg-light'])
@section('content')
    <link rel="stylesheet" href="{{ asset('css') }}/convention_center.css">
    <script src="{{ asset('Javascript') }}/convention_center.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">

    <div id="carousel" class="carousel slide mt-6" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
            <li data-target="#carousel" data-slide-to="3"></li>
        </ol>

        <div class="carousel-inner" role="listbox">

            <div class="carousel-item active">
                <img src="{{ asset('nvdcpics') }}/nv4.png" class="img-fluid">
                <div class="caption d-none d-lg-block">
                    <h1>The NOVADECI CONVENTION CENTER</h1>
                    <h2>is the first coop-owned convention center in the Philippines. It is being managed by NVDC
                        Properties.</h2>
                    <a class="btn btn-success" href="#appli" title="">Inquire Now</a>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('nvdcpics') }}/nv3.png" class="img-fluid" alt="">
            </div>

            <div class="carousel-item">
                <img src="{{ asset('nvdcpics') }}/nv2.png" class="img-fluid" alt="">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('nvdcpics') }}/nv1.png" class="img-fluid" alt="">
            </div>

        </div>

        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

    </div>
    <div class="row">
        <div class="col-md-7 row" style="margin: 0; padding: 0">
            <div class="col-md-12 imgpad">
                <a href="{{ asset('nvdcpics') }}/FunctionRoom7.png" data-lightbox="photos">
                    <img src="{{ asset('nvdcpics') }}/FunctionRoom7.png" class="img-fluid"
                        style="margin: 0; padding: 0; height:100%">
                </a>
            </div>
            <div class="col-md-4 imgpad">
                <a href="{{ asset('nvdcpics') }}/FunctionRoom6.png" data-lightbox="photos">
                    <img src="{{ asset('nvdcpics') }}/FunctionRoom6.png" class="img-fluid img2">
                </a>
            </div>
            <div class="col-md-4 imgpad">
                <a href="{{ asset('nvdcpics') }}/FunctionRoom5.png" data-lightbox="photos">
                    <img src="{{ asset('nvdcpics') }}/FunctionRoom5.png" class="img-fluid img2">
                </a>
            </div>
            <div class="col-md-4 imgpad">
                <a href="{{ asset('nvdcpics') }}/FunctionRoom4.png" data-lightbox="photos">
                    <img src="{{ asset('nvdcpics') }}/FunctionRoom4.png" class="img-fluid img2">
                </a>
            </div>
        </div>
        <div class="col-md-5 p-6" style="background-color: rgb(51, 60, 82); margin: 0; padding: 0">
            <h1 class="text-white">FUNCTION ROOMS</h1>
            <hr class="bg-white">
            <h2 class="text-white">• Function Room A</h2>
            <p class="text-white">
                <i class="bi bi-rulers"></i> 170 sq. m.
                <br>
                <i class="bi bi-people-fill"></i> 100 pax capacity;
                <br>-projector with wide screen, basic sound system composed of speakers,
                microphones and audio mixer (1200 watts).
            </p>
            <h2 class="text-white">• Function Room B</h2>
            <p class="text-white">
                <i class="bi bi-rulers"></i> 176 sq. m.
                <br>
                <i class="bi bi-people-fill"></i> 120 pax capacity
            </p>
            <h2 class="text-white">• Function Room C</h2>
            <p class="text-white">
                <i class="bi bi-rulers"></i> 176 sq. m.
                <br>
                <i class="bi bi-people-fill"></i> 120 pax capacity
            </p>
            <h2 class="text-white">• Function Room D</h2>
            <p class="text-white">
                <i class="bi bi-rulers"></i> 160 sq. m.
                <br>
                <i class="bi bi-people-fill"></i> 100 pax capacity
            </p>
            <h2 class="text-white">• Function Room E</h2>
            <p class="text-white">
                <i class="bi bi-rulers"></i> 120 sq. m. <br>
                <i class="bi bi-people-fill"></i> 60 pax capacity
            </p>
            <h2 class="text-white">• Function Room F</h2>
            <p class="text-white">
                <i class="bi bi-rulers"></i> 364 sq. m.
            </p>
        </div>
    </div>

    {{-- <div class="d-flex justify-content-center p-6 c3-main">
        <div class="card shadow-lg c3 p-4 m-2 d-none d-md-block">
            <img src="{{ asset('nvdcpics') }}/commercial1.jpg" class="img-fluid">
        </div>
        <div class="card shadow-lg c3 p-4 m-2 d-none d-md-block">
            <img src="{{ asset('nvdcpics') }}/convention1.jpg" class="img-fluid">
        </div>
        <div class="card shadow-lg c3 p-4 m-2 d-none d-md-block">
            <img src="{{ asset('nvdcpics') }}/function1.jpg" class="img-fluid">
        </div>
        <div class="card shadow-lg c3 p-4 m-2 d-none d-md-block">
            <img src="{{ asset('nvdcpics') }}/cspaces.jpg" class="img-fluid">
        </div>
        <div class="row d-lg-none">
            <div class="col-md-6 card shadow-lg c3 p-4 m-2">
                <img src="{{ asset('nvdcpics') }}/function1.jpg" class="img-fluid">
            </div>
            <div class="col-md-6 card shadow-lg c3 p-4 m-2">
                <img src="{{ asset('nvdcpics') }}/cspaces.jpg" class="img-fluid">
            </div>
            <div class="col-md-6 card shadow-lg c3 p-4 m-2">
                <img src="{{ asset('nvdcpics') }}/function1.jpg" class="img-fluid">
            </div>
            <div class="col-md-6 card shadow-lg c3 p-4 m-2">
                <img src="{{ asset('nvdcpics') }}/cspaces.jpg" class="img-fluid">
            </div>
        </div>
    </div> --}}

    <div class="card d-flex justify-content-center" style="width: 100%;" id="appli">
        <div class="card-body">
            <div class="container-fluid bg-white mt-1" id="conventionCenter">
                <div class="row d-flex justify-content-center">
                    <div class="card col-md-7 pt-4 shadow p-3 mb-5">

                        <div class="row align-items-center pt-4">
                            <div class="col">
                                <h3><span><button class="btn btn-success" disabled>1</button></span> &nbsp Event
                                    Application
                                    Form</h3>
                            </div>
                        </div>
                        <h4 style="color: #8898aa;">Tell us about you </h4>
                        <form action="{{ url('/convention_center_submit') }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row ">
                                <div class="col-md pt-4">
                                    <p>Client Name <span class="text-danger">*</span></p>
                                    <input type="text" id="name" name="client_name" class="form-control"
                                        placeholder="Enter client name" maxlength="64" onchange="validateName()">
                                    <p id="name-error" style="color: red; font-size: 14px;"></p>
                                </div>
                                <div class="col-md pt-4">
                                    <p>Contact Number <span class="text-danger">*</span></p>
                                    <input type="number" onKeyPress="if(this.value.length==11) return false;"
                                        minlength = "11"
                                        title="Please use a 11 digit mobile number with no dashes or dots"
                                        name="contact_no" class="form-control" placeholder="09XXXXXXXX" id="contact"
                                        onchange="validateContact()">
                                    <p id="contact-error" style="color: red; font-size: 14px;"></p>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md pt-4">
                                    <p>Contact Person <span class="text-danger">*</span></p>
                                    <input type="text" name="contact_person" class="form-control"
                                        placeholder="Enter contact person" maxlength="64" id="contactperson"
                                        onchange="validateContactPerson()">
                                    <p id="cp-error" style="color: red; font-size: 14px;"></p>
                                </div>
                                <div class="col-md pt-4">
                                    <p>Contact Person Number <span class="text-danger">*</span></p>
                                    <input type="number" onKeyPress="if(this.value.length==11) return false;"
                                        title="Please use a 10 digit mobile number with no dashes or dots"
                                        name="contact_person_no" class="form-control" placeholder="09XXXXXXXX"
                                        id="ContactPersonNum" onchange="validateContactPersonNum()">
                                    <p id="ContactPersonNum-error" style="color: red; font-size: 14px;"></p>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md pt-4">
                                    <p>Billing Address <span class="text-danger">*</span></p>
                                    <input type="text" name="billing_address" maxlength="82" class="form-control"
                                        placeholder="Enter billing address" id="address" onchange="validateAddress()">
                                    <p id="address-error" style="color: red; font-size: 14px;"></p>
                                </div>
                                <div class="col-md pt-4">
                                    <p>Contact Email <span class="text-danger">*</span></p>
                                    <input type="email" name="email_address" class="form-control"
                                        placeholder="Enter email address" maxlength="32" id="email"
                                        onchange="validateEmail()">
                                    <p id="email-error" style="color: red; font-size: 14px;"></p>
                                </div>
                            </div>

                            <p class="pt-4">&nbsp Event
                                Information</p>
                            <div class="row">
                                <div class="col-md pt-4">
                                    <p>Event Name <span class="text-danger">*</span></p>
                                    <input type="text" name="event_name" class="form-control"
                                        placeholder="Enter event name" maxlength="64" id="Event"
                                        onchange="validateEvent()">
                                    <p id="event-error" style="color: red; font-size: 14px;"></p>
                                </div>
                                <div class="col-md pt-4">
                                    <p>Event Type <span class="text-danger">*</span></p>
                                    <select name="event_type" class="form-control" id="EventType"
                                        onchange="validateEventType()">
                                        <option value="Birthday">Birthday</option>
                                        <option value="Wedding">Wedding</option>
                                        <option value="Baptism">Baptism</option>
                                        <option value="Corporate meetings">Corporate meetings</option>
                                        <option value="Basketball practice game">Basketball practice game</option>
                                        <option value="Graduation">Graduation</option>
                                        <option value="">Others</option>
                                    </select>
                                    <!-- <input type="text" name="event_type" class="form-control"
                                                                        placeholder="Enter event type" maxlength="32" id="EventType"
                                                                        onchange="validateEventType()"> -->
                                    <p id="eventType-error" style="color: red; font-size: 14px;"></p>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md pt-4">
                                    <p>Event Date/Time <span class="text-danger">*</span></p>
                                    <input class="form-control" name="event_date" type="date"
                                        onkeydown="return false" id="example-datetime-local-input" id="my-date"
                                        onchange="validateDate()">
                                    <p id="date-error" style="color: red; font-size: 14px;"></p>
                                </div>
                                <div class="col-md pt-4">
                                    <span>
                                        <p>Expected No. of Guest <span class="text-danger">*</span></p>
                                        <input type="number" name="no_of_guest" class="form-control"
                                            placeholder="Enter expected no. of guest" id="No"
                                            onchange="validateNo()">
                                        <p id="no-error" style="color: red; font-size: 14px;"></p>
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <input type="text" name="inquiry_status" value="For Approval" hidden>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function validateName() {
            const nameInput = document.getElementById("name");
            const name = nameInput.value.trim();
            const nameError = document.getElementById("name-error");


            if (!/^[a-zA-Z\s]+$/.test(name)) {
                nameInput.classList.add("invalid");
                nameError.textContent = "Please enter a valid name (letters and spaces only)";
            } else {
                nameInput.classList.remove("invalid");
                nameError.textContent = "";
            }
        }

        function validateContact() {
            const contactInput = document.getElementById("contact");
            const contact = contactInput.value.trim();
            const contactError = document.getElementById("contact-error");


            if (!/^\+?\d{8,15}$/.test(contact)) {
                contactInput.classList.add("invalid");
                contactError.textContent =
                    "Please enter a valid contact number (11 digits only)";
            } else {
                contactInput.classList.remove("invalid");
                contactError.textContent = "";
            }
        }

        function validateContactPerson() {
            const contactpersonInput = document.getElementById("contactperson");
            const contactperson = contactpersonInput.value.trim();
            const contactpersonError = document.getElementById("cp-error");


            if (!/^[a-zA-Z\s]+$/.test(contactperson)) {
                contactpersonInput.classList.add("invalid");
                contactpersonError.textContent = "Please enter a valid name (letters and spaces only)";
            } else {
                contactpersonInput.classList.remove("invalid");
                contactpersonError.textContent = "";
            }
        }

        function validateContactPersonNum() {
            const ContactPersonNumInput = document.getElementById("ContactPersonNum");
            const ContactPersonNum = ContactPersonNumInput.value.trim();
            const ContactPersonNumError = document.getElementById("ContactPersonNum-error");


            if (!/^\+?\d{8,15}$/.test(ContactPersonNum)) {
                ContactPersonNumInput.classList.add("invalid");
                ContactPersonNumError.textContent =
                    "Please enter a valid contact number (11 digits only)";
            } else {
                ContactPersonNumInput.classList.remove("invalid");
                ContactPersonNumError.textContent = "";
            }
        }

        function validateAddress() {
            const addressInput = document.getElementById("address");
            const address = addressInput.value.trim();
            const addressError = document.getElementById("address-error");


            if (address.length === 0) {
                addressInput.classList.add("invalid");
                addressError.textContent = "Please enter your address";
            } else {
                addressInput.classList.remove("invalid");
                addressError.textContent = "";
            }
        }

        function validateEmail() {
            const emailInput = document.getElementById("email");
            const email = emailInput.value.trim();
            const emailError = document.getElementById("email-error");


            if (email.length === 0) {
                emailInput.classList.add("invalid");
                emailError.textContent = "Please enter your email address";
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                emailInput.classList.add("invalid");
                emailError.textContent = "Please enter a valid email address";
            } else {
                emailInput.classList.remove("invalid");
                emailError.textContent = "";
            }
        }

        function validateEvent() {
            const EventInput = document.getElementById("Event");
            const Event = EventInput.value.trim();
            const EventError = document.getElementById("event-error");


            if (!/^[a-zA-Z\s]+$/.test(Event)) {
                EventInput.classList.add("invalid");
                EventError.textContent = "Please enter a valid name (letters and spaces only)";
            } else {
                EventInput.classList.remove("invalid");
                EventError.textContent = "";
            }
        }

        function validateEventType() {
            const EventTypeInput = document.getElementById("EventType");
            const EventType = EventTypeInput.value.trim();
            const EventTypeError = document.getElementById("eventType-error");


            if (!/^[a-zA-Z\s]+$/.test(EventType)) {
                EventTypeInput.classList.add("invalid");
                EventTypeError.textContent = "Please enter a valid name (letters and spaces only)";
            } else {
                EventTypeInput.classList.remove("invalid");
                EventTypeError.textContent = "";
            }
        }

        function validateDate() {
            var inputDate = document.getElementById("my-date").value;
            var isValid = new Date(inputDate).toString() !== "Invalid Date";
            if (!isValid) {
                alert("Please enter a valid date.");
                document.getElementById("my-date").value = "";
            }
        }

        // function validateNo() {
        //     const NoInput = document.getElementById("No");
        //     const No = NoInput.value.trim(); // remove leading/trailing whitespace
        //     const NoError = document.getElementById("no-error");

        //     // Check if contact number is valid
        //     if (!/^\+?\d{8,15}$/.test(No)) {
        //         NoInput.classList.add("invalid");
        //         NoError.textContent =
        //             "Please enter a valid number (2 max digits only)";
        //     } else {
        //         NoInput.classList.remove("invalid");
        //         NoError.textContent = "";
        //     }
        // }
        $(document).on("click", '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
        $("input[name='venue']").change(function() {
            if ($(this).val() == "yes") {
                $("#specify_venue_text").hide();
                $("#specify_venue_text").empty();
                $("#specify_venue_text").val('yes');
                $('#specify_venue_text').removeAttr('required');
            } else if ($(this).val() == "venue_value_no") {
                $("#specify_venue_text").show();
                $("#specify_venue_text").val('');
                $('#specify_venue_text').attr('required', true);
            }
        })
        $("input[name='caterer']").change(function() {
            if ($(this).val() == "yes") {
                $("#specify_caterer_text").hide();
                $("#specify_caterer_text").empty();
                $("#specify_caterer_text").val('yes');
                $('#specify_caterer_text').removeAttr('required');
            } else if ($(this).val() == "caterer_value_no") {
                $("#specify_caterer_text").show();
                $("#specify_caterer_text").val('');
                $('#specify_caterer_text').attr('required', true);
            }
        })
        $("input[name='audio_visual']").change(function() {
            if ($(this).val() == "yes") {
                $("#specify_audio_visual_text").hide();
                $("#specify_audio_visual_text").empty();
                $("#specify_audio_visual_text").val('yes');
                $('#specify_audio_visual_text').removeAttr('required');
            } else if ($(this).val() == "audio_visual_value_no") {
                $("#specify_audio_visual_text").show();
                $("#specify_audio_visual_text").val('');
                $('#specify_audio_visual_text').attr('required', true);
            }
        })
        $("input[name='concept']").change(function() {
            if ($(this).val() == "yes") {
                $("#specify_concept_text").hide();
                $("#specify_concept_text").empty();
                $("#specify_concept_text").val('yes');
                $('#specify_concept_text').removeAttr('required');
            } else if ($(this).val() == "concept_value_no") {
                $("#specify_concept_text").show();
                $("#specify_concept_text").val('');
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
    <style>
        .img2 {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        .imgpad {
            padding: 0;
            overflow: hidden;
        }

        .imgpad img:hover {
            transition: 0.4s ease-in-out;
            transform: scale(1.07);
            filter: brightness(51%);
            -webkit-filter: brightness(51%);
            -moz-filter: brightness(51%);
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
@endsection
