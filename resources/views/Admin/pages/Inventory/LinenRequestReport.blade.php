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
                                    <th scope="col" style="font-size:16px;">Room Number</th>
                                    <th scope="col" style="font-size:16px;">Item Name</th>
                                    <th scope="col" style="font-size:16px;">Discrepancy</th>
                                    <th scope="col" style="font-size:16px;">Quantity Requested</th>
                                    <th scope="col" style="font-size:16px;">Status</th>
                                    <th scope="col" style="font-size:16px;">DateRequested</th>
                                    <th scope="col" style="font-size:16px;">DateReceived</th>
                                     </tr>
                                    </thead>
                                        <tbody>
                                        @foreach ($data as $lists)
                                            <tr>
                                                <td style="font-size:14px;">{{ $lists->Room_No }}</td>
                                                <td style="font-size:14px;">{{ $lists->name }}</td>
                                                <td style="font-size:14px;">{{ $lists->Discrepancy }}</td>
                                                <td style="font-size:14px;">{{ $lists->Quantity_Requested }}</td>
                                                <td style="font-size:14px;">{{ $lists->Status }}</td>
                                                <td style="font-size:14px;">{{ $lists->Date_Requested }}</td>
                                                <td style="font-size:14px;">{{ $lists->Date_Received }}</td>
                                            </tr>
                                         @endforeach
                                        </tbody>
            </table>
        </div>
    </div>
@endsection

