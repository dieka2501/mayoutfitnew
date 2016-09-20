@extends('front.home')
@section('content')
	<section class="section section-content long-content grey-bg">
        <div class="container">
            <div class="section-title no-border">
                <h1>Pemesanan Selesai</h1>
            </div>
            <div class="row clearfix">
                <div class="col-md-8 col-md-offset-2 col-xs-12">
                      <div class="content-form">
                        <p>ID Pesanan : <strong>{!!$idorder!!}</strong></p>
                        <p>Total Belanja : <strong>Rp {!!$grandtotal!!}</strong></p>
                        <br/>
                        <p>Terima kasih telah berbelanja di mayoutfit.com.</p><br>
                        <p>kalau kamu sudah transfer, silakan konfirmasi di sini, agar pesananmu langsung diproses.</p>
                        <br/>
                        <div class="well">
                        <!-- <form class="form-horizontal"> -->
                        {!!Form::open(['url'=>$url,'method'=>'POST','files'=>true,'class'=>'form-horizontal'])!!}
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Kode Order :</label>
                            <div class="col-sm-8">
                                <input type="hidden" class="form-control" name='order_id' value="{!!$idorder!!}">
                                <input type="text" class="form-control" name='order_code' value="{!!$order_code!!}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nama Transfer :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name='payment_name'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nomor Referensi :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name='payment_no_ref'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nominal Transfer :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="" name="payment_nominal">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Bank Tujuan Pembayaran :</label>
                            <div class="col-sm-8">
                                {!!Form::select('payment_bank_transfer',['bca'=>'BCA','mandiri'=>'Bank Mandiri'],'',['class'=>'form-control'])!!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Bukti Transfer :</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" value="" name="payment_image">
                            </div>
                        </div>
                        <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                        <button type="submit" class="btn btn-pink">Bayar!</button>
                        </div>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop