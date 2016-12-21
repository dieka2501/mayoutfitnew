@extends('template')
@section('content')
<section class="content">
  <div class="row">
    <div class="col-md-6">
      {!!Form::open(['url'=>$url,'method'=>'POST','files'=>true])!!}
        <div class="box box-danger">
          <div class="box-header">
              <h3 class="box-title">Add Member Type</h3>
          </div>
          {!!$notip!!}
          <div class="box-body">
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name='membertype_name' id='membertype_name' value='{!!$membertype_name!!}' required="required">
              </div>
              <div class="form-group">
                <label>Type Discount</label>
                {!!Form::select('membertype_disc_type',['nominal'=>"Nominal",'persen'=>'Persen'],$membertype_disc_type,['class'=>'form-control'])!!}
              </div>
              <div class="form-group">
                <label>Discount</label>
                <input type="text" class="form-control" name='membertype_discount' id='membertype_discount' value='{!!$membertype_discount!!}' required="required" placeholder="">
              </div>
              
              <div class="form-group">
                <label>Status</label>
                {!! Form::select('membertype_status', [
                   '' => '-- Select Status --',
                   '1' => 'Active',
                   '2' => 'Non Active'],
                   $membertype_status,
                   ['class'=>'form-control','required'=>'required']
                ) !!}
              </div>
          </div>
          <div class="box-footer">
            <a href="{!!config('app.url')!!}public/admin/membertype" class="btn btn-default">Cancel</a>
              <button type="submit" class="btn btn-primary pull-right">Submit</button>
          </div>
        </div>
      {!!Form::close()!!}
    </div>
  </div>
</section>
@stop      