@extends('template')
@section('content')
        <!-- Main content -->
        <section class="content-header">
          <h1>
            Add Product
          </h1>
        </section>

        <section class="content">

          <div class="row">
            <div class="col-md-6">

              <div class="box box-danger">
                <!-- form start -->
                <div class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Product ID</label>

                      <div class="col-sm-9">
                        <input type="text" class="form-control" disabled="disabled" value="1202">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Status</label>
                      <div class="col-sm-9">
                        <select class="form-control">
                          <option>Active</option>
                          <option>Non Active</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Price</label>
                      <div class="col-sm-9">
                        <div class="input-group">
                          <div class="input-group-addon">
                            Rp
                          </div>
                          <input type="text" class="form-control" data-inputmask='"mask": "999.999,99"' data-mask>
                        </div><!-- /.input group -->
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Stock</label>
                      <div class="col-sm-3">
                        <input type="number" class="form-control">
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
                      <label class="col-sm-3 control-label">Brand</label>
                      <div class="col-sm-9">
                        <select class="form-control">
                          <option>Test</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Categories</label>
                      <div class="col-sm-9">
                        <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                          <option>Alabama</option>
                          <option>Alaska</option>
                          <option>California</option>
                          <option>Delaware</option>
                          <option>Tennessee</option>
                          <option>Texas</option>
                          <option>Washington</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Subcategories</label>
                      <div class="col-sm-9">
                        <select class="form-control">
                          <option>Test</option>
                        </select>
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
                        <input type="file" class="form-control">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-4 control-label">Product Image</label>
                      <div class="col-sm-8">
                        <input type="file" class="form-control">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-4 control-label">Product Image</label>
                      <div class="col-sm-8">
                        <input type="file" class="form-control">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-4 control-label">Product Image</label>
                      <div class="col-sm-8">
                        <input type="file" class="form-control">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-4 control-label">Product Image</label>
                      <div class="col-sm-8">
                        <input type="file" class="form-control">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-4 control-label">Product Image</label>
                      <div class="col-sm-8">
                        <input type="file" class="form-control">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-4 control-label">Product Image</label>
                      <div class="col-sm-8">
                        <input type="file" class="form-control">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-4 control-label">Product Image</label>
                      <div class="col-sm-8">
                        <input type="file" class="form-control">
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
                    <textarea id="editor1" name="editor1" rows="10" cols="80"></textarea>
                  </div>
                </div>
                <div class="box-footer">
                  <a href="javascript:history.back()" class="btn btn-default">Cancel</a>
                  <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
              </div><!-- /.box -->
            </div>
          </div>

        </section><!-- /.content -->
@stop      