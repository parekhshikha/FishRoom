<?php
session_start();
include("header.php");
include("connect.php");

if(isset($_REQUEST['cddid']))
{
	$cdid=$_REQUEST['cddid'];
	$query="delete from cart_detail where cart_detail_id='$cdid'";
	if(mysql_query($query))	
	{
		echo "<script type='text/javascript'>";
		echo "alert('Deleted From Cart');";
		echo "window.location.href='cart.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['pid']))
{
	$cdid=$_REQUEST['cduid'];
	$pid=$_REQUEST['pid'];
	$res1=mysql_query("select * from cart_detail where cart_detail_id='$cdid'");
	$r1=mysql_fetch_array($res1);
	$qty=$r1[3];
	$price=$r1[4];
	$res2=mysql_query("select * from product_detail where prod_id='$pid'");
	$r2=mysql_fetch_array($res2);
	$pname=$r2[1];
	
}

?>
<script type="text/javascript">
function validate()
{
	
	
	var v=/^[0-9]+$/
	if(form1.txtqty.value=="")
	{
		alert("Please Enter Product Quantity.");
		form1.txtqty.focus();
		return false;
	}else if(form1.txtqty.value=="0")
	{
		alert("Please Enter Product Quantity Greater Than 0");
		form1.txtqty.focus();
		return false;
	}
	else{
		if(!v.test(form1.txtqty.value))
		{
			alert("Please Enter Only Digits in Product Quantity");
			form1.txtqty.focus();
			return false;
		}
	}
	
	
}
</script>
<?php
if(isset($_POST['btnupdate']))
{
	$qty=$_POST['txtqty'];
	$cdid=$_REQUEST['cduid'];
	$query="update cart_detail set qty='$qty' where cart_detail_id='$cdid'";
	
	if(mysql_query($query))	
	{
		echo "<script type='text/javascript'>";
		echo "alert('Quantity Updated To Cart');";
		echo "window.location.href='cart.php';";
		echo "</script>";
	}
}

if(isset($_POST['btnorder']))
{
	if(isset($_SESSION['custid']))
	{
		header("Location: order_form.php");
	}
	else
	{
		header("Location: login.php");
	}
}
?>
<div class="content">
			<div class="contact-w3l">
				<div class="container">
					<h2 class="tittle">CART DETAIL</h2>
					<div class="contact-map">
						
					<div class="contact_top">
					<div class="col-md-6 company-right">
						<?php
						if(isset($_REQUEST['cduid']))
						{
							echo "<h3>Product Name: $pname</h3>";
							echo "<br/>";
							echo "<h3>Price: $price</h3>";
							echo "<br/>";
						?>
						  <form  method="post" name="form1">
							 <div class="form_details">
								  
								  
								  <input type="text" class="text" name="txtqty" value="<?php echo $qty; ?>">
								  
								  <div class="clearfix"> </div>
									 <div class="sub-button">
									
										<input type="submit" value="UPDATE" name="btnupdate" onclick="return validate();">
										
									 </div>
							  </div>
							  </form>
						<?php
						}
						?>
						</div>
						<div class="col-md-12 contact_left">
							<div class="company_ad">
							<?php
							$cartid=$_SESSION['cartid'];
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
											<th>UPDATE</th>
											<th>DELETE</th>
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
										echo "<td><a href='cart.php?cduid=$q[0]&pid=$q[2]'>UPDATE</a></td>";
										echo "<td><a href='cart.php?cddid=$q[0]'>DELETE</a></td>";
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
						<?php
						if($tot>0)
						{
						?>
						
						 <form  method="post" name="form2">
							 <div class="form_details">
								  
								  
								  
									 <div class="sub-button">
									
										<input type="submit" value="PLACED ORDER" name="btnorder" >
										
									 </div>
							  </div>
							  </form>
						<?php
						}
						?>
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