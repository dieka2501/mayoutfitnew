@extends('home')
@section('content')
	<!-- Product Detail -->
    <section id="featured-products" class="section">
        <div class="container">
            <div class="row clearfix product-single">
                <div class="col-md-5 col-xs-12">
                    <div id="image-block">
                        <span id="view-full-size">
                            <img alt="Aptent taciti" id="bigpic" itemprop="image" src="{{Config::get('app.url')}}assets/front/images/12.2-large.jpg" title="Aptent taciti">
                        </span>
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-1 col-xs-12 summary entry-summary">
                    <h2>BROTHER AE2500</h2>
                    <p id="availability-status"><span id="availability-value" class="label-success">In stock</span></p>
                    <p class="warning-inline" id="last-quantities" style="display: none;">Warning: Last items in stock!</p>
                    <div class="content-prices">
                        <div class="price-old">Rp 400.000</div>
                        <div class="our-price-display">Rp. 200.000</div>
                    </div>
                    <div id="short-description-block">
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
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
                            <div id="quantity-wanted-p">
                                <label>Qty</label>
                                <div class="qty">
                                    <input class="text" id="quantity-wanted" name="qty" type="text" value="1">
                                    <div class="qty-buttons">
                                        <a class="button-plus product-quantity-up" data-field-qty="qty" href="#"><span><i class="fa fa-angle-up"></i></span></a> <a class="button-minus product-quantity-down" data-field-qty="qty" href="#"><span><i class="fa fa-angle-down"></i></span></a>
                                    </div>
                                </div>
                            </div>
                            <!-- Add to cart -->
                            <div class="box-cart-bottom">
                                <div>
                                    <p class="buttons-bottom-block no-print" id="add-to-cart"><button class="exclusive" name="Submit" title="Add to Cart" type="submit">Add to cart</button></p><!-- h=displayProductButtons /  Wishlist block  -->
                                    <div class="wishlist-button">
                                        <a class="button addToWishlist wishlistProd-30" data-tooltip="Add to wishlist" href="#" onclick="WishlistCart('wishlist-block-list', 'add', '30', false, 1); return false;" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                    </div>
                                    <div class="compare">
                                        <a class="button add-to-compare" data-id-product="26" href="#" title="Add to Compare"><i class="fa fa-exchange"></i></a>
                                    </div>
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
                            <p>Ham hock cillum andouille pancetta shank. Enim bacon adipisicing duis, pancetta tenderloin occaecat. Pancetta exercitation cow boudin pork belly sausage alcatra mollit kielbasa prosciutto capicola reprehenderit. Pig salami adipisicing, pork chop ipsum beef dolor bacon chicken tenderloin kevin strip steak ham ut. Biltong incididunt exercitation occaecat, jerky drumstick boudin anim minim prosciutto ut voluptate pork belly. Short loin velit bresaola cow commodo ham hock minim id.</p>
                            <p>Minim non nulla aliquip. Do ham tail short loin tenderloin biltong sint corned beef et exercitation. Aliquip strip steak tenderloin ball tip turducken corned beef pork pastrami beef swine incididunt elit. Occaecat porchetta beef ribs lorem swine duis cupim pastrami tenderloin drumstick eu culpa enim.</p>
                            <p>Chuck mollit short loin, kevin biltong incididunt ullamco voluptate reprehenderit. Ut aliquip flank fatback. Cillum shankle et, velit frankfurter porchetta shoulder fatback venison ipsum labore. Sausage strip steak in, sed venison pork belly dolore doner cow pork.</p>
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