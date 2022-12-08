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
                                <h3 class="mb-0">Stocks</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Item Description</th>
                                    <th scope="col">Available Stock</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            
                                <tbody>
                                    @foreach ($list as $lists)
                                    <tr>
                                        <td>{{ $lists->name}}</td>
                                        <td>{{ $lists->description}}</td>
                                        <td>{{ $lists->total}}</td>
                                        <td>
                                        <button type="button" data-toggle="modal" data-target="#ModalViews{{ $lists->productid}}"class="btn btn-primary"><i class="bi bi-eye" style = "padding:2px;">View</i></button>
                                        </td>
                                    </tr>

        <!--View Modal-->
        <div class="modal fade" id="ModalViews{{ $lists->productid}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-left display-4" id="exampleModalLabel">Create Stocks</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <div class = "row">
                            <div class = "col">
                                <p class="text-left">Stock ID: </p>
                                        <input class="form-control" type="text" value="{{ $lists->productid}}" id="id" readonly>
                            </div>
                            <div class = "col">
                                <p class="text-left">Stock Name: </p>
                                    <input type="text" class="form-control" name="name" value="{{ $lists->name}}" required>
                                                    
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col">
                                <label for="Stockdetails">Stock Description</label>
                                <input type="text" class="form-control" name="description" value="{{ $lists->description}}" required>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col">
                                <label for="Stockdetails">Quantity</label>
                                <input type="number" class="form-control" name="quantity" value="{{ $lists->total}}" required>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col">
                                <label for="exampleInputPassword1">Category</label>
                                    <select class="form-control" name = "category" value="{{ $lists->category}}" required>
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
                        <a class="btn btn-secondary" data-dismiss="modal">Close</a>>                      
                    </div>
                </form>         
            </div>
            
            @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--<a href="{{ route('home') }}" class = "btn btn-primary" style = " margin-top:20px; margin-right:10px; color:black; background:#ffffff; border-color:#68DBA9;">
            Go Back
        </a>-->
</div>

    @include('layouts.footers.auth')
    @endsection

    @push('js')
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>

    @endpush
