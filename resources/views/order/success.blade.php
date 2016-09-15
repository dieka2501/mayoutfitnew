@extends('home')
@section('content')
	<section class="section section-content long-content grey-bg">
        <div class="container">
            <div class="section-title no-border">
                <h1>Payment Confirm</h1>
            </div>
            <div class="row clearfix">
                <div class="col-md-8 col-md-offset-2 col-xs-12">
                      <div class="content-form">
                        <p>ID Pesanan : <strong>389014</strong></p>
                        <p>Total Belanja : <strong>Rp 180.000</strong></p>
                        <br/>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <br/>
                        <div class="well">
                        <form class="form-horizontal">
                        <div class="form-group">
                        <label class="col-sm-4 control-label">Tanggal Transfer :</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control">
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="col-sm-4 control-label">Nilai Transfer :</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" value="Rp. ">
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                        <button type="submit" class="btn btn-pink">Lanjut</button>
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