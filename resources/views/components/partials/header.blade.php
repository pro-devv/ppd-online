<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <a class="navbar-brand" href="./"><img src="{{ asset('images/logo.png') }}" class="img-fluid" width="50px" alt="Logo"><strong> PPD Online</strong></a>
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">
            <div class="header-left">
            </div>

            <div class="user-area dropdown float-right">
                @auth
                <li> <a href="{{ url('/') }}" class="text-sm text-gray-700 dark:text-gray-700 underline"><strong>{{ Auth::user()->name }}</strong></a></li>
                @else
                 {{-- <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a> --}}
                 <li><a href="{{ route('login.front') }}"><i class="fa fa-user"></i> Login</a></li>
                 @if (Route::has('register'))
                     <li><a href="#"><i class="fa fa-user-plus"></i></a> Register</li>
                 @endif
             @endauth
            </div>

        </div>
    </div>
</header>
