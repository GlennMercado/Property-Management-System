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
                        <!-- <ul class="nav nav-sm flex-column">
                            <li class="nav-item {{ 'StockRoomSupply' == request()->path() ? 'act1' : '' }}">
                                <a class="nav-link text-light" href="{{ route('StockRoomSupply') }}">
                                    <i class="bi bi-clipboard-data-fill" style="color:rgb(224, 223, 223)"></i>
                                    {{ __('Stock Room Supply') }}
                                </a>
                            </li>
                        </ul> -->
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
