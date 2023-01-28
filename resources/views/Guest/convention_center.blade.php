@extends('layouts.guest', ['class' => 'bg-light'])

@section('content')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<div class="card mt-6 d-flex justify-content-center" style="width: 100%;">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
        <div class="card-body">
            <div class="image-grid">
                <div class="image-container">
                    <img class="hw-20 img" src="{{ asset('nvdcpics') }}/convention2.jpg" style = "width:100%;">
                        <h1 class="image-text">Convention Center</h1>
                        <div class="btn-container">
                        <a href = "#section2" class="btn btn-outline-light">Events</a>
                        <a href = "#section3" class="btn btn-outline-light">Make Event</a>
                        </div>
                </div>
            </div>


            <div class="row first" id = "section2">
                <div class="col-8 pt-8">
                    <!-- <h3>Description</h3> -->
                    <div class="card" style="width: 100%;">
                            <img class="card-img-top">
                                <div class="card-body">
                                    <h2 class="card-title d-flex justify-content-center uppercase text-uppercase title">Upcoming Events</h2>
                                        <div class="row">
                                            <div class="col-5">
                                                <p style = "color:#8898aa;">Date</p>
                                            </div>
                                                <div class="col-4">
                                                    <p style = "color:#8898aa;">Time</p>
                                                </div>
                                                    <div class="col-3">
                                                        <p style = "color:#8898aa;">Event</p>
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
                            <li class="list-group-item list-group-item-action list-group-item-light">What are the hours of operation for the convention center?</li>
                                <li class="list-group-item list-group-item-action list-group-item-light">What are the capacity limits for the various event spaces?</li>
                                    <li class="list-group-item list-group-item-action list-group-item-light">What types of events can be held at the convention center?</li>
                                        <li class="list-group-item list-group-item-action list-group-item-light">Are there any parking facilities available for attendees?</li>
                    </ul>
                        
                    </div>
                </div>
                <div class="row pt-4">
                    <div class="col">
                        <p class = "">A convention center is a large facility that is designed to host conventions, trade shows, 
                        conferences, and other events. They typically feature large exhibit halls, meeting rooms, 
                        and banquet spaces, as well as amenities such as on-site hotels and restaurants. Convention 
                        centers can be found in cities across the world and are often the centerpiece of a city's 
                        convention and tourism industry. They provide a central location for businesses and organizations 
                        to showcase their products, services, and ideas to a large audience. Additionally, convention 
                        centers also provide a platform for networking and knowledge sharing among professionals in 
                        various industries.</p>
                    </div>
                </div>
                <form action="">
                        <div class="card-body"  id = "section3">
                            <h3 class = "title-color pt-8">Tell us about you</h3>
                            <hr class = "line">
                            <div class = "row pt-1">
                                <div class = "col">
                                    <h4 class = "text-color">Client Name </h4>
                                    <input type="text" class="form-control" placeholder="Enter client name" required>
                                </div>
                                <div class = "col">
                                    <h4 class = "text-color">Contact Number </h4>
                                    <input type="number" class="form-control" placeholder="Enter contact no." required>
                                </div>
                            </div>
                            <div class = "row pt-4">
                                <div class = "col">
                                    <h4 class = "text-color">Contact Person </h4>
                                    <input type="text" class="form-control" placeholder="Enter contact person" required>
                                </div>
                                <div class = "col">
                                    <h4 class = "text-color">Contact Number </h4>
                                    <input type="number" class="form-control" placeholder="Enter contact no." required>
                                </div>
                            </div>  
                            <h4 class = "pt-4 text-color">Billing Address </h4>
                            <input type="text" class="form-control" placeholder="Enter billing address" required>
                            <h4 class = "pt-4 text-color">Contact Email </h4>
                            <input type="text" class="form-control" placeholder="Enter email address" required>
                            <br>
                            <h3 class = "title-color">Tell us about your event</h3>
                            <hr class = "line">
                            <br>
                            <h4 class = "text-color">Event Name </h4>
                            <input type="text" class="form-control" placeholder="Enter event name" required>
                            <h4 class = "pt-4 text-color">Event Type </h4>
                            <input type="text" class="form-control" placeholder="Enter event type" required>
                            <br>
                            <div class="container">

                                <div class="row">
                                    <div class="col">
                                        <h4 class = "text-color">Event Date/Time </h4>
                                        <input class="form-control" type="datetime-local" value="2018-11-23T10:30:00"
                                            id="example-datetime-local-input" required>
                                    </div>
                                    <div class="col">
                                        <span>
                                            <h4 class = "text-color">Expected No. of Guest </h4>
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
                                        <h4 class = "text-color">Venue</h4>
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
                                        <h4 class = "text-color">Caterer</h4>
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
                                    <br>
                                    <br>
                                    <br>
                                    <input type="submit" class="btn btn-success btn-lg btn-block"></button>                                  
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
              
           
        </div>
        </form> 
    </div>                 
<style>

/* Information */
.img{
    height:700px;
    object-fit:cover;
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
@media (max-width: 800px){
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