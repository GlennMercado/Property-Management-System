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
        </div>
    @endsection

    @push('js')
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>

    @endpush
