<?php
session_start();
?>
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
								<li class="active"><a data-hover="Home" href="index.php">Home</a></li>
								
								
								<li><a data-hover="Products" href="product.php" >Products</a></li>
								<?php
								if(isset($_SESSION['cartid']))
								{
									?>
										<li><a data-hover="Cart" href="cart.php" >Cart </a></li>
									<?php
								}
								
								if(!isset($_SESSION['custid']))
								{
								?>
								<li><a data-hover="Login" href="login.php">Login</a></li>
								<?php
								}
								?>
								<li><a data-hover="About" href="about.php">About</a></li>
								<li><a data-hover="Contact" href="contact.php">Contact</a></li>
								<?php
								if(isset($_SESSION['custid']))
								{
								?>
								<li><a data-hover="Login" href="order_history.php">Order History</a></li>
								<li><a data-hover="Login" href="logout.php">Logout</a></li>
								<?php
								}
								?>
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