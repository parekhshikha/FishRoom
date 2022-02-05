<?php
session_start();
include("header.php");
include("connect.php");

?>
<div class="content">
			<div class="contact-w3l">
				<div class="container">
					<h2 class="tittle">ORDER DETAIL</h2>
					<div class="contact-map">
						
					<div class="contact_top">
					
						<div class="col-md-12 contact_left">
							<div class="company_ad">
							<?php
							$cartid=$_REQUEST['cartid'];
							$qur=mysql_query("select * from cart_detail where cart_id='$cartid'");
							if(mysql_num_rows($qur)>0)
							{
								$tot=0;
								echo "<table class='table table-bordered'>
										<tr>
											
											<th>PRODUCT NAME</th>
											<th>QUANTITY</th>
											<th>PRICE</th>
											<th>TOTAL AMOUNT</th>
											
											<th>PRODUCT IMAGE</th>
											
										</tr>";
									while($q=mysql_fetch_array($qur))
									{
										echo "<tr>";
										$qur2=mysql_query("select * from product_detail where prod_id='$q[2]'");
										$q2=mysql_fetch_array($qur2);
										echo "<td>$q2[1]</td>";
										echo "<td>$q[3]</td>";
										echo "<td>$q[4]</td>";
										$amt=$q[3]*$q[4];
										echo "<td>$amt</td>";
										$tot=$tot+$amt;
										echo "<td><img src='$q2[5]' style='width:200px; height:150px;'></td>";
										
										echo "</tr>";
									}
								echo "</table>";
								echo "<h3>Total Amount Rs. $tot /-</h3>";
							}
							else{
								echo "<h2>No Product Found in Cart</h2>";
							}
							?>
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