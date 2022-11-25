@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
 
 
<style>
    i {
        margin-left: 5%;
    }
</style>  
    <div class="container-fluid mt--7">  
        <div class="row">
                <div class="col-xl">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Maintenance</h3>
                                </div>
                                <div class="col text-right">
                                    <a href="#!" class="btn btn-sm btn-primary">
                                        <i class="bi bi-file-plus"></i> Add
                                    </a>
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
                                    <tr>
                                        <td>ASD-123-CDA2345</td>
                                        <td>Active</td>
                                        <td>Pipes are broken</td>
                                        <td>Pipes</td>
                                        <td>Room 101 - Bathroom</td>
                                        <td>December 21, 2022</td>
                                        <td>
                                            <i class="bi bi-person"></i>
                                            <i class="bi bi-check-lg"></i>
                                            <i class="bi bi-chevron-right"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ASD-123-CDA2345</td>
                                        <td>Active</td>
                                        <td>Pipes are broken</td>
                                        <td>Pipes</td>
                                        <td>Room 101 - Bathroom</td>
                                        <td>December 21, 2022</td>
                                        <td>
                                            <i class="bi bi-person"></i>
                                            <i class="bi bi-check-lg"></i>
                                            <i class="bi bi-chevron-right"></i>
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