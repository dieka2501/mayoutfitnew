@extends('template')
@section('content')
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">HOW TO ORDER</h3>
          {!!session('notip')!!}
        </div>
        <div class="box-body">
        	<div class="row">
        		{!!Form::open(['url'=>$url,'method'=>'POST','files'=>true])!!}
	    			<div class="col-md-12">
	                    <textarea name="how_order_content" id="how_order_content" rows="10" cols="80">{!!$data->how_order_content!!}</textarea>
	                    <script>
			                CKEDITOR.replace( 'how_order_content', {
									height: 300,
						
									// Configure your file manager integration. This example uses CKFinder 3 for PHP.
									filebrowserBrowseUrl: '{!!config('app.url')!!}assets/dashboard/plugins/ckfinder/ckfinder.html',
									filebrowserImageBrowseUrl: '{!!config('app.url')!!}assets/dashboard/plugins/ckfinder/ckfinder.html?type=Images',
									filebrowserUploadUrl: '{!!config('app.url')!!}assets/dashboard/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
									filebrowserImageUploadUrl: '{!!config('app.url')!!}assets/dashboard/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
								} );
			            </script>
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