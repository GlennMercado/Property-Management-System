@extends('layouts.guest', ['class' => 'bg-light'])

@section('content')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <div class="card mt-6 d-flex justify-content-center" style="width: 100%;">
        <div class="card-body">
            <div class="container bg-white mt-1" id="conventionCenter">
                <div class="row d-flex flex-row-reverse">
                    <div class="col-md-4 p-3 ml-2 d-flex justify-content-center">
                        <div class="lightbox-gallery">
                            <div class="container shadow">
                                
                                @foreach ($room_list as $lists)
                                    <div class="row gal">
                                        <div class="col-sm-12 col-md-12 col-lg-12 item">
                                            <a href="{{ $lists->Hotel_Image }}" data-lightbox="photos">
                                                <img class="img-fluid mt-3" src="{{ $lists->Hotel_Image }}">
                                            </a>
                                        </div>

                                    </div>
                                    <div class="mt-4">
                                        <h2 class="text-success currency">{{ $lists->Rate_per_Night }}</h2>
                                        <h3 class="font-weight-bold">Room {{ $lists->Room_No }}</h3>
                                        <h3 class="font-weight-bold">Size {{ $lists->Room_Size }}</h3>
                                        <h3 class="font-weight-bold">{{ $lists->No_of_Beds }} Bed</h3>
                                        <h3 class="pt-4 text-muted pb-2">
                                            Additional ₱ 1,500/pax
                                        </h3>

                                    </div>
                                @endforeach
                            </div>
                            <div class="container-fluid shadow">

                                <h3 class="pt-2">Other rooms</h3>
                                <div class="row gal">
                                    @foreach ($room as $lists)
                                        <div class="col-md-6 shadow">
                                            <a href="{{ url('/suites', ['id' => $lists->Room_No]) }}">
                                                <div class="image-container">
                                                    <img class="card-img-top mt-3" src="{{ $lists->Hotel_Image }}"
                                                        alt="Card image cap" style="max-height: 12.3rem">
                                                </div>
                                                <div class="card-body">
                                                    <h3 class="text-success font-weight-bold mt--3 currency">
                                                        {{ $lists->Rate_per_Night }}</h3>
                                                    <h4 class="font-weight-bold">Room {{ $lists->Room_No }}</h4>
                                                    <p class="text-sm text-dark">{{ $lists->No_of_Beds }}Bed</p>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                                <a href="{{ url('/rooms') }}" class="text-dark font-weight-bold"
                                    style="text-decoration:underline; cursor:pointer;">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 shadow p-3 mb-5">
                        <h1>Hotel Reservation form</h1>
                        <h5>Please complete the form below</h5>
                        <hr class="">
                        <form action="{{ url('/guest_reservation') }}" class="prevent_submit" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6 pt-4">
                                    <p>Guest Name <span class="text-danger">*</span></p>
                                    <!-- <i class="bi bi-asterisk" style="color:red; font-size:7px;"></i> -->
                                    @foreach ($guest as $guests)
                                        <input type="hidden" name="gName" value="{{ $guests->name }}" />
                                        <input class="form-control" type="text" name="gName"
                                            value="{{ $guests->name }}" readonly>
                                    @endforeach
                                </div>
                                <div class="col-md-6 pt-4">
                                    <p>Email <span class="text-danger">*</span></p>
                                    @foreach ($guest as $guests)
                                        <input class="form-control" type="text" value="{{ $guests->email }}" readonly>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md pt-4">
                                    <p class="form-label">Mobile No. <span class="text-danger">*</span></p>
                                    <input class="form-control" type="number" name="mobile" min="0" value="09"
                                        placeholder="09XXXXXXXXX" onKeyPress="if(this.value.length==11) return false;"
                                        required>

                                    <div id="balls"></div>

                                </div>

                                <div class="col-md pt-4">
                                    <p>Room No</p>
                                    @foreach($room_list as $lists)
                                        <input type="text" class="form-control" value="{{$lists->Room_No}}"readonly>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md pt-4">
                                    <p>Check in Date/Time <span class="text-danger">*</span></p>
                                    <input class="form-control chck" name="checkIn" type="date" onkeydown="return false"
                                        id="example-datetime-local-input" required />
                                </div>
                                <div class="col-md pt-4">
                                    <p>Check out Date/Time <span class="text-danger">*</span></p>
                                    <input class="form-control chck" name="checkOut" type="date" onkeydown="return false"
                                        id="example-datetime-local-input" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md pt-4">
                                    <p class="form-label">Number of pax <span class="text-danger">*</span></p>
                                    {{-- <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <span>Adult : 0</span>
                                            <span>Child : 0</span>
                                            <span>Infant : 0</span>
                                        </button>
                                        <div class="dropdown-menu mx-auto" aria-labelledby="dropdownMenuButton">
                                            <form>
                                                <div class="container">
                                                    <div class="mx-auto d-flex justify-content-center" id="input1">
                                                        <span class="pr-4"><button
                                                                class="btn btn-count2 btn-sm btn-danger"
                                                                onclick="decrement('adult')">-</button></span>
                                                        <label class="pt-2 " min="0" id="adultLabel">Adult:
                                                            0</label>
                                                        <span class="pl-4"><button
                                                                class="btn btn-sm btn-count btn-success"
                                                                onclick="increment('adult')">+</button></span>
                                                    </div>
                                                    <div class="mx-auto d-flex justify-content-center" id="input2">
                                                        <span class="pr-4"><button
                                                                class="btn btn-count2 btn-sm btn-danger"
                                                                onclick="decrement('child')">-</button></span>
                                                        <label class="pt-2" id="childLabel">Child: 0</label>
                                                        <span class="pl-4"><button
                                                                class="btn btn-sm btn-count btn-success"
                                                                onclick="increment('child')">+</button></span>
                                                    </div>
                                                    <div class="mx-auto d-flex justify-content-center" id="input3">
                                                        <span class="pr-4"><button
                                                                class="btn btn-count2 btn-sm btn-danger"
                                                                onclick="decrement('infant')">-</button></span>
                                                        <label class="pt-2" id="infantLabel">Infant: 0</label>
                                                        <span class="pl-4"><button
                                                                class="btn btn-sm btn-count btn-success"
                                                                onclick="increment('infant')">+</button></span>
                                                    </div>
                                                    <hr>
                                                    <input type="checkbox" id="ddCheckbox">
                                                    <label for="ddCheckbox">add</label>
                                                    <input type="text" id="textbox2" class="form-control-sm"
                                                        value="room available for another pax" disabled>

                                                </div>
                                            </form>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Done</button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cancel</button>
                                                    </div> --}}
                                    {{-- code for pax count --}}
                                    <select name="pax" class="form-control" id="pax_num" onchange="price_count()"
                                        required>
                                        <option selected="true" disabled="disabled">Select</option>
                                        @for ($count = 1; $count <= 4; $count++)
                                            <option value="{{ $count }}" id="room_pax">
                                                {{ $count }}</option>
                                        @endfor
                                    </select>
                                    {{-- <select name="pax" id="textboxes" class="form-control" id="pax_num"
                                onchange="pax_on_change()" required>
                                <option selected disabled value="">Select</option>
                                @for ($count = 1; $count <= 4; $count++)
                                    <option value="{{ $count }}" id="room_pax">
                                        {{ $count }}</option>
                                @endfor
                            </select> --}}
                                </div>
                            </div>
                            <div class="row pt-4">
                                <div class="col-md">
                                    <div class="form-check form-check-input">
                                        <input type="checkbox" id="mainCheckbox">
                                        <label for="mainCheckbox">Make this booking for someone else?</label>
                                        <br><br>
                                        {{-- <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Make this booking for someone else?
                                    </label>  --}}
                                    </div>
                                </div>
                            </div>

                            <h3 class="pt-6">Guest Information</h3>

                            <div class="row">
                                <div class="col-md">
                                    <p>Full Name</p>
                                    <input type="text" id="textbox1" class="form-control" disabled>
                                </div>
                            </div>
                            <h2 class="pt-4">Do you have any special request?</h2>
                            <h5>Extras</h5>
                            <div class="row">
                                <div class="col-md  pt-4">
                                    <p>Pillow</p>
                                    <input type="number" class="form-control" min="0" max="5"
                                        value="0">
                                </div>
                                <div class="col-md  pt-4">
                                    <p>Towel</p>
                                    <input type="number" class="form-control" min="0" max="5"
                                        value="0">
                                </div>
                                <div class="col-md  pt-4">
                                    <p>Mattress</p>
                                    <input type="number" class="form-control" min="0" max="5"
                                        value="0">
                                </div>
                            </div>
                            <p class="pt-4 txt">Price: </p>
                            <input class="form-control" id="room_price" readonly>
                            <p>Additional P1,500.00/pax</p>
                            <div class="row">
                                <div class="col-md">
                                    <div class="custom-control custom-control-alternative custom-checkbox">
                                        <input class="custom-control-input" id="customCheckRegister" type="checkbox"
                                            required>
                                        <label class="custom-control-label" for="customCheckRegister">
                                            <span class="text-muted">{{ __('Agree to') }} <a href="#ModalPrivacyPolicy"
                                                    data-toggle="modal" data-target="#ModalTerms">Terms &
                                                    Conditions</a></span>
                                        </label>
                                    </div>
                                </div>

                            </div>

                            <!-- Modal > Privacy Policy -->
                            <div class="modal fade" id="ModalTerms" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title" id="exampleModalLongTitle">TERMS AND CONDITIONS</h1>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h2>Article 1</h2>
                                            <p class="justify-center">Any accommodation agreements or other related
                                                contracts entered
                                                into between the NOVADECI and the guest, including the hotel
                                                reservations, commercial space booking, and convention center
                                                rental shall be governed by these Terms and Conditions. All
                                                issues that are not expressly stated in the Terms and Conditions
                                                shall be ruled by law.</p>
                                            <h2>Article 2</h2>
                                            <p class="justify-center">
                                                1. For guests who’s applying for an Hotel Reservation they shall provide the
                                                NOVADECI the following information.
                                            </p>
                                            <li class="justify-center ml-4">
                                                Name of booker and guest, in case booked by a representative.
                                            </li>
                                            <li class="justify-center ml-4">
                                                Company name.
                                            </li>
                                            <li class="justify-center ml-4">
                                                Contact number.
                                            </li>
                                            <li class="justify-center ml-4">
                                                Email.
                                            </li>
                                            <li class="justify-center ml-4">
                                                Arrival and Departure dates.
                                            </li>
                                            <li class="justify-center ml-4">
                                                Method of payment.
                                            </li>
                                            <li class="justify-center ml-4">
                                                Credit card details, if applicable.
                                            </li>
                                            <li class="justify-center ml-4">
                                                Any special requests (extra pillow/mattress, towels, etc.).
                                            </li>
                                            <li class="justify-center ml-4">
                                                The date of stay and estimated time of arrival.
                                            </li>
                                            <p class="justify-center pt-4">
                                                2. Valid ID with photo or passport must be presented at Front Desk upon
                                                check-in.
                                            </p>
                                            <p class="justify-center">
                                                3. The standard check-out time is 12 NN; Check-in time is 2 PM. Early
                                                check-in and late check-out may be requested at the Front Office and will be
                                                subject to availability. If available, charges may apply.
                                            </p>
                                            <p class="justify-center">
                                                4. The date of stay and estimated time of arrival.
                                            </p>
                                            <p class="justify-center">
                                                5. If the guest wants to extend their stay over the reserved date specified
                                                in paragraph 4, an application for a new reservation is assumed to have been
                                                submitted at the moment the request was made.
                                            </p>
                                            <p class="justify-center">
                                                6. Advance full payment is required for a successful reservation. A copy or
                                                a screenshot of proof of payment must be sent upon making the reservation.
                                                Full payment should be settled through:
                                            </p>
                                            <p class="justify-center ml-4">
                                                (a) via Cash or Credit Card at Front Desk
                                            </p>
                                            <p class="justify-center ml-4">
                                                (b) via Online Payment
                                            </p>
                                            <p class="justify-center ml-4">
                                                (c) via Bank Deposit at least 3 banking days prior to check-in.
                                            </p>
                                            <p class="justify-center">
                                                7. Night extensions may be accommodated and are subject to availability.
                                                Charges will apply.
                                            </p>
                                            <p class="justify-center">
                                                8. Reservation Confirmation will be generated for online bookings will be
                                                sent through the guests registered email address and must be sent only once
                                                proof of payment is validated.
                                            </p>
                                            <p class="justify-center">
                                                9. Cancellation Confirmation Letter stating the reference number shall be
                                                issued to guests, for canceled reservations.
                                            </p>
                                            <p class="justify-center">
                                                10. In the event the guest did not show up on the scheduled arrival date,
                                                with no prior amendments on reservation or notice of cancellation, he/she
                                                will be charged the equivalent of one night’s accommodation.
                                            </p>
                                            <h2 style="text-align: center;"><b></b></h2>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-danger"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" onclick="checkCheckbox()" class="btn btn-success"
                                                    data-dismiss="modal">I Agree</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-center">
                                    <input type="submit"
                                        class="mx-auto d-flex justify-content-center btn btn-success prevent_submit mt-2"
                                        value="Submit" style="width:40%;" data-target="#submit" />
                                </div>
                                {{-- This button used for flow of booking --}}
                                <div class="col-md-12 d-flex justify-content-center pt-4">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#btnpreview">
                                        Submit
                                    </button>
                                </div>
                            </div>
                            <div>
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
                                <div>
                                </div>
                            </div>
                    </div>
                    {{-- modal submit --}}
                    {{-- WAG TATANGGALIN --}}
                    <div class="modal fade" id="btnpreview" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title" id="exampleModalLabel">Billing Information</h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md text-sm font-weight-bold">
                                                Booking Id:
                                            </div>
                                            <div class="col-md-6 text-sm">
                                                Sample Id
                                            </div>
                                            <div class="col-md-6 text-sm font-weight-bold mt-2">
                                                Name:
                                            </div>
                                            <div class="col-md-6 text-sm mt-2">
                                                Sample Name
                                            </div>
                                            <div class="col-md-6 text-sm font-weight-bold mt-2">
                                                Room Type:
                                            </div>
                                            <div class="col-md-6 text-sm mt-2">
                                                1
                                            </div>
                                            <div class="col-md-6 text-sm font-weight-bold mt-2">
                                                Email:
                                            </div>
                                            <div class="col-md-6 text-sm mt-2">
                                                Email@gmail.com
                                            </div>
                                            <div class="col-md-6 text-sm font-weight-bold mt-2">
                                                Mobile no:
                                            </div>
                                            <div class="col-md-6 text-sm mt-2">
                                                09876543212
                                            </div>
                                            <div class="col-md-6 text-sm font-weight-bold mt-2">
                                                Check in date/time:
                                            </div>
                                            <div class="col-md-6 text-sm mt-2">
                                                02/10/2023
                                            </div>
                                            <div class="col-md-6 text-sm font-weight-bold mt-2">
                                                Check out date/time:
                                            </div>
                                            <div class="col-md-6 text-sm mt-2">
                                                02/11/2023
                                            </div>
                                            <div class="col-md-6 text-sm font-weight-bold mt-2">
                                                Book applied by:
                                            </div>
                                            <div class="col-md-6 text-sm mt-2">
                                                Sample Name:
                                            </div>
                                            <div class="col-md-6 text-sm font-weight-bold mt-2">
                                                Total Amount:
                                            </div>
                                            <div class="col-md-6 text-sm mt-2">
                                                2,500
                                            </div>
                                            <div class="col-md-6 text-sm font-weight-bold mt-2">
                                                Payment:
                                            </div>
                                            <div class="col-md-6 text-sm mt-2">
                                                2,500
                                            </div>
                                            <div class="col-md-12 container-fluid d-flex justify-content-center">
                                                <img class="img-fluid pt-6" src="{{ asset('nvdcpics') }}/nvdcqr.png"
                                                    alt="Card image cap" style="max-height: 12.3rem">
                                            </div>
                                            <div class="col-md-12 mx-auto d-flex justify-content-center mt-4">
                                                <input type="file" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-danger"
                                        data-dismiss="modal">Close</button>
                                    <a href="{{ url('/my_bookings') }}"><button type="button"
                                            class="btn btn-success">Done</button></a>
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
                    <div class="modal fade" id="PolicyModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content mx-auto d-flex justify-content-center">
                                <div class="modal-header">
                                    <h2>Company Policy</h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                            </div>
                        </div>
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
            {{-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
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
                            <img class="img-thumbnail" src="{{ asset('nvdcpics') }}/hotel1.JPG">
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
                            <img class="img-thumbnail" src="{{ asset('nvdcpics') }}/hotel7.JPG">
                        </div>
                        <div class="col-4">
                            <img class="img-thumbnail" src="{{ asset('nvdcpics') }}/hotel8.JPG">
                        </div>
                        <div class="col-4">
                            <img class="img-thumbnail" src="{{ asset('nvdcpics') }}/hotel9.JPG">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-4">
                            <img class="img-thumbnail" src="{{ asset('nvdcpics') }}/hotel10.JPG">
                        </div>
                        <div class="col-4">
                            <img class="img-thumbnail" src="{{ asset('nvdcpics') }}/hotel11.JPG">
                        </div>
                        <div class="col-4">
                            <img class="img-thumbnail" src="{{ asset('nvdcpics') }}/hotel12.JPG">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-4">
                            <img class="img-thumbnail" src="{{ asset('nvdcpics') }}/hotel13.JPG">
                        </div>
                        <div class="col-4">
                            <img class="img-thumbnail" src="{{ asset('nvdcpics') }}/hotel14.JPG">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                    <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div> --}}


            <!-- scroll-top button -->
            <!-- <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="bi bi-chevron-double-up"></i></button> -->
            <style>
                /* cuurency */
                .currency:before {
                    content: '₱';
                }

                .currency:after {
                    content: '.00';
                }

                /* currency */
                /* gallery */
                /* disable arrows input type number */
                input[type="number"]::-webkit-outer-spin-button,
                input[type="number"]::-webkit-inner-spin-button {
                    -webkit-appearance: none;
                    margin: 0;
                }

                input[type="number"] {
                    -moz-appearance: textfield;
                }

                .image-container {
                    position: relative;
                    overflow: hidden;
                }

                img {
                    transition: 0.3s ease-in-out;
                }

                .image-container:hover img {
                    transform: scale(1.2);
                }

                /*  */
                .gal img:hover {
                    transform: scale(1.02);
                }

                body {
                    margin: 0;
                }

                input[type="text"] {
                    margin-top: 10px;
                }

                /* divider */
                .parent-container {
                    display: flex;
                    flex-direction: row;
                    /* 100% of the viewport width */
                }

                .child-container {
                    flex: 1;
                    /* to make each child container take equal space */

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
                    font-size: 30px;
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

                hr {
                    border: 2px solid #30bc6c;
                    display: flex;
                }

                .qrsample {
                    height: 100px;
                    width: 100px;
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
                input[type="text"].disabled {
                    pointer-events: none;
                    opacity: 0.5;
                }

                input[type="checkbox"]:checked~input[type="text"].disabled {
                    pointer-events: auto;
                    opacity: 1;
                }
            </style>
            <script>
                // textbox disable/enable


                function checkCheckbox() {
                    var checkbox = document.getElementById("customCheckRegister");
                    checkbox.checked = true;
                }
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
                    var per_pax_price = 1500;
                    var room2pax = 2500;
                    var totalprice;
                    if (pax_num.value == 1 || pax_num.value == 2) {
                        room_price.value = room2pax;
                    } else if (pax_num.value == 3) {
                        totalprice = room2pax + per_pax_price;
                        room_price.value = totalprice;
                    } else if (pax_num.value == 4) {
                        totalprice = room2pax + per_pax_price * 2;
                        room_price.value = totalprice;
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
                //         document.getElementById("checkbox").addEventListener("change", function() {
                //     var textboxes = document.getElementsByClassName("textbox");
                //     for (var i = 0; i < textboxes.length; i++) {
                //         textboxes[i].disabled = !this.checked;
                //     }
                // });
                // checkbox
                document.getElementById("mainCheckbox").addEventListener("change", function() {
                    // document.getElementById("checkbox1").disabled = !this.checked;
                    // document.getElementById("checkbox2").disabled = !this.checked;
                    // document.getElementById("checkbox3").disabled = !this.checked;
                    // document.getElementById("checkbox4").disabled = !this.checked;
                    document.getElementById("textbox1").disabled = !this.checked;
                });
                document.getElementById("ddCheckbox").addEventListener("change", function() {
                    // document.getElementById("checkbox1").disabled = !this.checked;
                    // document.getElementById("checkbox2").disabled = !this.checked;
                    // document.getElementById("checkbox3").disabled = !this.checked;
                    // document.getElementById("checkbox4").disabled = !this.checked;
                    document.getElementById("textbox2").disabled = !this.checked;
                });

                function changeValue() {
                    var textboxNumbers = document.getElementById("textboxes").value;
                    balls.innerHTML = '';
                    var i;
                    for (i = 0; i < textboxNumbers; i++) {
                        var yourTextboxes = document.createElement("INPUT");
                        yourTextboxes.setAttribute("type", "text");
                        yourTextboxes.classList.add("form-control");
                        yourTextboxes.setAttribute("placeholder", "Enter Name Here");
                        document.getElementById("balls").appendChild(yourTextboxes);
                    }
                }

                function pax_on_change() {
                    changeValue();
                    price_count();
                }

                function incrementValue(id) {
                    var input = document.getElementById(id);
                    var value = parseInt(input.value, 10);
                    value = isNaN(value) ? 0 : value;
                    value++;
                    input.value = value;
                }

                function decrementValue(id) {
                    var input = document.getElementById(id);
                    var value = parseInt(input.value, 10);
                    value = isNaN(value) ? 0 : value;
                    value--;
                    input.value = value;
                }
                // Add event listeners for input 1
                document.querySelector('#input1 .inc').addEventListener('click', function() {
                    incrementValue('input1');
                });
                document.querySelector('#input1 .dec').addEventListener('click', function() {
                    decrementValue('input1');
                });
                // Add event listeners for input 2
                document.querySelector('#input2 .inc').addEventListener('click', function() {
                    incrementValue('input2');
                });
                document.querySelector('#input2 .dec').addEventListener('click', function() {
                    decrementValue('input2');
                });
                const textbox = document.getElementById('mytextbox');
                let value = parseInt(textbox.value);
                textbox.addEventListener('keydown', function(event) {
                    if (event.keyCode == 38) { // up arrow
                        value++;
                        textbox.value = value;
                    } else if (event.keyCode == 40) { // down arrow
                        value--;
                        textbox.value = value;
                    }
                });


                // dropdown count
                // get the dropdown button and the input fields
                const dropdownButton = document.getElementById('dropdownMenuButton');
                const adultInput = document.getElementById('input1');
                const childInput = document.getElementById('input2');
                const infantInput = document.getElementById('input3');

                // add event listeners to the plus and minus buttons
                const buttons = document.querySelectorAll('.btn-count, .btn-count2');
                buttons.forEach(button => {
                    button.addEventListener('click', event => {
                        // prevent default form submission
                        event.preventDefault();

                        // get the parent element of the clicked button
                        const parent = event.target.parentElement.parentElement;

                        // get the label and current value of the input field
                        const label = parent.querySelector('label').textContent;
                        let value = parseInt(label.split(': ')[1]);

                        // increment or decrement the value depending on which button was clicked
                        // if (event.target.classList.contains('btn-success')) {
                        //     value++;
                        // } else if (event.target.classList.contains('btn-danger')) {
                        //     value--;
                        // }
                        if (event.target.classList.contains('btn-count')) {
                            value++;
                            if (value > 4) {
                                document.getElementById("btn-count").disabled = true;
                            }
                        } else if (event.target.classList.contains('btn-count2')) {
                            value--;
                            if (value < 0) {
                                document.getElementById("btn-count2").disabled = true;
                            }
                        } else {
                            document.getElementById("btn-count").disabled = false;
                            document.getElementById("btn-count2").disabled = false;
                        }
                        // update the label and dropdown button text
                        parent.querySelector('label').textContent = `${label.split(': ')[0]}: ${value}`;
                        dropdownButton.querySelectorAll('span').forEach(span => {
                            if (span.textContent.includes(label.split(': ')[0])) {
                                span.textContent = `${label.split(': ')[0]}: ${value}`;
                            }
                        });
                    });
                });
                let count = 0;
                const countElement = document.getElementById('count');
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
            <!-- <img class="card-img-top mt-2 ml-5 largepic" src="{{ asset('nvdcpics') }}/hotel1.jpg"> -->
            @include('layouts.footers.guest')
            <!-- <div class="container mt--5 pb-5"></div> -->
            <!-- {{ asset('nvdcpics') }}/hotel1.jpg -->
        @endsection
