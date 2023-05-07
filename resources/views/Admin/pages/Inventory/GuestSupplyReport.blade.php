@extends('layouts.printpage')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <div class="d-flex p-4">
        <div class="p-1"><img src="{{ asset('nvdcpics') }}/nvdc-logo.png" style="height: 80px; width: 80px"></div>
        <div class="p-2">
            <p class="display-3">NVDC Properties</p>
            <div class="font-weight-bold display-5 mt--3">Brgy, 123 General Luis, Novaliches, Quezon City</div>
        </div>
    </div>
    <p class="display-3 text-center">{{ $title }}</p>
    <div class="row d-flex justify-content-center p-5">
        <div class="container-fluid">
            <table class="table align-items-center table-flush" id="myTable">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" style="font-size:18px;">Product ID</th>
                        <th scope="col" style="font-size:18px;">Name</th>
                        <th scope="col" style="font-size:18px;">Category</th>
                        <th scope="col" style="font-size:18px;">Stock In</th>
                        <th scope="col" style="font-size:18px;">Stock Out</th>
                        <th scope="col" style="font-size:18px;">Quantity</th>
                        <th scope="col" style="font-size:18px;">Date of Movement</th>
                    </tr>
                    </thead>
                    <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection
