@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')



    <div class="container-fluid mt--7">
        <div class="container-fluid mt--6">
            <div class="row justify-content-center">
                <div class=" col ">
                    <div class="card">
                        <div class="card-header bg-transparent">
                            <h1 class="mb-0">Novadeci Inventory</h1>
                        </div>
                        <div class="card-body">
                            <div class="nav-wrapper">
                                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>Hotel Inventory</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-bell-55 mr-2"></i>Convetion Center Inventory</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Function Rooms Inventory </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                            <!--Hotel Stock Inventory-->
                                           <h3 class="mb-0 title">Hotel Stocks</h3>
                                             <h5 class="mb-0" style="color:#db1212; font-size:16px;">Instructions: Before starting, see to It that all inventory are in the Storage Area</h5><br><br>
                                             <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal" style = "float:right;">
                                                Add Stock
                                        </button>
                                         <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" style = "font-size:18px;">Product Name</th>
                                    <th scope="col" style = "font-size:18px;">Item Description</th>
                                    <th scope="col" style = "font-size:18px;">Available Stock</th>
                                    <th scope="col" style = "font-size:18px;">Stock Level</th>
                                    <th scope="col" style = "font-size:18px;">Stock Alert</th>
                                    <th scope="col" style = "font-size:18px;">Action</th>
                                </tr>
                            </thead>
                                
                                <tbody>
                                    @foreach ($list as $lists)
                                    <tr>
                                        <td style = "font-size:16px;">{{ $lists->name}}</td>
                                        <td style = "font-size:16px;">{{ $lists->description}}</td>
                                        <td style = "font-size:16px;">{{ $lists->total}}</td>
                                        <td style = "font-size:16px;">{{ $lists->Stock_Level}}</td>
                                        @if($lists->total <= $lists->Stock_Level)
                                            <td style = "font-size:25px;"><i class="bi bi-exclamation-triangle-fill" style="color:red;"></i></td>
                                        @else
                                            <td style = "font-size:25px;"><i class="bi bi-check-square-fill" style="color:green;"></i></td>
                                        @endif
                                        <td>
                                            <button class="btn btn-sm btn-primary btn-lg" data-toggle="modal" data-target="#ModalView{{$lists->productid}}"><i class="bi bi-eye"></i></button>
                                            <button class="btn btn-sm btn-warning btn-lg" data-toggle="modal" data-target="#ModalUpdate{{$lists->productid}}"><i class="bi bi-pencil-square"></i></button>
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <!--View-->
                                    <div class="modal fade text-left" id="ModalView{{$lists->productid}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCreate" aria-hidden="true">
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
                                                            <label class="text-left">Stock Name </label>
                                                                <input type="text" class="form-control" name="name" value = "{{ $lists->name}}" readonly>      
                                                        </div>
                                                            <div class = "col">
                                                            <label>Stock Description </label>
                                                                <input type="text" class="form-control" name="description" value = "{{ $lists->description}}" readonly>
                                                            </div>
                                                        </div>
                                                            <div class = "row">
                                                                <div class = "col pt-4">
                                                                    <label class = "text-left">Date Stock Added </label>
                                                                    <input type="text" class="form-control" name="date" value="{{ date('m-d-Y', strtotime($lists->created_at))}}" readonly>
                                                                </div>
                                                                <div class = "col pt-4">
                                                                <label>Quantity </label>
                                                                    <input type="text" class="form-control" name="total" value = "{{ $lists->total}}" readonly>
                                                                </div>                      
                                                            </div>
                                                            <div class = "row">
                                                                <div class = "col pt-4">
                                                                    <label for="exampleInputPassword1">Category </label>
                                                                    <input type="text" class="form-control" name="category" value = "{{ $lists->category}}" readonly>
                                                                </div>    
                                                            </div>
                                                                <!-- <div class="form-group"> -->    
                                                        <!-- </div> -->      
                                                    </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-outline-danger" data-dismiss="modal">Close</button><!-- <button type="button" class="btn btn-failed" data-dismiss="modal">Close</button> -->
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade text-left" id="ModalUpdate{{ $lists->productid}}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h2 class="modal-title">{{ __('Edit Details') }}</h2>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>                    
                                                </div>
                                                <form method="POST" action="{{url('/edit_stock')}}" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="modal-body">
                                                        <div class = "row">
                                                            <div class = "col">
                                                                <p class="text-left">Stock ID </p>
                                                                    <input class="form-control" type="text" value="{{$lists->productid}}" readonly>
                                                                    <input class="form-control" type="text" name="productid" value="{{$lists->productid}}" hidden>
                                                            </div>
                                                            <div class = "col">
                                                                <p class="text-left">Stock Name </p>
                                                                <input type="text" class="form-control" name="name" value="{{$lists->name}}" required>    
                                                            </div>
                                                        </div>
                                                    <div class="form-group">
                                                        <label for="Stockdetails">Stock Description: </label>
                                                        <input type="text" class="form-control" name="description" value="{{$lists->description}}" required>
                                                            <div class="invalid-feedback">
                                                                Stock Details empty
                                                            </div>
                                                                <label for="Stockdetails">Quantity: </label>
                                                                <input type="hidden" name="quantity" value="{{$lists->total}}" />
                                                                <input type="number" class="form-control" value="{{$lists->total}}" readonly>

                                                                <label for="Stockdetails">Stock Level: </label>
                                                                <input type="hidden" name="stock" value="{{$lists->Stock_Level}}" />
                                                                <input type="number" class="form-control" value="{{$lists->Stock_Level}}" readonly>
                                                            
                                                    <div class = "row">
                                                        <div class = "col">
                                                            <label class="text-left pt-4">Stock In </label>
                                                            <input class="form-control" type="number" name="in" value="0" >
                                                        </div>
                                                        <div class = "col">
                                                            <label class="text-left pt-4">Stock Out </label>
                                                            <input type="number" class="form-control" name="out" value="0">  
                                                        </div>
                                                    </div>
                                                </div>
                                                          <!-- <div class="invalid-feedback">
                                                                    Stock Name empty
                                                                </div>        -->
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Category: </label>
                                                        <select class="form-control" value="{{ $lists->category}}" name="category" required>
                                                        <option value="Invalid" class = "cat">Linens</option>
                                                        <option>Bed pad - Single</option>
                                                        <option>Fitted Sheet - Single</option>
                                                        <option>Flat Sheet - Single</option>
                                                        <option>Duvet Filler - Single</option>
                                                        <option>Duvet Cover - Single</option>
                                                        <option>Pillows</option>
                                                        <option>Bed pad - Queen</option>
                                                        <option>Fitted Sheet - Queen</option>
                                                        <option>Flat Sheet - Queen</option>
                                                        <option>Duvet Filler - Queen</option>
                                                        <option>Duvet Cover - Queen</option>
                                                        <option>Pillows Case</option>
                                                        <option>Bath Towel</option>
                                                        <option>Hand Towel</option>
                                                        <option>Bath Mat</option>
                                                        <option>Bed Ruuner Queen</option>
                                                        <option>Bed Runner Single</option>
                                                        <option value="Invalid"></option>
                                                        <option value="Invalid" class = "cat">Guest Supplies</option>
                                                        <option>Bath Soap</option>
                                                        <option>Shampoo</option>
                                                        <option>Dental Kit</option>
                                                        <option>Slippers</option>
                                                        <option>Bottled Water</option>
                                                        <option>Juice</option>
                                                        <option>Coffee</option>
                                                        <option>Creamer</option>
                                                        <option>Sugar - White</>
                                                        <option>Sugar - Brown</option>
                                                        <option value="Invalid"></option>
                                                        <option value="Invalid" class = "cat">Amenities</option>
                                                        <option>Kettle</option>
                                                        <option>Tray</option>
                                                        <option>Dental Glass</option>
                                                        <option>Teaspoon</option>
                                                        <option>Cup And Saucer</option>
                                                        <option>Hanger</option>
                                                        <option>Door Hang</option>
                                                        </select>   
                                                        <div class="invalid-feedback">
                                                            Stock Details empty
                                                        </div>
                                                    </div> 
                                                    <div class="modal-footer">
                                                        <button class="btn btn-outline-danger" data-dismiss="modal">Close</button><!-- <a class="btn btn-failed" data-dismiss="modal">Close</a> -->
                                                        <input type="submit" name="update" value="Update" class="btn btn-success" />                      
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                        </table>
                                        </div>
                        <!--Convention Center Inventory-->
                                        <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                            <h3 class="mb-0 title">Convention Center Inventory</h3>
                                            <h5 class="mb-0" style="color:#db1212; font-size:16px;">Instructions: Before Starting, See To It That All Inventory Are In The Storage Area</h5><br><br>
                                            <table class="table align-items-center table-flush datatable datatable-Stock">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col" style = "font-size:18px;">Product Name</th>
                                                        <th scope="col" style = "font-size:18px;">Item Description</th>
                                                        <th scope="col" style = "font-size:18px;">Available Stock</th>
                                                        <th scope="col" style = "font-size:18px;">Stock Level</th>
                                                        <th scope="col" style = "font-size:18px;">Stock Alert</th>
                                                        <th scope="col" style = "font-size:18px;">Action</th>
                                                    </tr>
                                                </thead>
                                                    
                                                    <tbody>
                                                        @foreach ($list2 as $lists2)
                                                        <tr>
                                                            <td style = "font-size:16px;">{{ $lists2->name}}</td>
                                                            <td style = "font-size:16px;">{{ $lists2->description}}</td>
                                                            <td style = "font-size:16px;">{{ $lists2->total}}</td>
                                                            <td style = "font-size:16px;">{{ $lists2->Stock_Level}}</td>
                                                            @if($lists2->total <= $lists2->Stock_Level)
                                                                <td><i class="bi bi-exclamation-triangle-fill" style="color:red;font-size:20px"></i></td>
                                                            @else
                                                                <td><i class="bi bi-check-square-fill" style="color:green;font-size:20px"></i></td>
                                                            @endif
                                                            <td>
                                                                <button type="button" data-toggle="modal" data-target="#ModalView{{$lists2->productid}}" class="btn btn-primary"><i class="bi bi-eye" style = "padding:2px;">View</i></button>
                                                                <button type="button" data-toggle="modal" data-target="#ModalUpdate{{$lists2->productid}}" class="btn btn-primary"><i class="bi bi-pencil-square"style = "padding:2px;" >Edit</i></button>
                                                            </td>
                                                        </tr>
                                                        <!-- Modal -->
                                                        <!--View-->
                                                        <div class="modal fade text-left" id="ModalView{{$lists2->productid}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCreate" aria-hidden="true">
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
                                                                                                    <input type="text" class="form-control" name="name" value = "{{ $lists2->name}}" readonly>
                                                                                                        <div class="invalid-feedback">
                                                                                                            Stock Name empty
                                                                                                        </div>       
                                                                                            </div>
                                                                                    </div>
                                                                            <div class="form-group">
                                                                                <label>Stock Description: </label>
                                                                                    <input type="text" class="form-control" name="description" value = "{{ $lists2->description}}" readonly>
                                                                                        <div class="invalid-feedback">
                                                                                            Stock Details empty
                                                                                        </div>
                    
                                                                                <label>Date Stock Added: </label>
                                                                                    <input type="text" class="form-control" name="date" value="{{ date('m-d-Y', strtotime($lists2->created_at))}}" readonly>
                                                                                        <div class="invalid-feedback">
                                                                                            Quantity empty
                                                                                        </div>
                    
                                                                                <label>Quantity: </label>
                                                                                    <input type="text" class="form-control" name="total" value = "{{ $lists2->total}}" readonly>
                                                                                        <div class="invalid-feedback">
                                                                                            Quantity empty
                                                                                        </div>
                                                                                 
                                                                            </div>
                                                                            <label for="exampleInputPassword1">Category: </label>
                                                                            <input type="text" class="form-control" name="category" value = "{{ $lists2->category}}" readonly>
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
                                                        <!--Modal Edit-->
                                                        <div class="modal fade text-left" id="ModalUpdate{{ $lists2->productid}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h2 class="modal-title">{{ __('Edit Details') }}</h2>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>                    
                                                                    </div>
                                                                    <form method="POST" action="{{url('/edit_stock_center')}}" enctype="multipart/form-data">
                                                                        {{ csrf_field() }}
                                                                        <div class="modal-body">
                                                                            <div class = "row">
                                                                                <div class = "col">
                                                                                    <p class="text-left">Stock ID: </p>
                                                                                    <input class="form-control" type="text" value="{{$lists2->productid}}" readonly>
                                                                                    <input class="form-control" type="text" name="productid" value="{{$lists2->productid}}" hidden>
                                                                                </div>
                                                                                <div class = "col">
                                                                                    <p class="text-left">Stock Name: </p>
                                                                                    <input type="text" class="form-control" name="name" value="{{$lists2->name}}" required>
                                                                                    <div class="invalid-feedback">
                                                                                        Stock Name empty
                                                                                    </div>       
                                                                                </div>
                                                                            </div>
                                                                        <div class="form-group">
                                                                            <label for="Stockdetails">Stock Description: </label>
                                                                            <input type="text" class="form-control" name="description" value="{{$lists2->description}}" required>
                                                                                <div class="invalid-feedback">
                                                                                    Stock Details empty
                                                                                </div>
                                                                                    <label for="Stockdetails">Quantity: </label>
                                                                                    <input type="hidden" name="quantity" value="{{$lists2->total}}" />
                                                                                    <input type="number" class="form-control" value="{{$lists2->total}}" readonly>
                    
                                                                                    <label for="Stockdetails">Stock Level: </label>
                                                                                    <input type="hidden" name="stock" value="{{$lists2->Stock_Level}}" />
                                                                                    <input type="number" class="form-control" value="{{$lists2->Stock_Level}}" readonly>
                                                                                
                                                                        <div class = "row">
                                                                            <div class = "col">
                                                                                <p class="text-left">Stock In: </p>
                                                                                <input class="form-control" type="number" name="in" value="0" >
                                                                            </div>
                                                                            <div class = "col">
                                                                                <p class="text-left">Stock Out: </p>
                                                                                <input type="number" class="form-control" name="out" value="0">
                                                                                    <div class="invalid-feedback">
                                                                                        Stock Name empty
                                                                                    </div>       
                                                                            </div>
                                                                        </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputPassword1">Category: </label>
                                                                            <select class="form-control" value="{{ $lists2->category}}" name="category" required>
                                                                            <option value="Invalid">Linens :</option>
                                                                            <option>Bed pad - Single</option>
                                                                            <option>Fitted Sheet - Single</option>
                                                                            <option>Flat Sheet - Single</option>
                                                                            <option>Duvet Filler - Single</option>
                                                                            <option>Duvet Cover - Single</option>
                                                                            <option>Pillows</option>
                                                                            <option>Bed pad - Queen</option>
                                                                            <option>Fitted Sheet - Queen</option>
                                                                            <option>Flat Sheet - Queen</option>
                                                                            <option>Duvet Filler - Queen</option>
                                                                            <option>Duvet Cover - Queen</option>
                                                                            <option>Pillows Case</option>
                                                                            <option>Bath Towel</option>
                                                                            <option>Hand Towel</option>
                                                                            <option>Bath Mat</option>
                                                                            <option>Bed Ruuner Queen</option>
                                                                            <option>Bed Runner Single</option>
                                                                            <option value="Invalid"></option>
                                                                            <option value="Invalid">Guest Supplies :</option>
                                                                            <option>Bath Soap</option>
                                                                            <option>Shampoo</option>
                                                                            <option>Dental Kit</option>
                                                                            <option>Slippers</option>
                                                                            <option>Bottled Water</option>
                                                                            <option>Juice</option>
                                                                            <option>Coffee</option>
                                                                            <option>Creamer</option>
                                                                            <option>Sugar - White</>
                                                                            <option>Sugar - Brown</option>
                                                                            <option value="Invalid"></option>
                                                                            <option value="Invalid">Amenities : </option>
                                                                            <option>Kettle</option>
                                                                            <option>Tray</option>
                                                                            <option>Dental Glass</option>
                                                                            <option>Teaspoon</option>
                                                                            <option>Cup And Saucer</option>
                                                                            <option>Hanger</option>
                                                                            <option>Door Hang</option>
                                                                            </select>   
                                                                            <div class="invalid-feedback">
                                                                                Stock Details empty
                                                                            </div>
                                                                        </div> 
                                                                        <div class="modal-footer">
                                                                            <a class="btn btn-failed" data-dismiss="modal">Close</a>
                                                                            <input type="submit" name="update" value="Update" class="btn btn-success" />                      
                                                                        </div>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </tbody>
                                            </table>
                                            
                                        </div>
                    <!--Function Rooms inventory-->
                                        <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                                        <h3 class="mb-0 title">Function Rooms Inventory</h3>
                                        <h5 class="mb-0" style="color:#db1212; font-size:16px;">Instructions: Before Starting, See To It That All Inventory Are In The Storage Area</h5><br><br>
                                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal" style = "float:right;">
                                            Add Stocks
                                    </button>
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" style = "font-size:16px;">Product Name</th>
                                    <th scope="col" style = "font-size:16px;">Item Description</th>
                                    <th scope="col" style = "font-size:16px;">Available Stock</th>
                                    <th scope="col" style = "font-size:16px;">Stock Level</th>
                                    <th scope="col" style = "font-size:16px;">Stock Alert</th>
                                    <th scope="col" style = "font-size:16px;">Action</th>
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
                                            <td><i class="bi bi-exclamation-triangle-fill" style="color:red;font-size:20px"></i></td>
                                        @else
                                            <td><i class="bi bi-check-square-fill" style="color:green;font-size:20px"></i></td>
                                        @endif
                                        <td>
                                            <button type="button" data-toggle="modal" data-target="#ModalView{{$lists->productid}}" class="btn btn-primary"><i class="bi bi-eye" style = "padding:2px;">View</i></button>
                                            <button type="button" data-toggle="modal" data-target="#ModalUpdate{{$lists->productid}}" class="btn btn-primary"><i class="bi bi-pencil-square"style = "padding:2px;" >Edit</i></button>
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <!--View-->
                                    <div class="modal fade text-left" id="ModalView{{$lists->productid}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCreate" aria-hidden="true">
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
                                    <!--Modal Edit-->
                                    <div class="modal fade text-left" id="ModalUpdate{{ $lists->productid}}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h2 class="modal-title">{{ __('Edit Details') }}</h2>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>                    
                                                </div>
                                                <form method="POST" action="{{url('/edit_stock_function')}}" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="modal-body">
                                                        <div class = "row">
                                                            <div class = "col">
                                                                <p class="text-left">Stock ID: </p>
                                                                <input class="form-control" type="text" value="{{$lists->productid}}" readonly>
                                                                <input class="form-control" type="text" name="productid" value="{{$lists->productid}}" hidden>
                                                            </div>
                                                            <div class = "col">
                                                                <p class="text-left">Stock Name: </p>
                                                                <input type="text" class="form-control" name="name" value="{{$lists->name}}" required>
                                                                <div class="invalid-feedback">
                                                                    Stock Name empty
                                                                </div>       
                                                            </div>
                                                        </div>
                                                    <div class="form-group">
                                                        <label for="Stockdetails">Stock Description: </label>
                                                        <input type="text" class="form-control" name="description" value="{{$lists->description}}" required>
                                                            <div class="invalid-feedback">
                                                                Stock Details empty
                                                            </div>
                                                                <label for="Stockdetails">Quantity: </label>
                                                                <input type="hidden" name="quantity" value="{{$lists->total}}" />
                                                                <input type="number" class="form-control" value="{{$lists->total}}" readonly>

                                                                <label for="Stockdetails">Stock Level: </label>
                                                                <input type="hidden" name="stock" value="{{$lists->Stock_Level}}" />
                                                                <input type="number" class="form-control" value="{{$lists->Stock_Level}}" readonly>
                                                            
                                                    <div class = "row">
                                                        <div class = "col">
                                                            <p class="text-left">Stock In: </p>
                                                            <input class="form-control" type="number" name="in" value="0" >
                                                        </div>
                                                        <div class = "col">
                                                            <p class="text-left">Stock Out: </p>
                                                            <input type="number" class="form-control" name="out" value="0">
                                                                <div class="invalid-feedback">
                                                                    Stock Name empty
                                                                </div>       
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Category: </label>
                                                        <select class="form-control" value="{{ $lists->category}}" name="category" required>
                                                        <option value="Invalid">Linens :</option>
                                                        <option>Bed pad - Single</option>
                                                        <option>Fitted Sheet - Single</option>
                                                        <option>Flat Sheet - Single</option>
                                                        <option>Duvet Filler - Single</option>
                                                        <option>Duvet Cover - Single</option>
                                                        <option>Pillows</option>
                                                        <option>Bed pad - Queen</option>
                                                        <option>Fitted Sheet - Queen</option>
                                                        <option>Flat Sheet - Queen</option>
                                                        <option>Duvet Filler - Queen</option>
                                                        <option>Duvet Cover - Queen</option>
                                                        <option>Pillows Case</option>
                                                        <option>Bath Towel</option>
                                                        <option>Hand Towel</option>
                                                        <option>Bath Mat</option>
                                                        <option>Bed Ruuner Queen</option>
                                                        <option>Bed Runner Single</option>
                                                        <option value="Invalid"></option>
                                                        <option value="Invalid">Guest Supplies :</option>
                                                        <option>Bath Soap</option>
                                                        <option>Shampoo</option>
                                                        <option>Dental Kit</option>
                                                        <option>Slippers</option>
                                                        <option>Bottled Water</option>
                                                        <option>Juice</option>
                                                        <option>Coffee</option>
                                                        <option>Creamer</option>
                                                        <option>Sugar - White</>
                                                        <option>Sugar - Brown</option>
                                                        <option value="Invalid"></option>
                                                        <option value="Invalid">Amenities : </option>
                                                        <option>Kettle</option>
                                                        <option>Tray</option>
                                                        <option>Dental Glass</option>
                                                        <option>Teaspoon</option>
                                                        <option>Cup And Saucer</option>
                                                        <option>Hanger</option>
                                                        <option>Door Hang</option>
                                                        </select>   
                                                        <div class="invalid-feedback">
                                                            Stock Details empty
                                                        </div>
                                                    </div> 
                                                    <div class="modal-footer">
                                                        <a class="btn btn-failed" data-dismiss="modal">Close</a>
                                                        <input type="submit" name="update" value="Update" class="btn btn-success" />                      
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!--Table Continue-->
                                    @endforeach
                                </tbody>
                        </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <style>
        .title {
            text-transform: uppercase;
            font-size: 25px;
            letter-spacing: 2px;
        }

        .text-color {
            font-size: 18px;
            color: #6C6C6C;
        }

        .cat {
            color: #000000;
            text-transform: uppercase;
        }
    </style>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
