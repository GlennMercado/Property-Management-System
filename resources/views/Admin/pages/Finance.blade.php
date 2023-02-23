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
                                <div class = "col">
                                    
                                    </a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style = "float:right;">
                                            Add Finance
                                    </button>
                                </div>
                                <h3 class="mb-0">Finance</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush datatable datatable-Stock">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Contact Number</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                                
                                <tbody>
                                    @foreach ($list as $lists)
                                    <tr>
                                        <td>{{ $lists->name}}</td>
                                        <td>{{ $lists->email}}</td>
                                        <td>{{ $lists->cnumber}}</td>
                                        <td>{{ $lists->status}}</td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-target="#ModalView{{$lists->userid}}" class="btn btn-primary"><i class="bi bi-eye" style = "padding:2px;">View</i></button>
                                            <button type="button" data-toggle="modal" data-target="#ModalUpdate{{$lists->userid}}" class="btn btn-primary"><i class="bi bi-pencil-square"style = "padding:2px;" >Edit</i></button>
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <!--View-->
                                    <div class="modal fade text-left" id="ModalView{{$lists->userid}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCreate" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title text-left display-4" id="exampleModalCreate">View Details</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>                    
                                                </div>
                                                <div class="modal-body">
                                                            
                                                                <div class = "row">
                                                                        <div class = "col">
                                                                            <p class="text-left">Stock Name: </p>
                                                                                <input type="text" class="form-control" name="name" value = "{{ $lists->name}}" readonly>
                                                                                    <div class="invalid-feedback">
                                                                                        Stock Name empty
                                                                                    </div>       
                                                                        </div>
                                                                </div>
                                                        <div class="form-group">
                                                            <label>Stock Description: </label>
                                                                <input type="text" class="form-control" name="email" value = "{{ $lists->email}}" readonly>
                                                                    <div class="invalid-feedback">
                                                                        Stock Details empty
                                                                    </div>

                                                            <label>Date Stock Added: </label>
                                                                <input type="text" class="form-control" name="date" value="{{ date('m-d-Y', strtotime($lists->created_at))}}" readonly>
                                                                    <div class="invalid-feedback">
                                                                        Quantity empty
                                                                    </div>

                                                            <label>Quantity: </label>
                                                                <input type="text" class="form-control" name="cnumber" value = "{{ $lists->cnumber}}" readonly>
                                                                    <div class="invalid-feedback">
                                                                        Quantity empty
                                                                    </div>
                                                             
                                                        </div>
                                                        <label for="exampleInputPassword1">Category: </label>
                                                        <input type="text" class="form-control" name="status" value = "{{ $lists->status}}" readonly>
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
                                    <!--Modal Edit-->
                                    <div class="modal fade text-left" id="ModalUpdate{{ $lists->userid}}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h2 class="modal-title">{{ __('Edit Details') }}</h2>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>                    
                                                </div>
                                                <form method="POST" action="{{url('/update_info')}}" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="modal-body">
                                                        <div class = "row">
                                                            <div class = "col">
                                                                <p class="text-left">Stock ID: </p>
                                                                <input class="form-control" type="text" value="{{$lists->userid}}" readonly>
                                                                <input class="form-control" type="text" name="userid" value="{{$lists->userid}}" hidden>
                                                            </div>
                                                            <div class = "col">
                                                                <p class="text-left">Stock Name: </p>
                                                                <input type="text" class="form-control" name="name" value="{{$lists->name}}" required>
                                                                <div class="invalid-feedback">
                                                                    Stock Name empty
                                                                </div>       
                                                            </div>
                                                        </div>
                                                    <div class="form-group">
                                                        <label for="Stockdetails">Stock Description: </label>
                                                        <input type="text" class="form-control" name="email" value="{{$lists->email}}" required>
                                                        <input type="hidden" class="form-control" name="cnumber" value="{{$lists->cnumber}}">
                                                        {{-- <input class="form-control" type="tel" minlength="11" maxlength="11" name="mobile" placeholder = "09XXXXXXXXX" required> --}}
                                                         <input type="hidden" class="form-control" name="proof" value="{{$lists->proof}}">
                                                            <div class="invalid-feedback">
                                                                Stock Details empty
                                                                </div>
                                                        <label>Status: </label>
                                                        <select class="form-control" value="{{ $lists->status}}" name="status" required>
                                                        <option>Requesting</option>
                                                        <option>Paid</option>
                                                        <option>Unpaid</option>
                                                        </select>
                                                        
                                                        <div class="invalid-feedback">
                                                            Stock Details empty
                                                        </div>
                                                    </div> 
                                                    <div class="modal-footer">
                                                        <a class="btn btn-failed" data-dismiss="modal">Close</a>
                                                        <input type="submit" name="update" value="Update" class="btn btn-success" />                      
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

    <!--Add -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-left display-4" id="exampleModalLabel">Create Finance Proof</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/addinfo') }}" class="prevent_submit" method="POST">
                        {{ csrf_field() }}
                    <div class="modal-body">
                        <div class = "row">
                            <div class = "col">
                                <p class="text-left">Name: </p>
                                <input type="text" class="form-control" name="name" placeholder="Enter name..." required>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col">
                                <label for="Stockdetails">Email : </label>
                                <input type="email" class="form-control" name="email" placeholder="Enter details..." required>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col">
                                <label for="Stockdetails">Contact Number: </label>
                                <input type="number" class="form-control" name="cnumber" placeholder="Enter number..." required>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col">
                                <label for="Stockdetails">Proof of Payment: </label>
                                <input type="file" class="form-control" name="proof" accept="image/png, image/gif, image/jpeg" required>
                               
                                <input type="hidden" class="form-control" name="status" value="Requesting">
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

    
    @endsection

    @push('js')
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>

    @endpush
