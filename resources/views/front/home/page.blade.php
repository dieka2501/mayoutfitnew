@extends('front.home')
@section('content')
	<section id="mayoutfit-bighero" class="owl-carousel container">
        <div class="item">
            <a href="#"><img src="{{Config::get('app.url')}}assets/front/images/slider-home2.jpg" alt="Mayoutfit"></a>
        </div>
        <div class="item">
            <a href="#"><img src="{{Config::get('app.url')}}assets/front/images/slider-home1.jpg" alt="Mayoutfit"></a>
        </div>
    </section>
    <section id="featured-products">
        <div class="container">
            <div class="row clearfix">
                <div class="col-md-6 col-xs-6">
                    <a href="#" class="top-banner"><img src="{{Config::get('app.url')}}assets/front/images/new-collections.jpg" alt="Mayoutfit" width="100%" class="img-responsive center-block"></a>
                </div>
                <div class="col-md-6 col-xs-6">
                    <a href="#" class="top-banner"><img src="{{Config::get('app.url')}}assets/front/images/international-brands.jpg" alt="Mayoutfit" width="100%" class="img-responsive center-block"></a>
                </div>
                
            </div>
            <div class="row clearfix">
                <div class="col-md-3 col-xs-6">
                    <a href="#"><span>Clothings</span><img src="{{Config::get('app.url')}}assets/front/images/1-Clothing-res.jpg" alt="Mayoutfit" width="100%" class="img-responsive center-block"></a>
                </div>
                <div class="col-md-3 col-xs-6">
                    <a href="#"><span>Trousers</span><img src="{{Config::get('app.url')}}assets/front/images/2-Trousers-res.jpg" alt="Mayoutfit" width="100%" class="img-responsive center-block"></a>
                </div>
                <div class="col-md-3 col-xs-6">
                    <a href="#"><span>Bags</span><img src="{{Config::get('app.url')}}assets/front/images/3-Bags-res.jpg" alt="Mayoutfit" width="100%" class="img-responsive center-block"></a>
                </div>
                <div class="col-md-3 col-xs-6">
                    <a href="#"><span>Wallets</span><img src="{{Config::get('app.url')}}assets/front/images/4-Wallets-res.jpg" alt="Mayoutfit" width="100%" class="img-responsive center-block"></a>
                </div>
            </div>
        </div>
    </section>
    <!--<section class="longbanner">
        <div class="container">
            <a href="#"><img src="images/banner_center_home3.jpg" alt="Mayoutfit" class="img-responsive center-block"></a>
        </div>
    </section>-->
    <section class="section-banners">
        <div class="container">
            <div class="section-title"><h2>Highlight</h2></div>
            <div class="row clearfix">
                <div class="col-md-6"><a href="#"><img src="{{Config::get('app.url')}}assets/front/images/banner_home_image_4.jpg" class="img-responsive center-block"></a></div>
                <div class="col-md-6"><a href="#"><img src="{{Config::get('app.url')}}assets/front/images/banner_home_image_5.jpg" class="img-responsive center-block"></a></div>
            </div>
        </div>
    </section>
@stop