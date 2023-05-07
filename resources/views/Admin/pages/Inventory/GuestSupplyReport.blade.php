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
                                            <th scope="col" style="font-size:16px;">Room No.</th>
                                            <th scope="col" style="font-size:16px;">Item Name</th>
                                            <th scope="col" style="font-size:16px;">Quantity</th>
                                            <th scope="col" style="font-size:16px;">Attendant</th>
                                            <th scope="col" style="font-size:16px;">Status</th>
                                            <th scope="col" style="font-size:16px;">RequestedQuantity</th>
                                            <th scope="col" style="font-size:16px;">DateRequested</th>
                                            <th scope="col" style="font-size:16px;">DateReceived</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $lists2)
                                            <tr>
                                                <td style="font-size:14px;">{{ $lists2->Room_No }}</td>
                                                <td style="font-size:14px;">{{ $lists2->name }}</td>
                                                <td style="font-size:14px;">{{ $lists2->Quantity }}</td>
                                                <td style="font-size:14px;">{{ $lists2->Attendant }}</td>
                                                <td style="font-size:14px;">{{ $lists2->Status }}</td>
                                                <td style="font-size:14px;">{{ $lists2->Quantity_Requested }}</td>
                                                <td style="font-size:14px;">{{ $lists2->Date_Requested }}</td>
                                                <td style="font-size:14px;">{{ $lists2->Date_Received }}</td>
                                            </tr>
                                            @endforeach
                                            </tbody>
            </table>
        </div>
    </div>
@endsection
