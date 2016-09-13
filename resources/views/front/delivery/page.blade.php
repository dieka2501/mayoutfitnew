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
                            <div class="clearfix add-address ch-address-type-option">

                            </div><input name="ThreeStepShippingAddressForm[createNewAddress]" type="hidden" value="0">
                            <div id="addnew" style="background:#f5f5f5;padding:20px;">
                              <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control">
                              </div>
                              <div class="form-group">
                                <label>Alamat Pengirim</label>
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
                                {!!Form::select('id_provinsi',$arr_provinsi,$id_provinsi,['class'=>'form-group','id'=>'id_provinsi'])!!}
                              </div>
                              </div>
                              <div class="col-md-4">
                              <div class="form-group">
                                <label>Kota</label>
                                {!!Form::select('id_kota',$arr_kota,$id_kota,['class'=>'form-group','id'=>'id_kota'])!!}
                              </div>
                              </div>
                              <div class="col-md-4">
                              <div class="form-group">
                                <label>Kecamatan</label>
                                {!!Form::select('id_kecamatan',$arr_kecamatan,$id_kecamatan,['class'=>'form-group','id'=>'id_kecamatan'])!!}
                              </div>
                              </div>
                              </div>
                              <div class="radio-check form-group">

                                <input class="is-new-address" id="beda_alamat" name="beda_alamat" type="checkbox" value="0" >
                                <label class="ch-label address-info" id="addNewAddress" for="inputNewAddress">Kirim ke alamat berbeda</label>
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
                                @for($icart=0;$icart < $count; $icart++ )
                                <tr class="first-item">
                                  <td width="160">{!!$name[$icart]!!}</td>
                                  <td class="qty" width="50">{!!$qty[$icart]!!}</td>
                                  <?php $subtotal = $qty[$icart] * $price[$icart]?>
                                  <td class="right-align sel-cart-item-total-MI399OTAA42B24ANID-7914138">Rp. {!!number_format($subtotal)!!}</td>
                                </tr>
                                @endfor
                                
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
                                  <td class="right-align" colspan="2">Rp. {!!number_format($subtotal)!!}
                                  <input type="hidden" name="hidsubtotal" id="hidsubtotal" value="{!!$subtotal!!}">
                                  </td>
                                </tr>
                                <tr>
                                  <td class="subtotal highlight shipping-cost-free">Tipe Pengiriman</td>
                                  <td class="right-align highlight shipping-cost-free" colspan="2">{!!Form::select('type_kirim',$arr_type,$type_kirim,['class'=>'form-control','id'=>'type_kirim'])!!}</td>
                                </tr>
                                <tr>
                                  <td class="subtotal highlight shipping-cost-free">Biaya pengiriman</td>
                                  <td class="right-align highlight shipping-cost-free" colspan="2">Rp. <p id='ongkir'>0</p></td>
                                </tr>
                                <tr class="total">
                                  <td class="total"><strong class="total-label">Total</strong> <span class="vat-minicart">(Termasuk PPN)</span></td>
                                  <td class="total right-align sel-total" colspan="2"><strong class="total-price">Rp. <p id="grandtotal">{!!number_format($subtotal)!!}</p></strong></td>
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
    <script type="text/javascript">
      $(document).ready(function(){
        $('#id_provinsi').change(function(){
              
        // alert('asas');
           var idprovinsi = $(this).val();
           $.post('{!!config("app.url")!!}public/api/kota/getidprovinsi',{
              'idprovinsi':idprovinsi
           },function(data){
              // console.log(data);
              // var count = data.length;
              var html = '<option value="">-- Pilih Kota --</option>';
              for (var i = data.length - 1; i >= 0; i--) {
                html +="<option value='"+data[i].id+"'>"+data[i].nama_kota+"</option>";
                  
              }
              $('#id_kota').html(html);
           });
        });
        $('#id_kota').change(function(){
              
         // alert('asas');
           var idkota     = $(this).val();
           var idprovinsi = $("#id_provinsi").val();
           $.post('{!!config("app.url")!!}public/api/kecamatan/getidprovinsiidkota',{
              'idprovinsi':idprovinsi,
              'idkota':idkota
           },function(data){
              console.log(data);
              // var count = data.length;
              var html = '<option value="">-- Pilih Kecamatan --</option>';
              for (var i = data.length - 1; i >= 0; i--) {
                html +="<option value='"+data[i].id+"'>"+data[i].nama_kecamatan+"</option>";
                  
              }
              $('#id_kecamatan').html(html);
           });
        });

        $('#id_kecamatan').change(function(){
              
           // alert('asas');
           var idkota       = $("#id_kota").val();
           var idprovinsi   = $("#id_provinsi").val();
           var idkecamatan  = $("#id_kecamatan").val();
           $.post('{!!config("app.url")!!}public/api/ongkir',{
              'idprovinsi':idprovinsi,
              'idkota':idkota,
              "idkecamatan":idkecamatan
           },function(data){
              console.log(data);
              var htmlkirim = '<option value="">-- Pilih Tipe Pengiriman --</option>';
              if(data.oke > 0){
                htmlkirim += '<option value="'+data.oke+'">OKE</option>';  
              }
              if(data.reg > 0){
                htmlkirim += '<option value="'+data.reg+'">REGULER</option>';  
              }
              if(data.yes > 0){
                htmlkirim += '<option value="'+data.yes+'">YES</option>';  
              }
              $('#type_kirim').html(htmlkirim);
              
           });
        });

        $('#type_kirim').change(function(){
          var valkirim = $(this).val();
          var subtotal = $('#hidsubtotal').val();
          var total    = parseInt(valkirim)  + parseInt(subtotal);
          $('#ongkir').html(valkirim);
          $('#grandtotal').html(total);
        });
      });
    </script>
@stop