@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    
    <div class="container-fluid mt--7">                 
        <br>

        <!--Room Assignment-->
        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Room Assignment </h3>
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
                                    <th scope="col">Due Date</th>
                                    <th scope="col">Room</th>
                                    <th scope="col">State</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Attendant</th>
                                    <th scope="col">Arrival</th>
                                    <th scope="col">Departure</th>
                                    <th scope="col">Guest Preference</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo date("M-d-Y");?></td>
                                    <td>101</td>
                                    <td>Cleaned</td>
                                    <td>Available</td>
                                    <td>Kay</td>
                                    <td><?php echo date("M-d-Y");?></td>
                                    <td><?php echo date("M-d-Y");?></td>
                                    <td>
                                        <!--<i class="fas fa-arrow-up text-success mr-3"></i> 46,53%-->
                                        Dark Curtains
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <br>

        <!--Cardboxes
        <div class="row">
           
            <div class="col">
                <div class="card" style="border: 2px solid green;">
                    <div class="card-body">
                        <img class="card-img-top" src="{{ asset('housekeeping-img') }}/check.png" alt="Card image cap" style="width:30%; float:right;"/>
                        <h5 class="card-title text-uppercase text-muted mb-0">Cleaned</h5>
                        <span class="h2 font-weight-bold mb-0">2,356</span>         
                    </div>
                </div>
            </div>
           
            <div class="col-xl">
                <div class="card" style="border: 2px solid;">
                    <div class="card-body">
                    <img class="card-img-top" src="{{ asset('housekeeping-img') }}/dirty.png" alt="Card image cap" style="width:30%; float:right;"/>
                        <h5 class="card-title text-uppercase text-muted mb-0">Dirty</h5>
                        <span class="h2 font-weight-bold mb-0">2,356</span>         
                    </div>
                </div>
            </div>
           
            <div class="col-xl">
                <div class="card" style="border: 2px solid yellow;">
                    <div class="card-body">
                        <img class="card-img-top" src="{{ asset('housekeeping-img') }}/outoforder.png" alt="Card image cap" style="width:30%; float:right;"/>
                        <h5 class="card-title text-uppercase text-muted mb-0">Out of Order</h5>
                        <span class="h2 font-weight-bold mb-0">2,356</span>         
                    </div>
                </div>
            </div>

            <div class="col-xl">
                <div class="card" style="border: 2px solid red;">
                    <div class="card-body">
                    <img class="card-img-top" src="{{ asset('housekeeping-img') }}/outofservice.png" alt="Card image cap" style="width:30%; float:right;"/>
                        <h5 class="card-title text-uppercase text-muted mb-0">Out of Service</h5>
                        <span class="h2 font-weight-bold mb-0">2,356</span>         
                    </div>
                </div>
            </div>
        </div>-->

        <!--Maintenance-->
        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Maintenance</h3>
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
                                    <th scope="col" >ID</th>
                                    <th scope="col" >Status</th>
                                    <th scope="col" >Description</th>
                                    <th scope="col" >Asset</th>
                                    <th scope="col" >Location</th>
                                    <th scope="col" >Due Date</th>
                                    <th scope="col" >Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $lists)
                                <tr>
                                    <td>{{ $lists->ID}}</td>
                                    <td>{{ $lists->Status}}</td>
                                    <td>{{ $lists->Description}}</td>
                                    <td>{{ $lists->Asset}}</td>
                                    <td>{{ $lists->Location}}</td>
                                    <td>{{ date("F j Y", strtotime($lists->Due_Date))}}</td>
                                    <td>
                                        <i class="bi bi-person"></i>
                                        <i class="bi bi-check-lg"></i>
                                        <i class="bi bi-chevron-right"></i>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <!--Cleaned-->
        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Cleaned</h3>
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
                                    <th scope="col">Date & Time Accomplished</th>
                                    <th scope="col">Room</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Attendant</th>
                                    <th scope="col">Check-in</th>
                                    <th scope="col">Check-out</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo date('M-d-Y h:i:s a', time());?></td>
                                    <td>101</td>
                                    <td>Cleaned</td>
                                    <td>Kay</td>
                                    <td><?php echo date('M-d-Y');?></td>
                                    <td><?php echo date('M-d-Y');?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>    

        <br>

        <!--Dirty-->
        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Dirty</h3>
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
                                    <th scope="col">Due Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Room</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Attendant</th>
                                    <th scope="col">Check-in</th>
                                    <th scope="col">Check-out</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo date('M-d-Y h:i:s a', time());?></td>
                                    <td>101</td>
                                    <td>Unavailable</td>
                                    <td>Kay</td>
                                    <td><?php echo date('M-d-Y');?></td>
                                    <td><?php echo date('M-d-Y');?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <!--Out of Order-->
        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Out of Order</h3>
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
                                    <th scope="col">Due Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Room</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Attendant</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo date('M-d-Y h:i:s a', time());?></td>
                                    <td>101</td>
                                    <td>Unavailable</td>
                                    <td>Kay</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <!--Out of Service-->
        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Out of Service</h3>
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
                                    <th scope="col">Due Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Room</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Attendant</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo date('M-d-Y h:i:s a', time());?></td>
                                    <td>101</td>
                                    <td>Unavailable</td>
                                    <td>Kay</td>
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