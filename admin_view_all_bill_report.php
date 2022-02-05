<?php
session_start();
include("admin_header.php");
include("connect.php");


?>
<div class="content">
			<div class="contact-w3l">
				<div class="container">
					<h2 class="tittle">ALL BILL DETAIL REPORT</h2>
					<div class="contact-map">
						
					<div class="contact_top">
					
						<div class="col-md-12 contact_left">
							<div class="company_ad">
							<?php
							
							$qur=mysql_query("select * from bill_detail");
							if(mysql_num_rows($qur)>0)
							{
								$tot=0;
								echo "<table class='table table-bordered'>
										<tr>
											
											<th>BILL ID</th>
											<th>BILL DATE</th>
											<th>ORDER ID</th>
											<th>CART ID</th>
											<th>CUSTOMER NAME</th>
											
											
											<th>TOTAL BILL AMOUNT</th>
											<th>VIEW BILL</th>
										</tr>";
									while($q=mysql_fetch_array($qur))
									{
										echo "<tr>";
										echo "<td>$q[0]</td>";
										echo "<td>$q[1]</td>";
										echo "<td>$q[2]</td>";
										echo "<td>$q[3]</td>";
										$qur2=mysql_query("select * from cust_regis where cust_id='$q[4]'");
										$q2=mysql_fetch_array($qur2);
										echo "<td>$q2[1]</td>";
										
										
										echo "<td>Rs. $q[5] /-</td>";
										
										
										
										echo "<td><a href='bill.php?bid=$q[0]' target='_blank'>VIEW BILL</a></td>";
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