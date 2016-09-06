@extends('front.home')
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
                            <div class="clearfix address-wrapper ch-address-type-option ch-selected">
                              <div class="radio-check">
                                <input autocomplete="off" class="shipping" id="inputAddressType0" name="ThreeStepShippingAddressForm[shippingAddressId]" type="radio" value="1410697">
                              </div>
                              <div class="address">
                                <p class="ch-head"><label class="address-info" for="inputAddressType0">Gary Livertus</label></p>
                                <p><label class="address-info" for="inputAddressType0">Jl. Bhayangkara Komp. Griya Serang Asri Blok R no. 9-10 RT 02/10</label></p>
                                <p><label class="address-info" for="inputAddressType0">Banten - Kota Serang - Cipocok Jaya</label></p>
                                <p><label class="address-info" for="inputAddressType0">Nomor Handphone: 085718456446</label></p>
                              </div>
                            </div>
                            <div class="clearfix address-wrapper ch-address-type-option">
                              <div class="radio-check">
                                <input autocomplete="off" checked="checked" class="shipping" id="inputAddressType1" name="ThreeStepShippingAddressForm[shippingAddressId]" type="radio" value="299487">
                              </div>
                              <div class="address">
                                <p class="ch-head"><label class="address-info" for="inputAddressType1">Supatmo Agus Edi Cahyono</label></p>
                                <p><label class="address-info" for="inputAddressType1">Jl. Budhi no. 8 Cilember-Cimindi RT 02/03 Kel. Sukaraja Kec. Cicendo Bandung</label></p>
                                <p><label class="address-info" for="inputAddressType1">Jawa Barat - Kota Bandung - Cicendo</label></p>
                                <p><label class="address-info" for="inputAddressType1">Nomor Handphone: 08818228571</label></p>
                              </div>
                            </div>
                            <div class="clearfix add-address ch-address-type-option">
                              <div class="radio-check">
                                <input class="is-new-address" id="inputNewAddress" name="ThreeStepShippingAddressForm[shippingAddressId]" type="radio" value="0">
                              </div><label class="ch-label address-info" for="inputNewAddress">Tambahkan alamat lain</label>
                            </div><input name="ThreeStepShippingAddressForm[createNewAddress]" type="hidden" value="0">
                          </div>
                          <div class="shipping-wrap ch-billing-address">
                            <!-- this div is placeholder for billing address form, if user want to create different address, do not remove it-->
                            <div class="cf billaddress-wrap shipping-wrap ch-form-auto-completion" data-type="1" id="billing-form-wrapper">
                              <div class="billing-address-form hidden" id="billing-address-form">
                                <div class="billing-address-form-h3">
                                  <div class="billing-t-label">
                                    Alamat Penagihan
                                  </div>
                                  <div class="billing-country-scope bill-to-country-local">
                                    <span class="bill-to-country">Indonesia</span> | <a class="change-billing-country-scope" href="#" id="billing-to-different-country">Internasional</a>
                                  </div>
                                  <div class="billing-country-scope bill-to-country-international disabled-billing">
                                    <a class="change-billing-country-scope" href="#" id="billing-to-locals-country">Indonesia</a> | <span class="bill-to-country">Internasional</span>
                                  </div>
                                </div>
                                <div class="billing-country-scope bill-to-country-local">
                                  <div class="payment-billingform" id="billing-local-address-form">
                                    <div class="billing-t-row">
                                      <div class="billing-t-label">
                                        Nama
                                      </div>
                                      <div class="billing-t-input">
                                        <input class="billing-input-field" disabled id="ThreeStepBillingAddressForm-first-name" maxlength="50" name="ThreeStepBillingAddressForm[first-name]" placeholder="Nama Anda" size="50" type="text">
                                      </div>
                                      <div class="t-validation billing-validation"></div>
                                      <div class="clear"></div>
                                    </div>
                                    <div class="billing-t-row ch-top">
                                      <div class="billing-t-label">
                                        Alamat
                                      </div>
                                      <div class="billing-t-input">
                                        <textarea class="billing-input-field billing-textarea-field" disabled id="ThreeStepBillingAddressForm-address1" name="ThreeStepBillingAddressForm[address1]" placeholder="Alamat" rows="3"></textarea>
                                      </div>
                                      <div class="t-validation billing-validation"></div>
                                      <div class="clear"></div>
                                    </div>
                                    <div class="billing-t-row">
                                      <div class="billing-t-label">
                                        Provinsi
                                      </div>
                                      <div class="billing-t-input">
                                        <select class="location billing billing-input-field" disabled id="ThreeStepBillingAddressForm-location-0" name="ThreeStepBillingAddressForm[location][0]" rel="location-0">
                                          <option value="17198">
                                            Kalimantan Utara
                                          </option>
                                          <option value="22">
                                            DKI Jakarta
                                          </option>
                                          <option value="29">
                                            Bali
                                          </option>
                                          <option value="32">
                                            Bangka Belitung
                                          </option>
                                          <option value="36">
                                            Banten
                                          </option>
                                          <option value="40">
                                            Bengkulu
                                          </option>
                                          <option value="19">
                                            Di Yogyakarta
                                          </option>
                                          <option value="17">
                                            Gorontalo
                                          </option>
                                          <option value="26">
                                            Jambi
                                          </option>
                                          <option value="35">
                                            Jawa Barat
                                          </option>
                                          <option value="46">
                                            Jawa Tengah
                                          </option>
                                          <option value="23">
                                            Jawa Timur
                                          </option>
                                          <option value="27">
                                            Kalimantan Barat
                                          </option>
                                          <option value="20">
                                            Kalimantan Selatan
                                          </option>
                                          <option value="25">
                                            Kalimantan Tengah
                                          </option>
                                          <option value="24">
                                            Kalimantan Timur
                                          </option>
                                          <option value="37">
                                            Kepulauan Riau
                                          </option>
                                          <option value="18">
                                            Lampung
                                          </option>
                                          <option value="28">
                                            Maluku
                                          </option>
                                          <option value="38">
                                            Maluku Utara
                                          </option>
                                          <option value="3023">
                                            Nanggroe Aceh Darussalam (Nad)
                                          </option>
                                          <option value="2896">
                                            Nusa Tenggara Barat (Ntb)
                                          </option>
                                          <option value="2590">
                                            Nusa Tenggara Timur (Ntt)
                                          </option>
                                          <option value="42">
                                            Papua
                                          </option>
                                          <option value="48">
                                            Papua Barat
                                          </option>
                                          <option value="21">
                                            Riau
                                          </option>
                                          <option value="50">
                                            Sulawesi Barat
                                          </option>
                                          <option value="45">
                                            Sulawesi Selatan
                                          </option>
                                          <option value="30">
                                            Sulawesi Tengah
                                          </option>
                                          <option value="47">
                                            Sulawesi Tenggara
                                          </option>
                                          <option value="49">
                                            Sulawesi Utara
                                          </option>
                                          <option value="31">
                                            Sumatera Barat
                                          </option>
                                          <option value="34">
                                            Sumatera Selatan
                                          </option>
                                          <option value="39">
                                            Sumatera Utara
                                          </option>
                                        </select>
                                      </div>
                                      <div class="t-validation billing-validation"></div>
                                      <div class="clear"></div>
                                    </div>
                                    <div class="billing-t-row">
                                      <div class="billing-t-label">
                                        Kota
                                      </div>
                                      <div class="billing-t-input">
                                        <select class="location billing billing-input-field" disabled id="ThreeStepBillingAddressForm-location-1" name="ThreeStepBillingAddressForm[location][1]" rel="location-1">
                                          <option value="">
                                            Pilih
                                          </option>
                                          <option value="3807">
                                            Kab. Tana Tidung
                                          </option>
                                          <option value="3827">
                                            Kab. Nunukan
                                          </option>
                                          <option value="3836">
                                            Kab. Malinau
                                          </option>
                                          <option value="3909">
                                            Kab. Bulungan (Bulongan)
                                          </option>
                                          <option value="3934">
                                            Kota Tarakan
                                          </option>
                                        </select>
                                      </div>
                                      <div class="t-validation billing-validation"></div>
                                      <div class="clear"></div>
                                    </div>
                                    <div class="billing-t-row">
                                      <div class="billing-t-label">
                                        Kecamatan
                                      </div>
                                      <div class="billing-t-input">
                                        <select class="location billing billing-input-field" disabled id="ThreeStepBillingAddressForm-location-2" name="ThreeStepBillingAddressForm[location][2]" rel="location-2">
                                          <option value="">
                                            Pilih
                                          </option>
                                          <option value="17627">
                                            Tanah Tidung
                                          </option>
                                          <option value="3808">
                                            Tana Lia (Tanah Lia)
                                          </option>
                                          <option value="3809">
                                            Sesayap Hilir
                                          </option>
                                          <option value="3810">
                                            Sesayap
                                          </option>
                                        </select>
                                      </div>
                                      <div class="t-validation billing-validation"></div>
                                      <div class="clear"></div>
                                    </div>
                                    <div class="billing-t-row">
                                      <div class="ch-pleft">
                                        <div class="billing-t-label">
                                          Nomor Handphone
                                        </div>
                                        <div class="billing-t-input ch-relative">
                                          <span class="ch-in-extension">+62</span> <input class="billing-input-field" disabled id="ThreeStepBillingAddressForm-phone" maxlength="20" name="ThreeStepBillingAddressForm[phone]" placeholder="Nomor Telepon" size="50" type="text">
                                        </div>
                                        <div class="t-validation billing-validation"></div>
                                      </div>
                                      <div class="ch-pright"></div>
                                      <div class="clear"></div>
                                    </div>
                                  </div><input disabled id="ThreeStepBillingAddressForm-fk-country" name="ThreeStepBillingAddressForm[fk-country]" type="hidden" value="101">
                                </div>
                                <div class="billing-country-scope bill-to-country-international disabled-billing">
                                  <div class="payment-billingform" id="billing-foreign-address-form">
                                    <div class="space-15"></div>
                                    <div class="billing-t-row">
                                      <div class="billing-t-label">
                                        Nama
                                      </div>
                                      <div class="billing-t-input">
                                        <input class="billing-input-field" disabled id="ThreeStepBillingAddressForm-first-name-foreign" maxlength="50" name="ThreeStepBillingAddressForm[first-name]" placeholder="Nama Anda" size="50" type="text">
                                      </div>
                                      <div class="t-validation billing-validation"></div>
                                      <div class="clear"></div>
                                    </div>
                                    <div class="billing-t-row">
                                      <div class="billing-t-label">
                                        Alamat
                                      </div>
                                      <div class="billing-t-input">
                                        <textarea class="billing-input-field" disabled id="ThreeStepBillingAddressForm-address1-foreign" name="ThreeStepBillingAddressForm[address1]" placeholder="Alamat" rows="3"></textarea>
                                      </div>
                                      <div class="t-validation billing-validation"></div>
                                      <div class="clear"></div>
                                    </div>
                                    <div class="billing-t-row">
                                      <div class="billing-t-label">
                                        Kota
                                      </div>
                                      <div class="billing-t-input">
                                        <input class="billing-input-field" disabled id="ThreeStepBillingAddressForm-location-1-foreign" name="ThreeStepBillingAddressForm[location][1]" placeholder="Kota anda" size="50" type="text">
                                      </div>
                                      <div class="t-validation billing-validation"></div>
                                      <div class="clear"></div>
                                    </div>
                                    <div class="billing-t-row">
                                      <div class="billing-t-label">
                                        State / Province / Region
                                      </div>
                                      <div class="billing-t-input">
                                        <input class="billing-input-field" disabled id="ThreeStepBillingAddressForm-location-0-foreign" name="ThreeStepBillingAddressForm[location][0]" placeholder="Your state / province / region" size="50" type="text">
                                      </div>
                                      <div class="t-validation billing-validation"></div>
                                      <div class="clear"></div>
                                    </div>
                                    <div class="billing-t-row">
                                      <div class="billing-t-label">
                                        Kode Pos
                                      </div>
                                      <div class="billing-t-input">
                                        <input class="billing-input-field" disabled id="ThreeStepBillingAddressForm-location-2-foreign" name="ThreeStepBillingAddressForm[location][2]" placeholder="Your zipcode" size="50" type="text">
                                      </div>
                                      <div class="t-validation billing-validation"></div>
                                      <div class="clear"></div>
                                    </div>
                                    <div class="billing-t-row">
                                      <div class="billing-t-label">
                                        Negara
                                      </div>
                                      <div class="billing-t-input">
                                        <select class="location billing billing-input-field billing-foreign-country-select" disabled id="ThreeStepBillingAddressForm-fk-country-foreign" name="ThreeStepBillingAddressForm[fk-country]" rel="fk-country">
                                          <option value="">
                                            Pilih
                                          </option>
                                        </select>
                                      </div>
                                      <div class="t-validation billing-validation"></div>
                                      <div class="clear"></div>
                                    </div>
                                    <div class="billing-t-row">
                                      <div class="billing-t-label">
                                        Nomor Handphone
                                      </div>
                                      <div class="billing-t-input">
                                        <input class="billing-input-field" disabled id="ThreeStepBillingAddressForm-phone-foreign" maxlength="20" name="ThreeStepBillingAddressForm[phone]" placeholder="Nomor Telepon" size="50" type="text">
                                      </div>
                                      <div class="t-validation billing-validation"></div>
                                      <div class="clear"></div>
                                    </div><input class="billing-input-field" disabled id="ThreeStepBillingAddressForm-tax-code" name="ThreeStepBillingAddressForm[tax-code]" type="hidden" value="">
                                    <div class="space-15"></div>
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
                            <!-- <div style="display: none;"> -->
                            <div>
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