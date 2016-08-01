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
                  <a href="{!!config('app.url')!!}public/admin/product/add">
                    <button class="btn btn-box-tool"><i class="fa fa-plus"></i> <span class="hidden-xs">Add Product</span></button>
                  </a>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Product Name</th>
                        <th>Product Code</th>
                        <th>Category</th>
                        <th>Product Price</th>
                        <th>Product Margin</th>
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
                      <td>{!!$lists->category_id!!}</td>
                      <td>{!!$lists->product_price!!}</td>
                      <td>{!!$lists->product_price!!}</td>
                      <td style="width:150px;">
                        <a href="{!!config('app.url')!!}public/admin/product/edit/{!!$lists->idproduct!!}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                        <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="{!!config('app.url')!!}public/admin/product/delete/{!!$lists->idproduct!!}" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Delete</a>
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
                    <th>Action</th>
                  </tr>
                  </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              {!!$list->render()!!}
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
@stop        