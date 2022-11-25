@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    
    <div class="container-fluid mt--7">                 
        <div class="row">
            <!--Available-->
            <div class="col">
                <a href="{{ route('RoomManagement') }}">
                    <div class="card" style="border: 2px solid green;">
                        <div class="card-body">
                            <img class="card-img-top" src="{{ asset('housekeeping-img') }}/check.png" alt="Card image cap" style="width:30%; float:right;"/>
                            <h5 class="card-title text-uppercase text-muted mb-0">Available</h5>
                            <span class="h2 font-weight-bold mb-0">2,356</span>         
                        </div>
                    </div>
                </a>
            </div>
            <!--Lost and Found-->
            <div class="col-xl">
                <a href="{{ route('LostandFound') }}">
                    <div class="card" style="border: 2px solid blue;">
                        <div class="card-body">
                        <img class="card-img-top" src="{{ asset('housekeeping-img') }}/lostandfound.png" alt="Card image cap" style="width:30%; float:right;"/>
                            <h5 class="card-title text-uppercase text-muted mb-0">Lost and Found</h5>
                            <span class="h2 font-weight-bold mb-0">2,356</span>         
                        </div>
                    </div>
                </a>
            </div>
            <!--Maintenance-->
            <div class="col-xl">
                <a href="{{ route('Maintenance') }}">
                    <div class="card" style="border: 2px solid red;">
                        <div class="card-body">
                            <img class="card-img-top" src="{{ asset('housekeeping-img') }}/maintenance.png" alt="Card image cap" style="width:30%; float:right;"/>
                            <h5 class="card-title text-uppercase text-muted mb-0">Maintenance</h5>
                            <span class="h2 font-weight-bold mb-0">2,356</span>         
                        </div>
                    </div>
                </a>
            </div>
            <!--Alerts-->
            <div class="col-xl">
                <div class="card" style="border: 2px solid yellow;">
                    <div class="card-body">
                    <img class="card-img-top" src="{{ asset('housekeeping-img') }}/alert.png" alt="Card image cap" style="width:30%; float:right;"/>
                        <h5 class="card-title text-uppercase text-muted mb-0">Alerts</h5>
                        <span class="h2 font-weight-bold mb-0">2,356</span>         
                    </div>
                </div>
            </div>
        </div>
    <br>
        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Sample </h3>
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
                                    <th scope="col">Sample Field</th>
                                    <th scope="col">Sample Field</th>
                                    <th scope="col">Sample Field</th>
                                    <th scope="col">Sample Field</th>
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
        
            @include('layouts.footers.auth')
    
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush