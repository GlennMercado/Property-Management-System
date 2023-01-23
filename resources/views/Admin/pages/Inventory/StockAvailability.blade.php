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
<<<<<<< HEAD
                                <h3 class="mb-0">Hotel Stocks</h3>
                            </div><br/>
                            <div class="col-md-4">
                                <select class="form-control" style="border:2px solid" id="optionselect" >
                                    <option value="Pending" selected="true">Hotel Inventory</option>
                                    <option value="On-going">Function Rooms Inventory</option>
                                    <option value="Finished">COnvention Center Inventory</option>
                                </select>
=======
                                <h3 class="mb-0 title">Hotel Stocks</h3>
>>>>>>> 4f5ecc4a4eb5f56654c4281875e4256210f6fb2c
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" style = "font-size:20px;">Product Name</th>
                                    <th scope="col" style = "font-size:20px;">Item Description</th>
                                    <th scope="col" style = "font-size:20px;">Available Stock</th>
                                    <th scope="col" style = "font-size:20px;">Stock Level</th>
                                    <th scope="col" style = "font-size:20px;">Stock Alert</th>
                                    <th scope="col" style = "font-size:20px;">Action</th>
                                </tr>
                            </thead>
                            
                                <tbody>
                                    @foreach ($list as $lists)
                                    <tr>
                                        <td style = "font-size:18px;">{{ $lists->name}}</td>
                                        <td style = "font-size:18px;">{{ $lists->description}}</td>
                                        <td style = "font-size:18px;">{{ $lists->total}}</td>
                                        <td style = "font-size:18px;">{{ $lists->Stock_Level}}</td>
                                        @if($lists->total <= $lists->Stock_Level)
                                            <td style = "font-size:30px;"><i class="bi bi-exclamation-triangle-fill" style="color:red;"></i></td>
                                        @else
                                            <td style = "font-size:30px;"><i class="bi bi-check-square-fill" style="color:green;"></i></td>
                                        @endif
                                        <td><button class="btn btn-sm btn-primary btn-lg" data-toggle="modal" data-target="#ModalViews{{ $lists->productid}}"class="btn btn-primary"><i class="bi bi-eye"></i></button>
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
                                                            <label class="text-left">Stock Name: </label>
                                                                <input type="text" class="form-control" name="name" value = "{{ $lists->name}}" readonly>        
                                                        </div>
                                                        <div class = "col">
                                                            <label>Stock Description: </label>
                                                                <input type="text" class="form-control" name="description" value = "{{ $lists->description}}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class = "row">
                                                        <div class = "col pt-4">
                                                            <label>Date Stock Added: </label>
                                                                <input type="text" class="form-control" name="date" value="{{ date('m-d-Y', strtotime($lists->created_at))}}" readonly>
                                                        </div>
                                                        <div class = "col pt-4">
                                                            <label>Quantity: </label>
                                                                <input type="text" class="form-control" name="total" value = "{{ $lists->total}}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class = "row">
                                                        <div class = "col pt-4">
                                                            <label for="exampleInputPassword1">Category: </label>
                                                                <input type="text" class="form-control" name="category" value = "{{ $lists->category}}" readonly>
                                                        </div>
                                                    </div> 
                                                </div>  
                                                    <!-- <div class="form-group">                  
                                                    </div> -->
                                                    <!-- <div class="invalid-feedback">
                                                                Stock Details empty
                                                                </div> -->
                                                <div class="modal-footer">
                                                    <button class="btn btn-outline-danger" data-dismiss="modal">Close</button><!-- <button type="button" class="btn btn-failed" data-dismiss="modal">Close</button> -->
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
<style>
    .title{
        text-transform:uppercase;
        font-size:25px;
        letter-spacing:2px;
    }
    .text-color{
        font-size:18px;
        color:#6C6C6C;
    }
    .cat{
        color:#000000;
        text-transform:uppercase;
    }
</style>
    @include('layouts.footers.auth')
    @endsection

    @push('js')
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>

    @endpush
