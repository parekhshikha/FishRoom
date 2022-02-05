<?php
session_start();
include("admin_header.php");
include("connect.php");


?>
<div class="content">
			<div class="contact-w3l">
				<div class="container">
					<h2 class="tittle">CUSTOMER DETAIL REPORT</h2>
					<div class="contact-map">
						
					<div class="contact_top">
					
						<div class="col-md-12 contact_left">
							<div class="company_ad">
							<?php
							
							$qur=mysql_query("select * from cust_regis");
							if(mysql_num_rows($qur)>0)
							{
								
								echo "<table class='table table-bordered'>
										<tr>
											
											<th>CUSTOMER ID</th>
											<th>CUSTOMER NAME</th>
											<th>ADDRESS</th>
											<th>CITY</th>
											
											<th>MOBILE NO</th>
											<th>EMAIL ID</th>
											<th>VIEW ORDER DETAIL</th>
											<th>VIEW BILL DETAIL</th>
										</tr>";
									while($q=mysql_fetch_array($qur))
									{
										echo "<tr>";
										echo "<td>$q[0]</td>";
										echo "<td>$q[1]</td>";
										echo "<td>$q[2]</td>";
										echo "<td>$q[3]</td>";
										echo "<td>$q[4]</td>";
										echo "<td>$q[5]</td>";
										
										echo "<td><a href='admin_view_custwise_order_detail_report.php?cid=$q[0]'>VIEW ORDER DETAIL</a></td>";
										echo "<td><a href='admin_view_custwise_bill_detail_report.php?cid=$q[0]'>VIEW BILL DETAIL</a></td>";
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