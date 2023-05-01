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
                        <th scope="col" style="font-size:17px;">Or Num</th>
                        <th scope="col" style="font-size:17px;">Payee</th>
                        <th scope="col" style="font-size:17px;">Particulars</th>
                        <th scope="col" style="font-size:17px;">Event Date</th>
                        <th scope="col" style="font-size:17px;">Amount</th>
                        <th scope="col" style="font-size:17px;">Remarks</th>
                        <th scope="col" style="font-size:17px;">Debit Type</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $lists)
                        <tr>
                            <td style="font-size:14px;">{{ $lists->ornum }}</td>
                            <td style="font-size:14px;">{{ $lists->payee }}</td>
                            <td style="font-size:14px;">{{ $lists->particular }}</td>
                            <td style="font-size:14px;">{{ $lists->eventdate }}</td>
                            <td style="font-size:14px;">{{ $lists->amount }}</td>
                            <td style="font-size:14px;">{{ $lists->remark }}</td>
                            <td style="font-size:14px;">{{ $lists->debit }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
