@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
                        <!--<input type="submit" value="View" class = "btn btn-primary">-->
                        <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class = "col">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#PurchaseReportModal" style = "float:right;">
                                    Make a Report
                                </button>
                                </div>
                                <h3 class="mb-0">Stocks</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Product Code</th>
                                    <th scope="col">Item Name</th>
                                    <th scope="col">Supplier</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Available Stock</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Sample Data</td>
                                    <td>Sample Data</td>
                                    <td>Sample Data</td>
                                    <td>Sample Data</td>
                                    <td>Sample Data</td>
                                    <td>
                                        <input type="button" class="btn btn-primary" value="View" data-toggle="modal" data-target="#PurchaseReportModalView" ></input> ||
                                        <input type="button" class="btn btn-primary" value="Edit" data-toggle="modal" data-target="#PurchaseReportModalEdit" ></input>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sample Data</td>
                                    <td>Sample Data</td>
                                    <td>Sample Data</td>
                                    <td>Sample Data</td>
                                    <td>Sample Data</td>
                                    <td>
                                        <input type="button" class="btn btn-primary" value="View" data-toggle="modal" data-target="#PurchaseReportModalView" ></input> ||
                                        <input type="button" class="btn btn-primary" value="Edit" data-toggle="modal" data-target="#PurchaseReportModalEdit" ></input>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--MODAL FOR REPORT-->
                    <div class="modal fade" id="PurchaseReportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-left display-4" id="exampleModalLabel">Purchase Report</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="card-body bg-white" style="border-radius: 18px">
                                                        <p class="text-left">Product Code :
                                                        <input class="form-control" type="text" placeholder="Enter Here.." id="example-datetime-local-input" required></p>

                                                        <p class="text-left">Item Name :
                                                        <input class="form-control" type="text" placeholder="Enter Here.." id="example-datetime-local-input" required></p>
                                                        
                                                        <p class="text-left">Description :
                                                        <input class="form-control" type="text" placeholder="Enter Here.." id="example-datetime-local-input" required></p>

                                                        <p class="text-left">Quantity :
                                                        <input class="form-control" type="text" placeholder="Enter Here.." id="example-datetime-local-input" required></p>
                                                        
                                                        <p class="text-left">Supplier Name: </p>
                                                        <select class="form-control">
                                                            <option value="Available">Sample Supplier 1</option>
                                                            <option value="Dirty">Sample Supplier 2</option>
                                                            <option value="Checked">Sample Supplier 3</option>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--MODAL FOR VIEW-->
                    <div class="modal fade" id="PurchaseReportModalView" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-left display-4" id="exampleModalLabel">Purchase Report</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="card-body bg-white" style="border-radius: 18px">
                                                        <p class="text-left">Product Code : <input class="form-control" type="text" placeholder="Enter Here.." id="example-datetime-local-input" required></p>

                                                        <p class="text-left">Item Name :
                                                        <input class="form-control" type="text" placeholder="Enter Here.." id="example-datetime-local-input" required></p>
                                                        
                                                        <p class="text-left">Product Description :
                                                        <input class="form-control" type="text" placeholder="Enter Here.." id="example-datetime-local-input" required></p>

                                                        <p class="text-left">Product Quantity :
                                                        <input class="form-control" type="text" placeholder="Enter Here.." id="example-datetime-local-input" required></p>
                                                        
                                                        <p class="text-left">Supplier Name: </p>
                                                        <select class="form-control">
                                                            <option value="Available">Sample Supplier 1</option>
                                                            <option value="Dirty">Sample Supplier 2</option>
                                                            <option value="Checked">Sample Supplier 3</option>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--MODAL FOR EDIT-->
                    <div class="modal fade" id="PurchaseReportModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content" >
                                            <div class="modal-header" >
                                                <h5 class="modal-title text-left display-4" id="exampleModalLabel">Purchase Report</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" style="width:200%">
                                                <div class="row">
                                                    <div class="card-body bg-white" style="border-radius: 18px">
                                                    <h4>Product Code: </h4>
                                                    <input type="text" class="form-control" placeholder="Enter product code" required>
                                                    <h4>Product Name: </h4>
                                                    <input type="text" class="form-control" placeholder="Enter product name" required>
                                                    <h4>Product Description </h4>
                                                    <input type="text" class="form-control" placeholder="Enter product description" required>
                                                    <h4>Product Quantity: </h4>
                                                    <input type="number" class="form-control" placeholder="Enter contact no." required>
                                                    <h4>Date of Start: </h4>
                                                    <input type="text" class="form-control" placeholder="Enter billing address" readonly>
                                                    <h4>Product Category: </h4>
                                                    <input type="text" class="form-control" placeholder="" required>
                                                </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <h3 style="color: #8898aa;">Tell us about your event</h3>
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm">
                                        <h4>Supplier Name </h4>
                                    </div>
                                    <div class="col-sm">
                                                        <select class="form-control">
                                                            <option value="Available">Sample Supplier 1</option>
                                                            <option value="Dirty">Sample Supplier 2</option>
                                                            <option value="Checked">Sample Supplier 3</option>
                                                        </select>
                                    </div>
                                    <div class="col-sm">
                                        <
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm">
                                        <h4>Caterer</h4>
                                    </div>
                                    <div class="col-sm">
                                        <div class="custom-control custom-radio custom-control-inline">

                                            <input type="radio" id="customRadioInline3" name="customRadioInline2"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline3">Yes</label>

                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="custom-control custom-radio custom-control-inline">

                                            <input type="radio" onclick="enableinput2()" id="customRadioInline4"
                                                name="customRadioInline2" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline4">No Specify:
                                            </label>
                                            <input id="others2" class="form-control" type="text" readonly>

                                        </div>
                                    </div>


                                </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-success">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                </div>
            </div>
        </div>

            @include('layouts.footers.auth')
        </div>
    @endsection

    @push('js')
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>

    @endpush
