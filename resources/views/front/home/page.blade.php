@extends('front.home')
@section('content')
	<section id="mayoutfit-bighero" class="owl-carousel container">
        @foreach($listgalery as $lists)
            <div class="item">
                <a href="{!!config('app.url')!!}public/product/detail/{!!$lists->product_id!!}">
                    <img src="{{Config::get('app.url')}}public/upload/{!!$lists->galery_image!!}" alt="Mayoutfit">
                </a>
            </div>
        @endforeach        
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
                @foreach($listcategory as $lists)
                    <div class="col-md-3 col-xs-6">
                        <a href="{!!config('app.url')!!}public/product/category/{!!$lists->idcategory!!}"><span>{!!$lists->category_name!!}</span>
                            <img src="{{Config::get('app.url')}}public/upload/{!!$lists->category_image!!}" alt="Mayoutfit" width="100%" class="img-responsive center-block">
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="row clearfix">
                
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