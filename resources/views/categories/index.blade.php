@extends('template')
@section('content')
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Categories</h3>
                  {!!$notip!!}
                  <div class="box-tools pull-right">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                  <a href="{{Request::url()}}/add">
                    <button class="btn btn-box-tool"><i class="fa fa-plus"></i> <span class="hidden-xs">Add Categories</span></button>
                  </a>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example" class="table table-bordered table-striped table-hover">
                    <thead>
                      <tr>
                      <th>No</th>
                      <th>Category Name</th>
                      <th>Action</th>
                      </tr>
                    </thead>
                  <tbody>
                   <?php $i = 0;
                      if(Input::has('page')){
                        $haspage = Input::get('page');
                      }else{
                        $haspage = 1;
                      }
                        $num = 20 * ($haspage-1);
                    // if((Input::get('page') =='1')){
                    //         $i=0;   
                    //     }else{
                            
                    //     }
                      

                  ?>
                  @foreach($list as $lists)
                          <?php 
                            $i++;
                            $nums = $num +$i 
                          ?>
                    <tr>
                      <td>{!!$nums!!}</td>
                      
                      <td>{!!$lists->category_name!!}</td>
                      <td style="width:150px;">
                        <a href="{!!config('app.url')!!}public/admin/categories/edit/{!!$lists->idcategory!!}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                        <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="{!!config('app.url')!!}public/admin/categories/delete/{!!$lists->idcategory!!}" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Delete</a>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>No</th>
                  <th>Category Name</th>
                  <th>Action</th>
                  </tr>
                  </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
@stop        