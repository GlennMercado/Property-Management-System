@extends('layouts.guest', ['class' => 'bg-light'])

@section('content')
    <link rel="stylesheet" href="{{ asset('css') }}/suites.css">
    <script src="{{ asset('Javascript') }}/suites.js"></script>
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
                                            <a href="{{ url($lists->Hotel_Image) }}" data-lightbox="photos">
                                                <img class="img-fluid mt-3" src="{{ url($lists->Hotel_Image) }}">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <h2 class="text-success currency">{{ $lists->Rate_per_Night }}</h2>
                                        <input type="hidden" id="rpn" value="{{ $lists->Rate_per_Night }}">
                                        <h3 class="font-weight-bold">Room {{ $lists->Room_No }}</h3>
                                        <h3 class="font-weight-bold">Room Size {{ $lists->Room_Size }} sq.m</h3>
                                        <h3 class="font-weight-bold">{{ $lists->No_of_Beds }} Bed</h3>
                                        <h3 class="pt-4 text-muted pb-2">
                                            Additional ₱ 1,500/pax
                                        </h3>
                                    </div>
                                @endforeach
                            </div>
                            <div class="container-fluid shadow d-none d-lg-block">

                                <h3 class="pt-2">Other rooms</h3>
                                <div class="row gal">
                                    @foreach ($room as $lists)
                                        <div class="col-md-6 shadow">
                                            <a href="{{ url('/suites', ['id' => $lists->Room_No]) }}">
                                                <div class="image-container">
                                                    <img class="card-img-top mt-3" src="{{ url($lists->Hotel_Image) }}"
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
                                @foreach ($guest as $guests)
                                    <input type="hidden" name="gName" value="{{ $guests->name }}" />
                                @endforeach
                                <div class="col-md pt-4">
                                    <p class="form-label">Mobile No. <span class="text-danger">*</span></p>
                                    <input class="form-control" id="mobile" type="number" name="mobile" min="0"
                                        value="" placeholder="09XXXXXXXXX"
                                        onKeyPress="if(this.value.length==11) return false;" onkeyup="enable_button()" required>
                                    <div id="balls"></div>
                                </div>
                            </div>
                            <div class="row ">
                                {{-- EMAIL HIDDEN --}}
                                @foreach ($guest as $guests)
                                    <input type="hidden" value="{{ $guests->email }}">
                                @endforeach
                                {{-- EMAIL HIDDEN --}}
                                @foreach ($room_list as $lists)
                                    <input type="hidden" name="room_no" value="{{ $lists->Room_No }}">
                                @endforeach
                            </div>
                            <div class="row">
                                <div class="col-md pt-4">
                                    <p>Check in Date/Time <span class="text-danger">*</span></p>
                                    <input class="form-control chck" id="date1" onkeyup="enable_button()" name="checkIn" type="date"
                                        onkeydown="return false" required />
                                </div>
                                <div class="col-md pt-4">
                                    <p>Check out Date/Time <span class="text-danger">*</span></p>
                                    <input class="form-control chck" id="date2" onkeyup="enable_button()" name="checkOut" type="date"
                                        onkeydown="return false" required>
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
                                    <select name="pax" class="form-control" onchange="enable_button()" id="pax_num" required>
                                        <option selected="true" disabled="disabled">Select</option>
                                        @for ($count = 1; $count <= 4; $count++)
                                            <option value="{{ $count }}" id="room_pax">
                                                {{ $count }}</option>
                                        @endfor
                                    </select>
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
                            <h3 class="pt-4">Do you have any special request?</h3>
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
                            {{-- PRICE --}}
                            <input class="form-control" id="room_price" type="hidden">
                            {{-- PRICE HIDDEN --}}
                            <br>
                            <div class="row">
                                <div class="col-md text-center">
                                    <span
                                        class="text-muted">{{ __('By clicking the submit button below, I hereby agree to and accept the') }}
                                        <a href="#ModalPrivacyPolicy" data-toggle="modal" data-target="#ModalTerms">Terms
                                            &
                                            Conditions</a></span>
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
                            <div class="col-md-12 d-flex justify-content-center pt-4">
                                <button type="button" id="submit_button" class="btn btn-success btn_submit" onclick="price_count()" data-toggle="modal" data-target="#btnpreview" disabled>
                                    Submit
                                </button>
                            </div>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
                            {{-- modal submit --}}
                            {{-- WAG TATANGGALIN --}}
                            <div class="modal fade" id="btnpreview" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2 class="modal-title" id="exampleModalLabel">Billing Information</h2>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="shadow row p-3 mt-2">
                                                    <div class="col-md-6 text-sm font-weight-bold">
                                                        Room no:
                                                    </div>
                                                    <div class="col-md-6 text-sm">
                                                        @foreach ($room_list as $list)
                                                            {{ $list->Room_No }}
                                                        @endforeach
                                                    </div>
                                                    <div class="col-md-6 text-sm font-weight-bold mt-2">
                                                        Name:
                                                    </div>
                                                    @foreach ($guest as $guests)
                                                        <div class="col-md-6 text-sm mt-2">
                                                            {{ $guests->name }}
                                                        </div>
                                                        <div class="col-md-6 text-sm font-weight-bold mt-2">
                                                            Email:
                                                        </div>
                                                        <div class="col-md-6 text-sm mt-2">
                                                            {{ $guests->email }}
                                                        </div>
                                                        <div class="col-md-6 text-sm font-weight-bold mt-2">
                                                            Mobile no:
                                                        </div>
                                                        <div class="col-md-6 text-sm mt-2" id="mobile2">
                                                        </div>
                                                        <div class="col-md-6 text-sm font-weight-bold mt-2">
                                                            Check in date/time:
                                                        </div>
                                                        <div class="col-md-6 text-sm mt-2" id="date_pass1">
                                                        </div>
                                                        <div class="col-md-6 text-sm font-weight-bold mt-2">
                                                            Check out date/time:
                                                        </div>
                                                        <div class="col-md-6 text-sm mt-2" id="date_pass2">
                                                        </div>
                                                </div>
                                                <div class="row shadow p-3 mt-2">
                                                    <div class="col-md-6 text-sm font-weight-bold">
                                                        <h3>Payment medthod:</h3>
                                                    </div>
                                                    <div class="col-md-6 text-sm font-weight-bold">
                                                        <img class="gcash" src="{{ asset('nvdcpics') }}/Gcash.webp">
                                                    </div>
                                                    <div class="col-md-12 text-sm font-weight-bold">
                                                        <h4 class="text-muted mt-2">Room price(2 pax): <span
                                                                class="text-muted" id="2pax"></span> </h4>
                                                        <h4 class="text-muted">Per-pax subtotal: <span class="text-muted"
                                                                id="subtotal"></span> </h4>
                                                        <h3>Total Payment:</h3>
                                                        <h2 class="display-2 mt--3 text-green" id="dp"></h2>
                                                    </div>
                                                </div>
                                                @endforeach
                                                <div class="row shadow p-3 mt-2">
                                                    <div class="col-md-12 d-flex justify-content-center">
                                                        {!! QrCode::size(170)->generate('09234234242') !!}
                                                    </div>
                                                    <div class="col-md-12">
                                                        <p class="text-center mb-0">Upload your proof of payment here:</p>
                                                    </div>
                                                    <div class="col-md-12 mx-auto d-flex justify-content-center">
                                                        <input type="file" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit"
                                                class="mx-auto d-flex justify-content-center btn btn-success prevent_submit mt--4"
                                                value="Submit" style="width:40%;" data-target="#submit" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
            </div>
        </div>
    </div>
    @include('layouts.footers.guest')
@endsection
