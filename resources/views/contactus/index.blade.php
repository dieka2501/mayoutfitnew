@extends('template')
@section('content')
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Contact Us</h3>
                  {!!session('notip')!!}
                </div><!-- /.box-header -->
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
                        <th>Name</th>
                        <th>Email</th>
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
                      <td>{!!$lists->contactus_nama!!}</td>
                      <td>{!!$lists->contactus_email!!}</td>
                      <td style="width:150px;">
                        <a href="{!!config('app.url')!!}public/admin/contactus/view/{!!$lists->contactus_id!!}" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i> View</a>
                        
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                  </tr>
                  </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              {!!$list->appends(['cari'=>$cari])->render()!!}
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
@stop        