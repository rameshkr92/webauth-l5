@extends('layouts.default')
@section('template_title')
    Reset Password
@endsection
@section('content')
    <div class="breadcrumb-box">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{url('/')}}">Home</a> </li>
                <li class="active">Pricing</li>
            </ul>
        </div>
    </div>
            <header class="page-header">
            <div class="container">
                <h1 class="title">Pricing</h1>
            </div>
        </header>
        <div class="full-width-box bottom-padding cm-padding-bottom-36">
            <div class="fwb-bg fwb-fixed band-1"><div class="overlay"></div></div>

            <div class="container">
                <div class="row text-center">
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="pricing">
                            <div class="title"><a href="#">First Package</a></div>
                            <div class="price-box">
                                <div class="icon pull-right circle">
                                    <span class="livicon" data-n="shopping-cart" data-s="32" data-c="#1e1e1e" data-hc="0"></span>
                                </div>
                                <div class="starting">Starting at</div>
                                <div class="price">$199<span>/month</span></div>
                            </div>
                            <ul class="options">
                                <li><span><i class="fa fa-check"></i></span>Responsive Design</li>
                                <li class="active"><span><i class="fa fa-check"></i></span>Styled elements</li>
                                <li><span><i class="fa fa-check"></i></span>Easy Setup</li>
                            </ul>
                            <div class="bottom-box">
                                <a href="#" class="more">Read more <span class="fa fa-angle-right"></span></a>
                                <div class="rating-box">
                                    <div style="width: 60%" class="rating">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="73px" height="12px" viewBox="0 0 73 12" enable-fwb-bg="new 0 0 73 12" xml:space="preserve">
					  <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#1e1e1e" points="6.5,0 8,5 13,5 9,7.7 10,12 6.5,9.2 3,12 4,7.7 0,5 5,5"></polygon>
                                            <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#1e1e1e" points="66.5,0 68,5 73,5 69,7.7 70,12 66.5,9.2 63,12 64,7.7 60,5 65,5 "></polygon>
                                            <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#1e1e1e" points="21.5,0 23,5 28,5 24,7.7 25,12 21.5,9.2 18,12 19,7.7 15,5 20,5 "></polygon>
                                            <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#1e1e1e" points="51.5,0 53,5 58,5 54,7.7 55,12 51.5,9.2 48,12 49,7.7 45,5 50,5 "></polygon>
                                            <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#1e1e1e" points="36.5,0 38,5 43,5 39,7.7 40,12 36.5,9.2 33,12 34,7.7 30,5 35,5 "></polygon>
					</svg>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <button class="btn btn-default btn-lg">Buy Now</button>
                            </div>
                        </div><!-- .pricing -->
                    </div>

                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="pricing prising-info">
                            <div class="title"><a href="#">Second Package</a></div>
                            <div class="price-box">
                                <div class="icon pull-right circle">
                                    <span class="livicon" data-n="wrench" data-s="32" data-c="#35beeb" data-hc="0"></span>
                                </div>
                                <div class="starting">Starting at</div>
                                <div class="price">$299<span>/month</span></div>
                            </div>
                            <ul class="options">
                                <li><span><i class="fa fa-check"></i></span>Responsive Design</li>
                                <li class="active"><span><i class="fa fa-check"></i></span>Styled elements</li>
                                <li><span><i class="fa fa-check"></i></span>Easy Setup</li>
                            </ul>
                            <div class="bottom-box">
                                <a href="#" class="more">Read more <span class="fa fa-angle-right"></span></a>
                                <div class="rating-box">
                                    <div style="width: 80%" class="rating">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="73px" height="12px" viewBox="0 0 73 12" enable-fwb-bg="new 0 0 73 12" xml:space="preserve">
					  <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#1e1e1e" points="6.5,0 8,5 13,5 9,7.7 10,12 6.5,9.2 3,12 4,7.7 0,5 5,5"></polygon>
                                            <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#1e1e1e" points="66.5,0 68,5 73,5 69,7.7 70,12 66.5,9.2 63,12 64,7.7 60,5 65,5 "></polygon>
                                            <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#1e1e1e" points="21.5,0 23,5 28,5 24,7.7 25,12 21.5,9.2 18,12 19,7.7 15,5 20,5 "></polygon>
                                            <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#1e1e1e" points="51.5,0 53,5 58,5 54,7.7 55,12 51.5,9.2 48,12 49,7.7 45,5 50,5 "></polygon>
                                            <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#1e1e1e" points="36.5,0 38,5 43,5 39,7.7 40,12 36.5,9.2 33,12 34,7.7 30,5 35,5 "></polygon>
					</svg>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <button class="btn btn-info btn-lg">Buy Now</button>
                            </div>
                        </div><!-- .pricing -->
                    </div>

                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="pricing pricing-success">
                            <div class="title"><a href="#">Third Package</a></div>
                            <div class="price-box">
                                <div class="icon pull-right circle">
                                    <span class="livicon" data-n="piggybank" data-s="32" data-c="#9ab71a" data-hc="0"></span>
                                </div>
                                <div class="starting">Starting at</div>
                                <div class="price">$399<span>/month</span></div>
                            </div>
                            <ul class="options">
                                <li class="active"><span><i class="fa fa-check"></i></span>Responsive Design</li>
                                <li class="active"><span><i class="fa fa-check"></i></span>Styled elements</li>
                                <li><span><i class="fa fa-check"></i></span>Easy Setup</li>
                            </ul>
                            <div class="bottom-box">
                                <a href="#" class="more">Read more <span class="fa fa-angle-right"></span></a>
                                <div class="rating-box">
                                    <div style="width: 80%" class="rating">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="73px" height="12px" viewBox="0 0 73 12" enable-fwb-bg="new 0 0 73 12" xml:space="preserve">
					  <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#1e1e1e" points="6.5,0 8,5 13,5 9,7.7 10,12 6.5,9.2 3,12 4,7.7 0,5 5,5"></polygon>
                                            <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#1e1e1e" points="66.5,0 68,5 73,5 69,7.7 70,12 66.5,9.2 63,12 64,7.7 60,5 65,5 "></polygon>
                                            <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#1e1e1e" points="21.5,0 23,5 28,5 24,7.7 25,12 21.5,9.2 18,12 19,7.7 15,5 20,5 "></polygon>
                                            <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#1e1e1e" points="51.5,0 53,5 58,5 54,7.7 55,12 51.5,9.2 48,12 49,7.7 45,5 50,5 "></polygon>
                                            <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#1e1e1e" points="36.5,0 38,5 43,5 39,7.7 40,12 36.5,9.2 33,12 34,7.7 30,5 35,5 "></polygon>
					</svg>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <button class="btn btn-success btn-lg">Buy Now</button>
                            </div>
                        </div><!-- .pricing -->
                    </div>

                    <div class="col-sm-6 col-md-4 col-md-offset-4 col-lg-3 col-lg-offset-0">
                        <div class="pricing pricing-error">
                            <div class="title"><a href="#">Fourth Package</a></div>
                            <div class="price-box">
                                <div class="icon pull-right circle">
                                    <span class="livicon" data-n="key" data-s="32" data-c="#de2a61" data-hc="0"></span>
                                </div>
                                <div class="starting">Starting at</div>
                                <div class="price">$499<span>/month</span></div>
                            </div>
                            <ul class="options">
                                <li class="active"><span><i class="fa fa-check"></i></span>Responsive Design</li>
                                <li class="active"><span><i class="fa fa-check"></i></span>Styled elements</li>
                                <li class="active"><span><i class="fa fa-check"></i></span>Easy Setup</li>
                            </ul>
                            <div class="bottom-box">
                                <a href="#" class="more">Read more <span class="fa fa-angle-right"></span></a>
                                <div class="rating-box">
                                    <div style="width: 100%" class="rating">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="73px" height="12px" viewBox="0 0 73 12" enable-fwb-bg="new 0 0 73 12" xml:space="preserve">
					  <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#1e1e1e" points="6.5,0 8,5 13,5 9,7.7 10,12 6.5,9.2 3,12 4,7.7 0,5 5,5"></polygon>
                                            <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#1e1e1e" points="66.5,0 68,5 73,5 69,7.7 70,12 66.5,9.2 63,12 64,7.7 60,5 65,5 "></polygon>
                                            <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#1e1e1e" points="21.5,0 23,5 28,5 24,7.7 25,12 21.5,9.2 18,12 19,7.7 15,5 20,5 "></polygon>
                                            <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#1e1e1e" points="51.5,0 53,5 58,5 54,7.7 55,12 51.5,9.2 48,12 49,7.7 45,5 50,5 "></polygon>
                                            <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#1e1e1e" points="36.5,0 38,5 43,5 39,7.7 40,12 36.5,9.2 33,12 34,7.7 30,5 35,5 "></polygon>
					</svg>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <button class="btn btn-danger btn-lg">Buy Now</button>
                            </div>
                        </div><!-- .pricing -->
                    </div>
                </div>
            </div>
        </div>
@stop