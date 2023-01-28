@extends('layouts.guest', ['class' => 'bg-light'])

@section('content')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<div class="card mt-6 d-flex justify-content-center" style="width: 100%;">
    <h1 class = "mx-auto pt-6 text-uppercase title">Function Room</h1>
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
            <div class="container-fluid bg-white mt-7" id="conventionCenter">
        <div class="row d-flex justify-content-center">
            <div class="col-md-9 mt-5">
                <div class="row align-items-center">
                    <div class="col">
                    <!-- <div class="btn btn-primary">1</div> -->
                    <!-- Section 2 -->
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
    </div>
</div>
<style>
    body{
        margin:0;
    }
    .image-grid{
        --gap: 14px;
        --num-cols: 4;
        --row-height: 200px;

        box-sizing:border-box;
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
    font-weight:bold;
    font-size:30px;
    text-decoration:underline;
    color:white;
    top: 36.5%;
    left: 86%;
    transform: translate(-50%, -50%);
    cursor:pointer;
}
.seventh{
    filter: brightness(0.25);
    
}
/* Information */
.container{

}
p{
    font-family:sans-serif;
    text-align:justify;
}
.txt{
    font-family:sans-serif;
}
.title {
    letter-spacing:1px;
}
.scrl {
    scroll-behavior: smooth;
}.animate__animated {
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