<?php
session_start();
include("admin_header.php");
include("connect.php");


if(isset($_POST['btnview']))
{
	$fdate=date("Y-m-d",strtotime($_POST['txtfdate']));
	$tdate=date("Y-m-d",strtotime($_POST['txttdate']));
}


?>
<div class="content">
			<div class="contact-w3l">
				<div class="container">
					<h2 class="tittle">DATE WISE BILL DETAIL REPORT</h2>
					<div class="contact-map">
						
					<div class="contact_top">
						<div class="col-md-12 contact_left">
							
						  <form  method="post" name="form1" enctype="multipart/form-data">
							 <div class="form_details">
								<div class="col-md-6 contact_left">  
								SELECT FROM DATE:
								  <input type="date" class="text"  name="txtfdate" value="<?php if(isset($fdate)){ echo $fdate; }else{ echo date("Y-m-d"); } ?>" >
								 
								  
							  </div>
							  <div class="col-md-6 contact_left">  
								  SELECT TO DATE:
								  <input type="date" class="text"  name="txttdate" value="<?php if(isset($tdate)){ echo $tdate; }else{ echo date("Y-m-d"); } ?>" >
								  <br/>
										<input type="submit" value="VIEW REPORT" name="btnview" >
									
									 </div>
							  </div>
							  </form>
							   </div>
						</div>
						<div class="col-md-12 company-right">
							<div class="company_ad">
							<?php
							if(isset($_POST['btnview']))
							{
								$qur=mysql_query("select * from bill_detail where bill_date>='$fdate' and bill_date<='$tdate'");
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