@extends('layouts.calendar')

@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid mt--8">
        <div class="row align-items-center py-4">
            <div class="col-lg-12 col-12">
                <h6 class="h2 text-dark d-inline-block mb-0">Calendar</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">Calendar</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="card shadow">
            <div class="card-body">
                <div class="nav-wrapper">
                    <div id="calendar"></div>
                    <!-- Modal -->
                    <div class="modal fade" id="hotel_reserve" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text"
                                        role="tablist">
                                        <li class="nav-item">
                                            <p class="text-left">Room No - Beds: </p>
                                            <select id="room_no" class="form-control" required>
                                                <option selected="true" disabled="disabled">Select</option>
                                                @foreach ($room as $rooms)
                                                    @if ($rooms->Status == 'Available')
                                                        <option value="{{ $rooms->Room_No }}">{{ $rooms->Room_No }} -
                                                            {{ $rooms->No_of_Beds }} - {{ $rooms->Extra_Bed }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </li>
                                        <li class="nav-item">
                                            <p class="text-left">Check in Date/Time: </p>
                                            <input id="checkin" type="text" hidden />
                                            <input class="form-control" id="incheck" readonly>
                                        </li>
                                        <li class="nav-item">
                                            <p class="text-left">Check out Date/Time: </p>
                                            <input class="form-control chck" id="checkout" type="date"
                                                onkeydown="return false" id="example-datetime-local-input" required>
                                        </li>
                                    </ul>

                                    <br><br>

                                    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text"
                                        role="tablist">
                                        <li class="nav-item">
                                            <p class="text-left">Number of Pax: </p>
                                            <select id="pax" class="form-control" required>
                                                <option selected="true" disabled="disabled">Select</option>
                                                @for ($count = 1; $count <= 4; $count++)
                                                    <option value="{{ $count }}">{{ $count }}</option>
                                                @endfor
                                            </select>
                                        </li>
                                        <li class="nav-item">
                                            <p class="text-left">Mobile No.: </p>
                                            <input class="form-control" id="mobile_num" type="tel" minlength="11"
                                                maxlength="11" required>
                                        </li>
                                        <li class="nav-item">
                                            <p class="text-left">Guest Name: </p>
                                            <input class="form-control" type="text" id="guest_name" required>
                                        </li>
                                    </ul>

                                    <br><br>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" id="savebtn" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        var selecteddate = null;
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var booking = @json($events);

            $('#calendar').fullCalendar({
                editable: true,
                header: {
                    left: 'prev,next, today',
                    center: 'title',
                    right: 'month, agendaWeek, agendaDay'
                },
                events: booking,
                eventColor: '#5cb85c',
                eventTextColor: 'white',
                eventDisplay: 'block',
                selectable: true,
                selectHelper: true,
                select: function(start, end, allDay) {
                    var check = start.format("YYYY-MM-DD");
                    var today = moment().format("YYYY-MM-DD");

                    if (check < today) {
                        alert("Date Not Available");
                    } else {
                        var start = $.fullCalendar.formatDate(start, 'YYYY-MM-DD');

                        $("#hotel_reserve").modal('show');
                        document.getElementById("checkin").value = start;
                        document.getElementById("incheck").value = start;

                        $('#savebtn').click(function() {


                            var room_no = $('#room_no').val();
                            var checkin = start;
                            var checkout = $('#checkout').val();
                            var pax = $('#pax').val();
                            var mobile_num = $('#mobile_num').val();
                            var guest_name = $('#guest_name').val();

                            $.ajax({
                                url: "{{ url('/hotel_sched') }}",
                                type: "POST",
                                dataType: 'json',
                                data: {
                                    room_no,
                                    checkin,
                                    checkout,
                                    pax,
                                    mobile_num,
                                    guest_name
                                },
                                success: function(response) {
                                    //console.log(response)

                                    $("#hotel_reserve").modal('hide');
                                    $('#calendar').fullCalendar('renderEvent', {
                                        'title': response.Room_No,
                                        'start': response.Check_In_Date,
                                        'end': response.Check_Out_Date
                                    })

                                    $("#room_no, #checkout, #pax, #mobile_num, #guest_name")
                                        .val('');

                                },
                                error: function(error) {
                                    // if(error.responseJSON.errors){
                                    //     message in label
                                    //     $('#error').html(error.responseJSON.errors.title);
                                    // }
                                }
                            });
                        });
                    }
                }
            });

        });

        $(document).ready(function() { //DISABLED PAST DATES IN APPOINTMENT DATE
            var dateToday = new Date();
            var month = dateToday.getMonth() + 1;
            var day = dateToday.getDate();
            var year = dateToday.getFullYear();

            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;

            $('.chck').attr('min', maxDate);
        });
    </script>
    <style>
        .title {
            text-transform: uppercase;
            font-size: 25px;
            letter-spacing: 2px;
        }
    </style>
@endsection
