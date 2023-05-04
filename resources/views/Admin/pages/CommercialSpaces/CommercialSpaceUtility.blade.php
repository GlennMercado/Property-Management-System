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
            $('#myTable3').DataTable();
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
                        <div class="card-header bg-transparent row">
                            <div class="col text-right">
                                <button class="btn btn-outline-primary" data-toggle="modal" data-target="#add_rooms">
                                    Add Bills
                                </button>
                            </div>
                        </div>

                        <!-- Add Utility Modal -->
                        <div class="modal fade" id="add_rooms" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-left display-4" id="exampleModalLabel">Create Tenant
                                            Bill</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ url('/add_commercial_tenant_utility_bill') }}" class="prevent_submit"
                                        method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h3 class="text-left">Tenant Name : </h3>
                                                    <select name="tenant_id" class="form-control" required>
                                                        <option value="" selected="true" disabled="disabled">Select
                                                        </option>
                                                        @foreach ($list as $lists)
                                                            <option value="{{ $lists->Tenant_ID }}">
                                                                {{ $lists->name_of_owner }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <h3 class="text-left">Type of Bill : </h3>
                                                    <select name="type_of_bill" class="form-control" required>
                                                        <option value="" selected="true" disabled="disabled">Select
                                                        </option>
                                                        <option value="Electricity">Electricity</option>
                                                        <option value="Water">Water</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md mt-4">
                                                    <h3 class="text-left">Amount : </h3>
                                                    <input type="number" name="amount" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-success prevent_submit" value="Add">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <div class="card shadow">
                            <div class="card-body">
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
                                            @foreach ($list as $lists)
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

                                    @foreach ($array as $arrays)
                                        <!-- Tenant History -->
                                        <div class="modal fade" id="view_utility_{{ $arrays['Tenant_ID'] }}"
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
                                                                @foreach ($list2 as $index => $lists)
                                                                    @if ($arrays['Tenant_ID'] == $lists->Tenant_ID && $lists->Type_of_Bill == 'Electricity')
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
                                                                                            class="bi bi-arrow-clockwise"></i>
                                                                                    </button>
                                                                                @endif
                                                                                @if ($lists->Payment_Status == 'Paid')
                                                                                    <button
                                                                                        class="preview-btn btn btn-sm btn-primary"
                                                                                        data-reference-no="{{ $lists->Reference_No }}"
                                                                                        data-proof-image="{{ $lists->Proof_Image }}"
                                                                                        data-index="{{ $index }}">View
                                                                                        Payment</button>

                                                                                    <div
                                                                                        class="preview-container preview-container-{{ $index }}">
                                                                                        <p>Reference Number : <span
                                                                                                class="reference-no reference-no-{{ $index }}"></span>
                                                                                        </p>
                                                                                        @if ($lists->Proof_Image != null)
                                                                                            <p>Proof Image:</p>
                                                                                            <img src="{{ $lists->Proof_Image }}"
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
                                                                @foreach ($list2 as $index => $lists)
                                                                    @if ($arrays['Tenant_ID'] == $lists->Tenant_ID && $lists->Type_of_Bill == 'Water')
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
                                                                                            class="bi bi-arrow-clockwise"></i>
                                                                                    </button>
                                                                                @endif

                                                                                @if ($lists->Payment_Status == 'Paid')
                                                                                    <button
                                                                                        class="preview-btn btn btn-sm btn-primary"
                                                                                        data-reference-no="{{ $lists->Reference_No }}"
                                                                                        data-proof-image="{{ $lists->Proof_Image }}"
                                                                                        data-index="{{ $index }}">View
                                                                                        Payment</button>

                                                                                    <div
                                                                                        class="preview-container preview-container-{{ $index }}">
                                                                                        <p>Reference Number : <span
                                                                                                class="reference-no reference-no-{{ $index }}"></span>
                                                                                        </p>
                                                                                        @if ($lists->Proof_Image != null)
                                                                                            <p>Proof Image:</p>
                                                                                            <img src="{{ $lists->Proof_Image }}"
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
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-outline-danger"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @foreach ($list2 as $lists)
                                            @if ($arrays['Tenant_ID'] == $lists->Tenant_ID && $lists->Type_of_Bill == 'Electricity')
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

                                            @if ($arrays['Tenant_ID'] == $lists->Tenant_ID && $lists->Type_of_Bill == 'Water')
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
    </div>
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

        .preview-container p {
            margin-bottom: 10px;
            font-size: 14px;
            font-weight: bold;
        }

        .preview-container img {
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
    <script>
        $(document).ready(function() {
            var dateToday = new Date();
            var month = dateToday.getMonth() + 1;
            var day = dateToday.getDate();
            var year = dateToday.getFullYear();

            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;

            $('#date').attr('min', maxDate);
        });
    </script>
@endsection
@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
