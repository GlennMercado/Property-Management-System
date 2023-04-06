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

    <div class="container-fluid mt--8">
        <div class="row align-items-center py-4">
            <div class="col-lg-12 col-12">
                <h6 class="h2 text-dark d-inline-block mb-0">Daily Report</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item">Finance</li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">Daily Report</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-xl">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="col-md-12 position-absolute container-fluid d-flex justify-content-end">
                                <button type="button" class="btn btn-outline-primary mb-4" data-toggle="modal"
                                    data-target="#exampleModal">
                                    Add
                                </button>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-md-12 text-right pt-4 mt-4">
                                    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text"
                                        role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab"
                                                data-toggle="tab" href="#tabs-icons-text-1" role="tab"
                                                aria-controls="tabs-icons-text-1" aria-selected="true">Official
                                                Receipt</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                                                href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
                                                aria-selected="false"> Daily
                                                Report </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab"
                                                href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3"
                                                aria-selected="false"> Monthly
                                                Report</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Start of Cards-->
                <div class="container">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="tab-content" id="myTabContent">
                                {{-- ORs --}}
                                <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-1-tab">
                                    
                                    <table class="table align-items-center table-flush" style="align-items:center"
                                        id="myTable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">OR No.</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Payee</th>
                                                <th scope="col">Particulars</th>
                                                <th scope="col">Event Date</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Remarks</th>
                                                <th scope="col">Debit Type</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($list as $lists)
                                                <tr>
                                                    <td>{{ $lists->ornum }}</td>
                                                    <td>{{ $lists->created_at }}</td>
                                                    <td>{{ $lists->payee }}</td>
                                                    <td>{{ $lists->particular }}</td>
                                                    <td>{{ $lists->eventdate }}</td>
                                                    <td>{{ $lists->amount }}</td>
                                                    <td>{{ $lists->remark }}</td>
                                                    <td>{{ $lists->debit }}</td>
                                                </tr>
                                            @endforeach
                                                <tfoot>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>io</td>
                                                    <td value="amountsum"></td>
                                                    <td></td>
                                                    <td></td>
                                                </tfoot>
                                          </tbody>
                                    </table>
                                    <!-- Modal -->
                                    <!--View-->
                                </div>
                                {{-- Daily Report --}}
                                <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-2-tab">
                                    <div class="table-responsive">
                                        <table class="table align-items-center table-flush" id="myTables">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th colspan="4" style="font-size:18px;">Debit</th>
                                                    <th colspan="8" style="font-size:18px;">Credit</th>
                                                </tr>
                                                <tr>
                                                    <th scope="col">OR Number</th>
                                                    <th scope="col">Payee</th>
                                                    <th scope="col">Cash/GCash</th>
                                                    <th scope="col">Unearned Income</th>
                                                    <th scope="col">Bank Transfer/Direct to Bank</th>
                                                    <th scope="col">Cheque</th>
                                                    <th scope="col">Basketball</th>
                                                    <th scope="col">UnearnedIncome</th>
                                                    <th scope="col">OtherIncome</th>
                                                    <th scope="col">Parking Ticket/Parking Rent</th>
                                                    <th scope="col">ManagementFee</th>
                                                    <th scope="col">FunctionRoom/ConventionCenter/Events
                                                    <th scope="col">Hotel</th>
                                                    <th scope="col">Commercial Spaces</th>
                                                    <th scope="col">Output VAT</th>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($list2 as $lists2)
                                                <tr>
                                                    <td>{{ $lists2->ornum }}</td>
                                                    <td>{{ $lists2->payee }}</td>
                                                    <td>{{ $lists2->cash }}</td>
                                                    <td>{{ $lists2->unearned }}</td>
                                                    <td>{{ $lists2->bank }}</td>
                                                    <td>{{ $lists2->cheque }}</td>
                                                    <td>{{ $lists2->basketball }}</td>
                                                    <td>{{ $lists2->unearned }}</td>
                                                    <td>{{ $lists2->otherincome }}</td>
                                                    <td>{{ $lists2->parking }}</td>
                                                    <td>{{ $lists2->managementfee }}</td>
                                                    <td>{{ $lists2->event }}</td>
                                                    <td>{{ $lists2->hotel }}</td>
                                                    <td>{{ $lists2->commercialspace }}</td>
                                                    <td></td>


                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
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
                                                    <th scope="col">Parking</th>
                                                    <th scope="col">ManagementFee</th>
                                                    <th scope="col">FunctionRoom/ConventionCenter/Events</th>
                                                    <th scope="col">Hotel</th>
                                                    <th scope="col">CommercialSpace</th>
                                                    <th scope="col">OutputVAT</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($list3 as $lists3)
                                                <tr>
                                                    <td></td>
                                                    <td>{{ $lists3->created_at }}</td>
                                                    <td>{{ $lists3->payee }}</td>
                                                    <td>{{ $lists3->particular }}</td>
                                                    <td>{{ $lists3->eventdate }}</td>
                                                    <td>{{ $lists3->amount }}</td>
                                                    <td>{{ $lists3->remark }}</td>
                                                    <td>{{ $lists3->debit }}</td>
                                                    <td>{{ $lists3->debit }}</td>
                                                    <td>{{ $lists3->debit }}</td>
                                                    <td>{{ $lists3->debit }}</td>
                                                    <td>{{ $lists3->debit }}</td>
                                                    <td>{{ $lists3->debit }}</td>
                                                    <td>{{ $lists3->debit }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!--Add -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-left display-4" id="exampleModalLabel">
                                                    Daily
                                                    Report</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ url('/insertfinance') }}" class="prevent_submit"
                                                method="POST">
                                                {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md">
                                                            <label class="text-left">Official Receipt Number </label>
                                                            <input type="number" class="form-control" name="ornum"
                                                                onKeyPress="if(this.value.length==15) return false;"
                                                                placeholder="Enter OR Number..." required>
                                                        </div>
                                                        <div class="col-md">
                                                            <label for="Stockdetails">Payee </label>
                                                            <input type="text" class="form-control" name="payee"
                                                                maxlength="32" placeholder="Enter Name..." required>
                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md pt-2">
                                                            <label for="Stockdetails">Particular </label>
                                                            <select class="form-control" name="particular" required>
                                                                <option value="CourtRental">CourtRental</option>
                                                                <option value="CourtRental/League">CourtRental/League
                                                                </option>
                                                                <option value="Venue Rental">Venue Rental</option>
                                                                <option value="Kiosk Rental">Kiosk Rental</option>
                                                                <option value="Foodstall">FoodStall</option>
                                                                <option value="Hotel">Hotel</option>
                                                                <option value="Hotel Other Charges">Hotel Other Charges
                                                                </option>
                                                                <option value="Function Room">Function Room</option>
                                                                <option value="Function Room/Hotel">Function Room/Hotel
                                                                </option>
                                                                <option value="Function Room/Others">Function
                                                                    Room/Others
                                                                </option>
                                                                <option value="Management Fee">Management Fee</option>
                                                                <option value="Convention Center">Convention Center
                                                                </option>
                                                                <option value="Convention Center/Hot">Convention
                                                                    Center/Hot
                                                                </option>
                                                                <option value="Zumba">Zumba</option>
                                                                <option value="Event Registration">Event Registration
                                                                </option>
                                                                <option value="Parking Rental">Parking Rental</option>
                                                                <option value="Commercial Space">Commercial Space
                                                                </option>
                                                                <option value="Electrical Charge">Electrical Charge
                                                                </option>
                                                                <option value="Space Rental">Space Rental</option>
                                                                <option value="Other Charges">Other Charges</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md pt-2">
                                                            <label for="Stockdetails">Debit Type </label>
                                                            <select class="form-control" name="debit"
                                                                placeholder="Enter number..." required>
                                                                <option value="Cash">Cash/GCash</option>
                                                                <option value="Unearned">Unearned Income (DP from
                                                                    Previous
                                                                    Months)</option>
                                                                <option value="Bank">Bank Transfer/Direct to Bank
                                                                </option>
                                                                <option value="Cheque">Cheque</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md pt-2">
                                                            <label for="Stockdetails">Amount: </label>
                                                            <input type="number" class="form-control" name="amount"
                                                                step="0.01" placeholder="Enter number..."
                                                                onKeyPress="if(this.value.length==6) return false;"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md pt-2">
                                                            <label for="Stockdetails">Remarks </label>
                                                            <select class="form-control" name="remark" required>
                                                                <option>DP</option>
                                                                <option>BAL</option>
                                                                <option>FULL</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md pt-2">
                                                            <label for="Stockdetails">Event Date: </label>
                                                            <input type="datetime-local" class="form-control"
                                                                name="eventdate" required>
                                                            <input type="hidden" name="cash" value="1">
                                                            <input type="hidden" name="unearned" value="1" hidden>
                                                            <input type="hidden" name="bank" value="1" hidden>
                                                            <input type="hidden" name="cheque" value="1" hidden>
                                                            <input type="hidden" name="basketball" value="1"
                                                                hidden>
                                                            <input type="hidden" name="otherincome" value="1"
                                                                hidden>
                                                            <input type="hidden" name="parking" value="1" hidden>
                                                            <input type="hidden" name="managementfee" value="1"
                                                                hidden>
                                                            <input type="hidden" name="events" value="1" hidden>
                                                            <input type="hidden" name="hotel" value="1" hidden>
                                                            <input type="text" name="commercialspace" value="1"
                                                                hidden>
                                                            <input type="text" name="ouputvat" value="1" hidden>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type = "button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                                                    <input type="submit" class="btn btn-success prevent_submit"
                                                        value="Submit" />
                                                </div>
                                            </form>
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
        /* disable arrows input type number */
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }

        .title {
            text-transform: uppercase;
            font-size: 20px;
            letter-spacing: 2px;
        }
    </style>

   
    
    </div>

    
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
