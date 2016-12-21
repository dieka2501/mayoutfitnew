<!-- <!DOCTYPE html> -->
<html lang="en">
<head>
  <title>Mayoufit - Print</title>
	<style type="text/css">
    body {
      font-family:"Helvetica Neue", Helvetica, Arial, Verdana, sans-serif;
      -webkit-print-color-adjust:exact;
    }
    .wrapper2 {
      width: 1080px;
      margin: 0 auto;
    }
    .wrapper {
      width: 1100px;
      margin: 0 auto;
      border: 4px double #FFBFDF;
    }
    .header {
      background: #F78DC2;
    }
    .header h3 {
      color: #fff;
      font-size: 22px;
      font-family: "Trebuchet MS","Lucida Grande","Lucida Sans Unicode","Lucida Sans",Tahoma,sans-serif;
      font-weight: bold;
      margin: 0;
      padding: 20px 0px 20px 20px;
    }
    .data-table {
      width: 100%;
      border-collapse: collapse;
      color: #444444;
      font-size: 16px;
      /*font-family: "Franklin Gothic Medium","Franklin Gothic","ITC Franklin Gothic",Arial,sans-serif*/
      font-family: Arial;
    }
    .data-table td {
      padding: 10px;
    }
    .border-top {
        border-top: 1px dotted #F78DC2;
    }
    .border-bottom {
        border-bottom: 1px dotted #F78DC2;
    }
    .border-left {
        border-left: 1px dotted #F78DC2;
    }
    .border-right {
        border-right: 1px dotted #F78DC2;
    }
    .table-wrapper {
      padding: 20px 20px;
    }
    .text-left {
      text-align: left;
    }
    .text-right {
      text-align: right;
      float: right
    }
.left {
      float: left;
    }

    .right {
      float: right;
      font-size: 12px;
      color: #777777;
    }

    .right h2 {
      margin-top: 15px;
      margin-bottom: 0px;
      font-size: 24px;
    }

    .right p {
      margin: 5px 0px;
    }
  </style>
</head>
  
  <body onLoad="window.print()">
    <?php if ($pengirim == false) { ?>
    <div class="wrapper2">
      <div class="row">
        <div class="left">
          <img src="<?php echo config('app.url');?>resources/assets/crop.png" width="120">
        </div>
        <div class="right">
          <h2>MAYOUTFIT</h2>
          <p>Jl.Geger Kalong Hilir, No. 7</p>
          <p><strong>BANDUNG</strong></p>
        </div>
      </div>
    </div>
    <div style="clear:both;"></div>
    <?php } ?>


    <div class="wrapper">

      <div class="header">
          <h3>Thank for Shopping with us</h3>
      </div>
      <div class="table-wrapper">
        <!-- tbody -->
        <table class="data-table">
            <tr>
                <!-- QRCODE -->
              	<td rowspan="4">
                  <?php 
                  // echo $qr;
					         echo QrCode::size(240)->generate($qr);
                  ?>
                </td>
                <!-- END QRCODE -->
                <td style="width:15%;">Penerima <div class="text-right" style="padding-right:10px;font-weight:bold;">:</div></td>
                <td class="border-top border-left border-bottom border-right" style="font-weight:bold"> <?php if (isset($penerima)) {echo $penerima;} else { echo "-";} ?></td>
                <td class="border-top border-bottom border-right"><div style="text-align:center;font-weight:bold;">No. Order : <?php if (isset($order_unik)) {echo $order_unik;} else { echo "-";} ?></div></td>
            </tr>
            <tr>
                <td valign="top">Alamat <div class="text-right" style="padding-right:10px;font-weight:bold;">:</div></td>
                <td valign="top" class="border-left border-right border-bottom" style="height:200px;width:200px;text-align:center;vertical-align:middle;font-weight:bold"><?php if (isset($alamat)) {echo $alamat.', '.$kecamatan.', '.$kota.', '.$provinsi;} else { echo "-";} ?></td>
                <td class="border-right" style="vertical-align:top" width="50px">
                <!-- product -->
                <?php
                // $getid = $id;
                // $i = 1;
                // $querys = DB::table('wp_woocommerce_order_items')->select('*')->where('order_id', $id)->get();
               
                //   foreach ($querys as $key) { 
                //     $qty = DB::table('wp_woocommerce_order_itemmeta')->select('meta_value')->where('order_item_id', $key->order_item_id)->where('meta_key', '_qty')->first();
                //     echo $key->order_item_name." (".$qty->meta_value.")";
                    
                //     // foreach ($qty as $getqty) {
                //     //   echo $getqty->meta_value;
                //     // }
                //   }
                foreach ($detail as $details) {
                    echo $details->product_name. " (".$details->order_detail_qty.")";
                }
                ?>
                
                <!-- end product -->
                </td>
            </tr>
            <tr>
                <td>Tlp <div class="text-right" style="padding-right:10px;font-weight:bold;">:</div></td>
                <td class="border-bottom border-left border-right" style="font-weight:bold"><?php if ($no_hp!="") {echo $no_hp;} else { echo $no_hp_pengirim;} ?></td>
                <td class="border-right"></td>
            </tr>
            <tr>
                <td>Pengirim <div class="text-right" style="padding-right:10px;font-weight:bold;">:</div></td>
                <td class="border-bottom border-left border-right" style="font-weight:bold"><?php if($pengirim == true){echo $pengirim;}else{ echo "Mayoutfit 087822055514";} ?></td>
                <td class="border-top border-bottom border-right">Admin : 
                <?php
                // $no_id = $no_order;
                // $getadmin = DB::table('intern_user')->select('nama')->where('id', $no_order)->groupBy('nama')->get();
                // foreach ($getadmin as $rowadmin) {
                //   echo $rowadmin->nama;
                if($admin !=""){echo $admin;}else{echo session('username');};
                // }
                ?>
                </td>
            </tr>
        </table>
      </div>
    </div>
  </body>
</html>
