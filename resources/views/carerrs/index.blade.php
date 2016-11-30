@extends('template')
@section('content')
<script src="{!!config('app.url')!!}assets/dashboard/plugins/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
  tinymce.init({
    selector : "textarea",
    plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste"],
    toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    height : "250"  
  }); 
</script>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">CARERRS</h3>
          {!!session('notip')!!}
        </div>
        <div class="box-body">
        	<div class="row">
        		{!!Form::open(['url'=>$url,'method'=>'POST','files'=>true])!!}
	    			<div class="col-md-12">
	                    <textarea class='tinymce' name="carerrs_content" id="carerrs_content">{!!$data->carerrs_content!!}</textarea>
		    			<div class="box-footer">
		              		<button type="submit" class="btn btn-primary pull-right">Submit</button>
		          		</div>
	    			</div>
	          	{!!Form::close()!!}
    		</div>
        </div>
      </div>
    </div>
  </div>
</section>
@stop