@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
                        <!--<input type="submit" value="View" class = "btn btn-primary">-->
                        <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class = "col">
                                    <a  href="{{ route('CreateInventory') }}" class = "btn btn-primary" style = "float:right;">
                                    Create Inventory
                                    </a>
                                </div>
                                <h3 class="mb-0">Stocks</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Product Code</th>
                                    <th scope="col">Item Name</th>
                                    <th scope="col">Supplier</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Available Stock</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Sample Data</td>
                                    <td>Sample Data</td>
                                    <td>Sample Data</td>
                                    <td>Sample Data</td>
                                    <td>Sample Data</td>
                                    <td>
                                    <a href="#" class="btn btn-primary" style = "background:white; border-color:#3FC078"><i class = "bi bi-eye" style = "color:#3FC078;"></i></a>
                                        <a href="#" class="btn btn-primary" style = "background:white; border-color:black"><i class="bi bi-pencil-square" style = "color:black;"></i></a>
                                        <a href="#" class="btn btn-primary" style = "background:white; border-color:red"><i class="bi bi-x-circle" style = "color:red;"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sample Data</td>
                                    <td>Sample Data</td>
                                    <td>Sample Data</td>
                                    <td>Sample Data</td>
                                    <td>Sample Data</td>
                                    <td>
                                        <a href="#" class="btn btn-primary" style = "background:white; border-color:#3FC078"><i class = "bi bi-eye" style = "color:#3FC078;"></i></a>
                                        <a href="#" class="btn btn-primary" style = "background:white; border-color:black"><i class="bi bi-pencil-square" style = "color:black;"></i></a>
                                        <a href="#" class="btn btn-primary" style = "background:white; border-color:red"><i class="bi bi-x-circle" style = "color:red;"></i></a>
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
