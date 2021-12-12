{{-- @push('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endpush --}}
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
                            <li><a href="{{ route('register') }}"><i class="fa fa-user-plus"></i> Register</a></li>
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
                            <li class="nav-item  {{ request()->routeIs('kirim-tiket.create') ? 'active' : ''}}"><a class="nav-link" href="{{ route('kirim-tiket.create') }}">Kirim Tiket</a></li>
                            @auth
                                <li class="nav-item {{ request()->routeIs('kirim-tiket.index') ? 'active' : ''}}"><a class="nav-link" href="{{ route('kirim-tiket.index') }}">Lihat Tiket</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Pengaturan
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="{{ route('login_front.edit',Auth::user()->id) }}">Edit Profil</a>
                                      <div class="dropdown-divider"></div>
                                      <a class="dropdown-item" href="{{ route('login_front.destroy',Auth::user()->id) }}">Keluar</a>
                                    </div>
                                  </li>

                            @endauth
                        </ul>
                    </div>

                </div>

            </div>
        </nav>
    </div>
</header>
{{-- @push('js')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endpush --}}
