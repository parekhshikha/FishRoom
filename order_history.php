<?php
session_start();
include("header.php");
include("connect.php");


?>
<div class="content">
			<div class="contact-w3l">
				<div class="container">
					<h2 class="tittle">ALL ORDER DETAIL</h2>
					<div class="contact-map">
						
					<div class="contact_top">
					
						<div class="col-md-12 contact_left">
							<div class="company_ad">
							<?php
							$custid=$_SESSION['custid'];
							$qur=mysql_query("select * from order_detail where cust_id='$custid' order by order_id desc");
							if(mysql_num_rows($qur)>0)
							{
								$tot=0;
								echo "<table class='table table-bordered'>
										<tr>
											
											<th>ORDER ID</th>
											<th>ORDER DATE</th>
											<th>CART ID</th>
											<th>DELIEVERY ADDRESS</th>
											<th>MOBILE NO</th>
											<th>TOTAL AMOUNT</th>
											<th>VIEW ORDER DETAIL</th>
										</tr>";
									while($q=mysql_fetch_array($qur))
									{
										echo "<tr>";
										echo "<td>$q[0]</td>";
										echo "<td>$q[1]</td>";
										echo "<td>$q[3]</td>";
										echo "<td>$q[4]</td>";
										echo "<td>$q[5]</td>";
										echo "<td>Rs. $q[6] /-</td>";
										
										
										
										echo "<td><a href='cust_view_order_detail.php?cartid=$q[3]'>VIEW ORDER DETAIL</a></td>";
										echo "</tr>";
									}
								echo "</table>";
								
							}
							else{
								echo "<h2>No Order Found</h2>";
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