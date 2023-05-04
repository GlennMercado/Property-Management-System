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
    <p class="display-3 text-center">Event Report</p>
    {{-- <p class="display-3 text-center">from {{ $start_date }} to {{ $end_date }}</p> --}}
    <p class="display-3 text-center">Data count: {{ $total }}</p>
    <div class="row d-flex justify-content-center p-5">
        <div class="container-fluid">
            <table class="table align-items-center table-flush" id="myTable">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" style="font-size:17px;">Created At</th>
                        <th scope="col" style="font-size:17px;">Event Name</th>
                        <th scope="col" style="font-size:17px;">Payment</th>
                        <th scope="col" style="font-size:17px;">Start Time</th>
                        <th scope="col" style="font-size:17px;">End Time</th>
                        <th scope="col" style="font-size:17px;">Start Date</th>
                        <th scope="col" style="font-size:17px;">End Date</th>
                        <th scope="col" style="font-size:17px;">Event Type</th>
                        <th scope="col" style="font-size:17px;">Facility</th>
                        <th scope="col" style="font-size:17px;">Client Name</th>
                        <th scope="col" style="font-size:17px;">Contact Number</th>
                        <th scope="col" style="font-size:17px;">No. of Guest</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $lists)
                        <tr>
                            <td>{{ $lists->created_at }}</td>
                            <td>{{ $lists->event_name }}</td>
                            <td>{{ $lists->payment }}</td>
                            <td>{{ $lists->start_time }}</td>
                            <td>{{ $lists->end_time }}</td>
                            <td>{{ $lists->start_date }}</td>
                            <td>{{ $lists->end_date }}</td>
                            <td>{{ $lists->event_type }}</td>
                            <td>{{ $lists->facility }}</td>
                            <td>{{ $lists->client_name }}</td>
                            <td>{{ $lists->contact_number }}</td>
                            <td>{{ $lists->num_of_guest }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
