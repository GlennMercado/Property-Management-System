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

        
            @include('layouts.footers.auth')
    
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush