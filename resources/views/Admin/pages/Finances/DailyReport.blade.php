@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="col">

                                    </a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModal" style="float:right;">
                                        Add Finance
                                    </button>
                                </div>
                                <h3 class="mb-0">Finance</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush" style="align-items:center">
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
                                        <td>{{ $lists->dateadded }}</td>
                                        <td>{{ $lists->payee }}</td>
                                        <td>{{ $lists->particular }}</td>
                                        <td>{{ $lists->eventdate }}</td>
                                        <td>{{ $lists->amount }}</td>
                                        <td>{{ $lists->remark }}</td>
                                        <td>{{ $lists->debittype }}</td>
                                        <td>
                                            <button type="button" data-toggle="modal"
                                                data-target="#ModalView{{ $lists->userid }}" class="btn btn-primary"><i
                                                    class="bi bi-eye" style="padding:2px;">View</i></button>
                                            <button type="button" data-toggle="modal"
                                                data-target="#ModalUpdate{{ $lists->userid }}" class="btn btn-primary"><i
                                                    class="bi bi-pencil-square"style="padding:2px;">Edit</i></button>
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <!--View-->
                                    <div class="modal fade text-left" id="ModalView{{ $lists->userid }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalCreate" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
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
                                                    <table class="table align-items-center table-flush"
                                                        style="align-items:center">
                                                        <thead class="thead-light">
                                                            <col>
                                                            <col>
                                                            <colgroup span="4"></colgroup>
                                                            <tr>
                                                                <th scope="col">OR No.</th>
                                                                <th scope="col">Date</th>
                                                                <th scope="col">Payee</th>
                                                                <th scope="col">Particulars</th>
                                                                <th scope="col">Event Date</th>
                                                                <th scope="col">Amount</th>
                                                                <th scope="col">Remarks</th>
                                                                <th colspan="4" scope="colgroup">Debit Type</th>
                                                                <th scope="col">Cash/GCash</th>
                                                                <th scope="col">Unearned Income</th>
                                                                <th scope="col">Bank Transfer/Direct to Bank</th>
                                                                <th scope="col">Cheque</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            @foreach ($list as $lists)
                                                                <tr>
                                                                    <td>{{ $lists->ornum }}</td>
                                                                    <td>{{ $lists->dateadded }}</td>
                                                                    <td>{{ $lists->payee }}</td>
                                                                    <td>{{ $lists->particular }}</td>
                                                                    <td>{{ $lists->eventdate }}</td>
                                                                    <td>{{ $lists->amount }}</td>
                                                                    <td>{{ $lists->remark }}</td>
                                                                    <td>{{ $lists->debit }}</td>
                                                                </tr>
                                                        </tbody>
                                                    </table>

                                                    </html>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-failed"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Modal Edit-->
                                    <div class="modal fade text-left" id="ModalUpdate{{ $lists->userid }}" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h2 class="modal-title">{{ __('Edit Details') }}</h2>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="{{ url('/update_info') }}"
                                                    enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <p class="text-left">User ID: </p>
                                                                <input class="form-control" type="text"
                                                                    value="{{ $lists->userid }}" readonly>
                                                                <input class="form-control" type="text" name="userid"
                                                                    value="{{ $lists->userid }}" hidden>
                                                            </div>
                                                            <div class="col">
                                                                <p class="text-left">OR Number: </p>
                                                                <input type="text" class="form-control" name="ornum"
                                                                    value="{{ $lists->ornum }}" required>
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
                                                            <select class="form-control" value="{{ $lists->particular }}"
                                                                name="status" required>
                                                                <option>Requesting</option>
                                                                <option>Paid</option>
                                                                <option>Unpaid</option>
                                                            </select>

                                                            <label for="Stockdetails">Event Date: </label>
                                                            <input type="text" class="form-control" name="eventdate"
                                                                value="{{ $lists->eventdate }}" required>

                                                            <label for="Stockdetails">Debit Type: </label>
                                                            <input type="text" class="form-control" name="debit"
                                                                value="{{ $lists->debit }}" required>

                                                            <label for="Stockdetails">Remarks : </label>
                                                            <input type="text" class="form-control" name="remark"
                                                                value="{{ $lists->remark }}" >

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

                                    <!--Table Continue-->
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
                <form action="{{ url('/addinfo') }}" class="prevent_submit" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <p class="text-left">OR Number : </p>
                                <input type="text" class="form-control" name="or" placeholder="Enter name..."
                                    required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="Stockdetails">Payee : </label>
                                <input type="email" class="form-control" name="payee" placeholder="Enter details..."
                                    required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="Stockdetails">Particular: </label>
                                <input type="number" class="form-control" name="particular"
                                    placeholder="Enter number..." required>
                                <select class="form-control" value="{{ $lists->status }}" name="status" required>
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
                                <input type="number" class="form-control" name="eventdate"
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
