<div id="top-box">
    <div class="top-box-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-9 col-sm-5">
                    <div class="btn-group language btn-select">
                        <a class="btn dropdown-toggle btn-default" role="button" data-toggle="dropdown" href="#">
                            <span class="hidden-xs">Language</span><span class="visible-xs">Lang</span><!--
			  -->: English
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><img src="{{ URL::asset('public/img/front/eng-flag.png')}}" alt="">English</a></li>
                            <li><a href="#"><img src="{{ URL::asset('public/img/front/fra-flag.png')}}" alt="">France</a></li>
                            <li><a href="#"><img src="{{ URL::asset('public/img/front/ger-flag.png')}}" alt="">Germany</a></li>
                        </ul>
                    </div>
                    <div class="btn-group currency btn-select">
                        <a class="btn dropdown-toggle btn-default" role="button" data-toggle="dropdown" href="#">
                            <span class="hidden-xs">Currency</span><span class="visible-xs">Curr</span><!--
			  -->: USD
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">USD</a></li>
                            <li><a href="#">EUR</a></li>
                            <li><a href="#">GBP</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-xs-3 col-sm-7">
                    <div class="navbar navbar-inverse top-navbar top-navbar-right" role="navigation">
                        <button type="button" class="navbar-toggle btn-navbar collapsed" data-toggle="collapse" data-target=".top-navbar .navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <nav class="collapse collapsing navbar-collapse" style="width: 720px;">
                            <ul class="nav navbar-nav navbar-right">
                                <!-- <li><a href="shop-account.html">My Account</a></li>
                                <li><a href="#"><i class="fa fa-heart"></i> My Wishlist</a></li>
                                <li><a href="#">My Cart <span class="count">2</span></a></li>
                                <li><a href="#">Checkout</a></li> -->
                                {{--<li><a href="{{url('/login')}}">Log in <i class="fa fa-lock after"></i></a></li>--}}
                                @if (Auth::guest())
                                    <li>{!! HTML::link(url('/login'), Lang::get('titles.login')) !!}</li>
                                    <li>{!! HTML::link(url('/register'), Lang::get('titles.register')) !!}</li>
                                @else
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>{!! HTML::link(url('/profile/'.Auth::user()->name), Lang::get('titles.profile')) !!}</li>
                                            <li>{!! HTML::link(url('/logout'), Lang::get('titles.logout')) !!}</li>
                                        </ul>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>