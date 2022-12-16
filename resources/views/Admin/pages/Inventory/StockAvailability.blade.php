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
                                <h3 class="mb-0">Hotel Stocks</h3>
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
                                    <th scope="col">Stock Level</th>
                                    <th scope="col">Stock Alert</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            
                                <tbody>
                                    @foreach ($list as $lists)
                                    <tr>
                                        <td>{{ $lists->name}}</td>
                                        <td>{{ $lists->description}}</td>
                                        <td>{{ $lists->total}}</td>
                                        <td>{{ $lists->Stock_Level}}</td>
                                        @if($lists->total <= $lists->Stock_Level)
                                            <td><i class="bi bi-exclamation-triangle-fill" style="color:red;"></i></td>
                                        @else
                                            <td><i class="bi bi-check-square-fill" style="color:green;"></i></td>
                                        @endif
                                        <td><button type="button" data-toggle="modal" data-target="#ModalViews{{ $lists->productid}}"class="btn btn-primary"><i class="bi bi-eye" style = "padding:2px;">View</i></button>
                                        </td>
                                    </tr>

                                    <!--View-->
                                    <div class="modal fade text-left" id="ModalViews{{$lists->productid}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCreate" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title text-left display-4" id="exampleModalCreate">View Details</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>                    
                                                </div>
                                                <div class="modal-body">
                                                            
                                                                <div class = "row">
                                                                        <div class = "col">
                                                                            <p class="text-left">Stock Name: </p>
                                                                                <input type="text" class="form-control" name="name" value = "{{ $lists->name}}" readonly>
                                                                                    <div class="invalid-feedback">
                                                                                        Stock Name empty
                                                                                    </div>       
                                                                        </div>
                                                                </div>
                                                        <div class="form-group">
                                                            <label>Stock Description: </label>
                                                                <input type="text" class="form-control" name="description" value = "{{ $lists->description}}" readonly>
                                                                    <div class="invalid-feedback">
                                                                        Stock Details empty
                                                                    </div>

                                                            <label>Date Stock Added: </label>
                                                                <input type="text" class="form-control" name="date" value="{{ date('m-d-Y', strtotime($lists->created_at))}}" readonly>
                                                                    <div class="invalid-feedback">
                                                                        Quantity empty
                                                                    </div>

                                                            <label>Quantity: </label>
                                                                <input type="text" class="form-control" name="total" value = "{{ $lists->total}}" readonly>
                                                                    <div class="invalid-feedback">
                                                                        Quantity empty
                                                                    </div>  
                                                        </div>
                                                        <label for="exampleInputPassword1">Category: </label>
                                                        <input type="text" class="form-control" name="category" value = "{{ $lists->category}}" readonly>
                                                                <div class="invalid-feedback">
                                                                Stock Details empty
                                                                </div>
                                                    </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-failed" data-dismiss="modal">Close</button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
            
                                     @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--<a href="{{ route('home') }}" class = "btn btn-primary" style = " margin-top:20px; margin-right:10px; color:black; background:#ffffff; border-color:#68DBA9;">
            Go Back
        </a>-->
</div>

    @include('layouts.footers.auth')
    @endsection

    @push('js')
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>

    @endpush
