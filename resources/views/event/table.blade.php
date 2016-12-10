@extends('admin.template')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header clearfix">
  <h1>
    {{$big_title}}
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb" style="padding-top:0px;margin-top:-5px">
    <li><a class="btn btn-warning" href="{{Config::get('app.url')}}public/admin/news/create"><i class="fa fa-plus"></i> Create News</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- Main row -->
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">{{$big_title}}</h3>
          <div class="box-tools">
            <div class="input-group" style="width: 150px;">
              <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
              <div class="input-group-btn">
                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
        </div><!-- /.box-header -->
        {{$notip}}
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tbody><tr>
              <th>ID</th>
              <th>Title</th>
              <th>Content</th>
              <th>Date</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
            @foreach($get_data as $datas)
            <?php 
                $stat = ($datas->news_status == 1)?'Active':'Not Active';
                $statcss = ($datas->news_status == 1)?'label-primary':'label-warning';
            ?>
            <tr>
              <td>{{$datas->id_news}}</td>
              <td>{{$datas->news_title}}</td>
              <td>{{str_limit(strip_tags($datas->news_content),100,'...')}}</td>
              <td>{{$datas->date_insert}}</td>
              <td><span class="label {{$statcss}}">{{$stat}}</span></td>
              <td>
              <a class="btn btn-sm btn-success" href="{{Config::get('app.url')}}public/admin/news/edit/{{$datas->id_news}}">Edit</a> 
              <a class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')" href="{{Config::get('app.url')}}public/admin/news/delete/{{$datas->id_news}}">Delete</a>
              </td>
            </tr>
            @endforeach
          </tbody></table>
          {{$get_data->links()}}
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
  </div>

</section><!-- /.content -->

@stop