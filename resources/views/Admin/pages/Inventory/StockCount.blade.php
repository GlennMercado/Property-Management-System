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
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal" style = "float:right;">
                                            Add Stock
                                    </button>
                                </div>
                                <h3 class="mb-0 title">Hotel Stocks</h3>
                                <h5 class="mb-0" style="color:#6C6C6C; font-size:16px;">Instructions: Before starting, see to It that all inventory are in the Storage Area</h5>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush datatable datatable-Stock">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" style = "font-size:18px;">Product Name</th>
                                    <th scope="col" style = "font-size:18px;">Item Description</th>
                                    <th scope="col" style = "font-size:18px;">Available Stock</th>
                                    <th scope="col" style = "font-size:18px;">All Stock</th>
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
                                        <td style = "font-size:16px;">{{ $lists->allstock}}</td>
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
                                                                    <label class = "text-left">All Stock </label>
                                                                    <input type="text" class="form-control" name="allstock" value = "{{ $lists->description}}" readonly>
                                                                </div>
                                                                <div class = "col pt-4">
                                                                <label>Date Stock Added </label>
                                                                    <input type="text" class="form-control" name="date" value="{{ date('m-d-Y', strtotime($lists->created_at))}}" readonly>
                                                                </div>                      
                                                            </div>
                                                            <div class = "row">
                                                                <div class = "col pt-4">
                                                                    <label for="exampleInputPassword1">Quantity </label>
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
                                    <!-- <div class="invalid-feedback">
                                                                Stock Details empty
                                                                </div> -->
                                    <!--Modal Edit / validation-->
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
                                                            <input class="form-control" type="number" name="in" value="0">
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
                                                        <input type="number" class="form-control" name="category" value="{{ $lists->category}}" hidden> 
                                                        <select class="form-control" value="{{ $lists->category}}" name="category" required>
                                                        <option value="Invalid" class = "cat" disabled>Linens</option>
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

    <!--Add Stock-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-left display-4" id="exampleModalLabel">Create Hotel Stock</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/addstock') }}" class="prevent_submit" method="POST">
                        {{ csrf_field() }}
                    <div class="modal-body">
                        <div class = "row">
                            <div class = "col">
                                <label for="exampleInputPassword1" class = "text-color pt-4">Category </label>
                                <select class="form-control" name="category" required>
                                    <option value="Linens">Linens </option>
                                    <option value="GuestSupplies">GuestSupplies </option>
                                    <option value="Amenities">Amenities  </option>
                                    </select>
                            </div>
                        </div> 
                        <div class = "row">
                            <div class = "col">
                                <label class="text-color">Stock Name </label>
                                <select class="form-control" name = "name" required>
                                    @foreach ($list as $lists)
                                    @if('category' == 'Linens')
                                    <option value="Invalid" class = "cat">Linens </option>
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
                                    @elseif('category' == 'GuestSupplies')
                                    <option value="Invalid" class = "cat">Guest Supplies </option>
                                    <option>Bath Soap</option>
                                    <option>Shampoo</option>
                                    <option>Dental Kit</option>
                                    <option>Slippers</option>
                                    <option>Bottled Water</option>
                                    <option>Juice</option>
                                    <option>Coffee</option>
                                    <option>Creamer</option>
                                    <option>Sugar - White</option>
                                    <option>Sugar - Brown</option>
                                    @elseif('category' == 'Amenities')
                                    <option value="Invalid" class = "cat">Amenities  </option>
                                    <option>Kettle</option>
                                    <option>Tray</option>
                                    <option>Dental Glass</option>
                                    <option>Teaspoon</option>
                                    <option>Cup And Saucer</option>
                                    <option>Hanger</option>
                                    <option>Door Hang</option>
                                    @endif
                                    @endforeach
                                    </select>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col">
                                <label for="Stockdetails" class = "text-color pt-4">Stock Description </label>
                                <input type="text" class="form-control" name="description" placeholder="Enter details..." required>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col">
                                <label for="Stockdetails" class = "text-color pt-4">Overall Initial Stock :  </label>
                                <input type="text" class="form-control" name="allstock" placeholder="Enter details..." required>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col">
                                <label for="Stockdetails" class = "text-color pt-4">Quantity </label>
                                <input type="number" class="form-control" name="quantity" placeholder="Enter number..." required>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col">
                                <label for="Stockdetails" class = "text-color pt-4">Stock Level </label>
                                <input type="number" class="form-control" name="stock" placeholder="Enter number..." required>
                            </div>
                        </div>                      
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-danger" data-dismiss="modal">Close</button><!-- <a class="btn btn-secondary" data-dismiss="modal">Close</a> -->
                        <input type="submit" class="btn btn-success prevent_submit" value="Submit" />                      
                    </div>
                </form>         
            </div>
        </div>
    </div>
    <!-- </div>     
    
            </div>
        </div>
    </div> -->
   



    
    
       <!--<script>
// Bind keyup event on the input
$("input[name='out'], input[name='in']").keyup(function() {

// If value is not empty
if ($("input[name='out']").val() == 00 && $("input[name='in']").val() == 0) {
    // Hide the element
    $("input[name='housekeeper']").hide();
    $("label[name='housekeeper']").hide();
} else {
    // Otherwise show it
    $("input[name='housekeeper']").show();
    $("label[name='housekeeper']").show();
}
}).keyup(); // Trigger the keyup event, thus running the handler on page load

</script>-->
<script>
    $('select[name="category"]').on('change', function() {
    // Get the selected option's value
    var selectedValue = $(this).val();

    // Do something with the selected value
    console.log(selectedValue);
});
    </script>
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
    @endsection

    @push('js')
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>

    @endpush
