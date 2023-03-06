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
                                                <th scope="col">Date</th>
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
                                                    <td>{{ $lists->created_at }}</td>
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
                                    <!-- Modal -->
                                    <!--View-->

                                </div>
                                {{-- Daily Report --}}
                                <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-2-tab">
                                    <!-- Projects table -->
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
                                            @foreach ($list as $lists)
                                                <tr>
                                                <td>{{ $lists->ornum }}</td>
                                                <td>{{ $lists->payee }}</td>
                                                    <td>{{ $lists->cash }}</td>
                                                    <td>{{ $lists->unearned }}</td>
                                                    <td>{{ $lists->bank }}</td>
                                                    <td>{{ $lists->cheque }}</td>
                                                    <td>{{ $lists->basketball }}</td>
                                                    <td>{{ $lists->unearned }}</td>
                                                    <td>{{ $lists->otherincome }}</td>
                                                    <td>{{ $lists->parking }}</td>
                                                    <td>{{ $lists->managementfee }}</td>
                                                    <td>{{ $lists->event }}</td>
                                                    <td>{{ $lists->hotel }}</td>
                                                    <td>{{ $lists->commercialspace }}</td>
                                                    <td>{{ $lists->outputvat }}</td>
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
                                            @foreach ($list as $lists)
                                                <tr>
                                                    <td>{{ $lists->particular }}</td>
                                                    <td>{{ $lists->cash }}</td>
                                                    <td>{{ $lists->unearned }}</td>
                                                    <td>{{ $lists->bank }}</td>
                                                    <td>{{ $lists->cheque }}</td>
                                                    <td>{{ $lists->basketball }}</td>
                                                    <td>{{ $lists->unearned }}</td>
                                                    <td>{{ $lists->otherincome }}</td>
                                                    <td>{{ $lists->parking }}</td>
                                                    <td>{{ $lists->managementfee }}</td>
                                                    <td>{{ $lists->event }}</td>
                                                    <td>{{ $lists->hotel }}</td>
                                                    <td>{{ $lists->commercialspace }}</td>
                                                    <td>{{ $lists->outputvat }}</td>
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
                                                <h5 class="modal-title text-left display-4" id="exampleModalLabel">Daily
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
                                                        <div class="col">
                                                            <p class="text-left">OR Number : </p>
                                                            <input type="number" class="form-control" name="ornum"
                                                                placeholder="Enter OR Number..." required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Stockdetails">Payee : </label>
                                                            <input type="text" class="form-control" name="payee"
                                                                placeholder="Enter payee..." required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Stockdetails">Particular: </label>
                                                            <select class="form-control" name="particular" required>
                                                                <option value="CourtRental">CourtRental</option>
                                                                <option value="CourtRental/League">CourtRental/League
                                                                </option>
                                                                <option value="VenueR ental">Venue Rental</option>
                                                                <option value="Kiosk Rental">Kiosk Rental</option>
                                                                <option value="Foodstall">FoodStall</option>
                                                                <option value="Hotel">Hotel</option>
                                                                <option value="Hotel Other Charges">Hotel Other Charges
                                                                </option>
                                                                <option value="Function Room">Function Room</option>
                                                                <option value="Functon Room/Hotel">Function Room/Hotel
                                                                </option>
                                                                <option value="Funciton Room/Others">Funciton Room/Others
                                                                </option>
                                                                <option value="Management Fee">Management Fee</option>
                                                                <option value="Convention Center">Convention Center
                                                                </option>
                                                                <option value="Convention Center/Hot">Convention Center/Hot
                                                                </option>
                                                                <option value="Zumba">Zumba</option>
                                                                <option value="Event Registration">Event Registration
                                                                </option>
                                                                <option value="Parking Rental">Parking Rental</option>
                                                                <option value="Commercial Space">Commercial Space</option>
                                                                <option value="Electrical Charge">Electrical Charge
                                                                </option>
                                                                <option value="Space Rental">Space Rental</option>
                                                                <option value="Other Charges">Other Charges</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Stockdetails">Debit Type: </label>
                                                            <select class="form-control" name="debit"
                                                                placeholder="Enter number..." required>
                                                                <option value="Cash">Cash/GCash</option>
                                                                <option value="Unearned">Unearned Income (DP from Previous
                                                                    Months)</option>
                                                                <option value="Bank">Bank Transfer/Direct to Bank
                                                                </option>
                                                                <option value="Cheque">Cheque</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Stockdetails">Amount: </label>
                                                            <input type="number" class="form-control" name="amount" step="0.01"
                                                                placeholder="Enter number..." required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Stockdetails">Remarks : </label>
                                                            <select class="form-control" name="remark" required>
                                                                <option>DP</option>
                                                                <option>BAL</option>
                                                                <option>FULL</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Stockdetails">Event Date: </label>
                                                            <input type="datetime-local" class="form-control" name="eventdate" required>
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
                                                    <a class="btn btn-secondary" data-dismiss="modal">Close</a>
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
            @endsection

            @push('js')
                <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
                <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
            @endpush
