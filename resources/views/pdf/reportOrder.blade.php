<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h3>Laporan Penjualan Per Tanggal :  {!!$date_start!!} - {!!$date_end!!}</h3>
	<table width="100%" border="0">
	    <thead style="border:1px solid black">
	      <tr>
	        <th >Nama Barang</th>
	        <th >Qty</th>
	        <th >Penjualan</th>
	        <th >Diskon</th>
	        <th >HPP</th>
	        <th >Profit</th>
	        <th >Total Profit</th>
	      </tr>
	    </thead>
	    <tbody style="border:1px solid black">
	    	<?php 
	    		$total_profit = 0;
	    		$grandtotal = 0;
	    		foreach($report as $orders):

	          		// $multiplehpp = $orders->product_hpp * $orders->order_detail_qty;
                    $profit = $orders->order_detail_price - $orders->order_detail_discount_nominal - $orders->product_hpp;
	          		$total_profit = $profit * $orders->order_detail_qty;
	          		$grandtotal += $total_profit;
	        ?>
	        <tr>
	          <td>{!!$orders->product_name!!}</td>
	          <td align="right">{!!$orders->order_detail_qty!!}</td>
	          <td align="right">Rp. {!!number_format($orders->order_detail_price)!!}</td>
	          <td align="right">Rp. {!!number_format($orders->order_detail_discount_nominal)!!}</td>
	          <td align="right">Rp. {!!number_format($orders->product_hpp)!!}</td>
	          <td align="right">Rp. {!!number_format($profit)!!}</td>
	          <td align="right">Rp. {!!number_format($total_profit)!!}</td>

	        </tr>
	        <?php 
	        	endforeach;
	        ?>
	    </tbody>
	    <tfoot>
	    	<tr>
	    		
	    		<td colspan="7" align="right">Rp. {!!number_format($grandtotal)!!}</td>
	    	</tr>
	    </tfoot>
    </table>
</body>
</html>