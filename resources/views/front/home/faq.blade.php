@extends('front.home')
@section('content')
<section id="featured-products">
	<div class="container">
    	<div class="row clearfix">
			{!!$data->faq_content!!}
		</div>
  	</div>
</section>
@stop