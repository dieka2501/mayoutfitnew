@extends('template')
@section('content')
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Product</h3>
                  {!!session('notip')!!}
                  <div class="box-tools pull-right">
                  <!-- <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div> -->
                  <a href="{!!config('app.url')!!}public/admin/product/add">
                    <button class="btn btn-box-tool"><i class="fa fa-plus"></i> <span class="hidden-xs">Add Product</span></button>
                  </a>
                  </div>
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
                        <th>Product Name</th>
                        <th>Product Code</th>
                        <th>Category</th>
                        <th>Product Price</th>
                        <th>Product Margin</th>
                        <th>QTY</th>
                        <th>Status</th>
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
                      <td>{!!$lists->product_name!!}</td>
                      <td>{!!$lists->product_code!!}</td>
                      <td>{!!$lists->category_name!!}</td>
                      <td>{!!$lists->product_price!!}</td>
                      <td>{!!$lists->product_margin!!}</td>
                      <td>{!!$lists->product_stock!!}</td>
                      <?php 
                        $stat = ($lists->product_status ==1)?'Aktif':"Tidak Aktif";
                      ?>
                      <td>{!!$stat!!}</td>
                      <td style="width:150px;">
                        
                        
                        

                        <div class="btn-group">
                          <button type="button" class="btn btn-default btn-flat">Action</button>
                          <button type="button" class="btn btn-warning btn-flat dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="{!!config('app.url')!!}public/admin/product/stock/add/{!!$lists->idproduct!!}" ><i class="fa fa-plus"></i> Add Stock</a></li>
                            <li><a href="{!!config('app.url')!!}public/admin/product/stock/min/{!!$lists->idproduct!!}" ><i class="fa fa-minus"></i> Less Stock</a></li>
                            <li><a href="{!!config('app.url')!!}public/admin/product/edit/{!!$lists->idproduct!!}" ><i class="fa fa-pencil"></i> Edit</a></li>
                            <li><a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="{!!config('app.url')!!}public/admin/product/delete/{!!$lists->idproduct!!}" ><i class="fa fa-times"></i> Delete</a></li>
                            
                                
                            <!-- <li class="divider"></li>
                            <li><a href="#">Separated link</a></li> -->
                          </ul>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Product Name</th>
                    <th>Product Code</th>
                    <th>Category</th>
                    <th>Product Price</th>
                    <th>Product Margin</th>
                    <th>Status</th>
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