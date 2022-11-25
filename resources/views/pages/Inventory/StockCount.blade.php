@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="container-fluid mt--6">
            <div class="row justify-content-center">
                <div class="col">
               <div class="card">
                    <div class="card-header transparent">
                    <h3 class="mb-0">Create Stock</h3>
                    <h3></h3>
                    </div> 
                    <!--Fields-->
                    <table style="align-items:center;justify-content:center">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>
                                <input type="button" value="Input Stock" style="background-color:yellowgreen;foreground-color:white"></input>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <span class="h3 font-weight-bold mb-0">Product Code :</span> 
                                <input type="text" placeholder="Enter here..."></input><br /><br /> 
                            </td>
                            <td> 
                                <span class="h3 font-weight-bold mb-0">Item Name :</span> 
                                <input type="text" placeholder="Enter here..."></input>
                            </td>
                            <td>
                                <span class="h3 font-weight-bold mb-0">Item Name :</span> 
                                <input type="text" placeholder="Enter here..."></input>
                            </td>
                        </tr>
                        </tr>
                            <td>
                                <span class="h3 font-weight-bold mb-0">Product Code :</span> 
                                <input type="text" placeholder="Enter here..."></input><br /><br /> 
                            </td>
                            <td> 
                                <span class="h3 font-weight-bold mb-0">Item Name :</span> 
                                <input type="text" placeholder="Enter here..."></input>
                            </td>
                            <td>
                                <span class="h3 font-weight-bold mb-0">Item Name :</span> 
                                <input type="text" placeholder="Enter here..."></input>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="h3 font-weight-bold mb-0">Product Code :</span> 
                                <input type="text" placeholder="Enter here..."></input><br /><br /> 
                            </td>
                            <td> 
                                <span class="h3 font-weight-bold mb-0">Item Name :</span> 
                                <input type="text" placeholder="Enter here..."></input>
                            </td>
                            <td>
                                <span class="h3 font-weight-bold mb-0">Item Name :</span> 
                                <input type="text" placeholder="Enter here..."></input>
                            </td>
                        </tr>
                    </table>
                    
                    <!--Table-->
                    <div class="card-body">
                    <table class="table align-items-center table-flush" style="justify-content:center;text-align:center">
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
                                    <th scope="row">
                                        Item 1
                                    </th>
                                    <td>
                                        Item Sample Bed
                                    </td>
                                    <td>
                                        Capstone Example
                                    </td>
                                    <td>
                                        None so far
                                    </td>
                                    <td>
                                        4
                                    </td>
                                    <td>
                                        <input type="submit" value="VIEW" style="background-color:Highlight;foreground-color:white"></input>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        Item 2
                                    </th>
                                    <td>
                                        Item Sample Chairs
                                    </td>
                                    <td>
                                        Capstone Example
                                    </td>
                                    <td>
                                        None so Far
                                    </td>
                                    <td>
                                        50
                                    </td>
                                    <td>
                                        <input type="submit" value="VIEW" style="background-color:Highlight"></input>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        Item 3
                                    </th>
                                    <td>
                                        Item Sample Table Glass
                                    </td>
                                    <td>
                                        Capstone Example
                                    </td>
                                    <td>
                                        None so Far
                                    </td>
                                    <td>
                                        2
                                    </td>
                                    <td>
                                        <input type="submit" value="VIEW" style="background-color:Highlight"></input>
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
