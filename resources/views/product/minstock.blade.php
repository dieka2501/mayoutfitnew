@extends('template')
@section('content')
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Minus Stock Product</h3>
                  {!!session('notip')!!}
                  <div class="box-tools pull-right">
                  
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="container">
                      {!!Form::open(['url'=>$url,'method'=>'POST'])!!}
                      <div class='row'>
                        <div class="col-md-10">
                            <p> Product Name : {!!$product_name!!}</p>
                            <p> Stock : {!!number_format($product_stock)!!}</p>
                        </div>
                      </div>
                        <div class='row'>
                            <div class="col-md-5">
                                <input type="text" name="stock" class="form-control" placeholder="Masukan Jumlah Stock Yang Ingin Dikurangi" >
                                <input type="hidden" name="_token"  value="{!!csrf_token()!!}">
                                <input type="hidden" name="idproduct"  value="{!!$idproduct!!}">
                                <input type="hidden" name="product_stock"  value="{!!$product_stock!!}">
                            </div>
                            <div class="col-md-4">
                                
                            </div>
                        </div>
                        <div class='row'>
                            <div class="col-md-5">
                                <a href='{!!config("app.url")!!}public/admin/product' class='btn btn-danger'>Back</a>
                            </div>
                            <div class="col-md-5 ">
                                <button class="btn btn-success" type='submit'>Minus</button>
                            </div>
                        </div>
                      
                      {!!Form::close()!!}
                      
                    </div>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
@stop        