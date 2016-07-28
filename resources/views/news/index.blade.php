@extends('template')
@section('content')
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data News &amp; Events</h3>
                  <div class="box-tools pull-right">
                  <a href="{{Request::url()}}/add">
                    <button class="btn btn-box-tool"><i class="fa fa-plus"></i> <span class="hidden-xs">Add News &amp; Events</span></button>
                  </a>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                      <th>Sample Header</th>
                      <th>Sample Header</th>
                      <th>Sample Header</th>
                      <th>Action</th>
                      </tr>
                    </thead>
                  <tbody>
                    <tr>
                      <td>Sample Data</td>
                      <td>Sample Data</td>
                      <td>Sample Data</td>
                      <td style="width:150px;">
                        <a href="{{Request::url()}}/edit" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                        <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Delete</a>
                      </td>
                    </tr>
                    <tr>
                      <td>Sample Data</td>
                      <td>Sample Data</td>
                      <td>Sample Data</td>
                      <td style="width:150px;">
                        <a href="{{Request::url()}}/edit" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                        <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Delete</a>
                      </td>
                    </tr>
                    <tr>
                      <td>Sample Data</td>
                      <td>Sample Data</td>
                      <td>Sample Data</td>
                      <td style="width:150px;">
                        <a href="{{Request::url()}}/edit" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                        <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Delete</a>
                      </td>
                    </tr>
                    <tr>
                      <td>Sample Data</td>
                      <td>Sample Data</td>
                      <td>Sample Data</td>
                      <td style="width:150px;">
                        <a href="{{Request::url()}}/edit" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                        <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Delete</a>
                      </td>
                    </tr>
                    <tr>
                      <td>Sample Data</td>
                      <td>Sample Data</td>
                      <td>Sample Data</td>
                      <td style="width:150px;">
                        <a href="{{Request::url()}}/edit" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                        <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Delete</a>
                      </td>
                    </tr>
                    <tr>
                      <td>Sample Data</td>
                      <td>Sample Data</td>
                      <td>Sample Data</td>
                      <td style="width:150px;">
                        <a href="{{Request::url()}}/edit" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                        <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Delete</a>
                      </td>
                    </tr>
                    <tr>
                      <td>Sample Data</td>
                      <td>Sample Data</td>
                      <td>Sample Data</td>
                      <td style="width:150px;">
                        <a href="{{Request::url()}}/edit" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                        <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Delete</a>
                      </td>
                    </tr>
                    <tr>
                      <td>Sample Data</td>
                      <td>Sample Data</td>
                      <td>Sample Data</td>
                      <td style="width:150px;">
                        <a href="{{Request::url()}}/edit" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                        <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Delete</a>
                      </td>
                    </tr>
                    <tr>
                      <td>Sample Data</td>
                      <td>Sample Data</td>
                      <td>Sample Data</td>
                      <td style="width:150px;">
                        <a href="{{Request::url()}}/edit" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                        <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Delete</a>
                      </td>
                    </tr>
                    <tr>
                      <td>Sample Data</td>
                      <td>Sample Data</td>
                      <td>Sample Data</td>
                      <td style="width:150px;">
                        <a href="{{Request::url()}}/edit" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                        <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Delete</a>
                      </td>
                    </tr>
                    <tr>
                      <td>Sample Data</td>
                      <td>Sample Data</td>
                      <td>Sample Data</td>
                      <td style="width:150px;">
                        <a href="{{Request::url()}}/edit" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                        <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Delete</a>
                      </td>
                    </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Sample Footer</th>
                  <th>Sample Footer</th>
                  <th>Sample Footer</th>
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