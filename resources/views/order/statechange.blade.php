@extends('template')
@section('content')
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Change State Order</h3>
                  {!!session('notip')!!}
                  <div class="box-tools pull-right">
                  
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="container">
                      {!!Form::open(['url'=>$url,'method'=>'POST'])!!}
                      <div class='row'>
                        <div class="col-md-10">
                            <p> Kode Order : {!!$order_code!!}</p>
                            <?php 

                                if($order_status == 0){
                                    $stat = "<span class='label label-warning'>Pending</span>";
                                }elseif($order_status == 1){
                                    $stat = "<span class='label label-info'>Payment</span>";
                                }elseif($order_status == 2){
                                  $stat = "<span class='label label-success'>Delivered</span>";
                                }elseif($order_status == 3){
                                  $stat = "<span class='label label-success'>Done</span>";
                                }else{
                                  $stat = "<span class='label label-danger'>Failed</span>";
                                }
                            ?>
                            <p> Status Order : {!!$stat!!}</p>
                        
                        </div>
                      </div>
                        <div class='row'>
                            <div class="col-md-5">

                                {!!Form::select("change",['0'=>"Pending",'5'=>"Gagal"],'',['class'=>'form-control'])!!}
                                <input type="hidden" name="_token"  value="{!!csrf_token()!!}">
                                <input type="hidden" name="idorder"  value="{!!$idorder!!}">
                            </div>
                            <div class="col-md-4">
                                
                            </div>
                        </div>
                        <div class='row'>
                            <div class="col-md-5">
                                <a href='{!!config("app.url")!!}public/admin/order' class='btn btn-danger'>Back</a>
                            </div>
                            <div class="col-md-5 ">
                                <button class="btn btn-success" type='submit'>Change</button>
                            </div>
                        </div>
                      
                      {!!Form::close()!!}
                      
                    </div>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
@stop        