<!doctype html>
<html>
<head>
    @include('frontend.includes.head')
</head>
@if(Request::segment(1)=="")
    <body class="fixed-header hidden-top loaded visible-top">
    @elseif(Request::segment(1)=="auth")
        <body class="page-login-promo blur-page" data-blur-image="{{ URL::asset('public/img/front/content/bg-login.jpg')}}" data-blur-amount="1">
        @else
            <body class="fixed-header hidden-top">
            @endif
            <div class="page-box">
                <div class="page-box-content">
                    @include('frontend.includes.top-head')
                    <header class="header header-two">
                        @include('frontend.includes.header')
                    </header><!-- .header -->
                    @if(Request::segment(1)=="")
                        <div class="slider rs-slider load">
                            @include('frontend.includes.banner')
                        </div><!-- .rs-slider -->
                        <div class="banner-set load">
                            <div class="container">
                                <div class="banners">
                                    <a href="#" class="banner">
                                        <img src="{{ URL::asset('public/img/front/content/banner1.jpg')}}" width="253" height="158" alt="">
                                        <h2 class="title">Home Theater</h2>
                                        <div class="description">Nunc condimentum eros vel nibh consectetur dignissim. Ut ante neque, ullamcorper ac feugiat at, ullamcorper sagittis magna.</div>
                                    </a>
                                    <a href="#" class="banner">
                                        <img src="{{ URL::asset('public/img/front/content/banner2.jpg')}}" width="253" height="158" alt="">
                                        <h2 class="title">Multiroom</h2>
                                        <div class="description">Maecenas ac leo velit. Aliquam venenatis tellus in erat pellentesque ut dignissim turpis consequat. Fusce sit amet sagittis urna.</div>
                                    </a>
                                    <a href="#" class="banner">
                                        <img src="{{ URL::asset('public/img/front/content/banner3.jpg')}}" width="253" height="158" alt="">
                                        <h2 class="title">Lighting Control</h2>
                                        <div class="description">Phasellus quis mauris non mauris sceleris vehicula. Vestibulum ipsum odio, placerat sed consequat in, congue non nibh.</div>
                                    </a>
                                    <a href="#" class="banner">
                                        <img src="{{ URL::asset('public/img/front/content/banner4.jpg')}}" width="253" height="158" alt="">
                                        <h2 class="title">Amazing Sound</h2>
                                        <div class="description">Maecenas et massa odio, tincidunt ultrices sapien. Praesent non tortor quis metus posuere gravida at quis nulla.</div>
                                    </a>
                                    <a href="#" class="banner">
                                        <img src="{{ URL::asset('public/img/front/content/banner5.jpg')}}" width="253" height="158" alt="">
                                        <h2 class="title">Home Theater</h2>
                                        <div class="description">Nunc condimentum eros vel nibh consectetur dignissim. Ut ante neque, ullamcorper ac feugiat at, ullamcorper sagittis magna.</div>
                                    </a>
                                    <a href="#" class="banner">
                                        <img src="{{ URL::asset('public/img/front/content/banner6.jpg')}}" width="253" height="158" alt="">
                                        <h2 class="title">Multiroom</h2>
                                        <div class="description">Maecenas ac leo velit. Aliquam venenatis tellus in erat pellentesque ut dignissim turpis consequat. Fusce sit amet sagittis urna.</div>
                                    </a>
                                </div><!-- .banners -->
                                <div class="clearfix"></div>
                            </div>
                            <div class="nav-box">
                                <div class="container">
                                    <a class="prev" href="#"><span class="glyphicon glyphicon-arrow-left"></span></a>
                                    <div class="pagination switches"></div>
                                    <a class="next" href="#"><span class="glyphicon glyphicon-arrow-right"></span></a>
                                </div>
                            </div>
                        </div><!-- .banner-set -->

                        <div class="clearfix"></div>
                    @endif
                    <section @if(Request::segment(1)=="auth") id="main" @endif >
                        @yield('content')
                    </section><!-- #main -->

                </div><!-- .page-box-content -->
            </div><!-- .page-box -->

            <footer id="footer">
                @include('frontend.includes.footer')
            </footer>
            <div class="clearfix"></div>

            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
            <script src="{{ URL::asset('public/js/front/bootstrap.min.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/price-regulator/jshashtable-2.1_src.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/price-regulator/jquery.numberformatter-1.2.3.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/price-regulator/tmpl.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/price-regulator/jquery.dependClass-0.1.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/price-regulator/draggable-0.1.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/price-regulator/jquery.slider.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/jquery.carouFredSel-6.2.1-packed.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/jquery.touchSwipe.min.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/jquery.elevateZoom-3.0.8.min.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/jquery.imagesloaded.min.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/jquery.appear.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/jquery.sparkline.min.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/jquery.easypiechart.min.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/jquery.easing.1.3.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/jquery.fancybox.pack.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/isotope.pkgd.min.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/jquery.knob.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/jquery.stellar.min.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/jquery.selectBox.min.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/jquery.royalslider.min.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/jquery.tubular.1.0.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/SmoothScroll.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/country.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/spin.min.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/ladda.min.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/masonry.pkgd.min.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/morris.min.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/raphael.min.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/video.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/pixastic.custom.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/livicons-1.4.min.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/layerslider/greensock.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/layerslider/layerslider.transitions.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/layerslider/layerslider.kreaturamedia.jquery.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/revolution/jquery.themepunch.plugins.min.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/revolution/jquery.themepunch.revolution.min.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/bootstrapValidator.min.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/bootstrap-datepicker.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/jplayer/jquery.jplayer.min.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/jplayer/jplayer.playlist.min.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/jquery.scrollbar.min.js')}}"></script>
            <script src="{{ URL::asset('public/js/front/main.js')}}"></script>
            </body>
</html>