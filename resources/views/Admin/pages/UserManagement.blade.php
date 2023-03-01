@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
    <script>
        $.noConflict();
        jQuery(document).ready(function($) {
            $('#myTable').DataTable();
        });
        // Code that uses other library's $ can follow here.
    </script>
    <div class="container-fluid mt--9">
        <div class="row justify-content-center">
            <div class=" col ">
                <div class="card">
                    <div class="card-header bg-transparent row">
                        <h3 class="mb-0 col-md-6">User Management</h3>
                        <div class="col text-right">
                            <button class="btn btn-outline-primary bg-success text-white" data-toggle="modal"
                                data-target="#add_rooms">
                                Create New User
                            </button>
                        </div>
                    </div>
                    <!-- Add Modal -->
                    <div class="modal fade" id="add_rooms" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-left display-4" id="exampleModalLabel">Create New User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ url('/create_new_user') }}" class="prevent_submit" method="POST"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="card-body bg-white" style="border-radius: 18px">
                                                <label class="text_color">Name</label>
                                                <input type="text" class="form-control" name="name" required>

                                                <label class="text_color">Email</label>
                                                <input type="email" class="form-control" name="email" required>

                                                <label class="text_color">Password</label>
                                                <input type="password" class="form-control" name="password" required>

                                                <label class="text_color">Confirm Password</label>
                                                <input type="password" class="form-control">

                                                <label class="text_color">User Type</label>
                                                <select class="form-control" name="User_Type" required>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Housekeeper">Housekeeper</option>
                                                    <option value="Guest">Guest</option>
                                                    <option value="Sales & Marketing">Sales & Marketing
                                                    </option>
                                                    <option value="Finance">Finance</option>
                                                    <option value="Front Desk">Front Desk</option>
                                                    <option value="Operations Manager">Operations
                                                        Manager</option>
                                                    <option value="Inventory">Inventory</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-success prevent_submit" value="Save"
                                                name="submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="nav-wrapper">
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush" id="myTable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" style="font-size:17px;">ID</th>
                                            <th scope="col" style="font-size:17px;">Name</th>
                                            <th scope="col" style="font-size:17px;">Email</th>
                                            <th scope="col" style="font-size:17px;">User Type</th>
                                            <th scope="col" style="font-size:17px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list as $lists)
                                            <tr>
                                                <td>{{ $lists->id }}</td>
                                                <td>{{ $lists->name }}</td>
                                                <td>{{ $lists->email }}</td>
                                                <td>{{ $lists->User_Type }}</td>
                                                <td>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // var x = document.getElementById("selectbox");
    </script>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
