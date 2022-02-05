<!DOCTYPE html>
<html>
<head>
<title>Fish Room</title>
<!---->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<link href="css/owl.carousel.css" rel="stylesheet">
<!--for-mobile-apps-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<meta name="keywords" content="Aquatic Life Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--//for-mobile-apps-->
<script src="js/jquery.min.js"></script>
<!---->
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!---->
</head>
<body>
	<?php
	$pagename=basename($_SERVER['SCRIPT_NAME']);
	if($pagename=="index.php" || $pagename=="")
	{
		echo "<script src='js/jquery.vide.min.js'></script>";
		echo "<div data-vide-bg='video/tr'>";
	}else{
		echo "<div>";
	}
	
	?>
	
		<div class="center-container">
			<div class="navigation">
				<div class="container">
					<div class="logo">
						<h1><a href="index.html">Fish <span>Room</span></a></h1>
					</div>
					<div class="navigation-right">
						<span class="menu"><img src="images/menu.png" alt=" " /></span>
						<nav class="link-effect-3" id="link-effect-3">
							<ul class="nav1 nav nav-wil">
								<li class="active"><a data-hover="Manage Category" href="admin_manage_cat.php">Manage Category</a></li>
								<li><a data-hover="Manage Product" href="admin_manage_product.php">Manage Product</a></li>
								<li><a data-hover="New Orders" href="admin_view_new_orders.php" >New Orders</a></li>
							
								
								<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Reports</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="admin_view_customer_detail_report.php">Customer Detail Report</a></li>
									<li class="nav-item"><a class="nav-link" href="admin_view_all_order_report.php">Order Detail Report</a></li>
									<li class="nav-item"><a class="nav-link" href="admin_view_all_bill_report.php">Bill Detail</a></li>
									<li class="nav-item"><a class="nav-link" href="admin_view_date_wise_order_report.php">Date Wise Order Detail</a></li>
									<li class="nav-item"><a class="nav-link" href="admin_view_date_wise_bill_report.php">Date Wise Bill Detail</a></li>
								</ul>
							</li>
								<li><a data-hover="Logout" href="logout.php">Logout</a></li>
							</ul>
						</nav>
							<!-- script-for-menu -->
								<script>
								   $( "span.menu" ).click(function() {
									 $( "ul.nav1" ).slideToggle( 300, function() {
									 // Animation complete.
									  });
									 });
								</script>
							<!-- /script-for-menu -->
					</div>
					<div class="clearfix"></div>
				</div>
			</div>