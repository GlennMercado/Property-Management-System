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
                                <div class="col">
                                    <button class="btn btn-outline-primary" class="btn btn-primary" data-toggle="modal"
                                        data-target="#PurchaseReportModal" style="float:right;">
                                        Make Report
                                    </button>
                                </div>
                                <h3 class="mb-0 title">Stock Purchase Reports</h3>
                                <h5 class="mb-0" style="color:#6C6C6C; font-size:16px;">Instructions: Before starting, see
                                    to It that all inventory are in the Storage Area</h5>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">

                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" style="font-size:18px;">Item Name</th>
                                    <th scope="col" style="font-size:18px;">Supplier Name</th>
                                    <th scope="col" style="font-size:18px;">Description</th>
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
                                        <td style="font-size:16px;">{{ $lists->suppliername }}</td>
                                        <td style="font-size:16px;">{{ $lists->description }}</td>
                                        <td style="font-size:16px;">{{ $lists->quantity }}</td>
                                        <td style="font-size:16px;">{{ $lists->Stock_Level }}</td>
                                        @if ($lists->quantity <= $lists->Stock_Level)
                                            <td style="font-size:25px;"><i class="bi bi-exclamation-triangle-fill"
                                                    style="color:red;"></i></td>
                                        @else
                                            <td style="font-size:25px;"><i class="bi bi-check-square-fill"
                                                    style="color:green;"></i></td>
                                        @endif
                                        <td>
                                            <button type="button" data-toggle="modal"
                                                data-target="#ModalView{{ $lists->productid }}" class="btn btn-primary"><i
                                                    class="bi bi-eye" style="padding:2px;">View</i></button>
                                            <button type="button" data-toggle="modal"
                                                data-target="#ModalUpdate{{ $lists->productid }}" class="btn btn-primary"><i
                                                    class="bi bi-pencil-square"style="padding:2px;">Edit</i></button>
                                        </td>
                                    </tr>

                                    <!--MODAL FOR VIEW-->
                                    <div class="modal fade" id="ModalView{{ $lists->productid }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-left display-4" id="exampleModalLabel">View
                                                        All Details</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="card-body bg-white" style="border-radius: 18px">
                                                            <p class="text-left">Category :
                                                                <input class="form-control" type="text" name="name"
                                                                    value="{{ $lists->name }}" readonly>
                                                            </p>

                                                            <p class="text-left">Purchased Date :
                                                                <input class="form-control" type="text" name="date"
                                                                    value="{{ date('m-d-Y', strtotime($lists->date)) }}"
                                                                    readonly>
                                                            </p>

                                                            <div class="row">
                                                                <div class="col">
                                                                    <p class="text-left">Item :
                                                                        <input class="form-control" type="number"
                                                                            placeholder="Enter Here.." name="unit"
                                                                            value="{{ $lists->unit }}" readonly>
                                                                    </p>
                                                                </div>
                                                                <div class="col">
                                                                    <p class="text-left">Quantity :
                                                                        <input class="form-control" type="text"
                                                                            name="quantity" value="{{ $lists->quantity }}"
                                                                            readonly>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <p class="text-left">Reciever :
                                                                <input class="form-control" type="text"
                                                                    name="suppliername" value="{{ $lists->suppliername }}"
                                                                    readonly>
                                                            </p>

                                                            <p class="text-left">Supervisor/Dept :
                                                                <input class="form-control" type="text"
                                                                    name="suppliername" value="{{ $lists->suppliername }}"
                                                                    readonly>
                                                            </p>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-outline-danger"
                                                        data-dismiss="modal">Close</button> <button type="button"
                                                        class="btn btn-primary" data-dismiss="modal">Ok</button> -->
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
            </style>
        @endsection

        @push('js')
            <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
            <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
        @endpush
