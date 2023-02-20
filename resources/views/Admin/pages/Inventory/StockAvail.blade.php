@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--9">
        <div class="row">
            <div class="form-control col-md-7" style="height:150px">
                <h5>Stock Avalability</h5>
                <table class="table align-items-center table-flush">

                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Product Name</th>
                            <th scope="col">Available Stock</th>
                            <th scope="col">Stock Level</th>
                            <th scope="col">Stock Alert</th>
                            <th scope="col">Branch</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="col">Shampoo</td>
                            <td scope="col">19</td>
                            <td scope="col">5</td>
                            <td><i class="bi bi-exclamation-triangle-fill" style="color:red;"></i></td>
                            <td scope="col">Hotel</td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <br>
            <div class="form-control col-md-5" style="height:55">
            </div>

            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">

                                <a href="{{ url('StockCount') }}"><input class="btn btn-primary" type="button"
                                        value="Hotel Inventory" id="HotelStock"></input></a>
                                <a href="{{ url('StockFunction') }}"><input class="btn btn-primary" type="button"
                                        value="Function Room Inventory" id="FunctionStock"></input></a>
                                <a href="{{ url('StockCenter') }}"><input class="btn btn-primary" type="button"
                                        value="Convention Center Inventory" id="CenterStock"></input></a>

                            </div><br />

                        </div>
                    </div>
                </div>

                <!--Hotel Inventory-->
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush" id="hotel">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" style="font-size:15px;">Product Name</th>
                                <th scope="col" style="font-size:15px;">Item Description</th>
                                <th scope="col" style="font-size:15px;">Available Stock</th>
                                <th scope="col" style="font-size:15px;">Stock Level</th>
                                <th scope="col" style="font-size:15px;">Stock Alert</th>
                                <th scope="col" style="font-size:15px;">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($list as $lists)
                                <tr>
                                    <td style="font-size:13px;">{{ $lists->name }}</td>
                                    <td style="font-size:13px;">{{ $lists->description }}</td>
                                    <td style="font-size:13px;">{{ $lists->total }}</td>
                                    <td style="font-size:13px;">{{ $lists->Stock_Level }}</td>
                                    @if ($lists->total <= $lists->Stock_Level)
                                        <td style="font-size:30px;"><i class="bi bi-exclamation-triangle-fill"
                                                style="color:red;"></i></td>
                                    @else
                                        <td style="font-size:30px;"><i class="bi bi-check-square-fill"
                                                style="color:green;"></i></td>
                                    @endif
                                    <td><button class="btn btn-sm btn-primary btn-lg" data-toggle="modal"
                                            data-target="#ModalViews{{ $lists->productid }}"class="btn btn-primary"><i
                                                class="bi bi-eye" style="padding:2px;">View</i></button>
                                    </td>
                                </tr>

                                <!--View-->
                                <div class="modal fade text-left" id="ModalViews{{ $lists->productid }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalCreate" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-left display-4" id="exampleModalCreate">View
                                                    Details</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <label class="text-left">Stock Name: </label>
                                                        <input type="text" class="form-control" name="name"
                                                            value="{{ $lists->name }}" readonly>
                                                    </div>
                                                    <div class="col">
                                                        <label>Stock Description: </label>
                                                        <input type="text" class="form-control" name="description"
                                                            value="{{ $lists->description }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col pt-4">
                                                        <label>Date Stock Added: </label>
                                                        <input type="text" class="form-control" name="date"
                                                            value="{{ date('m-d-Y', strtotime($lists->created_at)) }}"
                                                            readonly>
                                                    </div>
                                                    <div class="col pt-4">
                                                        <label>Quantity: </label>
                                                        <input type="text" class="form-control" name="total"
                                                            value="{{ $lists->total }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col pt-4">
                                                        <label for="exampleInputPassword1">Category: </label>
                                                        <input type="text" class="form-control" name="category"
                                                            value="{{ $lists->category }}" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                                                <!-- <button type="button" class="btn btn-failed" data-dismiss="modal">Close</button> -->
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


    <!--Function Room Inventory-->
    <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush datatable datatable-Stock" id="function"
            style="display:none">
            <thead class="thead-light">
                <tr>
                    <th scope="col" style="font-size:15px;">Product Name</th>
                    <th scope="col" style="font-size:15px;">Item Description</th>
                    <th scope="col" style="font-size:15px;">Available Stock</th>
                    <th scope="col" style="font-size:15px;">Stock Level</th>
                    <th scope="col" style="font-size:15px;">Stock Alert</th>
                    <th scope="col" style="font-size:15px;">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($list2 as $lists2)
                    <tr>
                        <td>{{ $lists2->name }}</td>
                        <td>{{ $lists2->description }}</td>
                        <td>{{ $lists2->total }}</td>
                        <td>{{ $lists2->Stock_Level }}</td>
                        @if ($lists2->total <= $lists2->Stock_Level)
                            <td><i class="bi bi-exclamation-triangle-fill" style="color:red;font-size:20px"></i></td>
                        @else
                            <td><i class="bi bi-check-square-fill" style="color:green;font-size:20px"></i></td>
                        @endif
                        <td>
                            <button type="button" data-toggle="modal" data-target="#ModalView{{ $lists2->productid }}"
                                class="btn btn-primary"><i class="bi bi-eye" style="padding:2px;">View</i></button>
                        </td>
                    </tr>
                    <!-- Modal -->
                    <!--View-->
                    <div class="modal fade text-left" id="ModalView{{ $lists2->productid }}" tabindex="-1"
                        role="dialog" aria-labelledby="exampleModalCreate" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-left display-4" id="exampleModalCreate">View Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col">
                                            <p class="text-left">Stock Name: </p>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $lists2->name }}" readonly>
                                            <div class="invalid-feedback">
                                                Stock Name empty
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Stock Description: </label>
                                        <input type="text" class="form-control" name="description"
                                            value="{{ $lists2->description }}" readonly>
                                        <div class="invalid-feedback">
                                            Stock Details empty
                                        </div>

                                        <label>Date Stock Added: </label>
                                        <input type="text" class="form-control" name="date"
                                            value="{{ date('m-d-Y', strtotime($lists2->created_at)) }}" readonly>
                                        <div class="invalid-feedback">
                                            Quantity empty
                                        </div>

                                        <label>Quantity: </label>
                                        <input type="text" class="form-control" name="total"
                                            value="{{ $lists2->total }}" readonly>
                                        <div class="invalid-feedback">
                                            Quantity empty
                                        </div>

                                    </div>
                                    <label for="exampleInputPassword1">Category: </label>
                                    <input type="text" class="form-control" name="category"
                                        value="{{ $lists2->category }}" readonly>
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
    @endforeach
    </tbody>
    </table>
    </div>

    <!--Convention Center Inventory-->
    <div class="table-responsive">
        <table class="table align-items-center table-flush datatable datatable-Stock" id="center"
            style="display:none">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Item Description</th>
                    <th scope="col">Available Stock</th>
                    <th scope="col">Stock Level</th>
                    <th scope="col">Stock Alert</th>
                    <th scope="col">Action</th>
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
                            <td><i class="bi bi-exclamation-triangle-fill" style="color:red;font-size:20px"></i></td>
                        @else
                            <td><i class="bi bi-check-square-fill" style="color:green;font-size:20px"></i></td>
                        @endif
                        <td>
                            <button type="button" data-toggle="modal" data-target="#ModalView{{ $lists3->productid }}"
                                class="btn btn-primary"><i class="bi bi-eye" style="padding:2px;">View</i></button>
                        </td>
                    </tr>
                    <!-- Modal -->
                    <!--View-->
                    <div class="modal fade text-left" id="ModalView{{ $lists3->productid }}" tabindex="-1"
                        role="dialog" aria-labelledby="exampleModalCreate" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-left display-4" id="exampleModalCreate">View Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col">
                                            <p class="text-left">Stock Name: </p>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $lists3->name }}" readonly>
                                            <div class="invalid-feedback">
                                                Stock Name empty
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Stock Description: </label>
                                        <input type="text" class="form-control" name="description"
                                            value="{{ $lists3->description }}" readonly>
                                        <div class="invalid-feedback">
                                            Stock Details empty
                                        </div>

                                        <label>Date Stock Added: </label>
                                        <input type="text" class="form-control" name="date"
                                            value="{{ date('m-d-Y', strtotime($lists3->created_at)) }}" readonly>
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
                                    <button type="button" class="btn btn-failed" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>
    @endforeach
    </tbody>
    </table>
    </div>


    <script>
        //$(document).ready(function(){
        //  $("#optionselect").change(function(){
        //var selected = $("option:selected", this).val();

        if (selected == 'HotelStock') {
            $('#hotel').show();
            $('#function').hide();
            $('#center').hide();
        } else if (selected == 'FunctionStock') {
            $('#hotel').hide();
            $('#function').show();
            $('#center').hide();
        } else if (selected == 'CenterStock') {
            $('#hotel').hide();
            $('#function').hide();
            $('#center').show();
        }

        //});
        //});
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
@endpush
