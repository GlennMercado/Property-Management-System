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
                        <li class="breadcrumb-item">Operations Management</li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">Guest Reservation</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-xl-4">
                <div class="card bg-c-blue order-card">
                    <div class="card-block">
                        <h4 class="m-b-20 text-white">Reserved</h4>
                        <h2 class="text-right text-white">
                            <i class="bi bi-book-fill f-left"></i><span></span>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-4">
                <div class="card bg-c-green order-card">
                    <div class="card-block">
                        <h4 class="m-b-20 text-white">Checked in</h4>
                        <h2 class="text-right text-white">
                            <i class="bi bi-bookmark-check-fill f-left"></i><span></span>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-4">
                <div class="card bg-c-yellow order-card">
                    <div class="card-block">
                        <h4 class="m-b-20 text-white">Pending</h4>
                        <h2 class="text-right text-white">
                            <i class="bi bi-clock-history f-left"></i><span></span>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-4">
                <div class="card bg-c-pink order-card">
                    <div class="card-block">
                        <h4 class="m-b-20 text-white">Cancelled</h4>
                        <h2 class="text-right text-white">
                            <i class="bi bi-x-octagon-fill f-left"></i><span></span>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-4">
                <div class="card bg-primary order-card">
                    <div class="card-block">
                        <h4 class="m-b-20 text-white">Arriving</h4>
                        <h2 class="text-right text-white">
                            <i class="bi bi-box-arrow-in-up-left f-left"></i><span></span>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-4">
                <div class="card bg-orange order-card">
                    <div class="card-block">
                        <h4 class="m-b-20 text-white">Departing</h4>
                        <h2 class="text-right text-white">
                            <i class="bi bi-box-arrow-down-right f-left"></i><span></span>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card shadow mt--3 col-md-12">
                <div class="card-header row d-flex">
                    <div class="col-md-4">
                        <select class="form-control" style="border:2px solid" id="optionselect">
                            <option value="Pending" selected="true">Pending</option>
                            <option value="Reserved">Reserved</option>
                            <option value="Checked-In">Checked-In</option>
                            <option value="Finished">Finished</option>
                        </select>
                    </div>
                </div>
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
                                        <th scope="col" style="font-size:17px;">Check in Date</th>
                                        <th scope="col" style="font-size:17px;">Check out Date</th>
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
                                                </td>
                                                <td>{{ $lists->Booking_No }}</td>
                                                <td>{{ $lists->Room_No }}</td>
                                                <td>{{ $lists->Guest_Name }}</td>
                                                <td>{{ $lists->Check_In_Date }}</td>
                                                <td>{{ $lists->Check_Out_Date }}</td>
                                                <td>{{ $lists->Payment }}</td>
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
                                        <th scope="col" style="font-size:17px;">Booking Number</th>
                                        <th scope="col" style="font-size:17px;">Room No.</th>
                                        <th scope="col" style="font-size:17px;">Guest Name</th>
                                        <th scope="col" style="font-size:17px;">Payment Status</th>
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
                                                            class="bi bi-eye-fill"></i>
                                                    </button>
                                                </td>
                                                <td style="font-size:15px;">{{ $lists->Booking_No }}</td>
                                                <td style="font-size:15px;">{{ $lists->Room_No }}</td>
                                                <td style="font-size:15px;">{{ $lists->Guest_Name }}</td>
                                                <td style="font-size:15px;">{{ $lists->Payment_Status }}</td>
                                            </tr>
                                        @endif
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
                                    @foreach ($list as $lists)
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
                                                </td>
                                                <td style="font-size:15px;">{{ $lists->Booking_No }}</td>
                                                <td style="font-size:15px;">{{ $lists->Room_No }}</td>
                                                <td style="font-size:15px;">{{ $lists->Guest_Name }}</td>
                                                <td style="font-size:15px;">{{ $lists->Payment_Status }}</td>
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
                                                </td>
                                                <td>{{ $lists->Booking_No }}</td>
                                                <td>{{ $lists->Room_No }}</td>
                                                <td>{{ $lists->Guest_Name }}</td>
                                                <td>{{ $lists->Payment_Status }}</td>
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
        $(document).ready(function() {
            $("#category").change(function() {
                var selecteds = $("option:selected", this).val();

                if (selecteds == "Service Request") {
                    $('#r_services').css({
                        'display': 'block'
                    });
                    $('#r_items').css({
                        'display': 'none'
                    });
                } else if (selecteds == "Item Request") {
                    $('#r_services').css({
                        'display': 'none'
                    });
                    $('#r_items').css({
                        'display': 'block'
                    });
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
