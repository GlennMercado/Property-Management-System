@extends('layouts.guest', ['class' => 'bg-light'])

@section('content')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js" integrity="sha512-Y2IiVZeaBwXG1wSV7f13plqlmFOx8MdjuHyYFVoYzhyRr3nH/NMDjTBSswijzADdNzMyWNetbLMfOpIPl6Cv9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <div class="card mt-6 d-flex justify-content-center" style="width: 100%;">
        <p class="mx-auto pt-6 text-uppercase title"   id = "section1">Reserve Now</p>
        <div class="card-body">
            <div class="container">
                    <h1>Hotel Reservation form</h1>
                        <h5>Please complete the form below</h5>
                        <hr class = "">
                            <form action="{{ url('/guest_reservation') }}" class="prevent_submit" method="POST"
                                enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row pt-4">
                                        <div class="col-md-6">
                                            <p>Guest Name</p>
                                                @foreach ($guest as $guests)
                                                    <input type="hidden" name="gName" value="{{ $guests->name }}" />
                                                    <input class="form-control" type="text" name="gName"
                                                        value="{{ $guests->name }}" readonly>
                                                @endforeach
                                        </div>
                                            <div class="col-md-6">
                                                <p>Email</p>
                                                    <input class="form-control" type = "text">
                                            </div>    
                                    </div>
                                <div class="row pt-4">
                                    <div class="col-md-6">
                                        <p>Other Guests</p> 
                                            <input class="form-control" type = "text">
                                    </div>
                                    <div class="col-md-6">
                                        <p class="form-label">Mobile No.</p>
                                            <input class="form-control" type="number" minlength="11" maxlength="11"
                                        name="mobile" required>
                                    </div>
                                </div>
                                        <div class="row pt-4">
                                            <div class="col-md">
                                                <p class="form-label">Number of pax</p>
                                                    <select name="pax" class="form-control" id="pax_num"
                                                        onchange="price_count()" required>
                                                            <option selected disabled value="">Select</option>
                                                                @for ($count = 1; $count <= 4; $count++)
                                                            <option value="{{ $count }}" id="room_pax">
                                                                {{ $count }}</option>
                                                            @endfor
                                        </select>
                                            </div>  
                                                <div class="col-md">
                                                    <p>Room No</p>
                                                    <select name="room_no" class="form-control" required>
                                    <option selected disabled value="">Select</option>
                                    @foreach ($room as $rooms)
                                        @if ($rooms->Status == 'Vacant for Accommodation')
                                            <option value="{{ $rooms->Room_No }}">{{ $rooms->Room_No }} -
                                                {{ $rooms->No_of_Beds }} - {{ $rooms->Extra_Bed }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                                </div>
                                        </div>
                                            <div class="row pt-4">
                                                <div class="col-md">
                                                    <p>Check in Date/Time</p>
                                                        <input class="form-control chck" name="checkIn" type="date"
                                                            onkeydown="return false" id="example-datetime-local-input" required>
                                                </div>  
                                                    <div class="col-md">
                                                        <p>Check out Date/Time</p>
                                                            <input class="form-control chck" name="checkOut" type="date"
                                                                onkeydown="return false" id="example-datetime-local-input" required>
                                                    </div>
                                            </div>
                                                <div class="row pt-4">
                                                    <div class="col-md">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                     Make this booking for someone else?
                                                                </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <h3 class = "pt-4">Guest Information</h3>

                                                    <div class="row">
                                                        <div class="col-md">
                                                            <p>Full Name</p>
                                                            <input class="form-control" type = "text">
                                                        </div>
                                                    </div>
                                                        <h3 class = "pt-4">Do you have any special request?</h3>
                                                        <div class="row">
                                                            <div class="col-md">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                        <label class="form-check-label" for="flexCheckDefault">
                                                                            Extra pillow
                                                                        </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                        <label class="form-check-label" for="flexCheckDefault">
                                                                            Towels
                                                                        </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                        <label class="form-check-label" for="flexCheckDefault">
                                                                            Mattress
                                                                        </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row pt-4">
                                                            <div class="col-md">
                                                                <div class="form-group">
                                                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                </div>
                                    <input type="submit" class="mx-auto d-flex justify-content-center btn btn-outline-success prevent_submit mt-2" value="Submit" style = "width:40%;" data-toggle="modal" data-target="#submit" />
                                
                                <div class="modal fade" id="submit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Reservation Information</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        Booking Id: 
                                                    
                                                    </div>
                                                    <div class="col-md-12 pt-2">   
                                                        Guest Name:                                     
                                                    </div>
                                                    <div class="col-md-12 pt-2">   
                                                        Room Type:                                     
                                                    </div>
                                                    <div class="col-md-12 pt-2">   
                                                        Email:                                     
                                                    </div>
                                                    <div class="col-md-12 pt-2">   
                                                        Mobile no:                                     
                                                    </div>
                                                    <div class="col-md-12 pt-2">   
                                                        Check in date/time:                                     
                                                    </div>
                                                    <div class="col-md-12 pt-2">   
                                                        Check out date/time:                                     
                                                    </div>
                                                    <div class="col-md-12 pt-2">   
                                                        Book applied by:                                     
                                                    </div>
                                                    <div class="col-md-12 pt-2">   
                                                        Total Amount:                                     
                                                    </div>
                                                    <div class="col-md-12 pt-2">   
                                                        Payment:                                     
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col">

                                            
                                            
                                            <!-- <p class = " d-flex justify-content-center">scan here to pay</p>
                                            <div class = "qrsample mx-auto d-flex justify-content-center">
                                                <img src="{{ asset('nvdcpics') }}/nvdcqr.png" class = "" alt="">
                                            </div>
                                            <h3 class = "text-uppercase mt-4 d-flex justify-content-center">novadeci properties</h3>
                                            <p class = "d-flex justify-content-center">xxxxxxxx098</p>
                                            <div class="mb-3 d-flex justify-content-center">
                                                <label for="formFile" class="form-label"></label>
                                                <input class="form-control w-50" type="file" id="formFile">
                                            </div>
                                        </div>
                                    </div>
                                    <p class = "text-justify">Any cancellation done more than (3) calendar days before check in date will be
                                        free of charge. If within (3) calendar days, guests will be charged of the total
                                        price. Refund, In case of guaranteed reservation, is payable through check issuance
                                        <a href="#" class = "text-success" data-toggle="modal" data-target="#PolicyModal">Company Policy</a>
                                    </p> -->
                                   
                    </div>  
                    </form>
                </div>
                    <div class="modal fade" id="PolicyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content mx-auto d-flex justify-content-center">
                                <div class="modal-header">
                                    <h2>Company Policy</h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <div class="modal-body">
                                
                            </div>
                                <div class="modal-footer">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                
        
            <!-- section1 -->
        <!-- <form action="{{ url('/guest_reservation') }}" class="prevent_submit" method="POST"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="row">
                            <div class="card-body bg-white">
                                <div class="row">
                                    <div class="col">
                                    <p class="text-left">Guest Name: </p>
                                    @foreach ($guest as $guests)
                                        <input type="hidden" name="gName" value="{{ $guests->name }}" />
                                        <input class="form-control" type="text" name="gName"
                                            value="{{ $guests->name }}" readonly>
                                    @endforeach
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p class="text-left pt-4">Check in Date/Time: </p>
                                        <input class="form-control chck" name="checkIn" type="date"
                                            onkeydown="return false" id="example-datetime-local-input" required>
                                    </div>
                                    <div class="col">
                                        <p class="text-left pt-4">Check out Date/Time: </p>
                                        <input class="form-control chck" name="checkOut" type="date"
                                            onkeydown="return false" id="example-datetime-local-input" required>
                                    </div>
                                </div>

                                <p class="text-left pt-4">Room No - Beds: </p>
                                <select name="room_no" class="form-control" required>
                                    <option selected="true" disabled="disabled">Select</option>
                                    @foreach ($room as $rooms)
                                        @if ($rooms->Status == 'Vacant for Accommodation')
                                            <option value="{{ $rooms->Room_No }}">{{ $rooms->Room_No }} -
                                                {{ $rooms->No_of_Beds }} - {{ $rooms->Extra_Bed }}</option>
                                        @endif
                                    @endforeach
                                </select>

                                <div class="row">
                                    <div class="col">
                                        <p class="text-left pt-4">Number of Pax: </p>
                                        <select name="pax" class="form-control" id="pax_num"
                                            onchange="price_count()" required>
                                            <option selected="true" disabled="disabled">Select</option>
                                            @for ($count = 1; $count <= 4; $count++)
                                                <option value="{{ $count }}" id="room_pax">
                                                    {{ $count }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col">
                                        <p class="text-left pt-4">Mobile No.: </p>
                                        <input class="form-control" type="tel" minlength="11" maxlength="11"
                                            name="mobile" required>
                                    </div>
                                </div> -->

                                    <!--
                                        <div class="row">
                                            <div class="col">
                                                <p class="text-left">Number of Adult: </p>
                                                <select name="adult" class="form-control" required>
                                                    <option selected="true" disabled="disabled">Select</option>
                                                    @for ($count = 1; $count <= 4; $count++)
                                        <option value="{{ $count }}">{{ $count }}</option>
                                        @endfor
                                            </select>
                                        </div>
                                        <div class="col">
                                            <p class="text-left">Number of Children: </p>
                                            <select name="child" class="form-control" required>
                                                <option selected="true" disabled="disabled">Select</option>
                                                @for ($count = 1; $count <= 4; $count++)
                                                    <option value="{{ $count }}">{{ $count }}</option>
                                                    @endfor
                                            </select>
                                        </div>
                                    </div>-->

                               
                                <!-- <p class="pt-4 txt">Price: </p>
                                <input class="form-control" id="room_price" readonly>
                                <p>Additional P1,500.00/pax</p>
                                <div class="row">
                                    <div class="col d-flex justify-content-center">
                                        <input type="submit" class="btn btn-success prevent_submit" value="Submit" />
                                    </div>
                                </div>
                            </div>
                        </div>
                </form> -->
                <!-- section2 suite -->
                <!-- <p class = "d-flex justify-content-center text-uppercase title pt-6">Suites</p>
            <div class="image-grid">
                <img class="image-grid-col-2 image-grid-row-2" src="{{ asset('nvdcpics') }}/hotel1.jpg" data-toggle="lightbox" data-gallery="example-gallery">
                <img class="" src="{{ asset('nvdcpics') }}/hotel2.jpg">
                <img class="" src="{{ asset('nvdcpics') }}/hotel3.jpg">
                <img class="" src="{{ asset('nvdcpics') }}/hotel4.jpg">
                <img class="" src="{{ asset('nvdcpics') }}/hotel5.jpg">
                <img class="" src="{{ asset('nvdcpics') }}/hotel6.jpg">
                <img class="seventh" data-toggle="modal" data-target="#exampleModalCenter"
                    src="{{ asset('nvdcpics') }}/hotel7.jpg">
            </div> -->
            <!-- <div class="user-select-none centered" data-toggle="modal" data-target="#exampleModalCenter">+7 Photos</div> -->
            <!-- section 3 -->
            <!-- <p class="text-center text-uppercase lg mt-4 title animated fadeIn title">About our Suites</p> -->

            <!-- <div class="row">
                <div class="col">
                    <h3 class = "txt">Description</h3>
                    <p>Our Superior Double Room offers comfort and style. The room features a comfortable double bed, a
                        flat-screen TV, a seating area, and a private bathroom with a rain shower. Guests can also enjoy
                        the hotel's garden views from the room's private balcony.</p>
                    <p>The Executive Suite is ideal for business travelers. The suite features a king-sized bed, a
                        separate living area with a comfortable sofa and armchair, a work desk, and a private balcony
                        with city views. Guests also have access to the Executive Lounge, where they can enjoy
                        complimentary breakfast and evening drinks.</p>
                </div>
                <div class="col">
                    <div class="card" style="width: 100%;  background-color: #D7D7D7;">
                        <img class="card-img-top">
                        <div class="card-body">
                            <p class="card-title d-flex justify-content-center uppercase text-uppercase font-weight-bold title">Room
                                Highlights</p>
                            <p class="card-text">Highly rated by recent guests</p>
                            <p class="card-text">Clean, comfortable and quiet</p>
                            <a href="#section1" class="btn btn-success d-flex justify-content-center">Reserve Now</a>
                        </div>
                    </div>
                </div>
            </div> -->

        <div>
            <!-- <h1 class="pt-4 txt">House Rules</h1>
            <div class="row">
                <div class="col">
                    <h2 class="pt-4 txt"><i class="bi bi-slash-circle mr-2" style="color:red;"></i>No Smoking</h2>
                </div>
                <div class="col">
                    <p class="pt-4 txt">Smoking is not allowed in any of the guest rooms or common areas of the hotel.</p>
                </div>
            </div>
            <div class="row">
                <div class="col txt">
                    <h2><i class="bi bi-alarm mr-2" style="color:#411CAD;"></i>Quiet hours:</h2>
                </div>
                <div class="col">
                    <p>Guests are asked to keep noise to a minimum between the hours of 10pm and 8am to
                        respect the comfort of other guests.</p>
                </div>
            </div>
            <div class="row">
                <div class="col txt">
                    <h2><i class="bi bi-p-circle mr-2" style="color:#1558A1;"></i>Parking:</h2>
                </div>
                <div class="col">
                    <p>Parking is available for guests, but may be subject to additional charges.</p>
                </div>
            </div>
            <div class="row">
                <div class="col txt">
                    <h2><i class="bi bi-exclamation-lg mr-2" style="color:red;"></i>Damages:</h2>
                </div>
                <div class="col txt">
                    <p>Guests will be held responsible for any damages caused to the room or hotel property.</p>
                </div>
            </div>
            <div class="row">
                <div class="col txt">
                    <h2><i class="bi bi-key-fill mr-2" style="color:#F9CF00"></i>Room keys:</h2>
                </div>
                <div class="col">
                    <p>Guests are responsible for ensuring the security of their room key and will be charged for a
                        replacement if it is not returned upon check-out.</p>
                </div>
            </div> -->
            <!-- section 3 -->
            
            </div>
        </div>
    </div>
        <!-- Information -->
        <div class="container">
            <div class="wrapper">
                <!-- <h1>Information</h1> -->
            </div>
        </div>

        <!-- Modal at 7th pic-->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
        <!-- scroll-top button -->
        <!-- <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="bi bi-chevron-double-up"></i></button> -->
    <style>
        body {
            margin: 0;
        }
        /* divider */
        .parent-container {
        display: flex;
        flex-direction: row;
         /* 100% of the viewport width */
        }
        .child-container {
        flex: 1; /* to make each child container take equal space */
        
        }

        .image-grid {
            --gap: 14px;
            --num-cols: 4;
            --row-height: 200px;

            box-sizing: border-box;
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

            .centered {
                position: absolute;
                font-size: 10px;
            }
        }

        .centered {
            position: absolute;
            font-weight: bold;
            font-size: 30px;
            text-decoration: underline;
            color: white;
            top: 30%;
            left: 86%;
            transform: translate(-50%, -50%);
            cursor: pointer;
        }

        .seventh {
            filter: brightness(0.25);

        }

        /* Information */
        .container {}

        p {
            font-family: montserrat;
            text-align: justify;
            font-size: 18px;
        }

        .txt {
            font-family: montserrat;
            
        }
        .title {
            letter-spacing: 1px;
            font-size:30px;
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
        hr{
            border: 2px solid #30bc6c;
            display:flex;
        }
        .qrsample{
            height:100px;
            width:100px;
        }
        /* scroll to top arrow */
        /* #myBtn {
        display: none;
        position: fixed;
        bottom: 20px;
        right: 30px;
        z-index: 99;
        font-size: 18px;
        border: none;
        outline: none;
        background-color: #484848;
        color: white;
        cursor: pointer;
        padding: 15px;
        border-radius: 4px;
        opacity: 0.5;
        }

        #myBtn:hover {
        background-color: #555;
        } */
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
        $('.prevent_submit').on('submit', function() {
            $('.prevent_submit').attr('disabled', 'true');
        });

        function price_count() {
            var pax_num = document.getElementById("pax_num");
            var room_price = document.getElementById("room_price");
            if (pax_num.value == 1) {
                room_price.value = "P2,500.00";
            } else if (pax_num.value == 2) {
                room_price.value = "P4,000.00";
            } else if (pax_num.value == 3) {
                room_price.value = "P5,500.00";
            } else if (pax_num.value == 4) {
                room_price.value = "P6,500.00";
            }
        }

                // code for scroll-top button
        // let mybutton = document.getElementById("myBtn");
        // window.onscroll = function() {scrollFunction()};

        // function scrollFunction() {
        // if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        //     mybutton.style.display = "block";
        // } else {
        //     mybutton.style.display = "none";
        // }
        // }
        // function topFunction() {
        // document.body.scrollTop = 0;
        // document.documentElement.scrollTop = 0;
        // }

    </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
        <!-- <img class="card-img-top mt-2 ml-5 largepic" src="{{ asset('nvdcpics') }}/hotel1.jpg"> -->
        @include('layouts.footers.guest')
        <!-- <div class="container mt--5 pb-5"></div> -->
        <!-- {{ asset('nvdcpics') }}/hotel1.jpg -->
    @endsection
