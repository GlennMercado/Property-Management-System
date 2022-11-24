@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="container-fluid mt--6">
            <div class="row justify-content-center">
                <div class="col">
               <div class="card">
                    <div class="card-header transparent">
                    <h3 class="mb-0">Stocks</h3>
                    </div> 
                    <div class="card-body">
                    <!--TABLE-->
                    <table class="table align-items-center table-flush" style="justify-content:center;text-align:center">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Product Code</th>
                                    <th scope="col">Item Name</th>
                                    <th scope="col">Supplier</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Cost Per Item</th>
                                    <th scope="col">Stock Quantity</th>
                                    <th scope="col">Inventory Value</th>
                                    <th scope="col">Days Per ReOrder</th>
                                    <th scope="col">Item Reorder Quantity</th>
                                    <th scope="col">Product Discontinued?(Yes/No)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Item 1</th>
                                    <td> Item Sample Bed</td>
                                    <td>Capstone Example</td>
                                    <td>None so far</td>
                                    <td>P10,000</td>
                                    <td>10</td>
                                    <td>P20,000</td>
                                    <td>201</td>
                                    <td>5</td>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <th scope="row">Item 1</th>
                                    <td> Item Sample Chair</td>
                                    <td>Capstone Example</td>
                                    <td>None so far</td>
                                    <td>P100</td>
                                    <td>10</td>
                                    <td>P200</td>
                                    <td>101</td>
                                    <td>20</td>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <th scope="row">Item 1</th>
                                    <td> Item Sample Glass Table</td>
                                    <td>Capstone Example</td>
                                    <td>None so far</td>
                                    <td>P10,000</td>
                                    <td>10</td>
                                    <td>P20,000</td>
                                    <td>201</td>
                                    <td>5</td>
                                    <td>No</td>
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
