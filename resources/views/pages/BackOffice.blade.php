@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    
<style>
    .row{
        margin-top:20px;
    }
</style>    
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Employee Management</h3>
                            </div>
                            <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Employee ID</th>
                                    <th scope="col">Fullname</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Job Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>123</td>
                                    <td>Danny Phantom</td>
                                    <td>22</td>
                                    <td>Male</td>
                                    <td>Staff</td>
                                    <td>
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">View</button>
                                    </td>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-left display-4" id="exampleModalLabel">Employee Information</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="text-left">Employee ID: </p>
                                                            <input class="form-control" type="text" value="101" readonly>
                                                        </div>
                                                        <div class="col">
                                                            <p class="text-left">Status: </p>
                                                            <input class="form-control" type="text" value="101" readonly>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="text-left">First Name: </p>
                                                            <input class="form-control" type="text" value="101" readonly>
                                                        </div>
                                                        <div class="col">
                                                            <p class="text-left">Middle Name: </p>
                                                            <input class="form-control" type="text" value="101" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="text-left">Last Name: </p>
                                                            <input class="form-control" type="text" value="101" readonly>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <p class="text-left">Suffix: </p>
                                                            <input class="form-control" type="text" value="101" readonly>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="text-left">Job Description: </p>
                                                            <input class="form-control" type="text" value="101" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <p class="text-left">Gender: </p>
                                                            <input class="form-control" type="text" value="101" readonly>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <p class="text-left">Age: </p>
                                                            <input class="form-control" type="text" value="101" readonly>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="text-left">Birth Date: </p>
                                                            <input class="form-control" type="text" value="101" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="text-left">Address: </p>
                                                            <textarea class="form-control" type="text" value="101" readonly></textarea> 
                                                        </div>                               
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="text-left">Contact Number: </p>
                                                            <input class="form-control" type="text" value="101" readonly>
                                                        </div>
                                                        <div class="col">
                                                            <p class="text-left">Marital Status: </p>
                                                            <input class="form-control" type="text" value="101" readonly>
                                                        </div>                               
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-warning" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
                   

            @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush