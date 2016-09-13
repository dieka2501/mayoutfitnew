@extends('front.home')
@section('content')
	<!-- Listing Product -->
    <div  id="products-wrap" class="container">
        <div class="listing-top-nav clearfix">
            <h1 class="heading-title-category">New Release</h1>
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Catalog</a></li>                            
                    <li class="last">New Release</li>
                </ol>
            </div>
            <div class="row clearfix">
                
                <div class="listing-sort col-md-4">
                    <label>Sort By</label>
                    {!!Form::select('sort_name',['terbaru'=>'Terbaru','az'=>'A-Z','rendah'=>'Harga Terendah','tinggi'=>'Harga Tertinggi'],$sort_name,['class'=>'form-control','id'=>'sort_name'])!!}
                    <!-- <ul class="nav filter-dropdown select-slick" role="tablist">
                        <li class="dropdown" role="presentation">
                            <a aria-expanded="false" aria-haspopup="true" class="filter-sortby dropdown-toggle" data-toggle="dropdown" href="#" id="sort-price" role="button">
                            Sort By</a>
                            <ul aria-labelledby="sort-price" class="dropdown-menu">
                                <li>
                                    <a href="#">Terbaru</a>
                                </li>
                                <li>
                                    <a href="#">Alfabet A-Z</a>
                                </li>
                                <li>
                                    <a href="#">Harga Terendah</a>
                                </li>
                                <li>
                                    <a href="#">Harga Tertinggi</a>
                                </li>
                                <li>
                                    <a href="#">Diskon Tertinggi</a>
                                </li>
                                <li>
                                    <a href="#">Diskon Terendah</a>
                                </li>
                            </ul>
                        </li>
                    </ul> -->
                </div>
                <div class="col-md-4 results"></div>
                <div class="listing-pagination col-md-4">
                    {!!$list->appends(['sort'=>$sort,'order'=>$order,'sort_name'=>$sort_name])->render()!!}
                    <!-- <ul class="pagination">
                        <li><a title="Prev" href="#"><i class="ion-arrow-left-b"></i></a></li>
                        <li class="active"><a title="Go to page 1" href="#">1</a></li>
                        <li><a title="Go to page 2" href="#">2</a></li>
                        <li><a title="Go to page 3" href="#">3</a></li>
                        <li class="next last"><a title="Next" href="#"><i class="ion-arrow-right-b"></i></a></li>                       
                    </ul> -->
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12">
                <section class="listing-items clearfix">
                @foreach($list as $lists)
                    <article class="listing-item">
                        <div class="listing-item-image">
                            <a href="product-detail.html">
                                <img src="{{Config::get('app.url')}}public/upload/{!!$lists->product_image!!}" alt="Mayoutfit">
                            </a>
                        </div>
                        <a href="product-detail.html">
                            <h5 class="listing-item-content-brand">{!!$lists->product_code!!}</h5>
                            <!-- <span class="listing-item-price-discount">70% OFF</span> -->
                            <div class="clearfix"></div>
                            <p class="listing-item-content-description">{!!$lists->product_name!!}</p>
                            <!-- <span class="listing-item-price-old">Rp 349.000</span> -->
                            <span class="listing-item-price-web">Rp {!!number_format($lists->product_price)!!}</span>
                            
                        </a>
                        <a href="{!!config('app.url')!!}public/cart/add/{!!$lists->idproduct!!}" class="btn btn-warning btn-xs" style="height: 30px;line-height: 25px;">Add To Cart</a>
                    </article>

                    @endforeach
                    <!-- <article class="listing-item">
                        <div class="listing-item-image">
                            <a href="product-detail.html">
                                <img src="{{Config::get('app.url')}}assets/front/images/12-HAVANA-DRESS.jpg" alt="Mayoutfit">
                                <img src="{{Config::get('app.url')}}assets/front/images/10-PURICIA-BLOUSE.jpg" alt="Mayoutfit">
                            </a>
                        </div>
                        <a href="product-detail.html">
                            <h5 class="listing-item-content-brand">Mayoutfit</h5>
                            <span class="listing-item-price-discount">70% OFF</span>
                            <div class="clearfix"></div>
                            <p class="listing-item-content-description">Mayoutfit Beauty Dress</p>
                            <span class="listing-item-price-old">Rp 349.000</span>
                            <span class="listing-item-price-web">Rp 244.300</span>
                        </a>
                    </article> -->

                </section>
            </div>
    </div>
    {!!$list->appends(['sort'=>$sort,'order'=>$order,'sort_name'=>$sort_name])->render()!!}
    <!-- <ul class="pagination">
        <li><a title="Prev" href="#"><i class="ion-arrow-left-b"></i></a></li>
        <li class="active"><a title="Go to page 1" href="#">1</a></li>
        <li><a title="Go to page 2" href="#">2</a></li>
        <li><a title="Go to page 3" href="#">3</a></li>
        <li class="next last"><a title="Next" href="#"><i class="ion-arrow-right-b"></i></a></li>                       
    </ul> -->
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            // alert('asasas');
            $('#sort_name').change(function(){
                var sort_name = $(this).val();
            });
        });
    </script>
@stop