@extends('front.home')
@section('content')
	<section class="section section-content long-content grey-bg">
        <div class="container">
            <div class="section-title no-border">
                <h1>Konfirmasi Pembayaran</h1>
            </div>
            {!!Form::open(['url'=>$url,'method'=>'POST','files'=>true,'class'=>'form-horizontal'])!!}
            <div class="row clearfix">
                <div class="col-md-10 col-xs-12">
                    <div class="content-form">
                        <div class="section-title">
                            <h2>Konfirmasi Pembayaran</h2>
                        </div>
                        <div>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#bank-transfer" aria-controls="home" role="tab" data-toggle="tab">Bank Transfer</a></li>
                         <!--  <li role="presentation"><a href="#cod" aria-controls="cod" role="tab" data-toggle="tab">Bayar di Tempat</a></li> -->
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content tab-payment">
                          <div role="tabpanel" class="tab-pane active" id="bank-transfer">
                            <h5>Pemesanan dengan Bank Transfer akan otomatis dibatalkan oleh sistem kami jika pembayaran tidak diterima dalam waktu 24 jam :</h5>
                            <div class="form-group">
                              <div class="sender_label"><label for="">Nomor Order</label></div>
                              <div class="sender_input">
                                <input  class="input_field short_input" id="order_code"  name="order_code" placeholder="Masukan nomor/ kode order" type="text" value="">
                                <input  class="input_field short_input" id="order_id"  name="order_id" type="hidden" value="">
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="sender_label"><label for="">Nama Transfer</label></div>
                              <div class="sender_input">
                                <input  class="input_field short_input" id="payment_name"  name="payment_name" placeholder="Nama Pemilik Rekening" type="text" value="">
                               
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="sender_label"><label for="">Nominal Transfer</label></div>
                              <div class="sender_input">
                                <input  class="input_field short_input" id="payment_nominal"  name="payment_nominal" placeholder="Nominal Transfer" type="text" value="">
                               
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="bank_label">
                                <label for="PaymentMethodForm_parameter_senderName">Pilih Bank Tujuan Transfer :</label>
                              </div>
                              <select class="mainBanks" id="payment_bank_transfer" name="payment_bank_transfer">
                              <option value="">
                                Pilih
                              </option>
                              <option value="bca">
                                BCA
                              </option>
                              <option value="mandiri">
                                Bank Mandiri
                              </option>
                              
                            </select>
                            </div>
                            <div class="form-group">
                              <div class="sender_label"><label for="">Bukti Transfer</label></div>
                              <div class="sender_input">
                                <input type="file" class="form-control" value="" name="payment_image">
                               
                              </div>
                            </div>                            
                          </div>
                          <div role="tabpanel" class="tab-pane" id="cod">
                            <p>Bayar di Tempat tidak tersedia untuk produk ini dalam troli Anda</p>
                          </div>
                        </div>

                      </div>
                        <!-- End of shipping -->
                        <button type="button" class="btn btn-default btn-pink" id='btn-bayar'>Bayar! &nbsp;<i class="ion-locked"></i></button>
                    </div>
                </div>
                <!-- <div class="col-md-4 col-xs-12">
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
                </div> -->
            </div>
            {!!Form::close()!!}
        </div>
    </section>
    <script type="text/javascript">
      $(document).ready(function(){
          // alert('asjkhj');
          // $('.sembunyi').hide();
          $('#order_code').change(function(){
              var code = $(this).val();
              $.post("{!!config('app.url')!!}public/api/order/code",{
                  'code':code
              },function(data){
                  console.log(JSON.stringify(data).length);
                  if(JSON.stringify(data).length > 2){
                      if(data.order_status >0){
                        alert('Pembayaran order kamu sudah dikonfirmasi, silakan tunggu proses kirimnya.');
                      $('#order_code').val("");
                      $('#btn-bayar').attr('type','button');
                      $("#order_code").focus();
                      }else{
                        $('#order_id').val(data.idorder);
                        $('#btn-bayar').attr('type','submit');  
                      }
                      
                  }else{
                    alert('Nomor order kamu tidak diketemukan, coba periksa lagi.');
                    $('#order_code').val("");
                    $('#btn-bayar').attr('type','button');
                    $("#order_code").focus();
                  }
              });
          });
      });
    </script>
@stop