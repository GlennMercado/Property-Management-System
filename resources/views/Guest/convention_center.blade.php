@extends('layouts.guest', ['class' => 'bg-light'])

@section('content')
    <link rel="stylesheet" href="{{ asset('css') }}/convention_center.css">
    <script src="{{ asset('Javascript') }}/convention_center.js"></script>
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
                    </div>
                    </form>
                    <div class="col-md-4" style="margin-top: 12%">
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
                    </div>
                </div>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
            </body>
            @include('layouts.footers.guest')
        @endsection
