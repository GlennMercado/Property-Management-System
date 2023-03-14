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
        <div class="d-flex">
            <div class="font-weight-bold">Name: Glenn</div>
        </div>
        <div class="d-flex">
            <div class="font-weight-bold">Booking No: 1231231</div>
        </div>
        <div class="d-flex">
            <div class="font-weight-bold">Phone No: 09123123123</div>
        </div>
        <div class="d-flex">
            <div class="font-weight-bold">Email: glennlainardmercado@gmail.com</div>
        </div>
        <table class="mt-5" style="width: 100%">
            <thead style="border-bottom: 1px solid black">
                <th><P class="font-weight-bold text-muted">PAX NUMBER</P></th>
                <th><P class="font-weight-bold text-muted">ROOM NUMBER</P></th>
                <th><P class="font-weight-bold text-muted">ROOM DESCRIPTION</P></th>
                <th><P class="font-weight-bold text-muted">SUBTOTAL</P></th>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <p class="display-5 p-1 font-weight-bold display-4">2</p>
                    </td>
                    <td>
                        <p class="display-5 p-1 font-weight-bold display-4">3</p>
                    </td>
                    <td>
                        <p class="display-5 p-1 font-weight-bold display-4">35 square meters 1 bed</p>
                    </td>
                    <td>
                        <p class="display-5 text-green p-1 font-weight-bold display-4">₱2,500</p>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="">
            <div class="d-flex justify-content-around mt-6">
                <div class="p-2">
                    <p class="display-5 font-weight-bold">DATE</p>
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
                        <p class="text-dark display-3">12/12/12</p>
                        <p class="text-dark display-3">14</p>
                        <p class="display-3 text-green">₱2,500</p>
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
        .b1 {
            border-bottom: 2px solid rgb(167, 167, 167);
        }

        .b2 {
            border-bottom: 2px solid rgb(167, 167, 167);
            border-top: 2px solid rgb(167, 167, 167);
        }
    </style>
@endsection
