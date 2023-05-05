@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <!-- Script tag for datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
    <script>
        $('.prevent_submit').on('submit', function() {
            $('.prevent_submit').attr('disabled', 'true');
        });
        $.noConflict();
        jQuery(document).ready(function($) {
            $('#myTable').DataTable();
            $('#myTale').DataTable();
        });
    </script>

    <div class="container-fluid mt--8">
        <div class="row align-items-center py-4">
            <div class="col-lg-12 col-12">
                <h6 class="h2 text-dark d-inline-block mb-0">Hotel Stocks</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item">Inventory</li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">Hotel Stocks</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card" data-toggle="modal" data-target="#stock-history-modal">

                </div>
            </div>
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="mb-0" style="color:#e40808; font-size:14px;">Instructions: Before starting, see
                                    to It that all inventory are in the Storage Area</h4>
                                <h4 class="mb-0" style="color:#e40808; font-size:14px;">Instructions: Distribute Linen and
                                    Guest Supply Before the Availability of the room.</h4>
                            </div>
                            <div class="row mr-2">
                                <div class="col">
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                        data-target="#exampleModal" style="float:right">
                                        Add Stock
                                    </button>
                                </div>
                                <div class="col">
                                    <div class="" data-toggle="modal" data-target="#stock-history-modal">
                                        <button class="btn btn-success">Stock Histories</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-flush datatable datatable-Stock" id="myTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" style="font-size:16px;">Action</th>
                                        <th scope="col" style="font-size:16px;">Product Name</th>
                                        <th scope="col" style="font-size:16px;">Category</th>
                                        <th scope="col" style="font-size:16px;">Item Description</th>
                                        <th scope="col" style="font-size:16px;">Available Stock</th>
                                        <th scope="col" style="font-size:16px;">Stock Level</th>
                                        <th scope="col" style="font-size:16px;">Yearly Stock</th>
                                        <th scope="col" style="font-size:16px;">Price</th>
                                        <th scope="col" style="font-size:16px;">Stock Alert</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($list as $lists)
                                        <tr>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-sm" data-toggle="modal"
                                                    data-target="#ModalView{{ $lists->productid }}"><i class="bi bi-eye"
                                                        title="View Stock"></i></button>
                                                <button class="btn btn-sm btn-success btn-sm" data-toggle="modal"
                                                    data-target="#ModalUpdate{{ $lists->productid }}"><i
                                                        class="bi bi-pencil-square" title="Edit Stock"></i></button>
                                                <button class="btn btn-sm btn-info btn-sm" data-toggle="modal"
                                                    data-target="#ModalAdd{{ $lists->productid }}"><i class="bi bi-plus"
                                                        title="Add Stock"></i></button>
                                            </td>
                                            <td style="font-size:14px;">{{ $lists->name }}</td>
                                            <td style="font-size:14px;">{{ $lists->category }}</td>
                                            <td style="font-size:14px;">{{ $lists->description }}</td>
                                            <td style="font-size:14px;">{{ $lists->total }}</td>
                                            <td style="font-size:14px;">{{ $lists->Stock_Level }}</td>
                                            <td style="font-size:14px;">{{ $lists->allstock }}</td>
                                            <td style="font-size:14px;">{{ $lists->price }}</td>
                                            @if ($lists->total <= $lists->Stock_Level)
                                                <td style="font-size:20px;"><i class="bi bi-exclamation-triangle-fill"
                                                        style="color:red;"></i></td>
                                            @else
                                                <td style="font-size:20px;"><i class="bi bi-check-square-fill"
                                                        style="color:green;"></i></td>
                                            @endif
                                        </tr>
                                        <!-- Modal -->
                                        <!--View-->
                                        <div class="modal fade text-left" id="ModalView{{ $lists->productid }}"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalCreate"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-left display-4"
                                                            id="exampleModalCreate">
                                                            View
                                                            Details</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <label class="text-left">Stock Name </label>
                                                                <input type="text" class="form-control" name="name"
                                                                    value="{{ $lists->name }}" readonly>
                                                            </div>
                                                            <div class="col">
                                                                <label>Stock Description </label>
                                                                <input type="text" class="form-control"
                                                                    name="description" value="{{ $lists->description }}"
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col pt-4">
                                                                <label class="text-left">All Stock </label>
                                                                <input type="text" class="form-control"
                                                                    name="allstock" value="{{ $lists->allstock }}"
                                                                    readonly>
                                                            </div>
                                                            <div class="col pt-4">
                                                                <label>Date Stock Added </label>
                                                                <input type="text" class="form-control" name="date"
                                                                    value="{{ date('m-d-Y', strtotime($lists->created_at)) }}"
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 pt-4">
                                                                <label for="exampleInputPassword1">Quantity </label>
                                                                <input type="text" class="form-control" name="total"
                                                                    value="{{ $lists->total }}" readonly>
                                                            </div>
                                                            <div class="col-md-6 pt-4">
                                                                <label for="exampleInputPassword1">Category </label>
                                                                <input type="text" class="form-control"
                                                                    name="category" value="{{ $lists->category }}"
                                                                    readonly>
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


                                        <!--Modal Update / validation-->
                                        <div class="modal fade text-left" id="ModalUpdate{{ $lists->productid }}"
                                            tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <div class="container">
                                                            <h1 class="modal-title">Edit Stock</h1>
                                                        </div>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="POST" action="{{ url('/edit_stock') }}"
                                                        enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                        <div class="container">
                                                            <div class="modal-body">

                                                                <div class="row">
                                                                    <div class="col-md">
                                                                        <label class="text-left">Stock ID </label>
                                                                        <input class="form-control" type="text"
                                                                            value="{{ $lists->productid }}" readonly>
                                                                        <input class="form-control" type="text"
                                                                            name="productid"
                                                                            value="{{ $lists->productid }}" hidden>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-6 pt-4">
                                                                        <label class="text-left">Stock Category</label>
                                                                        <input type="text" class="form-control"
                                                                            name="category"
                                                                            value="{{ $lists->category }}" required
                                                                            maxlength="32" readonly>
                                                                    </div>
                                                                    <div class="col-md-6 pt-4">
                                                                        <label class="text-left">Stock Name </label>
                                                                        <input type="text" class="form-control"
                                                                            name="name" value="{{ $lists->name }}"
                                                                            required maxlength="32" readonly>
                                                                    </div>
                                                                    <input type="hidden" name="quantity"
                                                                        value="{{ $lists->total }}" required
                                                                        maxlength="32" hidden>
                                                                </div>

                                                                <div class="row mt-4">
                                                                    <div class="col-md-6">
                                                                        <label>Stock In</label>
                                                                        <div class="input-group input-group-sm">

                                                                            <div class="input-group-prepend">
                                                                                <button class="btn btn-success"
                                                                                    type="button"
                                                                                    onclick="decrementValue()">-</button>
                                                                            </div>
                                                                            <input type="number"
                                                                                class="form-control text-center"
                                                                                value="0" min="0"
                                                                                max="99999"
                                                                                oninput="validity.valid||(value='');"
                                                                                id="numberInput" name="in"
                                                                                style="width: 50px;">
                                                                            <div class="input-group-append">
                                                                                <button class="btn btn-success"
                                                                                    type="button"
                                                                                    onclick="incrementValue()">+</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{-- <div class="col-md-6">
                                                                        <label>Stock Out</label>
                                                                        <div class="input-group input-group-sm">

                                                                            <div class="input-group-prepend">
                                                                                <button class="btn btn-success"
                                                                                    type="button"
                                                                                    onclick="decrementValue2()">-</button>
                                                                            </div>
                                                                            <input type="number"
                                                                                class="form-control text-center"
                                                                                value="0" min="0"
                                                                                max="99999"
                                                                                oninput="validity.valid||(value='');"
                                                                                id="numberInput2" name="out"
                                                                                style="width: 50px;">
                                                                            <div class="input-group-append">
                                                                                <button class="btn btn-success"
                                                                                    type="button"
                                                                                    onclick="incrementValue2()">+</button>
                                                                            </div>
                                                                        </div>
                                                                    </div> --}}
                                                                </div>

                                                                {{-- <div class="row">
                                                                    <div class="col-md-6 ">
                                                                        <label class="text-left">Stock In </label>
                                                                        <input class="form-control" type="number"
                                                                            name="in" value="0"
                                                                            onKeyPress="if(this.value.length==5) return false;">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label class="text-left">Stock Out </label>
                                                                        <input type="number" class="form-control"
                                                                            name="out" value="0"
                                                                            onKeyPress="if(this.value.length==5) return false;">
                                                                    </div>
                                                                </div> --}}
                                                            </div>

                                                            <!-- <div class="invalid-feedback">
                                                                                                Stock Name empty
                                                                                                </div>        -->
                                                            <div class="modal-footer">
                                                                <button class="btn btn-outline-danger"
                                                                    data-dismiss="modal">Close</button>
                                                                <!-- <a class="btn btn-failed" data-dismiss="modal">Close</a> -->
                                                                <input type="submit" name="update" value="Update"
                                                                    class="btn btn-success" />
                                                            </div>
                                                        </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>

                                        <!--ADD DETAILS MODAL FOR ROOM STOCK-->
                                        <div class="modal fade text-left" id="ModalAdd{{ $lists->productid }}"
                                            tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title">{{ __('Add Room Supply') }}</h2>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="POST" action="{{ url('/add_stock_room') }}"
                                                        enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                        <div class="container">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="Stockdetails">Product Name </label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $lists->name }}" readonly>
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $lists->productid }}" />
                                                                        <input type="hidden" name="name"
                                                                            value="{{ $lists->name }}" />
                                                                        <input type="hidden" name="price"
                                                                            value="{{ $lists->price }}" />
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="Stockdetails">Category </label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $lists->category }}" readonly>
                                                                        <input type="hidden" name="category"
                                                                            value="{{ $lists->category }}">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6 pt-4">
                                                                        <label for="Stockdetails">Room Number </label>
                                                                        <select name="roomno" class="form-control"
                                                                            required>
                                                                            <option value="" selected="true"
                                                                                disabled="disabled">Select
                                                                            </option>
                                                                            @foreach ($count2 as $counts2)
                                                                                @for ($i = $counts2['Room_No']; $i <= $counts2['Room_No']; $i++)
                                                                                    @if ($i != 0)
                                                                                        <option
                                                                                            value="{{ $i }}">
                                                                                            {{ $i }}</option>
                                                                                    @endif
                                                                                @endfor
                                                                            @endforeach
                                                                        </select>

                                                                    </div>
                                                                    <div class="col-md-6 pt-4">
                                                                        <label for="Stockdetails">Quantity </label>
                                                                        <input type="number" class="form-control"
                                                                            name="quantity" placeholder="Enter number..."
                                                                            min="0"
                                                                            onKeyPress="if(this.value.length==5) return false;"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer pt-4">
                                                                <button class="btn btn-outline-danger"
                                                                    data-dismiss="modal">Close</button>
                                                                <input type="submit" name="update" value="Add"
                                                                    class="btn btn-success" />
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
    <!--Add Stock-->
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
                                <label for="exampleInputPassword1" class="text-color pt-2">Product ID</label>
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
                                    <option value="" selected="true" disabled="disabled">Select</option>
                                    <option id="lin" value="Linen">Linens</option>
                                    <option id="gu" value="Guest Supply">Guest Supplies</option>
                                    <!-- <option id="am" value="Amenities">Amenities</option> -->
                                </select>
                            </div>
                        </div>
                        <div class="row pt-4">
                            <div class="col">
                                {{-- <label class="text-color">Stock Name </label> --}}
                                <div id="linens" style="display:none;">
                                    <label for="">Choose Linen</label>
                                    <select class="form-control" id="linens" name="Linens">
                                        <option value="Bed pad - Single">Bed pad - Single</option>
                                        <option value="Fitted Sheet - Single">Fitted Sheet - Single</option>
                                        <option value="Flat Sheet - Single">Flat Sheet - Single</option>
                                        <option value="Duvet Filler - Single">Duvet Filler - Single</option>
                                        <option value="Duvet Cover - Single">Duvet Cover - Single</option>
                                        <option value="Pillows">Pillows</option>
                                        <option value="Bed pad - Queen">Bed pad - Queen</option>
                                        <option value="Fitted Sheet - Queen">Fitted Sheet - Queen</option>
                                        <option value="Flat Sheet - Queen">Flat Sheet - Queen</option>
                                        <option value="Duvet Filler - Queen">Duvet Filler - Queen</option>
                                        <option value="Duvet Cover - Queen">Duvet Cover - Queen</option>
                                        <option value="Pillows Case">Pillows Case</option>
                                        <option value="Bath Towel">Bath Towel</option>
                                        <option value="Hand Towel">Hand Towel</option>
                                        <option value="Bath Mat">Bath Mat</option>
                                        <option value="Bed Ruuner Queen">Bed Ruuner Queen</option>
                                        <option value="Bed Runner Single">Bed Runner Single</option>
                                    </select>
                                </div>
                                <div id="guestsupplies" style="display:none;">
                                    <label for="">Choose Supply</label>
                                    <select class="form-control" id="guestsuplies" name="GuestSupplies">
                                        <option value="Bath Soap">Bath Soap</option>
                                        <option value="Shampoo">Shampoo</option>
                                        <option value="Dental Kit">Dental Kit</option>
                                        <option value="Slippers">Slippers</option>
                                        <option value="Bottled Water">Bottled Water</option>
                                        <option value="Juice">Juice</option>
                                        <option value="Coffee">Coffee</option>
                                        <option value="Creamer">Creamer</option>
                                        <option value="Sugar - White">Sugar - White</option>
                                        <option value="Sugar - Brown">Sugar - Brown</option>
                                    </select>
                                </div>
                                <div id="amenities" style="display:none;">
                                    <label for="">Choose Amenities</label>
                                    <select class="form-control" id="amenities" name="Amenities">
                                        <option value="Kettle">Kettle</option>
                                        <option value="Tray">Tray</option>
                                        <option value="Dental Glass">Dental Glass</option>
                                        <option value="Teaspoon">Teaspoon</option>
                                        <option value="Cup And Saucer">Cup And Saucer</option>
                                        <option value="Hanger">Hanger</option>
                                        <option value="Door Hang">Door Hang</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <label for="Stockdetails" class="text-color pt-4">Stock Description </label>
                                <input type="text" class="form-control" name="description"
                                    placeholder="Enter details..." required maxlength="32" pattern="[A-Za-z0-9 ]+"
                                    title="Stock Description should only contain Uppercase, lowercase letters and numbers. e.g. Sample Description 01">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="Stockdetails" class="text-color pt-4">Overall Initial Stock </label>
                                <input type="number" class="form-control" name="allstock"
                                    placeholder="Enter details..." min="0"
                                    onKeyPress="if(this.value.length==5) return false;" required>
                            </div>
                            <div class="col-md-6">
                                <label for="Stockdetails" class="text-color pt-4">Quantity </label>
                                <input type="number" class="form-control" name="quantity" placeholder="Enter number..."
                                    min="0" minl="0" onKeyPress="if(this.value.length==5) return false;"
                                    required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="Stockdetails" class="text-color pt-4">Stock Level </label>
                                <input type="number" class="form-control" name="stock" placeholder="Enter number..."
                                    onKeyPress="if(this.value.length==6) return false;" required>
                            </div>
                            <div class="col">
                                <label for="Stockdetails" class="text-color pt-4">Price </label>
                                <input type="number" class="form-control" name="price" placeholder="Enter number..."
                                    onKeyPress="if(this.value.length==6) return false;" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                        <!-- <a class="btn btn-secondary" data-dismiss="modal">Close</a> -->
                        <input type="submit" class="btn btn-success prevent_submit" value="Submit" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--History Modal -->
    <div class="modal fade" id="stock-history-modal" tabindex="-1" role="dialog"
        aria-labelledby="stock-history-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="stock-history-modal-label">Stock History</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-header">
                    <form action="{{ url('/stock_history_report') }}" target="blank" method="get">
                        <div class="d-flex flex-row">
                            <div class="p-2">
                                <label for="start_date">Start Date:</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" required>
                            </div>
                            <div class="p-2">
                                <label for="end_date">End Date:</label>
                                <input type="date" class="form-control" id="start_date" name="end_date" required>
                            </div>
                            <div class="p-2">
                                <label>Generate report:</label>
                                <button type="submit" class="btn btn-success w-75 h-50">
                                    <label class="">Print</label><span class=""> <i
                                            class="bi bi-printer-fill"></i></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-body" style="overflow-x: auto;">
                    <!-- Add your table here -->
                    <form method="get" action="">
                        <table class="table align-items-center table-flush datatable datatable-Stock" id="myTale">
                            <thead class="thead-light">
                                <tr>
                                    <th>Product ID</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Stock In</th>
                                    <th>Stock Out</th>
                                    <th>Quantity</th>
                                    <th>Date of Movement</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list3 as $lists3)
                                    <tr>
                                        <td style="font-size:14px;">{{ $lists3->productid }}</td>
                                        <td style="font-size:14px;">{{ $lists3->name }}</td>
                                        <td style="font-size:14px;">{{ $lists3->category }}</td>
                                        <td style="font-size:14px;">{{ $lists3->Stock_In }}</td>
                                        <td style="font-size:14px;">{{ $lists3->Stock_Out }}</td>
                                        <td style="font-size:14px;">{{ $lists3->Quantity }}</td>
                                        <td style="font-size:14px;">{{ $lists3->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // increment, decrement
        // Stock in
        function incrementValue() {
            var value = parseInt(document.getElementById('numberInput').value, 10);
            value = isNaN(value) ? 0 : value;
            value++;
            document.getElementById('numberInput').value = value > 99999 ? 99999 : value;
        }

        function decrementValue() {
            var value = parseInt(document.getElementById('numberInput').value, 10);
            value = isNaN(value) ? 0 : value;
            value--;
            document.getElementById('numberInput').value = value < 0 ? 0 : value;
        }
        // Stock out
        function incrementValue2() {
            var value = parseInt(document.getElementById('numberInput2').value, 10);
            value = isNaN(value) ? 0 : value;
            value++;
            document.getElementById('numberInput2').value = value > 99999 ? 99999 : value;
        }

        function decrementValue2() {
            var value = parseInt(document.getElementById('numberInput2').value, 10);
            value = isNaN(value) ? 0 : value;
            value--;
            document.getElementById('numberInput2').value = value < 0 ? 0 : value;
        }

        $(document).ready(function() {
            $("#category").change(function() {
                var selected = $("option:selected", this).val();
                if (selected == 'Linen') {
                    $('#linens').css({
                        'display': 'block'
                    });
                    $('#guestsupplies').css({
                        'display': 'none'
                    });
                    $('#amenities').css({
                        'display': 'none'
                    });
                } else if (selected == 'Guest Supply') {
                    $('#linens').css({
                        'display': 'none'
                    });
                    $('#guestsupplies').css({
                        'display': 'block'
                    });
                    $('#amenities').css({
                        'display': 'none'
                    });
                } else if (selected == 'Amenities') {
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
        /* disable arrows input type number */
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }

        .title {
            text-transform: uppercase;
            font-size: 20px;
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
