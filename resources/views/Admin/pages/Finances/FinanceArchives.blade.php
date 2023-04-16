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
        });
    </script>


    <div class="container-fluid mt--8">
        <div class="row align-items-center py-4">
            <div class="col-lg-12 col-12">
                <h6 class="h2 text-dark d-inline-block mb-0">Finance Archives</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item">Finance</li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">Finance Achives</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-xl">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="row align-items-center">
                                <div class="col-md-12 text-right pt-4 mt-4">
                                    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text"
                                        role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab"
                                                data-toggle="tab" href="#tabs-icons-text-1" role="tab"
                                                aria-controls="tabs-icons-text-1" aria-selected="true">Proof of Payments</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                                                href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
                                                aria-selected="false"> Ofiicial Receipts Archive</a>
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
                                                <th scope="col">Action</th>
                                                <th scope="col">Payment Status</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Gcash Account Name</th>
                                                <th scope="col">Reservation Number</th>
                                                <th scope="col">Guest Name</th>
                                                <th scope="col">Mobile Number</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($list as $lists)
                                                <tr>
                                                    <td>
                                                        <button type="button" data-toggle="modal"
                                                            data-target="#ModalView{{ $lists->id }}"
                                                            class="btn btn-sm btn-primary" title="View Finance">
                                                            <i class="bi bi-eye"></i></button>

                                                    </td>
                                                    <td style = "font-size:16px;">{{ $lists->Payment_Status }}</td>
                                                    <td style = "font-size:16px;">{{ $lists->Payment }}</td>
                                                    <td style = "font-size:16px;">{{ $lists->gcash_account_name }}</td>
                                                    <td style = "font-size:16px;">{{ $lists->Booking_No }}</td>
                                                    <td style = "font-size:16px;">{{ $lists->Guest_Name }}</td>
                                                    <td style = "font-size:16px;">{{ $lists->Mobile_Num }}</td>

                                                </tr>

                                                <!-- Modal -->
                                                <!--View-->
                                                <div class="modal fade text-left" id="ModalView{{ $lists->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalCreate"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-md" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-left display-4"
                                                                    id="exampleModalCreate">View
                                                                    Details</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <p class="text-left">Room Number: </p>
                                                                        <input class="form-control" type="text"
                                                                            value="{{ $lists->Room_No }}" readonly>
                                                                    </div>
                                                                    <div class="col">
                                                                        <p class="text-left">Payment Status: </p>
                                                                        <input class="form-control" type="text"
                                                                            value="{{ $lists->Payment_Status }}" readonly>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <p class="text-left">Guest Name: </p>
                                                                        <input class="form-control" type="text"
                                                                            value="{{ $lists->Guest_Name }}" readonly>
                                                                    </div>
                                                                    <div class="col">
                                                                        <p class="text-left">Mobile Number: </p>
                                                                        <input class="form-control" type="text"
                                                                            value="{{ $lists->Mobile_Num }}" readonly>
                                                                    </div>
                                                                </div>

                                                                @if ($lists->Email != null)
                                                                    <br>
                                                                    <p class="text-left">Email Address: </p>
                                                                    <input class="form-control" type="text"
                                                                        value="{{ $lists->Email }}" readonly>
                                                                @endif

                                                                <br>
                                                                <p class="text-left">Amount: </p>
                                                                <input class="form-control" type="text"
                                                                    value="{{ $lists->Payment }}" readonly>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <p class="text-left">Check In Date: </p>
                                                                        <input class="form-control" type="text"
                                                                            value="{{ date('F j, Y', strtotime($lists->Check_In_Date)) }}"
                                                                            readonly>
                                                                    </div>
                                                                    <div class="col">
                                                                        <p class="text-left">Check Out Date: </p>
                                                                        <input class="form-control" type="text"
                                                                            value="{{ date('F j, Y', strtotime($lists->Check_Out_Date)) }}"
                                                                            readonly>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <p class="text-left">Proof of Payment </p>
                                                                <img src="{{ $lists->Proof_Image }}"
                                                                    class="card-img-top" />
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline-danger"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                            @endforeach
                                        </tbody>
                                    </table>
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
                                                    <th scope="col" style="font-size:18px;">UnearnedIncome</th>
                                                    <th scope="col" style="font-size:18px;">OtherIncome</th>
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
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



            </div>
        </div>
    </div>










    {{-- <div class="row">
        <div class="col-xl">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Proof of Payment</h3>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush" id="Table1">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Action</th>
                                <th scope="col">Payment Status</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Gcash Account Name</th>
                                <th scope="col">Reservation Number</th>
                                <th scope="col">Guest Name</th>
                                <th scope="col">Mobile Number</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($list as $lists)
                                <tr>
                                    <td>
                                        <button type="button" data-toggle="modal"
                                            data-target="#ModalView{{ $lists->id }}" class="btn btn-sm btn-primary"
                                            title="View Finance">
                                            <i class="bi bi-eye"></i></button>

                                    </td>
                                    <td>{{ $lists->Payment_Status }}</td>
                                    <td>{{ $lists->Payment }}</td>
                                    <td>{{ $lists->gcash_account_name }}</td>
                                    <td>{{ $lists->Booking_No }}</td>
                                    <td>{{ $lists->Guest_Name }}</td>
                                    <td>{{ $lists->Mobile_Num }}</td>

                                </tr>
                                <!-- Modal -->
                                <!--View-->
                                <div class="modal fade text-left" id="ModalView{{ $lists->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalCreate" aria-hidden="true">
                                    <div class="modal-dialog modal-md" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-left display-4" id="exampleModalCreate">View
                                                    Details</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <p class="text-left">Room Number: </p>
                                                        <input class="form-control" type="text"
                                                            value="{{ $lists->Room_No }}" readonly>
                                                    </div>
                                                    <div class="col">
                                                        <p class="text-left">Payment Status: </p>
                                                        <input class="form-control" type="text"
                                                            value="{{ $lists->Payment_Status }}" readonly>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col">
                                                        <p class="text-left">Guest Name: </p>
                                                        <input class="form-control" type="text"
                                                            value="{{ $lists->Guest_Name }}" readonly>
                                                    </div>
                                                    <div class="col">
                                                        <p class="text-left">Mobile Number: </p>
                                                        <input class="form-control" type="text"
                                                            value="{{ $lists->Mobile_Num }}" readonly>
                                                    </div>
                                                </div>

                                                @if ($lists->Email != null)
                                                    <br>
                                                    <p class="text-left">Email Address: </p>
                                                    <input class="form-control" type="text"
                                                        value="{{ $lists->Email }}" readonly>
                                                @endif

                                                <br>
                                                <p class="text-left">Amount: </p>
                                                <input class="form-control" type="text" value="{{ $lists->Payment }}"
                                                    readonly>
                                                <br>
                                                <div class="row">
                                                    <div class="col">
                                                        <p class="text-left">Check In Date: </p>
                                                        <input class="form-control" type="text"
                                                            value="{{ date('F j, Y', strtotime($lists->Check_In_Date)) }}"
                                                            readonly>
                                                    </div>
                                                    <div class="col">
                                                        <p class="text-left">Check Out Date: </p>
                                                        <input class="form-control" type="text"
                                                            value="{{ date('F j, Y', strtotime($lists->Check_Out_Date)) }}"
                                                            readonly>
                                                    </div>
                                                </div>
                                                <br>
                                                <p class="text-left">Proof of Payment </p>
                                                <img src="{{ $lists->Proof_Image }}" class="card-img-top" />
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-danger"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                </div>
            </div>

            <!--Table Continue-->
            </tbody>
            @endforeach
            </table>
        </div>
    </div>
    </div>
    </div>
    </div>


    </div>
    </div> --}}

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
    <script>
        $.noConflict();
        jQuery(document).ready(function($) {
            $('#Table1').DataTable();
        });
    </script>
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

        p {
            font-family: sans-serif;
        }
    </style>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
