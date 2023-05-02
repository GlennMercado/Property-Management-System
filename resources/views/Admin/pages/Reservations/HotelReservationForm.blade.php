@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <div class="container-fluid mt--8">
        <div class="row align-items-center py-4">
            <div class="col-lg-12 col-12">
                <h6 class="h2 text-dark d-inline-block mb-0">Hotel Booking</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item">Sales & Marketing</li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">Hotel Booking</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            {{-- <div class="col-md-8">
                <div class="card card-shadow">
                    <div class="card-header">
                        <div class="d-flex">
                            <span class="p-2">Guest Folio</span>
                            <a href="{{ route('FrontDesk') }}" class="btn bg-green text-white ml-auto">
                                <i class="bi bi-plus-circle"></i>
                            </a>
                        </div>
                    </div>
                        <div class="card-body" id="">
                            <div class="d-flex">
                                <p class="font-weight-bold text-muted">NAME: <span class="text-dark"></span></p>
                                <p class="font-weight-bold ml-auto text-muted">ARRIVAL DATE/TIME: <span
                                        class="text-dark"></span></p>
                            </div>
                            <div class="d-flex">
                                <p class="font-weight-bold mt--3 text-muted">ROOM: <span class="text-dark"></span></p>
                                <p class="font-weight-bold ml-auto mt--3 text-muted">DEPARTURE DATE/TIME: <span
                                        class="text-dark"></span></p>
                            </div>
                            <div class="d-flex">
                                <p class="font-weight-bold mt--3 text-muted">PAX: <span class="text-dark"></span></p>
                            </div>
                            <div class="d-flex">
                                <p class="font-weight-bold mt--3 text-muted">DAYS: <span class="text-dark"></span></p>
                            </div>
                            <p class="font-weight-bold mt--2 text-muted">ADDITIONAL CHARGES</p>
                            <div class="d-flex flex-column table-container">
                                <table class="table1">
                                    <thead style="border-bottom: 2px solid rgb(167, 167, 167)">
                                        <tr>
                                            <th class="font-weight-bold text-muted">ITEM</th>
                                            <th class="font-weight-bold text-muted">PRICE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="font-weight-bold text-dark"></td>
                                            <td class="font-weight bold text-dark"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center pb-5">
                                <p class="font-weight-bold text-muted p-1">TOTAL PAYMENT: </p>
                                <p class="display-4 text-green"></p>
                            </div>
                        </div>
                </div>
            </div> --}}
            <div class="col-md-4 col-xl-4">
                <div class="card bg-c-blue order-card">
                    <div class="card-block">
                        <h4 class="m-b-20 text-white">Reserved</h4>
                        <h2 class="text-right text-white">
                            <i class="bi bi-book-fill f-left"></i><span>{{ $reserved_guests }}</span>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-4">
                <div class="card bg-c-green order-card">
                    <div class="card-block">
                        <h4 class="m-b-20 text-white">Checked in</h4>
                        <h2 class="text-right text-white">
                            <i class="bi bi-bookmark-check-fill f-left"></i><span>{{ $checked_guests }}</span>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-4">
                <div class="card bg-c-yellow order-card">
                    <div class="card-block">
                        <h4 class="m-b-20 text-white">Pending</h4>
                        <h2 class="text-right text-white">
                            <i class="bi bi-clock-history f-left"></i><span>{{ $checked_out_guests }}</span>
                        </h2>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-4 col-xl-4">
                <div class="card bg-c-pink order-card">
                    <div class="card-block">
                        <h4 class="m-b-20 text-white">Cancelled</h4>
                        <h2 class="text-right text-white">
                            <i class="bi bi-x-octagon-fill f-left"></i><span></span>
                        </h2>
                    </div>
                </div>
            </div> --}}
            <div class="col-md-4 col-xl-4">
                <div class="card bg-primary order-card">
                    <div class="card-block">
                        <h4 class="m-b-20 text-white">Arriving</h4>
                        <h2 class="text-right text-white">
                            <i class="bi bi-box-arrow-in-up-left f-left"></i><span>{{ $count_daily }}</span>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-4">
                <div class="card bg-orange order-card">
                    <div class="card-block">
                        <h4 class="m-b-20 text-white">Departing</h4>
                        <h2 class="text-right text-white">
                            <i class="bi bi-box-arrow-down-right f-left"></i><span>{{ $count_daily1 }}</span>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="card shadow mt--3 col-md-12">
                <div class="card-header">
                    <form action="{{ url('/report') }}" target="blank" method="get">
                        <div class="d-flex flex-row">
                            <div class="p-2">
                                <label for="optionselect">Sort:</label>
                                <select class="form-control" style="border:2px solid" id="optionselect" name="sort">
                                    <option value="Pending" selected="true">Pending</option>
                                    <option value="Reserved">Reserved</option>
                                    <option value="Checked-In">Checked-In</option>
                                    <option value="Finished">Finished</option>
                                    <option value="All">All</option>
                                </select>
                            </div>
                            <div class="p-2">
                                <label for="start_date">Start Date:</label>
                                <input type="date" class="form-control" id="start_date" name="start_date">
                            </div>
                            <div class="p-2">
                                <label for="end_date">End Date:</label>
                                <input type="date" class="form-control" id="start_date" name="end_date">
                            </div>
                            <div class="p-2">
                                <label>Generate report:</label>
                                <button type="submit" class="btn btn-success w-75 h-50">
                                    <label class = "">Print</label><span class = ""> <i class="bi bi-printer-fill"></i></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                @php $now = date('Y-m-d'); @endphp
                <div class="card-body">
                    <div class="table-responsive">
                        <!-- Pending -->
                        <div id="pending">
                            <table class="table align-items-center table-flush" id="myTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" style="font-size:17px;">Action</th>
                                        <th scope="col" style="font-size:17px;">Booking No.</th>
                                        <th scope="col" style="font-size:17px;">Room No.</th>
                                        <th scope="col" style="font-size:17px;">Guest Name</th>
                                        <th scope="col" style="font-size:17px;">Arrival Date</th>
                                        <th scope="col" style="font-size:17px;">Departure Date</th>
                                        <th scope="col" style="font-size:17px;">Payment</th>
                                        <th scope="col" style="font-size:17px;">Payment Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $lists)
                                        @if ($lists->IsArchived == false && $lists->Payment_Status == 'Pending')
                                            <tr>
                                                <td>
                                                    {{-- view button --}}
                                                    <button class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                                        data-target="#view{{ $lists->Booking_No }}"> <i
                                                            class="bi bi-eye-fill"></i> </button>
                                                    <!--update Button-->
                                                    @if ($lists->Payment_Status == 'Pending')
                                                        <button class="btn btn-sm btn-warning" data-toggle="modal"
                                                            data-target="#update{{ $lists->Booking_No }}"> <i
                                                                class="bi bi-arrow-clockwise"></i></button>
                                                    @endif
                                                </td>
                                                <td style="font-size:14px;">{{ $lists->Booking_No }}</td>
                                                <td style="font-size:14px;">{{ $lists->Room_No }}</td>
                                                <td style="font-size:14px;">{{ $lists->Guest_Name }}</td>
                                                <td style="font-size:14px;">{{ $lists->Check_In_Date }}</td>
                                                <td style="font-size:14px;">{{ $lists->Check_Out_Date }}</td>
                                                <td style="font-size:14px;">{{ $lists->Payment }}</td>
                                                <td>
                                                    <span class="badge badge-info">
                                                        {{ $lists->Payment_Status }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endif

                                        <!--View-->
                                        <div class="modal fade bd-example-modal-lg" id="view{{ $lists->Booking_No }}"
                                            tabindex="-1" role="dialog"aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-left display-4"
                                                            id="exampleModalLabel">
                                                            Hotel Reservation
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <p class="text-left">Reservation Number: </p>
                                                                <input class="form-control" type="text"
                                                                    value="{{ $lists->Booking_No }}" readonly>
                                                            </div>
                                                            <div class="col">
                                                                <p class="text-left">Room Number: </p>
                                                                <input class="form-control" type="text"
                                                                    value="{{ $lists->Room_No }}" readonly>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col">
                                                                <p class="text-left">Number of Pax: </p>
                                                                <input class="form-control" type="text"
                                                                    value="{{ $lists->No_of_Pax }}" readonly>
                                                            </div>
                                                            <div class="col">
                                                                <p class="text-left">Payment Status: </p>
                                                                <input class="form-control" type="text"
                                                                    value="{{ $lists->Payment_Status }}" readonly>
                                                            </div>
                                                        </div>

                                                        <br>
                                                        <div class="row">
                                                            <div class="col">
                                                                <p class="text-left">Guest Name: </p>
                                                                <input class="form-control" type="text"
                                                                    value="{{ $lists->Guest_Name }}" readonly>
                                                            </div>
                                                            <div class="col">
                                                                <p class="text-left">Mobile Number: </p>
                                                                <input class="form-control" type="text"
                                                                    value="{{ $lists->Mobile_Num }}" readonly>
                                                            </div>
                                                        </div>

                                                        @if ($lists->Email != null)
                                                            <br>
                                                            <p class="text-left">Email Address: </p>
                                                            <input class="form-control" type="text"
                                                                value="{{ $lists->Email }}" readonly>
                                                        @endif

                                                        <br>
                                                        <div class="row">
                                                            <div class="col">
                                                                <p class="text-left">Check In Date: </p>
                                                                <input class="form-control" type="text"
                                                                    value="{{ date('F j, Y', strtotime($lists->Check_In_Date)) }}"
                                                                    readonly>
                                                            </div>
                                                            <div class="col">
                                                                <p class="text-left">Check Out Date: </p>
                                                                <input class="form-control" type="text"
                                                                    value="{{ date('F j, Y', strtotime($lists->Check_Out_Date)) }}"
                                                                    readonly>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                        <!--<input type="submit" class="btn btn-success prevent_submit" value="Submit" />-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--Update Status-->
                                        <div class="modal fade" id="update{{ $lists->Booking_No }}" tabindex="-1"
                                            role="dialog"aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title text-left display-4"
                                                            id="exampleModalLabel">
                                                            Proof of Payment
                                                        </h3>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body row">
                                                        <div class="col-md-6 text-sm font-weight-bold">
                                                            Room no:
                                                        </div>
                                                        <div class="col-md-6 text-sm">
                                                            {{ $lists->Room_No }}
                                                        </div>
                                                        <div class="col-md-6 text-sm font-weight-bold mt-2">
                                                            Name:
                                                        </div>

                                                        <div class="col-md-6 text-sm mt-2">
                                                            {{ $lists->Guest_Name }}
                                                        </div>
                                                        <div class="col-md-6 text-sm font-weight-bold mt-2">
                                                            Email:
                                                        </div>
                                                        <div class="col-md-6 text-sm mt-2">
                                                            {{ $lists->Email }}
                                                        </div>
                                                        <div class="col-md-6 text-sm font-weight-bold mt-2">
                                                            Mobile no:
                                                        </div>
                                                        <div class="col-md-6 text-sm mt-2">
                                                            {{ $lists->Mobile_Num }}
                                                        </div>
                                                        <div class="col-md-6 text-sm font-weight-bold mt-2">
                                                            Check in date/time:
                                                        </div>
                                                        <div class="col-md-6 text-sm mt-2">
                                                            {{ $lists->Check_In_Date }}
                                                        </div>
                                                        <div class="col-md-6 text-sm font-weight-bold mt-2">
                                                            Check out date/time:
                                                        </div>
                                                        <div class="col-md-6 text-sm mt-2">
                                                            {{ $lists->Check_Out_Date }}
                                                        </div>
                                                        {{-- <a href="{{ url($lists->Proof_Image) }}" data-lightbox="photos">
                                                            <img src="{{ url($lists->Proof_Image) }}"
                                                                class="card-img-top p-5" /> --}}
                                                        </a>
                                                        <div class="row p-3 mt-2">
                                                            <div class="col-md-6 text-sm font-weight-bold">
                                                                <h3 class="p-2">Payment method:</h3>
                                                            </div>
                                                            <div class="col-md-6 text-sm font-weight-bold">
                                                                <img class="gcash"
                                                                    src="{{ asset('nvdcpics') }}/Gcash.png"
                                                                    style="width: 200px; height: 60px">
                                                            </div>
                                                            <div class="col-md-12 text-sm font-weight-bold mt-4">
                                                                <h3 class="p-2">Total Payment:</h3>
                                                                <h2 class="display-2 mt--3 text-green p-2" id="currency">
                                                                    ₱{{ $lists->Payment }}
                                                                </h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                        <!--<input type="submit" class="btn btn-success prevent_submit" value="Submit" />-->
                                                        <a href="{{ url('/update_hotel_payment', ['id' => $lists->Booking_No, 'no' => $lists->Room_No, 'check' => $lists->IsArchived]) }}"
                                                            class="btn btn-success">Approve Payment</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Reserved -->
                        <div id="reserved" style="display:none">
                            <table class="table align-items-center table-flush" id="myTable2">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" style="font-size:17px;">Action</th>
                                        <th scope="col" style="font-size:17px;">Guest Name</th>
                                        <th scope="col" style="font-size:17px;">Booking Number</th>
                                        <th scope="col" style="font-size:17px;">Room No.</th>
                                        <th scope="col" style="font-size:17px;">Payment Status</th>
                                        <th scope="col" style="font-size:17px;">Check-In Date</th>
                                        <th scope="col" style="font-size:17px;">Check-Out Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($list as $lists)
                                        @if ($lists->Booking_Status == 'Reserved' && $lists->IsArchived == false && $lists->Payment_Status == 'Paid')
                                            <tr>
                                                <td>
                                                    <!--View Button-->
                                                    <button class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                                        data-target="#views{{ $lists->Booking_No }}"> <i
                                                            class="bi bi-eye-fill"></i> </button>
                                                    <!--Update Reservation/Room Status Button-->
                                                    @if($lists->Status == "Vacant for Accommodation" || $lists->Status == "Reserved")
                                                        @if($lists->Check_In_Date <= $now)
                                                            <button class="btn btn-sm btn-warning" data-toggle="modal"
                                                                data-target="#update_booking_status{{ $lists->Booking_No }}">
                                                                <i class="bi bi-arrow-clockwise"></i>
                                                            </button>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td style="font-size:14px;">{{ $lists->Guest_Name }}</td>
                                                <td style="font-size:14px;">{{ $lists->Booking_No }}</td>
                                                <td style="font-size:14px;">{{ $lists->Room_No }}</td>
                                                <td style="font-size:14px;">{{ $lists->Payment_Status }}</td>
                                                <td style="font-size:14px;">{{ date('F j, Y', strtotime($lists->Check_In_Date)) }}</td>
                                                <td style="font-size:14px;">{{ date('F j, Y', strtotime($lists->Check_Out_Date)) }}</td>
                                            </tr>
                                        @endif

                                        <!--Update Status-->
                                        <div class="modal fade" id="update_booking_status{{ $lists->Booking_No }}"
                                            tabindex="-1" role="dialog"aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title text-left display-4"
                                                            id="exampleModalLabel">
                                                            Hotel Reservation
                                                        </h3>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4 class="text-center">Change <span
                                                                style="color:green;">{{ $lists->Guest_Name }}</span>
                                                            Booking
                                                            Status From Reserved to Checked-In</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                        <!--<input type="submit" class="btn btn-success prevent_submit" value="Submit" />-->
                                                        <a href="{{ url('/update_booking_status', ['id' => $lists->Booking_No, 'no' => $lists->Room_No, 'check' => $lists->IsArchived, 'stats' => 'Checked-In2']) }}"
                                                            class="btn btn-success">Yes</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--View-->
                                        <div class="modal fade" id="views{{ $lists->Booking_No }}" tabindex="-1"
                                            role="dialog"aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-left display-4"
                                                            id="exampleModalLabel">
                                                            Hotel Reservation
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <p class="text-left">Reservation Number: </p>
                                                                <input class="form-control" type="text"
                                                                    value="{{ $lists->Booking_No }}" readonly>
                                                            </div>
                                                            <div class="col">
                                                                <p class="text-left">Room Number: </p>
                                                                <input class="form-control" type="text"
                                                                    value="{{ $lists->Room_No }}" readonly>
                                                            </div>
                                                        </div>

                                                        <br>

                                                        <div class="row">
                                                            <div class="col">
                                                                <p class="text-left">Number of Pax: </p>
                                                                <input class="form-control" type="text"
                                                                    value="{{ $lists->No_of_Pax }}" readonly>
                                                            </div>
                                                            <div class="col">
                                                                <p class="text-left">Payment Status: </p>
                                                                <input class="form-control" type="text"
                                                                    value="{{ $lists->Payment_Status }}" readonly>
                                                            </div>
                                                        </div>

                                                        <br>
                                                        <div class="row">
                                                            <div class="col">
                                                                <p class="text-left">Guest Name: </p>
                                                                <input class="form-control" type="text"
                                                                    value="{{ $lists->Guest_Name }}" readonly>
                                                            </div>
                                                            <div class="col">
                                                                <p class="text-left">Mobile Number: </p>
                                                                <input class="form-control" type="text"
                                                                    value="{{ $lists->Mobile_Num }}" readonly>
                                                            </div>
                                                        </div>

                                                        @if ($lists->Email != null)
                                                            <br>
                                                            <p class="text-left">Email Address: </p>
                                                            <input class="form-control" type="text"
                                                                value="{{ $lists->Email }}" readonly>
                                                        @endif

                                                        <br>
                                                        <div class="row">
                                                            <div class="col">
                                                                <p class="text-left">Check In Date: </p>
                                                                <input class="form-control" type="text"
                                                                    value="{{ date('F j, Y', strtotime($lists->Check_In_Date)) }}"
                                                                    readonly>
                                                            </div>
                                                            <div class="col">
                                                                <p class="text-left">Check Out Date: </p>
                                                                <input class="form-control" type="text"
                                                                    value="{{ date('F j, Y', strtotime($lists->Check_Out_Date)) }}"
                                                                    readonly>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                        <!--<input type="submit" class="btn btn-success prevent_submit" value="Submit" />-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Checked-In -->
                        <div id="checkin" style="display:none;">
                            <table class="table align-items-center table-flush" id="myTable3">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" style="font-size:17px;">Action</th>
                                        <th scope="col" style="font-size:17px;">Booking Number</th>
                                        <th scope="col" style="font-size:17px;">Room No.</th>
                                        <th scope="col" style="font-size:17px;">Guest Name</th>
                                        <th scope="col" style="font-size:17px;">Payment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $index => $lists)
                                        @if (
                                            $lists->Booking_Status == 'Checked-In' ||
                                                $lists->Booking_Status == 'Checking(Before Check-Out)' ||
                                                ($lists->Booking_Status == 'Room Checked' && $lists->IsArchived == false && $lists->Payment_Status == 'Paid'))
                                            <tr>
                                                <td>
                                                    <!--View Button-->
                                                    <button class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                                        data-target="#views1{{ $lists->Booking_No }}" title="View">
                                                        <i class="bi bi-eye-fill"></i>
                                                    </button>
                                                    <!--Update Reservation/Room Status Button-->
                                                    @if ($lists->Booking_Status == 'Checked-In')
                                                        @if($lists->Check_Out_Date <= $now)
                                                            <button class="btn btn-sm btn-warning" data-toggle="modal"
                                                                data-target="#update_booking_status11{{ $lists->Booking_No }}"
                                                                title="Update">
                                                                <i class="bi bi-arrow-clockwise"></i>
                                                            </button>
                                                        @endif
                                                        <!--Guest Request Button-->
                                                        <button class="btn btn-sm btn-primary" data-toggle="modal"
                                                            data-target="#request{{ $lists->Booking_No }}"
                                                            title="Request">
                                                            <i class="bi bi-plus-square"></i>
                                                        </button>
                                                    @endif
                                                    @if ($lists->Booking_Status == 'Room Checked')
                                                        <button class="btn btn-sm btn-warning" data-toggle="modal"
                                                            data-target="#update_booking_status2{{ $lists->Booking_No }}"
                                                            title="Update">
                                                            <i class="bi bi-arrow-clockwise"></i>
                                                        </button>
                                                        {{-- Invoice --}}
                                                        <a href="{{ url('/invoice', ['id' => $lists->Room_No, 'bn' => $lists->Booking_No]) }}"
                                                            target="blank" class="btn btn-sm btn-success"
                                                            style="cursor:pointer;" title="Invoice">
                                                            <i class="bi bi-file-earmark-text"></i>
                                                        </a>
                                                    @endif
                                                    
                                                </td>
                                                <td style="font-size:14px;">{{ $lists->Booking_No }}</td>
                                                <td style="font-size:14px;">{{ $lists->Room_No }}</td>
                                                <td style="font-size:14px;">{{ $lists->Guest_Name }}</td>
                                                <td style="font-size:14px;">{{ $lists->Payment_Status }}</td>
                                            </tr>


                                            <!--View-->
                                            <div class="modal fade" id="views1{{ $lists->Booking_No }}" tabindex="-1"
                                                role="dialog"aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-left display-4"
                                                                id="exampleModalLabel">
                                                                Hotel Reservation
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p class="text-left">Reservation Number: </p>
                                                                    <input class="form-control" type="text"
                                                                        value="{{ $lists->Booking_No }}" readonly>
                                                                </div>
                                                                <div class="col">
                                                                    <p class="text-left">Room Number: </p>
                                                                    <input class="form-control" type="text"
                                                                        value="{{ $lists->Room_No }}" readonly>
                                                                </div>
                                                            </div>

                                                            <br>

                                                            <div class="row">
                                                                <div class="col">
                                                                    <p class="text-left">Number of Pax: </p>
                                                                    <input class="form-control" type="text"
                                                                        value="{{ $lists->No_of_Pax }}" readonly>
                                                                </div>
                                                                <div class="col">
                                                                    <p class="text-left">Payment Status: </p>
                                                                    <input class="form-control" type="text"
                                                                        value="{{ $lists->Payment_Status }}" readonly>
                                                                </div>
                                                            </div>

                                                            <br>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p class="text-left">Guest Name: </p>
                                                                    <input class="form-control" type="text"
                                                                        value="{{ $lists->Guest_Name }}" readonly>
                                                                </div>
                                                                <div class="col">
                                                                    <p class="text-left">Mobile Number: </p>
                                                                    <input class="form-control" type="text"
                                                                        value="{{ $lists->Mobile_Num }}" readonly>
                                                                </div>
                                                            </div>

                                                            @if ($lists->Email != null)
                                                                <br>
                                                                <p class="text-left">Email Address: </p>
                                                                <input class="form-control" type="text"
                                                                    value="{{ $lists->Email }}" readonly>
                                                            @endif

                                                            <br>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p class="text-left">Check In Date: </p>
                                                                    <input class="form-control" type="text"
                                                                        value="{{ date('F j, Y', strtotime($lists->Check_In_Date)) }}"
                                                                        readonly>
                                                                </div>
                                                                <div class="col">
                                                                    <p class="text-left">Check Out Date: </p>
                                                                    <input class="form-control" type="text"
                                                                        value="{{ date('F j, Y', strtotime($lists->Check_Out_Date)) }}"
                                                                        readonly>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                            <!--<input type="submit" class="btn btn-success prevent_submit" value="Submit" />-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Update Status-->
                                            <div class="modal fade" id="update_booking_status2{{ $lists->Booking_No }}"
                                                tabindex="-1" role="dialog"aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title text-left display-4"
                                                                id="exampleModalLabel">
                                                                Hotel Reservation
                                                            </h3>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4 class="text-center">Change <span
                                                                    style="color:green;">{{ $lists->Guest_Name }}</span>
                                                                Booking
                                                                Status From Reserved to Checked-Out</h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                            <!--<input type="submit" class="btn btn-success prevent_submit" value="Submit" />-->
                                                            <a href="{{ url('/update_booking_status', ['id' => $lists->Booking_No, 'no' => $lists->Room_No, 'check' => $lists->IsArchived,  'stats' => 'Checked-Out']) }}"
                                                                class="btn btn-success">Yes</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Update Status-->
                                            <div class="modal fade" id="update_booking_status11{{ $lists->Booking_No }}"
                                                tabindex="-1" role="dialog"aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title text-left display-4"
                                                                id="exampleModalLabel">
                                                                Hotel Reservation
                                                            </h3>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        
                                                        <div class="modal-body">
                                                            <h4 class="text-center">Check Room Before Check-Out?</h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                            <!--<input type="submit" class="btn btn-success prevent_submit" value="Submit" />-->
                                                            <a href="{{ url('/update_booking_status', ['id' => $lists->Booking_No, 'no' => $lists->Room_No, 'check' => $lists->IsArchived,  'stats' => 'Checking(Before Check-Out)']) }}"
                                                                class="btn btn-success">Yes</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Add Request-->
                                            <div class="modal fade" id="request{{ $lists->Booking_No }}" tabindex="-1"
                                                role="dialog"aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title text-left display-4"
                                                                id="exampleModalLabel">
                                                                Guest Request
                                                            </h3>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ url('/add_guest_request') }}"
                                                            class="prevent_submit" method="POST"
                                                            enctype="multipart/form-data">
                                                            {{ csrf_field() }}

                                                            <div class="modal-body">
                                                                <p class="text-left">Room No.</p>
                                                                <input type="hidden" name="roomno"
                                                                    value="{{ $lists->Room_No }}">
                                                                <input type="text" class="form-control"
                                                                    value="{{ $lists->Room_No }}" readonly>

                                                                <p class="text-left">Booking No.</p>
                                                                <input type="hidden" name="bookno"
                                                                    value="{{ $lists->Booking_No }}">
                                                                <input type="text" class="form-control"
                                                                    value="{{ $lists->Booking_No }}" readonly>

                                                                <p class="text-left">Guest Name</p>
                                                                <input type="hidden" name="guest_name"
                                                                    value="{{ $lists->Guest_Name }}">
                                                                <input type="text" class="form-control"
                                                                    value="{{ $lists->Guest_Name }}" readonly>

                                                                <p class="text-left">Type of Request </p>

                                                                <select name="type_of_request" class="form-control"
                                                                    id="category" data-list-index="{{ $index }}">
                                                                    <option value="" selected="true"
                                                                        disabled="disabled">Select</option>
                                                                    <option value="Service Request">Service Request
                                                                    </option>
                                                                    <option value="Item Request">Item Request
                                                                    </option>
                                                                </select>

                                                                <div id="r_items_{{ $index }}"
                                                                    style="display:none;">
                                                                    <p class="text-left">Item Request </p>
                                                                    <select name="item_request" id="item"
                                                                        class="form-control">
                                                                        <option value="" selected="true"
                                                                            disabled="disabled">Select</option>
                                                                        @foreach ($supply as $supplies)
                                                                            <option value="{{ $supplies->name }}">
                                                                                {{ $supplies->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <p class="text-left">Quantity </p>
                                                                    <input type="number" name="qty" id="qt"
                                                                        class="form-control">
                                                                </div>

                                                                <div id="r_services_{{ $index }}"
                                                                    style="display:none;">
                                                                    <p class="text-left">Service Request </p>
                                                                    <input type="text" name="service_request"
                                                                        id="req2" class="form-control">
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <a class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</a>
                                                                <input type="submit"
                                                                    class="btn btn-success prevent_submit"
                                                                    value="Submit" />
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Finished -->
                        <div id="finished" style="display:none;">
                            <table class="table align-items-center table-flush" id="myTable4">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" style="font-size:17px;">Action</th>
                                        <th scope="col" style="font-size:17px;">Booking Number</th>
                                        <th scope="col" style="font-size:17px;">Room No.</th>
                                        <th scope="col" style="font-size:17px;">Guest Name</th>
                                        <th scope="col" style="font-size:17px;">Payment Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $lists)
                                        @if ($lists->IsArchived == true)
                                            <tr>
                                                <td>
                                                    <!--View Button-->
                                                    <button class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                                        data-target="#view4{{ $lists->Booking_No }}"> <i
                                                            class="bi bi-eye-fill"></i> </button>

                                                            <a href="{{ url('/invoice', ['id' => $lists->Room_No, 'bn' => $lists->Booking_No]) }}"
                                                                target="blank" class="btn btn-sm btn-success"
                                                                style="cursor:pointer;" title="Invoice">
                                                                <i class="bi bi-file-earmark-text"></i>
                                                            </a>
                                                </td>
                                                <td style="font-size:14px;">{{ $lists->Booking_No }}</td>
                                                <td style="font-size:14px;">{{ $lists->Room_No }}</td>
                                                <td style="font-size:14px;">{{ $lists->Guest_Name }}</td>
                                                <td style="font-size:14px;">{{ $lists->Payment_Status }}</td>
                                            </tr>
                                        @endif

                                        <!--View-->
                                        <div class="modal fade" id="view4{{ $lists->Booking_No }}" tabindex="-1"
                                            role="dialog"aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-left display-4"
                                                            id="exampleModalLabel">
                                                            Hotel Reservation
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <p class="text-left">Reservation Number: </p>
                                                                <input class="form-control" type="text"
                                                                    value="{{ $lists->Booking_No }}" readonly>
                                                            </div>
                                                            <div class="col">
                                                                <p class="text-left">Room Number: </p>
                                                                <input class="form-control" type="text"
                                                                    value="{{ $lists->Room_No }}" readonly>
                                                            </div>
                                                        </div>

                                                        <br>

                                                        <div class="row">
                                                            <div class="col">
                                                                <p class="text-left">Number of Pax: </p>
                                                                <input class="form-control" type="text"
                                                                    value="{{ $lists->No_of_Pax }}" readonly>
                                                            </div>
                                                            <div class="col">
                                                                <p class="text-left">Payment Status: </p>
                                                                <input class="form-control" type="text"
                                                                    value="{{ $lists->Payment_Status }}" readonly>
                                                            </div>
                                                        </div>

                                                        <br>
                                                        <div class="row">
                                                            <div class="col">
                                                                <p class="text-left">Guest Name: </p>
                                                                <input class="form-control" type="text"
                                                                    value="{{ $lists->Guest_Name }}" readonly>
                                                            </div>
                                                            <div class="col">
                                                                <p class="text-left">Mobile Number: </p>
                                                                <input class="form-control" type="text"
                                                                    value="{{ $lists->Mobile_Num }}" readonly>
                                                            </div>
                                                        </div>

                                                        @if ($lists->Email != null)
                                                            <br>
                                                            <p class="text-left">Email Address: </p>
                                                            <input class="form-control" type="text"
                                                                value="{{ $lists->Email }}" readonly>
                                                        @endif

                                                        <br>
                                                        <div class="row">
                                                            <div class="col">
                                                                <p class="text-left">Check In Date: </p>
                                                                <input class="form-control" type="text"
                                                                    value="{{ date('F j, Y', strtotime($lists->Check_In_Date)) }}"
                                                                    readonly>
                                                            </div>
                                                            <div class="col">
                                                                <p class="text-left">Check Out Date: </p>
                                                                <input class="form-control" type="text"
                                                                    value="{{ date('F j, Y', strtotime($lists->Check_Out_Date)) }}"
                                                                    readonly>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                        <!--<input type="submit" class="btn btn-success prevent_submit" value="Submit" />-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .table-container {
                height: 10em;
            }

            .table1 {
                display: flex;
                flex-flow: column;
                height: 70%;
                width: 100%;
            }

            .table1 thead {
                flex: 0 0 auto;
                width: calc(100% - 0.9em);
            }

            .table1 tbody {
                flex: 1 1 auto;
                display: block;
                overflow-y: scroll;
            }

            .table1 tbody tr {
                width: 100%;
            }

            .table1 thead,
            .table1 tbody tr {
                display: table;
                table-layout: fixed;
            }

            .table-container {
                padding: 0.3em;
            }

            .title {
                text-transform: uppercase;
                font-size: 25px;
                letter-spacing: 2px;
            }

            .bg-c-blue {
                background: linear-gradient(45deg, #3593ff, #61abff);
            }

            .bg-c-green {
                background: linear-gradient(45deg, #2bcaaa, #4dd7bc);
            }

            .bg-c-yellow {
                background: linear-gradient(45deg, #f7aa3e, #f8b960);
            }

            .bg-c-pink {
                background: linear-gradient(45deg, #ff4564, #fe7189);
            }


            .card {
                border-radius: 5px;
                -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
                box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
                border: none;
                margin-bottom: 30px;
                -webkit-transition: all 0.3s ease-in-out;
                transition: all 0.3s ease-in-out;
            }

            .card .card-block {
                padding: 25px;
            }

            .order-card i {
                font-size: 26px;
            }

            .f-left {
                float: left;
            }

            .f-right {
                float: right;
            }
        </style>
        <script type="text/javascript">
            $('.prevent_submit').on('submit', function() {
                $('.prevent_submit').attr('disabled', 'true');
            });

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

            $(document).ready(function() {
                $('select[name="type_of_request"]').change(function() {
                    var selecteds = $("option:selected", this).val();
                    var listIndex = $(this).data('list-index');

                    if (selecteds == "Service Request") {
                        $('#r_services_' + listIndex).css({
                            'display': 'block'
                        });
                        $('#r_items_' + listIndex).css({
                            'display': 'none'
                        });
                        $('#item').val('').prop('selected', true);
                        $('#qt').val('');
                    } else if (selecteds == "Item Request") {
                        $('#r_services_' + listIndex).css({
                            'display': 'none'
                        });
                        $('#r_items_' + listIndex).css({
                            'display': 'block'
                        });
                        $('#req2').val('');
                    }
                });
            });

            $(document).ready(function() {
                $("#optionselect").change(function() {
                    var selected = $("option:selected", this).val();
                    if (selected == 'Pending') {
                        $('#pending').show();
                        $('#checkin').hide();
                        $('#reserved').hide();
                        $('#finished').hide();
                    } else if (selected == 'Reserved') {
                        $('#pending').hide();
                        $('#checkin').hide();
                        $('#reserved').show();
                        $('#finished').hide();
                    } else if (selected == 'Checked-In') {
                        $('#pending').hide();
                        $('#checkin').show();
                        $('#reserved').hide();
                        $('#finished').hide();
                    } else if (selected == 'Finished') {
                        $('#pending').hide();
                        $('#checkin').hide();
                        $('#reserved').hide();
                        $('#finished').show();
                    }
                });
            });
            $.noConflict();
            jQuery(document).ready(function($) {
                $('#myTable').DataTable();
                $('#myTable2').DataTable();
                $('#myTable3').DataTable();
                $('#myTable4').DataTable();
            });
        </script>
    @endsection

    @push('js')
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    @endpush
