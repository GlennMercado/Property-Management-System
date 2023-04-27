@extends('layouts.guest', ['title' => __('User Profile')])

@section('content')
    @include('layouts.navbars.navs.guestloggedin')

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>


    <div class="content-area">
        <div class="container mt-7">
            <div class="card shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <h3 class="mb-0">{{ __('Hotel booking') }}</h3>
                    </div>
                </div>
                @forelse ($list as $lists)
                    <div class="card-body">
                        <div class="row">
                            @if ($lists->Booking_Status != 'Checked-Out' && $lists->IsArchived != 1)
                                <div class="col-md-4">
                                    <img class="img-fluid" src="{{ asset('nvdcpics') }}/hotel1.png">
                                </div>
                                <div class="col-md-4">
                                    <h1 class="mt-2">Room {{ $lists->Room_No }}</h1>
                                    <h4>
                                        <i class="bi bi-book-fill"></i>
                                        Booking No. {{ $lists->Booking_No }}
                                    </h4>
                                    <h4><i class="bi bi-person-badge-fill"></i> Gcash account:
                                        {{ $lists->gcash_account_name }}
                                    </h4>
                                    <h4><i class="bi bi-people-fill"></i> Number of pax:
                                        {{ $lists->No_of_Pax }}
                                    </h4>
                                    <h4>
                                        <i class="bi bi-calendar-range-fill"></i>
                                        Check-in/Check-out Date {{ $lists->Check_In_Date }} -
                                        {{ $lists->Check_Out_Date }}
                                    </h4>
                                    <div class="display-4 text-green">PHP
                                        {{ number_format($lists->Payment, 2, '.', ',') }}
                                        <br>
                                        <div class="badge badge-primary font-weight-bold display-3">
                                            STATUS {{ $lists->Payment_Status }}
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4 d-flex flex-column align-items-center">
                                    <div class="p-2">
                                        {!! QrCode::size(200)->generate(url('/CheckInQr', ['id' => $lists->Booking_No])) !!}
                                        {{-- {!! QrCode::size(250)->generate('{{ url('guest_profile') }}') !!} --}}
                                    </div>
                                    <div class="mt--2">
                                        <p class="font-weight-bold display-5 text-center">Show this QR code to the
                                            receptionist</p>
                                    </div>
                                </div>
                                {{-- <div class="col-md-12">
                                <h4 class="text-muted text-center mt-3">Click to view</h4>
                            </div> --}}
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="text-center display-5">No bookings yet</p>
                    <img src="{{ asset('nvdcpics') }}/empty2.svg" class="img-fluid" style="width: 100%; height: 200px">
                @endforelse
            </div>
            {{-- <div class="card shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <h3 class="mb-0">{{ __('My Bookings') }}</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div>
                        <table class="table align-items-center">
                            <thead>
                                <tr>
                                    <th scope="col" class="sort" data-sort="budget">Room No.</th>
                                    <th scope="col" class="sort" data-sort="status">No. of Pax</th>
                                    <th scope="col">Payment Status</th>
                                    <th scope="col" class="sort" data-sort="completion">Booking Status</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach ($list as $lists)
                                    @if ($lists->Booking_Status != 'Checked-Out' && $lists->IsArchived != 1)
                                        <tr>
                                            <td>{{ $lists->Room_No }}</td>
                                            <td>{{ $lists->No_of_Pax }}</td>
                                            <td>{{ $lists->Payment_Status }}</td>
                                            <td><button type="button" class="btn btn-sm btn-outline-primary"
                                                    data-toggle="modal" data-target="#ViewPayment">
                                                    View Payment
                                                </button>
                                            </td>
                                            <td>
                                                @if ($lists->Payment_Status == 'Paid')
                                                    <button class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                                        data-target="#view_qr{{ $lists->Booking_No }}">
                                                        View QR
                                                    </button>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($lists->Payment_Status == 'Paid')
                                                    <button type="button" class="btn btn-sm btn-outline-danger d-none"
                                                        data-toggle="modal" data-target="#CancelBooking">Cancel</button>
                                                @else
                                                    <button type="button" class="btn btn-sm btn-outline-danger"
                                                        data-toggle="modal" data-target="#CancelBooking">Cancel</button>
                                                @endif
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="view_qr{{ $lists->Booking_No }}" tabindex="-1"
                                            role="dialog"aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <p class="modal-title text-left display-5" id="exampleModalLabel">
                                                            Hotel Reservation QR CODE
                                                        </p>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body d-flex justify-content-center">
                                                        {!! QrCode::size(200)->generate($lists->Booking_No) !!}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a class="btn btn-secondary" data-dismiss="modal">Close</a>                                               
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}
            {{-- Proof of Payment Modal --}}
            <div class="modal fade" id="ViewPayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" id="exampleModalLabel">Send Proof of Payment</h1>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="file" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Cancel Booking Modal --}}
            <div class="modal fade" id="CancelBooking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" id="exampleModalLabel">Are you sure you want to cancel?</h1>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            You won't be able to revert a booking cancellation once you confirm it.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Finished Booking -->
            <div class="card shadow mt-2">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <h3 class="mb-0">{{ __('Finished Bookings') }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @forelse ($list as $lists)
                            <table class="table align-items-center">
                                <thead>
                                    <tr>
                                        <th scope="col" class="sort" data-sort="budget">Room No.</th>
                                        <th scope="col" class="sort" data-sort="status">No. of Pax</th>
                                        <th scope="col">Payment Status</th>
                                        <th scope="col" class="sort" data-sort="completion">Booking Status
                                        </th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @if ($lists->Booking_Status == 'Checked-Out' && $lists->IsArchived == 1)
                                        <tr>
                                            <td>{{ $lists->Room_No }}</td>
                                            <td>{{ $lists->No_of_Pax }}</td>
                                            <td>{{ $lists->Payment_Status }}</td>
                                            <td>{{ $lists->Booking_Status }}</td>
                                            <td>
                                                @if ($lists->Payment_Status == 'Paid')
                                                    <!--View QR Button-->
                                                    <button class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                                        data-target="#view_qr{{ $lists->Booking_No }}">
                                                        View QR
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                        <!--View QR-->
                                        <div class="modal fade" id="view_qr{{ $lists->Booking_No }}" tabindex="-1"
                                            role="dialog"aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <p class="modal-title text-left display-5" id="exampleModalLabel">
                                                            Hotel Reservation QR CODE
                                                        </p>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body d-flex justify-content-center">
                                                        {!! QrCode::size(200)->generate($lists->Booking_No) !!}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                        <!--<input type="submit" class="btn btn-success prevent_submit" value="Submit" />-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </tbody>
                            </table>
                        @empty
                            <p class="text-center display-5">No finished bookings yet</p>
                            <img src="{{ asset('nvdcpics') }}/empty1.svg" class="img-fluid"
                                style="width: 100%; height: 200px">
                        @endforelse
                    </div>
                </div>
            </div>
            {{-- Convention center applications --}}
            <div class="card bg-white shadow mt-2 mb-2">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <h3 class="mb-0">{{ __('Convention Center Inquiry') }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    @forelse ($event as $event)
                        <div class="table-responsive">
                            <table class="table align-items-center">
                                <thead>
                                    <tr>
                                        <th>CONTROL NO.</th>
                                        <th>APPLICATION STATUS</th>
                                        <th>APPLICATION DATE</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            {{ $event->id }}
                                        </td>
                                        <td>
                                            <a href="#"
                                                class="badge-md badge-pill badge-primary">{{ $event->inquiry_status }}</a>
                                            (Please check
                                            your email)
                                        </td>
                                        <td>
                                            {{ $event->created_at }}
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                data-target="#eventinq">View
                                                Appication</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @empty
                        <p class="text-center display-5">No inquiry yet</p>
                        <img src="{{ asset('nvdcpics') }}/eventempty.svg" class="img-fluid"
                            style="width: 100%; height: 200px">
                    @endforelse
                </div>
            </div>


            <div class="modal fade" id="eventinq" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Event inquiry</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @forelse($event1 as $event1)
                                <div class="col">
                                    <h3><span><button class="btn btn-success" disabled="">1</button></span>
                                        &nbsp;
                                        Event Application
                                        Form</h3>
                                </div>
                                <div class="row ">
                                    <div class="col-md pt-2">
                                        <p>Client Name <span class="text-danger">*</span></p>
                                        <input type="text" id="name" name="client_name" class="form-control"
                                            placeholder="Enter client name" maxlength="64" onchange="validateName()"
                                            value="{{ $event1->client_name }}" readonly>
                                        <p id="name-error" style="color: red; font-size: 14px;"></p>
                                    </div>
                                    <div class="col-md pt-2">
                                        <p>Contact Number <span class="text-danger">*</span></p>
                                        <input type="number" onkeypress="if(this.value.length==10) return false;"
                                            title="Please use a 10 digit mobile number with no dashes or dots"
                                            name="contact_no" class="form-control" placeholder="09XXXXXXXX"
                                            id="contact" onchange="validateContact()"
                                            value="{{ $event1->contact_no }}" readonly>
                                        <p id="contact-error" style="color: red; font-size: 14px;"></p>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md pt-4">
                                        <p>Contact Person <span class="text-danger">*</span></p>
                                        <input type="text" name="contact_person" class="form-control"
                                            placeholder="Enter contact person" maxlength="64" id="contactperson"
                                            onchange="validateContactPerson()" value="{{ $event1->contact_person }}"
                                            readonly>
                                        <p id="cp-error" style="color: red; font-size: 14px;"></p>
                                    </div>
                                    <div class="col-md pt-4">
                                        <p>Contact Person Number <span class="text-danger">*</span></p>
                                        <input type="number" onkeypress="if(this.value.length==10) return false;"
                                            title="Please use a 10 digit mobile number with no dashes or dots"
                                            name="contact_person_no" class="form-control" placeholder="09XXXXXXXX"
                                            id="ContactPersonNum" onchange="validateContactPersonNum()"
                                            value="{{ $event1->contact_person_no }}" readonly>
                                        <p id="ContactPersonNum-error" style="color: red; font-size: 14px;"></p>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md pt-4">
                                        <p>Billing Address <span class="text-danger">*</span></p>
                                        <input type="text" name="billing_address" maxlength="82" class="form-control"
                                            placeholder="Enter billing address" id="address"
                                            onchange="validateAddress()" value="{{ $event1->billing_address }}" readonly>
                                        <p id="address-error" style="color: red; font-size: 14px;"></p>
                                    </div>
                                    <div class="col-md pt-4">
                                        <p>Contact Email <span class="text-danger">*</span></p>
                                        <input type="email" name="email_address" class="form-control"
                                            placeholder="Enter email address" maxlength="32" id="email"
                                            onchange="validateEmail()" value="{{ $event1->email_address }}" readonly>
                                        <p id="email-error" style="color: red; font-size: 14px;"></p>
                                    </div>
                                </div>

                                <p class="pt-4">&nbsp; Event
                                    Information</p>
                                <div class="row">
                                    <div class="col-md pt-4">
                                        <p>Event Name <span class="text-danger">*</span></p>
                                        <input type="text" name="event_name" class="form-control"
                                            placeholder="Enter event name" maxlength="64" id="Event"
                                            onchange="validateEvent()" value="{{ $event1->event_name }}" readonly>
                                        <p id="event-error" style="color: red; font-size: 14px;"></p>
                                    </div>
                                    <div class="col-md pt-4">
                                        <p>Event Type <span class="text-danger">*</span></p>
                                        <input type="text" name="event_type" class="form-control"
                                            placeholder="Enter event type" maxlength="32" id="EventType"
                                            onchange="validateEventType()" value="{{ $event1->event_type }}" readonly>
                                        <p id="eventType-error" style="color: red; font-size: 14px;"></p>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md pt-4">
                                        <p>Event Date/Time <span class="text-danger">*</span></p>
                                        <input class="form-control" name="event_date" type="date"
                                            onkeydown="return false" id="example-datetime-local-input"
                                            onchange="validateDate()" value="{{ $event1->event_date }}" readonly>
                                        <p id="date-error" style="color: red; font-size: 14px;"></p>
                                    </div>
                                    <div class="col-md pt-4">
                                        <span>
                                            <p>Expected No. of Guest <span class="text-danger">*</span></p>
                                            <input type="number" name="no_of_guest" class="form-control"
                                                placeholder="Enter expected no. of guest" id="No"
                                                onchange="validateNo()" value="{{ $event1->no_of_guest }}" readonly>
                                            <p id="no-error" style="color: red; font-size: 14px;"></p>
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <input type="text" name="inquiry_status" value="For Approval" hidden="">
                                    <div class="col-md-12">
                                        <span>
                                            <br>
                                            <br>
                                            <p>Venue<span class="text-danger">*</span></p>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input class="form-control-sm" type="text" name="venue"
                                                        id="specify_venue_text" maxlength="32"
                                                        value="{{ $event1->venue }}" readonly>
                                                </div>
                                            </div>
                                        </span>
                                    </div>
                                    <div class="col-md-12">
                                        <span>
                                            <br>
                                            <br>
                                            <p>Caterer <span class="text-danger">*</span></p>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input class="form-control-sm" type="text" name="caterer"
                                                        id="specify_caterer_text" maxlength="32"
                                                        value="{{ $event1->caterer }}" readonly>
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
                                                    <input class="form-control-sm" type="text" name="audio_visual"
                                                        id="specify_audio_visual_text" maxlength="32"
                                                        value="{{ $event1->audio_visual }}" readonly>
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
                                                    <input class="form-control-sm" type="text" name="concept"
                                                        id="specify_concept_text" maxlength="32"
                                                        value="{{ $event1->concept }}" readonly>
                                                </div>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <p class="text-red">Corkage fee of P50.00 per head will apply for non-accredited
                                    caterer.
                                </p>
                                <br>
                                <br>
                                <br>
                                <p class="text-center font-weight-bold">
                                    This information requested in this profiling is voluntary and confidential and
                                    is not to
                                    be
                                    used for any purpose. The bearer understand its content and voluntarily give
                                    his/her
                                    consent
                                    for the collection use, processing, storage and retention of his/her personal
                                    data
                                    subject
                                    to RA 10173 - Data Privacy Act of 2021.
                                </p>
                            @empty
                                <p class="display-3">You have no application</p>
                            @endforelse
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <script>
            $(function() {
                $('.interview_modal').on('shown.bs.modal', function() {
                    $("#interview").datepicker({
                        minDate: 0,
                        buttonImageOnly: true,
                        showOn: "both",
                        format: 'yyyy-mm-dd',
                        buttonImage: "{{ asset('images') }}/calendar2.png",
                        beforeShowDay: function(date) {
                            // Convert date to yyyy-mm-dd format
                            var year = date.getFullYear();
                            var month = ('0' + (date.getMonth() + 1)).slice(-2);
                            var day = ('0' + date.getDate()).slice(-2);
                            var formattedDate = year + '-' + month + '-' + day;

                            // Check if formattedDate is in startDates array
                            var startDates = [];

                            $("input[name='start_dates[]']").each(function() {
                                startDates.push($(this).val());
                            });

                            if (startDates.includes(formattedDate)) {
                                return [false, 'unavailable-date'];
                            } else {
                                return [true, ''];
                            }
                        }
                    });
                });
            });
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
                z-index: 1600 !important;
                /* adjust the z-index to be higher than the modal's z-index */
                position: absolute;
                top: 42% !important;
                left: 33% !important;
                transform: translate(-50%, -50%);
            }

            .ui-datepicker-trigger {
                position: absolute;
                top: 60px;
                right: 0;
                margin-right: 30px;
                cursor: pointer;
                background-image: url("{{ asset('images') }}/calendar2.png}}");
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
