@extends('template')
@section('content')
        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-6">
              {!!Form::open(['url'=>$url,'method'=>'POST','files'=>true])!!}
              <div class="box box-danger">
                <div class="box-header">
                  <h3 class="box-title">Edit Categories</h3>
                </div>
                 {!!$notip!!}
                <div class="box-body">
                  <div class="form-group">
                    <label>Categories Name</label>
                    <input type="text" class="form-control" name='category_name' id='category_name' value='{!!$category_name!!}' required="required">
                    <input type='hidden' name='ids' value='{!!$id!!}'/>
                  </div><!-- /.form group -->

                  <div class="form-group">
                    <label>Categories Picture</label>
                    <p><img src="{!!config('app.url')!!}public/upload/{!!$category_image!!}" height="100" ></p>
                    <input type="file" class="form-control" name='category_image' id='category_image'>
                  </div><!-- /.form group -->

                </div><!-- /.box-body -->
                <div class="box-footer">
                  <a href="{!!config('app.url')!!}public/admin/categories" class="btn btn-default">Cancel</a>
                  <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
              </div><!-- /.box -->
              {!!Form::close()!!}
            </div><!-- /.col (left) -->
          </div><!-- /.row -->

        </section><!-- /.content -->
@stop      