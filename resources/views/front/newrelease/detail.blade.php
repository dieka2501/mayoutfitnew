@extends('front.home')
@section('content')
	<!-- Product Detail -->
    <section id="featured-products" class="section">
        <div class="container">
            <div class="row clearfix product-single">
                <div class="col-md-5 col-xs-12">
                    <div id="image-block">
                        <span id="view-full-size">
                            <img alt="Aptent taciti" id="bigpic" itemprop="image" src="{!!config('app.url')!!}public/upload/{!!$product->product_image!!}" style="max-height:100%; max-width:100%" >
                        </span>
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-1 col-xs-12 summary entry-summary">
                    <h2>{!!$product->product_name!!}</h2>
                    <p id="availability-status"><span id="availability-value" class="label-success">{!!number_format($product->product_stock)!!} Pcs</span></p>
                    <p class="warning-inline" id="last-quantities" style="display: none;">Warning: Last items in stock!</p>
                    <div class="content-prices">
                        @if($product->product_sale == 0)
                            <div class="our-price-display">Rp. {!!number_format($product->product_price)!!}</div>
                        @else
                            <div class="price-old">Rp. {!!number_format($product->product_price)!!}</div>
                            <div class="our-price-display">Rp. {!!number_format($product->product_price_sale)!!}</div>
                        @endif
                        
                        
                        
                    </div>
                    <div id="short-description-block">
                        <p></p>
                    </div>
                    <!-- Product Info -->
                    <div class="box-info-product">
                        <div class="product-attributes clearfix">
                            <!-- Share -->
                            <div class="sharing-buttons">
                                <label>Share this</label>
                                <div class="buttons">
                                    <a href="#"><i class="ion-social-facebook"></i></a>
                                    <a href="#"><i class="ion-social-twitter"></i></a>
                                    <a href="#"><i class="ion-social-instagram-outline"></i></a>
                                </div>
                            </div>
                            <!-- Qty -->
                            <!-- <div id="quantity-wanted-p">
                                <label>Qty</label>
                                <div class="qty">
                                    <input class="text" id="quantity-wanted" name="qty" type="text" value="1">
                                    <div class="qty-buttons">
                                        <a class="button-plus product-quantity-up" data-field-qty="qty" href="#"><span><i class="fa fa-angle-up"></i></span></a> <a class="button-minus product-quantity-down" data-field-qty="qty" href="#"><span><i class="fa fa-angle-down"></i></span></a>
                                    </div>
                                </div>
                            </div> -->
                            <!-- Add to cart -->
                            <div class="box-cart-bottom">
                                <div>
                                    @if($product->product_stock != '0')
                                    <p class="buttons-bottom-block no-print" id="add-to-cart"><a href="{!!config('app.url')!!}public/cart/add/{!!$product->idproduct!!}"> <button class="exclusive" name="Submit" title="Add to Cart" type="button">Add to cart</button></a></p><!-- 
                                    h=displayProductButtons /  Wishlist block  -->
                                    @else
                                        <p><strong>SOLD OUT</strong></p>
                                    @endif
                                    <!-- <div class="wishlist-button">
                                        <a class="button addToWishlist wishlistProd-30" data-tooltip="Add to wishlist" href="#" onclick="WishlistCart('wishlist-block-list', 'add', '30', false, 1); return false;" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                    </div> -->
                                    <!-- <div class="compare">
                                        <a class="button add-to-compare" data-id-product="26" href="#" title="Add to Compare"><i class="fa fa-exchange"></i></a>
                                    </div> -->
                                </div><!-- minimal quantity wanted -->
                                <div id="minimal-quantity-wanted-p" style="display: none;">
                                    This product is not sold individually. You must select at least <b id="minimal-quantity-label">1</b> quantity for this product.
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="moreinfo-block">
                <ul class="nav nav-tabs tab-info page-product-heading">
                    <li class="first active">
                        <a data-toggle="tab" href="#idTab1">Description</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#idTab2">Information</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <!-- More info -->
                    <section class="page-product-box tab-pane active" role="tabpanel" id="idTab1">
                        <!-- full description -->
                        <div class="rte">
                            {!!$product->product_description!!}
                        </div>
                    </section><!--end  More info -->
                    <!-- Data sheet -->
                    <section class="page-product-box tab-pane" role="tabpanel" id="idTab2">
                        <table class="table table-bordered table-data-sheet">
                            <tbody>
                                <tr class="odd">
                                    <td>Material</td>
                                    <td>Cotton</td>
                                </tr>
                                <tr class="even">
                                    <td>Styles</td>
                                    <td>Casual</td>
                                </tr>
                                <tr class="odd">
                                    <td>Properties</td>
                                    <td>Short Sleeve</td>
                                </tr>
                            </tbody>
                        </table>
                    </section><!--end Data sheet -->
                    <!--HOOK-PRODUCT-TAB -->
                </div>
            </div>
        </div>
    </section>
@stop