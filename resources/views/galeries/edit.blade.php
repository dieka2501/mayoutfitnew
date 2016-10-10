@extends('template')
@section('content')
<section class="content">
  <div class="row">
    <div class="col-md-6">
      {!!Form::open(['url'=>$url,'method'=>'POST','files'=>true])!!}
      <div class="box box-danger">
        <div class="box-header">
          <h3 class="box-title">Edit Galery</h3>
        </div>
        {!!$notip!!}
        <div class="box-body">
          <div class="form-group">
            <label>Galery Name</label>
            <input type="text" class="form-control" name='galery_name' id='galery_name' value='{!!$galery_name!!}' required="required">
            <input type='hidden' name='ids' value='{!!$ids!!}'/>
          </div>
          <div class="form-group">
            <label>Galery Picture</label>
            <input type="file" class="form-control" name='galery_image' id='galery_image'>
          </div>
          <div class="form-group">
            <label>Product</label>
            {!!Form::select('product_id',$arr_product,$product_id,['id'=>'product_id','class'=>'form-control','required'=>'required'])!!}
          </div>
        </div>
        <div class="box-footer">
          <a href="{!!config('app.url')!!}public/admin/galeries" class="btn btn-default">Cancel</a>
          <button type="submit" class="btn btn-primary pull-right">Submit</button>
        </div>
      </div>
      {!!Form::close()!!}
    </div>
  </div>
</section>
@stop      