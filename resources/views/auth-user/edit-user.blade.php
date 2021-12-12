@extends('layouts.template-front')
@section('content')
<!--================Home Banner Area =================-->
      <!--================Home Banner Area =================-->
      <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Pengaturan Profil</h2>
                    <div class="page_link">
                        <a href="{{ route('index.user') }}">Beranda</a>
                        <a href="#" class="active">Edit Profil</a>
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
                <h1 class="text-center mb-5">Edit Profil</h1>
                <form class="row contact_form" action="{{ route('login_front.update',$data->id) }}" method="post" id="contactForm" novalidate="novalidate">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->name }}" placeholder="Masukkan Nama">
                            @error('nama')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" value="{{ $data->email }}" placeholder="Masukkan Email">
                            @error('email')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nohp" name="nohp" value="{{ $data->no_hp }}" placeholder="Masukkan No. Handphone">
                            @error('nohp')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea name="alamat" class="form-control" id="" cols="30" rows="10">{{ $data->alamat }}</textarea>
                            @error('alamat')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 ">
                        <button type="submit" value="submit" class="btn submit_btn">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--================End Choice Area =================-->
@endsection
