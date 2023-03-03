@extends('layouts.guest', ['class' => 'bg-light'])

@section('content')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <div class="container-fluid bg-white mt-6">
        <div class="row d-flex">
            <div class="col-md-6 mt-7">
                <h1>FREQUENTLY ASKED QUESTIONS (FAQ) <i class="bi bi-question-circle-fill"></i></h1>
                <br>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    What is the standard check-in/out time in the hotels?
                                </button>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                The standard check-in / out time is after 1400 hours (02:00 pm) and the check-out time is
                                12:00 noon.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                    aria-expanded="false" aria-controls="collapseTwo">
                                    Can I book more than four people in one room?
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                Few hotels do allow more than four people as per the room category and hotel policy.
                                However, you may have to book an additional room(s) if the hotel doesn’t allow more than
                                four people. If you have any query, check directly with your hotel for their extra-guest
                                charges and the maximum number of people allowed in the room you have booked.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"
                                    aria-expanded="false" aria-controls="collapseThree">
                                    What will happen if I check out late?
                                </button>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">
                                Late check out time and night extensions may be accommodated, subject to availability of the
                                room. Charges will apply.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="heading4">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse4"
                                    aria-expanded="false" aria-controls="collapse4">
                                    I have made a hotel room booking. What happens next?
                                </button>
                            </h5>
                        </div>
                        <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordion">
                            <div class="card-body">
                                Once the hotel room booking and payment process is completed, we will send across a
                                confirmation email (on the email address you have registered while making the booking).
                                Please take a print out of the confirmed hotel voucher and present it at the hotel counter
                                during the check-in.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="heading5">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse5"
                                    aria-expanded="false" aria-controls="collapse5">
                                    How do I know if my hotel booking was successful?
                                </button>
                            </h5>
                        </div>
                        <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordion">
                            <div class="card-body">
                                After the payment process is completed, you will receive an email confirmation from NOVADECI
                                Properties. Please take a print out of the confirmed hotel voucher and present it at the
                                hotel counter during the check-in
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="heading6">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse6"
                                    aria-expanded="false" aria-controls="collapse6">
                                    What will happen if the guest didn’t show up?
                                </button>
                            </h5>
                        </div>
                        <div id="collapse6" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                In the event the guest did not show up on the scheduled arrival date, with no prior
                                amendments on reservation or notice of cancellation, he/she will be charged equivalent of
                                one night’s accommodation.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="heading7">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse7"
                                    aria-expanded="false" aria-controls="collapse7">
                                    What will happen if I cancel my reservation?
                                </button>
                            </h5>
                        </div>
                        <div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#accordion">
                            <div class="card-body">
                                Cancellations done more than three (3) calendar days before check in date will be free of
                                charge. If within three (3) calendar days, guests will be charged of the total price.
                                Refund, in case of guaranteed reservation, is payable through check issuance.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="heading8">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse8"
                                    aria-expanded="false" aria-controls="collapse8">
                                    Do I need to show any documents to check-in at the hotel?
                                </button>
                            </h5>
                        </div>
                        <div id="collapse8" class="collapse" aria-labelledby="heading8" data-parent="#accordion">
                            <div class="card-body">
                                For security purposes, all incoming guests shall be asked to provide a valid
                                government-issued ID upon registration and check in. Out of the country guests must present
                                passport to Front Desk / Receptionist. They have the right to reproduce / photocopy the
                                presented ID, for filing and documentation purposes only.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="heading9">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse9"
                                    aria-expanded="false" aria-controls="collapse9">
                                    Can I do early/late check-in/out at the hotel?
                                </button>
                            </h5>
                        </div>
                        <div id="collapse9" class="collapse" aria-labelledby="heading9" data-parent="#accordion">
                            <div class="card-body">
                                The standard check-in/out time in hotels is 12 noon. However, there are some hotels who
                                allow early check-in or late check-out depending on the availability of the room. Early
                                check in may be accommodated, subject to availability of the room. Charges may apply.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="heading10">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse10"
                                    aria-expanded="false" aria-controls="collapse10">
                                    Are the rates on your website per person or per room?
                                </button>
                            </h5>
                        </div>
                        <div id="collapse10" class="collapse" aria-labelledby="heading10" data-parent="#accordion">
                            <div class="card-body">
                                All rates on the website are per room per stay, unless stated differently.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="heading11">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse11"
                                    aria-expanded="false" aria-controls="collapse11">
                                    Is breakfast included in the price?
                                </button>
                            </h5>
                        </div>
                        <div id="collapse11" class="collapse" aria-labelledby="heading11" data-parent="#accordion">
                            <div class="card-body">
                                Yes, breakfast per pax is included in the prize.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="heading12">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse12"
                                    aria-expanded="false" aria-controls="collapse12">
                                    Where are you located?
                                </button>
                            </h5>
                        </div>
                        <div id="collapse12" class="collapse" aria-labelledby="heading12" data-parent="#accordion">
                            <div class="card-body">
                                NOVADECI Property located at 123 General Luis St. Bgy. Nagkaisang Nayon, Quezon City.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="heading13">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse13"
                                    aria-expanded="false" aria-controls="collapse13">
                                    How to apply for commercial space?
                                </button>
                            </h5>
                        </div>
                        <div id="collapse13" class="collapse" aria-labelledby="heading13" data-parent="#accordion">
                            <div class="card-body">
                                For Inquiries, please contact 0917-6237825 0917-6537945 and look for Ms. Claud Cariño / Ms.
                                Jennifer Lee or you can simply send your email at nvdcproperties@gmail.com FOR Walk in
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-9 d-flex justify-content-center">
                <img class="img-fluid mt-6" src="{{ asset('hotel_images') }}/FAQ.png"
                    style="max-height: 300px; max width:300px;">
            </div>
        </div>
        @include('layouts.footers.guest')
        <div class="container mt--5 pb-5"></div>
    @endsection
