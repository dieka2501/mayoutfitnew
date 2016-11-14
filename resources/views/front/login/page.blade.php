@extends('front.home')
@section('content')
	<section class="section section-content">
        <div class="container">
            <div class="section-title no-border">
                <h1>Login</h1>
            </div>
            <!-- Login -->
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#login-account" aria-expanded="true" aria-controls="collapseOne">
                      Login
                    </a>
                  </h4>
                </div>
                <div id="login-account" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                  <p>{!!session('notip')!!}</p>
                  <div class="panel-body">
                    <form class="form-inline" method="POST" action="{!!config('app.url')!!}public/login">
                      <div class="form-group">
                        <label class="sr-only" for="InputEmail3">Email address</label>
                        <input type="email" class="form-control" id="login_email" placeholder="Email" name='login_email'>
                        <input type="hidden" class="form-control" id="login_email" placeholder="Email" name='_token' value="{!!csrf_token()!!}">
                        
                      </div>
                      <div class="form-group">
                        <label class="sr-only" for="InputPassword3">Password</label>
                        <input type="password" class="form-control" id="login_password" placeholder="Password" name="login_password">
                      </div>
                      <div class="checkbox">
                        <label>
                          <!-- <input type="checkbox"> Remember me -->
                        </label>
                      </div>
                      <button type="submit" class="btn btn-default btn-pink">Log In</button>
                    </form>
                  </div>
                </div>
              </div>
              <!-- Register -->
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#create-account" aria-expanded="false" aria-controls="collapseTwo">
                      Registrasi Pembeli
                    </a>
                  </h4>
                </div>
                <div id="create-account" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                  <div class="panel-body">
                    <p>Silakan registrasi di sini, agar mendapatkan kemudahan bertransaksi.</p>
                    <p id='notip'></p>
                    <form class="form-inline-signup">
                        <div class="row clearfix">
                            <div class="col-md-9 col-xs-12">
                                <div class="row">
                                    <div class="form-group clearfix">
                                        
                                        <div class="col-md-12"><input type="text" name='customer_name' class="form-control" id="customer_name" placeholder="Nama Lengkap" required="required"></div>
                                        
                                    </div>
                                    <div class="form-group clearfix">
                                        <div class="col-md-12"><input type="email" name="customer_email" class="form-control" id="customer_email" placeholder="Email" required="required"></div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <div class="col-md-12"><input type="text" name="customer_phone" class="form-control" id="customer_phone" placeholder="Nomor Telepon"></div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <div class="col-md-6"><input type="password" class="form-control" name="customer_password" id="customer_password" placeholder="Password" required="required"></div>
                                        <div class="col-md-6"><input type="password" class="form-control" name="repass" id="repass" placeholder="Konfirmasi Password" required="required"></div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <div class="col-md-12"><textarea name='customer_address' placeholder="Alamat" class="form-control" id="customer_address" rows='5'></textarea></div>
                                        <!-- <div class="col-md-6"><input type="text" class="form-control" id="password2" placeholder="Konfirmasi Password"></div> -->
                                    </div>
                                    <div class="form-group clearfix">
                                        <div class="col-md-4">{!!Form::select('customer_province',$arr_province,$customer_province,['class'=>'form-control','id'=>'customer_province'])!!}</div>
                                        <div class="col-md-4">{!!Form::select('customer_city',$arr_city,$customer_city,['class'=>'form-control','id'=>'customer_city'])!!}</div>
                                        <div class="col-md-4">{!!Form::select('customer_district',$arr_district,$customer_district,['class'=>'form-control','id'=>'customer_district'])!!}</div>
                                    </div>
                                    <div class="form-group clearfix">
                                        <div class="col-md-12"><input type="text" name="customer_zip" class="form-control" id="customer_zip" placeholder="Kodepos"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-default btn-pink" id='btn-register'>Register&nbsp;<i class="ion-arrow-right-c"></i></button>
                        <img src="{!!config('app.url')!!}public/assets/477.GIF" id="img-loading">
                    </form>
                    
                  </div>
                </div>
              </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#img-loading').hide();
        $(this).ajaxStart(function(){
            $('#img-loading').show();
            $('#btn-register').hide();
        }).ajaxStop(function(){
            $('#img-loading').hide();
            $('#btn-register').show();
        });
        $('#customer_province').change(function(){
              
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
              $('#customer_city').html(html);
           });
        });

        $('#customer_city').change(function(){
              
         // alert('asas');
           var idkota     = $(this).val();
           var idprovinsi = $("#customer_province").val();
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
              $('#customer_district').html(html);
           });
        });
      });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#btn-register').click(function(){
                var customer_name      = $('#customer_name').val();
                var customer_email     = $('#customer_email').val();
                var customer_password  = $('#customer_password').val();
                var repass             = $('#repass').val();
                var customer_address   = $('#customer_address').val();
                var customer_phone     = $('#customer_phone').val();
                var customer_province  = $('#customer_province').val();
                var customer_city      = $('#customer_city').val();
                var customer_district  = $('#customer_district').val();
                var customer_zip       = $('#customer_zip').val();
                $.post('{!!config("app.url")!!}public/api/register/post',{
                    'customer_name' : customer_name,
                    'customer_email': customer_email,
                    'customer_password':customer_password,
                    'repass':repass,
                    'customer_address':customer_address,
                    'customer_province':customer_province,
                    'customer_phone':customer_phone,
                    'customer_city':customer_city,
                    'customer_district':customer_district,
                    'customer_zip':customer_zip
                },function(data){
                    if(data.status){
                        var html = "<div class='alert alert-success'>"+data.alert+"</div>";
                        $('#customer_name').val("");
                        $('#customer_email').val("");
                        $('#customer_password').val("");
                        $('#repass').val("");
                        $('#customer_address').val("");
                        $('#customer_province').val("");
                        $('#customer_city').val("");
                        $('#customer_district').val("");
                        $('#customer_phone').val("");
                        $('#customer_zip').val("");
                    }else{
                      var html = "<div class='alert alert-warning'>"+data.alert+"</div>";
                    }
                    $('#notip').html(html).show().fadeOut(3000);
                });
            });
        }); 
    </script>
@stop