@extends('layouts.printpage')

@section('content')


   
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
            @foreach ($list as $lists)
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
            @endforeach
            <br>
            <div>
                <h1>Booking Fee/s</h1>
                <table class="mt-5" style="width: 100%">
                    <thead style="border-bottom: 2px solid rgb(167, 167, 167)">
                        <tr>
                            <th>
                                <P class="font-weight-bold text-muted">ROOM NUMBER</P>
                            </th>
                            <th>
                                <P class="font-weight-bold text-muted">CHECK-IN</P>
                            </th>
                            <th>
                                <P class="font-weight-bold text-muted">CHECK-OUT</P>
                            </th>
                            <th>
                                <P class="font-weight-bold text-muted">DAY/S</P>
                            </th>
                            <th>
                                <P class="font-weight-bold text-muted">PAX NUMBER</P>
                            </th>
                            <th>
                                <P class="font-weight-bold text-muted">SUBTOTAL</P>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($list as $lists)
                        <tr>
                            <td>
                                <h2 class="display-5">{{ $lists->Room_No }}</h2>
                            </td>
                            <td>
                                <h2 class="display-5">{{ date('F j, Y', strtotime($lists->Check_In_Date)) }}</h2>
                            </td>
                            <td>
                                <h2 class="display-5">{{ date('F j, Y', strtotime($lists->Check_Out_Date)) }}</h2>
                            </td>
                            <td>
                                <h2 class="display-5" id="date_invoice" >{{ date('F j, Y', strtotime($lists->Check_Out_Date)) }}</h2>
                            </td>
                            <td>
                                <h2 class="display-5">{{ $lists->No_of_Pax }}</h2>
                            </td>
                            <td>
                                <h2 class="display-5 text-green cur1" id="money2">{{ $lists->Payment }}</h2>
                            </td>
                        </tr>
                        <input type="hidden" id="date1" value="{{ $lists->Check_In_Date }}">
                        <input type="hidden" id="date2" value="{{ $lists->Check_Out_Date }}">
                        <input type="hidden" id="money1" value="{{ $lists->Payment }}">
                    @endforeach
                    </tbody>
                </table>
            </div>
            <br><br>
            <div>
                <h1>Additional Fee/s</h1>
                <!-- Items -->
                <table class="mt-5" style="width: 100%;">
                    <thead style="border-bottom: 2px solid rgb(167, 167, 167)">
                        <tr>
                            <th>
                                <P class="font-weight-bold text-muted">Item Name</P>
                            </th>
                            <th>
                                <P class="font-weight-bold text-muted">Discrepancy</P>
                            </th>
                            <th>
                                <P class="font-weight-bold text-muted">Price per Item</P>
                            </th>
                            <th>
                                <P class="font-weight-bold text-muted">Total Amount</P>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($list2 as $index => $lists2)
                        <tr>
                            <td>
                                <h2 class="display-5">{{ $lists2->name }}</h2>
                            </td>
                            <td>
                                <h2 class="display-5" id="dis{{ $index }}">{{ $lists2->Discrepancy }}</h2>
                            </td>
                            <td>
                                <h2 class="display-5" id="pr{{ $index }}">{{ $lists2->Price }}</h2>
                            </td>
                            <td>
                                <h2 class="display-5 text-green cur1" id="total_amount{{ $index }}"></h2>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <br><br>
            <div>
                <h1>Maintenance</h1>
                <!-- Items -->
                <table class="mt-5" style="width: 100%;">
                    <thead style="border-bottom: 2px solid rgb(167, 167, 167)">
                        <tr>
                            <th>
                                <P class="font-weight-bold text-muted">Description</P>
                            </th>
                            <th>
                                <P class="font-weight-bold text-muted">Total Amount</P>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($list4 as $index => $lists4)
                        <tr>
                            <td>
                                <h2 class="display-5">{{ $lists4->Description }}</h2>
                            </td>
                            <td>
                                <h2 class="display-5 text-green cur1" id="cost{{ $index }}">{{ $lists4->Cost }}</h2>
                                <p id="main_total{{$index}}" style="display:none;"></p>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="">
                <div class="d-flex justify-content-around mt-6">
                    <div class="p-2">
                        <p class="display-5 font-weight-bold">Used Supplies</p>
                    </div>
                    <div class="p-2">
                        <p class="display-5 font-weight-bold">Maintenance</p>
                    </div>
                    <div class="p-2">
                        <p class="display-5 font-weight-bold">Hotel Booking</p>
                    </div>
                    <div class="p-2">
                        <p class="display-5 font-weight-bold">TOTAL Amount</p>
                    </div>
                </div>
                <div class="b2">
                    <div class="d-flex justify-content-around">
                        <p class="text-dark display-3 cur1" id="item_total"></p>
                        <p class="text-dark display-3 cur1" id="maintain_total"></p>
                        <p class="text-dark display-3 cur1" id="money3"></p>
                        <p class="display-3 text-green cur1" id="all"></p>
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
            
       
        </div>
        <style>
            table{
                text-align:center;
            }

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
                
                //money2.innerHTML = money1.toLocaleString('en-US');
                money2.innerHTML = money1.toFixed(2);

                //money3.innerHTML = money1.toLocaleString('en-US');
                money3.innerHTML = money1.toFixed(2);
                let date_invoice = document.getElementById("date_invoice");
                let d1 = document.getElementById("date1").value;
                let d2 = document.getElementById("date2").value;
                const dateOne = new Date(d1);
                const dateTwo = new Date(d2);
                const time = Math.abs(dateTwo - dateOne);
                const days = Math.ceil(time / (1000 * 60 * 60 * 24));
                date_invoice.innerHTML = days;

                let total_amounts = document.querySelectorAll('[id^="total_amount"]');
                let dis_values = document.querySelectorAll('[id^="dis"]');
                let pr_values = document.querySelectorAll('[id^="pr"]');

                let main_totals = document.querySelectorAll('[id^="main_total"]');
                let costs = document.querySelectorAll('[id^="cost"]');
                
                let total = money1;
                let item_total = 0;
                let mcost = 0;

                for(let i=0; i<total_amounts.length; i++) 
                {
                    let product = parseFloat(dis_values[i].textContent) * parseFloat(pr_values[i].textContent);
                    total += product;
                    total_amounts[i].innerHTML = product.toFixed(2); 

                    item_total += product;
                }

                for(let i=0; i<main_totals.length; i++)
                {
                    let costs1 = parseFloat(costs[i].textContent);
                    total += costs1;
                    mcost += costs1;
                }

                let item_total_element = document.getElementById("item_total");
                item_total_element.innerHTML = item_total.toFixed(2);

                let maintain_total_element = document.getElementById("maintain_total");
                maintain_total_element.innerHTML = mcost.toFixed(2);

                let alltotal = document.getElementById("all");
                alltotal.innerHTML = total.toFixed(2); 
            });
        </script>
@endsection
