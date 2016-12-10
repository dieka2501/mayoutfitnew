@extends('template')
@section('content')
	<header class="page-header">
		<h2>News &amp; Events</h2>
	</header>

	<!-- start: page -->
		<section class="panel">
			<header class="panel-heading">
				<div class="panel-actions">
					<a href="<?php echo Config::get('app.url');?>public/admin/event/add" class="btn btn-default btn-sm"><i class="fa fa-plus"></i> Add data</a>
				</div>
		
				<h2 class="panel-title">Data News &amp; Events</h2>
			</header>
			<div class="panel-body">
				{{$notip}}
				<table class="table table-bordered table-striped mb-none" id="">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name Event</th>
							<th>Event Desciption</th>
							<th>Date</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($data as $datas)
						<tr class="gradeX">
							<td>{!!$datas->id_event!!}</td>
							<td>{!!$datas->event_name!!}</td>
							<td>{!!$datas->event_description!!}</td>
							<td>{!!$datas->event_date!!}</td>
							<?php $stat = ($datas->event_status == 1)?"Aktif":'Tidak Aktif'?>
							<td>{!!$stat!!}</td>
							<td><a href='{!!config("app.url")!!}public/admin/event/edit/{!!$datas->id_event!!}' class="btn btn-default btn-xs"><i class=" fa fa-edit"></i> Edit</a>
							<a href='{!!config("app.url")!!}public/admin/event/delete/{!!$datas->id_event!!}' class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda Yakin?')"><i class=" fa fa-trash"></i> Delete</a>
							</td>
						</tr>
						@endforeach
						<!-- <tr class="gradeC">
							<td><input type="checkbox"></td>
							<td>2</td>
							<td>Sample name</td>
							<td><button class="btn btn-default btn-xs"><i class=" fa fa-edit"></i> Edit</button></td>
						</tr>
						<tr class="gradeA">
							<td><input type="checkbox"></td>
							<td>3</td>
							<td>Sample name</td>
							<td><button class="btn btn-default btn-xs"><i class=" fa fa-edit"></i> Edit</button></td>
						</tr>
						<tr class="gradeA">
							<td><input type="checkbox"></td>
							<td>4</td>
							<td>Sample name</td>
							<td><button class="btn btn-default btn-xs"><i class=" fa fa-edit"></i> Edit</button></td>
						</tr> -->
					</tbody>
				</table>
			</div>
		</section>
		
	<!-- end: page -->
@stop