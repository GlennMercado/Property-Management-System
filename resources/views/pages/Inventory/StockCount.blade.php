@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
        @include('users.modal.create')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class = "col">
                                    
                                    </a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style = "float:right;">
                                            Create Stock
                                        </button>
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
                                    <th scope="col">Available Stock</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Sample Data</td>
                                    <td>Sample Data</td>
                                    <td>Sample Data</td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#ModalCreate"><i class="bi bi-eye"></i></a>
                                        <a href = "#"><i class="bi bi-pencil-square"></i></a>
                                        <a href = "#"><i class="bi bi-x-circle"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sample Data</td>
                                    <td>Sample Data</td>
                                    <td>Sample Data</td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#ModalCreate"><i class="bi bi-eye"></i></a>
                                        <a href = "#"><i class="bi bi-pencil-square"></i></a>
                                        <a href = "#"><i class="bi bi-x-circle"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sample Data</td>
                                    <td>Sample Data</td>
                                    <td>Sample Data</td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#ModalCreate"><i class="bi bi-eye"></i></a>
                                        <a href = "#"><i class="bi bi-pencil-square"></i></a>
                                        <a href = "#"><i class="bi bi-x-circle"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sample Data</td>
                                    <td>Sample Data</td>
                                    <td>Sample Data</td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#ModalCreate"><i class="bi bi-eye"></i></a>
                                        <a href = "#"><i class="bi bi-pencil-square"></i></a>
                                        <a href = "#"><i class="bi bi-x-circle"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-left display-4" id="exampleModalLabel">Create Stocks</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate>
                                <p class="text-left">Stock ID: </p>
                                    <input class="form-control" type="text" value="1" id="example-datetime-local-input" readonly>

                        <div class="form-group">
                            <label for="Stockname">Stock Name</label>
                                <input type="text" class="form-control" id="Stockname" aria-describedby="emailHelp" placeholder="Enter name..." required>
                        <div class="invalid-feedback">
                        Stock Name empty
                        </div>
                        
                        <div class="form-group">
                            <label for="Stockdetails">Stock Details</label>
                                <input type="text" class="form-control" id="Stockdetails" placeholder="Enter details..." required>
                                    <div class="invalid-feedback">
                                    Stock Details empty
                                    </div>

                            <label for="Stockdetails">Quantity</label>
                                <input type="number" class="form-control" id="Stockdetails" placeholder="Enter number..." required>
                                    <div class="invalid-feedback">
                                    Quantity empty
                                    </div>
                </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Stock Type</label>
                            <select class="form-control" required>
                                <option value="Stock1">Sample 1</option>
                                <option value="Stock2">Sample 2</option>
                                <option value="Stock3">Sample 3</option>
                            </select>
                                <div class="invalid-feedback">
                                Stock Details empty
                                </div>
                    </div>              
            </div>
                <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
            </div>
        </div>
    </div>                              
    <!--Validation-->                                 
       <script>
                 
        (function() {
            'use strict';
            window.addEventListener('load', function() {  
            var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
                }, false);
            });
            }, false);
        })();
                    
       </script>
    @include('layouts.footers.auth')
    @endsection

    @push('js')
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>

    @endpush
