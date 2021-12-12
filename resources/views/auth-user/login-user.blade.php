@extends('layouts.template-front')
@section('content')
<!--================Home Banner Area =================-->
      <!--================Home Banner Area =================-->
      <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Login</h2>
                    <div class="page_link">
                        <a href="{{ route('index.user') }}">Beranda</a>
                        <a href="#" class="active">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->
<!--================End Home Banner Area =================-->

<!--================Choice Area =================-->
<section class="choice_area p_120">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-9 ">
                <h1 class="text-center mb-5">Masuk ke PPD-ONLINE</h1>
                <form class="row contact_form" action="{{ route('login_front.store') }}" method="post" id="contactForm" novalidate="novalidate">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan Email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="subject" name="password" placeholder="Masukkan Password">
                        </div>
                    </div>
                    <div class="col-md-12 ">
                        <button type="submit" value="submit" class="btn submit_btn">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--================End Choice Area =================-->
@endsection
