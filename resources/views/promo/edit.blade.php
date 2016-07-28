@extends('template')
@section('content')
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-danger">
                <div class="box-header">
                  <h3 class="box-title">Add Promo</h3>
                </div>
                <div class="box-body">
                  <div class="box-body">
                    <div class="row">
                      <div class="form-horizontal">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Promo ID</label>
                            <div class="col-sm-9">
                              <input type="text" name="" class="form-control" disabled="disabled" value="1202">
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
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Promo Period</label>
                            <div class="col-sm-8">
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="reservation">
                              </div><!-- /.input group -->
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr/>
                    <h4>Product Detail</h4>
                    <br/>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Product Name</label>
                          <select class="form-control select2" style="width: 100%;">
                            <option>Select Product</option>
                            <option>Alaska</option>
                            <option>California</option>
                            <option>Delaware</option>
                            <option>Tennessee</option>
                            <option>Texas</option>
                            <option>Washington</option>
                          </select>
                        </div><!-- /.form group -->
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Price</label>
                          <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Rp.</span>
                            <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                          </div>
                        </div><!-- /.form group -->
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Discount</label>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                            <span class="input-group-addon" id="basic-addon1">%</span>
                          </div>
                        </div><!-- /.form group -->
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Price After Discount</label>
                          <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Rp.</span>
                            <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                          </div>
                        </div><!-- /.form group -->
                      </div>
                    </div>
                  </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                  <a href="javascript:history.back()" class="btn btn-default">Cancel</a>
                  <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
              </div><!-- /.box -->
            </div><!-- /.col (left) -->
          </div><!-- /.row -->

        </section><!-- /.content -->
@stop      