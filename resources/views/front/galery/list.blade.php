@extends('front.home')
@section('content')
    <div  id="products-wrap" class="container">
        <div class="listing-top-nav clearfix">
            <h1 class="heading-title-category">Galery</h1>
            <div class="row clearfix">                
                <div class="listing-sort col-md-4">
                    <label>Sort By</label>
                    {!!Form::select('sort_name',['terbaru'=>'Terbaru','az'=>'A-Z'],$sort_name,['class'=>'form-control','id'=>'sort_name'])!!}
                </div>
                <div class="col-md-4 results"></div>
                <div class="listing-pagination col-md-4">
                    {!!$list->appends(['sort'=>$sort,'order'=>$order,'sort_name'=>$sort_name])->render()!!}
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12">
                <section class="listing-items clearfix">
                @foreach($list as $lists)
                    <article class="listing-item">
                        <div class="listing-item-image">
                            <a href="{!!config('app.url')!!}public/product/detail/{!!$lists->product_id!!}">
                                <img src="{{Config::get('app.url')}}public/upload/{!!$lists->galery_image!!}" alt="Mayoutfit">
                            </a>
                        </div>
                        <a href="{!!config('app.url')!!}public/product/detail/{!!$lists->product_id!!}">
                            <h5 class="listing-item-content-brand">{!!$lists->product_code!!}</h5>
                            <div class="clearfix"></div>
                            <p class="listing-item-content-description">{!!$lists->galery_name!!}</p>
                        </a>
                    </article>
                @endforeach
                </section>
            </div>
    </div>
    {!!$list->appends(['sort'=>$sort,'order'=>$order,'sort_name'=>$sort_name])->render()!!}
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#sort_name').change(function(){
                var sort_name = $(this).val();
            });
        });
    </script>
@stop