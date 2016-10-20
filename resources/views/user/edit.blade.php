@extends('template')
@section('content')
<section class="content">
  <div class="row">
    <div class="col-md-6">
      {!!Form::open(['url'=>$url,'method'=>'POST','files'=>true])!!}
        <div class="box box-danger">
          <div class="box-header">
              <h3 class="box-title">Edit User</h3>
          </div>
          {!!$notip!!}
          <div class="box-body">
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name='username' id='username' value='{!!$username!!}' required="required">
                <input type='hidden' name='iduser' value='{!!$iduser!!}'/>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name='password' id='password' value='{!!$password!!}' required="required">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name='email' id='email' value='{!!$email!!}' required="required">
              </div>
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name='name' id='name' value='{!!$name!!}' required="required">
              </div>
              <div class="form-group">
                <label>Role</label>
                {!! Form::select('role', [
                   '' => '-- Select Role --',
                   'owner' => 'Owner',
                   'order' => 'Order',
                   'confirm' => 'Confirm'],
                   $role,
                   ['class'=>'form-control','required'=>'required']
                ) !!}
              </div>
          </div>
          <div class="box-footer">
            <a href="{!!config('app.url')!!}public/admin/user" class="btn btn-default">Cancel</a>
              <button type="submit" class="btn btn-primary pull-right">Submit</button>
          </div>
        </div>
      {!!Form::close()!!}
    </div>
  </div>
</section>
@stop      