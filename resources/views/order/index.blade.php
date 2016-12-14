@extends('template')
@section('content')
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Order</h3>
                  {!!session('notip')!!}
                  <div class="box-tools pull-right">
                  @if($role != "confirm")
                  <a href="{{Request::url()}}/add">
                    <button class="btn btn-box-tool"><i class="fa fa-plus"></i> <span class="hidden-xs">Create Order</span></button>
                  </a>
                  @endif
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
                  <table id="example" class="table table-bordered ">
                    <thead>
                      <tr>
                        <th>Order ID</th>
                        <th>Order Name</th>
                        <th>Order Phone</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Order Via</th>
                        <th>Action</th>
                        
                      </tr>
                    </thead>
                  <tbody>
                    @foreach($list as $lists)
                      @if($lists->order_system == 'web')
                        <tr bgcolor="#FB7DFF">
                      @else
                        <tr>
                      @endif
                      <td>{!!$lists->order_code!!}</td>
                      <td>{!!$lists->order_name!!}</td>
                      <td>{!!$lists->order_phone!!}</td>
                      <td>{!!number_format($lists->order_total)!!}</td>
                        <?Php
                         if($lists->order_status == 0){
                            $stat = "<span class='label label-warning'>Pending</span>";
                        }elseif($lists->order_status == 1){
                            $stat = "<span class='label label-info'>Payment</span>";
                        }elseif($lists->order_status == 2){
                          $stat = "<span class='label label-success'>Delivered</span>";
                        }elseif($lists->order_status == 3){
                          $stat = "<span class='label label-success'>Done</span>";
                        }else{
                          $stat = "<span class='label label-danger'>Failed</span>";
                        }

                        if($lists->order_is_printed == 1) {
                          $printed = "<span class='label label-success'>Printed</span>";
                        }else{
                          $printed = "";
                        }

                        ?>
                      <td>{!!$stat!!} {!!$printed!!}</td>
                      <td>{!!$lists->order_system!!} </td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-default btn-flat">Action</button>
                          <button type="button" class="btn btn-warning btn-flat dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            @if($role == 'owner' || $role== 'order')
                              <li><a href="{!!config('app.url')!!}public/admin/order/edit/{!!$lists->idorder!!}">Edit</a></li>
                            @endif
                            @if($lists->order_status != 5)
                              @if($role == 'owner' || $role == 'confirm' || $role == 'order')
                                <li><a href="{!!config('app.url')!!}public/admin/order/konfirm/bayar/{!!$lists->idorder!!}">Konfirmasi Bayar</a></li>
                              @endif
                              
                              @if($lists->order_status != 0)
                                @if($role == 'owner' || $role == 'confirm')
                                  <li><a href="{!!config('app.url')!!}public/admin/order/print/{!!$lists->idorder!!}" target="__blank">Print</a></li>
                                  <li><a onclick="modal('{!!$lists->order_code!!}')"  href="#">Cek Status Pengiriman</a></li>
                                @endif
                                @if($role == 'order')
                                  <li><a onclick="modal('{!!$lists->order_code!!}')"  href="#">Cek Status Pengiriman</a></li>
                                @endif
                              @else
                                @if($role == 'owner' || $role == 'confirm')
                                  <li><a href="#" onclick="if(!confirm('Order ini belum dibayar')) return false;">Print</a></li>
                                  <li><a href="#" onclick="if(!confirm('Order ini belum dibayar')) return false;">Cek Status Pengiriman</a></li>
                                @endif

                              @endif
                            @endif
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
                    <th>Order ID</th>
                    <th>Order Name</th>
                    <th>Order Phone</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Order Via</th>
                    <th>Action</th>
                    
                  </tr>
                  </tfoot>
                  </table>
                  <p>{!!$list->appends(['cari'=>$cari])->render()!!}</p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
        <div class="modal fade bs-example-modal-lg" id='MyModal' tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12" style="font-size: 30px;">Tracking Pengiriman Barang</div>
                    </div>
                    <div class="row devider"></div>
                    <div class="row">
                        <div class="col-md-12" id='body-modal'> </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" id='loader' style="left: 340px;
                            margin-top: 40px;
                            margin-bottom: 40px;
                        "><img src="<?php echo config('app.url')?>public/assets/477.GIF"> </div>
                    </div>
                </div>
            </div>
          </div>
        </div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#loader').hide();
        $(this).ajaxStart(function(){
            $('#loader').show();
        }).ajaxStop(function(){
            $('#loader').hide();
        });
    });
      function modal(orderid){
          console.log(orderid);
          $('#body-modal').html("");        
          $.post('<?php echo config("app.url")?>public/api/sicepat/orderid',{
              'orderId':orderid
          },function(data){
              var html = "";
              console.log(data);
              if(data.sicepat.status.code == 200){
                  var resi = data.sicepat.result.waybill_number;
                  $.post('<?php echo config("app.url")?>public/api/sicepat/resi',{
                      'resi':resi
                  },function(resi){
                      console.log(resi);
                      if(resi.sicepat.status.code == 200){
                          var title   = "";
                          var count   = resi.sicepat.result.track_history.length;
                          html += "<table border='0' style='width: 75%;' class='table table-bordered'>"+
                                      "<tr>"+
                                          "<td><strong>Penerima</strong></td>"+
                                          "<td>"+resi.sicepat.result.receiver_name+"</td>"+
                                      "</tr>"+
                                      "<tr>"+
                                          "<td><strong>Alamat Penerima </strong></td>"+
                                          "<td>"+resi.sicepat.result.receiver_address+"</td>"+
                                      "</tr>"+
                                      "<tr>"+
                                          "<td><strong>Pengirim</strong></td>"+
                                          "<td>"+resi.sicepat.result.sender+"</td>"+
                                      "</tr>"+
                                      "<tr>"+
                                          "<td><strong>Alamat Pengirim</strong></td>"+
                                          "<td>"+resi.sicepat.result.sender_address+"</td>"+
                                      "</tr>"+
                                      "<tr>"+
                                          "<td><strong>Tanggal Dikirim</strong></td>"+
                                          "<td>"+resi.sicepat.result.send_date+"</td>"+
                                      "</tr>"+
                                      "<tr>"+
                                          "<td><strong>Service</strong></td>"+
                                          "<td>"+resi.sicepat.result.service+"</td>"+
                                        "</tr>"+
                                "</table>";
                                html += "<p style='width: 75%;margin-top:30px; margin-bottom:10px; font-size:15px;'><b>Status Pengiriman</b></p>";
                                html +="<table style='width: 75%;margin-bottom:30px;' class='table table-bordered'>" +
                                      "<tr>"+
                                          "<th>Kota</th>"+
                                          "<th>Tanggal</th>"+
                                          "<th>Status</th>"+
                                      "</tr>";
                                      for (var i = 0; count > i; i++) {
                                          
                                         html +="<tr>"+
                                            "<td>"+resi.sicepat.result.track_history[i].city+"</td>"+
                                            "<td>"+resi.sicepat.result.track_history[i].date_time+"</td>"+
                                            "<td>"+resi.sicepat.result.track_history[i].status+"</td>"+
                                          "</tr>";

                                      };
                                    html +="<table>";
                                     $('#body-modal').html(html);
                                     // $('#MyModal').modal('show');
                      }else{
                          html = "<div class='alert alert-danger' style='width:850px'>Data Tracking Tidak Ada</div>";
                          $('#body-modal').html(html);        
                          // $('#MyModal').modal('show');
                      }

                  });
              }else{
                html = "<div class='alert alert-danger' style='width:850px'>"+data.sicepat.status.description+"</div>";
                $('#body-modal').html(html);
                // $('#MyModal').modal('show');            
              }
              
          });
          
  
          $('#MyModal').modal('show');
      }
  </script>
@stop        