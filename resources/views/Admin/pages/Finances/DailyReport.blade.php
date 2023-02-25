@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
    <script>
        $.noConflict();
        jQuery(document).ready(function($) {
            $('#myTable').DataTable();
            $('#myTables').DataTable();
            $('#myTabless').DataTable();
        });
    </script>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="col">


                                    <div class="row align-items-center">
                                        <div class="col text-right">
                                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text"
                                                role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab"
                                                        data-toggle="tab" href="#tabs-icons-text-1" role="tab"
                                                        aria-controls="tabs-icons-text-1" aria-selected="true">OR</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab"
                                                        data-toggle="tab" href="#tabs-icons-text-2" role="tab"
                                                        aria-controls="tabs-icons-text-2" aria-selected="false"> Daily
                                                        Report </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab"
                                                        data-toggle="tab" href="#tabs-icons-text-3" role="tab"
                                                        aria-controls="tabs-icons-text-3" aria-selected="false"> Monthly
                                                        Report</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="mb-0">Finance</h3>
                            </div>
                        </div>
                    </div>
                    <!--Start of Cards-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="tab-content" id="myTabContent">
                                {{-- ORs --}}
                                <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-1-tab">

                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModal" style="float:right;">
                                        Add Finance
                                    </button>

                                    <table class="table align-items-center table-flush" style="align-items:center"
                                        id="myTable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">OR No.</th>
                                                <th scope="col">Payee</th>
                                                <th scope="col">Particulars</th>
                                                <th scope="col">Event Date</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Remarks</th>
                                                <th scope="col">Debit Type</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($list as $lists)
                                                <tr>
                                                    <td>{{ $lists->ornum }}</td>
                                                    <td>{{ $lists->payee }}</td>
                                                    <td>{{ $lists->particular }}</td>
                                                    <td>{{ $lists->eventdate }}</td>
                                                    <td>{{ $lists->amount }}</td>
                                                    <td>{{ $lists->remark }}</td>
                                                    <td>{{ $lists->debit }}</td>
                                                    <td>
                                                        <button type="button" data-toggle="modal"
                                                            data-target="#ModalView{{ $lists->userid }}"
                                                            class="btn btn-primary"><i class="bi bi-eye"
                                                                style="padding:2px;">View</i></button>
                                                        <button type="button" data-toggle="modal"
                                                            data-target="#ModalUpdate{{ $lists->userid }}"
                                                            class="btn btn-primary"><i
                                                                class="bi bi-pencil-square"style="padding:2px;">Edit</i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @foreach ($array as $arrays)
                                        <!-- Modal -->
                                        <!--View-->
                                        <div class="modal fade text-left" id="ModalView{{ $arrays['userid'] }}"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalCreate"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document" style="max-width:90%">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-left display-4" id="exampleModalCreate">
                                                            View
                                                            Details </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">


                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-failed"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- edit --}}
                                        <div class="modal fade text-left" id="ModalUpdate{{ $arrays['userid'] }}"
                                            tabindex="-1" role="dialog" aria-hidden="true">

                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title">{{ __('Edit Details') }}</h2>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="POST" action="{{ url('/edit') }}"
                                                        enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p class="text-left">User ID: </p>
                                                                    <input class="form-control" type="text"
                                                                        value="{{ $lists->userid }}" readonly>
                                                                    <input class="form-control" type="text"
                                                                        name="userid" value="{{ $lists->userid }}"
                                                                        hidden>
                                                                </div>
                                                                <div class="col">
                                                                    <p class="text-left">OR Number: </p>
                                                                    <input type="text" class="form-control"
                                                                        name="ornum" value="{{ $lists->ornum }}"
                                                                        required>
                                                                    <div class="invalid-feedback">
                                                                        Stock Name empty
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="Stockdetails">Payee: </label>
                                                                <input type="text" class="form-control" name="payee"
                                                                    value="{{ $lists->payee }}" required>

                                                                <!--<input class="form-control" type="tel" minlength="11" maxlength="11" name="mobile" placeholder = "09XXXXXXXXX" required>-->
                                                                <div class="invalid-feedback">
                                                                    Stock Details empty
                                                                </div>
                                                                <label>Particular: </label>
                                                                <select class="form-control"
                                                                    value="{{ $lists->particular }}" name="status"
                                                                    required>
                                                                    <option>Requesting</option>
                                                                    <option>Paid</option>
                                                                    <option>Unpaid</option>
                                                                </select>

                                                                <label>Event Date: </label>
                                                                <input type="date" class="form-control"
                                                                    name="eventdate" value="{{ $lists->eventdate }}"
                                                                    required>

                                                                <label for="Stockdetails">Debit Type: </label>
                                                                <input type="text" class="form-control" name="debit"
                                                                    value="{{ $lists->debit }}" required>

                                                                <label for="Stockdetails">Remarks : </label>
                                                                <input type="text" class="form-control" name="remark"
                                                                    value="{{ $lists->remark }}">

                                                                <div class="invalid-feedback">
                                                                    Stock Details empty
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
                                        </div>
                                </div>
                                {{-- Daily Report --}}
                                <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-2-tab">
                                    <!-- Projects table -->
                                    <div class="table-responsive">
                                        ssdads
                                        <!--<table class="table align-items-center table-flush" id="myTables">
                                            <col>
                                            <col>
                                            <colgroup span="4"></colgroup>
                                            <colgroup span="8"></colgroup>
                                            <thead class="thead-light">
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th colspan="4" style="font-size:18px;">Debit</th>
                                                    <th colspan="8" style="font-size:18px;">Credit</th>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Cash/GCash</th>
                                                    <th scope="col">Unearned Income</th>
                                                    <th scope="col">Bank Transfer/Direct to Bank</th>
                                                    <th scope="col">Cheque</th>
                                                    <th scope="col">Basketball</th>
                                                    <th scope="col">UnearnedIncome</th>
                                                    <th scope="col">OtherIncome</th>
                                                    <th scope="col">ManagementFee</th>
                                                    <th scope="col">FunctionRoom/ConventionCenter/Events
                                                    </th>
                                                    <th scope="col">Hotel</th>
                                                    <th scope="col">CommercialSpace</th>
                                                    <th scope="col">OutputVAT</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($list1 as $lists1)
                                                    @if ($lists1->userid == $arrays['userid'])
                                                        <tr>
                                                            <td>{{ $lists1->ornum }}</td>
                                                            <td>{{ $lists1->created_at }}</td>
                                                            <td>{{ $lists1->payee }}</td>
                                                            <td>{{ $lists1->particular }}</td>
                                                        </tr>
                                                    @else
                                                    @endif
                                                @endforeach
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>-->

                                </div>

                                {{-- Monthly Report --}}
                                <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-3-tab">
                                    <div class="table-responsive">
                                        <table class="table align-items-center table-flush" id="myTabless">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">Summary</th>
                                                    <th scope="col">Cash/GCash</th>
                                                    <th scope="col">Unearned Income</th>
                                                    <th scope="col">Bank Transfer/Direct to Bank</th>
                                                    <th scope="col">Cheque</th>
                                                    <th scope="col">Basketball</th>
                                                    <th scope="col">UnearnedIncome</th>
                                                    <th scope="col">OtherIncome</th>
                                                    <th scope="col">ManagementFee</th>
                                                    <th scope="col">FunctionRoom/ConventionCenter/Events</th>
                                                    <th scope="col">Hotel</th>
                                                    <th scope="col">CommercialSpace</th>
                                                    <th scope="col">OutputVAT</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($list1 as $lists1)
                                                    @if ($lists1->userid == $arrays['userid'])
                                                        <tr>
                                                            <td>{{ $lists1->ornum }}</td>
                                                            <td>{{ $lists1->created_at }}</td>
                                                            <td>{{ $lists1->payee }}</td>
                                                            <td>{{ $lists1->particular }}</td>
                                                        </tr>
                                                    @else
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>






































    <!--Add -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-left display-4" id="exampleModalLabel">Create Finance Proof</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/insert') }}" class="prevent_submit" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <p class="text-left">OR Number : </p>
                                <input type="text" class="form-control" name="ornum"
                                    placeholder="Enter OR Number..." required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="Stockdetails">Payee : </label>
                                <input type="text" class="form-control" name="payee" placeholder="Enter payee..."
                                    required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="Stockdetails">Particular: </label>
                                <select class="form-control" name="particular" required>
                                    <option>Court Rental</option>
                                    <option>Court Rental/League</option>
                                    <option>Venue Rental</option>
                                    <option>Kiosk Rental</option>
                                    <option>Food Stall</option>
                                    <option>Hotel</option>
                                    <option>Hotel Other Charges</option>
                                    <option>Function Room</option>
                                    <option>Function Room/Hotel</option>
                                    <option>Funciton Room/Others</option>
                                    <option>Management Fee</option>
                                    <option>Convention Center</option>
                                    <option>Convention Center/Hot</option>
                                    <option>Zumba</option>
                                    <option>Event Registration</option>
                                    <option>Parking Rental</option>
                                    <option>Commercial Space</option>
                                    <option>Electrical Charge</option>
                                    <option>Space Rental</option>
                                    <option>Other Charges</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="Stockdetails">Debit Type: </label>
                                <select class="form-control" name="debit" placeholder="Enter number..." required>
                                    <option>Cash/GCash</option>
                                    <option>Unearned Income (DP from Previous Months)</option>
                                    <option>Bank Transfer/Direct to Bank</option>
                                    <option>Cheque</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="Stockdetails">Amount: </label>
                                <input type="number" class="form-control" name="amount" placeholder="Enter number..."
                                    required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="Stockdetails">Remarks : </label>
                                <select class="form-control" name="remark" placeholder="Enter number..." required>
                                    <option>DP</option>
                                    <option>BAL</option>
                                    <option>FULL</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="Stockdetails">Event Date: </label>
                                <input type="date" class="form-control" name="eventdate"
                                    placeholder="Enter number..." required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                        <input type="submit" class="btn btn-success prevent_submit" value="Submit" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
