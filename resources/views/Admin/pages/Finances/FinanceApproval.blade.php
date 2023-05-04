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
                            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                                aria-labelledby="tabs-icons-text-1-tab">
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
                                                                    <h2 class="display-2 mt--3 text-green p-2"
                                                                        id="currency">
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
                                                                <i class="bi bi-arrow-clockwise"></i>
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

                            {{-- OR ARCHIVES --}}
                            {{-- <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                                aria-labelledby="tabs-icons-text-2-tab">
                                <div class="table-responsive">
                                    <div class="card-header"
                                        style="justify-content:center;align-items:center;align-self:center">
                                        <form action="{{ url('/archives_summary') }}" target="blank" method="get">
                                            <div class="d-flex flex-row">
                                                <div class="p-2">
                                                    <label for="start_date">Start Date:</label>
                                                    <input type="date" class="form-control" id="start_date"
                                                        name="start_date">
                                                </div>
                                                <div class="p-2">
                                                    <label for="end_date">End Date:</label>
                                                    <input type="date" class="form-control" id="start_date"
                                                        name="end_date">
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
                            </div> --}}

                            {{-- OR ARCHIVES --}}
                            {{-- <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                                aria-labelledby="tabs-icons-text-2-tab">
                                <div class="table-responsive">
                                    <div class="card-header"
                                        style="justify-content:center;align-items:center;align-self:center">
                                        <form action="{{ url('/archives_summary') }}" target="blank" method="get">
                                            <div class="d-flex flex-row">
                                                <div class="p-2">
                                                    <label for="start_date">Start Date:</label>
                                                    <input type="date" class="form-control" id="start_date"
                                                        name="start_date">
                                                </div>
                                                <div class="p-2">
                                                    <label for="end_date">End Date:</label>
                                                    <input type="date" class="form-control" id="start_date"
                                                        name="end_date">
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
                            </div> --}}
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
