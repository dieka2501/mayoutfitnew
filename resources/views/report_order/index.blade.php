@extends('template')
@section('content')
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Report Order</h3>
                  <div class="box-tools pull-right">                    
                  </div>
                </div>
                <div class="box-body">
                  <div class="container">
                      {!!Form::open(['url'=>$url,'method'=>'GET'])!!}
                        <div class='row'>
                            <div class="col-md-4">
                                <input type="text" name="date_start" id='date_start' class="form-control tanggal" placeholder="Tanggal Mulai" value="{!!$date_start!!}">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="date_end" id='date_end' class="form-control tanggal" placeholder="Tanggal Selesai" value="{!!$date_end!!}">
                            </div>
                            <div class="col-md-1">
                              <input class="btn btn-box-tool" type='submit' name="search" value="Show"><i class="fa fa-search"></i>
                            </div>
                            <div class="col-md-1">
                              <input class="btn btn-box-tool" type='submit' name="pdf" value="To PDF"><i class="fa fa-file-pdf-o"></i>
                            </div>
                            <div class="col-md-1">
                              <input class="btn btn-box-tool" type='submit' name="excel" value="To Excell"><i class="fa fa-file-excel-o"></i>
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
                      $multiplehpp = $orders->product_hpp *$orders->order_detail_qty;
                      $profit = ($orders->order_detail_price - $orders->order_detail_discount_nominal) - $multiplehpp;
                      
                    ?>
                    <tr>
                      <td>{!!$orders->product_name!!}</td>
                      <td>{!!$orders->order_detail_qty!!}</td>
                      <td>Rp. {!!number_format($orders->order_detail_price)!!}</td>
                      <td>Rp. {!!number_format($orders->order_detail_discount_nominal)!!}</td>
                      <td>Rp. {!!number_format($multiplehpp)!!}</td>
                      <td>Rp. {!!number_format($profit)!!}</td>
                    </tr>
                    @endforeach
                    @if($role == 'owner')
                    <tr>
                      <td colspan="5"> <strong>Total profit per tanggal {!!$date_start!!} - {!!$date_end!!} </strong></td>
                      <!-- <td></td>
                      <td></td>
                      <td></td>
                      <td></td> -->
                      <td><strong>Rp. {!!number_format($profit)!!}</strong></td>
                    </tr>
                    @endif
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
                </div>
              </div>
              {!!$order->appends(['date_start'=>$date_start,'date_end'=>$date_end])->render()!!}
            </div>
          </div>
        </section>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.tanggal').datepicker({
                    dateFormat : "yy-mm-dd"                    
                });
            });
        </script>
@stop        