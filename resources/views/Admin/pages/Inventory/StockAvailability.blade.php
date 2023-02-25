@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
    <script>
        $.noConflict();
        jQuery(document).ready(function($) {
            $('#myTable').DataTable();
            $('#myTables').DataTable();
            $('#myTabless').DataTable();
            $('#myTablessss').DataTable();
        });
        
    </script>
    <div class="container-fluid mt--9">
        <div class="row mt--9">
            <div class="card card-stats col-md-4" style="width: 8rem;">
                <!-- Card body -->
                <div class="card-body" style="height: 85px;">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Hotel Inventory</h5>
                            <span class="h2 font-weight-bold mb-0">

                            </span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-orange text-white rounded-circle shadow">
                                <i class="ni ni-chart-pie-35"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-stats col-md-4" style="width: 8rem;">
                <!-- Card body -->
                <div class="card-body" style="height: 85px;">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Convention Center Inventory</h5>
                            <span class="h2 font-weight-bold mb-0">
                                @foreach ($list2 as $lists2)
                                    @if ($lists2->total <= $lists2->Stock_Level)
                                        <td style="font-size:25px;"><i>{{ $lists2->total }}</i></td>
                                    @else
                                        <td style="font-size:25px;">0</td>
                                    @endif
                                @endforeach
                            </span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-orange text-white rounded-circle shadow">
                                <i class="ni ni-chart-pie-35"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-stats col-md-4">
                <!-- Card body -->
                <div class="card-body" style="height: 85px;">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Requests Inventory</h5>
                            <span class="h2 font-weight-bold mb-0">
                                @foreach ($list3 as $lists3)
                                    @if ($lists3->total <= $lists3->Stock_Level)
                                        <td style="font-size:25px;"><i>{{ $lists3->total }}</i></td>
                                    @else
                                        <td style="font-size:25px;">0</td>
                                    @endif
                                @endforeach
                            </span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-orange text-white rounded-circle shadow">
                                <i class="ni ni-chart-pie-35"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br>
    <div class="container-fluid mt--4">
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
                                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab"
                                        href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1"
                                        aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>Hotel Inventory</a>
                                </li><br><br>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                                        href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
                                        aria-selected="false"><i class="ni ni-bell-55 mr-2"></i>Convetion Center
                                        Inventory</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab"
                                        href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3"
                                        aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Client Requests
                                        Inventory </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-4-tab" data-toggle="tab"
                                        href="#tabs-icons-text-4" role="tab" aria-controls="tabs-icons-text-4"
                                        aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Request Forms</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                                        aria-labelledby="tabs-icons-text-1-tab">
                                        <!--Hotel Stock Inventory-->
                                        <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                            data-target="#exampleModal" style="float:right;">Add Stock</button>
                                        <h3 class="mb-0 title">Hotel Stock Inventory</h3>
                                        <h5 class="mb-0" style="color:#db1212; font-size:16px;">Instructions: Before
                                            starting, see to It that all inventory are in the Storage Area</h5><br><br>

                                        Add Stock
                                        </button>
                                        <table class="table align-items-center" id="myTable">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col" style="font-size:18px;">Action</th>
                                                    <th scope="col" style="font-size:18px;">Product Name</th>
                                                    <th scope="col" style="font-size:18px;">Item Description</th>
                                                    <th scope="col" style="font-size:18px;">Available Stock</th>
                                                    <th scope="col" style="font-size:18px;">Stock Level</th>
                                                    <th scope="col" style="font-size:18px;">Stock Alert</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($list as $lists)
                                                    <tr>
                                                        <td>
                                                            <button class="btn btn-sm btn-primary btn-lg"
                                                                data-toggle="modal"
                                                                data-target="#ModalView{{ $lists->productid }}"><i
                                                                    class="bi bi-eye"></i></button>
                                                            <button class="btn btn-sm btn-warning btn-lg"
                                                                data-toggle="modal"
                                                                data-target="#ModalUpdate{{ $lists->productid }}"><i
                                                                    class="bi bi-pencil-square"></i></button>
                                                        </td>
                                                        <td style="font-size:16px;">{{ $lists->name }}</td>
                                                        <td style="font-size:16px;">{{ $lists->description }}</td>
                                                        <td style="font-size:16px;">{{ $lists->total }}</td>
                                                        <td style="font-size:16px;">{{ $lists->Stock_Level }}</td>
                                                        @if ($lists->total <= $lists->Stock_Level)
                                                            <td style="font-size:25px;"><i
                                                                    class="bi bi-exclamation-triangle-fill"
                                                                    style="color:red;"></i></td>
                                                        @else
                                                            <td style="font-size:25px;"><i class="bi bi-check-square-fill"
                                                                    style="color:green;"></i></td>
                                                        @endif
                                                    </tr>
                                                    <!-- Modal -->
                                                    <!--View-->
                                                    <div class="modal fade text-left"
                                                        id="ModalView{{ $lists->productid }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalCreate"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-left display-4"
                                                                        id="exampleModalCreate">View Details</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label class="text-left">Stock Name </label>
                                                                            <input type="text" class="form-control"
                                                                                name="name" value="{{ $lists->name }}"
                                                                                readonly>
                                                                        </div>
                                                                        <div class="col">
                                                                            <label>Stock Description </label>
                                                                            <input type="text" class="form-control"
                                                                                name="description"
                                                                                value="{{ $lists->description }}"
                                                                                readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col pt-4">
                                                                            <label class="text-left">Date Stock Added
                                                                            </label>
                                                                            <input type="text" class="form-control"
                                                                                name="date"
                                                                                value="{{ date('m-d-Y', strtotime($lists->created_at)) }}"
                                                                                readonly>
                                                                        </div>
                                                                        <div class="col pt-4">
                                                                            <label>Quantity </label>
                                                                            <input type="text" class="form-control"
                                                                                name="total"
                                                                                value="{{ $lists->total }}" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col pt-4">
                                                                            <label for="exampleInputPassword1">Category
                                                                            </label>
                                                                            <input type="text" class="form-control"
                                                                                name="category"
                                                                                value="{{ $lists->category }}" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <!-- <div class="form-group"> -->
                                                                    <!-- </div> -->
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-outline-danger"
                                                                        data-dismiss="modal">Close</button>
                                                                    <!-- <button type="button" class="btn btn-failed" data-dismiss="modal">Close</button> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                    </div>
                                    <!--Update-->
                                    <div class="modal fade text-left" id="ModalUpdate{{ $lists->productid }}"
                                        tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h2 class="modal-title">{{ __('Edit Details') }}</h2>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="{{ url('/edit_stock') }}"
                                                    enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <p class="text-left">Stock ID </p>
                                                                <input class="form-control" type="text"
                                                                    value="{{ $lists->productid }}" readonly>
                                                                <input class="form-control" type="text"
                                                                    name="productid" value="{{ $lists->productid }}"
                                                                    hidden>
                                                            </div>
                                                            <div class="col">
                                                                <p class="text-left">Stock Name </p>
                                                                <input type="text" class="form-control" name="name"
                                                                    value="{{ $lists->name }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="Stockdetails">Stock Description: </label>
                                                            <input type="text" class="form-control" name="description"
                                                                value="{{ $lists->description }}" required>
                                                            <div class="invalid-feedback">
                                                                Stock Details empty
                                                            </div>
                                                            <label for="Stockdetails">Quantity: </label>
                                                            <input type="hidden" name="quantity"
                                                                value="{{ $lists->total }}" />
                                                            <input type="number" class="form-control"
                                                                value="{{ $lists->total }}" readonly>

                                                            <label for="Stockdetails">Stock Level: </label>
                                                            <input type="hidden" name="stock"
                                                                value="{{ $lists->Stock_Level }}" />
                                                            <input type="number" class="form-control"
                                                                value="{{ $lists->Stock_Level }}" readonly>

                                                            <div class="row">
                                                                <div class="col">
                                                                    <label class="text-left pt-4">Stock In </label>
                                                                    <input class="form-control" type="number"
                                                                        name="hotelin" value="0">
                                                                </div>
                                                                <div class="col">
                                                                    <label class="text-left pt-4">Stock Out </label>
                                                                    <input type="number" class="form-control"
                                                                        name="hotelout" value="0">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div>
                                                                        <label class="text-left pt-4" for="textbox2"
                                                                            name="housekeeper">HouseKeeper : </label>
                                                                        <input type="text" class="form-control"
                                                                            name="housekeeper">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="invalid-feedback">
                                                                                                Stock Name empty
                                                                                            </div>        -->
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Category: </label>
                                                            <select class="form-control" value="{{ $lists->category }}"
                                                                name="category" required>
                                                                <option class="cat" disabled>Linens</option>
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
                                                                <option disabled></option>
                                                                <option class="cat" disabled>Guest Supplies</option>
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
                                                                <option disabled></option>
                                                                <option class="cat" disabled>Amenities</option>
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
                                                            <button class="btn btn-outline-danger"
                                                                data-dismiss="modal">Close</button>
                                                            <input type="submit" name="update" value="Update"
                                                                class="btn btn-success" />
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

                                <!--Add Stock for Hotel Inventory-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                        <div class="row">
                            <div class="col">
                                <label for="exampleInputPassword1" class="text-color pt-4">Product ID</label>
                                @foreach ($count as $counts)
                                    @for ($i = 1 + $counts['counts']; $i <= $counts['counts'] + 1; $i++)
                                        <input class="form-control" type="text" value="{{ $i }}"
                                            readonly />
                                        <input type="hidden" name="productid" value="{{ $i }}" />
                                    @endfor
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="exampleInputPassword1" class="text-color pt-4">Category </label>
                                <select class="form-control" id="category" name="category" required>
                                    <option id="lin" value="linens">Linens</option>
                                    <option id="gu" value="guestsupplies">GuestSupplies</option>
                                    <option id="am" value="amenities">Amenities</option>
                                </select>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <label class="text-color">Stock Name  : </label>
                                <div id="linens" style="display:none;">
                                    <select class="form-control" id="linens" name="Linens">
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
                                    </select>
                                </div>
                                <div id="guestsupplies" style="display:none;">
                                    <select class="form-control" id="guestsuplies" name="GuestSupplies">
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
                                    </select>
                                </div>
                                <div id="amenities" style="display:none;">
                                    <select class="form-control" id="amenities" name="Amenities">
                                        <option>Kettle</option>
                                        <option>Tray</option>
                                        <option>Dental Glass</option>
                                        <option>Teaspoon</option>
                                        <option>Cup And Saucer</option>
                                        <option>Hanger</option>
                                        <option>Door Hang</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="Stockdetails" class="text-color pt-4">Stock Description </label>
                                <input type="text" class="form-control" name="description"
                                    placeholder="Enter details..." required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="Stockdetails" class="text-color pt-4">Overall Initial Stock : </label>
                                <input type="text" class="form-control" name="allstock"
                                    placeholder="Enter details..." required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="Stockdetails" class="text-color pt-4">Quantity </label>
                                <input type="number" class="form-control" name="quantity" placeholder="Enter number..."
                                    required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="Stockdetails" class="text-color pt-4">Stock Level </label>
                                <input type="number" class="form-control" name="stock" placeholder="Enter number..."
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-success prevent_submit" value="Submit" />
                    </div>
                </form>
            </div>
        </div>
    </div>

                                <!--Convention Center Inventory-->
                                <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-2-tab">
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                        data-target="#exampleModal2" style="float:right;">Add Stock</button>
                                    <h3 class="mb-0 title">Convention Center Inventory</h3>
                                    <h5 class="mb-0" style="color:#db1212; font-size:16px;">Instructions: Before
                                        Starting, See To It That All Inventory Are In The Storage Area</h5><br><br>
                                    <table class="table align-items-center" id="myTables">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" style="font-size:18px;">Action</th>
                                                <th scope="col" style="font-size:18px;">Product Name</th>
                                                <th scope="col" style="font-size:18px;">Item Description</th>
                                                <th scope="col" style="font-size:18px;">Available Stock</th>
                                                <th scope="col" style="font-size:18px;">Stock Level</th>
                                                <th scope="col" style="font-size:18px;">Stock Alert</th>
                                                <th scope="col" style="font-size:18px;">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($list2 as $lists2)
                                                <tr>
                                                    <td>
                                                        <button type="button" data-toggle="modal"
                                                            data-target="#ModalView2{{ $lists2->productid }}"
                                                            class="btn btn-primary"><i class="bi bi-eye"
                                                                style="padding:2px;">View</i></button>
                                                        <button type="button" data-toggle="modal"
                                                            data-target="#ModalUpdate2{{ $lists2->productid }}"
                                                            class="btn btn-primary"><i
                                                                class="bi bi-pencil-square"style="padding:2px;">Edit</i></button>
                                                    </td>
                                                    <td style="font-size:16px;">{{ $lists2->name }}</td>
                                                    <td style="font-size:16px;">{{ $lists2->description }}</td>
                                                    <td style="font-size:16px;">{{ $lists2->total }}</td>
                                                    <td style="font-size:16px;">{{ $lists2->Stock_Level }}</td>
                                                    @if ($lists2->total <= $lists2->Stock_Level)
                                                        <td><i class="bi bi-exclamation-triangle-fill"
                                                                style="color:red;font-size:20px"></i></td>
                                                    @else
                                                        <td><i class="bi bi-check-square-fill"
                                                                style="color:green;font-size:20px"></i></td>
                                                    @endif
                                                    <td>
                                                </tr>
                                                <!-- Modal -->
                                                <!--View-->
                                                <div class="modal fade text-left" id="ModalView2{{ $lists2->productid }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalCreate"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-left display-4"
                                                                    id="exampleModalCreate">View Details</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <div class="row">
                                                                    <div class="col">
                                                                        <p class="text-left">Stock Name: </p>
                                                                        <input type="text" class="form-control"
                                                                            name="name" value="{{ $lists2->name }}"
                                                                            readonly>
                                                                        <div class="invalid-feedback">
                                                                            Stock Name empty
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Stock Description: </label>
                                                                    <input type="text" class="form-control"
                                                                        name="description"
                                                                        value="{{ $lists2->description }}" readonly>
                                                                    <div class="invalid-feedback">
                                                                        Stock Details empty
                                                                    </div>

                                                                    <label>Date Stock Added: </label>
                                                                    <input type="text" class="form-control"
                                                                        name="date"
                                                                        value="{{ date('m-d-Y', strtotime($lists2->created_at)) }}"
                                                                        readonly>
                                                                    <div class="invalid-feedback">
                                                                        Quantity empty
                                                                    </div>

                                                                    <label>Quantity: </label>
                                                                    <input type="text" class="form-control"
                                                                        name="total" value="{{ $lists2->total }}"
                                                                        readonly>
                                                                    <div class="invalid-feedback">
                                                                        Quantity empty
                                                                    </div>

                                                                </div>
                                                                <label for="exampleInputPassword1">Category: </label>
                                                                <input type="text" class="form-control"
                                                                    name="category" value="{{ $lists2->category }}"
                                                                    readonly>
                                                                <div class="invalid-feedback">
                                                                    Stock Details empty
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-failed"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                <!--Modal Edit-->
                                <div class="modal fade text-left" id="ModalUpdate2{{ $lists2->productid }}"
                                    tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title">{{ __('Edit Details') }}</h2>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST" action="{{ url('/edit_stock_center') }}"
                                                enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="text-left">Stock ID: </p>
                                                            <input class="form-control" type="text"
                                                                value="{{ $lists2->productid }}" readonly>
                                                            <input class="form-control" type="text" name="productid"
                                                                value="{{ $lists2->productid }}" hidden>
                                                        </div>
                                                        <div class="col">
                                                            <p class="text-left">Stock Name: </p>
                                                            <input type="text" class="form-control" name="name"
                                                                value="{{ $lists2->name }}" required>
                                                            <div class="invalid-feedback">
                                                                Stock Name empty
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Stockdetails">Stock Description: </label>
                                                        <input type="text" class="form-control" name="description"
                                                            value="{{ $lists2->description }}" required>
                                                        <div class="invalid-feedback">
                                                            Stock Details empty
                                                        </div>
                                                        <label for="Stockdetails">Quantity: </label>
                                                        <input type="hidden" name="quantity"
                                                            value="{{ $lists2->total }}" />
                                                        <input type="number" class="form-control"
                                                            value="{{ $lists2->total }}" readonly>

                                                        <label for="Stockdetails">Stock Level: </label>
                                                        <input type="hidden" name="stock"
                                                            value="{{ $lists2->Stock_Level }}" />
                                                        <input type="number" class="form-control"
                                                            value="{{ $lists2->Stock_Level }}" readonly>

                                                        <div class="row">
                                                            <div class="col">
                                                                <p class="text-left">Stock In: </p>
                                                                <input class="form-control" type="number" name="in"
                                                                    value="0">
                                                            </div>
                                                            <div class="col">
                                                                <p class="text-left">Stock Out: </p>
                                                                <input type="number" class="form-control" name="out"
                                                                    value="0">
                                                                <div class="invalid-feedback">
                                                                    Stock Name empty
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Category: </label>
                                                        <select class="form-control" value="{{ $lists2->category }}"
                                                            name="category" required>
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
                                                        <input type="submit" name="update" value="Update"
                                                            class="btn btn-success" />
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
                            <!--Add Stock for Convention Center-->
                            <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-left display-4" id="exampleModalLabel">Create
                                                Convention Center Stock</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ url('/addstock_center') }}" class="prevent_submit"
                                            method="POST">
                                            {{ csrf_field() }}
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <p class="text-left">Stock Name: </p>
                                                        <input type="text" class="form-control" name="name"
                                                            placeholder="Enter name..." required>

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Stockdetails">Stock Description: </label>
                                                        <input type="text" class="form-control" name="description"
                                                            placeholder="Enter details..." required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Stockdetails">Quantity: </label>
                                                        <input type="number" class="form-control" name="quantity"
                                                            placeholder="Enter number..." required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Stockdetails">Stock Level: </label>
                                                        <input type="number" class="form-control" name="stock"
                                                            placeholder="Enter number..." required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="exampleInputPassword1">Category: </label>
                                                        <select class="form-control" name="category" required>
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
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                <input type="submit" class="btn btn-success prevent_submit"
                                                    value="Submit" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--Function Rooms inventory-->
                            <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel"
                                aria-labelledby="tabs-icons-text-3-tab">
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                    data-target="#exampleModal3" style="float:right;">Add Stock</button>
                                <h3 class="mb-0 title">Clients Request Inventory</h3>
                                <h5 class="mb-0" style="color:#db1212; font-size:16px;">Instructions: Before Starting,
                                    See To It That All Inventory Are In The Storage Area</h5><br><br>

                                <table class="table align-items-center" id="myTabless">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" style="font-size:16px;">Product Name</th>
                                            <th scope="col" style="font-size:16px;">Item Description</th>
                                            <th scope="col" style="font-size:16px;">Available Stock</th>
                                            <th scope="col" style="font-size:16px;">Stock Level</th>
                                            <th scope="col" style="font-size:16px;">Stock Alert</th>
                                            <th scope="col" style="font-size:16px;">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($list3 as $lists3)
                                            <tr>
                                                <td>{{ $lists3->name }}</td>
                                                <td>{{ $lists3->description }}</td>
                                                <td>{{ $lists3->total }}</td>
                                                <td>{{ $lists3->Stock_Level }}</td>
                                                @if ($lists3->total <= $lists3->Stock_Level)
                                                    <td><i class="bi bi-exclamation-triangle-fill"
                                                            style="color:red;font-size:20px"></i></td>
                                                @else
                                                    <td><i class="bi bi-check-square-fill"
                                                            style="color:green;font-size:20px"></i></td>
                                                @endif
                                                <td>
                                                    <button type="button" data-toggle="modal"
                                                        data-target="#ModalView3{{ $lists3->productid }}"
                                                        class="btn btn-primary"><i class="bi bi-eye"
                                                            style="padding:2px;">View</i></button>
                                                    <button type="button" data-toggle="modal"
                                                        data-target="#ModalUpdate3{{ $lists3->productid }}"
                                                        class="btn btn-primary"><i
                                                            class="bi bi-pencil-square"style="padding:2px;">Edit</i></button>
                                                </td>
                                            </tr>
                                            <!-- Modal -->
                                            <!--View-->
                                            <div class="modal fade text-left" id="ModalView3{{ $lists3->productid }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalCreate"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-left display-4"
                                                                id="exampleModalCreate">View Details</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="row">
                                                                <div class="col">
                                                                    <p class="text-left">Stock Name: </p>
                                                                    <input type="text" class="form-control"
                                                                        name="name" value="{{ $lists3->name }}"
                                                                        readonly>
                                                                    <div class="invalid-feedback">
                                                                        Stock Name empty
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Stock Description: </label>
                                                                <input type="text" class="form-control"
                                                                    name="description" value="{{ $lists3->description }}"
                                                                    readonly>
                                                                <div class="invalid-feedback">
                                                                    Stock Details empty
                                                                </div>

                                                                <label>Date Stock Added: </label>
                                                                <input type="text" class="form-control" name="date"
                                                                    value="{{ date('m-d-Y', strtotime($lists3->created_at)) }}"
                                                                    readonly>
                                                                <div class="invalid-feedback">
                                                                    Quantity empty
                                                                </div>

                                                                <label>Quantity: </label>
                                                                <input type="text" class="form-control" name="total"
                                                                    value="{{ $lists3->total }}" readonly>
                                                                <div class="invalid-feedback">
                                                                    Quantity empty
                                                                </div>

                                                            </div>
                                                            <label for="exampleInputPassword1">Category: </label>
                                                            <input type="text" class="form-control" name="category"
                                                                value="{{ $lists3->category }}" readonly>
                                                            <div class="invalid-feedback">
                                                                Stock Details empty
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-failed"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Modal Edit-->
                                            <div class="modal fade text-left" id="ModalUpdate3{{ $lists3->productid }}"
                                                tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h2 class="modal-title">{{ __('Edit Details') }}</h2>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="POST" action="{{ url('/edit_stock_function') }}"
                                                            enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <p class="text-left">Stock ID: </p>
                                                                        <input class="form-control" type="text"
                                                                            value="{{ $lists3->productid }}" readonly>
                                                                        <input class="form-control" type="text"
                                                                            name="productid"
                                                                            value="{{ $lists3->productid }}" hidden>
                                                                    </div>
                                                                    <div class="col">
                                                                        <p class="text-left">Stock Name: </p>
                                                                        <input type="text" class="form-control"
                                                                            name="name" value="{{ $lists3->name }}"
                                                                            required>
                                                                        <div class="invalid-feedback">
                                                                            Stock Name empty
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Stockdetails">Stock Description: </label>
                                                                    <input type="text" class="form-control"
                                                                        name="description"
                                                                        value="{{ $lists3->description }}" required>
                                                                    <div class="invalid-feedback">
                                                                        Stock Details empty
                                                                    </div>
                                                                    <label for="Stockdetails">Quantity: </label>
                                                                    <input type="hidden" name="quantity"
                                                                        value="{{ $lists3->total }}" />
                                                                    <input type="number" class="form-control"
                                                                        value="{{ $lists3->total }}" readonly>

                                                                    <label for="Stockdetails">Stock Level: </label>
                                                                    <input type="hidden" name="stock"
                                                                        value="{{ $lists3->Stock_Level }}" />
                                                                    <input type="number" class="form-control"
                                                                        value="{{ $lists3->Stock_Level }}" readonly>

                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <p class="text-left">Stock In: </p>
                                                                            <input class="form-control" type="number"
                                                                                name="in" value="0">
                                                                        </div>
                                                                        <div class="col">
                                                                            <p class="text-left">Stock Out: </p>
                                                                            <input type="number" class="form-control"
                                                                                name="out" value="0">
                                                                            <div class="invalid-feedback">
                                                                                Stock Name empty
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputPassword1">Category: </label>
                                                                    <select class="form-control"
                                                                        value="{{ $lists3->category }}" name="category"
                                                                        required>
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
                                                                    <a class="btn btn-failed"
                                                                        data-dismiss="modal">Close</a>
                                                                    <input type="submit" name="update" value="Update"
                                                                        class="btn btn-success" />
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
                            <!--Add Stock for Function Rooms-->
                            <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-left display-4" id="exampleModalLabel">Create
                                                Function Room Stock</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ url('/addstock_function') }}" class="prevent_submit"
                                            method="POST">
                                            {{ csrf_field() }}
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <p class="text-left">Stock Name: </p>
                                                        <input type="text" class="form-control" name="name"
                                                            placeholder="Enter name..." required>

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Stockdetails">Stock Description: </label>
                                                        <input type="text" class="form-control" name="description"
                                                            placeholder="Enter details..." required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Stockdetails">Quantity: </label>
                                                        <input type="number" class="form-control" name="quantity"
                                                            placeholder="Enter number..." required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Stockdetails">Stock Level: </label>
                                                        <input type="number" class="form-control" name="stock"
                                                            placeholder="Enter number..." required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="exampleInputPassword1">Category: </label>
                                                        <select class="form-control" name="category" required>
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
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                <input type="submit" class="btn btn-success prevent_submit"
                                                    value="Submit" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--Purchase Report-->
                            <div class="tab-pane fade" id="tabs-icons-text-4" role="tabpanel"
                                aria-labelledby="tabs-icons-text-4-tab">
                                <h3 class="mb-0 title">Report Inventory</h3>
                                <h5 class="mb-0" style="color:#db1212; font-size:16px;">Instructions: Before starting,
                                    see to It that all inventory are in the Storage Area</h5><br><br>
                                <table class="table align-items-center table-flush" id="myTablessss">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" style="font-size:16px;">Action</th>
                                            <th scope="col" style="font-size:16px;">Item Name</th>
                                            <th scope="col" style="font-size:16px;">Department</th>
                                            <th scope="col" style="font-size:16px;">Name of Supervisor</th>
                                            <th scope="col" style="font-size:16px;">Date</th>
                                            <th scope="col" style="font-size:16px;">Stock Level</th>
                                            <th scope="col" style="font-size:16px;">Stock Alert</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list4 as $lists4)
                                            <tr>
                                                
                                                <td>
                                                    <button type="button" data-toggle="modal"
                                                        data-target="#ModalView4{{ $lists4->productid }}"
                                                        class="btn btn-primary"><i class="bi bi-eye"
                                                            style="padding:2px;">View</i></button>
                                                    <button type="button" data-toggle="modal"
                                                        data-target="#ModalUpdate4{{ $lists4->productid }}"
                                                        class="btn btn-primary"><i
                                                            class="bi bi-pencil-square"style="padding:2px;">Edit</i></button>
                                                </td>
                                            </tr>

                                            <!--MODAL FOR VIEW-->
                                            <div class="modal fade" id="ModalView4{{ $lists4->productid }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                
                                            </div>


                                            <!--MODAL FOR Update-->
                                            <div class="modal fade" id="ModalUpdate4{{ $lists4->productid }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                    <label>Status: </label>
                                                        <select class="form-control" value="" name="status" required>
                                                        <option>Requesting</option>
                                                        <option>Paid</option>
                                                        <option>Unpaid</option>
                                                        </select>
                                                        
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
                <!---->
                <!--Modalfor History-->
                
            </div>
        </div>
    </div>
    </div>

    <script>
        /*var $j = jQuery.noConflict();
        $j("input[name='hotelout'], input[name='hotelin']").keyup(function() {
        // Bind keyup event on the input
        // If value is not empty
        if ($("input[name='hotelout']").val() == "" && $("input[name='hotelin']").val() == "") {
            // Hide the element
            $("input[name='housekeeper']").hide();
            $("label[name='housekeeper']").hide();
        } else {
            // Otherwise show it
            $("input[name='housekeeper']").show();
            $("label[name='housekeeper']").show();
        }
        }).keyup();  // Trigger the keyup event, thus running the handler on page load*/

        var $j = jQuery.noConflict();
$j("input[name='hotelout'], input[name='hotelin']").keyup(function() {
    // Bind keyup event on the input
    // If value is not empty
    if ($j.trim($j("input[name='hotelout']").val()) == 0 && $j.trim($j("input[name='hotelin']").val()) == 0) {
        // Hide the element
        $j("input[name='housekeeper']").hide();
        $j("label[name='housekeeper']").hide();
    } else {
        // Otherwise show it
        $j("input[name='housekeeper']").show();
        $j("label[name='housekeeper']").show();
    }
}).keyup();// Trigger the keyup event, thus running the handler on page load

        function changeValue() {
            var textboxNumbers = document.getElementById("childs").value;
            balls.innerHTML = '';
            var i;

            for (i = 0; i < textboxNumbers; i++) {
                var yourTextboxes = document.createElement("INPUT");
                yourTextboxes.setAttribute("type", "text");
                yourTextboxes.classList.add("form-control");
                yourTextboxes.setAttribute("placeholder", "Enter Here");
                document.getElementById("balls").appendChild(yourTextboxes);
            }

            var dropdowns = document.getElementById("childs").value;
            document.getElementById("ballses").innerHTML = '';

            for (i = 0; i < dropdowns; i++) {
                var yourDropdown = document.createElement("SELECT");
                yourDropdown.classList.add("form-control");

                var option1 = document.createElement("OPTION");
                option1.setAttribute("value", "Option 1");
                option1.innerHTML = "Sugar";
                yourDropdown.appendChild(option1);

                var option2 = document.createElement("OPTION");
                option2.setAttribute("value", "Option 2");
                option2.innerHTML = "Toothbrush";
                yourDropdown.appendChild(option2);

                var option3 = document.createElement("OPTION");
                option3.setAttribute("value", "Option 3");
                option3.innerHTML = "Shampoo";
                yourDropdown.appendChild(option3);

                var option4 = document.createElement("OPTION");
                option4.setAttribute("value", "Option 4");
                option4.innerHTML = "Bedsheet";
                yourDropdown.appendChild(option4);

                var option5 = document.createElement("OPTION");
                option5.setAttribute("value", "Option 5");
                option5.innerHTML = "Dental Kit";
                yourDropdown.appendChild(option5);

                var option6 = document.createElement("OPTION");
                option6.setAttribute("value", "Option 6");
                option6.innerHTML = "Hand Towel";
                yourDropdown.appendChild(option6);

                var option7 = document.createElement("OPTION");
                option7.setAttribute("value", "Option 7");
                option7.innerHTML = "Bath Towel";
                yourDropdown.appendChild(option7);

                var option8 = document.createElement("OPTION");
                option8.setAttribute("value", "Option 8");
                option8.innerHTML = "Coffee";
                yourDropdown.appendChild(option8);

                var option9 = document.createElement("OPTION");
                option9.setAttribute("value", "Option 9");
                option9.innerHTML = "Creamer";
                yourDropdown.appendChild(option9);

                var option10 = document.createElement("OPTION");
                option10.setAttribute("value", "Option 10");
                option10.innerHTML = "Hanger";
                yourDropdown.appendChild(option10);

                var option11 = document.createElement("OPTION");
                option11.setAttribute("value", "Option 11");
                option11.innerHTML = "Queen Sheet";
                yourDropdown.appendChild(option11);

                var option12 = document.createElement("OPTION");
                option12.setAttribute("value", "Option 12");
                option12.innerHTML = "Pillows";
                yourDropdown.appendChild(option12);

                var option13 = document.createElement("OPTION");
                option13.setAttribute("value", "Option 13");
                option13.innerHTML = "Pillow Case";
                yourDropdown.appendChild(option13);

                document.getElementById("ballses").appendChild(yourDropdown);
            }
        }




        function pax_on_change() {
            changeValue();
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#category").change(function() {
                var selected = $("option:selected", this).val();
                if (selected == 'linens') {
                    $('#linens').css({
                        'display': 'block'
                    });
                    $('#guestsupplies').css({
                        'display': 'none'
                    });
                    $('#amenities').css({
                        'display': 'none'
                    });
                } else if (selected == 'guestsupplies') {
                    $('#linens').css({
                        'display': 'none'
                    });
                    $('#guestsupplies').css({
                        'display': 'block'
                    });
                    $('#amenities').css({
                        'display': 'none'
                    });
                } else if (selected == 'amenities') {
                    $('#linens').css({
                        'display': 'none'
                    });
                    $('#guestsupplies').css({
                        'display': 'none'
                    });
                    $('#amenities').css({
                        'display': 'block'
                    });
                }
            });
        });
    </script>

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endpush
