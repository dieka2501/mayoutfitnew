@extends('template')
@section('content')
<?php //var_dump(Session::all())?>
<!-- Content Header (Page header) -->
<section class="content-header clearfix">
  <h1>
    
    <b>Event</b>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Events</a></li>
    
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <!-- SELECT2 EXAMPLE -->
  <div class="box box-default">
    <div class="box-header with-border">
      
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
      </div>
    </div><!-- /.box-header -->
    {!!Form::open(array('url'=>$url,'method'=>'POST','files'=>true))!!}
    <div class="box-body">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label>Nama Event</label>
            <input type="text" class="form-control" id='event_name' name='event_name' value='{!!$event_name!!}' required="required">
            <input type="hidden" class="form-control" id='ids' name='ids' value='{!!$id_event!!}'>
          </div><!-- /.form-group -->
          <div class="form-group">
            <label>Date Event</label>
            <input type="text" class="form-control date" id='event_date' name='event_date' value='{!!$event_date!!}' readonly="readonly" required="required">
          </div><!-- /.form-group -->
          <div class="form-group">
            <label>Content</label>
            <textarea class="textarea form-control" name='event_description'>{{$event_description}}</textarea>
          </div><!-- /.form-group -->
          <div class="form-group">
            <label>Status</label>
            {!!Form::select('event_status',array(1=>'Publish',0=>'Unpublish'),$event_status,array('class'=>'form-control'))!!}
            <!-- <select class="form-control" name='status' id='status'>
              <option value='1'>Publish</option>
              <option value='0'>Unpublish</option>
            </select> -->
          </div>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-success">Submit</button>
      <a href="{{Config::get('app.url')}}public/admin/event" class="btn btn-danger">Back</a>
    </div>
  </div><!-- /.box -->
{!!Form::close()!!}
</section><!-- /.content -->
<script src="{!!config('app.url')!!}assets/dashboard/plugins/tinymce/tinymce.min.js"></script>
<script type="text/javascript">

    tinymce.init({
        selector: "textarea",
        menubar:false,
        plugins: "insertdatetime",
        plugins: "link code fullscreen",
        toolbar: [
            "undo redo | styleselect | bold italic | link | fullscreen | alignleft | aligncenter |  alignright | insertdatetime | link | removeformat | cut copy paste bullist numlist outdent indent code"
        ],
        image_advtab: true ,
        insertdatetime_formats: ["%Y.%m.%d", "%H:%M"],
     });
    $(document).ready(function(){
        $(".date").datepicker({
            'dateFormat':'yy-mm-dd'
        });
    });
</script>
@stop