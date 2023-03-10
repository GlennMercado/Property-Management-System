@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="col">

                                    </a>
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                        data-target="#exampleModal" style="float:right;">
                                        Add Stock
                                    </button>
                                </div>
                                <h3 class="mb-0 title">Convention Center Inventory</h3>
                                <h5 class="mb-0" style="color:#6C6C6C; font-size:1px;">Instructions: Before Starting, See
                                    To It That All Inventory Are In The Storage Area</h5>
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
                            <div class="col">
                                <p class="text-left">Stock Name </p>
                                <input type="text" class="form-control" name="name" placeholder="Enter name..."
                                    required>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="Stockdetails">Stock Description </label>
                                <input type="text" class="form-control" name="description"
                                    placeholder="Enter details..." required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="Stockdetails">Overall Stock </label>
                                <input type="number" class="form-control" name="allstock" min="0"
                                    value="0" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="Stockdetails">Quantity </label>
                                <input type="number" class="form-control" name="quantity" placeholder="Enter number..."
                                    required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="Stockdetails">Stock Level </label>
                                <input type="number" class="form-control" name="stock" placeholder="Enter number..."
                                    required>
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
