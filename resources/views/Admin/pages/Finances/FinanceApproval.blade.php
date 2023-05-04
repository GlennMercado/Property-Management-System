@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
    <script>
        $.noConflict();
        jQuery(document).ready(function($) {
            $('#myTable1').DataTable();
            $('#myTable2').DataTable();
            $('#myTable3').DataTable();
            $('#myTable4').DataTable();
        });
    </script>


    <div class="container-fluid mt--8">
        <div class="row align-items-center py-4">
            <div class="col-lg-12 col-12">
                <h6 class="h2 text-dark d-inline-block mb-0">Finance Approval</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item">Finance</li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">Finance Approval</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-xl">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="row align-items-center">
                                <div class="col-md-12 text-right pt-4 mt-4">
                                    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text"
                                        role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab"
                                                data-toggle="tab" href="#tabs-icons-text-1" role="tab"
                                                aria-controls="tabs-icons-text-1" aria-selected="true">Hotel Payment Approval</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                                                href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
                                                aria-selected="false"> Coomercial Space Rent Collection</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                                                href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
                                                aria-selected="false">Commercial Space Security Deposit</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                                                href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
                                                aria-selected="false">Commercial Space Utility Bills</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Start of Cards-->
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="tab-content" id="myTabContent">
                            <!-- Pending -->
                        <div id="pending">
                            <table class="table align-items-center table-flush" id="myTable1">
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
                                                <td style="font-size:14px;">
                                                    {{ date('F j, Y', strtotime($lists->Check_In_Date)) }}</td>
                                                <td style="font-size:14px;">
                                                    {{ date('F j, Y', strtotime($lists->Check_Out_Date)) }}</td>
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

                            {{-- OR ARCHIVES --}}
                            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                                aria-labelledby="tabs-icons-text-2-tab">
                                <div class="table-responsive">
                                <div class="card-header" style="justify-content:center;align-items:center;align-self:center">
                                    <form action="{{ url('/archives_summary') }}" target="blank" method="get">
                                        <div class="d-flex flex-row">
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
                                                <button type="submit" class="btn btn-success w-100">
                                                    <i class="bi bi-printer-fill"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                    <table class="table align-items-center table-flush" style="align-items:center"
                                        id="myTable2">
                                        <thead class="thead-light">
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th colspan="4" style="font-size:18px;">Debit</th>
                                                <th colspan="8" style="font-size:18px;">Credit</th>
                                            </tr>
                                            <tr>
                                                <th scope="col" style="font-size:18px;">Particulars</th>
                                                <th scope="col" style="font-size:18px;">Cash/GCash</th>
                                                <th scope="col" style="font-size:18px;">Unearned Income</th>
                                                <th scope="col" style="font-size:18px;">Bank Transfer/Direct to Bank
                                                </th>
                                                <th scope="col" style="font-size:18px;">Cheque</th>
                                                <th scope="col" style="font-size:18px;">Basketball</th>
                                                <th scope="col" style="font-size:18px;">UnearnedIncome</th>
                                                <th scope="col" style="font-size:18px;">OtherIncome</th>
                                                <th scope="col" style="font-size:18px;">ManagementFee</th>
                                                <th scope="col" style="font-size:18px;">
                                                    FunctionRoom/ConventionCenter/Events
                                                <th scope="col" style="font-size:18px;">Hotel</th>
                                                <th scope="col" style="font-size:18px;">Commercial Spaces</th>
                                                <th scope="col" style="font-size:18px;">Output VAT</th>
                                            
                                             </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            {{-- OR ARCHIVES --}}
                            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                                aria-labelledby="tabs-icons-text-2-tab">
                                <div class="table-responsive">
                                <div class="card-header" style="justify-content:center;align-items:center;align-self:center">
                                    <form action="{{ url('/archives_summary') }}" target="blank" method="get">
                                        <div class="d-flex flex-row">
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
                                                <button type="submit" class="btn btn-success w-100">
                                                    <i class="bi bi-printer-fill"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                    <table class="table align-items-center table-flush" style="align-items:center"
                                        id="myTable3">
                                        <thead class="thead-light">
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th colspan="4" style="font-size:18px;">Debit</th>
                                                <th colspan="8" style="font-size:18px;">Credit</th>
                                            </tr>
                                            <tr>
                                                <th scope="col" style="font-size:18px;">Particulars</th>
                                                <th scope="col" style="font-size:18px;">Cash/GCash</th>
                                                <th scope="col" style="font-size:18px;">Unearned Income</th>
                                                <th scope="col" style="font-size:18px;">Bank Transfer/Direct to Bank
                                                </th>
                                                <th scope="col" style="font-size:18px;">Cheque</th>
                                                <th scope="col" style="font-size:18px;">Basketball</th>
                                                <th scope="col" style="font-size:18px;">UnearnedIncome</th>
                                                <th scope="col" style="font-size:18px;">OtherIncome</th>
                                                <th scope="col" style="font-size:18px;">ManagementFee</th>
                                                <th scope="col" style="font-size:18px;">
                                                    FunctionRoom/ConventionCenter/Events
                                                <th scope="col" style="font-size:18px;">Hotel</th>
                                                <th scope="col" style="font-size:18px;">Commercial Spaces</th>
                                                <th scope="col" style="font-size:18px;">Output VAT</th>
                                            
                                             </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            {{-- OR ARCHIVES --}}
                            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                                aria-labelledby="tabs-icons-text-2-tab">
                                <div class="table-responsive">
                                <div class="card-header" style="justify-content:center;align-items:center;align-self:center">
                                    <form action="{{ url('/archives_summary') }}" target="blank" method="get">
                                        <div class="d-flex flex-row">
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
                                                <button type="submit" class="btn btn-success w-100">
                                                    <i class="bi bi-printer-fill"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                    <table class="table align-items-center table-flush" style="align-items:center"
                                        id="myTable4">
                                        <thead class="thead-light">
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th colspan="4" style="font-size:18px;">Debit</th>
                                                <th colspan="8" style="font-size:18px;">Credit</th>
                                            </tr>
                                            <tr>
                                                <th scope="col" style="font-size:18px;">Particulars</th>
                                                <th scope="col" style="font-size:18px;">Cash/GCash</th>
                                                <th scope="col" style="font-size:18px;">Unearned Income</th>
                                                <th scope="col" style="font-size:18px;">Bank Transfer/Direct to Bank
                                                </th>
                                                <th scope="col" style="font-size:18px;">Cheque</th>
                                                <th scope="col" style="font-size:18px;">Basketball</th>
                                                <th scope="col" style="font-size:18px;">UnearnedIncome</th>
                                                <th scope="col" style="font-size:18px;">OtherIncome</th>
                                                <th scope="col" style="font-size:18px;">ManagementFee</th>
                                                <th scope="col" style="font-size:18px;">
                                                    FunctionRoom/ConventionCenter/Events
                                                <th scope="col" style="font-size:18px;">Hotel</th>
                                                <th scope="col" style="font-size:18px;">Commercial Spaces</th>
                                                <th scope="col" style="font-size:18px;">Output VAT</th>
                                            
                                             </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>

    <style>
        /* disable arrows input type number */
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }

        p {
            font-family: sans-serif;
        }
    </style>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
