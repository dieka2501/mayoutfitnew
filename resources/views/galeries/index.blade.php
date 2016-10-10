@extends('template')
@section('content')
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
        		<div class="box-header">
        			<h3 class="box-title">Data Galery</h3>
	        		{!!session('notip')!!}
	        		<div class="box-tools pull-right">
        				<a href="{!!config('app.url')!!}public/admin/galeries/add">
            				<button class="btn btn-box-tool"><i class="fa fa-plus"></i> <span class="hidden-xs">Add Gallery<span></button>
            			</a>
            		</div>
        		</div>
        		<div class="box-body">
                	<div class="container">
                		{!!Form::open(['url'=>$url,'method'=>'GET'])!!}
                        	<div class='row'>
                            	<div class="col-md-5">
                                	<input type="text" name="cari" id='cari' class="form-control" placeholder="Masukan Kata Kunci" value="{!!$cari!!}">
                            	</div>
                            	<div class="col-md-5">
                                	<button class="btn btn-box-tool" type='submit'><i class="fa fa-search"></i> <span class="hidden-xs">Search</span></button>
                            	</div>
                        	</div>                      
                      	{!!Form::close()!!}
                	</div>
                	<table id="example" class="table table-bordered table-striped">
                    	<thead>
                      		<tr>
		                        <th>No</th>
		                        <th>Picture</th>
		                        <th>Galery Name</th>
		                        <th>Product</th>
		                        <th>Category</th>
		                        <th>Action</th>
                      		</tr>
                    	</thead>
                  		<tbody>
	                  		<?php 
			                  	$i = 0;
			                    if(Input::has('page')){
			                        $haspage = Input::get('page');
			                    }else{
			                    	$haspage = 1;
			                    }
			                    	$num = 20 * ($haspage-1);
			                ?>
			              	@foreach($list as $lists)
		                    <?php 
	                            $i++;
	                            $nums = $num +$i 
		                    ?>
			                    <tr>
			                      <td>{!!$nums!!}</td>
			                      <td><img src="{!!config('app.url')!!}public/upload/{!!$lists->galery_image!!}" height="100" width="100"></td>
			                      <td>{!!$lists->galery_name!!}</td>
			                      <td>{!!$lists->product_name!!}</td>
			                      <td>{!!$lists->category_name!!}</td>	
			                      <td style="width:150px;">
			                        <a href="{!!config('app.url')!!}public/admin/galeries/edit/{!!$lists->id_galery!!}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
			                        <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="{!!config('app.url')!!}public/admin/galeries/delete/{!!$lists->id_galery!!}" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Delete</a>
			                      </td>
			                    </tr>
		                  	@endforeach
                  		</tbody>
                  		<tfoot>
		                	<tr>
			                    <th>No</th>
		                        <th>Galery Name</th>
		                        <th>Product</th>
		                        <th>Category</th>
		                        <th>Action</th>
		                  	</tr>
		                </tfoot>
                  	</table>
               	</div>
      		</div>
      		{!!$list->appends(['cari'=>$cari])->render()!!}
    	</div>
  	</div>
</section>
@stop()