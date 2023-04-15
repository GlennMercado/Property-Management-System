<body class="{{ $class ?? '' }}">
    @include('sweetalert::alert')
    @auth()
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @include('layouts.navbars.operation_sidebar')

    @endauth
    
    <div class="main-content">
    @include('layouts.navbars.navbar')
    
        @yield('content')
    </div>

    @guest()
        @include('layouts.footers.guest')
    @endguest

    <!-- <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script> -->
    <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    
    @stack('js')
    
    <!-- Argon JS -->
    <!-- <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script> -->
</body>