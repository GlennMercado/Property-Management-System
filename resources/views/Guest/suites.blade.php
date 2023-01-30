@extends('layouts.guest', ['class' => 'bg-light'])

@section('content')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<div class="card mt-6 d-flex justify-content-center" style="width: 100%;">
    <h1 class = "mx-auto pt-6 text-uppercase title">Suites</h1>
        <div class="card-body">
            <div class="image-grid">
                <img class="image-grid-col-2 image-grid-row-2" src="{{ asset('nvdcpics') }}/hotel1.jpg">
                <img class="" src="{{ asset('nvdcpics') }}/hotel2.jpg">
                <img class="" src="{{ asset('nvdcpics') }}/hotel3.jpg">
                <img class="" src="{{ asset('nvdcpics') }}/hotel4.jpg">
                <img class="" src="{{ asset('nvdcpics') }}/hotel5.jpg">
                <img class="" src="{{ asset('nvdcpics') }}/hotel6.jpg">
                <img class="seventh" data-toggle="modal" data-target="#exampleModalCenter" src="{{ asset('nvdcpics') }}/hotel7.jpg">  
            </div>
            <div class="user-select-none centered" data-toggle="modal" data-target="#exampleModalCenter">+7 Photos</div>
            <!-- section 2 -->
            <h1 class = "text-center text-uppercase lg pt-4 title animated fadeIn">Booking</h1>

            <div class="row">
                <div class="col-8 pt-4">
                    <h3>Description</h3>
                <p>Our Superior Double Room offers comfort and style. The room features a comfortable double bed, a 
                    flat-screen TV, a seating area, and a private bathroom with a rain shower. Guests can also enjoy 
                    the hotel's garden views from the room's private balcony.</p>
                    <p>The Executive Suite is ideal for business travelers. The suite features a king-sized bed, a 
                        separate living area with a comfortable sofa and armchair, a work desk, and a private balcony 
                        with city views. Guests also have access to the Executive Lounge, where they can enjoy 
                        complimentary breakfast and evening drinks.</p>
                </div>
                    <div class="col-4">
                        <div class="card" style="width: 100%;  background-color: #D7D7D7;">
                            <img class="card-img-top">
                                <div class="card-body">
                                    <h2 class="card-title d-flex justify-content-center uppercase text-uppercase title">Room Highlights</h2>
                                        <p class="card-text">Highly rated by recent guests</p>
                                        <p class="card-text">Clean, comfortable and quiet</p>
                                            <a href="#section3" class="btn btn-success d-flex justify-content-center">Reserve Now</a>
                                </div>
                        </div>
                    </div>
                </div>
                <h1 class = "pt-4">House Rules</h1>
                    <div class="row">
                        <div class="col-2">
                            <h2 class = "pt-4"><i class="bi bi-slash-circle mr-2" style = "color:red;"></i>No Smoking</h2>
                        </div>
                            <div class="col-6">
                                <p class = "pt-4">Smoking is not allowed in any of the guest rooms or common areas of the hotel.</p>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <h2><i class="bi bi-alarm mr-2" style = "color:#411CAD;"></i>Quiet hours:</h2>
                        </div>
                        <div class="col-6">
                            <p>Guests are asked to keep noise to a minimum between the hours of 10pm and 8am to 
                                respect the comfort of other guests.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <h2><i class="bi bi-p-circle mr-2" style = "color:#1558A1;"></i>Parking:</h2>
                        </div>
                        <div class="col-6">
                            <p>Parking is available for guests, but may be subject to additional charges.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <h2><i class="bi bi-exclamation-lg mr-2" style = "color:red;"></i>Damages:</h2>
                        </div>
                        <div class="col-6">
                            <p>Guests will be held responsible for any damages caused to the room or hotel property.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <h2><i class="bi bi-key-fill mr-2" style = "color:#F9CF00"></i>Room keys:</h2>
                        </div>
                        <div class="col-6">
                            <p>Guests are responsible for ensuring the security of their room key and will be charged for a replacement if it is not returned upon check-out.</p>
                        </div>
                    </div>
                <!-- section 3 -->
                <form action="">
                <h1 class = "pt-8 d-flex justify-content-center text-uppercase title animated fadeInDown">Reserve</h1>
                    <div class="row scrollspy-example" id = "section3" data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" tabindex="0">
                        <div class="col-6">
                            <label for="Stockdetails" class = "text-color pt-4 text-uppercase txt">Type </label>
                                <input class="form-control" type="text" name="gName" value ="Suite" required readonly> 
                        </div>
                            <div class="col-6">
                                <label for="Stockdetails" class = "text-color pt-4 text-uppercase txt">Mobile </label>
                                    <input class="form-control" type="number" name="gName" value ="Suite" required>
                            </div>
                        <div class="col-6 ">
                            
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="Stockdetails" class = "text-color pt-4 text-uppercase txt">Check-in date </label>
                                        <input class="form-control" type="date" name="gName" required > 
                            </div>
                                <div class="col-6">
                                    <label for="Stockdetails" class = "text-color pt-4 text-uppercase txt">Check-out date </label>
                                            <input class="form-control" type="date" name="gName" required > 
                                </div>
                        </div>
                    <div class = "row">
                        <div class = "col-6">
                            <p class="text-left pt-4 text-uppercase txt">Pax Count</p>
                                <select name="extra_bed" class="form-control" required>
                                    <option selected disabled value="">Select</option>
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                </select>
                        </div>
                        <div class = "col-6">
                            <p class="text-left pt-4 text-uppercase txt">No. of Bed/s</p>
                                <select name="extra_bed" class="form-control" required>
                                    <option selected disabled value="">Select</option>
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                </select>
                        </div>
                    </div>   
                        <div class="parent">
                            <input type="submit" class="btn btn-success mb-2 mt-2 mt-4" value="Submit" style = "width:300px;"/>
                        </div> 
                </form> 
    </div>
    <!-- Information -->
        <div class="container">
            <div class="wrapper">
                <!-- <h1>Information</h1> -->
            </div>
        </div>
        
        <!-- Modal at 7th pic-->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                             <h1 class="modal-title" id="exampleModalLongTitle">Suite</h1>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                    <div class="modal-body">
                        <!-- contents -->
                            <div class="row">
                                <div class="col-4">
                                    <img class="img-thumbnail" src="{{ asset('nvdcpics') }}/hotel1.jpg">
                                </div>
                                    <div class="col-4">
                                        <img class="img-thumbnail" src="{{ asset('nvdcpics') }}/hotel2.jpg">
                                    </div>
                                        <div class="col-4">
                                            <img class="img-thumbnail" src="{{ asset('nvdcpics') }}/hotel3.jpg">
                                        </div>
                            </div>
                            <br>
                            <div class="row">
                                    <div class="col-4">
                                        <img class="img-thumbnail" src="{{ asset('nvdcpics') }}/hotel4.jpg">
                                    </div>
                                        <div class="col-4">
                                            <img class="img-thumbnail" src="{{ asset('nvdcpics') }}/hotel5.jpg">
                                        </div>
                                            <div class="col-4">
                                                <img class="img-thumbnail" src="{{ asset('nvdcpics') }}/hotel6.jpg">
                                            </div>
                                </div> 
                                <br>
                                    <div class="row">
                                        <div class="col-4">
                                            <img class="img-thumbnail" src="{{ asset('nvdcpics') }}/hotel7.jpg">
                                        </div>
                                            <div class="col-4">
                                                <img class="img-thumbnail" src="{{ asset('nvdcpics') }}/hotel8.jpg">
                                            </div>
                                                <div class="col-4">
                                                    <img class="img-thumbnail" src="{{ asset('nvdcpics') }}/hotel9.jpg">
                                                </div>
                                    </div>
                                    <br>
                                        <div class="row">
                                            <div class="col-4">
                                                <img class="img-thumbnail" src="{{ asset('nvdcpics') }}/hotel10.jpg">
                                            </div>
                                                <div class="col-4">
                                                    <img class="img-thumbnail" src="{{ asset('nvdcpics') }}/hotel11.jpg">
                                                </div>
                                                    <div class="col-4">
                                                        <img class="img-thumbnail" src="{{ asset('nvdcpics') }}/hotel12.jpg">
                                                    </div>
                                        </div>
                                        <br>
                                            <div class="row">
                                                <div class="col-4">
                                                    <img class="img-thumbnail" src="{{ asset('nvdcpics') }}/hotel13.jpg">
                                                </div>
                                                    <div class="col-4">
                                                        <img class="img-thumbnail" src="{{ asset('nvdcpics') }}/hotel14.jpg">
                                                    </div>
                                        </div>
                    </div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button> -->
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
	grid-column: span 3;
}

.image-grid-row-2 {
	grid-row: span 2;
}
/* Anything udner 1024px */
@media screen and (max-width: 600px) {
	.image-grid {
		--num-cols: 1;
		--row-height: 200px;
	}
    .centered{
        position:absolute;
        font-size:10px;
    }
}

.centered {
    position: absolute;
    font-weight:bold;
    font-size:30px;
    text-decoration:underline;
    color:white;
    top: 30%;
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
    font-size:18px;
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