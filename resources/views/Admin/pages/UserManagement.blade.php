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
                        <Button class="col-md-6">Add User</Button>
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
                                                    <select name="" id="">
                                                        <option value="">try</option>
                                                        <option value="">try</option>
                                                        <option value="">try</option>
                                                    </select>
                                                    <button>sad</button>
                                                    <button>sadasd</button>
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
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
