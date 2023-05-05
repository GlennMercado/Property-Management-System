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
    <div class="row d-flex p-5">
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
                                    </table><br><br><br>

                                    <h3>Gross Collection:  </h3> 
                                    <table class="table table-flush float-right" style="align-items:center" >
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" style="font-size:18px;">Cash/Gcash</th>
                                            <th scope="col" style="font-size:18px;">Bank</th>
                                            <th scope="col" style="font-size:18px;">Cheque</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $lists3)
                                            <tr>
                                                <td style="font-size:16px;">{{ $cash_sum }}</td>
                                                <td style="font-size:16px;">{{ $bank_sum }}</td>
                                                <td style="font-size:16px;">{{ $cheque_sum }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td style="font-size:16px;">Total:</td>
                                            <td style="font-size:16px;"></td>
                                            <td style="font-size:16px;">{{ $total}}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                                    
                                    {{-- Denomination --}}
                                    <div class="float-left">
                                    <h1>Cash Count</h1>
                                        <table class="table table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" style="font-size:15px;">Denomination</th>
                                                <th scope="col" style="font-size:15px;">Pieces</th>
                                                <th scope="col" style="font-size:15px;">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <tr>
                                                    <td> 1,000 pesos</td>
                                                    <td>{{ $thousands }}</td>
                                                    <td>{{ $p1k }}</td>
                                                </tr>
                                                <tr>
                                                    <td>500 pesos</td>
                                                    <td>{{ $fivehundred }}</td>
                                                    <td>{{ $p500 }}</td>
                                                </tr>
                                                <tr>
                                                    <td> 200 pesos</td>
                                                    <td>{{ $twohundred }}</td>
                                                    <td>{{ $p200 }}</td>
                                                </tr>
                                                <tr>
                                                    <td>100 pesos</td>
                                                    <td>{{ $hundreds }}</td>
                                                    <td>{{ $p100 }}</td>
                                                </tr>
                                                <tr>
                                                    <td>50 pesos</td>
                                                    <td>{{ $fifty }}</td>
                                                    <td>{{ $p50 }}</td>
                                                </tr>
                                                <tr>
                                                    <td>20 pesos</td>
                                                    <td>{{ $twenty }}</td>
                                                    <td>{{ $p20 }}</td>
                                                </tr>
                                                <tr>
                                                    <td>10 pesos</td>
                                                    <td>{{ $ten }}</td>
                                                    <td>{{ $p10 }}</td>
                                                </tr>
                                                <tr>
                                                    <td>5 pesos</td>
                                                    <td>{{ $five }}</td>
                                                    <td>{{ $p50 }}</td>
                                                </tr>
                                                <tr>
                                                    <td>1 peso</td>
                                                    <td>{{ $one }}</td>
                                                    <td>{{ $p10 }}</td>
                                                </tr>
                                                <tr>
                                                    <td>.25 cents</td>
                                                    <td>{{ $decimal }}</td>
                                                    <td>{{ $p }}</td>
                                                </tr>
                                        </tbody>
                                        <tfoot>
                                            <td>Ending Cash:</td>
                                            <td></td>
                                            <td>{{ $amount }}</td>
                                        </tfoot>
                                    </table>
                                </div>                         
        </div>


















<br><br><br><br><br><br><br>
        <h3>Checked By:__________________________________</h3>
    </div>
@endsection
