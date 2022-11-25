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
                                <h3 class="mb-0">Room Management</h3>
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
                                    <th scope="col">Room</th>
                                    <th scope="col">Room Type</th>
                                    <th scope="col">Housekeeping Status</th>
                                    <th scope="col">Priority</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>101</td>
                                    <td>Family Room</td>
                                    <td>
                                        <select class="form-control" value="" style="width:auto;">
                                            <option value="Available">Available</option>
                                            <option value="Dirty">Dirty</option>
                                            <option value="Checked">Checked</option>
                                            <option value="Cleaning">Cleaning</option>
                                            <option value="Out of Service">Out of Service</option>
                                            <option value="Out of Order">Out of Order</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" style="width:auto;">
                                            <option value="Low">Low</option>
                                            <option value="Moderate">Moderate</option>
                                            <option value="High">High</option>
                                            <option value="Top Priority">Top Priority</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>102</td>
                                    <td>Single Room</td>
                                    <td>
                                        <select class="form-control" value="" style="width:auto;">
                                            <option value="Available">Available</option>
                                            <option value="Dirty">Dirty</option>
                                            <option value="Checked">Checked</option>
                                            <option value="Cleaning">Cleaning</option>
                                            <option value="Out of Service">Out of Service</option>
                                            <option value="Out of Order">Out of Order</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" style="width:auto;">
                                            <option value="Low">Low</option>
                                            <option value="Moderate">Moderate</option>
                                            <option value="High">High</option>
                                            <option value="Top Priority">Top Priority</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card" style="border: 2px solid black; margin-top:10px;">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase text-muted mb-0">Maintenance</h5>
                        <span class="h2 font-weight-bold mb-0">2,356</span>         
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="border: 2px solid black; margin-top:10px;">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase text-muted mb-0">Cost Calculation</h5>
                        <span class="h2 font-weight-bold mb-0">2,356</span>         
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col">
                <div class="card" style="border: 2px solid black; margin-top:10px;">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase text-muted mb-0">Sample</h5>
                        <span class="h2 font-weight-bold mb-0">2,356</span>         
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="border: 2px solid black; margin-top:10px;">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase text-muted mb-0">Sample</h5>
                        <span class="h2 font-weight-bold mb-0">2,356</span>         
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('Dashboard') }}" class = "btn btn-primary" style = " margin-top:20px; margin-right:10px; color:black; background:#ffffff; border-color:#68DBA9;">
            Go Back
        </a>
        
            @include('layouts.footers.auth')
    
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush

