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
                  <table id="example" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Order ID</th>
                        <th>Order Name</th>
                        <th>Order Phone</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Action</th>
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
                        <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="{!!config('app.url')!!}public/admin/order/edit/{!!$lists->idorder!!}" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Delete</a>
                        <a href="{!!config('app.url')!!}public/admin/order/print/{!!$lists->idorder!!}" target="__blank" class="btn btn-success btn-xs"><i class="fa fa-print"></i> Print</a>
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
                  </tr>
                  </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
@stop        