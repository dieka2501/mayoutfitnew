@extends('home')
@section('content')
  <section class="section section-content long-content grey-bg">
        <div class="container">
            <div class="section-title no-border">
                <h1>Delivery</h1>
            </div>
            <div class="row clearfix">
                <div class="col-md-8 col-xs-12">
                    <div class="content-form">
                        <div class="section-title">
                            <h2>Pilih alamat pengiriman</h2>
                        </div>
                        <div class="shipping-wrap-border">
                          <div class="shipping-wrap existing-address">
                            <div class="clearfix add-address ch-address-type-option">
                              <div class="radio-check">
                                <input class="is-new-address" id="inputNewAddress" name="ThreeStepShippingAddressForm[shippingAddressId]" type="radio" value="0" checked="checked">
                              </div><label class="ch-label address-info" id="addNewAddress" for="inputNewAddress">Tambahkan alamat lainz</label>
                            </div><input name="ThreeStepShippingAddressForm[createNewAddress]" type="hidden" value="0">
                            <div id="addnew" style="background:#f5f5f5;padding:20px;">
                              <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-contro" rows="5"></textarea>
                              </div>
                              <div class="form-group">
                                <label>No. Tlp</label>
                                <input type="text" class="form-control">
                              </div>
                              <div class="row">
                              <div class="col-md-4">
                              <div class="form-group">
                                <label>Provinsi</label>
                                <input type="text" class="form-control">
                              </div>
                              </div>
                              <div class="col-md-4">
                              <div class="form-group">
                                <label>Kota</label>
                                <input type="text" class="form-control">
                              </div>
                              </div>
                              <div class="col-md-4">
                              <div class="form-group">
                                <label>Kecamatan</label>
                                <input type="text" class="form-control">
                              </div>
                              </div>
                              </div>
                            </div>
                          </div>
                          
                        </div>
                        <!-- End of shipping -->
                        <button type="submit" class="btn btn-default btn-pink">Continue &nbsp;<i class="ion-arrow-right-c"></i></button>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12">
                    <div class="content-form table-sm">
                        <div class="order-sum">
                          <table class="order-scroll-table-header table table-cart">
                            <thead>
                              <tr>
                                <th class="left-align">Produk</th>
                                <th class="qty">Qty</th>
                                <th class="right-align">Harga</th>
                              </tr>
                            </thead>
                          </table>
                          <div class="order-scrollable">
                            <table class="order-scroll-table table table-cart">
                              <tbody>
                                <tr class="first-item">
                                  <td width="160">Mitsubishi Pajero Sports Dakkar 4x4 - Hitam Mica</td>
                                  <td class="qty" width="50">1</td>
                                  <td class="right-align sel-cart-item-total-MI399OTAA42B24ANID-7914138">525.000.000</td>
                                </tr>
                                <tr class="delivery-wrap">
                                  <td colspan="3">
                                    <p><strong>Pengiriman Standar</strong></p>
                                    <p class="delivery-time">01 Aug - 03 Aug</p>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <div class="ch-cart-conclusion">
                            <div style="display: none;">
                              <div id="delivery-total-shipping-standard">
                                <div id="delivery-price-text-standard">
                                  Pengiriman Standar: gratis
                                </div>
                                <div class="delivery-types-hint delivery-types-hint-icon">
                                  <div class="popup-delivery-hint hide">
                                    Untuk produk lokal: Wilayah Jakarta 2-5 hari kerja dan Luar Jakarta 6-14 hari kerja<br>
                                    <br>
                                    Untuk produk internasional: Wilayah Jakarta dan Luar Jakarta 25-55 hari kalender
                                  </div>
                                </div>
                              </div>
                            </div>
                            <table class="table total-item">
                              <tbody>
                                <tr class="first-subtotal">
                                  <td class="subtotal sel-subtotal">Subtotal</td>
                                  <td class="right-align" colspan="2">RP 525.000.000</td>
                                </tr>
                                <tr>
                                  <td class="subtotal highlight shipping-cost-free">Biaya pengiriman</td>
                                  <td class="right-align highlight shipping-cost-free" colspan="2">Gratis</td>
                                </tr>
                                <tr class="total">
                                  <td class="total"><strong class="total-label">Total</strong> <span class="vat-minicart">(Termasuk PPN)</span></td>
                                  <td class="total right-align sel-total" colspan="2"><strong class="total-price">RP 525.000.000</strong></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop