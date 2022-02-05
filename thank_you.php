<?php
session_start();
include("header.php");
include("connect.php");

unset($_SESSION['cartid']);
?>
<div class="content">
			<div class="contact-w3l">
				<div class="container">
					<h2 class="tittle">Thank You</h2>
					<div class="contact-map">
						
					<div class="contact_top">
						<div class="col-md-6 contact_left">
							
						  <form  method="post" name="form1">
							 <div class="form_details">
								<h3>Thank You For Your Valuable Order</h3>  
								<br/>
								<h3>Your Order Id is <?php echo $_REQUEST['oid']; ?></h3>  
								<br/>
								<h3>Total Amount Rs. <?php echo $_REQUEST['tamt']; ?> /-</h3>  
								<br/>
								<h3>Cash On Delievery. </h3>
								<br/>
								<h3>Your Order Will Be Delievered in 3 to 4 Working Days.</h3>  
							  </div>
							  </form>
						</div>
						<div class="col-md-6 company-right">
							   <div class="company_ad">
									<img src="images/thank_you.jpg" style="width:500px; height:350px;">
								</div>
						</div>	
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		</div>
</div>
</div>
<?php
include("footer.php");
?>