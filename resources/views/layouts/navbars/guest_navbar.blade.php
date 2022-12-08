@auth()
    @include('layouts.navbars.navs.guestloggedin')
@endauth
    
@guest()
    @include('layouts.navbars.guest_navbar')    
@endguest

@guest()
    @include('layouts.navbars.navs.guest')    
@endguest
