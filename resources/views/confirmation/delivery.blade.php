@extends('template')
@section('content')
        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-12">

              <!-- <div class="box box-danger">
                <div class="box-header">
                  <h3 class="box-title">Delivery Detail</h3>
                </div>
                <div class="box-body">
                  <div class="form-group">
                    <label>Pengiriman</label>
                    <select class="form-control">
                      <option>Sample</option>
                    </select>
                  </div> --><!-- /.form group

                  <div class="form-group">
                    <label>No. Bukti Pengiriman</label>
                    <input type="text" class="form-control">
                  </div>< /.form group

                </div> /.box-body
              </div> /.box --> 
            <!-- </div> --><!-- /.col (left) -->

            <div class="col-md-6">

              <!-- <div class="box box-danger">
                <div class="box-header">
                  <h3 class="box-title">Payment Detail</h3>
                </div>
                <div class="box-body"> -->
                  <!-- <div class="form-group">
                    <label>Payment Method</label>
                    <select class="form-control">
                      <option>Sample</option>
                    </select>
                  </div> --><!-- /.form group -->

                  <!-- <div class="row"> -->
                    <!-- <div class="form-group col-md-6">
                      <label>Nominal</label>
                      <input type="text" class="form-control">
                    </div> --><!-- /.form group -->
                    <!-- <div class="form-group col-md-6">
                      <label>Rekening</label>
                      <select class="form-control">
                        <option>Sample</option>
                      </select>
                  </div> --><!-- /.form group -->
                  <!-- </div> -->

                <!-- </div> --><!-- /.box-body -->
              <!-- </div> --><!-- /.box -->
            </div><!-- /.col (left) -->
          </div><!-- /.row -->
          <div class="row">
            <div class="col-md-12">
              <div class="box box-danger">
                <div class="box-header">
                  <h3 class="box-title">Payment Information</h3>
                </div>
                <div class="box-body">
                  <div class="box-body">
                    {!!Form::open(['url'=>$url,'method'=>'POST','files'=>true])!!}
                    <div class="row">
                      <div class="form-horizontal">
                        <div class="col-md-7">
                          <div class="form-group">
                            <label class="col-sm-3 control-label">No Order</label>
                            <div class="col-sm-9">
                              <input type="hidden" name="order_id" class="form-control" id='order_id' value='{!!$order->idorder!!}' readonly="readonly">
                              <input type="text" name="order_code" class="form-control" id='order_code' value='{!!$order->order_code!!}' readonly="readonly">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-3 control-label">No Resi</label>
                            <div class="col-sm-9">
                              <input type="text" name="shipment_no_resi" class="form-control" id='shipment_no_resi' value=''>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Nama Pengirim</label>
                            <div class="col-sm-9">
                              <input type="text" name="shipment_name" class="form-control" id='shipment_name' value=''>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Tanggal Pengiriman</label>
                            <div class="col-sm-9">
                              <input type="text" name="shipment_date" class="form-control tanggal" id='shipment_date' value='' readonly="readonly" placeholder="YYYY-MM-DD">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Catatan Pengiriman</label>
                            <div class="col-sm-9">
                              <textarea name="shipment_note" class="form-control"></textarea>
                            </div>
                          </div>
                          <div class="box-footer">
                          <a href="javascript:history.back()" class="btn btn-default">Cancel</a>
                          <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </div>
                      </div>
                        </div>
                        <!-- <div class="col-md-6">



                          <div class="form-group">
                            <label class="col-sm-3 control-label">Mobile Phone</label>
                            <div class="col-sm-9">
                              <input type="text" name="" class="form-control">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-3 control-label">Province</label>
                            <div class="col-sm-9">
                              <select class="form-control">
                                <option>Select</option>
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-3 control-label">City</label>
                            <div class="col-sm-9">
                              <input type="text" name="" class="form-control">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-3 control-label">ZIP Code</label>
                            <div class="col-sm-9">
                              <input type="text" name="" class="form-control">
                            </div>
                          </div>

                        </div> -->

                    </div>
                    {!!Form::close()!!}
                  </div>
                </div> <!-- /.box-body -->
              </div> <!-- /.box -->
            </div><!-- /.col (left) -->
          </div><!-- /.row -->

          <div class="row">
            <div class="col-md-12">
            <!-- <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Delivery Information</h3>
                </div>
                <div class="box-body">
                  <div class="box-body">
                    <div class="row">
                      <div class="form-horizontal">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-9">
                              <input type="text" name="" class="form-control">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                              <input type="text" name="" class="form-control">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-3 control-label">Address</label>
                            <div class="col-sm-9">
                              <textarea class="form-control" rows="6"></textarea>
                            </div>
                          </div>

                        </div> -->
                        <!-- <div class="col-md-6">

                          <div class="form-group">
                            <label class="col-sm-3 control-label">Phone</label>
                            <div class="col-sm-9">
                              <input type="text" name="" class="form-control">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-3 control-label">Mobile Phone</label>
                            <div class="col-sm-9">
                              <input type="text" name="" class="form-control">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-3 control-label">Province</label>
                            <div class="col-sm-9">
                              <select class="form-control">
                                <option>Select</option>
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-3 control-label">City</label>
                            <div class="col-sm-9">
                              <input type="text" name="" class="form-control">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-3 control-label">ZIP Code</label>
                            <div class="col-sm-9">
                              <input type="text" name="" class="form-control">
                            </div>
                          </div> -->

                       <!--  </div>
                      </div>
                    </div>
                  </div>
                </div> --><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col (left) -->
          </div><!-- /.row -->

          <div class="row">
            <div class="col-md-12">
              <!-- <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Add Promo</h3>
                </div>
                <div class="box-body">
                  <div class="box-body">
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
                        </div> --><!-- /.form group -->
                      <!-- </div> -->

                      <!-- <div class="col-md-3">
                        <div class="form-group">
                          <label>Price</label>
                          <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Rp.</span>
                            <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                          </div>
                        </div> /.form group -->
                      <!-- </div> --> 

                      <!-- <div class="col-md-3">
                        <div class="form-group">
                          <label>Discount</label>
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                            <span class="input-group-addon" id="basic-addon1">%</span>
                          </div>
                        </div> --><!-- /.form group -->
                      <!-- </div> -->

                      <!-- <div class="col-md-3">
                        <div class="form-group">
                          <label>Price After Discount</label>
                          <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Rp.</span>
                            <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                          </div>
                        </div> --><!-- /.form group -->
                      <!-- </div>
                    </div>
                  </div>
                </div> --><!-- /.box-body -->

                
              </div><!-- /.box -->
            </div><!-- /.col (left) -->
          </div><!-- /.row -->

        </section><!-- /.content -->
        <script type="text/javascript">
            $(document).ready(function(){
                $('.tanggal').datepicker({
                  dateFormat:"yy-mm-dd"
                });
            });
        </script>
@stop      