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
                                        <th scope="col">Repair Time</th>
                                        <th scope="col">Maintenance</th>
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
                                        <td>     
                                            Yes &nbsp
                                            <i class="fas fa-pen-square mr"></i>
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
                                        <td>     
                                            No &nbsp
                                            <i class="fas fa-pen-square mr"></i>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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