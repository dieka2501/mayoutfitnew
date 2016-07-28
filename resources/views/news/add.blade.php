@extends('template')
@section('content')
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-danger">
                <div class="box-header">
                  <h3 class="box-title">News &amp; Events Add</h3>
                </div>
                <div class="box-body">
                  <div class="box-body">
                    <div class="row">
                      <div class="form-horizontal">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="col-sm-3 control-label">ID</label>
                            <div class="col-sm-9">
                              <input type="text" name="" class="form-control" disabled="disabled" value="1202">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-3 control-label">Title</label>
                            <div class="col-sm-9">
                              <input type="text" name="" class="form-control">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-3 control-label">Picture</label>
                            <div class="col-sm-9">
                              <input type="file" name="" class="form-control">
                            </div>
                          </div>

                        </div>
                        <div class="col-md-6">

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
                            <label class="col-sm-3 control-label">Type</label>
                            <div class="col-sm-9">
                              <select class="form-control">
                                <option>News</option>
                                <option>Events</option>
                              </select>
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

          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
                <div class="box-body">
                <label class="control-label">Product Description</label>
                  <div>
                    <textarea id="editor1" name="editor1" rows="10" cols="80"></textarea>
                  </div>
                </div>
              </div><!-- /.box -->
            </div>
          </div>

        </section><!-- /.content -->
@stop      