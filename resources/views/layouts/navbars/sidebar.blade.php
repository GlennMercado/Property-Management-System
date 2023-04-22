<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-dark" id="sidenav-main"
    style="background-color:rgb(54, 59, 69)">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
            aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <div class="sidenav-header d-flex justify-content-center">
            <a href="{{ route('home') }}">
                <img src="{{ asset('nvdcpics') }}/nvdc-logo6.png" style="height: 60px; width: 210px">
            </a>
        </div>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main" style="background-color:rgb(54, 59, 69)">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img alt="Image placeholder" src="{{ asset('nvdcpics') }}/nvdc-logo.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                            data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                            aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <!--Dashboard-->
                <li class="nav-item {{ 'home' == request()->path() ? 'act1' : '' }}">
                    <a class="nav-link text-light" href="{{ route('home') }}">
                        <i class="bi bi-display" style="color:rgb(224, 223, 223)"></i> {{ __('Dashboard') }}
                        <span class="badge rounded-pill badge-notification bg-danger text-white ml-2 ml-auto"
                            id="ncount">{{ auth()->user()->notifications->count() }}</span>
                    </a>
                </li>

                <!--Calendar-->
                <li class="nav-item {{ 'Calendar' == request()->path() ? 'act1' : '' }}">
                    <a class="nav-link text-light" href="{{ route('Calendar') }}">
                        <i class="bi bi-calendar3" style="color:rgb(224, 223, 223)"></i></i> {{ __('Calendar') }}
                        <span class="badge rounded-pill badge-notification bg-danger text-white ml-2 ml-auto"
                            id="ncount">{{ auth()->user()->notifications->count() }}</span>
                    </a>
                </li>


                <!--Room Management-->
                <li class="nav-item {{ 'Hotel_Room_Management' == request()->path() ? 'act1' : '' }}">
                    <a class="nav-link text-light" href="{{ route('Dashboard') }}">
                        <i class="bi bi-door-open-fill" style="color:rgb(243, 243, 243)"></i>
                        {{ __('Room Management') }}
                        <span class="badge rounded-pill badge-notification bg-danger text-white ml-2 ml-auto"
                            id="ncount">{{ auth()->user()->notifications->count() }}</span>
                    </a>
                </li>


                <!-- Sales & Marketing -->
                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples2" data-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="navbar-examples3">
                        <i class="bi bi-pc-display" style="color:rgb(224, 223, 223)"></i>
                        <span class="nav-link-text text-light">{{ __('Sales & Marketing') }}</span>
                    </a>
                    <div class="collapse" id="navbar-examples2">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'HotelReservationForm' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('HotelReservationForm') }}">
                                    <i class="bi bi-book-fill" style="color:rgb(224, 223, 223)"></i>
                                    {{ __('Hotel Booking') }}
                                    <span class="badge rounded-pill badge-notification bg-danger text-white ml-2 ml-auto"
                                        id="ncount">{{ auth()->user()->notifications->count() }}</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'GuestFolio' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('GuestFolio') }}">
                                    <i class="bi bi-person-lines-fill" style="color:rgb(224, 223, 223)"></i>
                                    {{ __('Guest Folio') }}
                                    <span class="badge rounded-pill badge-notification bg-danger text-white ml-2 ml-auto"
                                        id="ncount">{{ auth()->user()->notifications->count() }}</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'EventInquiryForm' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('EventInquiryForm') }}">
                                    <i class="bi bi-calendar-event-fill" style="color:rgb(224, 223, 223)"></i>
                                    {{ __('Event Inquiry') }}
                                    <span class="badge rounded-pill badge-notification bg-danger text-white ml-2 ml-auto"
                                        id="ncount">{{ auth()->user()->notifications->count() }}</span>
                                </a>
                            </li>
                        </ul>
                        {{-- <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'CommercialSpaceForm' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('CommercialSpaceForm') }}">
                                    <i class="bi bi-grid-3x3-gap-fill" style="color:rgb(224, 223, 223)"></i>
                                    {{ __('Commercial Space') }}
                                    <span class="badge rounded-pill badge-notification bg-danger text-white ml-2"
                                        id="ncount">{{ auth()->user()->notifications->count() }}</span>
                                </a>
                            </li>
                        </ul> --}}
                        {{-- Commercial Space dropdown --}}

                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="#navbar-examples9" data-toggle="collapse"
                                    role="button" aria-expanded="false" aria-controls="navbar-examples9">
                                    <i class="bi bi-telephone-forward-fill" style="color:rgb(224, 223, 223)"></i>
                                    <span class="nav-link-text text-light">{{ __('Commercial Space') }}</span>
                                </a>
                            </li>
                            <div class="collapse" id="navbar-examples9">
                                {{-- Applications --}}
                                <ul class="nav nav-sm flex-column">
                                    <li
                                        class="nav-item {{ 'CommercialSpaceForm' == request()->path() ? 'act1' : '' }}">
                                        <a class="nav-link text-light" href="{{ route('CommercialSpaceForm') }}">
                                            <i class="bi bi-grid-3x3-gap-fill" style="color:rgb(224, 223, 223)"></i>
                                            {{ __('Application') }}
                                            <span
                                                class="badge rounded-pill badge-notification bg-danger text-white ml-2 ml-auto"
                                                id="ncount">{{ auth()->user()->notifications->count() }}</span>
                                        </a>
                                    </li>
                                </ul>
                                {{-- Tenants --}}
                                <ul class="nav nav-sm flex-column">
                                    <li
                                        class="nav-item {{ 'CommercialSpaceTenants' == request()->path() ? 'act1' : '' }}">
                                        <a class="nav-link text-light" href="{{ route('CommercialSpaceTenants') }}">
                                            <i class="bi bi-grid-3x3-gap-fill" style="color:rgb(224, 223, 223)"></i>
                                            {{ __('Tenants') }}
                                            <span
                                                class="badge rounded-pill badge-notification bg-danger text-white ml-2 ml-auto"
                                                id="ncount">{{ auth()->user()->notifications->count() }}</span>
                                        </a>
                                    </li>
                                </ul>
                                {{-- Rent Collections --}}
                                <ul class="nav nav-sm flex-column">
                                    <li
                                        class="nav-item {{ 'CommercialSpaceRentCollections' == request()->path() ? 'act1' : '' }}">
                                        <a class="nav-link text-light" href="{{ route('CommercialSpaceRentCollections') }}">
                                            <i class="bi bi-grid-3x3-gap-fill" style="color:rgb(224, 223, 223)"></i>
                                            {{ __('Rent Collections') }}
                                            <span
                                                class="badge rounded-pill badge-notification bg-danger text-white ml-2 ml-auto"
                                                id="ncount">{{ auth()->user()->notifications->count() }}</span>
                                        </a>
                                    </li>
                                </ul>
                                {{-- Utility Bills Collections --}}
                                <ul class="nav nav-sm flex-column">
                                    <li
                                        class="nav-item {{ 'CommercialSpaceForm' == request()->path() ? 'act1' : '' }}">
                                        <a class="nav-link text-light" href="{{ route('CommercialSpaceForm') }}">
                                            <i class="bi bi-grid-3x3-gap-fill" style="color:rgb(224, 223, 223)"></i>
                                            {{ __('Utility Bills Collection') }}
                                            <span
                                                class="badge rounded-pill badge-notification bg-danger text-white ml-2 ml-auto"
                                                id="ncount">{{ auth()->user()->notifications->count() }}</span>
                                        </a>
                                    </li>
                                </ul>
                                {{-- Commercial Space Units --}}
                                <ul class="nav nav-sm flex-column">
                                    <li
                                        class="nav-item {{ 'CommercialSpaceForm' == request()->path() ? 'act1' : '' }}">
                                        <a class="nav-link text-light" href="{{ route('CommercialSpaceForm') }}">
                                            <i class="bi bi-grid-3x3-gap-fill" style="color:rgb(224, 223, 223)"></i>
                                            {{ __('Commercial Space Units') }}
                                            <span
                                                class="badge rounded-pill badge-notification bg-danger text-white ml-2 ml-auto"
                                                id="ncount">{{ auth()->user()->notifications->count() }}</span>
                                        </a>
                                    </li>
                                </ul>
                                {{-- Notices --}}
                                <ul class="nav nav-sm flex-column">
                                    <li
                                        class="nav-item {{ 'CommercialSpaceForm' == request()->path() ? 'act1' : '' }}">
                                        <a class="nav-link text-light" href="{{ route('CommercialSpaceForm') }}">
                                            <i class="bi bi-grid-3x3-gap-fill" style="color:rgb(224, 223, 223)"></i>
                                            {{ __('Notices') }}
                                            <span
                                                class="badge rounded-pill badge-notification bg-danger text-white ml-2 ml-auto"
                                                id="ncount">{{ auth()->user()->notifications->count() }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div> 
                        </ul>

                    </div>
                </li>

                <!--Housekeeping-->
                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples4" data-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="navbar-examples4">
                        <i class="bi bi-house-door-fill" style="color:rgb(224, 223, 223)"></i>
                        <span class="nav-link-text text-light">{{ __('Housekeeping') }}</span>
                    </a>
                    <div class="collapse" id="navbar-examples4">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'Housekeeping_Dashboard' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('Housekeeping_Dashboard') }}">
                                    <i class="bi bi-bar-chart-fill" style="color:rgb(224, 223, 223)"></i>
                                    {{ __('Dashboard') }}
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'List_of_Housekeepers' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('List_of_Housekeepers') }}">
                                    <i class="bi bi-clipboard2-data-fill" style="color:rgb(224, 223, 223)"></i>
                                    {{ __('Housekeepers') }}
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'Linen_Monitoring' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('Linen_Monitoring') }}">
                                    <i class="bi bi-clipboard2-data-fill" style="color:rgb(224, 223, 223)"></i>
                                    {{ __('Linen Monitoring') }}
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('LostandFound') }}">
                                    <i class="bi bi-question-square-fill" style="color:rgb(224, 223, 223)"></i>
                                    {{ __('Lost and Found') }}
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'Maintenance' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('Maintenance') }}">
                                    <i class="bi bi-wrench-adjustable-circle-fill"
                                        style="color:rgb(224, 223, 223)"></i>
                                    {{ __('Maintenance') }}
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'Guest_Request' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('Guest_Request') }}">
                                    <i class="bi bi-chat-dots-fill" style="color:rgb(224, 223, 223)"></i>
                                    {{ __('Guest Request') }}
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'Housekeeping_Reports' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('Housekeeping_Reports.reports') }}">
                                    <i class="bi bi-file-earmark-text-fill" style="color:rgb(224, 223, 223)"></i>
                                    {{ __('Reports') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!--Inventory Management-->
                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples3" data-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="navbar-examples3">
                        <i class="bi bi-box-fill" style="color:rgb(224, 223, 223)"></i>
                        <span class="nav-link-text text-light">{{ __('Inventory Management') }}</span>
                    </a>
                    <div class="collapse" id="navbar-examples3">

                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'StockCount' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('StockCount') }}">
                                    <i class="bi bi-box-seam-fill" style="color:rgb(224, 223, 223)"></i>
                                    {{ __('Hotel Inventory') }}
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'StockCenter' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('StockCenter') }}">
                                    <i class="bi bi-box-seam-fill" style="color:rgb(224, 223, 223)"></i>
                                    {{ __('Convention Center Inventory') }}
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'StockHotelLinen' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('StockHotelLinen') }}">
                                    <i class="bi bi-chat-left-fill" style="color:rgb(224, 223, 223)"></i>
                                    {{ __('Linen Request') }}
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'StockHotelSupply' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('StockHotelSupply') }}">
                                    <i class="bi bi-ui-checks" style="color:rgb(224, 223, 223)"></i>
                                    {{ __('Supply Request') }}
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'GuestRequest' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('GuestRequest') }}">
                                    <i class="bi bi-person-lines-fill" style="color:rgb(224, 223, 223)"></i>
                                    {{ __('Guest Request') }}
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'StockRoomSupply' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('StockRoomSupply') }}">
                                    <i class="bi bi-clipboard-data-fill" style="color:rgb(224, 223, 223)"></i>
                                    {{ __('Stock Room Supply') }}
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'StockReports' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('StockReports') }}">
                                    <i class="bi bi-clipboard-data-fill" style="color:rgb(224, 223, 223)"></i>
                                    {{ __('Stock Reports') }}
                                </a>
                            </li>
                        </ul>

                    </div>
                </li>


                <!-- Operation Management -->
                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples5" data-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="navbar-examples3">
                        <i class="bi bi-gear-fill" style="color:rgb(224, 223, 223)"></i>
                        <span class="nav-link-text text-light">{{ __('Operations Management') }}</span>
                    </a>
                    <!-- <div class="collapse" id="navbar-examples4">
                        <ul class="nav-item">
                            <a class="nav-link" href="#navbar-examples4" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="navbar-examples4">
                                <i class="bi bi-box" style="color:rgb(224, 223, 223)"></i>
                                <span class="nav-link-text text-light">{{ __('Reservations') }}</span>
                            </a> -->

                    <div class="collapse" id="navbar-examples5">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'OperationDashboard' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('OperationDashboard') }}">
                                    <i class="bi bi-bar-chart-fill" style="color:rgb(224, 223, 223)"></i>
                                    {{ __('Dashboard') }}
                                </a>
                            </li>
                            {{-- Dropdown pt2 --}}
                            <li class="nav-item">
                                <a class="nav-link active" href="#navbar-examples7" data-toggle="collapse"
                                    role="button" aria-expanded="false" aria-controls="navbar-examples7">
                                    <i class="bi bi-telephone-forward-fill" style="color:rgb(224, 223, 223)"></i>
                                    <span class="nav-link-text text-light">{{ __('Guest Call Register') }}</span>
                                </a>
                            </li>
                            <div class="collapse" id="navbar-examples7">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item {{ 'Complaints' == request()->path() ? 'act1' : '' }}">
                                        <a class="nav-link text-light" href="{{ route('Complaints') }}">
                                            <i class="bi bi-patch-question-fill" style="color:rgb(224, 223, 223)"></i>
                                            {{ __('Complaints') }}
                                            <span
                                                class="badge rounded-pill badge-notification bg-danger text-white ml-2 ml-auto"
                                                id="ncount">{{ auth()->user()->notifications->count() }}</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item {{ 'Requests' == request()->path() ? 'act1' : '' }}">
                                        <a class="nav-link text-light" href="{{ route('Requests') }}">
                                            <i class="bi bi-person-lines-fill" style="color:rgb(224, 223, 223)"></i>
                                            {{ __('Guest Request') }}
                                            <span
                                                class="badge rounded-pill badge-notification bg-danger text-white ml-2 ml-auto"
                                                id="ncount">{{ auth()->user()->notifications->count() }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'Guest_Reservation' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('Guest_Reservation') }}">
                                    <i class="bi bi-person-badge" style="color:rgb(224, 223, 223)"></i>
                                    {{ __('Guest Reservation') }}
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'OperationRooms' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('OperationRooms') }}">
                                    <i class="bi bi-door-open-fill" style="color:rgb(224, 223, 223)"></i>
                                    {{ __('Rooms') }}
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'Reports' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('Reports.Operation_Reports') }}">
                                    <i class="bi bi-file-earmark-text-fill" style="color:rgb(224, 223, 223)"></i>
                                    {{ __('Reports') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Finance Module -->
                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples13" data-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="navbar-examples13">
                        <i class="bi bi-wallet-fill" style="color:rgb(224, 223, 223)"></i>
                        <span class="nav-link-text text-light">{{ __('Finances') }}</span>
                    </a>
                    <div class="collapse" id="navbar-examples13">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'DailyReport' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('DailyReport') }}">
                                    <i class="bi bi-calendar2-range-fill" style="color:rgb(224, 223, 223)"></i>
                                    {{ __('Daily Report') }}
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'FinanceArchives' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('FinanceArchives') }}">
                                    <i class="bi bi-archive-fill" style="color:rgb(224, 223, 223)"></i>
                                    {{ __('FinanceArchives') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- User Management --}}
                <li class="nav-item {{ 'UserManagement' == request()->path() ? 'act1' : '' }}">
                    <a class="nav-link text-light" href="{{ route('UserManagement') }}">
                        <i class="bi bi-people-fill" style="color:rgb(224, 223, 223)"></i>
                        {{ __('User Management') }}
                    </a>
                </li>
            </ul>
        </div>
        <footer>
            <span id='clock' class="text-light d-none d-lg-block" style="font-size: 12px"></span>
            {{-- <div class="copyright text-muted" style="font-size: 12px">
                &copy; {{ now()->year }} <a href="#" class="font-weight-bold ml-1"
                    target="_blank">InTeractive Solutions</a>
            </div> --}}
        </footer>
        <script type="text/javascript">
            var clockElement = document.getElementById('clock');

            function clock() {
                clockElement.textContent = new Date().toString();
            }

            setInterval(clock, 1000);
        </script>
        <style>
            .act1 {
                background-color: rgb(76, 84, 103);
                font-weight: 600;
            }

            .nav-link:hover {
                background-color: rgb(76, 84, 103);
            }
        </style>
        <script>
            var ncount = document.getElementById("ncount");
            if (ncount.innerHTML == "0") {
                ncount.style = "display: none";
            } else {
                ncount.style = "display: inline";
            }
        </script>
        <script>
            setInterval(function() {
                $.ajax({
                    url: 'http://localhost:8000/notifications/count', // Replace with your endpoint URL
                    success: function(response) {
                        $('#ncount').text(response.count);
                    }
                });
            }, 1000);
        </script>
    </div>
</nav>
