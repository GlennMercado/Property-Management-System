@extends('layouts.guest', ['class' => 'bg-light'])

@section('content')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <div class="container-fluid bg-white mt-7" id="conventionCenter">
        <div class="row d-flex justify-content-center">
            <div class="col-md-9 mt-5">
                <div class="row align-items-center">
                    <div class="col">
                        <h2 class="mb-0">Event Application Form (Step 1)</h3>
                    </div>
                </div>
                <h3 style="color: #8898aa;">Tell us about you</h3>

                <div class="row">
                    <div class="col">
                        <h4>Client Name: </h4>
                        <input type="text" class="form-control" placeholder="Enter client name" required>
                    </div>
                    <div class="col">
                        <h4>Contact Number: </h4>
                        <input type="number" class="form-control" placeholder="Enter contact no." required>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h4>Contact Person: </h4>
                        <input type="text" class="form-control" placeholder="Enter contact person" required>
                    </div>
                    <div class="col">
                        <h4>Contact Number: </h4>
                        <input type="number" class="form-control" placeholder="Enter contact no." required>
                    </div>
                </div>
                <h4>Billing Address: </h4>
                <input type="text" class="form-control" placeholder="Enter billing address" required>
                <h4>Contact Email: </h4>
                <input type="text" class="form-control" placeholder="Enter email address" required>
                <br>
                <h3 style="color: #8898aa;">Tell us about your event</h3>
                <br>
                <h4>Event Name: </h4>
                <input type="text" class="form-control" placeholder="Enter event name" required>
                <h4>Event Type: </h4>
                <input type="text" class="form-control" placeholder="Enter event type" required>
                <br>
                <div class="container">

                    <div class="row">
                        <div class="col">
                            <h4>Event Date/Time: </h4>
                            <input class="form-control" type="datetime-local" value="2018-11-23T10:30:00"
                                id="example-datetime-local-input" required>
                        </div>
                        <div class="col">
                            <span>
                                <h4>Expected No. of Guest: </h4>
                                <input type="number" class="form-control form-control-alternative"
                                    placeholder="Enter expected no. of guest" required>
                            </span>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            <h4>Venue</h4>
                        </div>
                        <div class="col-sm">
                            <div class="custom-control custom-radio custom-control-inline">

                                <input type="radio" id="customRadioInline1" name="customRadioInline1"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline1">Yes</label>

                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="custom-control custom-radio custom-control-inline">

                                <input type="radio" onclick="enableinput()" id="customRadioInline2"
                                    name="customRadioInline1" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline2">No Specify:
                                </label>
                                <input id="others" class="form-control" type="text" readonly>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            <h4>Caterer</h4>
                        </div>
                        <div class="col-sm">
                            <div class="custom-control custom-radio custom-control-inline">

                                <input type="radio" id="customRadioInline3" name="customRadioInline2"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline3">Yes</label>

                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="custom-control custom-radio custom-control-inline">

                                <input type="radio" onclick="enableinput2()" id="customRadioInline4"
                                    name="customRadioInline2" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline4">No Specify:
                                </label>
                                <input id="others2" class="form-control" type="text" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            <h4>Audio/Visual</h4>
                        </div>
                        <div class="col-sm">
                            <div class="custom-control custom-radio custom-control-inline">

                                <input type="radio" id="customRadioInline3" name="customRadioInline2"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline3">Yes</label>

                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="custom-control custom-radio custom-control-inline">

                                <input type="radio" onclick="enableinput2()" id="customRadioInline4"
                                    name="customRadioInline2" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline4">No Specify:
                                </label>
                                <input id="others2" class="form-control" type="text" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            <h4>Event Concenpt and Styling</h4>
                        </div>
                        <div class="col-sm">
                            <div class="custom-control custom-radio custom-control-inline">

                                <input type="radio" id="customRadioInline3" name="customRadioInline2"
                                    class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline3">Yes</label>

                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="custom-control custom-radio custom-control-inline">

                                <input type="radio" onclick="enableinput2()" id="customRadioInline4"
                                    name="customRadioInline2" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline4">No Specify:
                                </label>
                                <input id="others2" class="form-control" type="text" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <p>Corkage fee of P50.00 per head will apply for non-accredited caterer.</p>
                <br>
                <br>
                <p>How did you know of the NOVADECI Convention Center, function room, hotel and commercial spaces?</p>
                <br>
                <div class="row">
                    <div class="col-md-3">

                        <input type="radio" id="customRadioInline3" name="customRadioInline2"
                            class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline3">Social media & website</label>

                    </div>
                    <div class="col-md-3">

                        <input type="radio" id="customRadioInline3" name="customRadioInline2"
                            class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline3">Flyers</label>

                    </div>
                    <div class="col-md-3">

                        <input type="radio" id="customRadioInline3" name="customRadioInline2"
                            class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline3">Telephone call</label>

                    </div>
                    <div class="col-md-3">

                        <input type="radio" id="customRadioInline3" name="customRadioInline2"
                            class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline3">Email</label>

                    </div>
                    <div class="col-md-3">

                        <input type="radio" id="customRadioInline3" name="customRadioInline2"
                            class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline3">Relative/Friend</label>

                    </div>
                    <br>
                    <br>
                    <br>
                    <p>
                        This information requested in this profiling is voluntary and confidential and is not to be used for any purpose. The bearer understand its content and voluntarily give his/her consent for the collection use, processing, storage and retention of his/her personal data subject to RA 10173 - Data Privacy Act of 2021.
                    </p>
                </div>
                <br>
                <input type="submit" class="btn btn-success btn-lg btn-block"></button>
                <br>
            </div>
        </div>
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
        <div class="container mt--5 pb-5">
        </div>
    @endsection
