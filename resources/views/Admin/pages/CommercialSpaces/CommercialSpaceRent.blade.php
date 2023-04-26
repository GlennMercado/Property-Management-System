@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
    <script>
        $.noConflict();
        jQuery(document).ready(function($) {
            $('#myTable').DataTable();
            $('#myTable2').DataTable();
            $('#myTable3').DataTable({
        "columnDefs": [
            { "type": "date", "targets": 0 }
        ]
    });
            $('#myTable4').DataTable();
        });
        // Code that uses other library's $ can follow here.
    </script>
    <div class="container-fluid mt--8">
        <div class="row align-items-center py-4">
            <div class="col-lg-12 col-12">
                <h6 class="h2 text-dark d-inline-block mb-0">Commercial Spaces</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item">Sales & Marketing</li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">Commercial Spaces</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="nav-wrapper">
                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab"
                                        href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1"
                                        aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>Rent Payment</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                                        href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
                                        aria-selected="false">
                                        <i class="ni ni-fat-remove mr-2"></i>Security Deposit</a>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab"
                                        href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3"
                                        aria-selected="false">
                                        <i class="ni ni-fat-remove mr-2"></i>Archive</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">
                                    {{-- Rent Payment --}}
                                    <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                                        aria-labelledby="tabs-icons-text-1-tab">
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
                                                    @foreach ($list as $lists)
                                                        <tr>
                                                            <td>
                                                                <button class="btn btn-sm btn-primary" data-toggle="modal"
                                                                    data-target="#view_payment_history{{ $lists->Tenant_ID }}"
                                                                    title="Payment History">
                                                                    <i class="bi bi-eye"></i>
                                                                </button>
                                                                @if($lists->Tenant_Status != "Pre-Termination")
                                                                <button class="btn btn-sm btn-success" data-toggle="modal"
                                                                    data-target="#update_payment_status{{ $lists->id }}"
                                                                    title="Update Payment Status">
                                                                    <i class="bi bi-arrow-repeat"></i>
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
                                                                <span
                                                                    class="font-weight-bold tbltxt">{{ $lists->spouse }}</span>
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
                                                        <div class="modal fade"
                                                            id="update_payment_status{{ $lists->id }}" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered"
                                                                role="document">
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
                                                                            <select name="status" class="form-control"
                                                                                required>
                                                                                <option value="" selected="true"
                                                                                    disabled="disabled">Select</option>
                                                                                <option value="Paid">Paid
                                                                                </option>
                                                                                <option value="Non-Payment">Non-Payment
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button class="btn btn-outline-danger"
                                                                                data-dismiss="modal">Close</button>
                                                                            <input type="submit" class="btn btn-success prevent_submit">
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
                                                <div class="modal fade"
                                                    id="view_payment_history{{ $arrays['Tenant_ID'] }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-left display-4"
                                                                    id="exampleModalLabel">View Information History
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
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
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($list3 as $lists3)
                                                                            @if ($lists3->Tenant_ID == $arrays['Tenant_ID'])
                                                                                <tr>
                                                                                    <td class="font-weight-bold tbltxt">
                                                                                        {{ date('F j, Y', strtotime($lists3->Due_Date)) }}
                                                                                    </td>
                                                                                    <td class="cur1 font-weight-bold tbltxt">
                                                                                        {{ $lists3->Rental_Fee }}</td>
                                                                                    @if($lists3->Paid_Date != null)
                                                                                    <td class="font-weight-bold tbltxt">
                                                                                        {{ date('F j, Y', strtotime($lists3->Paid_Date)) }}
                                                                                    </td>
                                                                                    @else
                                                                                    <td></td>
                                                                                    @endif
                                                                                    @if($lists3->Payment_Status == "Paid")
                                                                                    <td class="font-weight-bold tbltxt text-success">
                                                                                        {{ $lists3->Payment_Status }}</td>
                                                                                    @else
                                                                                    <td class="font-weight-bold tbltxt text-danger">
                                                                                        {{ $lists3->Payment_Status }}</td>
                                                                                    @endif
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
                                                                            <th scope="col">Security Deposit</th>
                                                                            <th scope="col">Paid Date</th>
                                                                            <th scope="col">Remarks</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($list2 as $lists2)
                                                                            @if ($lists2->Tenant_ID == $arrays['Tenant_ID'])
                                                                                <tr>
                                                                                    <td class="cur1 font-weight-bold tbltxt">
                                                                                        {{ $lists2->Security_Deposit }}
                                                                                    </td>
                                                                                    <td class="font-weight-bold tbltxt">
                                                                                        {{ date('F j, Y', strtotime($lists2->Paid_Date)) }}
                                                                                    </td>
                                                                                    <td class="font-weight-bold tbltxt">
                                                                                        {{ $lists2->Remarks }}
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

                                    <!-- {{-- Tab --}}
                                    <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                                        aria-labelledby="tabs-icons-text-2-tab">
                                        
                                    </div> -->

                                    {{-- Archive --}}
                                    <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel"
                                        aria-labelledby="tabs-icons-text-3-tab">
                                        <div class="table-responsive"> 
                                            <table class="table align-items-center table-flush" id="myTable4">
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
                                                    @foreach ($list4 as $lists)
                                                        <tr>
                                                            <td>
                                                                <button class="btn btn-sm btn-primary" data-toggle="modal"
                                                                    data-target="#view_payment_historyarc{{ $lists->Tenant_ID }}"
                                                                    title="Payment History">
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
                                                                <span
                                                                    class="font-weight-bold tbltxt">{{ $lists->spouse }}</span>
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
                                                            <td class="font-weight-bold tbltxt cur1">
                                                                {{ $lists->Rental_Fee }}</td>
                                                            <td class="font-weight-bold tbltxt cur1">
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
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            @foreach ($array as $arrays)
                                                <!-- Payment_History / Security Deposit -->
                                                <div class="modal fade"
                                                    id="view_payment_historyarc{{ $arrays['Tenant_ID'] }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-left display-4"
                                                                    id="exampleModalLabel">View Information
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h3 class="text-left">Payment History</h3>
                                                                <table class="table align-items-center table-flush"
                                                                    id="myTable5">
                                                                    <thead class="thead-light">
                                                                        <tr>
                                                                            <th scope="col">Due Date</th>
                                                                            <th scope="col">Rental Fee</th>
                                                                            <th scope="col">Paid Date</th>
                                                                            <th scope="col">Payment Status</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($list3 as $lists3)
                                                                            @if ($lists3->Tenant_ID == $arrays['Tenant_ID'])
                                                                                <tr>
                                                                                    <td class="font-weight-bold tbltxt">
                                                                                        {{ date('F j, Y', strtotime($lists3->Due_Date)) }}
                                                                                    </td>
                                                                                    <td class="cur1 font-weight-bold tbltxt">
                                                                                        {{ $lists3->Rental_Fee }}</td>
                                                                                    @if($lists3->Paid_Date != null)
                                                                                    <td class="font-weight-bold tbltxt">
                                                                                        {{ date('F j, Y', strtotime($lists3->Paid_Date)) }}
                                                                                    </td>
                                                                                    @else
                                                                                    <td></td>
                                                                                    @endif
                                                                                    @if($lists3->Payment_Status == "Paid")
                                                                                    <td class="font-weight-bold tbltxt text-success">
                                                                                        {{ $lists3->Payment_Status }}</td>
                                                                                    @else
                                                                                    <td class="font-weight-bold tbltxt text-danger">
                                                                                        {{ $lists3->Payment_Status }}</td>
                                                                                    @endif
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
                                                                            <th scope="col">Security Deposit</th>
                                                                            <th scope="col">Paid Date</th>
                                                                            <th scope="col">Remarks</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($list5 as $lists5)
                                                                            @if ($lists5->Tenant_ID == $arrays['Tenant_ID'])
                                                                                <tr>
                                                                                    <td class="cur1 font-weight-bold tbltxt">
                                                                                        {{ $lists5->Security_Deposit }}
                                                                                    </td>
                                                                                    <td class="font-weight-bold tbltxt">
                                                                                        {{ date('F j, Y', strtotime($lists5->Paid_Date)) }}
                                                                                    </td>
                                                                                    <td class="font-weight-bold tbltxt">
                                                                                        {{ $lists5->Remarks }}
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
        $('.prevent_submit').on('submit', function() {
            $('.prevent_submit').attr('disabled', 'true');
        });
    </script>
    <style>
        .tbltxt {
            font-size: 18px;
        }

        .title {
            text-transform: uppercase;
            font-size: 25px;
            letter-spacing: 2px;
        }
        .cur1::before{
                content: '₱';
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
