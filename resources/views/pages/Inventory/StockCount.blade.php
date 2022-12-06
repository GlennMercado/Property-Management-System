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
                                <div class = "col">
                                    
                                    </a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style = "float:right;">
                                            Add Stock
                                    </button>
                                </div>
                                <h3 class="mb-0">Inventory Stocks</h3>
                                <h5 class="mb-0" style="text-color:#ff0000">Instructions: Before Starting, See To It That All Inventory Are In The Storage Area</h5>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Item Description</th>
                                    <th scope="col">Available Stock</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            
                                <tbody>
                                    @foreach ($list as $lists)
                                    <tr>
                                        <td>{{ $lists->name}}</td>
                                        <td>{{ $lists->description}}</td>
                                        <td>{{ $lists->total}}</td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-target="#ModalView"><i class="bi bi-eye" style = "padding:2px;">View</i></button>  <!-- located in - users > modal-->
                                            <button href="#" data-toggle="modal" data-target="#ModalUpdate"><i class="bi bi-pencil-square"style = "padding:2px;">Edit</i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
    
    <!-- Modal -->
      <!--View-->
      <div class="modal fade text-left" id="ModalView" tabindex="-1" role="dialog" aria-labelledby="exampleModalCreate" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title text-left display-4" id="exampleModalCreate">View</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>                    
                </div>
                <div class="modal-body">
                            <form class="needs-validation" novalidate>
                                <div class = "row">
                                    <div class = "col">
                                        <p class="text-left">Stock ID: </p>
                                            <input class="form-control" type="text" value="1" id="example-datetime-local-input" readonly>
                                    </div>
                                        <div class = "col">
                                            <p class="text-left">Stock Name: </p>
                                                <input type="text" class="form-control" id="Stockname" aria-describedby="emailHelp" value = "{{ $lists->name}}" readonly>
                                                    <div class="invalid-feedback">
                                                        Stock Name empty
                                                    </div>       
                                        </div>
                                </div>
                        <div class="form-group">
                            <label for="Stockdetails">Stock Description</label>
                                <input type="text" class="form-control" id="Stockdetails" value = "{{ $lists->description}}" readonly>
                                    <div class="invalid-feedback">
                                        Stock Details empty
</div>

                            <label for="Stockdetails">Date :</label>
                                <input type="date" class="form-control" id="Stockdetails" value="{{ $lists->date}}" readonly>
                                    <div class="invalid-feedback">
                                        Quantity empty
                                    </div>

                            <label for="Stockdetails">Quantity</label>
                                <input type="text" class="form-control" id="Stockdetails" value = "{{ $lists->total}}" readonly>
                                    <div class="invalid-feedback">
                                        Quantity empty
                                    </div>
                </div>
                        <label for="exampleInputPassword1">Stock Type</label>
                        <input type="text" class="form-control" id="Stockdetails" value = "{{ $lists->category}}" readonly>
                                <div class="invalid-feedback">
                                Stock Details empty
                                </div>
                    </div>      
                </div>
            </div>
        </div>
    </div>
    <!--Modal Update-->
    <div class="modal fade text-left" id="ModalUpdate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">{{ __('View') }}</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>                    
                </div>
                <div class="modal-body">
                            <form class="needs-validation" novalidate>
                                <div class = "row">
                                    <div class = "col">
                                        <p class="text-left">Stock ID: </p>
                                            <input class="form-control" type="text" value="1" id="example-datetime-local-input" readonly>
                                    </div>
                                        <div class = "col">
                                            <p class="text-left">Stock Name: </p>
                                                <input type="text" class="form-control" id="Stockname" aria-describedby="emailHelp" placeholder="Enter name..." required>
                                                    <div class="invalid-feedback">
                                                        Stock Name empty
                                                    </div>       
                                        </div>
                                </div>
                        <div class="form-group">
                            <label for="Stockdetails">Stock Description</label>
                                <input type="text" class="form-control" id="Stockdetails" placeholder="Enter details..." required>
                                    <div class="invalid-feedback">
                                        Stock Details empty
                                    </div>

                            <label for="Stockdetails">Date :</label>
                                <input type="number" class="form-control" id="Stockdetails" placeholder="Enter number..." readonly>
                                    <div class="invalid-feedback">
                                        Quantity empty
                                    </div>

                            <label for="Stockdetails">Quantity</label>
                            <input type="button" class="btn btn-primary" value="IN" id="" style="float:center"><input type="button" class="btn btn-primary" id="" value="OUT"><br>
                                <input type="number" class="form-control" id="Stockdetails" placeholder="Enter number..." required>
                                    <div class="invalid-feedback">
                                        Quantity empty
                                    </div>
                </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Category</label>
                            <select class="form-control" required>
                                <option value="Stock1">Linen :</option>
                                <option value="Stock2">Sample 2</option>
                                <option value="Stock3">Sample 3</option>
                                <option value="Stock2">Sample 2</option>
                                <option value="Stock2">Sample 2</option>
                                <option value="Stock2">Sample 2</option>
                                <option value="Stock2">Sample 2</option>
                                <option value="Stock2">Sample 2</option>
                                <option value="Stock2">Sample 2</option>
                                <option value="Stock2">Sample 2</option>
                            </select>
                                <div class="invalid-feedback">
                                Stock Details empty
                                </div>
                    </div>      
      
                    <div class="modal-footer">
                        <button type="button" class="btn btn-failed" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Update</button>                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Add Stock-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-left display-4" id="exampleModalLabel">Create Stocks</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <form class="needs-validation" action="{{ route('StockCount') }}" method="POST">
                            {{ csrf_field() }}

                        <div class="modal-body">
                            <div class = "row">
                                 <div class = "col">
                                        <p class="text-left">Stock ID: </p>
                                            <input class="form-control" type="text" value="1" id="id" readonly>
                                </div>
                                    <div class = "col">
                                            <p class="text-left">Stock Name: </p>
                                                <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Enter name..." required>
                                                    <!--<div class="invalid-feedback">
                                                        Stock Name empty
                                                    </div> -->      
                                    </div>
                            </div>
                        <div class="form-group">
                            <label for="Stockdetails">Stock Description</label>
                                <input type="text" class="form-control" name="description" placeholder="Enter details..." required>
                                   <!-- <div class="invalid-feedback">
                                        Stock Details empty
                                    </div>-->

                            <label for="Stockdetails">Quantity</label>
                                <input type="number" class="form-control" name="quantity" placeholder="Enter number..." required>
                                    <!--<div class="invalid-feedback">
                                        Quantity empty
                                    </div>-->
                        <div>
                            <input type="number" class="form-control" name="in" value="0" placeholder="Enter number..." hidden>
                            <input type="number" class="form-control" name="out" value="0" placeholder="Enter number..." hidden>
                        </div>
                        </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Category</label>
                            <select class="form-control" name = "category" required>
                                <option value="Stock1">Linens: \n Bed pad - Single</option>
                                <option value="Stock2">Fitted Sheet - Single</option>
                                <option value="Stock3">Flat Sheet - Single</option>
                            </select>
                                <!--<div class="invalid-feedback">
                                Stock Details empty
                                </div>-->
                    </div>              
            
                <br>
                    <div class="modal-footer">
                        <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                        <input type="submit" class="btn btn-success" name="submit" />                      
                    </div>
            </div>
        </form>
        </div>
    </div>     
    
            </div>
        </div>
    </div>
   



    
    <!--Validation                               
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
                    
       </script>-->
    
    @endsection

    @push('js')
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>

    @endpush
