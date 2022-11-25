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
                                    <h3 class="mb-0">Lost and Found</h3>
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
                                        <th scope="col" >Created On</th>
                                        <th scope="col" >Status</th>
                                        <th scope="col" >Room</th>
                                        <th scope="col" >Location</th>
                                        <th scope="col" >Item Description</th>
                                        <th scope="col" >Updated On</th>
                                        <th scope="col" >
                                            <i class="bi bi-gear"></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>May 20, 2022</td>
                                        <td>Lost</td>
                                        <td>101</td>
                                        <td>Bathroom</td>
                                        <td>Toothbrush</td>
                                        <td>June 25, 2022</td>
                                        <td>
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>September 15, 2022</td>
                                        <td>Lost</td>
                                        <td>202</td>
                                        <td>Bedroom</td>
                                        <td>Cellphone</td>
                                        <td>October 10, 2022</td>
                                        <td>
                                            <i class="bi bi-three-dots-vertical"></i>
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