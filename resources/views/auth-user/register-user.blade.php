@extends('layouts.template-front')
@section('content')
<!--================Home Banner Area =================-->
      <!--================Home Banner Area =================-->
      <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Register</h2>
                    <div class="page_link">
                        <a href="{{ route('index.user') }}">Beranda</a>
                        <a href="#" class="active">Register</a>
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
                <h1 class="text-center mb-5">Daftar PPD-ONLINE</h1>
                <form class="row contact_form" action="{{ route('register.store') }}" method="post" id="contactForm" novalidate="novalidate">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama">
                            @error('nama')
                                <small style="color: red">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan Email">
                            @error('email')
                            {{-- <div class="invalid-feedback"> --}}
                               <small style="color: red">{{$message}}</small>
                            {{-- </div> --}}
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nohp" name="nohp" value="{{ old('nohp') }}" placeholder="Masukkan No. Handphone">
                            @error('nohp')
                                <small style="color: red">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10" value="{{ old('alamat') }}" placeholder="Masukkan Alamat"></textarea>
                            @error('alamat')
                                <small style="color: red">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="subject" name="password" placeholder="Masukkan Password">
                            @error('password')
                                 <small style="color: red">{{$message}}</small>
                            @enderror
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
