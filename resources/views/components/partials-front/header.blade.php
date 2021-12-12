<header class="header_area">
    <div class="top_menu">
        <div class="container">
            <!-- <div class="float-left">
                <a href="#">Wednesday, March 14, 2018</a>
            </div> -->
            <div class="float-right">
                <ul class="list header_social">
                    @auth
                       <li> <a href="{{ url('/') }}" class="text-sm text-gray-700 dark:text-gray-500 underline"><strong>{{ Auth::user()->name }}</strong></a></li>
                    @else
                        {{-- <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a> --}}
                        <li><a href="{{ route('login.front') }}"><i class="fa fa-user"></i> Login</a></li>
                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}"><i class="fa fa-user-plus"></i></a> Register</li>
                        @endif
                    @endauth
                </ul>
            </div>
        </div>
    </div>
    <div class="logo_part">
        <div class="container">
            <div class="float-left">
                    <a class="logo" href="#"><img src="{{ asset('images/logo.png') }}" alt="" class="w-25"></a>
                    <strong>PPD-ONLINE</strong>
            </div>
            <div class="float-right">
                <div class="header_magazin">
                    <!-- <img src="img/header-magazin.png" alt=""> -->
                </div>
            </div>
        </div>
    </div>
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <div class="container_inner">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.html"><img src="{{ asset('images/logo.png') }}" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav">
                            <li class="nav-item {{ request()->routeIs('index.user') ? 'active' : ''}}"><a class="nav-link" href="{{ route('index.user') }}">Beranda</a></li>
                            <li class="nav-item {{ request()->routeIs('artikel.user') ? 'active' : ''}}"><a class="nav-link" href="{{ route('artikel.user') }}">Artikel</a></li>
                            <li class="nav-item"><a class="nav-link" href="archive.html">Lihat Tiket</a></li>
                        </ul>
                    </div>

                </div>

            </div>
        </nav>
    </div>
</header>
