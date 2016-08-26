@extends('template')
@section('content')
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Order</h3>
                  {!!session('notip')!!}
                  <div class="box-tools pull-right">
                  <a href="{{Request::url()}}/add">
                    <button class="btn btn-box-tool"><i class="fa fa-plus"></i> <span class="hidden-xs">Create Order</span></button>
                  </a>
                  </div>
                </div><!-- /.box-header -->
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
                        <th>Order ID</th>
                        <th>Order Name</th>
                        <th>Order Phone</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th>Action Second</th>
                      </tr>
                    </thead>
                  <tbody>
                    @foreach($list as $lists)
                    <tr>
                      <td>{!!$lists->order_code!!}</td>
                      <td>{!!$lists->order_name!!}</td>
                      <td>{!!$lists->order_phone!!}</td>
                      <td>{!!number_format($lists->order_total)!!}</td>
                        <?Php
                         if($lists->order_status == 0){
                            $stat = "Pending";
                        }elseif($lists->order_status == 1){
                            $stat = "Payment";
                        }elseif($lists->order_status == 2){
                          $stat = "Delivered";
                        }elseif($lists->order_status == 3){
                          $stat = "Done";
                        }else{
                          $stat = "Failed";
                        }

                        ?>
                      <td>{!!$stat!!}</td>
                      <td style="width:150px;">
                        <a href="{!!config('app.url')!!}public/admin/order/edit/{!!$lists->idorder!!}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                        <!-- <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="config('app.url')public/admin/order/edit/$lists->idorder" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Delete</a> -->
                        <a href="{!!config('app.url')!!}public/admin/order/print/{!!$lists->idorder!!}" target="__blank" class="btn btn-success btn-xs"><i class="fa fa-print"></i> Print</a>
                        <a href="{!!config('app.url')!!}public/admin/order/konfirm/bayar/{!!$lists->idorder!!}" class="btn btn-default btn-xs"><i class="fa fa-print"></i>Konfirmasi</a>
                      </td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-default btn-flat">Action</button>
                          <button type="button" class="btn btn-warning btn-flat dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                          </ul>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Order ID</th>
                    <th>Order Name</th>
                    <th>Order Phone</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th>Action Second</th>
                  </tr>
                  </tfoot>
                  </table>
                  <p>{!!$list->appends(['cari'=>$cari])->render()!!}</p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
@stop        