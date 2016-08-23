@extends('template')
@section('content')
        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-6">

              <div class="box box-danger">
                <div class="box-header">
                  <h3 class="box-title">Add Brand</h3>
                </div>
                <div class="box-body">
                  <div class="form-group">
                    <label>Brand Name</label>
                    <input type="text" class="form-control">
                  </div><!-- /.form group -->

                  <div class="form-group">
                    <label>Brand Picture</label>
                    <input type="file" class="form-control">
                  </div><!-- /.form group -->

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