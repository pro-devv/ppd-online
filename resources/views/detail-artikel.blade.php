@extends('layouts.template-front')
@section('content')
<!--================Home Banner Area =================-->
      <!--================Home Banner Area =================-->
      <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Artikel</h2>
                    <div class="page_link">
                        <a href="{{ route('index.user') }}">Beranda</a>
                        <a href="{{ route('artikel.user') }}" class="active">Artikel</a>
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
            <div class="col-lg-8">
                <div class="row choice_inner">
                    @foreach ($data as $item)
                        <div class="col-lg-12 col-md-6">
                            <div class="choice_item" >
                                <div class="choice_text ">
                                    <a href="{{ route('detail.user',$item->slug) }}"><h4>{{ $item->title }}</h4></a>
                                    <div class="date">
                                        <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>{{ $item->updated_at }}</a>
                                    </div>
                                    <p>{!! substr($item->desc, 0, 100) !!}</p>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <div class="right_sidebar">
                    <aside class="r_widgets social_widgets">
                        <div class="main_title2">
                            <h2>Social Networks</h2>
                        </div>
                        <ul class="list">
                            @foreach ($lainnya as $item)

                            <li><a href="{{ route('detail.user',$item->slug) }}"> {{ $item->title }}</a></li>
                            @endforeach
                        </ul>
                    </aside>

                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Choice Area =================-->
@endsection
