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
                                    <h3 class="mb-0 title">Report Inventory</h3>
                                    <h5 class="mb-0" style="color:#db1212; font-size:16px;">Instructions: Before
                                        starting,
                                        see to It that all inventory are in the Storage Area</h5><br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">

                        <!-- Projects table -->
                        <table class="table align-items-center table-flush" id="myTablesss">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" style="font-size:16px;">Action</th>
                                    <th scope="col" style="font-size:16px;">Item Name</th>
                                    <th scope="col" style="font-size:16px;">RequestedQuantity</th>
                                    <th scope="col" style="font-size:16px;">DateRequested</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <button type="button" data-toggle="modal" data-target="#ModalView4"
                                            class="btn btn-primary"><i class="bi bi-eye"
                                                style="padding:2px;">View</i></button>
                                        <button type="button" data-toggle="modal" data-target="#ModalUpdate4"
                                            class="btn btn-primary"><i
                                                class="bi bi-pencil-square"style="padding:2px;">Edit</i></button>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <!--MODAL FOR VIEW-->
                                <div class="modal fade" id="ModalView4" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">

                                </div>


                                <!--MODAL FOR Update-->
                                <div class="modal fade" id="ModalUpdate4" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="row">
                                                <div class="col">
                                                    <label for="Stockdetails">Room Number : </label>
                                                    <input type="number" class="form-control" name="inventoryapproved"
                                                        placeholder="Enter number..." required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="Stockdetails">Item Name : </label>
                                                    <input type="number" class="form-control" name="inventoryapproved"
                                                        placeholder="Enter number..." required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="Stockdetails">Requested Quantity: </label>
                                                    <input type="number" class="form-control" name="inventoryapproved"
                                                        placeholder="Enter number..." required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="Stockdetails">Invetory to Give: </label>
                                                    <input type="number" class="form-control" name="inventoryapproved"
                                                        placeholder="Enter number..." required>
                                                </div>
                                            </div>
                                            <label>Status: </label>
                                            <select class="form-control" name="status" required>
                                                <optiond disabled>
                                                    </option>
                                                    <option>Approved</option>
                                                    <option>Denied</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
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
