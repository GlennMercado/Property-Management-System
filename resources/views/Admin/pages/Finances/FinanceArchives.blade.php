@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
   

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
        <div class="row">
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
    </div>

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
