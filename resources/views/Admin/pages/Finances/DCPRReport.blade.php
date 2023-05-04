@extends('layouts.printpage')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <div class="d-flex p-4">
        <div class="p-1"><img src="{{ asset('nvdcpics') }}/nvdc-logo.png" style="height: 80px; width: 80px"></div>
        <div class="p-2">
            <p class="display-3">NVDC Properties</p>
            <div class="font-weight-bold display-5 mt--3">Brgy, 123 General Luis, Novaliches, Quezon City</div><br>
            <div class="font-weight-bold display-5 mt--3">Date: {{ $start_date    }} - {{ $end_date}}</div>
        </div>
    </div>
    <p class="display-3 text-center">{{ $title }}</p>
    <div class="row d-flex justify-content-center p-5">
        <div class="container-fluid">
            <table class="table align-items-center table-flush" id="myTable">
                <table class="table align-items-center table-flush" style="align-items:center"
                                        id="myTabless">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" style="font-size:18px;">Name of Guest/Payee</th>
                                                <th scope="col" style="font-size:18px;">Particulars</th>
                                                <th scope="col" style="font-size:18px;">Gross Charges</th>
                                                <th scope="col" style="font-size:18px;">NET Amount</th>
                                                <th scope="col" style="font-size:18px;">OR No.</th>
                                                <th scope="col" style="font-size:18px;">Remarks</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $lists3)
                                                <tr>
                                                    <td style="font-size:16px;">{{ $lists3->payee }}</td>
                                                    <td style="font-size:16px;">{{ $lists3->particular }}</td>
                                                    <td style="font-size:16px;">{{ $lists3->amount }}</td>
                                                    <td style="font-size:16px;">{{ $lists3->outputvat }}</td>
                                                    <td style="font-size:16px;">{{ $lists3->ornum }}</td>
                                                    <td style="font-size:16px;">{{ $lists3->remark }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
        </div>
    </div>
@endsection
