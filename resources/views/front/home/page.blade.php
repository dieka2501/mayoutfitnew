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
                @foreach($listproduct1 as $lists)
                    <div class="col-md-6 col-xs-6">
                        <a href="{!!config('app.url')!!}public/product/detail/{!!$lists->idproduct!!}" class="top-banner bannersec">
                        <img src="{{Config::get('app.url')}}public/upload/{!!$lists->product_image!!}" alt="Mayoutfit" width="100%" class="img-responsive center-block">
                        <h2 class="bannersec-title">Test</h2>
                        </a>
                    </div>
                @endforeach
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
                @foreach($listproduct2 as $lists)
                    <div class="col-md-6">
                        <a href="{!!config('app.url')!!}public/product/detail/{!!$lists->idproduct!!}"><img src="{{Config::get('app.url')}}public/upload/{!!$lists->product_image!!}" class="img-responsive center-block"></a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@stop