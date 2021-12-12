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
            <div class="col-lg-12">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{session('status')}}
                    </div>
                @elseif (session('error'))
                       <p> {{session('error')}}</p>
                @endif
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-12 ">
                @auth
                    <h2 class="text-center mb-5">Kirimkan permintaan dukungan</h2>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Subject</th>
                                <th>Kategori</th>
                                <th>User</th>
                                <th>Deskripsi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ ucwords($item->subject) }}</td>
                                    <td>{{ ucwords($item->category) }}</td>
                                    <td>{{ ucwords($item->name) }}</td>
                                    <td>{{ $item->desc }}</td>
                                    <td>
                                        @if ($item->status != 'diterima')
                                            <span class="badge bg-warning text-dark">Diproses</span>
                                        @else
                                            <span class="badge bg-success p-2 text-white">Diterima</span>

                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="p-1">
                                                @if ($item->status == 'diterima')
                                                    <a href="{{ route('data-ppd.edit',$item->id) }}"  class="btn btn-info"><i class="fa fa-download"></i> Download File</a>
                                                @else
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <p class="text-warning">Tidak ada data</p>
                            @endforelse
                        </tbody>
                    </table>
                @else
                    <p>Hai Sahabat Data, terimakasih telah mengunjungi layanan PPD-Online. PPD-Online merupakan pusat permintaan data secara elektronik yang dikelola oleh BPS kabupaten Rokan Hulu. Untuk menggunakan layanan yang tersedia silahkan masuk terlebih dahulu. Pilih tautan Pengguna Data Baru jika Sahabat Data belum pernah masuk aplikasi ini sebelumnya, jika sudah pernah maka pilih Pengguna Data Lama.</p>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('login.front') }}" type="submit" value="submit" class="btn submit_btn mr-4">Masuk</a>
                        @if (Route::has('register'))
                            <a href="{{ route('login.front') }}" type="submit" value="submit" class="btn submit_btn mr-4">Register</a>
                        @endif
                    </div>
                @endauth
            </div>
        </div>
    </div>
</section>
<!--================End Choice Area =================-->
@endsection
