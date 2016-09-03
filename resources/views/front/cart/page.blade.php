@extends('front.home')
@section('content')
	<section class="section section-content grey-bg">
        <div class="container">
            <div class="section-title no-border">
                <h1>Shopping Cart</h1>
            </div>
                <div class="content-form">
                    <form id="cart" method="POST">
                        <div class="table-responsive">
                            <table class="table table-cart">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Image</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                        <th class="product-remove">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($count > 0)
                                        @for($i =0;$i < $count; $i++)
                                            <tr class="cart-item">
                                                <td class="product-thumbnail">
                                                    <img src="{!!config('app.url')!!}public/upload/{!!$image[$i]!!}" width="150" alt="Classic Red">
                                                </td>
                                                <td class="product-name">
                                                    {!!$name[$i]!!}
                                                </td>
                                                <td class="product-price"><span class="amount">Rp.{!!number_format($price[$i])!!}</span></td>
                                                <td class="product-quantity">
                                                    <div class="quantity buttons_added">
                                                        <input class="minus" type="button" value="-"> <input class="input-text qty text" min="0" name="" size="4" step="1" title="Qty" value="1"> <input class="plus" type="button" value="+">
                                                    </div>
                                                </td>
                                                <!-- <td class="product-subtotal"><span class="amount">Rp 200.000</span></td> -->
                                                <td class="product-remove">
                                                    <a class="remove" href="#" title="Remove this item"><i class="ion-backspace-outline"></i></a>
                                                </td>
                                            </tr>
                                        @endfor
                                    @else
                                        <tr>
                                            <td colspan="6">Belum ada barang yang dipilih</td>
                                        </tr>
                                    @endif
                                    <!-- <tr class="cart-item">
                                        <td class="product-thumbnail">
                                            <a href="#"><img src="{{Config::get('app.url')}}assets/front/images/9-FABHIC-CASUAL.jpg" width="150" alt="Classic Red"></a>
                                        </td>
                                        <td class="product-name">
                                            <a href="#">Classic Red</a>
                                        </td>
                                        <td class="product-price"><span class="amount">Rp 200.000</span></td>
                                        <td class="product-quantity">
                                            <div class="quantity buttons_added">
                                                <input class="minus" type="button" value="-"> <input class="input-text qty text" min="0" name="cart[24681928425f5a9133504de568f5f6df][qty]" size="4" step="1" title="Qty" value="1"> <input class="plus" type="button" value="+">
                                            </div>
                                        </td>
                                        <td class="product-subtotal"><span class="amount">Rp 200.000</span></td>
                                        <td class="product-remove">
                                            <a class="remove" href="#" title="Remove this item"><i class="ion-backspace-outline"></i></a>
                                        </td>
                                    </tr> -->
                                    <!-- <tr>
                                        <td class="actions" colspan="6">
                                            <div class="clearfix">
                                                <div class="coupon col-md-6 pull-right">
                                                    <h4>Coupon:</h4>
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <input class="input-text" id="coupon_code" name="coupon_code" placeholder="Coupon code" type="text" value="">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input class="btn btn-md" name="apply_coupon" type="submit" value="Apply Coupon">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr> -->

                                </tbody>
                            </table>
                        </div>
                    </form>
                    <!-- <div class="cart-collaterals col-md-12">
                                <form action="#" class="shipping_calculator" method="post">
                                    <h4><a class="shipping-calculator-button" href="#">Calculate Shipping</a></h4>
                                    <section class="shipping-calculator-form" style="display: block;">
                                        <p class="form-row form-row-wide"><select class="country_to_state" id="calc_shipping_country" name="calc_shipping_country" rel="calc_shipping_state">
                                            <option value="">
                                                Select a country…
                                            </option>
                                            <option value="AX">
                                                Indonesia
                                            </option>
                                        </select></p>
                                        <p class="form-row form-row-wide"><span><select id="calc_shipping_state" name="calc_shipping_state">
                                            <option value="">
                                                Select an option
                                            </option>
                                            <option value="AC">
                                                Jakarta
                                            </option>
                                        </select></span></p>
                                        <p class="form-row form-row-wide"><input class="input-text" id="calc_shipping_postcode" name="calc_shipping_postcode" placeholder="Postcode / Zip" type="text" value=""></p>
                                        <p><button class="btn btn-md pull-right" name="calc_shipping" type="submit" value="1">Update Totals</button></p><input id="_wpnonce" name="_wpnonce" type="hidden" value="acfde4de24"><input name="_wp_http_referer" type="hidden" value="/florist/cart/">
                                    </section>
                                </form>
                        </div> -->
                        <div class="clearfix"></div>
                </div>
                
                <div class="content-form">
                    <div class="row clearfix">

                        <div class="col-md-6 col-xs-4">
                            @if($count >0)<button class="btn btn-primary">Update Cart&nbsp; <i class="ion-loop"></i></button>@endif
                        </div>
                        <div class="col-md-6 pull-right text-right">
                            <a href="{!!config('app.url')!!}public/new" class="btn btn-default btn-line">Continue Shoping&nbsp; <i class="ion-bag"></i></a>
                            @if($count >0)<button href="/shop" class="btn btn-default btn-pink mr-left">Checkout&nbsp;<i class="ion-arrow-right-c"></i></button>@endif
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
@stop