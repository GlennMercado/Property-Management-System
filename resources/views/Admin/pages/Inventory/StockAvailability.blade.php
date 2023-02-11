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
        // Code that uses other library's $ can follow here.
    </script>
    <div class="container-fluid mt--9">
        <div class="row mt--9">
            <div class="card card-stats col-md-3" style="width: 8rem;">
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
            <div class="card card-stats col-md-3" style="width: 8rem;">
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
            <div class="card card-stats col-md-3">
                <!-- Card body -->
                <div class="card-body" style="height: 85px;">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Function Room Inventory</h5>
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
            <div class="card card-stats col-md-3" style="width: 8rem;">
                <!-- Card body -->
                <div class="card-body" style="height: 85px;">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">History</h5>
                            <span class="h2 font-weight-bold mb-0">
                                
                            </span>
                        </div>
                        <div class="col-auto">
                            <div >
                                <button type="button" class="btn btn-outline-primary icon icon-shape bg-orange text-white rounded-circle shadow" data-toggle="modal"
                                data-target="#HistoryModal" style="float:right;"><i class="ni ni-chart-pie-35"></i></button>
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
                                        aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Function Rooms
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
                                                    <th scope="col" style="font-size:18px;">Product Name</th>
                                                    <th scope="col" style="font-size:18px;">Item Description</th>
                                                    <th scope="col" style="font-size:18px;">Available Stock</th>
                                                    <th scope="col" style="font-size:18px;">Stock Level</th>
                                                    <th scope="col" style="font-size:18px;">Stock Alert</th>
                                                    <th scope="col" style="font-size:18px;">Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($list as $lists)
                                                    <tr>
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
                                                                                value="{{ $lists->description }}" readonly>
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
                                                                        name="in" value="0">
                                                                </div>
                                                                <div class="col">
                                                                    <label class="text-left pt-4">Stock Out </label>
                                                                    <input type="number" class="form-control"
                                                                        name="out" value="0">
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
                                                                <option value="Invalid" class="cat">Linens</option>
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
                                                                <option value="Invalid" class="cat">Guest Supplies
                                                                </option>
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
                                                                <option value="Invalid" class="cat">Amenities</option>
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
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-left display-4" id="exampleModalLabel">Create
                                                    Hotel Stock</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ url('/addstock') }}" class="prevent_submit" method="POST">
                                                {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <label class="text-color">Stock Name </label>
                                                            <input type="text" class="form-control" name="name"
                                                                placeholder="Enter name..." required>

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Stockdetails" class="text-color pt-4">Stock
                                                                Description </label>
                                                            <input type="text" class="form-control" name="description"
                                                                placeholder="Enter details..." required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Stockdetails" class="text-color pt-4">Quantity
                                                            </label>
                                                            <input type="number" class="form-control" name="quantity"
                                                                placeholder="Enter number..." required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Stockdetails" class="text-color pt-4">Stock Level
                                                            </label>
                                                            <input type="number" class="form-control" name="stock"
                                                                placeholder="Enter number..." required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="exampleInputPassword1"
                                                                class="text-color pt-4">Category </label>
                                                            <select class="form-control" name="category" required>
                                                                <option value="Invalid" class="cat">Linens </option>
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
                                                                <option value="Invalid" class="cat">Guest Supplies
                                                                </option>
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
                                                                <option value="Invalid" class="cat">Amenities </option>
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
                                                    <button class="btn btn-outline-danger"
                                                        data-dismiss="modal">Close</button>
                                                    <!-- <a class="btn btn-secondary" data-dismiss="modal">Close</a> -->
                                                    <input type="submit" class="btn btn-success prevent_submit"
                                                        value="Submit" />
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
                                                        <button type="button" data-toggle="modal"
                                                            data-target="#ModalView2{{ $lists2->productid }}"
                                                            class="btn btn-primary"><i class="bi bi-eye"
                                                                style="padding:2px;">View</i></button>
                                                        <button type="button" data-toggle="modal"
                                                            data-target="#ModalUpdate2{{ $lists2->productid }}"
                                                            class="btn btn-primary"><i
                                                                class="bi bi-pencil-square"style="padding:2px;">Edit</i></button>
                                                    </td>
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
                                <h3 class="mb-0 title">Function Rooms Inventory</h3>
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
                                <button class="btn btn-outline-primary" class="btn btn-primary" data-toggle="modal"
                                    data-target="#PurchaseReportModal" style="float:right;">Make Report</button>
                                <h3 class="mb-0 title">Stock Purchase Reports</h3>
                                <h5 class="mb-0" style="color:#db1212; font-size:16px;">Instructions: Before starting,
                                    see to It that all inventory are in the Storage Area</h5><br><br>
                                <table class="table align-items-center table-flush" id="myTablessss">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" style="font-size:16px;">Item Name</th>
                                            <th scope="col" style="font-size:16px;">Department</th>
                                            <th scope="col" style="font-size:16px;">Name of Supervisor</th>
                                            <th scope="col" style="font-size:16px;">Date</th>
                                            <th scope="col" style="font-size:16px;">Stock Level</th>
                                            <th scope="col" style="font-size:16px;">Stock Alert</th>
                                            <th scope="col" style="font-size:16px;">file</th>
                                            <th scope="col" style="font-size:16px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list4 as $lists4)
                                            <tr>
                                                <td style="font-size:14px;">{{ $lists4->name }}</td>
                                                <td style="font-size:14px;">{{ $lists4->suppliername }}</td>
                                                <td style="font-size:14px;">{{ $lists4->description }}</td>
                                                <td style="font-size:14px;">{{ $lists4->quantity }}</td>
                                                <td style="font-size:14px;">{{ $lists4->Stock_Level }}</td>
                                                <td style="font-size:14px;">{{ $lists4->Stock_Level }}</td>
                                                @if ($lists4->quantity <= $lists4->Stock_Level)
                                                    <td style="font-size:25px;"><i class="bi bi-exclamation-triangle-fill"
                                                            style="color:red;"></i></td>
                                                @else
                                                    <td style="font-size:25px;"><i class="bi bi-check-square-fill"
                                                            style="color:green;"></i></td>
                                                @endif
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
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-left display-4"
                                                                id="exampleModalLabel">View All Details</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="card-body bg-white"
                                                                    style="border-radius: 18px">
                                                                    <p class="text-left">Item Name :
                                                                        <input class="form-control" type="text"
                                                                            name="name" value="{{ $lists4->name }}"
                                                                            readonly>
                                                                    </p>

                                                                    <p class="text-left">Product Description :
                                                                        <input class="form-control" type="text"
                                                                            name="description"
                                                                            value="{{ $lists4->description }}" readonly>
                                                                    </p>

                                                                    <p class="text-left">Purchased Date :
                                                                        <input class="form-control" type="text"
                                                                            name="date"
                                                                            value="{{ date('m-d-Y', strtotime($lists4->date)) }}"
                                                                            readonly>
                                                                    </p>

                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <p class="text-left">Unit :
                                                                                <input class="form-control" type="number"
                                                                                    placeholder="Enter Here.."
                                                                                    name="unit"
                                                                                    value="{{ $lists4->unit }}" readonly>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col">
                                                                            <p class="text-left">Quantity :
                                                                                <input class="form-control" type="text"
                                                                                    name="quantity"
                                                                                    value="{{ $lists4->quantity }}"
                                                                                    readonly>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <p class="text-left">Supplier Name :
                                                                        <input class="form-control" type="text"
                                                                            name="suppliername"
                                                                            value="{{ $lists4->suppliername }}" readonly>
                                                                    </p>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-outline-danger"
                                                                data-dismiss="modal">Close</button>
                                                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!--MODAL FOR Update-->
                                            <div class="modal fade" id="ModalUpdate4{{ $lists4->productid }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-left display-4"
                                                                id="exampleModalLabel">Purchase Report</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form class="needs-validation" action="{{ url('/edit_report') }}"
                                                            method="POST">
                                                            {{ csrf_field() }}
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="card-body bg-white"
                                                                        style="border-radius: 18px">
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <input class="form-control" type="text"
                                                                                    name="productid"
                                                                                    value="{{ $lists4->productid }}"
                                                                                    hidden>
                                                                                <p class="text-left">Item Name :
                                                                                    <input class="form-control"
                                                                                        type="text" name="name"
                                                                                        value="{{ $lists4->name }}"
                                                                                        required>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <p class="text-left">Item Description :
                                                                            <input class="form-control" type="text"
                                                                                placeholder="Enter Here.."
                                                                                name="description"
                                                                                value="{{ $lists4->description }}"
                                                                                required>
                                                                        </p>
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <p class="text-left">Unit :
                                                                                    <input class="form-control"
                                                                                        type="number"
                                                                                        placeholder="Enter Here.."
                                                                                        name="unit"
                                                                                        value="{{ $lists4->unit }}"
                                                                                        required>
                                                                                </p>
                                                                            </div>
                                                                            <div class="col">
                                                                                <p class="text-left">Quantity :
                                                                                    <input class="form-control"
                                                                                        type="number"
                                                                                        placeholder="Enter Here.."
                                                                                        name="quantity"
                                                                                        value="{{ $lists4->quantity }}"
                                                                                        required>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <p class="text-left">Supplier Name: </p>
                                                                        <select class="form-control" name="suppliername"
                                                                            value="{{ $lists4->productid }}" required>
                                                                            <option>Sample Supplier 1</option>
                                                                            <option>Sample Supplier 2</option>
                                                                            <option>Sample Supplier 3</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-success">Submit</button>
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
                            <div class="modal fade" id="PurchaseReportModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-left display-4" id="exampleModalLabel">Purchase
                                                Report</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ url('/report') }}" class="prevent_submit" method="POST">
                                            {{ csrf_field() }}
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="card-body bg-white" style="border-radius: 18px">
                                                        <div class="row">
                                                            <div class="col">
                                                                <label class="text-left text-color">Item Name </label>
                                                                <input class="form-control mt-2" type="text"
                                                                    name="name" placeholder="Enter Here.." required>
                                                            </div>
                                                        </div>
                                                        <label class="text-left pt-4 text-color">Item Description </label>
                                                        <input class="form-control mt-2" type="text"
                                                            placeholder="Enter Here.." name="description" required>
                                                        <div class="row">
                                                            <div class="col">
                                                                <label class="text-left pt-4 text-color">Unit </label>
                                                                <input class="form-control mt-2" type="number"
                                                                    placeholder="Enter Here.." name="unit" required>
                                                            </div>
                                                            <div class="col">
                                                                <label class="text-left pt-4 text-color">Quantity </label>
                                                                <input class="form-control mt-2" type="number"
                                                                    placeholder="Enter Here.." name="quantity" required>
                                                            </div>
                                                            <div class="col">
                                                                <label class="text-left pt-4 text-color">Stock Level
                                                                    :</label>
                                                                <input class="form-control" type="number"
                                                                    placeholder="Enter Here.." name="stock" required>
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
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!---->
                            <!--Modalfor History-->
                            <div class="modal fade bd-example-modal-lg" id="HistoryModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <table class="table align-items-center table-flush" id="myTablessss">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col" style="font-size:18px;">Movement</th>
                                                    <th scope="col" style="font-size:18px;">Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($list4 as $lists4)
                                                    <tr>
                                                        <td style="font-size:16px;">{{ $lists4->name }}</td>
                                                        <td style="font-size:16px;">{{ $lists4->suppliername }}</td>
                                                        <td style="font-size:16px;">{{ $lists4->description }}</td>
                                                        <td style="font-size:16px;">{{ $lists4->quantity }}</td>
                                                        <td style="font-size:16px;">{{ $lists4->Stock_Level }}</td>
                                                        <td style="font-size:16px;">{{ $lists4->Stock_Level }}</td>
                                                        <td style="font-size:16px;">{{ $lists4->Stock_Level }}</td>
                                                        @if ($lists4->quantity <= $lists4->Stock_Level)
                                                            <td style="font-size:25px;"><i class="bi bi-exclamation-triangle-fill"
                                                                    style="color:red;"></i></td>
                                                        @else
                                                            <td style="font-size:25px;"><i class="bi bi-check-square-fill"
                                                                    style="color:green;"></i></td>
                                                        @endif
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
                                                </table>
                                                @endforeach
                                        
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
