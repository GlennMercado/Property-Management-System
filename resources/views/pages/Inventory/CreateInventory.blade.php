@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
<form>
    <div class="container-fluid mt--7">
        <div class="container-fluid mt--6">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        <div class="card-header transparent">
                            <div class = "row">    
                                <div class = "col">
                                    <h2 class="mb-0">Create Inventory</h2>
                                </div>
                        </div>
                    <form action="" method="post">
                        <div class = "row" >
                            <div class="col">
                                <h4>Product Code</h4>
                                <input type="text" class = "form-control" placeholder = "Enter Product Code" required>
                            </div>
                            <div class="col">
                                <h4>Product Name</h4>
                                <input type="text" class = "form-control" placeholder = "Enter Product Name" required>
                            </div>
                        </div>
                        <div class = "row" >
                            <div class="col">
                                <h4>Product Description</h4>
                                <input type="text" class = "form-control" placeholder = "Enter Product Details   " required>
                            </div>
                            <div class="col">
                                <h4>Select Supplier </h4>
                                <div class="dropdown show">
                                    <!--Dropdown-content-->
                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        style = "width: 150%;">
                                        Suppliers
                                    </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style = "width: 150%;">
                                            <a class="dropdown-item" href="#">Company Sample 1</a>
                                            <a class="dropdown-item" href="#">Company Sample 2</a>
                                            <a class="dropdown-item" href="#">Company Sample 3</a>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class = "row" >
                            <div class="col-md-6">
                                <h4>Product Quantity</h4>
                                <input type="text" class = "form-control" placeholder = "Enter Product Quantity" required>
                            </div>
                        </div>
                        <!--Buttons-->
                        <button class="btn btn-primary" type="submit" style = "float:right; margin-top:20px;">Submit</button>
                        <a href="#" class = "btn btn-primary" style = "float:right; margin-top:20px; margin-right:10px; background:#DC5C4E; border-color:#DC5C4E;">
                            Cancel
                        </a>
                        <a href="{{ route('StockCount') }}" class = "btn btn-primary" style = " margin-top:20px; margin-right:10px; color:black; background:#ffffff; border-color:#68DBA9;">
                            Go Back
                        </a>
                    </div>
                    
                </div> 
            </form>
                <!--Fields-->
                
            </div>
        </div>
                    
                    
                



</form>     
        
            @include('layouts.footers.auth')
    </div>
    @endsection

    @push('js')
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>

    @endpush
<style>
    .cont{

    }
</style>