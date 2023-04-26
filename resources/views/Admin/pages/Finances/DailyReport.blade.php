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

                    <!-- Count Box -->
                    <div class="row mt-3" style="align-items:center;justify-content:center">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body rounded" style="background-color:#2AD587;">
                                    <h2 class="text-secondary mx-auto d-flex justify-content-center text-sm">
                                        Daily OR Count :
                                    </h2>
                                    <h1 class="text-secondary mx-auto d-flex justify-content-center mt-2">
                                        {{ $daily_count }}
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body rounded" style="background-color:#34C99D;">
                                    <h2 class="text-secondary mx-auto d-flex justify-content-center text-sm">
                                        Monthly OR Count :
                                    </h2>
                                    <h1 class="text-secondary mx-auto d-flex justify-content-center mt-2">
                                        {{ $monthly_count }}
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="col-md-12 position-absolute container-fluid d-flex justify-content-end">
                                <button type="button" class="btn btn-outline-primary mb-4 fa fa-plus" data-toggle="modal"
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
                                                aria-selected="false"> Daily Report </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab"
                                                href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3"
                                                aria-selected="false"> Monthly Report</a>
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
                            {{-- ORs --}}
                            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                                aria-labelledby="tabs-icons-text-1-tab">

                                <table class="table align-items-center table-flush" style="align-items:center"
                                    id="myTable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" style="font-size:18px;">OR No.</th>
                                            <th scope="col" style="font-size:18px;">Date</th>
                                            <th scope="col" style="font-size:18px;">Payee</th>
                                            <th scope="col" style="font-size:18px;">Particulars</th>
                                            <th scope="col" style="font-size:18px;">Event Date</th>
                                            <th scope="col" style="font-size:18px;">Amount</th>
                                            <th scope="col" style="font-size:18px;">Remarks</th>
                                            <th scope="col" style="font-size:18px;">Debit Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list4 as $lists4)
                                            <tr>
                                                <td style = "font-size:16px;">{{ $lists4->ornum }}</td>
                                                <td style = "font-size:16px;">{{ $lists4->created_at }}</td>
                                                <td style = "font-size:16px;">{{ $lists4->payee }}</td>
                                                <td style = "font-size:16px;">{{ $lists4->particular }}</td>
                                                <td style = "font-size:16px;">{{ $lists4->eventdate }}</td>
                                                <td style = "font-size:16px;">₱ {{ $lists4->amount }}</td>
                                                <td style = "font-size:16px;">{{ $lists4->remark }}</td>
                                                <td style = "font-size:16px;">{{ $lists4->debit }}</td>
                                            </tr>
                                        @endforeach
                                    <tfoot>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td style = "font-size:16px;">Total:</td>
                                        <td style = "font-size:16px;">{{ $amount_sum }}</td>
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
                                                <th scope="col" style="font-size:18px;">OR Number</th>
                                                <th scope="col" style="font-size:18px;">Payee</th>
                                                <th scope="col" style="font-size:18px;">Cash/GCash</th>
                                                <th scope="col" style="font-size:18px;">Unearned Income</th>
                                                <th scope="col" style="font-size:18px;">Bank Transfer/Direct to Bank</th>
                                                <th scope="col" style="font-size:18px;">Cheque</th>
                                                <th scope="col" style="font-size:18px;">Basketball</th>
                                                <th scope="col" style="font-size:18px;">Unearned Income</th>
                                                <th scope="col" style="font-size:18px;">Other Income</th>
                                                <th scope="col" style="font-size:18px;">Parking Ticket/Parking Rent</th>
                                                <th scope="col" style="font-size:18px;">ManagementFee</th>
                                                <th scope="col" style="font-size:18px;">FunctionRoom/ConventionCenter/Events
                                                <th scope="col" style="font-size:18px;">Hotel</th>
                                                <th scope="col" style="font-size:18px;">Commercial Spaces</th>
                                                <th scope="col" style="font-size:18px;">Output VAT</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($list2 as $lists2)
                                                <tr>
                                                    <td style = "font-size:16px;">{{ $lists2->ornum }}</td>
                                                    <td style = "font-size:16px;">{{ $lists2->payee }}</td>
                                                    <td style = "font-size:16px;">{{ $lists2->cash }}</td>
                                                    <td style = "font-size:16px;">{{ $lists2->unearned }}</td>
                                                    <td style = "font-size:16px;">{{ $lists2->bank }}</td>
                                                    <td style = "font-size:16px;">{{ $lists2->cheque }}</td>
                                                    <td style = "font-size:16px;">{{ $lists2->basketball }}</td>
                                                    <td style = "font-size:16px;">{{ $lists2->unearned }}</td>
                                                    <td style = "font-size:16px;">{{ $lists2->otherincome }}</td>
                                                    <td style = "font-size:16px;">{{ $lists2->parking }}</td>
                                                    <td style = "font-size:16px;">{{ $lists2->managementfee }}</td>
                                                    <td style = "font-size:16px;">{{ $lists2->event }}</td>
                                                    <td style = "font-size:16px;">{{ $lists2->hotel }}</td>
                                                    <td style = "font-size:16px;">{{ $lists2->commercialspace }}</td>
                                                    <td style = "font-size:16px;">{{ $lists2->outputvat }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <td></td>
                                            <td style = "font-size:16px;">Total: </td>
                                            <td style = "font-size:16px;">{{ $cash_sum2 }}</td>
                                            <td style = "font-size:16px;">{{ $unearned_sum2 }}</td>
                                            <td style = "font-size:16px;">{{ $bank_sum2 }}</td>
                                            <td style = "font-size:16px;">{{ $cheque_sum2 }}</td>
                                            <td style = "font-size:16px;">{{ $basketball_sum2 }}</td>
                                            <td style = "font-size:16px;">{{ $unearned_sum2 }}</td>
                                            <td style = "font-size:16px;">{{ $otherincome_sum2 }}</td>
                                            <td style = "font-size:16px;">{{ $parking_sum2 }}</td>
                                            <td style = "font-size:16px;">{{ $managementfee_sum2 }}</td>
                                            <td style = "font-size:16px;">{{ $event_sum2 }}</td>
                                            <td style = "font-size:16px;">{{ $hotel_sum2 }}</td>
                                            <td style = "font-size:16px;">{{ $commercialspace_sum2 }}</td>
                                            <td style = "font-size:16px;">{{ $output_sum2 }}</td>
                                        </tfoot>
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
                                                <th scope="col" style="font-size:18px;">Action</th>
                                                <th scope="col" style="font-size:18px;">Payee</th>
                                                <th scope="col" style="font-size:18px;">Cash/GCash</th>
                                                <th scope="col" style="font-size:18px;">Unearned Income</th>
                                                <th scope="col" style="font-size:18px;">Bank Transfer/Direct to Bank</th>
                                                <th scope="col" style="font-size:18px;">Cheque</th>
                                                <th scope="col" style="font-size:18px;">Basketball</th>
                                                <th scope="col" style="font-size:18px;">Unearned Income</th>
                                                <th scope="col" style="font-size:18px;">Other Income</th>
                                                <th scope="col" style="font-size:18px;">Parking</th>
                                                <th scope="col" style="font-size:18px;">ManagementFee</th>
                                                <th scope="col" style="font-size:18px;">FunctionRoom/ConventionCenter/Events</th>
                                                <th scope="col" style="font-size:18px;">Hotel</th>
                                                <th scope="col" style="font-size:18px;">CommercialSpace</th>
                                                <th scope="col" style="font-size:18px;">OutputVAT</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($list3 as $lists3)
                                                <tr>
                                                    {{-- Invoice --}}
                                                    <td style = "font-size:16px;"><a href="{{ url('/invoice', ['id' => $lists->Room_No, 'bn' => $lists->Booking_No]) }}"
                                                        target="blank" class="btn btn-sm btn-success"
                                                        style="cursor:pointer;" title="Invoice">
                                                        <i class="bi bi-file-earmark-text"></i>
                                                    </a></td>
                                                    <td style = "font-size:16px;">{{ $lists3->payee }}</td>
                                                    <td style = "font-size:16px;">{{ $lists3->cash }}</td>
                                                    <td style = "font-size:16px;">{{ $lists3->unearned }}</td>
                                                    <td style = "font-size:16px;">{{ $lists3->bank }}</td>
                                                    <td style = "font-size:16px;">{{ $lists3->cheque }}</td>
                                                    <td style = "font-size:16px;">{{ $lists3->basketball }}</td>
                                                    <td style = "font-size:16px;">{{ $lists3->unearned }}</td>
                                                    <td style = "font-size:16px;">{{ $lists3->otherincome }}</td>
                                                    <td style = "font-size:16px;">{{ $lists3->parking }}</td>
                                                    <td style = "font-size:16px;">{{ $lists3->managementfee }}</td>
                                                    <td style = "font-size:16px;">{{ $lists3->event }}</td>
                                                    <td style = "font-size:16px;">{{ $lists3->hotel }}</td>
                                                    <td style = "font-size:16px;">{{ $lists3->commercialspace }}</td>
                                                    <td style = "font-size:16px;">{{ $lists3->outputvat }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <td></td>
                                            <td style = "font-size:16px;">Total: </td>
                                            <td style = "font-size:16px;">{{ $cash_sum3 }}</td>
                                            <td style = "font-size:16px;">{{ $unearned_sum3 }}</td>
                                            <td style = "font-size:16px;">{{ $bank_sum3 }}</td>
                                            <td style = "font-size:16px;">{{ $cheque_sum3 }}</td>
                                            <td style = "font-size:16px;">{{ $basketball_sum3 }}</td>
                                            <td style = "font-size:16px;">{{ $unearned_sum3 }}</td>
                                            <td style = "font-size:16px;">{{ $otherincome_sum3 }}</td>
                                            <td style = "font-size:16px;">{{ $parking_sum3 }}</td>
                                            <td style = "font-size:16px;">{{ $managementfee_sum3 }}</td>
                                            <td style = "font-size:16px;">{{ $event_sum3 }}</td>
                                            <td style = "font-size:16px;">{{ $hotel_sum3 }}</td>
                                            <td style = "font-size:16px;">{{ $commercialspace_sum3 }}</td>
                                            <td style = "font-size:16px;">{{ $output_sum3 }}</td>
                                        </tfoot>
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
                                                            <option selected disabled value>Select</option>
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
                                                        <select class="form-control" name="debit" required>
                                                            <option selected disabled value>Select</option>
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
                                                            onKeyPress="if(this.value.length==6) return false;" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md pt-2">
                                                        <label for="Stockdetails">Remarks </label>
                                                        <select class="form-control" name="remark" required>
                                                            <option selected disabled value>Select</option>
                                                            <option>DP(Downpayment)</option>
                                                            <option>BAL(Balance)</option>
                                                            <option>FULL(Full Payment)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md pt-2">
                                                        <label for="Stockdetails">Event Date: </label>
                                                        <input type="date" class="form-control" name="eventdate"
                                                            required>
                                                        <input type="hidden" name="cash" value="1">
                                                        <input type="hidden" name="unearned" value="1" hidden>
                                                        <input type="hidden" name="bank" value="1" hidden>
                                                        <input type="hidden" name="cheque" value="1" hidden>
                                                        <input type="hidden" name="basketball" value="1" hidden>
                                                        <input type="hidden" name="otherincome" value="1" hidden>
                                                        <input type="hidden" name="parking" value="1" hidden>
                                                        <input type="hidden" name="managementfee" value="1" hidden>
                                                        <input type="hidden" name="events" value="1" hidden>
                                                        <input type="hidden" name="hotel" value="1" hidden>
                                                        <input type="text" name="commercialspace" value="1"
                                                            hidden>
                                                        <input type="text" name="ouputvat" value="1" hidden>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-danger"
                                                    data-dismiss="modal">Close</button>
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
{{-- /table size
archives
partiocular
updated_At --}}