@extends('layouts.printpage')

@section('content')
    @foreach ($list as $lists)
        <div class="container mt-4">
            <div class="d-flex">
                <div class="p-1"><img src="{{ asset('nvdcpics') }}/nvdc-logo.png" style="height: 80px; width: 80px"></div>
                <div class="p-2">
                    <p class="display-2">NVDC Properties</p>
                </div>
            </div>
            <div class="d-flex">
                <div class="font-weight-bold display-4">Brgy, 123 General Luis, Novaliches, Quezon City</div>
            </div>
            <div class="d-flex">
                <div class="font-weight-bold">Name: {{ $lists->Guest_Name }}</div>
            </div>
            <div class="d-flex">
                <div class="font-weight-bold">Booking No: {{ $lists->Booking_No }}</div>
            </div>
            <div class="d-flex">
                <div class="font-weight-bold">Phone No: {{ $lists->Mobile_Num }}</div>
            </div>
            <div class="d-flex">
                <div class="font-weight-bold">Email: {{ $lists->Email }}</div>
            </div>
            <table class="mt-5" style="width: 100%">
                <thead style="border-bottom: 2px solid rgb(167, 167, 167)">
                    <tr>
                        <th>
                            <P class="font-weight-bold text-muted">PAX NUMBER</P>
                        </th>
                        <th>
                            <P class="font-weight-bold text-muted">ROOM NUMBER</P>
                        </th>
                        <th>
                            <P class="font-weight-bold text-muted">SUBTOTAL</P>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <h2 class="display-5">{{ $lists->No_of_Pax }}</h2>
                        </td>
                        <td>
                            <h2 class="display-5">{{ $lists->Room_No }}</h2>
                        </td>
                        <td>
                            <h2 class="display-5 text-green cur1" id="money2">{{ $lists->Payment }}</h2>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="">
                <div class="d-flex justify-content-around mt-6">
                    <div class="p-2">
                        <p class="display-5 font-weight-bold">CHECK IN</p>
                    </div>
                    <div class="p-2">
                        <p class="display-5 font-weight-bold">CHECK OUT</p>
                    </div>
                    <div class="p-2">
                        <p class="display-5 font-weight-bold">DAYS</p>
                    </div>
                    <div class="p-2">
                        <p class="display-5 font-weight-bold">TOTAL</p>
                    </div>
                </div>
                <div class="b2">
                    <div class="d-flex justify-content-around">
                        <p class="text-dark display-3">{{ date('F j, Y', strtotime($lists->Check_In_Date)) }}</p>
                        <p class="text-dark display-3">{{ date('F j, Y', strtotime($lists->Check_Out_Date)) }}</p>
                        <p class="text-dark display-3" id="date_invoice"></p>
                        <p class="display-3 text-green cur1" id="money3">{{ $lists->Payment }}</p>
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <div class="p-4">
                        <p class="display-5 font-weight-bold">Website: nvdcproperties.com</p>
                    </div>
                    <div class="p-4">
                        <p class="display-5 font-weight-bold">Email: nvdcproperties@gmail.com</p>
                    </div>
                    <div class="p-4">
                        <p class="display-5 font-weight-bold">Contact: 09123123123</p>
                    </div>
                </div>
            </div>
            <input type="hidden" id="date1" value="{{ $lists->Check_In_Date }}">
            <input type="hidden" id="date2" value="{{ $lists->Check_Out_Date }}">
            <input type="hidden" id="money1" value="{{ $lists->Payment }}">
        </div>
        <style>
            .cur1::before{
                content: '₱';
            }
            .b1 {
                border-bottom: 2px solid rgb(167, 167, 167);
            }

            .b2 {
                border-bottom: 2px solid rgb(167, 167, 167);
                border-top: 2px solid rgb(167, 167, 167);
            }
        </style>
        <script>
            document.addEventListener("DOMContentLoaded", function(e) {
                let money = document.getElementById("money1").value;
                let money1 = Number(money);
                let money2 = document.getElementById("money2");
                let money3 = document.getElementById("money3");
                money2.innerHTML = money1.toLocaleString('en-US');
                money3.innerHTML = money1.toLocaleString('en-US');
                let date_invoice = document.getElementById("date_invoice");
                let d1 = document.getElementById("date1").value;
                let d2 = document.getElementById("date2").value;
                const dateOne = new Date(d1);
                const dateTwo = new Date(d2);
                const time = Math.abs(dateTwo - dateOne);
                const days = Math.ceil(time / (1000 * 60 * 60 * 24));
                date_invoice.innerHTML = days;
            });
        </script>
    @endforeach
@endsection
