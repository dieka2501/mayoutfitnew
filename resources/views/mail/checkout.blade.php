<!DOCTYPE html>
<html>
  	<head>
    <title>Email Template</title>
    <style type="text/css">
    body {
    	background: #fff;
    	margin: 0px;
    	padding: 0px;
    	font-family: Arial,sans-serif;
    }
    .header {
    	width: 500px;
    	padding: 20px 0px;
    	margin: 0 auto;
    }
    .header img {
    	max-height: 60px;
    }
    .wrapper {
    	width: 500px;
    	min-height: 400px;
    	margin: 0px auto;
    	border: 1px solid #dddddd;
    	border-radius: 10px;
    	-webkit-border-radius: 10px;
    	-moz-border-radius: 10px;
    }
    .content {
    	padding: 20px;
    }
    .content p {
    	font-size: 11px;
    	color: #555555;
    }
    .details {
    	background: #E9F0FA;
    	padding: 20px;
    }
    p.title-detail {
    	margin-top: 0px;
    }
    p.content-detail {
    	margin-top: 5px;
    	margin-left: 30px;
    	margin-bottom: 0px;
    }
    .copyright {
    	margin-top: 50px;
    }
    .copyright p {
    	line-height: 5px;
    }
    </style>
  	</head>
	<body style="background: #fff;
	margin: 0px;
	padding: 0px;
	font-family: Arial,sans-serif;">
	  		<div class="header" style="width: 500px;
	    	padding: 20px 0px;
	    	margin: 0 auto;">
	  			<img src="{{Config::get('app.url')}}asset/logo_email.png" alt="logo" style="max-height: 60px;">
	  		</div>
		  	<div class="wrapper" style="width: 500px;
	    	min-height: 400px;
	    	margin: 0px auto;
	    	border: 1px solid #dddddd;
	    	border-radius: 10px;
	    	-webkit-border-radius: 10px;
	    	-moz-border-radius: 10px;">
		  		<div class="content" style="padding: 20px;">
		  			<h4>Terima kasih sudah berbelanja</h4>
		  			<p style="font-size: 11px;
	    	color: #555555;">Dear {{$name}},</p>
		  			<p style="font-size: 11px;
	    	color: #555555;">Terima kasih sudah berbelanja di mayoutfit.com.</p>
            <p style="font-size: 11px;
            color: #555555;">Nomor pemesanan mu <b>AASDF</b></p>
		  			<p style="font-size: 11px;
	    	color: #555555;"></p>
		  			<div class="details" style="background: #E9F0FA;
	    	padding: 20px;">
		  				<p class="title-detail" style="margin-top: 0px;">Detail pemesanannya:</p>
                        <table width="100%">
                            <tr>
                                <th>Nama barang</th>
                                <th>Qty</th>
                            </tr>
                            <tr>
                                <td>
                                    Nama Barang
                                </td>
                                <td>
                                    1
                                </td>
                            </tr>
                        </table>
		  				<p class="content-detail" style="margin-top: 5px;
	    	margin-left: 30px;
	    	margin-bottom: 0px;"><strong>Email Login : </strong></p>
		  				<p class="content-detail" style="margin-top: 5px;
	    	margin-left: 30px;
	    	margin-bottom: 0px;"><strong>Name : </strong> </p>
	    				<p class="content-detail" style="margin-top: 5px;
	    	margin-left: 30px;
	    	margin-bottom: 0px;"><strong>Bank : </strong>   </p>
	    				<p class="content-detail" style="margin-top: 5px;
	    	margin-left: 30px;
	    	margin-bottom: 0px;"><strong>Branch : </strong>  </p>
	    	<p class="content-detail" style="margin-top: 5px;
	    	margin-left: 30px;
	    	margin-bottom: 0px;"><strong>Password : </strong> </p>

	  				
	  			</div>

	  			<p>Please do not reply to this email because we are not monitoring this inbox. To get in touch with us, log in to your account and click "Contact Us" at the bottom of any page.</p>
	  			<div class="copyright" style="margin-top: 50px;">
	  			<p style="line-height: 5px;">Thanks,</p>
	  			<p style="line-height: 5px;">Bahana Pulse</p>
	  			</div>
	  		</div>
	  	</div>
  	</body>
</html>