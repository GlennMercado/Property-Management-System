@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
 
    
    <div class="container-fluid mt--7">    
        <!--Room Management-->             
        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Room Management</h3>
                            </div>
                            <div class="col text-right">
                                <!--<a href="#!" class="btn btn-sm btn-primary">See all</a>-->
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
                                    <th scope="col">State</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Attendant</th>
                                    <th scope="col">Arrival</th>
                                    <th scope="col">Departure</th>
                                    <!--<th scope="col">Guest Preference</th>-->
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>101</td>
                                    <td>Family Room</td>
                                    <td>Cleaned</td>
                                    <td>Occupied</td>
                                    <td>Kay</td>
                                    <td><?php echo date("M-d-Y");?></td>
                                    <td><?php echo date("M-d-Y");?></td>
                                    <!--<td>Dark Curtains</td>-->
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                            Action
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>101</td>
                                    <td>Family Room</td>
                                    <td>Cleaned</td>
                                    <td>Occupied</td>
                                    <td>Kay</td>
                                    <td><?php echo date("M-d-Y");?></td>
                                    <td><?php echo date("M-d-Y");?></td>
                                    <!--<td>Dark Curtains</td>-->
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                            Action
                                        </button>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-left display-4" id="exampleModalLabel">Manage Room</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="card-body bg-white" style="border-radius: 18px">
                                                        <p class="text-left">Room: </p>
                                                        <input class="form-control" type="text" value="1" id="example-datetime-local-input" readonly>
                                                        
                                                        <p class="text-left">Room Type: </p>
                                                        <input class="form-control" type="text" value="Family Room" id="example-datetime-local-input" required>
                                                        
                                                        <p class="text-left">Housekeeping Status </p>
                                                        <select class="form-control">
                                                            <option value="Available">Available</option>
                                                            <option value="Dirty">Dirty</option>
                                                            <option value="Checked">Checked</option>
                                                            <option value="Cleaning">Cleaning</option>
                                                            <option value="Out of Service">Out of Service</option>
                                                            <option value="Out of Order">Out of Order</option>
                                                        </select>
                                                        
                                                        <p class="text-left">Priority </p>
                                                        <select class="form-control">
                                                            <option value="Low">Low</option>
                                                            <option value="Moderate">Moderate</option>
                                                            <option value="High">High</option>
                                                            <option value="Top Priority">Top Priority</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <br><br>

        <!--Unassigned Rooms-->
        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Unassigned Rooms</h3>
                            </div>
                            <div class="col text-right">
                                <!--<a href="#!" class="btn btn-sm btn-primary">See all</a>-->
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
                                    <th scope="col">State</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Attendant</th>
                                    <th scope="col">Arrival</th>
                                    <th scope="col">Departure</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>101</td>
                                    <td>Family Room</td>
                                    <td>Cleaned</td>
                                    <td>Occupied</td>
                                    <td>Unassigned</td>
                                    <td><?php echo date("M-d-Y");?></td>
                                    <td><?php echo date("M-d-Y");?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                            Action
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>101</td>
                                    <td>Family Room</td>
                                    <td>Cleaned</td>
                                    <td>Occupied</td>
                                    <td>Unassigned</td>
                                    <td><?php echo date("M-d-Y");?></td>
                                    <td><?php echo date("M-d-Y");?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                            Action
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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

