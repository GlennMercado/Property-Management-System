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
                                                aria-controls="tabs-icons-text-1" aria-selected="true">Hotel Payment
                                                Approval</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                                                href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
                                                aria-selected="false"> Commercial Space Rent Collection</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                                                href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3"
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
                            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                                aria-labelledby="tabs-icons-text-1-tab">
                                    <table class="table align-items-center table-flush" id="myTable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" style="font-size:17px;">Action</th>
                                                <th scope="col" style="font-size:17px;">Room No.</th>
                                                <th scope="col" style="font-size:17px;">Booking No.</th>
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
                                                                        class="bi bi-pencil-square"></i></button>
                                                            @endif
                                                        </td>
                                                        <td style="font-size:14px;">{{ $lists->Room_No }}</td>
                                                        <td style="font-size:14px;">{{ $lists->Booking_No }}</td>
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
                                                                <h3 class="modal-title text-left" id="exampleModalLabel">
                                                                    Proof of Payment
                                                                </h3>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body row">
                                                                <div class="col-md-12">
                                                                    <h1>Reference No: {{ $lists->Reference_No }}</h1>
                                                                </div>
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
                                                                @if ($lists->Proof_Image != null)
                                                                    <a href="{{ url($lists->Proof_Image) }}"
                                                                        data-lightbox="photos">
                                                                        <img src="{{ url($lists->Proof_Image) }}"
                                                                            class="card-img-top p-5" />
                                                                    </a>
                                                                @endif
                                                                <div class="row p-3 mt-2">
                                                                    <div class="col-md-6 text-sm font-weight-bold">
                                                                        <h3 class="p-3">Payment method:</h3>
                                                                    </div>
                                                                    <div class="col-md-6 text-sm font-weight-bold">
                                                                        <img class="gcash"
                                                                            src="{{ asset('nvdcpics') }}/GCash.png"
                                                                            style="width: 200px; height: 60px">
                                                                    </div>
                                                                    <div class="col-md-12 text-sm font-weight-bold mt-4">
                                                                        <h3 class="p-2">Total Payment:</h3>
                                                                        <h2 class="display-2 mt--3 text-green p-2" id="currency">
                                                                            PHP {{ number_format($lists->Payment, 2, '.', ',') }}
                                                                        </h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer row d-flex">
                                                                <div class="p-2">
                                                                    <a href="{{ url('/decline_hotel_payment', ['id' => $lists->Booking_No, 'no' => $lists->Room_No, 'check' => $lists->IsArchived]) }}"
                                                                        class="btn btn-danger">Decline</a>
                                                                </div>
                                                                <div class="ml-auto p-2">
                                                                    <a href="{{ url('/update_hotel_payment', ['id' => $lists->Booking_No, 'no' => $lists->Room_No, 'check' => $lists->IsArchived]) }}"
                                                                        class="btn btn-success">Approve</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                            </div>

                            {{-- Rent Payment --}}
                            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                                aria-labelledby="tabs-icons-text-2-tab">
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush" id="myTable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" style="font-size:17px;">Action</th>
                                                <th scope="col" style="font-size:17px;">Business Info</th>
                                                <th scope="col" style="font-size:17px;">Owner Info</th>
                                                <th scope="col" style="font-size:17px;">Space/Unit</th>
                                                <th scope="col" style="font-size:17px;">Due Date</th>
                                                <th scope="col" style="font-size:17px;">Rental Fee</th>
                                                <th scope="col" style="font-size:17px;">Total Amount</th>
                                                <th scope="col" style="font-size:17px;">Paid Date</th>
                                                <th scope="col" style="font-size:17px;">Payment Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($list2 as $lists)
                                                <tr>
                                                    <td>
                                                        <button class="btn btn-sm btn-primary" data-toggle="modal"
                                                            data-target="#view_payment_history{{ $lists->Tenant_ID }}"
                                                            title="Payment History">
                                                            <i class="bi bi-eye"></i>
                                                        </button>
                                                        @php $now = date('Y-m-d') @endphp
                                                        @if (
                                                            ($lists->Tenant_Status != 'Pre-Termination' && $lists->Payment_Status == 'Paid (Checking)') ||
                                                                $lists->Due_Date == $now)
                                                            <button class="btn btn-sm btn-warning" data-toggle="modal"
                                                                data-target="#update_payment_status{{ $lists->id }}"
                                                                title="Update Payment Status">
                                                                <i class="bi bi-pencil-square"></i>
                                                            </button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <span class="tbltxt">Business Name: </span>
                                                        <span
                                                            class="font-weight-bold tbltxt">{{ $lists->business_name }}</span>
                                                        <br>
                                                        <span class="tbltxt">Business Style: </span>
                                                        <span
                                                            class="font-weight-bold tbltxt">{{ $lists->business_style }}</span>
                                                        <br>
                                                        <span class="tbltxt">Business Address: </span>
                                                        <span
                                                            class="font-weight-bold tbltxt">{{ $lists->business_address }}</span>
                                                        <br>
                                                        <span class="tbltxt">Email/Website/FB: </span>
                                                        <span
                                                            class="font-weight-bold tbltxt">{{ $lists->email_website_fb }}</span>
                                                        <br>
                                                        <span class="tbltxt">Business Landline: </span>
                                                        <span
                                                            class="font-weight-bold tbltxt">{{ $lists->business_landline_no }}</span>
                                                        <br>
                                                        <span class="tbltxt">Business Mobile No: </span>
                                                        <span
                                                            class="font-weight-bold tbltxt">{{ $lists->business_mobile_no }}</span>
                                                        <br>
                                                    </td>
                                                    <td>
                                                        <span class="tbltxt">Owner Name: </span>
                                                        <span
                                                            class="font-weight-bold tbltxt">{{ $lists->name_of_owner }}</span>
                                                        <br>
                                                        <span class="tbltxt">Spouse: </span>
                                                        <span class="font-weight-bold tbltxt">{{ $lists->spouse }}</span>
                                                        <br>
                                                        <span class="tbltxt">Home Address: </span>
                                                        <span
                                                            class="font-weight-bold tbltxt">{{ $lists->home_address }}</span>
                                                        <br>
                                                        <span class="tbltxt">Landline: </span>
                                                        <span
                                                            class="font-weight-bold tbltxt">{{ $lists->landline }}</span>
                                                        <br>
                                                        <span class="tbltxt">Mobile: </span>
                                                        <span
                                                            class="font-weight-bold tbltxt">{{ $lists->mobile_no }}</span>
                                                        <br>
                                                        <span class="tbltxt">Tax Identification No: </span>
                                                        <span
                                                            class="font-weight-bold tbltxt">{{ $lists->tax_identification_no }}</span>
                                                        <br>
                                                        <span class="tbltxt">Tax Cert or Valid ID: </span>
                                                        <span
                                                            class="font-weight-bold tbltxt">{{ $lists->tax_cert_valid_gov_id }}</span>
                                                        <br>
                                                    </td>
                                                    <td class="font-weight-bold tbltxt">{{ $lists->Space_Unit }}
                                                    </td>
                                                    <td class="font-weight-bold tbltxt">
                                                        {{ date('F j, Y', strtotime($lists->Due_Date)) }}</td>
                                                    <td class="font-weight-bold tbltxt">
                                                        {{ $lists->Rental_Fee }}</td>
                                                    <td class="font-weight-bold tbltxt">
                                                        {{ $lists->Total_Amount }}</td>
                                                    @if ($lists->Paid_Date != null)
                                                        <td class="font-weight-bold tbltxt">
                                                            {{ date('F j, Y', strtotime($lists->Paid_Date)) }}</td>
                                                    @else
                                                        <td></td>
                                                    @endif
                                                    <td class="font-weight-bold tbltxt">
                                                        {{ $lists->Payment_Status }}</td>
                                                </tr>

                                                <!-- Update Modal -->
                                                <div class="modal fade" id="update_payment_status{{ $lists->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-left display-4"
                                                                    id="exampleModalLabel">Updating Payment Status
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="{{ url('/update_rental_collection') }}"
                                                                class="prevent_submit" method="POST"
                                                                enctype="multipart/form-data">

                                                                {{ csrf_field() }}

                                                                <div class="modal-body">
                                                                    <input type="hidden" name="tenant_id"
                                                                        value="{{ $lists->Tenant_ID }}">

                                                                    <input type="hidden" name="rental_fee"
                                                                        value="{{ $lists->Rental_Fee }}">

                                                                    <input type="hidden" name="total"
                                                                        value="{{ $lists->Total_Amount }}">

                                                                    <input type="hidden" name="due"
                                                                        value="{{ $lists->Due_Date }}" />

                                                                    <h3 class="text-left">Status: </h3>
                                                                    <select name="status" class="form-control" required>
                                                                        <option value="" selected="true"
                                                                            disabled="disabled">Select</option>

                                                                        @foreach ($count2 as $counts)
                                                                            @if ($counts->cnt > 0)
                                                                                <option value="Fully Paid">Fully Paid
                                                                                </option>
                                                                                <option value="Partial Paid">Partial Paid
                                                                                </option>
                                                                            @else
                                                                                <option value="Fully Paid">Paid</option>
                                                                            @endif
                                                                        @endforeach
                                                                        <option value="Non-Payment">Non-Payment
                                                                        </option>
                                                                    </select>


                                                                    @if ($lists->Reference_No != null)
                                                                        <br><br>
                                                                        <i>Proof of Payment Here</i>
                                                                        <h3 class="text-left">Reference Number : <span
                                                                                class="text-success">{{ $lists->Reference_No }}</span>
                                                                        </h3>

                                                                        <input type="hidden" name="Reference_No"
                                                                            value="{{ $lists->Reference_No }}" />
                                                                        @if ($lists->Proof_Image != null)
                                                                            <input type="hidden" name="proof_img"
                                                                                value="{{ $lists->Proof_Image }}">

                                                                            <h3 class="text-left">Proof Image : </h3>
                                                                            <img src="{{ $lists->Proof_Image }}"
                                                                                class="card-img-top" />
                                                                        @endif
                                                                    @endif
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-outline-danger"
                                                                        data-dismiss="modal">Close</button>
                                                                    <input type="submit"
                                                                        class="btn btn-success prevent_submit">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @foreach ($array as $arrays)
                                        <!-- View Information -->
                                        <div class="modal fade" id="view_payment_history{{ $arrays['Tenant_ID'] }}"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <h3 class="text-left">Payment History</h3>
                                                        <table class="table align-items-center table-flush"
                                                            id="myTable3">
                                                            <thead class="thead-light">
                                                                <tr>

                                                                    <th scope="col">Due Date</th>
                                                                    <th scope="col">Rental Fee</th>
                                                                    <th scope="col">Paid Date</th>
                                                                    <th scope="col">Payment Status</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($list3 as $index => $lists3)
                                                                    @if ($lists3->Tenant_ID == $arrays['Tenant_ID'])
                                                                        <tr>
                                                                            <td class="font-weight-bold tbltxt">
                                                                                {{ date('F j, Y', strtotime($lists3->Due_Date)) }}
                                                                            </td>
                                                                            <td class="cur1 font-weight-bold tbltxt">
                                                                                {{ $lists3->Rental_Fee }}</td>
                                                                            @if ($lists3->Paid_Date != null)
                                                                                <td class="font-weight-bold tbltxt">
                                                                                    {{ date('F j, Y', strtotime($lists3->Paid_Date)) }}
                                                                                </td>
                                                                            @else
                                                                                <td></td>
                                                                            @endif
                                                                            @if ($lists3->Payment_Status == 'Paid')
                                                                                <td
                                                                                    class="font-weight-bold tbltxt text-success">
                                                                                    {{ $lists3->Payment_Status }}</td>
                                                                            @else
                                                                                <td
                                                                                    class="font-weight-bold tbltxt text-danger">
                                                                                    {{ $lists3->Payment_Status }}
                                                                                </td>
                                                                            @endif
                                                                            <td>
                                                                                @if ($lists3->Payment_Status == 'Paid')
                                                                                    <button
                                                                                        class="preview-btn btn btn-sm btn-primary"
                                                                                        data-reference-no="{{ $lists3->Reference_No }}"
                                                                                        data-proof-image="{{ $lists3->Proof_Image }}"
                                                                                        data-index="{{ $index }}">View
                                                                                        Payment</button>

                                                                                    <div
                                                                                        class="preview-container preview-container-{{ $index }}">
                                                                                        <p>Reference Number : <span
                                                                                                class="reference-no reference-no-{{ $index }}"></span>
                                                                                        </p>
                                                                                        @if ($lists3->Proof_Image != null)
                                                                                            <p>Proof Image:</p>
                                                                                            <img src="{{ $lists3->Proof_Image }}"
                                                                                                alt="Proof Image"
                                                                                                class="proof-image proof-image-{{ $index }}">
                                                                                        @else
                                                                                            <i
                                                                                                class="proof-image proof-image-{{ $index }}">No
                                                                                                proof image available</i>
                                                                                        @endif
                                                                                    </div>
                                                                                @endif
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>

                                                        <br>

                                                        <h3 class="text-left">Security Deposit</h3>
                                                        <table class="table align-items-center table-flush"
                                                            id="myTable6">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th scope="col">Space/Unit</th>
                                                                    <th scope="col">Security Deposit</th>
                                                                    <th scope="col">Paid Date</th>
                                                                    <th scope="col">Remarks</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($list4 as $lists4)
                                                                    @if ($lists4->Tenant_ID == $arrays['Tenant_ID'])
                                                                        <tr>
                                                                            <td class="font-weight-bold tbltxt">
                                                                                {{ $lists4->Space_Unit }}
                                                                            </td>
                                                                            <td class="cur1 font-weight-bold tbltxt">
                                                                                {{ number_format($lists4->Security_Deposit, 2, '.', ',') }}
                                                                            </td>
                                                                            <td class="font-weight-bold tbltxt">
                                                                                {{ date('F j, Y', strtotime($lists4->Paid_Date)) }}
                                                                            </td>
                                                                            <td class="font-weight-bold tbltxt">
                                                                                {{ $lists4->Remarks }}
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-outline-danger"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Utlity Bills --}}
                            <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel"
                                aria-labelledby="tabs-icons-text-3-tab">
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush" id="myTable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" style="font-size:17px;">Action</th>
                                                <th scope="col" style="font-size:17px;">Business Info</th>
                                                <th scope="col" style="font-size:17px;">Owner Info</th>
                                                <th scope="col" style="font-size:17px;">Space/Unit</th>
                                                <th scope="col" style="font-size:17px;">Due Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($list5 as $lists)
                                                <tr>
                                                    <td>
                                                        <button class="btn btn-sm btn-primary" data-toggle="modal"
                                                            data-target="#view_utility_{{ $lists->Tenant_ID }}"
                                                            title="Utility Bills">
                                                            <i class="bi bi-eye"></i>
                                                        </button>
                                                    </td>
                                                    <td>
                                                        <span class="tbltxt">Business Name: </span>
                                                        <span
                                                            class="font-weight-bold tbltxt">{{ $lists->business_name }}</span>
                                                        <br>
                                                        <span class="tbltxt">Business Style: </span>
                                                        <span
                                                            class="font-weight-bold tbltxt">{{ $lists->business_style }}</span>
                                                        <br>
                                                        <span class="tbltxt">Business Address: </span>
                                                        <span
                                                            class="font-weight-bold tbltxt">{{ $lists->business_address }}</span>
                                                        <br>
                                                        <span class="tbltxt">Email/Website/FB: </span>
                                                        <span
                                                            class="font-weight-bold tbltxt">{{ $lists->email_website_fb }}</span>
                                                        <br>
                                                        <span class="tbltxt">Business Landline: </span>
                                                        <span
                                                            class="font-weight-bold tbltxt">{{ $lists->business_landline_no }}</span>
                                                        <br>
                                                        <span class="tbltxt">Business Mobile No: </span>
                                                        <span
                                                            class="font-weight-bold tbltxt">{{ $lists->business_mobile_no }}</span>
                                                        <br>
                                                    </td>
                                                    <td>
                                                        <span class="tbltxt">Owner Name: </span>
                                                        <span
                                                            class="font-weight-bold tbltxt">{{ $lists->name_of_owner }}</span>
                                                        <br>
                                                        <span class="tbltxt">Spouse: </span>
                                                        <span class="font-weight-bold tbltxt">{{ $lists->spouse }}</span>
                                                        <br>
                                                        <span class="tbltxt">Home Address: </span>
                                                        <span
                                                            class="font-weight-bold tbltxt">{{ $lists->home_address }}</span>
                                                        <br>
                                                        <span class="tbltxt">Landline: </span>
                                                        <span
                                                            class="font-weight-bold tbltxt">{{ $lists->landline }}</span>
                                                        <br>
                                                        <span class="tbltxt">Mobile: </span>
                                                        <span
                                                            class="font-weight-bold tbltxt">{{ $lists->mobile_no }}</span>
                                                        <br>
                                                        <span class="tbltxt">Tax Identification No: </span>
                                                        <span
                                                            class="font-weight-bold tbltxt">{{ $lists->tax_identification_no }}</span>
                                                        <br>
                                                        <span class="tbltxt">Tax Cert or Valid ID: </span>
                                                        <span
                                                            class="font-weight-bold tbltxt">{{ $lists->tax_cert_valid_gov_id }}</span>
                                                        <br>
                                                    </td>
                                                    <td class="font-weight-bold tbltxt">{{ $lists->Space_Unit }}
                                                    </td>
                                                    <td class="font-weight-bold tbltxt">
                                                        {{ date('F j, Y', strtotime($lists->Due_Date)) }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    @foreach ($arrays2 as $array2)
                                        <!-- Tenant History -->
                                        <div class="modal fade" id="view_utility_{{ $array2['Tenant_ID'] }}"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document"
                                                style="z-index: 5;">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-left display-4"
                                                            id="exampleModalLabel">View Utility Bills
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h3 class="text-left">Electricity Bills</h3>
                                                        <table class="table align-items-center table-flush"
                                                            id="myTable2">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th scope="col">Total Amount</th>
                                                                    <th scope="col">Due Date</th>
                                                                    <th scope="col">Paid Date</th>
                                                                    <th scope="col">Payment Status</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($list6 as $index => $lists)
                                                                    @if ($array2['Tenant_ID'] == $lists->Tenant_ID && $lists->Type_of_Bill == 'Electricity')
                                                                        <tr>
                                                                            <td class="cur1">{{ $lists->Total_Amount }}
                                                                            </td>
                                                                            <td>{{ date('F j, Y', strtotime($lists->Due_Date)) }}
                                                                            </td>
                                                                            @if ($lists->Paid_Date != null)
                                                                                <td>{{ date('F j, Y', strtotime($lists->Paid_Date)) }}
                                                                                </td>
                                                                            @else
                                                                                <td></td>
                                                                            @endif
                                                                            @if ($lists->Payment_Status == 'Paid')
                                                                                <td class="text-success">
                                                                                    {{ $lists->Payment_Status }}</td>
                                                                            @else
                                                                                <td class="text-danger">
                                                                                    {{ $lists->Payment_Status }}</td>
                                                                            @endif
                                                                            <td>
                                                                                @if ($lists->Payment_Status == 'Paid (Checking)' || $lists->Payment_Status == null)
                                                                                    <button class="btn btn-sm btn-warning"
                                                                                        data-toggle="modal"
                                                                                        data-target="#update_payment_electricity_status{{ $lists->Tenant_ID . $lists->Due_Date . $lists->Type_of_Bill }}"
                                                                                        title="Update Payment Status">
                                                                                        <i
                                                                                            class="bi bi-pencil-square"></i>
                                                                                    </button>
                                                                                @endif
                                                                                @if ($lists->Payment_Status == 'Paid')
                                                                                    <button
                                                                                        class="preview-btn2 btn btn-sm btn-primary"
                                                                                        data-reference-no="{{ $lists->Reference_No }}"
                                                                                        data-proof-image="{{ $lists->Proof_Image }}"
                                                                                        data-index="{{ $index }}">View
                                                                                        Payment</button>

                                                                                    <div
                                                                                        class="preview-container2 preview-container2-{{ $index }}">
                                                                                        <p>Reference Number : <span
                                                                                                class="reference-no reference-no-{{ $index }}"></span>
                                                                                        </p>
                                                                                        @if ($lists->Proof_Image != null)
                                                                                            <p>Proof Image:</p>
                                                                                            <img src="{{ $lists->Proof_Image }}"
                                                                                                alt="Proof Image"
                                                                                                class="proof-image2 proof-image2-{{ $index }}">
                                                                                        @else
                                                                                            <i
                                                                                                class="proof-image2 proof-image2-{{ $index }}">No
                                                                                                proof image available</i>
                                                                                        @endif
                                                                                    </div>
                                                                                @endif
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>

                                                        <br>

                                                        <h3 class="text-left">Water Bills</h3>
                                                        <table class="table align-items-center table-flush"
                                                            id="myTable3">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th scope="col">Total Amount</th>
                                                                    <th scope="col">Due Date</th>
                                                                    <th scope="col">Paid Date</th>
                                                                    <th scope="col">Payment Status</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($list6 as $index => $lists)
                                                                    @if ($array2['Tenant_ID'] == $lists->Tenant_ID && $lists->Type_of_Bill == 'Water')
                                                                        <tr>
                                                                            <td class="cur1">{{ $lists->Total_Amount }}
                                                                            </td>
                                                                            <td>{{ date('F j, Y', strtotime($lists->Due_Date)) }}
                                                                            </td>
                                                                            @if ($lists->Paid_Date != null)
                                                                                <td>{{ date('F j, Y', strtotime($lists->Paid_Date)) }}
                                                                                </td>
                                                                            @else
                                                                                <td></td>
                                                                            @endif
                                                                            @if ($lists->Payment_Status == 'Paid')
                                                                                <td class="text-success">
                                                                                    {{ $lists->Payment_Status }}</td>
                                                                            @else
                                                                                <td class="text-danger">
                                                                                    {{ $lists->Payment_Status }}</td>
                                                                            @endif
                                                                            <td>
                                                                                {{-- @if ($lists->Proof_Image != null)
                                                                                    <div class="img-container">
                                                                                        <button
                                                                                            class="btn btn-sm btn-primary"
                                                                                            title="View Image">
                                                                                            View Image
                                                                                            <span class="popup">
                                                                                                <img src="{{ $lists->Proof_Image }}"
                                                                                                    alt="Image Preview">
                                                                                            </span>
                                                                                        </button>
                                                                                    </div>
                                                                                @endif --}}

                                                                                @if ($lists->Payment_Status == 'Paid (Checking)' || $lists->Payment_Status == null)
                                                                                    <button class="btn btn-sm btn-warning"
                                                                                        data-toggle="modal"
                                                                                        data-target="#update_payment_water_status{{ $lists->Tenant_ID . $lists->Due_Date . $lists->Type_of_Bill }}"
                                                                                        title="Update Payment Status">
                                                                                        <i
                                                                                            class="bi bi-pencil-square"></i>
                                                                                    </button>
                                                                                @endif

                                                                                @if ($lists->Payment_Status == 'Paid')
                                                                                    <button
                                                                                        class="preview-btn2 btn btn-sm btn-primary"
                                                                                        data-reference-no="{{ $lists->Reference_No }}"
                                                                                        data-proof-image="{{ $lists->Proof_Image }}"
                                                                                        data-index="{{ $index }}">View
                                                                                        Payment</button>

                                                                                    <div
                                                                                        class="preview-container2 preview-container2-{{ $index }}">
                                                                                        <p>Reference Number : <span
                                                                                                class="reference-no reference-no-{{ $index }}"></span>
                                                                                        </p>
                                                                                        @if ($lists->Proof_Image != null)
                                                                                            <p>Proof Image:</p>
                                                                                            <img src="{{ $lists->Proof_Image }}"
                                                                                                alt="Proof Image"
                                                                                                class="proof-image2 proof-image2-{{ $index }}">
                                                                                        @else
                                                                                            <i
                                                                                                class="proof-image2 proof-image2-{{ $index }}">No
                                                                                                proof image available</i>
                                                                                        @endif
                                                                                    </div>
                                                                                @endif
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-outline-danger"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @foreach ($list6 as $lists)
                                            @if ($array2['Tenant_ID'] == $lists->Tenant_ID && $lists->Type_of_Bill == 'Electricity')
                                                <!-- Update Modal 1-->
                                                <div class="modal fade"
                                                    id="update_payment_electricity_status{{ $lists->Tenant_ID . $lists->Due_Date . $lists->Type_of_Bill }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document"
                                                        style="z-index: 6;">
                                                        <div class="modal-content">
                                                            <form action="{{ url('/update_utility_payment') }}"
                                                                class="prevent_submit" method="POST"
                                                                enctype="multipart/form-data">

                                                                {{ csrf_field() }}

                                                                <div class="modal-body">
                                                                    <input type="hidden" name="tenant_id"
                                                                        value="{{ $lists->Tenant_ID }}">

                                                                    <input type="hidden" name="due"
                                                                        value="{{ $lists->Due_Date }}" />

                                                                    <h3 class="text-left">Electricity
                                                                        Bill Status: </h3>
                                                                    <select name="electricity_status" class="form-control"
                                                                        required>
                                                                        <option value="" selected="true"
                                                                            disabled="disabled">
                                                                            Select</option>
                                                                        <option value="Paid">
                                                                            Paid
                                                                        </option>
                                                                        <option value="Non-Payment">
                                                                            Non-Payment
                                                                        </option>
                                                                    </select>
                                                                    <br>

                                                                    <i>Proof of Payment Here:</i>

                                                                    @if ($lists->Reference_No != null)
                                                                        <h3 class="text-left">Reference No : <span
                                                                                class="text-primary">{{ $lists->Reference_No }}</span>
                                                                        </h3>
                                                                        @if ($lists->Proof_Image != null)
                                                                            <h3 class="text-left">Proof Image</h3>
                                                                            <img src="{{ $lists->Proof_Image }}"
                                                                                class="card-img-top">
                                                                        @endif
                                                                    @endif
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-outline-danger"
                                                                        data-dismiss="modal">Close</button>
                                                                    <input type="submit"
                                                                        class="btn btn-success prevent_submit">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            @if ($array2['Tenant_ID'] == $lists->Tenant_ID && $lists->Type_of_Bill == 'Water')
                                                <!-- Update Modal 2 -->
                                                <div class="modal fade "
                                                    id="update_payment_water_status{{ $lists->Tenant_ID . $lists->Due_Date . $lists->Type_of_Bill }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document"
                                                        style="z-index: 6;">
                                                        <div class="modal-content">
                                                            <form action="{{ url('/update_utility_payment') }}"
                                                                class="prevent_submit" method="POST"
                                                                enctype="multipart/form-data">

                                                                {{ csrf_field() }}

                                                                <div class="modal-body">
                                                                    <input type="hidden" name="tenant_id"
                                                                        value="{{ $lists->Tenant_ID }}">

                                                                    <input type="hidden" name="due"
                                                                        value="{{ $lists->Due_Date }}" />

                                                                    <h3 class="text-left">Water
                                                                        Bill Status: </h3>
                                                                    <select name="water_status" class="form-control"
                                                                        required>
                                                                        <option value="" selected="true"
                                                                            disabled="disabled">
                                                                            Select</option>
                                                                        <option value="Paid">
                                                                            Paid
                                                                        </option>
                                                                        <option value="Non-Payment">
                                                                            Non-Payment
                                                                        </option>
                                                                    </select>
                                                                    <br>
                                                                    <i>Proof of Payment Here:</i>

                                                                    @if ($lists->Reference_No != null)
                                                                        <h3 class="text-left">Reference No : <span
                                                                                class="text-primary">{{ $lists->Reference_No }}</span>
                                                                        </h3>
                                                                        @if ($lists->Proof_Image != null)
                                                                            <h3 class="text-left">Proof Image</h3>
                                                                            <img src="{{ $lists->Proof_Image }}"
                                                                                class="card-img-top">
                                                                        @endif
                                                                    @endif
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-outline-danger"
                                                                        data-dismiss="modal">Close</button>
                                                                    <input type="submit"
                                                                        class="btn btn-success prevent_submit">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endforeach
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
    <script>
        $('.prevent_submit').on('submit', function() {
            $('.prevent_submit').attr('disabled', 'true');
        });

         //Preview Image
         const previewBtns = document.querySelectorAll('.preview-btn');
        previewBtns.forEach(previewBtn => {
            const index = previewBtn.dataset.index;
            const previewContainer = document.querySelector(`.preview-container-${index}`);
            const referenceNo = document.querySelector(`.reference-no-${index}`);
            const proofImage = document.querySelector(`.proof-image-${index}`);

            previewBtn.addEventListener('mouseenter', function() {
                referenceNo.textContent = previewBtn.dataset.referenceNo;
                proofImage.src = previewBtn.dataset.proofImage;
                previewContainer.style.display = 'block';
            });

            previewBtn.addEventListener('mouseleave', function() {
                previewContainer.style.display = 'none';
            });
        });

        //Preview Image2
        const previewBtns2 = document.querySelectorAll('.preview-btn2');
        previewBtns2.forEach(previewBtn2 => {
            const index = previewBtn2.dataset.index;
            const previewContainer2 = document.querySelector(`.preview-container2-${index}`);
            const referenceNo2 = document.querySelector(`.reference-no-${index}`);
            const proofImage2 = document.querySelector(`.proof-image2-${index}`);

            previewBtn2.addEventListener('mouseenter', function() {
                referenceNo2.textContent = previewBtn2.dataset.referenceNo2;
                proofImage2.src = previewBtn2.dataset.proofImage2;
                previewContainer2.style.display = 'block';
            });

            previewBtn2.addEventListener('mouseleave', function() {
                previewContainer2.style.display = 'none';
            });
        });

    </script>
    <style>
        /* remove up and down button inside form */
        
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        @media (min-width: 992px) {
            .modal-lg {
                max-width: 90%;
                max-height: 90%;
            }
        }

        .preview-container {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            z-index: 999;
            width: auto;
            height: auto;
            text-align: center;
            justify-content: center;
        }

        .preview-container p {
            margin-bottom: 10px;
            font-size: 14px;
            font-weight: bold;
        }

        .preview-container img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
        .preview-container2 {
            display: none;
            position: absolute;
            top: 60%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            z-index: 9999;
            width: auto;
            height: auto;
            text-align: center;
            justify-content: center;
        }

        .preview-container2 p {
            margin-bottom: 10px;
            font-size: 14px;
            font-weight: bold;
        }

        .preview-container2 img {
            max-width: 100%;
            height: auto;
            max-height: 400px;
            margin-bottom: 10px;
        }


        .img-container {
            position: relative;
            display: inline-block;
        }

        .img-container img {
            display: block;
            position: absolute;
            max-width: 100%;
        }

        .img-container .btn {
            position: relative;
        }

        .img-container .popup {
            position: absolute;
            top: 70%;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            visibility: hidden;
            opacity: 0;
            transition: all 0.3s ease-in-out;
        }

        .img-container .btn:hover .popup {
            visibility: visible;
            opacity: 1;
            z-index: 9999;
        }

        .img-container .popup img {
            display: block;
            max-width: 80vw;
            max-height: 80vh;
            margin: auto;
            position: absolute;
            top: 50%;
            left: 50%;
            z-index: 9999;
            transform: translate(-50%, -50%);
        }



        .tbltxt {
            font-size: 18px;
        }

        .title {
            text-transform: uppercase;
            font-size: 25px;
            letter-spacing: 2px;
        }

        .line {
            border: 2px solid black;
            width: 35%;
            display: inline-block;
            align-items: right;
            margin-top: 10px;
        }

        .title-color {
            color: #484848;
            font-size: 20px;
        }

        .text-color {
            font-size: 18px;
            color: #6C6C6C;
        }

        @media (max-width: 800px) {
            .line {
                width: 100%;
            }
        }
    </style>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
