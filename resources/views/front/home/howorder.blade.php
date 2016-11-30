@extends('front.home')
@section('content')
<section id="featured-products">
	<div class="container">
    	<div class="row clearfix">
			{!!$data->how_order_content!!}
		</div>
  	</div>
</section>
@stop