@extends('template')
@section('content')
<script type="text/javascript">
function isDecimal(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;                
    if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
    {
        return false;
    }                
    return true;
}
</script>
<section class="content">
  <div class="row">
    <div class="col-md-6">
      {!!Form::open(['url'=>$url,'method'=>'POST','files'=>true])!!}
        <div class="box box-danger">
          <div class="box-header">
              <h3 class="box-title">Add Voucher</h3>
          </div>
          {!!$notip!!}
          <div class="box-body">
              <div class="form-group">
                <label>Voucher Code</label>
                <input type="text" class="form-control" name='voucher_code' id='voucher_code' value='{!!$voucher_code!!}' required="required">
              </div>
              <div class="form-group">
                <label>Discount</label>
                <input type="text" class="form-control" name='voucher_discount' id='voucher_discount' value='{!!$voucher_discount!!}' required="required" onkeypress="return isDecimal(event)">
              </div>
              <div class="form-group">
                <label>Type</label>
                {!! Form::select('voucher_type', [
                   '' => '-- Select Type --',
                   'nominal' => 'Nominal',
                   'persen' => 'Persen'],
                   $voucher_type,
                   ['class'=>'form-control','required'=>'required']
                ) !!}
              </div>
              <div class="form-group">
                <label>Status</label>
                {!! Form::select('voucher_status', [
                   '' => '-- Select Status --',
                   '1' => 'Active',
                   '2' => 'Non Active'],
                   $voucher_status,
                   ['class'=>'form-control','required'=>'required']
                ) !!}
              </div>
          </div>
              
          </div>
          <div class="box-footer">
            <a href="{!!config('app.url')!!}public/admin/voucher" class="btn btn-default">Cancel</a>
              <button type="submit" class="btn btn-primary pull-right">Submit</button>
          </div>
        </div>
      {!!Form::close()!!}
    </div>
  </div>
</section>
@stop      