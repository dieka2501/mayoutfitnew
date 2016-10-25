@extends('template')
@section('content')
<section class="content">
  <div class="row">
    <div class="col-xs-12">
        <div class="box box-danger">
          <div class="box-header">
              <h3 class="box-title">History Pembelian Customer</h3>
          </div>
          <div class="box-body">
            <table id="example" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Order Date</th>
                  <th>Order Code</th>
                  <th>Order Name</th>
                  <th>Product</th>
                  <th>Qty</th>
                  <th>Sub Total</th>
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
                    <td>{!!$lists->created_at!!}</td>
                    <td>{!!$lists->order_code!!}</td>
                    <td>{!!$lists->order_name!!}</td>
                    <td>{!!$lists->product_name!!}</td>
                    <td>{!!$lists->order_detail_qty!!}</td>
                    <td>{!!$lists->order_detail_subtotal!!}</td>
                  </tr>
                @endforeach
              <tbody>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Order Date</th>
                  <th>Order Code</th>
                  <th>Order Name</th>
                  <th>Product</th>
                  <th>Qty</th>
                  <th>Sub Total</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <div class="box-footer">
            <a href="{!!config('app.url')!!}public/admin/customer" class="btn btn-default">Back</a>
          </div>
        </div>
    </div>
  </div>
</section>
@stop      