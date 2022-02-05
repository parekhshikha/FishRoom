<?php
session_start();
include("admin_header.php");
include("connect.php");


if(isset($_POST['btnbill']))
{
	$cartid=$_REQUEST['cartid'];
	$oid=$_REQUEST['oid'];
	$bdate=date("Y-m-d");
	$res1=mysql_query("select * from order_detail where order_id='$oid'");
	$r1=mysql_fetch_array($res1);
	$custid=$r1[2];
	$bamt=$r1[6];
	//auto number code start...
	$res2=mysql_query("select max(bill_id) from bill_detail");
	$bid=0;
	while($r2=mysql_fetch_array($res2))
	{
		$bid=$r2[0];
	}
	$bid++;
	//auto number code finish....
	$query="insert into bill_detail values('$bid','$bdate','$oid','$cartid','$custid','$bamt')";
	
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Bill Generated Successfully');";
		echo "window.location.href='bill.php?bid=$bid';";
		echo "</script>";
	}
}

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
						 <form  method="post" name="form2">
							 <div class="form_details">
								  
								  
								  
									 <div class="sub-button">
									
										<input type="submit" value="GENERATE BILL" name="btnbill" >
										
									 </div>
							  </div>
							  </form>
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