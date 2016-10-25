@extends('template')
@section('content')
<section class="content">
  <div class="row">
    <div class="col-md-6">
      {!!Form::open(['url'=>$url,'method'=>'POST','files'=>true])!!}
        <div class="box box-danger">
          <div class="box-header">
              <h3 class="box-title">Edit Customer</h3>
          </div>
          {!!$notip!!}
          <div class="box-body">
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name='customer_name' id='customer_name' value='{!!$customer_name!!}' required="required" readonly="readonly">
                <input type='hidden' name='idcustomer' value='{!!$idcustomer!!}'/>
              </div>
              <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name='customer_address' id='customer_address' value='{!!$customer_address!!}' required="required" readonly="readonly">              
              </div>
              <div class="form-group">
                <label>City</label>
                <input type="text" class="form-control" name='customer_city' id='customer_city' value='{!!$customer_city!!}' required="required" readonly="readonly">
              </div>
              <div class="form-group">
                <label>Member Type</label>
                {!!Form::select('customer_member',
                                  $arr_membertype,
                                  $customer_member,
                                  ['id'=>'customer_member','class'=>'form-control','required'=>'required'])
                !!}
              </div>
          </div>
          <div class="box-footer">
            <a href="{!!config('app.url')!!}public/admin/customer" class="btn btn-default">Cancel</a>
              <button type="submit" class="btn btn-primary pull-right">Submit</button>
          </div>
        </div>
      {!!Form::close()!!}
    </div>
  </div>
</section>
@stop      