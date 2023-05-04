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
            <table class="table align-items-center table-flush datatable datatable-Stock" id="myTale">
                <thead class="thead-light">
                    <tr>
                        <th>Product ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Stock In</th>
                        <th>Stock Out</th>
                        <th>Quantity</th>
                        <th>Date of Movement</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $lists3)
                        <tr>
                            <td style="font-size:14px;">{{ $lists3->productid }}</td>
                            <td style="font-size:14px;">{{ $lists3->name }}</td>
                            <td style="font-size:14px;">{{ $lists3->category }}</td>
                            <td style="font-size:14px;">{{ $lists3->Stock_In }}</td>
                            <td style="font-size:14px;">{{ $lists3->Stock_Out }}</td>
                            <td style="font-size:14px;">{{ $lists3->Quantity }}</td>
                            <td style="font-size:14px;">{{ $lists3->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </table>
        </div>
    </div>
@endsection
