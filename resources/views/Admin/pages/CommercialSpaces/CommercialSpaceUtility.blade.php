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
                                <button class="btn bg-success text-white" data-toggle="modal" data-target="#add_rooms">
                                    Add Bills
                                </button>
                            </div>
                        </div>

                         <!-- Add Utility Modal -->
                        <div class="modal fade" id="add_rooms" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-left display-4" id="exampleModalLabel">Create Tenant Bill</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ url('/add_commercial_tenant_utility_bill') }}" class="prevent_submit" method="POST"
                                        enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                            <h3 class="text-left">Tenant Name : </h3>
                                            <select name="tenant_id" class="form-control" required>
                                                <option value="" selected="true" disabled="disabled">Select</option>
                                                @foreach($list as $lists)
                                                <option value="{{$lists->Tenant_ID}}">{{$lists->name_of_owner}}</option>
                                                @endforeach
                                            </select>

                                            <h3 class="text-left">Type of Bill : </h3>
                                            <select name="type_of_bill" class="form-control" required>
                                                <option value="" selected="true" disabled="disabled">Select</option>
                                                <option value="Electricity">Electricity</option>
                                                <option value="Water">Water</option>
                                            </select>

                                            <h3 class="text-left">Amount : </h3>
                                            <input type="number" name="amount" class="form-control" required>
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($list as $lists)
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
                                                        <span class="tbltxt">Authorized Representative: </span>
                                                        <span
                                                            class="font-weight-bold tbltxt">{{ $lists->authorized_representative }}</span>
                                                        <br>
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
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>  
                                    
                                    @foreach ($array as $arrays)
                                        <!-- Tenant History -->
                                        <div class="modal fade"
                                            id="view_utility_{{ $arrays['Tenant_ID'] }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-left display-4"
                                                            id="exampleModalLabel">View Utility Bills
                                                        </h5>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal" aria-label="Close">
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
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($list2 as $lists)
                                                                    @if($arrays['Tenant_ID'] == $lists->Tenant_ID && $lists->Type_of_Bill == "Electricity")
                                                                        <tr>
                                                                            <td class="cur1">{{$lists->Total_Amount}}</td>
                                                                            <td>{{date('F j, Y', strtotime($lists->Due_Date))}}</td>
                                                                            <td>{{date('F j, Y', strtotime($lists->Paid_Date))}}</td>
                                                                            <td>{{$lists->Payment_Status}}</td>
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
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($list2 as $lists)
                                                                    @if($arrays['Tenant_ID'] == $lists->Tenant_ID && $lists->Type_of_Bill == "Water")
                                                                        <tr>
                                                                            <td class="cur1">{{$lists->Total_Amount}}</td>
                                                                            <td>{{date('F j, Y', strtotime($lists->Due_Date))}}</td>
                                                                            <td>{{date('F j, Y', strtotime($lists->Paid_Date))}}</td>
                                                                            <td>{{$lists->Payment_Status}}</td>
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
    <script>
        $('.prevent_submit').on('submit', function() {
            $('.prevent_submit').attr('disabled', 'true');
        });
    </script>
    <style>
        .modal-body
        {
            overflow-x: auto;
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
