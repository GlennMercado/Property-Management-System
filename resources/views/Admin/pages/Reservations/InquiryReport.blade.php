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
    <p class="display-3 text-center">Inquiry Report</p>
    {{-- <p class="display-3 text-center">from {{ $start_date }} to {{ $end_date }}</p> --}}
    <p class="display-3 text-center">Data count: {{ $total }}</p>
    <div class="row d-flex justify-content-center p-5">
        <div class="container-fluid">
            <table class="table align-items-center table-flush" id="myTable">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" style="font-size:17px;">Created At</th>
                        <th scope="col" style="font-size:17px;">Client Information</th>
                        <th scope="col" style="font-size:17px;">Event Details</th>
                        <th scope="col" style="font-size:17px;">Inquiry Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $lists)
                        <tr>
                            <td>
                                {{ $lists->created_at }}
                            </td>
                            <td>
                                <span class="font-weight-bold">
                                    Client Name: </span>
                                {{ $lists->client_name }}
                                <br>
                                <span class="font-weight-bold">
                                    Contact No.:</span>
                                {{ $lists->contact_no }}
                                <br>
                                <span class="font-weight-bold">
                                    Contact Person:</span>
                                {{ $lists->contact_person }}
                                <br>
                                <span class="font-weight-bold">
                                    Billing Address:</span>
                                {{ $lists->billing_address }}
                                <br>
                                <span class="font-weight-bold">
                                    Email Address:</span>
                                {{ $lists->email_address }}
                                <br>
                            </td>
                            <td>
                                <span class="font-weight-bold">
                                    Event Name:</span>
                                {{ $lists->event_name }}
                                <br>
                                <span class="font-weight-bold">
                                    Event Type:</span>
                                {{ $lists->event_type }}
                                <br>
                                <span class="font-weight-bold">
                                    Event Date:</span>
                                {{ $lists->event_date }}
                                <br>
                                <span class="font-weight-bold">
                                    No of Guest:</span>
                                {{ $lists->no_of_guest }}
                                <br>
                                <span class="font-weight-bold">
                                    Venue:</span>
                                {{ $lists->venue }}
                                <br>
                                <span class="font-weight-bold">
                                    Caterer:</span>
                                {{ $lists->caterer }}
                                <br>
                                <span class="font-weight-bold">
                                    Audio/Visual:</span>
                                {{ $lists->audio_visual }}
                                <br>
                                <span class="font-weight-bold">
                                    Concept and Styling:</span>
                                {{ $lists->concept }}
                                <br>
                            </td>
                            <td>
                                <span class="font-weight-bold">
                                    <h4>
                                        {{ $lists->inquiry_status }}
                                    </h4>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
