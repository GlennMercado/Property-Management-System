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
                                    <!-- <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal" style = "float:right;">
                                            Add Stock
                                    </button> -->
                                </div>
                                <h3 class="mb-0 title">Reservation</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush datatable datatable-Stock">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Status</th>
                                    <th scope="col">Reservation no</th>
                                    <th scope="col">Guest name</th>
                                    <th scope="col">Room no</th>
                                    <th scope="col">Cleaning status</th>
                                    <th scope="col">check in</th>
                                    <th scope="col">Check out</th>
                                    <th scope="col">Guest Folio</th>
                                    <th scope="col">Action</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Check in</td>
                                    <td>09090</td>
                                    <td>Guest name</td>
                                    <td>11</td>
                                    <td>Cleaned</td>
                                    <td>Jan 1, 2023</td>
                                    <td>2.000.00</td>
                                    <td><a href = "{{ route('GuestFolio') }}">View</a></td>
                                    <td>
                                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#EditModal"><i class="bi bi-pencil-square"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Edit modal -->
                    <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-6">
                                        <p>Cleaning status</p>
                                        <div class="form-group">
                                            <select class="form-control" id="">
                                            <option selected disabled value="">Cleaned</option>
                                                <option>Out of Order</option>
                                                <option>Out of Service</option>
                                            </select>
                                        </div>
                                    </div>
                                        <div class="col-6">
                                            <p>Check out</p>
                                            <div class="form-group">
                                            <select class="form-control" id="">
                                            <option selected disabled value="">Select</option>
                                                <option>Paid</option>
                                                <option>pending</option>
                                            </select>
                                        </div>
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
                        <!-- view modal -->
                        <!-- <div class="modal fade" id="View" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered " role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Guest receipt</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                                </div>
                            </div>
                            </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection

@push('js')
    
@endpush