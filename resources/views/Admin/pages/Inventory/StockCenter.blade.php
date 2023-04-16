@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>

    <div class="container-fluid mt--8">
        <div class="row align-items-center py-4">
            <div class="col-lg-12 col-12">
                <h6 class="h2 text-dark d-inline-block mb-0">Convention Center Inventory</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item">Inventory</li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">Convention Center Inventory</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="mb-0" style="color:#6C6C6C;">Instructions: Before Starting, See
                                    To It That All Inventory Are In The Storage Area</h4>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-outline-primary fa fa-plus" data-toggle="modal"
                                    data-target="#exampleModal" style="float:right;">
                                    Add Stock
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-flush datatable datatable-Stock" id="myTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" style="font-size:18px;">Action</th>
                                        <th scope="col" style="font-size:18px;">Product Name</th>
                                        <th scope="col" style="font-size:18px;">Item Description</th>
                                        <th scope="col" style="font-size:18px;">All Stock</th>
                                        <th scope="col" style="font-size:18px;">Available Stock</th>
                                        <th scope="col" style="font-size:18px;">Stock Level</th>
                                        <th scope="col" style="font-size:18px;">Stock Alert</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($list as $lists)
                                        <tr>

                                            <td>
                                                <button type="button" data-toggle="modal"
                                                    data-target="#ModalView{{ $lists->productid }}"
                                                    class="btn-sm btn-primary btn-lg"><i class="bi bi-eye"
                                                        style="padding:2px;"></i></button>
                                                <button type="button" data-toggle="modal"
                                                    data-target="#ModalUpdate{{ $lists->productid }}"
                                                    class="btn-sm btn-warning btn-lg"><i
                                                        class="bi bi-pencil-square"></i></button>
                                            </td>
                                            <td style="font-size:16px;">{{ $lists->name }}</td>
                                            <td style="font-size:16px;">{{ $lists->description }}</td>
                                            <td style="font-size:16px;">{{ $lists->allstock }}</td>
                                            <td style="font-size:16px;">{{ $lists->total }}</td>
                                            <td style="font-size:16px;">{{ $lists->Stock_Level }}</td>
                                            @if ($lists->total <= $lists->Stock_Level)
                                                <td><i class="bi bi-exclamation-triangle-fill"
                                                        style="color:red;font-size:20px"></i></td>
                                            @else
                                                <td><i class="bi bi-check-square-fill"
                                                        style="color:green;font-size:20px"></i>
                                                </td>
                                            @endif
                                        </tr>
                                        <!-- Modal -->
                                        <!--View-->
                                        <div class="modal fade text-left" id="ModalView{{ $lists->productid }}"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalCreate"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-left display-4" id="exampleModalCreate">
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
                                                                <p class="text-left">Stock Name </p>
                                                                <input type="text" class="form-control" name="name"
                                                                    value="{{ $lists->name }}" readonly>

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Stock Description </label>
                                                            <input type="text" class="form-control" name="description"
                                                                value="{{ $lists->description }}" readonly>


                                                            <label>Date Stock Added </label>
                                                            <input type="text" class="form-control" name="date"
                                                                value="{{ date('m-d-Y', strtotime($lists->created_at)) }}"
                                                                readonly>


                                                            <label>Overall Stock </label>
                                                            <input type="text" class="form-control" name="allstock"
                                                                value="{{ $lists->allstock }}" readonly>


                                                            <label>Quantity </label>
                                                            <input type="text" class="form-control" name="total"
                                                                value="{{ $lists->total }}" readonly>


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
                    </div>
                    <!--Modal Edit-->
                    <div class="modal fade text-left" id="ModalUpdate{{ $lists->productid }}" tabindex="-1"
                        role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title">{{ __('Edit Details') }}</h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="{{ url('/edit_stock_center') }}"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col">
                                                <p class="text-left">Stock ID </p>
                                                <input class="form-control" type="text"
                                                    value="{{ $lists->productid }}" readonly>
                                                <input class="form-control" type="text" name="productid"
                                                    value="{{ $lists->productid }}" hidden>
                                            </div>
                                            <div class="col">
                                                <p class="text-left">Stock Name </p>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ $lists->name }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <label>Stock Description </label>
                                            <input type="text" class="form-control" name="description"
                                                value="{{ $lists->description }}" required>

                                            <label for="Stockdetails">Overall Stock </label>
                                            <input type="hidden" name="allstock" value="{{ $lists->allstock }}" />
                                            <input type="number" class="form-control" value="{{ $lists->allstock }}"
                                                readonly>

                                            <label for="Stockdetails">Quantity </label>
                                            <input type="hidden" name="quantity" value="{{ $lists->total }}" />
                                            <input type="number" class="form-control" value="{{ $lists->total }}"
                                                readonly>

                                            <label for="Stockdetails">Stock Level </label>
                                            <input type="hidden" name="stock" value="{{ $lists->Stock_Level }}" />
                                            <input type="number" class="form-control" value="{{ $lists->Stock_Level }}"
                                                readonly>

                                            <div class="row">
                                                <div class="col">
                                                    <p class="text-left">Stock In </p>
                                                    <input class="form-control" type="number" name="in"
                                                        value="0">
                                                </div>
                                                <div class="col">
                                                    <p class="text-left">Stock Out </p>
                                                    <input type="number" class="form-control" name="out"
                                                        value="0">
                                                    <div class="invalid-feedback">
                                                        Stock Name empty
                                                    </div>
                                                </div>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-left display-4" id="exampleModalLabel">Add Convention Stock</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/addstock_center') }}" class="prevent_submit" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md">
                                <label class="text-left">Stock Name </label>
                                <input type="text" class="form-control" name="name" placeholder="Enter name..."
                                    maxlength="32" pattern="[A-Za-z]+"
                                    title="Stock Name should only contain Uppercase, lowercase letters." required>
                            </div>
                            <div class="col-md">
                                <label for="Stockdetails">Stock Description </label>
                                <input type="text" class="form-control" name="description"
                                    placeholder="Enter details..." maxlength="32" pattern="[A-Za-z 0-9]+"
                                    title="Stock Description should only contain Uppercase, lowercase letters." required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md pt-4">
                                <label for="Stockdetails">Overall Stock </label>
                                <input type="number" class="form-control" name="allstock" min="0"
                                    placeholder="Enter number..." onKeyPress="if(this.value.length==6) return false;"
                                    required>
                            </div>
                            <div class="col-md pt-4">
                                <label for="Stockdetails">Quantity </label>
                                <input type="number" class="form-control" name="quantity" placeholder="Enter number..."
                                    min="0" onKeyPress="if(this.value.length==6) return false;" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md pt-4">
                                <label for="Stockdetails">Stock Level </label>
                                <input type="number" class="form-control" name="stock" placeholder="Enter number..."
                                    min="0" onKeyPress="if(this.value.length==6) return false;" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                        <input type="submit" class="btn btn-success prevent_submit" value="Submit" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $('.prevent_submit').on('submit', function() {
            $('.prevent_submit').attr('disabled', 'true');
        });
        $.noConflict();
        jQuery(document).ready(function($) {
            $('#myTable').DataTable();
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

        p {
            font-family: sans-serif;
        }


        /* disable arrows input type number */
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spinn-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }
    </style>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
