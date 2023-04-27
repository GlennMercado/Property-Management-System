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
                                    <span
                                        class="badge rounded-pill badge-notification bg-danger text-white ml-2 ml-auto"
                                        id="ncount">{{ auth()->user()->notifications->count() }}</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'EventInquiryForm' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('EventInquiryForm') }}">
                                    <i class="bi bi-calendar-event-fill" style="color:rgb(224, 223, 223)"></i>
                                    {{ __('Event Inquiry') }}
                                    <span
                                        class="badge rounded-pill badge-notification bg-danger text-white ml-2 ml-auto"
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
                                        <a class="nav-link text-light"
                                            href="{{ route('CommercialSpaceRentCollections') }}">
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
                                        class="nav-item {{ 'CommercialSpaceUtilityBills' == request()->path() ? 'act1' : '' }}">
                                        <a class="nav-link text-light"
                                            href="{{ route('CommercialSpaceUtilityBills') }}">
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
                                        class="nav-item {{ 'CommercialSpaceUnits' == request()->path() ? 'act1' : '' }}">
                                        <a class="nav-link text-light" href="{{ route('CommercialSpaceUnits') }}">
                                            <i class="bi bi-grid-3x3-gap-fill" style="color:rgb(224, 223, 223)"></i>
                                            {{ __('Commercial Space Units') }}
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
    </div>
</nav>
