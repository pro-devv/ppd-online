@extends('layouts.template-front')
@section('content')
<!--================Home Banner Area =================-->
      <!--================Home Banner Area =================-->
      <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Kirim Tiket</h2>
                    <div class="page_link">
                        <a href="{{ route('index.user') }}">Beranda</a>
                        <a href="#" class="active">Kirim Tiket</a>
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
        <div class="row">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{session('status')}}
                </div>
            @elseif (session('error'))
                   <p> {{session('error')}}</p>
            @endif
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-9 ">
                @if (Session::has('token'))
                    <h2 class="text-center mb-5">Kirimkan permintaan dukungan</h2>
                    <form class="row contact_form" action="{{ route('kirim-tiket.store') }}" method="post" id="contactForm" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-6">
                            <input type="text" readonly class="form-control" id="nama" name="nama" value="{{ Session::get('nama') }}" placeholder="Masukkan Email">
                            <input type="text" hidden class="form-control" id="id" name="id" value="{{ Session::get('id_user') }}" placeholder="Masukkan Email">
                        </div>
                        <div class="col-lg-6">
                            <input type="text" readonly class="form-control" id="email" name="email" value="{{ Session::get('email') }}" placeholder="Masukkan Email">
                        </div>
                        <div class="col-md-12 mt-4">
                            <div class="form-group">
                                <select class="form-control w-100 mb-3 @error('category') is-invalid @enderror" id="exampleFormControlSelect1" name="category">
                                    <option value="permintaan data">Permintaan Data</option>
                                    <option value="konsultasi statistik">Konsultasi Statistik</option>
                                </select>
                                @error('category')
                                <div class="invalid-feedback">
                                    <small class="help-block form-text text-danger">{{$message}}</small>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" placeholder="Masukkan Subject">
                                @error('subject')
                                <div class="invalid-feedback">
                                    <small class="help-block form-text text-danger">{{$message}}</small>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea name="desc" placeholder="Deskripsi" id="" cols="30" rows="10" class="form-control @error('desc') is-invalid @enderror"></textarea>
                                @error('desc')
                                <div class="invalid-feedback">
                                    <small class="help-block form-text text-danger">{{$message}}</small>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <input type="file" id="file_upload" name="file_upload" class="form-control @error('file_upload') is-invalid @enderror">
                                <small>File yang diperbolehkan *.jpg, *.png, *.pdf, *.xls, *.xlsx</small>
                                @error('file_upload')
                                <div class="invalid-feedback">
                                    <small class="help-block form-text text-danger">{{$message}}</small>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <button type="submit" value="submit" class="btn submit_btn">Kirim Data</button>
                        </div>
                    </form>
                @else
                    <p>Hai Sahabat Data, terimakasih telah mengunjungi layanan PPD-Online. PPD-Online merupakan pusat permintaan data secara elektronik yang dikelola oleh BPS kabupaten Rokan Hulu. Untuk menggunakan layanan yang tersedia silahkan masuk terlebih dahulu. Pilih tautan Pengguna Data Baru jika Sahabat Data belum pernah masuk aplikasi ini sebelumnya, jika sudah pernah maka pilih Pengguna Data Lama.</p>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('login.front') }}" type="submit" value="submit" class="btn submit_btn mr-4">Masuk</a>
                        @if (Route::has('register'))
                            <a href="{{ route('login.front') }}" type="submit" value="submit" class="btn submit_btn mr-4">Register</a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
<!--================End Choice Area =================-->
@endsection
