@extends('home')
@section('content')
	<section class="section section-content long-content grey-bg">
        <div class="container">
            <div class="section-title no-border">
                <h1>Payment Method</h1>
            </div>
            <div class="row clearfix">
                <div class="col-md-8 col-xs-12">
                    <div class="content-form">
                        <div class="section-title">
                            <h2>Pilih Opsi Pembayaran</h2>
                        </div>
                        <div>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#bank-transfer" aria-controls="home" role="tab" data-toggle="tab">Bank Transfer</a></li>
                          <li role="presentation"><a href="#cod" aria-controls="cod" role="tab" data-toggle="tab">Bayar di Tempat</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content tab-payment">
                          <div role="tabpanel" class="tab-pane active" id="bank-transfer">
                            <h5>Pemesanan dengan Bank Transfer akan otomatis dibatalkan oleh sistem kami jika pembayaran tidak diterima dalam waktu 24 jam :</h5>
                            <div class="form-group">
                              <div class="bank_label">
                                <label for="PaymentMethodForm_parameter_senderName">Pilih Bank Yang Anda Gunakan :</label>
                              </div>
                              <select class="mainBanks" id="PaymentMethodForm_parameter_bankNamePrimary" name="PaymentMethodForm[parameter][bankNamePrimary]">
                              <option value="">
                                Pilih
                              </option>
                              <option value="BCA ATM">
                                BCA
                              </option>
                              <option value="Mandiri Virtual Payment">
                                Mandiri
                              </option>
                              <option value="CIMB Niaga">
                                CIMB Niaga
                              </option>
                              <option value="BNI Virtual Account">
                                BNI
                              </option>
                              <option value="ATM Bersama">
                                ATM Bersama
                              </option>
                            </select>
                            </div>
                            <div class="form-group">
                              <div class="sender_label"><label for="PaymentMethodForm_parameter_senderName">Nama Pengirim</label></div>
                              <div class="sender_input">
                              <input autocomplete="off" class="input_field short_input" id="PaymentMethodForm_parameter_senderName" maxlength="30" name="PaymentMethodForm[parameter][senderName]" placeholder="Nama di rekening pengirim" size="80" type="text" value="">
                            </div>
                            </div>
                          </div>
                          <div role="tabpanel" class="tab-pane" id="cod">
                            <p>Bayar di Tempat tidak tersedia untuk produk ini dalam troli Anda</p>
                          </div>
                        </div>

                      </div>
                        <!-- End of shipping -->
                        <button type="submit" class="btn btn-default btn-pink">Confirm Order &nbsp;<i class="ion-locked"></i></button>
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