@extends('template')
@section('content')
        <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
        <!-- Main content -->
        {!!session('notip')!!}
        <section class="content">
        {!!Form::open(['url'=>$url,'method'=>'POST'])!!}
          <div class="row">
            <div class="col-md-12">
              <div class="box box-danger">
                <div class="box-header">
                  <h3 class="box-title">Create Order</h3>
                  <br>
                  <h2 class="box-title">Number Order : {!!date('Ymd').$uniqid!!}</h2>
                </div>
                <div class="box-body">
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Nama Penerima</label>
                            <input type="text" class="form-control" name='order_name' id='order_name'>
                            <input type="hidden" class="form-control" name='uniqid' id='uniqid' value="{!!$uniqid!!}">
                             {!!csrf_field()!!}
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label>No Handphone Penerima</label>
                            <input type="text" class="form-control" name='order_phone' id="order_phone">
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Nama Pengirim (Dropship)</label>
                            <input type="text" class="form-control" name="order_shipment_name" id="order_shipment_name">
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label>No Handphone Pengirim</label>
                            <input type="text" class="form-control" name='order_shipment_phone' id="order_shipment_phone">
                        </div>
                      </div>

                      
                    </div>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col (left) -->
          </div><!-- /.row -->

          <div class="row ">
            <div class='clone'>
              <div class="col-md-12">
                <div class="box box-warning">
                  <div class="box-header">
                    <h3 class="box-title">Product</h3>
                  </div>
                  <small id='loading'>Mengambil data barang....</small>
                  <div class="box-body">
                    <div class="box-body">
                     
                       <div class="row data-clone">
                        <div class="col-md-3">
                        
                          <div class="form-group">

                            <label>Product Name</label>
                            <input type="text" class="form-control product_name" name='product_name[]' id="product_name_1" >
                            <input type="hidden" class="form-control product_id" name='product_id[]' id="product_id_1" >
                            <input type="hidden" class="form-control product_weight" name='product_weight[]' id="product_weight_1" >
                            <input type="hidden" class="form-control total_product_weight" name='total_product_weight[]' id="total_product_weight_1" >
                          </div><!-- /.form group -->
                        </div>

                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Price</label>
                            <div class="input-group">
                              <span class="input-group-addon" id="basic-addon1">Rp.</span>
                              <input type="text" class="form-control order_detail_price" aria-describedby="basic-addon1" name="order_detail_price[]" id="order_detail_price_1" value="0" readonly="readonly">
                            </div>
                          </div><!-- /.form group -->
                        </div>

                        <div class="col-md-1">
                          <div class="form-group">
                            <label>Stock</label>
                              <input type="text" class="form-control product_stock" name="product_stock[]" id="product_stock_1" value="0" readonly="readonly">
                          </div><!-- /.form group -->
                        </div>

                        <div class="col-md-1">
                          <div class="form-group">
                            <label>Quantity</label>
                              <input type="text" class="form-control order_detail_qty" name="order_detail_qty[]" id="order_detail_qty_1" value="0">
                          </div><!-- /.form group -->
                        </div>

                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Discount</label>
                            <div class="input-group">
                              <span class="input-group-addon" id="basic-addon1">Rp</span>
                              <input type="text" class="form-control order_detail_diskon" aria-describedby="basic-addon1" name="order_detail_diskon[]" id="order_detail_diskon_1" value="0">
                              
                            </div>
                          </div><!-- /.form group -->
                        </div>

                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Subtotal</label>
                            <div class="input-group">
                              <span class="input-group-addon" id="basic-addon1">Rp.</span>
                              <input type="text" class="form-control subtotal" aria-describedby="basic-addon1" name="subtotal[]" id="subtotal_1" value="0" readonly="readonly">
                            </div>
                          </div><!-- /.form group -->
                        </div>
                      </div>

                        <!-- -->
                        <div class="row">
                          <div class="col-md-12">
                              <button class='btn btn-primary' id="add-data" type="button">ADD</button>    
                          </div>
                        </div>
                    </div>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col (left) -->
          </div><!-- /.row -->

          
          

          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Delivery Information</h3>
                </div>
                <div class="box-body">
                  <div class="box-body">
                    <div class="row">
                      <div class="form-horizontal">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Provinsi</label>
                            <div class="col-sm-9">
                              <!-- <input type="text" name="" class="form-control"> -->
                              {!!Form::select('provinsi',$arr_provinsi,$provinsi,['class'=>'form-control','id'=>"provinsi"])!!}
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-3 control-label">Kota</label>
                            <div class="col-sm-9">
                              <!-- <input type="text" name="" class="form-control"> -->
                              {!!Form::select('kota',$arr_kota,$kota,['class'=>'form-control','id'=>"kota"])!!}
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-3 control-label">Kecamatan</label>
                            <div class="col-sm-9">
                              <!-- <input type="text" name="" class="form-control"> -->
                              {!!Form::select('kecamatan',$arr_kecamatan,$kecamatan,['class'=>'form-control','id'=>"kecamatan"])!!}
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-3 control-label">Alamat</label>
                            <div class="col-sm-9">
                              <textarea class="form-control" rows="6" name="order_address" id='order_address'></textarea>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-3 control-label">Kodepos</label>
                            <div class="col-sm-9">
                              <input type="text" name='order_shipment_zip' id='order_shipment_zip' class="form-control">
                            </div>
                          </div>

                        </div>
                        <div class="col-md-6">

                          <div class="form-group">
                            <label class="col-sm-4 control-label">Biaya Pengiriman</label>
                            <div class="col-sm-8">
                              <div class="mb15">
                                <!-- <div class="input-group">
                                  <span class="input-group-addon">
                                    <div class="radio">
                                      <label><input type="radio" name="paket" value='0' class="type_paket" id="oke">OKE</label>
                                    </div>
                                  </span>
                                  <input type="text" class="form-control" aria-label="r1" name='shipment_oke' id="shipment_oke" readonly="readonly">
                                </div> --><!-- /input-group -->
                              </div>
                              <div class="mb15">
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <div class="radio">
                                      <label><input type="radio" name="paket" value='0' class="type_paket" id='reg'>REG</label>
                                    </div>
                                  </span>
                                  <input type="text" class="form-control" aria-label="r1" name='shipment_reg' id="shipment_reg" readonly="readonly">
                                </div><!-- /input-group -->
                              </div>
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <div class="radio">
                                      <label><input type="radio" name="paket" value='0' class="type_paket" id="yes">YES</label>
                                    </div>
                                  </span>
                                  <input type="text" class="form-control" aria-label="r1" name='shipment_yes' id="shipment_yes" readonly="readonly">
                                </div><!-- /input-group -->
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-4 control-label">Total Biaya Kirim</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name='order_shipment_price' id="order_shipment_price" readonly="readonly" value="0">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-4 control-label">Berat Barang</label>
                            <div class="col-sm-3">
                              <input type="text" name="weight" class="form-control" id="weight" value='0'>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-4 control-label">Diskon Total (%)</label>
                            <div class="col-sm-3">
                              <input type="text" name="diskon_total" id="diskon_total" class="form-control" value="0" >
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-4 control-label">Grand Total</label>
                            <div class="col-sm-8">
                              <input type="text" name="grand_total" id="grand_total" class="form-control" value="0" readonly="readonly">
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                    <div class='row'>
                        <div class="col-md-12">
                            <textarea class="form-control" name='order_note' id='order_note' placeholder="Catatan Pembelian"></textarea>
                        </div>
                    </div>
                  </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                  <a href="{!!config('app.url')!!}public/admin/order" class="btn btn-default">Cancel</a>
                  <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
              </div><!-- /.box -->
            </div><!-- /.col (left) -->
          </div><!-- /.row -->
          {!!Form::close()!!}
        </section><!-- /.content -->
        <!-- <script   src="https://code.jquery.com/jquery-2.2.4.min.js"></script> -->
        <!-- <script   src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script> -->
        <script type="text/javascript">
          
          // });
          // console.log($('#product_name_1').exists());
          function autokomplit(id){
            // alert('sdsdd');
            $('#product_name_'+id).autocomplete({
              source:"{!!config('app.url')!!}public/api/product/autocomplete",
              minLength:2,
              select:function(event,ui){
                  $("#product_name_"+id).val(ui.item.value);
                  $("#product_id_"+id).val(ui.item.id);
                  $.post('{!!config("app.url")!!}public/api/product/idproduct',{
                      'idproduct':ui.item.id
                  },function(data){
                      // console.log(data);

                        // var berat       = parseInt($('#weight').val());
                        // var getberat    = parseInt(data.product_weight);
                        // var jumlahberat = berat + getberat;
                        $('#product_weight_'+id).val(data.product_weight); 

                      $("#order_detail_price_"+id).val(data.product_price);
                      $("#product_stock_"+id).val(data.product_stock);
                  });
              }
            });

            $("#order_detail_qty_"+id).keyup(function(){
                // alert('22323');
                // console.log(id);
                var qty         = $(this).val();
                var price       = $("#order_detail_price_"+id).val();
                var diskon      = $("#order_detail_diskon_"+id).val();
                var oberat      = $("#product_weight_"+id).val(); 
                var typeberat   = $(".type_paket").val();
                // var $hargakirim = 0;
                // console.log(typeberat);
                // if(typeberat == 0){
                //   $hargakirim = 0;
                // }
                var subtotal;
                var subberat    = parseInt(qty) * parseInt(oberat);
                var jmlberat    = 0;
                var jmlqty      = 0;

                subtotal = (qty*price) - diskon;
                $("#subtotal_"+id).val(subtotal);
                $("#total_product_weight_"+id).val(subberat);
                calc_subtotal();
                // $('.order_detail_qty').each(function(index,value){
                //     jmlqty +=  parseInt($(this).val());
                // });
                $('.total_product_weight').each(function(index,value){
                    jmlberat += parseInt($(this).val());
                });

                $('#weight').val(jmlberat);
                
                var kg          = Math.round(jmlberat/1000);
                if(kg == 0){
                  kg = 1;
                }
                var totalongkir = kg * parseInt(typeberat);
                $("#order_shipment_price").val(totalongkir);

            });

            $("#order_detail_diskon_"+id).keyup(function(){
                // alert('22323');
                var qty       = $("#order_detail_qty_"+id).val();
                var price     = $("#order_detail_price_"+id).val();
                var diskon    = $(this).val();
                var subtotal;
                subtotal = (qty*price) - diskon;
                $("#subtotal_"+id).val(subtotal);
                calc_subtotal();
            });

          }

          function calc_subtotal(){
              var jml_sub = 0;
              $('.subtotal').each(function(index,value){
                  jml_sub += parseInt($(this).val());
                  console.log(jml_sub);
              });
              // console.log(jml_sub);
              var tmpweight   = $("#weight").val();
              var kg          = Math.round(tmpweight/1000);
              if(kg == 0){
                kg = 1;
              } 
              var diskon_tot  = $('#diskon_total').val();
              var biaya_kirim = parseInt($("#order_shipment_price").val());
              var uniqid      = parseInt($('#uniqid').val());
              var no_diskon   = (parseInt(diskon_tot)/100)*parseInt(jml_sub);
              var total_all   = (parseInt(jml_sub)+parseInt(biaya_kirim)) -  parseInt(no_diskon);
              var grand       = total_all + uniqid;
              $("#grand_total").val(grand);
          }

          $(document).ready(function(){
              autokomplit(1);  
          });
        </script>
        <script type="text/javascript">

            $(document).ready(function(){
                // alert('sdsd');
                // autokomplit(1);  
                $('#product_name_1').autocomplete();
                 $('#provinsi').change(function(){
              
               // alert('asas');
                   var idprovinsi = $(this).val();
                   $.post('{!!config("app.url")!!}public/api/kota/getidprovinsi',{
                      'idprovinsi':idprovinsi
                   },function(data){
                      // console.log(data);
                      // var count = data.length;
                      var html = '<option value="">-- Select City --</option>';
                      for (var i = data.length - 1; i >= 0; i--) {
                        html +="<option value='"+data[i].id+"'>"+data[i].nama_kota+"</option>";
                          
                      }
                      $('#kota').html(html);
                   });
                });
            });
            
            
            $(document).ready(function(){
                $('#kota').change(function(){
              
                   // alert('asas');
                   var idkota     = $(this).val();
                   var idprovinsi = $("#provinsi").val();
                   $.post('{!!config("app.url")!!}public/api/kecamatan/getidprovinsiidkota',{
                      'idprovinsi':idprovinsi,
                      'idkota':idkota
                   },function(data){
                      console.log(data);
                      // var count = data.length;
                      var html = '<option value="">-- Select District --</option>';
                      for (var i = data.length - 1; i >= 0; i--) {
                        html +="<option value='"+data[i].id+"'>"+data[i].nama_kecamatan+"</option>";
                          
                      }
                      $('#kecamatan').html(html);
                   });
                });
            });

            
            $(document).ready(function(){
                $('#kecamatan').change(function(){
              
                   // alert('asas');
                   var idkota       = $("#kota").val();
                   var idprovinsi   = $("#provinsi").val();
                   var idkecamatan  = $("#kecamatan").val();
                   $.post('{!!config("app.url")!!}public/api/ongkir',{
                      'idprovinsi':idprovinsi,
                      'idkota':idkota,
                      "idkecamatan":idkecamatan
                   },function(data){
                      console.log(data);
                      $('#shipment_oke').val(data.oke);
                      $('#shipment_reg').val(data.reg);
                      $('#shipment_yes').val(data.yes);
                      $('#oke').val(data.oke);
                      $('#reg').val(data.reg);
                      $('#yes').val(data.yes);
                      // var count = data.length;
                      // var html = '';
                      // for (var i = data.length - 1; i >= 0; i--) {
                      //   html +="<option value='"+data[i].id+"'>"+data[i].nama_kecamatan+"</option>";
                          
                      // }
                      // $('#kecamatan').append(html);
                   });
                });

            });
            

        </script>
        <script type="text/javascript">
          $(document).ready(function(){
              $('.type_paket').click(function(){
                // alert($(this).val());
                  var paket       = parseInt($(this).val());
                  var tmpweight   = parseInt($("#weight").val());
                  var kg          = Math.round(tmpweight/1000);
                  if(kg == 0){
                    kg = 1;
                  } 
                  // console.log(in_paket);
                  var tot_hargakirim    = paket * kg;
                  $('#order_shipment_price').val(tot_hargakirim);
                  calc_subtotal();
              });

              $('#weight').change(function(){
                  var shipment_price = $('.type_paket:checked').val();
                  var berat          = $(this).val();
                  var ongkir          = shipment_price * Math.round((berat/1000));
                  $('#order_shipment_price').val(ongkir); 
                  calc_subtotal();
              });

              $('#diskon_total').keyup(function(){
                  calc_subtotal();
              });

          });
            


        </script>
        <script type="text/javascript">
          // $(document).ready(function(){
              var clone = $('.row .data-clone:last').clone(true);
              $('body').on('click','#add-data',function(){

                  var parentRow = $(".row  .data-clone").last();
                  // console.log(parentRow);
                  clone.clone(true).insertAfter(parentRow);
                  var getids = $(parentRow).find('.product_name').last().attr('id');
                  // console.log(getids);
                  var ids     = getids.split("_");
                  var newids  = parseInt(ids[2]) +1;
                  // autokomplit(newids);
                  // console.log(newids);
                  $('input.product_name').last().attr('id','product_name_'+newids);
                  $('input.product_id').last().attr('id','product_id_'+newids);
                  $('input.product_weight').last().attr('id','product_weight_'+newids);
                  $('input.order_detail_price').last().attr('id','order_detail_price_'+newids);
                  $('input.product_stock').last().attr('id','product_stock_'+newids);
                  $('input.total_product_weight').last().attr('id','total_product_weight_'+newids);
                  $('input.order_detail_qty').last().attr('id','order_detail_qty_'+newids);
                  $('input.order_detail_diskon').last().attr('id','order_detail_diskon_'+newids);
                  $('input.subtotal').last().attr('id','subtotal_'+newids);
                  autokomplit(newids);

              });
          // });
            
            $(document).ready(function(){
                $('#loading').hide();
                $(this).ajaxStart(function(){
                    $('#loading').show();
                }).ajaxStop(function(){
                    $('#loading').hide();
                });
            });
        </script>
@stop      