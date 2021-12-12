<!doctype html>
<html lang="en">
    <head>
        @include('components.partials-front.head')
    </head>
    <body>

        <!--================Header Menu Area =================-->
        @include('components.partials-front.header')
        <!--================Header Menu Area =================-->

        @yield('content')

        <!--================ start footer Area  =================-->
        @include('components.partials-front.footer')
		<!--================ End footer Area  =================-->




        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ asset('frontend/js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('frontend/js/popper.js') }}"></script>
        <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('frontend/js/stellar.js') }}"></script>
        <script src="{{ asset('frontend/vendors/lightbox/simpleLightbox.min.js') }}"></script>
        <script src="{{ asset('frontend/vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ asset('frontend/vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('frontend/vendors/isotope/isotope-min.js') }}"></script>
        <script src="{{ asset('frontend/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('frontend/vendors/jquery-ui/jquery-ui.js') }}"></script>
        <script src="{{ asset('frontend/js/jquery.ajaxchimp.min.js') }}"></script>
        <script src="{{ asset('frontend/js/mail-script.js') }}"></script>
        <script src="{{ asset('frontend/js/theme.js') }}"></script>
    </body>
</html>
