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
                                <button class="btn btn-outline-primary" class="btn btn-primary" data-toggle="modal" data-target="#PurchaseReportModal" style = "float:right;">
                                    Make Report
                                </button>
                                </div>
                                <h3 class="mb-0 title">Stock Purchase Reports</h3>
                                <h5 class="mb-0" style="color:#6C6C6C; font-size:16px;">Instructions: Before starting, see to It that all inventory are in the Storage Area</h5>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">

                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" style = "font-size:18px;">Item Name</th>
                                    <th scope="col" style = "font-size:18px;">Supplier Name</th>
                                    <th scope="col" style = "font-size:18px;">Description</th>
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
                                        <td style = "font-size:16px;">{{ $lists->suppliername}}</td>
                                        <td style = "font-size:16px;">{{ $lists->description}}</td>
                                        <td style = "font-size:16px;">{{ $lists->quantity}}</td>
                                        <td style = "font-size:16px;">{{ $lists->Stock_Level}}</td>
                                        @if($lists->quantity <= $lists->Stock_Level)
                                            <td style = "font-size:25px;"><i class="bi bi-exclamation-triangle-fill" style="color:red;"></i></td>
                                        @else
                                            <td style = "font-size:25px;"><i class="bi bi-check-square-fill" style="color:green;"></i></td>
                                        @endif
                                        <td>
                                        <button type="button" data-toggle="modal" data-target="#ModalView{{$lists->productid}}" class="btn btn-primary"><i class="bi bi-eye" style = "padding:2px;">View</i></button>
                                            <button type="button" data-toggle="modal" data-target="#ModalUpdate{{$lists->productid}}" class="btn btn-primary"><i class="bi bi-pencil-square"style = "padding:2px;" >Edit</i></button>
                                        </td>
                                    </tr>

                                <!--MODAL FOR VIEW-->
                                <div class="modal fade" id="ModalView{{$lists->productid}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-left display-4" id="exampleModalLabel">View All Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="card-body bg-white" style="border-radius: 18px">
                                                        <p class="text-left">Category :
                                                        <input class="form-control" type="text" name="name" value="{{$lists->name}}"  readonly></p>
                                                        
                                                        <p class="text-left">Purchased Date :
                                                        <input class="form-control" type="text" name="date" value="{{ date('m-d-Y', strtotime($lists->date))}}" readonly></p>
                                                        
                                                        <div class = "row">
                                                            <div class = "col">
                                                                <p class="text-left">Item :
                                                                    <input class="form-control" type="number" placeholder="Enter Here.." name="unit" value="{{$lists->unit}}"  readonly></p>  
                                                            </div>
                                                                <div class = "col">
                                                                    <p class="text-left">Quantity :
                                                                    <input class="form-control" type="text" name="quantity" value = "{{$lists->quantity}}" readonly></p>
                                                                </div>
                                                        </div>
                                                        <p class="text-left">Reciever :
                                                        <input class="form-control" type="text" name="suppliername" value = "{{$lists->suppliername}}" readonly></p>

                                                        <p class="text-left">Supervisor/Dept : 
                                                            <input class="form-control" type="text" name="suppliername" value = "{{$lists->suppliername}}" readonly></p>
        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-outline-danger" data-dismiss="modal">Close</button> <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!--MODAL FOR Update-->
                                <div class="modal fade" id="ModalUpdate{{$lists->productid}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-left display-4" id="exampleModalLabel">Purchase Report</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form class="needs-validation" action="{{ url('/edit_report') }}" method="POST">
                                                {{ csrf_field() }}
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="card-body bg-white" style="border-radius: 18px">
                                                        <div class = "row">
                                                                <div class = "col">
                                                                <input class="form-control" type="text" name="productid" value="{{$lists->productid}}"  hidden>
                                                                    <p class="text-left">Item Name :
                                                                        <input class="form-control" type="text" name="name" value="{{$lists->name}}"  required></p>
                                                                </div>
                                                            </div>
                                                        <p class="text-left">Item Description :
                                                        <input class="form-control" type="text" placeholder="Enter Here.." name="description" value="{{$lists->description}}"  required></p>
                                                        <div class = "row">
                                                            <div class = "col">
                                                                <p class="text-left">Unit :
                                                                    <input class="form-control" type="number" placeholder="Enter Here.." name="unit" value="{{$lists->unit}}"  required></p>  
                                                            </div>
                                                                <div class = "col">
                                                                    <p class="text-left">Quantity :
                                                                        <input class="form-control" type="number" placeholder="Enter Here.." name="quantity" value="{{$lists->quantity}}"  required></p>
                                                                </div>
                                                        </div>
                                                        <p class="text-left">Supplier Name: </p>
                                                            <select class="form-control" name="suppliername" value="{{$lists->productid}}" required>
                                                                <option>Sample Supplier 1</option>
                                                                <option>Sample Supplier 2</option>
                                                                <option>Sample Supplier 3</option>
                                                            </select>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                
                                    @endforeach
                            </tbody>
                        </table>
                    </div>

                                <!--MODAL FOR REPORT-->
                                <div class="modal fade" id="PurchaseReportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-left display-4" id="exampleModalLabel">Purchase Report</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ url('/report') }}" class="prevent_submit" method="POST">
                                                {{ csrf_field() }}
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="card-body bg-white" style="border-radius: 18px">
                                                        <div class = "row">
                                                                <div class = "col">
                                                                    <label class="text-left text-color">Item Name </label>
                                                                        <input class="form-control mt-2" type="text" name="name" placeholder="Enter Here.."  required>
                                                                </div>
                                                            </div>
                                                        <label class="text-left pt-4 text-color">Item Description </label>
                                                        <input class="form-control mt-2" type="text" placeholder="Enter Here.." name="description" required>
                                                        <div class = "row">
                                                            <div class = "col">
                                                                <label class="text-left pt-4 text-color">Unit </label> 
                                                                <input class="form-control mt-2" type="number" placeholder="Enter Here.." name="unit" required> 
                                                            </div>
                                                            <div class = "col">
                                                                <label class="text-left pt-4 text-color">Quantity </label>
                                                                <input class="form-control mt-2" type="number" placeholder="Enter Here.." name="quantity" required>
                                                            </div>
                                                            <div class = "col">
                                                                <label class="text-left pt-4 text-color">Stock Level :</label>
                                                                <input class="form-control" type="number" placeholder="Enter Here.." name="stock" required>
                                                            </div>
                                                        </div>
                                                        <label class="text-left pt-4 text-color">Supplier Name </label>
                                                            <select class="form-control mt-2" name="suppliername" required>
                                                                <option>Sample Supplier 1</option>
                                                                <option>Sample Supplier 2</option>
                                                                <option>Sample Supplier 3</option>
                                                            </select>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        

                  
                                                 
                
                      
    </div>
<!--Modal 2
<div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class = "col">
                               
                                </div>
                                <h3 class="mb-0">Stocks</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">

                         Projects table 
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
                                    @foreach ($list as $lists)
                                    <tr>
                                        <td>{{ $lists->name}}</td>
                                        <td>{{ $lists->description}}</td>
                                        <td>{{ $lists->unit}}</td>
                                        <td>{{ $lists->suppliername}}</td>
                                        <td>{{ $lists->quantity}}</td>
                                        
                                            <a href="#" data-toggle="modal" data-target="#ModalCreate"><i class="bi bi-eye" style = "padding:2px;"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#ModalUpdate"><i class="bi bi-pencil-square"style = "padding:2px;"></i></a>
                                            <a href = "#"><i class="bi bi-archive-fill"style = "padding:2px;"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div> -->
                 

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
</style> 
    @endsection
    
    @push('js')
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>

    @endpush

    