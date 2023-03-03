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
                                </div>
                                <h3 class="mb-0 title">Hotel Linen Requests</h3>
                                <h5 class="mb-0" style="color:#6C6C6C; font-size:16px;">Instructions: Before Starting, See
                                    To It That All Inventory Are In The Storage Area</h5>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush datatable datatable-Stock">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" style="font-size:16px;">Action</th>
                                    <th scope="col" style="font-size:16px;">Room Number</th>
                                    <th scope="col" style="font-size:16px;">Item Name</th>
                                    <th scope="col" style="font-size:16px;">Discrepancy</th>
                                    <th scope="col" style="font-size:16px;">Quantity Requested</th>
                                    <th scope="col" style="font-size:16px;">Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($list as $lists)
                                    <tr>
                                        <td>
                                            <button class="btn btn-sm btn-primary btn-lg" data-toggle="modal"
                                                data-target="#ModalView{{ $lists->productid }}"><i
                                                    class="bi bi-eye"></i></button>
                                            <button class="btn btn-sm btn-warning btn-lg" data-toggle="modal"
                                                data-target="#update{{$lists->id}}"><i
                                                    class="bi bi-pencil-square"></i></button>
                                        </td>
                                        <td>{{ $lists->Room_No }}</td>
                                        <td>{{ $lists->name }}</td>
                                        <td>{{ $lists->Discrepancy }}</td>
                                        <td>{{ $lists->Quantity_Requested }}</td>
                                        <td>{{ $lists->Status }}</td>
                                    </tr>
                                    <!-- Modal -->
                                    <!--View-->
                                    <div class="modal fade text-left" id="ModalView{{ $lists->productid }}" tabindex="-1"
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
                                                    <!-- Dito Yung Code -->

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-failed"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Modal Edit-->
                                    <!--MODAL FOR Update-->
                                    <div class="modal fade" id="update{{$lists->id}}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <form method="POST" action="{{ url('/linen_request_approval') }}"
                                                enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="modal-content">
                                                    <div class="modal-header"></div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="Stockdetails">Room Number : </label>
                                                                <input type="number" class="form-control"
                                                                    value="{{ $lists->Room_No }}"
                                                                    placeholder="Enter number..." readonly>
                                                                <input type="number" class="form-control"
                                                                    value="{{ $lists->Room_No }}"
                                                                    placeholder="Enter number..." name="roomno" hidden>
                                                            </div>
                                                            <div class="col">
                                                                <input class="form-control" type="text" name="productid"
                                                                    value="{{ $lists->productid }}" hidden>
                                                                <input type="hidden" name="id" value="{{$lists->id}}">
                                                                <input type="hidden" name="attendant" value="{{$lists->Attendant}}">
                                                                <input type="hidden" name="category" value="{{$lists->Category}}">
                                                                <input type="hidden" name="date_requested" value="{{$lists->Date_Requested}}">
                                                                <input type="hidden" name="qty_owned" value="{{$lists->Quantity}}">
                                                                <input type="hidden" name="discrepancy" value="{{$lists->Discrepancy}}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="Stockdetails">Item Name : </label>
                                                                <input type="text" class="form-control" name="name"
                                                                    value="{{ $lists->name }}"
                                                                    placeholder="Enter number..." readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="Stockdetails">Quantity Owned: </label>
                                                                <input type="number" class="form-control"
                                                                    value="{{ $lists->Quantity}}"
                                                                    placeholder="Enter number..." readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="Stockdetails">Requested Quantity: </label>
                                                                <input type="number" class="form-control"
                                                                    name="Quantity_Requested"
                                                                    value="{{ $lists->Quantity_Requested }}"
                                                                    placeholder="Enter number..." readonly>
                                                            </div>
                                                        </div>
                                                        <label>Status: </label>
                                                        <select class="form-control" name="status" id="stats" required>
                                                        <option value="" selected="true" disabled="disabled">Select</option>
                                                            <option value="Approved">Approved</option>
                                                            <option value="Denied">Denied</option>
                                                        </select>

                                                        <div class="row" style="display:none;" id="qty">
                                                            <div class="col">
                                                                <label for="Stockdetails">Quantity to Give: </label>
                                                                <input type="number" class="form-control qt2" name="quantity"
                                                                    placeholder="Enter number..." value="0">
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
                    <h5 class="modal-title text-left display-4" id="exampleModalLabel">Create Function Room Stock</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/addstock_function') }}" class="prevent_submit" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <p class="text-left">Stock Name: </p>
                                <input type="text" class="form-control" name="name" placeholder="Enter name..."
                                    required>

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
                                <input type="number" class="form-control" name="quantity" placeholder="Enter number..."
                                    required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="Stockdetails">Stock Level: </label>
                                <input type="number" class="form-control" name="stock" placeholder="Enter number..."
                                    required>
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
                        <input type="submit" class="btn btn-success prevent_submit" value="Submit" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- </div>
                
                        </div>
                    </div>
                </div> -->





    <!--Validation
                   <script>
                       (function() {
                           'use strict';
                           window.addEventListener('load', function() {
                               var forms = document.getElementsByClassName('needs-validation');
                               var validation = Array.prototype.filter.call(forms, function(form) {
                                   form.addEventListener('submit', function(event) {
                                       if (form.checkValidity() === false) {
                                           event.preventDefault();
                                           event.stopPropagation();
                                       }
                                       form.classList.add('was-validated');
                                   }, false);
                               });
                           }, false);
                       })();


                       <
                       script >
                           $(function() {
                               let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

                               $.extend(true, $.fn.dataTable.defaults, {
                                   order: [
                                       [1, 'desc']
                                   ],
                                   pageLength: 100,
                                   columnDefs: [{
                                       orderable: true,
                                       className: '',
                                       targets: 0
                                   }]
                               });
                               $('.datatable-Stock:not(.ajaxTable)').DataTable({
                                   buttons: dtButtons
                               })
                               $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                                   $($.fn.dataTable.tables(true)).DataTable()
                                       .columns.adjust();
                               });
                           })
                   </script>
                   </script>-->
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
    <script>
        $(document).ready(function() {
                    $("#stats").change(function() {
                        var selected = $("option:selected", this).val();
                        
                       if(selected == "Approved")
                       {
                            $('#qty').css({
                            'display': 'block'
                            });
                            $('.qt2').val(0);
                       } 
                       else if(selected == "Denied")
                       {
                            $('#qty').css({
                                'display': 'none'
                            });
                            $('.qt2').val(0);
                       }
                    });
                });


        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

            $.extend(true, $.fn.dataTable.defaults, {
                order: [
                    [1, 'desc']
                ],
                pageLength: 100,
                columnDefs: [{
                    orderable: true,
                    className: '',
                    targets: 0
                }]
            });
            $('.datatable-Stock:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })
    </script>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush