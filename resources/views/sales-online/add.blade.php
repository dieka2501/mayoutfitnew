@extends('template')
@section('content')
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-danger">
                <div class="box-header">
                  <h3 class="box-title">Sales Info</h3>
                </div>
                <div class="box-body">
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Nama Penerima</label>
                            <input type="text" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label>No Handphone Penerima</label>
                            <input type="text" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Nama Pengirim (Dropship)</label>
                            <input type="text" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label>No Handphone Pengirim</label>
                            <input type="text" class="form-control">
                        </div>
                      </div>

                      
                    </div>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col (left) -->
          </div><!-- /.row -->

          <div class="row">
            <div class="col-md-12">
              <div class="box box-warning">
                <div class="box-header">
                  <h3 class="box-title">Product</h3>
                </div>
                <div class="box-body">
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Product Name</label>
                          <input type="text" class="form-control">
                        </div><!-- /.form group -->
                      </div>

                      <div class="col-md-2">
                        <div class="form-group">
                          <label>Price</label>
                          <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Rp.</span>
                            <input type="text" class="form-control" aria-describedby="basic-addon1">
                          </div>
                        </div><!-- /.form group -->
                      </div>

                      <div class="col-md-1">
                        <div class="form-group">
                          <label>Stock</label>
                            <input type="text" class="form-control">
                        </div><!-- /.form group -->
                      </div>

                      <div class="col-md-1">
                        <div class="form-group">
                          <label>Quantity</label>
                            <input type="text" class="form-control">
                        </div><!-- /.form group -->
                      </div>

                      <div class="col-md-2">
                        <div class="form-group">
                          <label>Discount</label>
                          <div class="input-group">
                            <input type="text" class="form-control" aria-describedby="basic-addon1">
                            <span class="input-group-addon" id="basic-addon1">%</span>
                          </div>
                        </div><!-- /.form group -->
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Subtotal</label>
                          <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Rp.</span>
                            <input type="text" class="form-control" aria-describedby="basic-addon1">
                          </div>
                        </div><!-- /.form group -->
                      </div>
                    </div>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col (left) -->
          </div><!-- /.row -->


          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Delivery Information</h3>
                </div>
                <div class="box-body">
                  <div class="box-body">
                    <div class="row">
                      <div class="form-horizontal">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Provinsi</label>
                            <div class="col-sm-9">
                              <input type="text" name="" class="form-control">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-3 control-label">Kota</label>
                            <div class="col-sm-9">
                              <input type="text" name="" class="form-control">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-3 control-label">Kecamatan</label>
                            <div class="col-sm-9">
                              <input type="text" name="" class="form-control">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-3 control-label">Alamat</label>
                            <div class="col-sm-9">
                              <textarea class="form-control" rows="6"></textarea>
                            </div>
                          </div>

                        </div>
                        <div class="col-md-6">

                          <div class="form-group">
                            <label class="col-sm-4 control-label">Biaya Pengiriman</label>
                            <div class="col-sm-8">
                              <div class="mb15">
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <div class="radio">
                                      <label><input type="radio" name="optradio">OKE</label>
                                    </div>
                                  </span>
                                  <input type="text" class="form-control" aria-label="r1">
                                </div><!-- /input-group -->
                              </div>
                              <div class="mb15">
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <div class="radio">
                                      <label><input type="radio" name="optradio">REG</label>
                                    </div>
                                  </span>
                                  <input type="text" class="form-control" aria-label="r1">
                                </div><!-- /input-group -->
                              </div>
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <div class="radio">
                                      <label><input type="radio" name="optradio">YES</label>
                                    </div>
                                  </span>
                                  <input type="text" class="form-control" aria-label="r1">
                                </div><!-- /input-group -->
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-4 control-label">Total Biaya Kirim</label>
                            <div class="col-sm-8">
                              <input type="text" name="" class="form-control">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-4 control-label">Berat Barang</label>
                            <div class="col-sm-3">
                              <input type="text" name="" class="form-control">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-4 control-label">Total Diskon</label>
                            <div class="col-sm-3">
                              <input type="text" name="" class="form-control">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-4 control-label">Grand Total</label>
                            <div class="col-sm-8">
                              <input type="text" name="" class="form-control">
                            </div>
                          </div>

                        </div>
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