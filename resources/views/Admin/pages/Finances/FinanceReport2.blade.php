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
                                                <th scope="col" style="font-size:18px;">Particulars</th>
                                                <th scope="col" style="font-size:18px;">Cash/GCash</th>
                                                <th scope="col" style="font-size:18px;">Unearned Income</th>
                                                <th scope="col" style="font-size:18px;">Bank Transfer/Direct to Bank
                                                </th>
                                                <th scope="col" style="font-size:18px;">Cheque</th>
                                                <th scope="col" style="font-size:18px;">Basketball</th>
                                                <th scope="col" style="font-size:18px;">UnearnedIncome</th>
                                                <th scope="col" style="font-size:18px;">OtherIncome</th>
                                                <th scope="col" style="font-size:18px;">ManagementFee</th>
                                                <th scope="col" style="font-size:18px;">
                                                    FunctionRoom/ConventionCenter/Events
                                                <th scope="col" style="font-size:18px;">Hotel</th>
                                                <th scope="col" style="font-size:18px;">Commercial Spaces</th>
                                                <th scope="col" style="font-size:18px;">Output VAT</th>
                                            
                    </tr>
                </thead>
                                        <tbody>
                                            @foreach ($data as $lists2)
                                                <tr>
                                                    <td style="font-size:16px;">{{ $lists2->particular }}</td>
                                                    <td style="font-size:16px;">{{ $lists2->cash }}</td>
                                                    <td style="font-size:16px;">{{ $lists2->unearned }}</td>
                                                    <td style="font-size:16px;">{{ $lists2->bank }}</td>
                                                    <td style="font-size:16px;">{{ $lists2->cheque }}</td>
                                                    <td style="font-size:16px;">{{ $lists2->basketball }}</td>
                                                    <td style="font-size:16px;">{{ $lists2->unearned }}</td>
                                                    <td style="font-size:16px;">{{ $lists2->otherincome }}</td>
                                                    <td style="font-size:16px;">{{ $lists2->managementfee }}</td>
                                                    <td style="font-size:16px;">{{ $lists2->event }}</td>
                                                    <td style="font-size:16px;">{{ $lists2->hotel }}</td>
                                                    <td style="font-size:16px;">{{ $lists2->commercialspace }}</td>
                                                    <td style="font-size:16px;">{{ $lists2->outputvat }}</td>
                                                </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <style>
        @media print {
            @page {
                size: landscape;
            }
        }
    </style>

@endsection
