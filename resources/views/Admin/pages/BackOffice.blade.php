@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    
<style>
    .row{
        margin-top:20px;
    }
</style>    
    <div class="container-fluid mt--7">
        <!--Employee Management-->
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

        <!--Rate Management-->
        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Rate Management</h3>
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
                                    <th scope="col">Room ID</th>
                                    <th scope="col">Room ID</th>
                                    <th scope="col">Room ID</th>
                                    <th scope="col">Room ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Sample Data</td>
                                    <td>Sample Data</td>
                                    <td>Sample Data</td>
                                    <td>
                                        <!--<i class="fas fa-arrow-up text-success mr-3"></i> 46,53%-->
                                        Sample Data
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sample Data</td>
                                    <td>Sample Data</td>
                                    <td>Sample Data</td>
                                    <td>
                                        <!--<i class="fas fa-arrow-up text-success mr-3"></i> 46,53%-->
                                        Sample Data
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!--Profit-->
        <div class="row">
            <div class="col-xl">
                <div class="card bg-gradient-white shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-black mb-0">Profit</h2>
                            </div>
                            <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="$" data-suffix="k">
                                        <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                                            <span class="d-none d-md-block">Month</span>
                                            <span class="d-md-none">M</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}' data-prefix="$" data-suffix="k">
                                        <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                                            <span class="d-none d-md-block">Week</span>
                                            <span class="d-md-none">W</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="chart-sales" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          
        <!--Revenue, Expenses and Net Profit-->
        <div class="row">
            <div class="col">
                <div class="card" style="border: 1px solid black; margin-top:10px;">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase text-muted mb-0">Revenue</h5>
                        <span class="h2 font-weight-bold mb-0">2,356</span>         
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="border: 1px solid black; margin-top:10px;">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase text-muted mb-0">Expenses</h5>
                        <span class="h2 font-weight-bold mb-0">2,356</span>         
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="border: 1px solid black; margin-top:10px;">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase text-muted mb-0">Net Profit</h5>
                        <span class="h2 font-weight-bold mb-0">2,356</span>         
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