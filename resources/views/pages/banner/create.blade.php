@extends('layouts.template-back')
@section('content')
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>{{ ucwords(str_replace('-',' ',Request::segment(2))) }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-end">
                        <div class="page-title">
                            <ol class="breadcrumb text-end">
                                <li><a href="{{ route('admin.index') }}">Dashboard</a></li>
                                <li class=""><a href="{{ route('banner.index') }}">{{ ucwords(str_replace('-',' ',Request::segment(2))) }}</a> </li>
                                <li class="active">{{ ucwords(str_replace('-',' ',Request::segment(3))) }}</li>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('banner.store') }}" method="post" class="form-vertical" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="gambar_banner" class=" form-control-label mb-2">Gambar Banner <span>*</span></label>
                                    <input type="file" id="gambar_banner" name="gambar_banner" class="form-control @error('gambar_banner') is-invalid @enderror">
                                    @error('gambar_banner')
                                    <div class="invalid-feedback">
                                        <small class="help-block form-text text-danger">{{$message}}</small>
                                    </div>
                                    @enderror
                                </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Simpan
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
