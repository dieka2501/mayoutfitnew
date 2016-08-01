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
                      <label class="col-sm-3 control-label">HPP</label>
                      <div class="col-sm-9">
                        <div class="input-group">
                          <div class="input-group-addon">
                            Rp
                          </div>
                          <input type="text" class="form-control" name="product_hpp" id="product_price"  value="{!!$product_hpp!!}" required="required">
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
                          <input type="text" class="form-control" name="product_margin" id="product_margin"  value="{!!$product_margin!!}" required="required">
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
@stop      