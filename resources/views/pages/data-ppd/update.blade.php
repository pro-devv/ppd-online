@extends('layouts.template-back')
@push('css')
    <style>
        .test {
            text-emphasis: none;
        }
    </style>
@endpush
@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>{{ ucwords(str_replace('-',' ',Request::segment(1))) }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-end">
                        <div class="page-title">
                            <ol class="breadcrumb text-end">
                                <li><a href="{{ route('admin.index') }}">Dashboard</a></li>
                                <li class=""><a href="{{ route('banner.index') }}">{{ ucwords(str_replace('-',' ',Request::segment(2))) }}</a> </li>
                                <li class="active">{{ ucwords(str_replace('-',' ',Request::segment(4))) }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('data-ppd.update',$data->id) }}" method="post" class="form-vertical" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="name" class="form-control-label mb-2">Nama Lengkap</label>
                                            <input type="text" hidden id="name" readonly name="id_user" value="{{ $data->id_user }}" placeholder="Masukkan Judul Artikel" class="form-control @error('name') is-invalid @enderror" >
                                            <input type="text" id="name" readonly name="name" value="{{ $data->name }}" placeholder="Masukkan Judul Artikel" class="form-control @error('name') is-invalid @enderror" >
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    <small class="help-block form-text text-danger">{{$message}}</small>
                                                </div>
                                            @enderror

                                        </div>
                                        <div class="col-md-6">
                                            <label for="no_hp" class="form-control-label mb-2">No HP</label>
                                            <input type="text" id="no_hp" readonly name="no_hp" value="{{ $data->no_hp }}" placeholder="Masukkan Judul Artikel" class="form-control @error('no_hp') is-invalid @enderror" >
                                            @error('no_hp')
                                                <div class="invalid-feedback">
                                                    <small class="help-block form-text text-danger">{{$message}}</small>
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="alamat" class="form-control-label mb-2">Alamat</label>
                                    <textarea name="alamat" id="" readonly cols="20" rows="10" class="form-control @error('alamat') is-invalid @enderror"> {{ $data->alamat }}</textarea>
                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            <small class="help-block form-text text-danger">{{$message}}</small>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="category" class="form-control-label mb-2">Kategori Permintaan</label>
                                    <input type="text" id="category" readonly name="category" value="{{ $data->category }}" placeholder="Masukkan Judul Artikel" class="form-control @error('category') is-invalid @enderror" >
                                    @error('category')
                                        <div class="invalid-feedback">
                                            <small class="help-block form-text text-danger">{{$message}}</small>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="subject" class="form-control-label mb-2">Subject</label>
                                    <input type="text" id="subject" readonly name="subject" value="{{ $data->subject }}" placeholder="Masukkan Judul Artikel" class="form-control @error('subject') is-invalid @enderror" >
                                    @error('subject')
                                        <div class="invalid-feedback">
                                            <small class="help-block form-text text-danger">{{$message}}</small>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="desc" class="form-control-label mb-2">Deskripsi</label>
                                    <textarea name="desc" id="" readonly cols="30" rows="10" class="form-control @error('desc') is-invalid @enderror"> {{ $data->desc }}</textarea>
                                    @error('desc')
                                        <div class="invalid-feedback">
                                            <small class="help-block form-text text-danger">{{$message}}</small>
                                        </div>
                                    @enderror
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="{{ asset('pdf/'.$data->file) }}" width="100%" height="800px" frameborder="0"></iframe>
                            </div>
                            <div class="form-group mb-3">
                                <label for="file_upload" class=" form-control-label mb-2 mt-4 ">Upload File <span>*</span></label>
                                <input type="file" id="file_upload" name="file_upload" class="form-control @error('file_upload') is-invalid @enderror">
                                @error('file_upload')
                                <div class="invalid-feedback">
                                    <small class="help-block form-text text-danger">{{$message}}</small>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Update Data
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
