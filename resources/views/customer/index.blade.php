@extends('template')
@section('content')
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Customer</h3>
          {!!session('notip')!!}
        </div>
        <div class="box-body">
          <div class="container">
            {!!Form::open(['url'=>$url,'method'=>'GET'])!!}
              <div class='row'>
                <div class="col-md-5">
                  <input type="text" name="cari" id='cari' class="form-control" placeholder="Masukan Kata Kunci" value="{!!$cari!!}">
                </div>
                <div class="col-md-5">
                  <button class="btn btn-box-tool" type='submit'><i class="fa fa-search"></i> <span class="hidden-xs">Search</span></button>
                </div>
              </div>        
            {!!Form::close()!!}
          </div>
          <table id="example" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Address</th>
                <th>Member Type</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $i = 0;
                if(Input::has('page')){
                    $haspage = Input::get('page');
                }else{
                  $haspage = 1;
                }
                  $num = 20 * ($haspage-1);
              ?>
              @foreach($list as $lists)
                <?php 
                      $i++;
                      $nums = $num +$i 
                ?>
                <tr>
                  <td>{!!$nums!!}</td>
                  <td>{!!$lists->customer_name!!}</td>
                  <td>{!!$lists->customer_address!!}</td>
                  <td>{!!$lists->membertype_name!!}</td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-default btn-flat">Action</button>
                      <button type="button" class="btn btn-warning btn-flat dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="{!!config('app.url')!!}public/admin/customer/historypayment/{!!$lists->idcustomer!!}">History Pembelian</a></li>
                        <li><a href="{!!config('app.url')!!}public/admin/customer/changemember/{!!$lists->idcustomer!!}">Change Member Type</a></li>
                        <li><a onclick="return confirm('Apakah anda yakin reset password customer ini ?')" href="{!!config('app.url')!!}public/admin/customer/resetpassword/{!!$lists->idcustomer!!}">Reset Password</a></li>
                      </ul>
                    </div>
                  </td>
                </tr>
              @endforeach
            <tbody>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Address</th>
                <th>Member Type</th>
                <th>Action</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      {!!$list->appends(['cari'=>$cari])->render()!!}
    </div>
  </div>
</section>
@stop        