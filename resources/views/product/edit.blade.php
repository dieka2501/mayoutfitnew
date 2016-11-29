@extends('template')
@section('content')
        <!-- Main content -->
        <section class="content-header">
          <h1>
            Add Product
          </h1>
        </section>
        {!!session('notip')!!}
        {!!Form::open(['url'=>$url,'method'=>'POST','files'=>true])!!}
        <section class="content">

          <div class="row">
            <div class="col-md-6">

              <div class="box box-danger">
                <!-- form start -->

                <div class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Product Name</label>

                      <div class="col-sm-9">
                        <input type="text" class="form-control"  name="product_name" id="product_name" value="{!!$product_name!!}" required="required">
                        <input type="hidden" class="form-control"  name="ids" id="ids" value="{!!$ids!!}" required="required">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Product Code</label>

                      <div class="col-sm-9">
                        <input type="text" class="form-control"  name="product_code" id="product_code" value="{!!$product_code!!}" required="required">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label">Price</label>
                      <div class="col-sm-9">
                        <div class="input-group">
                          <div class="input-group-addon">
                            Rp
                          </div>
                          <input type="text" class="form-control" name="product_price" id="product_price"  value="{!!$product_price!!}" required="required">
                        </div><!-- /.input group -->
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Sale Price</label>
                      <div class="col-sm-9">
                        <div class="input-group">
                          <div class="input-group-addon">
                            Rp
                          </div>
                          <input type="text" class="form-control" name="product_price_sale" id="product_price_sale"  value="{!!$product_price_sale!!}" >
                        </div><!-- /.input group -->
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">HPP</label>
                      <div class="col-sm-9">
                        <div class="input-group">
                          <div class="input-group-addon">
                            Rp
                          </div>
                          <input type="text" class="form-control" name="product_hpp" id="product_hpp"  value="{!!$product_hpp!!}" required="required">
                        </div><!-- /.input group -->
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Margin</label>
                      <div class="col-sm-9">
                        <div class="input-group">
                          <div class="input-group-addon">
                            Rp
                          </div>
                          <input type="text" class="form-control" name="product_margin" id="product_margin"  value="{!!$product_margin!!}" required="required" readonly="readonly">
                        </div><!-- /.input group -->
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Stock</label>
                      <div class="col-sm-3">
                        <input type="number" class="form-control" name='product_stock' value="{!!$product_stock!!}" required="required">
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="box box-info">
                <!-- form start -->
                <div class="form-horizontal">
                  <div class="box-body">      
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Categories</label>
                      <div class="col-sm-9">
                        <!-- <select class="form-control">
                          <option>Test</option>
                        </select> -->
                        {!!Form::select('category_id',$arr_category,$category_id,['id'=>'category_id','class'=>'form-control','required'=>'required'])!!}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- /.col (left) -->
            <div class="col-md-6">
              <div class="box box-danger">
                <!-- form start -->
                <div class="form-horizontal">
                  <div class="box-body" style="height:445px;">

                    <div class="form-group">
                      <label class="col-sm-4 control-label">Product Image</label>
                      <div class="col-sm-8">
                        <input type="file" class="form-control" name="product_image" id="product_image">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Product Weight</label>
                      <div class="col-sm-8">
                        <input type="number" class="form-control" name='product_weight' value="{!!$product_weight!!}" required="required" placeholder="Dalam gran">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Status Product</label>
                      <div class="col-sm-8">
                        {!!Form::select('product_status',['1'=>'Active','0'=>'Not active'],$product_status,['id'=>'product_status','class'=>'form-control','required'=>'required'])!!}
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Status Product Sale</label>
                      <div class="col-sm-8">
                        {!!Form::select('product_sale',['0'=>'Not Sale','1'=>'Sale'],$product_sale,['id'=>'product_sale','class'=>'form-control'])!!}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- /.row -->

          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
                <div class="box-body">
                <label class="control-label">Product Description</label>
                  <div>
                    <textarea id="editor1" rows="10" cols="80" name="product_description">{!!$product_description!!}</textarea>
                  </div>
                </div>
                <div class="box-footer">
                  <a href="{!!config('app.url')!!}public/admin/product" class="btn btn-default">Cancel</a>
                  <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
              </div><!-- /.box -->
            </div>
          </div>
          {!!Form::close()!!}
        </section><!-- /.content -->
        <script   src="https://code.jquery.com/jquery-3.1.0.js"   integrity="sha256-slogkvB1K3VOkzAI8QITxV3VzpOnkeNVsKvtkYLMjfk="   crossorigin="anonymous"></script>
        <script type="text/javascript">
          function htng_margin(hpp,price){
            var margin = price - hpp ;
            $('#product_margin').val(margin);
          }
          $(document).ready(function(){
            $('#product_hpp').keyup(function(){
                var price   = $('#product_price').val();
                var hpp     = $('#product_hpp').val();
                htng_margin(hpp,price);
            });

            $('#product_price').keyup(function(){
                var price   = $('#product_price').val();
                var hpp     = $('#product_hpp').val();
                htng_margin(hpp,price);
            });        

          });

        </script>
@stop      