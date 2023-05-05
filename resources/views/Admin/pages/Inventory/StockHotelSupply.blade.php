@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid mt--8">
        <div class="row align-items-center py-4">
            <div class="col-lg-12 col-12">
                <h6 class="h2 text-dark d-inline-block mb-0">Supply Request</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item">Inventory</li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">Supply Request
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                                <div class="col">
                                    <h5 class="mb-0" style="color:#e40808;font-size:14px;">Instructions: Before
                                        starting,
                                        see to It that all inventory are in the Storage Area</h5><br><br>
                                </div>
                        </div>
                        <div class="table-responsive">

                            <!-- Projects table -->
                            <table class="table align-items-center table-flush" id="myTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" style="font-size:16px;">Action</th>
                                        <th scope="col" style="font-size:16px;">Room No.</th>
                                        <th scope="col" style="font-size:16px;">Item Name</th>
                                        <th scope="col" style="font-size:16px;">RequestedQuantity</th>
                                        <th scope="col" style="font-size:16px;">DateRequested</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $index => $lists)
                                        <tr>
                                            <td>
                                                <button class="btn btn-sm btn-success btn-lg" data-toggle="modal"
                                                    data-target="#update{{ $lists->id }}"><i
                                                        class="bi bi-pencil-square"></i></button>
                                            </td>
                                            <td style="font-size:16px;">{{ $lists->Room_No }}</td>
                                            <td style="font-size:16px;">{{ $lists->name }}</td>
                                            <td style="font-size:16px;">{{ $lists->Quantity_Requested }}</td>
                                            <td style="font-size:16px;">{{ $lists->Date_Requested }}</td>
                                        </tr>

                                        <!--MODAL FOR Update-->
                                        <div class="modal fade" id="update{{ $lists->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <form method="POST" action="{{ url('/supply_request_approval') }}"
                                                    enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div class="container">
                                                                <h1 class="modal-title">Requests Approval</h1>
                                                            </div>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="Stockdetails">Room Number </label>
                                                                    <input type="number" class="form-control"
                                                                        value="{{ $lists->Room_No }}"
                                                                        placeholder="Enter number..." readonly>
                                                                    <input type="number" class="form-control"
                                                                        value="{{ $lists->Room_No }}"
                                                                        placeholder="Enter number..." name="roomno" hidden>
                                                                </div>
                                                                <div class="col">
                                                                    <input class="form-control" type="text"
                                                                        name="productid" value="{{ $lists->productid }}"
                                                                        hidden>
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $lists->id }}">
                                                                    <input type="hidden" name="attendant"
                                                                        value="{{ $lists->Attendant }}">
                                                                    <input type="hidden" name="category"
                                                                        value="{{ $lists->Category }}">
                                                                    <input type="hidden" name="date_requested"
                                                                        value="{{ $lists->Date_Requested }}">
                                                                    <input type="hidden" name="qty_owned"
                                                                        value="{{ $lists->Quantity }}">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="Stockdetails">Item Name </label>
                                                                    <input type="text" class="form-control"
                                                                        name="name" value="{{ $lists->name }}"
                                                                        placeholder="Enter number..." readonly>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="Stockdetails">Quantity Owned </label>
                                                                    <input type="number" class="form-control"
                                                                        value="{{ $lists->Quantity }}"
                                                                        placeholder="Enter number..." readonly>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="Stockdetails">Requested Quantity </label>
                                                                    <input type="number" class="form-control"
                                                                        name="Quantity_Requested"
                                                                        value="{{ $lists->Quantity_Requested }}"
                                                                        placeholder="Enter number..." readonly>
                                                                </div>
                                                            </div>
                                                            <label>Status: </label>
                                                            <select class="form-control" name="status" id="stats" data-list-index="{{$index}}"
                                                                required>
                                                                <option value="" selected="true"
                                                                    disabled="disabled">Select</option>
                                                                <option value="Approved">Approved</option>
                                                                <option value="Denied">Denied</option>
                                                            </select>

                                                            <div class="row" style="display:none;" id="qty_{{$index}}">
                                                                <div class="col">
                                                                    <label for="Stockdetails">Quantity to Give: </label>
                                                                    <input type="number" class="form-control" id="qt2_{{$index}}"
                                                                        name="quantity" placeholder="Enter number..."
                                                                        value="0">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a class="btn btn-failed" data-dismiss="modal">Close</a>
                                                            <input type="submit" name="update" value="Update"
                                                                class="btn btn-success" />
                                                        </div>

                                                    </div>
                                                </form>
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
            .title {
                text-transform: uppercase;
                font-size: 20px;
                letter-spacing: 2px;
            }

            .text-color {
                font-size: 18px;
                color: #6C6C6C;
            }
        </style>

        <!-- Script tag for datatable -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                $('select[name="status"]').change(function() {
                    var selected = $("option:selected", this).val();
                    var listIndex = $(this).data('list-index');

                    if (selected == "Approved") {
                        $('#qty_'+listIndex).css({
                            'display': 'block'
                        });
                        $('#qt2_'+listIndex).val(0);
                    } else if (selected == "Denied") {
                        $('#qty_'+listIndex).css({
                            'display': 'none'
                        });
                        $('#qt2_'+listIndex).val(0);
                    }
                });
            });
            $('.prevent_submit').on('submit', function() {
                $('.prevent_submit').attr('disabled', 'true');
            });
            $.noConflict();
            jQuery(document).ready(function($) {
                $('#myTable').DataTable();
            });
        </script>
    @endsection

    @push('js')
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    @endpush
