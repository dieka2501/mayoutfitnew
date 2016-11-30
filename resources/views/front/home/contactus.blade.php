@extends('front.home')
@section('content')
<section id="featured-products">
	<div class="container">
    	<div class="row clearfix">
	    	<section class="content-header">
	          <h1>
	            Contact Us
	          </h1>
	          <br/>
	        </section>
			{!!session('notip')!!}
        	{!!Form::open(['url'=>$url,'method'=>'POST','files'=>true])!!}
        		<section class="content">
					<div class="row">
            			<div class="col-md-6">
            				<div class="box box-danger">
            					<div class="form-horizontal">
            						<div class="form-group">
				                    	<label class="col-sm-3 control-label">Name</label>
					                    <div class="col-sm-9">
					                    	<input type="text" class="form-control"  name="contactus_nama" id="contactus_nama" value="{!!$contactus_nama!!}" required="required">
					                    </div>
				                    </div>
				                    <div class="form-group">
				                    	<label class="col-sm-3 control-label">Email</label>
					                    <div class="col-sm-9">
					                    	<input type="email" class="form-control"  name="contactus_email" id="contactus_email" value="{!!$contactus_email!!}" required="required">
					                    </div>
				                    </div>
				                    <div class="form-group">
				                    	<label class="col-sm-3 control-label">Message</label>
					                	<div class="col-sm-9">
					                    	<textarea id="contactus_pesan" rows="10" cols="80" name="contactus_pesan" required="required">{!!$contactus_pesan!!}</textarea>
					                  	</div>
				                    </div>
				                    <div class="box-footer">
					                  <button type="submit" class="btn btn-primary pull-right">Send Message</button>
					                </div>
            					</div>
            				</div>
            			</div>
            		</div>
            	</section>
        	{!!Form::close()!!}
		</div>
  	</div>
</section>
@stop