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
    <div class="container-fluid mt--7">
        <div class="container-fluid mt--6">
            <div class="row justify-content-center">
                <div class=" col ">
                    <div class="card">
                        <div class="card-header bg-transparent">
                            <h3 class="mb-0">Commercial Spaces</h3>
                        </div>
                        <div class="card-body">
                            <div class="nav-wrapper">
                                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text"
                                    role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab"
                                            data-toggle="tab" href="#tabs-icons-text-1" role="tab"
                                            aria-controls="tabs-icons-text-1" aria-selected="true"><i
                                                class="ni ni-cloud-upload-96 mr-2"></i>Applications</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                                            href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
                                            aria-selected="false"><i class="ni ni-bell-55 mr-2"></i>tenants</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                                            aria-labelledby="tabs-icons-text-1-tab">
                                            <div class="table-responsive">
                                                <table class="table align-items-center table-flush" id="myTable">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th scope="col" style="font-size:17px;">Action</th>
                                                            <th scope="col" style="font-size:17px;">ID</th>
                                                            <th scope="col" style="font-size:17px;">Business Info</th>
                                                            <th scope="col" style="font-size:17px;">Owner Info</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($list as $lists)
                                                            <tr>
                                                                <td>
                                                                    <a href="{{ url('/commercial_space_view', ['id' => $lists->id]) }}"
                                                                        target="blank" class="btn btn-sm btn-success"
                                                                        style="cursor:pointer;">
                                                                        <i class="bi bi-eye"></i>
                                                                    </a>
                                                                    <button type="submit" class="btn btn-sm btn-primary"
                                                                        title="Edit">
                                                                        <i class="bi bi-pencil-square"></i></button>
                                                                </td>
                                                                <td><span
                                                                        class="font-weight-bold tbltxt">{{ $lists->id }}</span>
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
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                                            aria-labelledby="tabs-icons-text-2-tab">
                                            <p class="description">Try</p>
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
@endsection
@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
