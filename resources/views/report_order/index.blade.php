@extends('template')
@section('content')
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Report Order</h3>
                  <div class="box-tools pull-right">
                    
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="container">
                      {!!Form::open(['url'=>$url,'method'=>'GET'])!!}
                        <div class='row'>
                            <div class="col-md-5">
                                <input type="text" name="start_date" id='start_date' class="form-control tanggal" placeholder="Tanggal Mulai" value="{!!$date_start!!}">
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="end_date" id='end_date' class="form-control tanggal" placeholder="Tanggal Selesai" value="{!!$date_end!!}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10 text-right">
                                <button class="btn btn-box-tool" type='submit'><i class="fa fa-print"></i> <span class="hidden-xs">Print</span></button>           
                            </div>
                        </div>
                      {!!Form::close()!!}
                      
                    </div>
                  <table id="example" class="table table-bordered table-striped table-hover">
                    <thead>
                      <tr>
                        <th>Nama Barang</th>
                        <th>Qty</th>
                        <th>Penjualan</th>
                        <th>Diskon</th>
                        <th>HPP</th>
                        <th>Profit</th>
                      </tr>
                    </thead>
                  <tbody>

                    @foreach($order as $orders)
                    <?php 
                      $profit = ($orders->order_detail_price - $orders->order_detail_discount_nominal) -$orders->product_hpp;

                    ?>
                    <tr>
                      <td>{!!$orders->product_name!!}</td>
                      <td>{!!$orders->order_detail_qty!!}</td>
                      <td>Rp. {!!number_format($orders->order_detail_price)!!}</td>
                      <td>Rp. {!!number_format($orders->order_detail_discount_nominal)!!}</td>
                      <td>Rp. {!!number_format($orders->product_hpp)!!}</td>
                      <td>Rp. {!!number_format($profit)!!}</td>

                    </tr>
                    @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nama Barang</th>
                    <th>Qty</th>
                    <th>Penjualan</th>
                    <th>Diskon</th>
                    <th>HPP</th>
                    <th>Profit</th>
                  </tr>
                  </tfoot>
                  </table>
                  <p>{!!$order->appends(['date_start'=>$date_start,'date_end'=>$date_end])->render()!!}</p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
        <script type="text/javascript">
            $(document).ready(function(){
                $('.tanggal').datepicker({
                    dateFormat : "yy-mm-dd"
                    
                });
            });
        </script>
@stop        