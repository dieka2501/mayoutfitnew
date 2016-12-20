<!DOCTYPE html>
<html>
<head>
	<title>Order Success</title>

	<style type="text/css">
		body {
			color: #666666;
			font-family: Arial, sans-serif;
			font-size: 12px;
		}
		.wrapper {
			max-width: 500px;
			margin: 20px auto;
			border: 1px solid #e0e0e0;
			border-radius: 5px;
			-moz-border-radius: 5px;
			-webkit-border-radius: 5px;
		}
		.wrapper p {
			line-height: 20px;
			margin-top: 0px;
			margin-bottom: 20px;
		}
		.wrapper .header {
			color: #ffffff;
			background-color: #FF3399;
			border-radius: 5px 5px 0px 0px;
			-moz-border-radius: 5px 5px 0px 0px;
			-webkit-border-radius: 5px 5px 0px 0px;
			padding: 10px 0;
			text-align: center;
		}
		.wrapper .header h1 {
			margin: 0px;
			font-weight: 500;
		}
		.wrapper .content {
			padding: 30px 20px;
		}
		.content table {
			width: 100%;
		    border-spacing: 0;
		    border-collapse: collapse;
		    text-align: left;
		}
		.content table td, .content table th {
		    padding: 8px;
		    line-height: 1.42857143;
		    vertical-align: top;
		    border: 1px solid #ddd;
		}
		.content .content-half {
			width: 50%;
			float: left;
		}
		.margin-5 {
			margin-bottom: 5px!important;
		}
	</style>
</head>
<body>
	<div class="wrapper">
		<div class="header">
			<h1>Terima kasih sudah order</h1>
		</div>
		<div class="content">
			<p>Hai {!!$billing['order_name']!!}.	</p>
			<p>Terima kasih telah berbelanja di mayoutfit.com
			Silakan trf maksimal 1x12 jam ke rekening bca a/n Sinthya Audi 1830712158
			</p>
			<h1>Order: {!!$billing['order_code']!!}</h1>
			<table>
				<tbody>
				<tr>
				<th>Product</th>
				<th>Quantity</th>
				<th>Price</th>
				</tr>
				@for($jj=0; $jj < $count; $jj++)
				<tr>
					<td>{!!$product_name[$jj]!!}</td>
					<td>{!!number_format($qty[$jj])!!}</td>
					<td>Rp. {!!number_format($price[$jj])!!}</td>
				</tr>
				@endfor
				<!-- <tr>
					<td colspan="2"><strong>Cart Subtotal :</strong></td>
					<td>Rp. 200.000</td>
				</tr> -->
				<!-- <tr>
					<td colspan="2"><strong>Shipping :</strong></td>
					<td>Free Shipping</td>
				</tr> -->
				<tr>
					<td colspan="2"><strong>Order Total :</strong></td>
					<td><strong>Rp. {!!number_format($grandtotal)!!}</strong></td>
				</tr>
				</tbody>
			</table>
			<h1>Customer details</h1>
			<p class="margin-5">Nama : {!!$billing['order_name']!!}</p>
			<p class="margin-5">Email : {!!$billing['order_email']!!}</p>
			<p>Tel : 082121-77-0707</p>
			<br/>
			<div class="content-half">
				<h1>Billing address</h1>
				<p class="margin-5">{!!$billing['order_address']!!}</p>
				<p>Tel : {!!$billing['order_phone']!!}</p>
			</div>
			<div class="content-half">
				<h1>Shipping address</h1>
				<p class="margin-5"><?php echo ($billing['order_shipment_address'] == "")?$billing['order_address']:$billing['order_shipment_address']  ?></p>
				<p>Tel : <?php echo ($billing['order_shipment_phone'] == "")?$billing['order_phone']:$billing['order_shipment_phone']  ?></p>
			</div>
			<div style="clear:both"></div>
		</div>
	</div>
</body>
</html>