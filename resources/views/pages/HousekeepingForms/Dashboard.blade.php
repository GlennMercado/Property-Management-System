@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    
    <div class="container-fluid mt--7">                 
    <br>
        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Room Assignment </h3>
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
        <div class="row">
            <!--Cleaned-->
            <div class="col">
                <div class="card" style="border: 2px solid green;">
                    <div class="card-body">
                        <img class="card-img-top" src="{{ asset('housekeeping-img') }}/check.png" alt="Card image cap" style="width:30%; float:right;"/>
                        <h5 class="card-title text-uppercase text-muted mb-0">Cleaned</h5>
                        <span class="h2 font-weight-bold mb-0">2,356</span>         
                    </div>
                </div>
            </div>
            <!--Dirty-->
            <div class="col-xl">
                <div class="card" style="border: 2px solid;">
                    <div class="card-body">
                    <img class="card-img-top" src="{{ asset('housekeeping-img') }}/dirty.png" alt="Card image cap" style="width:30%; float:right;"/>
                        <h5 class="card-title text-uppercase text-muted mb-0">Dirty</h5>
                        <span class="h2 font-weight-bold mb-0">2,356</span>         
                    </div>
                </div>
            </div>
            <!--Out of Order-->
            <div class="col-xl">
                <div class="card" style="border: 2px solid yellow;">
                    <div class="card-body">
                        <img class="card-img-top" src="{{ asset('housekeeping-img') }}/outoforder.png" alt="Card image cap" style="width:30%; float:right;"/>
                        <h5 class="card-title text-uppercase text-muted mb-0">Out of Order</h5>
                        <span class="h2 font-weight-bold mb-0">2,356</span>         
                    </div>
                </div>
            </div>
            <!--Out of Service-->
            <div class="col-xl">
                <div class="card" style="border: 2px solid red;">
                    <div class="card-body">
                    <img class="card-img-top" src="{{ asset('housekeeping-img') }}/outofservice.png" alt="Card image cap" style="width:30%; float:right;"/>
                        <h5 class="card-title text-uppercase text-muted mb-0">Out of Service</h5>
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