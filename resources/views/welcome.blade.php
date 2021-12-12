@extends('layouts.template-front')
@section('content')
 <!--================Home Banner Area =================-->
 <section class="home_banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container-fluid py-5">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach ($banner as $item)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->index == 0 ? 'active' : '' }}"></li>

                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach ($banner as $item)
                        <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">
                            <img src="{{ asset('images/banner/'.$item->gambar_banner) }}" class="img-fluid w-100" alt="" srcset="">
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Choice Area =================-->
<section class="choice_area p_120">
    <div class="container">
        <div class="main_title2">
            <h2>Artikel</h2>
        </div>
        <div class="row choice_inner">
            @foreach ($artikel as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="choice_item" >
                        <div class="choice_text ">
                            <a href="{{ route('detail.user',$item->slug) }}"><h4>{{ $item->title }}</h4></a>
                            <div class="date">
                                <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>{{ $item->updated_at }}</a>
                            </div>
                            <p>{!! substr($item->desc, 0, 100) !!}</p>
                            <div class="col-md-12 text-right mt-4">
                                <a href="{{ route('detail.user',$item->slug) }}" type="submit" value="submit" class="btn submit_btn">Detail Artikel</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!--================End Choice Area =================-->
@endsection
