@extends('layouts.printpage')

@section('content')
    @foreach ($list as $list)
        <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
        <div class="row d-flex justify-content-center">
            <div class="col-md-9 mt-5">
                <div class="row align-items-center pt-4">
                    <div class="col">
                        <h3>Event Application
                            Form</h3>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md pt-4">
                        <p>Client Name <span class="text-danger">*</span></p>
                        <input type="text" name="client_name" value="{{ $list->client_name }}" class="form-control"
                            placeholder="Enter client name" maxlength="64" disabled>
                    </div>
                    <div class="col-md pt-4">
                        <p>Contact Number <span class="text-danger">*</span></p>
                        <input type="number" onKeyPress="if(this.value.length==11) return false;"
                            title="Please use a 10 digit mobile number with no dashes or dots" name="contact_no"
                            value="{{ $list->contact_no }}" class="form-control" placeholder="09XXXXXXXX" disabled>
                    </div>
                </div>
                
                <div class="row ">
                    <div class="col-md pt-4">
                        <p>Billing Address <span class="text-danger">*</span></p>
                        <input type="text" value="{{ $list->billing_address }}" name="billing_address" maxlength="82"
                            class="form-control" placeholder="Enter billing address" disabled>
                    </div>
                    <div class="col-md pt-4">
                        <p>Contact Email <span class="text-danger">*</span></p>
                        <input type="email" value="{{ $list->email_address }}" name="email_address" class="form-control"
                            placeholder="Enter email address" maxlength="32" disabled>
                    </div>
                </div>

                <p class="pt-4">&nbsp Event
                    Information</p>
                <div class="row">
                    <div class="col-md pt-4">
                        <p>Event Name <span class="text-danger">*</span></p>
                        <input type="text" name="event_name" value="{{ $list->event_type }}" class="form-control"
                            placeholder="Enter event name" maxlength="64" disabled>
                    </div>
                    <div class="col-md pt-4">
                        <p>Event Type <span class="text-danger">*</span></p>
                        <input type="text" name="event_type" value="{{ $list->event_date }}" class="form-control"
                            placeholder="Enter event type" maxlength="32" disabled>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md pt-4">
                        <p>Event Date/Time <span class="text-danger">*</span></p>
                        <input class="form-control" name="event_date" value="{{ $list->event_date }}" type="date"
                            onkeydown="return false" id="example-datetime-local-input" disabled>
                    </div>
                    <div class="col-md pt-4">
                        <span>
                            <p>Expected No. of Guest <span class="text-danger">*</span></p>
                            <input type="number" name="no_of_guest" value="{{ $list->no_of_guest }}" class="form-control"
                                placeholder="Enter expected no. of guest" disabled>
                        </span>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-12">
                        <span>
                            <br>
                            <br>
                            <p>Caterer <span class="text-danger">*</span></p>
                            <div class="row">
                                <div class="col-md-4">
                                    <input value="{{ $list->caterer }}" class="form-control-sm" type="text"
                                        name="caterer" id="specify_caterer_text" maxlength="32" disabled>
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
                                    <input value="{{ $list->audio_visual }}" class="form-control-sm" type="text"
                                        name="audio_visual" id="specify_audio_visual_text" maxlength="32" disabled>
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
                                    <input value="{{ $list->concept }}" class="form-control-sm" type="text"
                                        name="concept" id="specify_concept_text" maxlength="32" disabled>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
                <br>
                <br>
                <p class="text-red">Corkage fee of P50.00 per head will apply for non-accredited caterer.</p>
                <p class="text-center font-weight-bold">
                    This information requested in this profiling is voluntary and confidential and is not to
                    be
                    used for any purpose. The bearer understand its content and voluntarily give his/her
                    consent
                    for the collection use, processing, storage and retention of his/her personal data
                    subject
                    to RA 10173 - Data Privacy Act of 2021.
                </p>
            </div>
        </div>
    @endforeach
@endsection
@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
