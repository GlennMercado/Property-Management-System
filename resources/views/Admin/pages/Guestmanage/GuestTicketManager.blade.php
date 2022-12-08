@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="container-fluid mt--6">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        <div class="card-header transparent">
                            <div class = "row">    
                                <div class = "col">
                                    <h3 class="mb-0">Guest Ticket Manager</h3>
                                </div>
                            </div>
                        </div> 

                    <!--Filters-->

                    <div class="row">
                        <div class="col-2" style = "margin-left:20px;">
                            <select class="form-control" id="example-category-input" required>
                                <option>Email A --> G</option>
                                <option>Hotel</option>
                                <option>Convention Center</option>
                                <option>Function Room</option>
                                <option>Sports Center</option>
                                <option>Stalls</option>
                            </select>
                        </div>
                            <br />
                        <div class="col-2">
                        <select class="form-control" id="example-category-input" required>
                            <option>Email H -->Z</option>
                            <option>Hotel</option>
                            <option>Convention Center</option>
                            <option>Function Room</option>
                            <option>Sports Center</option>
                            <option>Stalls</option>
                        </select>
                        </div>
                        <div class="col-2">
                        <select class="form-control" id="example-category-input" required>
                            <option>Pick Category</option>
                            <option>Hotel</option>
                            <option>Convention Center</option>
                            <option>Function Room</option>
                            <option>Sports Center</option>
                            <option>Stalls</option>
                        </select>
                        </div>
                        <div class="col-mb-3">
                            <input type=submit value="Filter" class="btn btn-info">
                        </div>
                
                    <!--Table-->

                    <div class="card-body">
                    <table class="table align-items-center table-flush" style="justify-content:center;text-align:center">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Carlo</th>
                                    <td>Carlo@gmail.com</td>
                                    <td>Hotel</td>
                                    <td>None so far</td>
                                    <td>
                                        <input type="submit" value="View More" class = "btn btn-primary">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Carla</th>
                                    <td> Carla@gmail.com</td>
                                    <td>Function Room</td>
                                    <td>Broken Chair</td>
                                    <td>
                                        <input type="submit" value="View More" class = "btn btn-primary">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
            @include('layouts.footers.auth')

    @endsection

    @push('js')
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>

    @endpush
