@extends('layouts.guest', ['class' => 'bg-light'])

@section('content')
    <link rel="stylesheet" href="{{ asset('css') }}/suites.css">
    <script src="{{ asset('Javascript') }}/suites.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
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
                                        <h2 class="text-success currency">
                                            {{ number_format($lists->Rate_per_Night, 2, '.', ',') }}</h2>
                                        <input type="hidden" id="rpn" value="{{ $lists->Rate_per_Night }}">
                                        <h3 class="font-weight-bold">Hotel room {{ $lists->Room_No }}</h3>
                                        <input type="hidden" name="rn" value="{{ $lists->Room_No }}" id="rn">
                                        <h3 class="font-weight-bold"><i class="bi bi-rulers"></i> Room Size
                                            {{ $lists->Room_Size }} square meters</h3>
                                        <h3 class="font-weight-bold"><i><img src="{{ asset('nvdcpics') }}/p1.svg"
                                                    style="height: 20px; width: 20px"></i> {{ $lists->No_of_Beds }} Bed
                                        </h3>
                                        <h3 class="text-dark">
                                            <span class="badge badge-pill pills border badge1"><i class="bi bi-wifi"></i>
                                                Free
                                                Wifi</span>
                                            <span class="badge badge-pill pills border badge1"><i
                                                    class="bi bi-egg-fried"></i>
                                                Breakfast
                                                Included</span>
                                            <span class="badge badge-pill pills border badge1"><i
                                                    class="bi bi-car-front-fill"></i>
                                                Parking</span>
                                        </h3>
                                        <h3 class="text-center" style="border: 2px dashed rgb(80, 167, 80)">Note: The
                                            standard check-in is 2:00 pm and the standard check-out time
                                            is 12:00 pm.</h3>
                                        <h2 class="text-white bg-red text-center">Strictly no cancellations.</h2>
                                        <h3 class="pt-2 text-muted pb-2">
                                            Additional ₱ 1,500/pax <i class="bi bi-person-plus-fill"></i>
                                        </h3>
                                    </div>
                                @endforeach
                            </div>
                            <?php
                            $startDates = [];
                            $endDates = [];
                            foreach ($reserve as $reserves) {
                                $startDates[] = $reserves->Check_In_Date;
                                $endDates[] = $reserves->Check_Out_Date;
                            }
                            ?>
                            <input type="hidden" name="start_dates" value="<?php echo implode(',', $startDates); ?>" id="start-dates">
                            <input type="hidden" name="end_dates" value="<?php echo implode(',', $endDates); ?>" id="end-dates">

                            <div class="container-fluid shadow d-none d-lg-block">
                                <div class="d-flex pt-2">
                                    <h3 class="mr-auto">Other rooms</h3>
                                    <a href="{{ url('/rooms') }}" class="text-dark font-weight-bold"
                                        style="text-decoration:underline; cursor:pointer;">See all
                                    </a>
                                </div>
                                <div class="row gal">
                                    @foreach (array_slice($room, 0, 4) as $lists)
                                        <div class="col-md-6 c1">
                                            <a href="{{ url('/suites', ['id' => $lists->Room_No]) }}">
                                                <div class="image-container">
                                                    <img class="card-img-top mt-3" src="{{ url($lists->Hotel_Image) }}"
                                                        alt="Card image cap" style="max-height: 12.3rem">
                                                </div>
                                                <div class="card-body">
                                                    <h3 class="text-success font-weight-bold mt--3 currency">
                                                        {{ number_format($lists->Rate_per_Night, 2, '.', ',') }}
                                                    </h3>
                                                    <h4 class="font-weight-bold">Room {{ $lists->Room_No }}</h4>
                                                    <p class="text-sm text-dark">{{ $lists->No_of_Beds }}Bed</p>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
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
                                    <input type="hidden" id="guest_name1" value="{{ $guests->name }}">
                                    <input type="hidden" id="guest_name" name="gName" value="{{ $guests->name }}" />
                                @endforeach
                                
                                {{-- sample wag tatanggalin --}}
                                {{-- <div class="col-md pt-4">
                                    <p class="form-label label1">Mobile No. <span class="text-danger">*</span></p>
                                    <input type="number"
                                        onKeyPress="if(this.value.length==11) return false;" onkeyup="enable_button()"
                                        min="0" minlength="11"
                                        title="Please use a 11 digit mobile number with no dashes or dots" name="mobile"
                                        class="form-control" placeholder="Enter mobile no." id="contact"
                                        onchange="validateContact()">
                                    <p id="contact-error" style="color: red; font-size: 14px;"></p>
                                </div> --}}
                                
                                <div class="col-md pt-4">
                                    <p class="form-label label1">Mobile No. <span class="text-danger">*</span></p>
                                    <input class="form-control" id="mobile" type="number" name="mobile"
                                        min="0" minlength="11" value="" placeholder="Enter mobile no."
                                        onKeyPress="if(this.value.length==11) return false;" onkeyup="enable_button()"
                                        required>
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
                                    <p class="label1">Check in Date/Time <span class="text-danger">*</span></p>
                                    {{-- <input class="form-control chck" id="date1" onkeyup="enable_button()" name="checkIn"
                                        type="date" onkeydown="return false" required /> --}}
                                    <input type="text" id="date1" class="datepicker" name="checkIn"
                                        onkeydown="return false" autocomplete="off" required>
                                </div>
                                <div class="col-md pt-4">
                                    <div id="dates2">
                                        <p class="label1">Check out Date/Time <span class="text-danger">*</span></p>
                                        {{-- <input class="form-control chck" id="date2" onkeyup="enable_button()"
                                            name="checkOut" type="date" onkeydown="return false" required> --}}
                                        <input type="text" class="datepicker" id="date2" name="checkOut"
                                            autocomplete="off" onkeydown="return false">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md pt-4">
                                    <p class="form-label label1">Number of pax <span class="text-danger">*</span></p>
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
                                    <select name="pax" class="form-control" onchange="enable_button()"
                                        id="pax_num" required>
                                        <option selected="true" disabled="disabled">Select</option>
                                        @for ($count = 1; $count <= 4; $count++)
                                            <option value="{{ $count }}" id="room_pax">
                                                {{ $count }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="pt-4">
                                <input type="checkbox" onclick="enable_txt()" id="mainCheckbox">
                                <label for="mainCheckbox">Make this booking for someone else?</label>
                                <p class="label1">Full Name</p>
                                <input type="text" id="textbox1" class="form-control" disabled>
                            </div>
                            {{-- Deleted special request --}}
                            {{-- PRICE --}}
                            <input class="form-control" id="room_price" name="payment" type="hidden">
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
                                                9. NO CANCELLATION AND NON REFUNDABLE.
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
                            <div class="col-md-12 d-flex justify-content-center pt-2">
                                <button type="button" id="submit_button" class="btn btn-success btn_submit"
                                    onclick="price_count()" data-toggle="modal" data-target="#btnpreview" disabled>
                                    Submit
                                </button>
                            </div>
                            {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script> --}}
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
                                                        <div class="row shadow p-3 mt-2">
                                                            <div class="col-md-6 text-sm font-weight-bold">
                                                                <h3>Payment method:</h3>
                                                            </div>
                                                            <div class="col-md-6 text-sm font-weight-bold">
                                                                <img class="gcash"
                                                                    src="{{ asset('nvdcpics') }}/Gcash.png">
                                                            </div>
                                                            <div class="col-md-12 text-sm font-weight-bold">
                                                                <h4 class="text-muted mt-2">Room price(2 pax): <span
                                                                        class="text-muted" id="2pax"></span> </h4>
                                                                <h4 class="text-muted">Per-pax subtotal: <span
                                                                        class="text-muted" id="subtotal"></span> </h4>
                                                                <h3>Total Payment:</h3>
                                                                <h2 class="display-2 mt--3 text-green currency"
                                                                    id="dp">
                                                                </h2>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    <div class="row shadow p-3 mt-2">
                                                        <div class="col-md-12">
                                                            <p class="font-weight-bold text-center">NVDC Properties:
                                                                09458923381
                                                            </p>
                                                        </div>
                                                        <div class="col-md-12 d-flex justify-content-center">
                                                            {!! QrCode::size(170)->generate('09458923381') !!}
                                                        </div>
                                                        <div class="col-md-12">
                                                            <p class="text-center">Gcash account name <span
                                                                    class="text-danger">*</span></p>
                                                        </div>
                                                        {{-- Sample Ref No --}}
                                                        <div class="col-md-12 d-flex justify-content-center">
                                                            <h3>Ref. No. 1001 543 610110</h3>
                                                        </div>
                                                        <div class="col-md-12 d-flex justify-content-center">
                                                            <p>Jan 31, 2023, 10:00 am </p>
                                                        </div>
                                                        {{-- Enter name --}}
                                                        {{-- <div class="col-md-12">
                                                            <input type="text" id="gcash_acc"
                                                                onkeyup="enable_submit()" name="gcash_account"
                                                                class="form-control" maxlength="32">
                                                        </div>
                                                        <div class="col-md-12 mt-1">
                                                            <p class="text-center">Upload your proof of payment here <span
                                                                    class="text-danger">*</span></p>
                                                        </div> --}}
                                                        <div class="col-md-12 d-flex justify-content-center">
                                                            <img id="output" class="img-fluid" />
                                                        </div>
                                                        <div class="col-md-12 mt-1 mx-auto d-flex justify-content-center">
                                                            <input type="file" accept=".png, .jpeg, .jpg, .gif"
                                                                maxlength="500000" onchange="enable_submit(event)"
                                                                id="gcash_img" placeholder="Ex: John Doe" name="images"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" id="submit_button2"
                                                    class="mx-auto d-flex justify-content-center btn btn-success prevent_submit mt--4 btn_submit"
                                                    value="Submit" style="width:40%;" data-target="#submit" disabled />
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
    <script>
        $(function() {
            var startDates = $("#start-dates").val().split(',');
            var endDates = $("#end-dates").val().split(',');

            $('#dates2').hide();

            $("#date1").datepicker({
                minDate: 0,
                buttonImageOnly: true,
                showOn: "both",
                format: 'yyyy-mm-dd',
                buttonImage: "{{ asset('images') }}/calendar2.png",
                beforeShowDay: function(date) {
                    var formattedDate = $.datepicker.formatDate('yy-mm-dd', date);
                    for (var i = 0; i < startDates.length; i++) {
                        if (formattedDate >= startDates[i] && formattedDate <= endDates[i]) {
                            return [false, "disabled-date"];
                        }
                    }
                    return [true, ""];
                },
                onSelect: function(selectedDate) {
                    $('#dates2').show();
                    var minDate = new Date(selectedDate);
                    minDate.setDate(minDate.getDate() + 1);
                    $("#date2").datepicker("option", "minDate", minDate);
                }
            });

            $("#date2").datepicker({
                minDate: 0,
                buttonImageOnly: true,
                showOn: "both",
                format: 'yyyy-mm-dd',
                buttonImage: "{{ asset('images') }}/calendar2.png",
                beforeShowDay: function(date) {
                    var formattedDate = $.datepicker.formatDate('yy-mm-dd', date);
                    for (var i = 0; i < startDates.length; i++) {
                        if (formattedDate >= startDates[i] && formattedDate <= endDates[i]) {
                            return [false, "disabled-date"];
                        }
                    }
                    var startDate = $('#date1').datepicker('getDate');
                    // Disable dates before startDate in datepicker2
                    return date < startDate ? [false] : [true];
                },
                onSelect: function(selectedDate) {
                    var maxDate = new Date(selectedDate);
                    maxDate.setDate(maxDate.getDate() - 1);
                    for (var i = 0; i < startDates.length; i++) {
                        var startDate = new Date(startDates[i]);
                        var endDate = new Date(endDates[i]);
                        if (maxDate >= startDate && maxDate <= endDate) {
                            alert('Date selection not valid.');
                            $("#date2").val('');
                            break;
                        }

                        // var selectedDate = $(this).datepicker('getDate');
                        // var startDate = $('#date1').datepicker('getDate');
                        // var diff = (selectedDate - startDate) / (1000 * 60 * 60 * 24);
                        // if (diff > 6) {
                        //     alert('Date selection not valid.');
                        //     $("#date2").val('');
                        //     return;
                        // }
                    }
                }
            });
        });




        // $(document).ready(function() { //DISABLED PAST DATES IN APPOINTMENT DATE
        //     var dateToday = new Date();
        //     var month = dateToday.getMonth() + 1;
        //     var day = dateToday.getDate();
        //     var year = dateToday.getFullYear();
        //     if (month < 10)
        //         month = '0' + month.toString();
        //     if (day < 10)
        //         day = '0' + day.toString();
        //     var maxDate = year + '-' + month + '-' + day;
        //     $('.chck').attr('min', maxDate);
        // });

        $('.prevent_submit').on('submit', function() {
            $('.prevent_submit').attr('disabled', 'true');
        });

        // mobile no validation
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
    </script>
    <style>
        .datepicker {
            pointer-events: none;
            /* form-control */
            display: block;
            width: 100%;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .datepicker:focus {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .ui-datepicker {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 14px;
            background-color: #fff;
        }

        .ui-datepicker-trigger {
            position: absolute;
            top: 72px;
            right: 0;
            margin-right: 23px;
            cursor: pointer;
            background-image: url("{{ asset('images') }}/calendar2.png }}");
            background-size: 30px 30px;
            width: 30px;
            height: 30px;
        }

        /* Set the color of the datepicker header */
        .ui-datepicker-header {
            background-color: #39D972;
            border: 1px solid #ddd;
            color: #fff;
        }

        /* Set the color of the datepicker days */
        .ui-state-default,
        .ui-widget-content .ui-state-default,
        .ui-widget-header .ui-state-default {
            background-color: #fff;
            border: none;
            color: #333;
        }

        /* Set the color of the selected date */
        .ui-state-active,
        .ui-widget-content .ui-state-active,
        .ui-widget-header .ui-state-active {
            background-color: #6C6C6C;
            border: none;
            color: #fff;
        }

        /* Set the color of the datepicker hover state */
        .ui-state-hover,
        .ui-widget-content .ui-state-hover,
        .ui-widget-header .ui-state-hover {
            background-color: #39D972;
            border: none;
            color: #fff;
        }

        /* Set the color of the datepicker today button */
        .ui-datepicker-current-day {
            background-color: #16BBAE;
            border: none;
            color: #fff;
        }

        /* Set the color of the datepicker navigation icons */
        .ui-icon {
            background-image: none;
            background-color: transparent;
            border: none;
            color: #fff;
        }

        /* Set the color of the datepicker navigation buttons */
        .ui-datepicker-prev,
        .ui-datepicker-next {
            background-image: none;
            background-color: transparent;
            border: none;
            color: #fff;
            font-weight: bold;
        }
    </style>
@endsection
