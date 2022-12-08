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
                                <h3 class="mb-0">Stocks</h3>
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
                                        <button type="button" data-toggle="modal" data-target="#ModalViews"class="btn btn-primary"><i class="bi bi-eye" style = "padding:2px;">View</i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('home') }}" class = "btn btn-primary" style = " margin-top:20px; margin-right:10px; color:black; background:#ffffff; border-color:#68DBA9;">
            Go Back
        </a>

        <!--View Modal-->
        <div class="modal fade" id="ModalViews" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-left display-4" id="exampleModalLabel">Create Stocks</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('StockCount') }}" class="prevent_submit" method="POST">
                        {{ csrf_field() }}
                    <div class="modal-body">
                        <div class = "row">
                            <div class = "col">
                                <p class="text-left">Stock ID: </p>
                                        <input class="form-control" type="text" value="{{ $lists->productid}}" id="id" readonly>
                            </div>
                            <div class = "col">
                                <p class="text-left">Stock Name: </p>
                                    <input type="text" class="form-control" name="name" value="{{ $lists->name}}" required>
                                                    
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col">
                                <label for="Stockdetails">Stock Description</label>
                                <input type="text" class="form-control" name="description" value="{{ $lists->description}}" required>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col">
                                <label for="Stockdetails">Quantity</label>
                                <input type="number" class="form-control" name="quantity" value="{{ $lists->total}}" required>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col">
                                <label for="exampleInputPassword1">Category</label>
                                    <select class="form-control" name = "category" value="{{ $lists->category}}" required>
                                    <option value="Stock">Linens :</option>
                                    <option value="Stock1">Bed pad - Single</option>
                                    <option value="Stock2">Fitted Sheet - Single</option>
                                    <option value="Stock3">Flat Sheet - Single</option>
                                    <option value="Stock4">Duvet Filler - Single</option>
                                    <option value="Stock5">Duvet Cover - Single</option>
                                    <option value="Stock6">Pillows</option>
                                    <option value="Stock7">Bed pad - Queen</option>
                                    <option value="Stock8">Fitted Sheet - Queen</option>
                                    <option value="Stock9">Flat Sheet - Queen</option>
                                    <option value="Stock10">Duvet Filler - Queen</option>
                                    <option value="Stock11">Duvet Cover - Queen</option>
                                    <option value="Stock12">Pillows Case</option>
                                    <option value="Stock13">Bath Towel</option>
                                    <option value="Stock14">Hand Towel</option>
                                    <option value="Stock15">Bath Mat</option>
                                    <option value="Stock16">Bed Ruuner Queen</option>
                                    <option value="Stock17">Bed Runner Single</option>
                                    <option value="Stock" readonly></option>
                                    <option value="Stock" readonly>Guest Supplies :</option>
                                    <option value="Stock18">Bath Soap</option>
                                    <option value="Stock19">Shampoo</option>
                                    <option value="Stock20">Dental Kit</option>
                                    <option value="Stock21">Slippers</option>
                                    <option value="Stock22">Bottled Water</option>
                                    <option value="Stock23">Juice</option>
                                    <option value="Stock24">Coffee</option>
                                    <option value="Stock25">Creamer</option>
                                    <option value="Stock26">Sugar - White</>
                                    <option value="Stock27">Sugar - Brown</option>
                                    <option value="Stock"></option>
                                    <option value="Stock">Amenities : </option>
                                    <option value="Stock28">Kettle</option>
                                    <option value="Stock29">Tray</option>
                                    <option value="Stock30">Dental Glass</option>
                                    <option value="Stock31">Teaspoon</option>
                                    <option value="Stock32">Cup And Saucer</option>
                                    <option value="Stock33">Hanger</option>
                                    <option value="Stock34">Door Hang</option>
                                    </select>
                            </div>
                        </div>                            
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                        <input type="submit" class="btn btn-success prevent_submit" value="submit" />                      
                    </div>
                </form>         
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
