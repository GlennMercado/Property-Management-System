@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
    <script>
        $.noConflict();
        jQuery(document).ready(function($) {
            $('#myTable').DataTable();
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
                                        aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>Applications</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab"
                                        href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3"
                                        aria-selected="false">
                                        <i class="ni ni-fat-remove mr-2"></i>Disapproved/Failed Applications</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">
                                    {{-- Applications --}}
                                    <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                                        aria-labelledby="tabs-icons-text-1-tab">
                                        <div class="table-responsive">
                                            <table class="table align-items-center table-flush" id="myTable">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col" style="font-size:17px;">Action</th>
                                                        <th scope="col" style="font-size:17px;">Business Info</th>
                                                        <th scope="col" style="font-size:17px;">Owner Info</th>
                                                        <th scope="col" style="font-size:17px;">Status</th>
                                                        <th scope="col" style="font-size:17px;">Remarks</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($list as $lists)
                                                        @if ($lists->Status == 'For Approval' || $lists->Status == 'Approved' || $lists->Status == 'For Interview' || $lists->Status == 'For Revision' || $lists->Status == 'Passed' || $lists->Status == 'Revised')
                                                            <tr>
                                                                <td>
                                                                    <a href="{{ url('/commercial_space_view', ['id' => $lists->id]) }}"
                                                                        target="blank" class="btn btn-sm btn-primary"
                                                                        style="cursor:pointer;">
                                                                        <i class="bi bi-eye"></i>
                                                                    </a>
                                                                    @if ($lists->Status == 'For Approval' || $lists->Status == 'Revised')
                                                                        <button class="btn btn-sm btn-success"
                                                                            data-toggle="modal"
                                                                            data-target="#update_status{{ $lists->id }}"
                                                                            title="Update Status">
                                                                            <i class="bi bi-arrow-repeat"></i>
                                                                        </button>
                                                                    @endif

                                                                    @if ($lists->Status == 'For Interview')
                                                                        <button class="btn btn-sm btn-success"
                                                                            data-toggle="modal"
                                                                            data-target="#update_status2{{ $lists->id }}"
                                                                            title="Interview Result">
                                                                            <i class="bi bi-arrow-repeat"></i>
                                                                        </button>
                                                                    @endif

                                                                    @if ($lists->Status == 'Passed')
                                                                        <button class="btn btn-sm btn-success"
                                                                            data-toggle="modal"
                                                                            data-target="#update_status3{{ $lists->id }}"
                                                                            title="Interview Result">
                                                                            <i class="bi bi-plus"></i>
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
                                                                @if ($lists->Status == 'For Approval' || $lists->Status == 'For Interview')
                                                                    <td class="font-weight-bold tbltxt"
                                                                        style="color:#f0ad4e;">{{ $lists->Status }}</td>
                                                                @elseif($lists->Status == 'Approved' || $lists->Status == 'Passed')
                                                                    <td class="text-success font-weight-bold tbltxt">
                                                                        {{ $lists->Status }}</td>
                                                                @elseif($lists->Status == 'For Revision' || $lists->Status == 'Revised')
                                                                    <td class="text-primary font-weight-bold tbltxt">
                                                                        {{ $lists->Status }}</td>
                                                                @endif
                                                                <td>{{ $lists->Remarks }}</td>
                                                            </tr>

                                                            <!-- Update Modal -->
                                                            <div class="modal fade" id="update_status{{ $lists->id }}"
                                                                tabindex="-1" role="dialog"
                                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered"
                                                                    role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title text-left display-4"
                                                                                id="exampleModalLabel">Setting Application
                                                                                Status</h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <form
                                                                            action="{{ url('/update_commercial_status') }}"
                                                                            class="prevent_submit" method="POST"
                                                                            enctype="multipart/form-data">
                                                                            {{ csrf_field() }}
                                                                            <div class="modal-body">
                                                                                <input type="hidden" name="id"
                                                                                    value="{{ $lists->id }}">
                                                                                <h3 class="text-left">Status: </h3>
                                                                                <select name="status"
                                                                                    class="form-control" required>
                                                                                    <option value="" selected="true"
                                                                                        disabled="disabled">Select</option>
                                                                                    <option value="Approved">Approved
                                                                                    </option>
                                                                                    <option value="Disapproved">Disapproved
                                                                                    </option>
                                                                                    <option value="For Revision">For
                                                                                        Revision</option>
                                                                                </select>
                                                                                <h3 class="text-left">Remarks: </h3>
                                                                                <input type="text" name="remarks"
                                                                                    class="form-control" />
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

                                                            <!-- Update Modal2 -->
                                                            <div class="modal fade"
                                                                id="update_status2{{ $lists->id }}" tabindex="-1"
                                                                role="dialog" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered"
                                                                    role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title text-left display-4"
                                                                                id="exampleModalLabel">Setting Application
                                                                                Status</h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <form
                                                                            action="{{ url('/update_commercial_status') }}"
                                                                            class="prevent_submit" method="POST"
                                                                            enctype="multipart/form-data">
                                                                            {{ csrf_field() }}
                                                                            <div class="modal-body">
                                                                                <input type="hidden" name="id"
                                                                                    value="{{ $lists->id }}">
                                                                                <h3 class="text-left">Interview Date : <span class="text-success">{{date('F j, Y', strtotime($lists->Interview_Date))}}</span></h3>
                                                                                <br>
                                                                                <h3 class="text-left">Interview Result:
                                                                                </h3>
                                                                                <select name="status"
                                                                                    class="form-control" required>
                                                                                    <option value="" selected="true"
                                                                                        disabled="disabled">Select</option>
                                                                                    <option value="Passed">Passed
                                                                                    </option>
                                                                                    <option value="Failed">Failed</option>
                                                                                </select>
                                                                                <h3 class="text-left">Remarks: </h3>
                                                                                <input type="text" name="remarks"
                                                                                    class="form-control" />
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

                                                            <!--Add Tenant Modal3 -->
                                                            <div class="modal fade"
                                                                id="update_status3{{ $lists->id }}" tabindex="-1"
                                                                role="dialog" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered"
                                                                    role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title text-left display-4"
                                                                                id="exampleModalLabel">Setting Application
                                                                                to Tenant</h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <form action="{{ url('/add_commercial_tenant') }}"
                                                                            class="prevent_submit" method="POST"
                                                                            enctype="multipart/form-data">
                                                                            {{ csrf_field() }}
                                                                            <div class="modal-body">
                                                                                <input type="hidden" name="id"
                                                                                    value="{{ $lists->id }}">
                                                                                
                                                                                <h3 class="text-left">Space/Unit:
                                                                                </h3>
                                                                                <select name="space_unit" class="form-control" id="list_unit" required>
                                                                                    <option value="" selected="true" disabled="disabled">Select</option>
                                                                                    @foreach($unit as $units)
                                                                                        <option value="{{$units->Space_Unit}}">{{$units->Space_Unit}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <h3 class="text-left">Rental Fee:
                                                                                </h3>
                                                                                <input type="hidden" class="form-control"
                                                                                    name="renters_fee" id="rent_fee">

                                                                                <input type="text" class="form-control"
                                                                                    id="rent_fee2" readonly>

                                                                                <h3 class="text-left">Start Date of Contract:
                                                                                </h3>
                                                                                <input type="date" class="form-control"
                                                                                    name="start_date" id="start" required>

                                                                                <h3 class="text-left">Remarks:
                                                                                </h3>
                                                                                <input type="text" class="form-control"
                                                                                    name="remarks">

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
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    {{-- Disapproved Applications --}}
                                    <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel"
                                        aria-labelledby="tabs-icons-text-3-tab">
                                        <div class="table-responsive">
                                            <table class="table align-items-center table-flush" id="myTable">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col" style="font-size:17px;">Action</th>
                                                        <th scope="col" style="font-size:17px;">Business Info</th>
                                                        <th scope="col" style="font-size:17px;">Owner Info</th>
                                                        <th scope="col" style="font-size:17px;">Status</th>
                                                        <th scope="col" style="font-size:17px;">Remarks</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($list2 as $lists)
                                                        @if ($lists->Status == 'Disapproved' || $lists->Status == 'Failed')
                                                            <tr>
                                                                <td>
                                                                    <a href="{{ url('/commercial_space_view', ['id' => $lists->id]) }}"
                                                                        target="blank" class="btn btn-sm btn-primary"
                                                                        style="cursor:pointer;">
                                                                        <i class="bi bi-eye"></i>
                                                                    </a>
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
                                                                <td class="font-weight-bold tbltxt text-danger">
                                                                    {{ $lists->Status }}
                                                                </td>
                                                                <td class="font-weight-bold tbltxt">
                                                                    {{ $lists->Remarks }}
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
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
        </div>
    </div>
    </div>
    <style>
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
        $('.prevent_submit').on('submit', function() {
            $('.prevent_submit').attr('disabled', 'true');
        });

        $(document).ready(function() {
            $('#list_unit').on('change', function() {
                var id = $(this).val();

                $.ajax({
                    url: '{{ route('get.rent', ':id') }}'.replace(':id', id),
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#rent_fee').val(data.Rental_Fee);
                        $('#rent_fee2').val(data.Rental_Fee);
                    },
                    error: function(xhr, status, error) {
                        // Handle any errors
                    }
                });
            });
        });

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

            $('#start').attr('min', maxDate);
        });
    </script>
@endsection
@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
