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
                                <div class = "col">
                                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal" style = "float:right;">
                                            Print
                                    </button>
                                </div>
                                <h2 class="mb-0 title">Guest Receipt</h2>
                                    <div class="row mt-6 group">
                                        <div class="col-3 font-weight-bold">
                                            Guest Name:
                                        </div>
                                        <div class="col-3">
                                            Guest Name
                                        </div>
                                        <div class="col-3 font-weight-bold">
                                            Checked in:
                                        </div>
                                        <div class="col-3">
                                            Jan 1 2023
                                        </div>
                                    </div>
                                        <div class="row mt-4 group">
                                            <div class="col-3 font-weight-bold">
                                                Contact number:
                                            </div>
                                            <div class="col-3">
                                                09876543210
                                            </div>
                                            <div class="col-3 font-weight-bold">
                                                Checked out:
                                            </div>
                                            <div class="col-3">
                                                Jan 2 2023
                                            </div>
                                        </div>
                                            <div class="row mt-4 group">
                                                <div class="col-3 font-weight-bold">
                                                    Room number:
                                                </div>
                                                <div class="col-3">
                                                    11
                                                </div>
                                                <div class="col-3 font-weight-bold">
                                                    Status:
                                                </div>
                                                <div class="col-3">
                                                    Checked in
                                                </div>
                                            </div>
                                                <div class="row mt-4 group">
                                                    <div class="col-3 font-weight-bold">
                                                        Reservation number:
                                                    </div>
                                                    <div class="col-3">
                                                        09090
                                                    </div>
                                                </div>
                                    <hr>
                                    <button type="button" class="btn btn-outline-success mb-4" data-toggle="modal" data-target="#MiscModal" style = "float:right;">
                                            Misc
                                    </button>
                                    <h3 class = "">Transactions</h3>
                                        <div class="row mt-6 group">
                                            <div class="col font-weight-bold">
                                                Date:
                                            </div>
                                            <div class="col font-weight-bold">
                                                Room no./Item
                                            </div>
                                            <div class="col font-weight-bold">
                                                Total
                                            </div>
                                        </div>
                                            <div class="row mt-4 group">
                                                <div class="col">
                                                    Jan 1 2023
                                                </div>
                                                <div class="col">
                                                    Room 11
                                                </div>
                                                <div class="col">
                                                    1500
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row group">
                                                <div class="col-8">
                                                    Total Amount
                                                </div>
                                                <div class="col">
                                                    2,000
                                                </div>
                                            </div>
                                            <a href = "{{ route('Reservation') }}" ><button type="button"class="btn btn-outline-danger mb-4" style = "float:right;">
                                            Close
                                    </button></a>
                            </div>
                        </div>
                    </div>
                    <!-- Misc Modal -->
                    <div class="modal fade" id="MiscModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title" id="exampleModalLabel">Miscellaneous</h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <div class="modal-body">
                                <h4 class = "mt-1">Add Charges</h4>
                                    <div class="row mt-4">
                                        <div class="col">
                                            Application date
                                        </div>
                                            <div class="col">
                                                <input class="form-control" type="text">
                                            </div>
                                    </div>
                                        <div class="row mt-2">
                                                <div class="col">
                                                    Item Type
                                                </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <select class="form-control" id="">
                                                        <option selected disabled value="">Select</option>
                                                            <option>Early check in</option>
                                                            <option>late check out</option>
                                                        </select>
                                                </div>
                                            </div>
                                        </div>
                                            <div class="row mt-2">
                                                <div class="col">
                                                    Time
                                                </div>
                                                    <div class="col">
                                                        <input class="form-control" type="number" minlength = "11">
                                                    </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col">
                                                    Date
                                                </div>
                                                    <div class="col">
                                                        <input class="form-control" type="date">
                                                    </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col">
                                                    Total
                                                </div>
                                                    <div class="col">
                                                        <input class="form-control" type="number">
                                                    </div>
                                            </div>
                                        </div>
                                 
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    /* body{
        font-family:montserrat;
    } */
    @media (max-width: 600px){
        .group{
            white-space: nowrap;
            font-size:10px;
        }
    }
</style>
    @endsection

@push('js')
    
@endpush