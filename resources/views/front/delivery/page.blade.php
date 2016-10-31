@extends('front.home')
@section('content')
  <section class="section section-content long-content grey-bg">
        <div class="container">
            <div class="section-title no-border">
                <h1>Delivery</h1>
            </div>
            <div class="row clearfix">
              {!!Form::open(['url'=>config('app.url').'public/checkout','method'=>'POST','id'=>'frm-checkout'])!!}
                <div class="col-md-8 col-xs-12">
                    <div class="content-form">
                        <div class="section-title">
                            <h2>Pilih alamat pengiriman</h2>
                        </div>
                        <div class="shipping-wrap-border">
                          <div class="shipping-wrap existing-address">
                            <div class="clearfix add-address ch-address-type-option">

                            </div>
                            <div id="addnew" style="background:#f5f5f5;padding:20px;">
                              <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="order_name" id="order_name" required="required">
                              </div>
                              <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="order_email" id="order_email" required="required">
                              </div>
                              <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-contro" rows="5" name="order_address" id="order_address" required="required"></textarea>
                              </div> 
                              <div class="form-group">
                                <label>No. Tlp</label>
                                <input type="text" class="form-control" name="order_phone" id='order_phone' required="required">
                              </div>
                              <div class="radio-check form-group">

                                <input class="is-new-address" id="beda_alamat" name="beda_alamat" type="checkbox" value="1" >
                                <label class="ch-label address-info" id="" for="inputNewAddress">Kirim ke alamat berbeda</label>
                              </div>
                              <div class="form-group penerima">
                                <label>Nama Penerima</label>
                                <input type="text" class="form-control" name="order_shipment_name" id="order_shipment_name">
                              </div>
                              <div class="form-group penerima">
                                <label>Alamat Penerima</label>
                                <textarea class="form-contro" rows="5" name="order_shipment_address" id="order_shipment_address"></textarea>
                              </div> 
                              <div class="form-group penerima">
                                <label>No. Tlp Penerima</label>
                                <input type="text" class="form-control" name="order_shipment_phone" id="order_shipment_phone">
                              </div>
                              <div class="form-group">
                                <label>Kodepos Penerima</label>
                                <input type="text" class="form-control" name="order_shipment_zip" id="order_shipment_zip">
                              </div>
                              <div class="row">
                              <div class="col-md-4">
                              <div class="form-group">
                                <label>Provinsi Penerima</label>
                                {!!Form::select('id_provinsi',$arr_provinsi,$id_provinsi,['class'=>'form-group','id'=>'id_provinsi'])!!}
                              </div>
                              </div>
                              <div class="col-md-4">
                              <div class="form-group">
                                <label>Kota Penerima</label>
                                {!!Form::select('id_kota',$arr_kota,$id_kota,['class'=>'form-group','id'=>'id_kota'])!!}
                              </div>
                              </div>
                              <div class="col-md-4">
                              <div class="form-group">
                                <label>Kecamatan Penerima</label>
                                {!!Form::select('id_kecamatan',$arr_kecamatan,$id_kecamatan,['class'=>'form-group','id'=>'id_kecamatan'])!!}
                              </div>
                              </div>
                              </div>
                              <div class="form-group">
                                <label>Catatan Pembelian</label>
                                <textarea class="form-contro" rows="5" name="order_note" id="order_note"></textarea>
                              </div> 
                            </div>
                          </div>
                          
                        </div>
                        <div class="shipping-wrap-border">
                          <div class="shipping-wrap existing-address">
                            <div class="clearfix add-address ch-address-type-option">

                            </div>
                            <div id="addnew" style="background:#f5f5f5;padding:20px;">
                              <div class="form-group">
                                <label>Masukan Voucher</label>
                                  <input type="text" name="voucher" class="form-control" id='input-voucher'>
                                  <button type="button" id='voucher'>Cek Voucher</button>
                              </div> 
                            </div>
                          </div>
                        </div>
                        <!-- End of shipping -->
                        <button type="button" class="btn btn-default btn-pink" id='btn-checkout'>Checkout &nbsp;<i class="ion-arrow-right-c"></i></button>
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
                                <?php $subtotal=0;?>
                                @for($icart=0;$icart < $count; $icart++ )
                                <tr class="first-item">
                                  <td width="160">{!!$name[$icart]!!}</td>
                                  <td class="qty" width="50">{!!$qty[$icart]!!}</td>
                                  <?php $subtotal += $qty[$icart] * $price[$icart]?>

                                  <td class="right-align sel-cart-item-total-MI399OTAA42B24ANID-7914138">Rp. {!!number_format($price[$icart])!!}</td>
                                </tr>
                                @endfor
                                <?php $subtotal += $uniqid?>
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
                                  <td class="right-align highlight shipping-cost-free" colspan="2">Rp. <p id='ongkir'>0</p>
                                  </td>
                                </tr>
                                <tr class="total">
                                  <td class="total"><strong class="total-label">Total</strong> <span class="vat-minicart">(Termasuk PPN)</span></td>
                                  <td class="total right-align sel-total" colspan="2"><strong class="total-price">Rp. <p id="grandtotal">{!!number_format($subtotal)!!}</p></strong>
                                  <input type='hidden' name="grandtotal" id='input-grandtotal'> 
                                  <input type="hidden" name="nextid" id='nextid' value="{!!$uniqid!!}">
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                {!!Form::close()!!}
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
          // console.log(parseInt(nextid));
          var total    = parseInt(valkirim)  + parseInt(subtotal) ;
          $('#ongkir').html(valkirim);
          $('#grandtotal').html(total);
          $('#input-grandtotal').val(total);
        });

        $('#btn-checkout').click(function(){
            var provinsi = $('#id_provinsi').val();
            var kota     = $('#id_kota').val();
            var kecamatan= $('#id_kecamatan').val();
            var ongkir   = $('#type_kirim').val();
            var nama     = $('#order_name').val();
            var email    = $('#order_email').val();
            var alamat   = $('#order_address').val();
            var telepon  = $('#order_phone').val();
            if(provinsi != "" && kota != "" && kecamatan != "" && ongkir != "" && nama != "" && email != "" && alamat != "" && telepon != "" ){
              $('#frm-checkout').submit();
            }else{
              alert('Semua field dan tipe pengiriman harus diisi');
            }
        });

        $('.penerima').hide();
        $('#beda_alamat').change(function(){
            var beda_alamat = $(this).prop('checked');
            if(beda_alamat){
              $('.penerima').fadeIn(1000);
            }else{
              $('.penerima').fadeOut(500);
            }
        });
      });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
          // alert('adsdsd');
            $('#voucher').click(function(){
                var codevoucher = $('#input-voucher').val();
                $.post("{!!config('app.url')!!}public/api/voucher/cek",{
                    'voucher' : codevoucher
                },function(data){
                    var count = data.length;
                    console.log(data);
                    console.log(data.length);
                    if(data.idvoucher != 'undefined'){
                        alert("Selamat kamu dapat potongan harga Rp."+data.voucher_discount);
                    }else{
                      alert('Maaf voucher salah, atau sudah tidak berlaku');
                    }
                });
            });
        });
    </script>
@stop