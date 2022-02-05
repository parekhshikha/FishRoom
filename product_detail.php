<?php
session_start();
include("header.php");
include("connect.php");

$pid=$_REQUEST['pid'];
$res1=mysql_query("select * from product_detail where prod_id='$pid'");
$r1=mysql_fetch_array($res1);
$pname=$r1[1];
$cid=$r1[2];
$pdesc=$r1[3];
$price=$r1[4];
$pimg=$r1[5];
?>
<script type="text/javascript">
function validation()
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
if(isset($_POST['btncart']))
{
	$qty=$_POST['txtqty'];
	if(isset($_SESSION['cartid']))
	{
		$cartid=$_SESSION['cartid'];
		//auto number code start...
		$res2=mysql_query("select max(cart_detail_id) from cart_detail");
		$cartdid=0;
		while($r2=mysql_fetch_array($res2))
		{
			$cartdid=$r2[0];
		}
		$cartdid++;
		//auto number code finish....
		$query="insert into cart_detail values('$cartdid','$cartid','$pid','$qty','$price')";
		if(mysql_query($query))
		{
			echo "<script type='text/javascript'>";
			echo "alert('Inserted Into Cart');";
			echo "window.location.href='product.php';";
			echo "</script>";
		}
	}else{
		//auto number code start...
		$res1=mysql_query("select max(cart_id) from cart_master");
		$cartid=0;
		while($r1=mysql_fetch_array($res1))
		{
			$cartid=$r1[0];
		}
		$cartid++;
		
		//auto number code finish....
		$cdate=date("Y-m-d");
		$query="insert into cart_master values('$cartid','$cdate')";
		if(mysql_query($query))
		{
			//auto number code start...
			$res2=mysql_query("select max(cart_detail_id) from cart_detail");
			$cartdid=0;
			while($r2=mysql_fetch_array($res2))
			{
				$cartdid=$r2[0];
			}
			$cartdid++;
			//auto number code finish....
			$query="insert into cart_detail values('$cartdid','$cartid','$pid','$qty','$price')";
			if(mysql_query($query))
			{
				$_SESSION['cartid']=$cartid;
				echo "<script type='text/javascript'>";
				echo "alert('Inserted Into Cart');";
				echo "window.location.href='product.php';";
				echo "</script>";
			}
		}
	}
}
?>
<div class="content">
			<div class="contact-w3l">
				<div class="container">
					<h2 class="tittle">PRODUCT DETAIL</h2>
					<div class="contact-map">
						
					<div class="contact_top">
						<div class="col-md-6 contact_left">
							<h3 style='color: #17C2A4'>Product Name: <span style='color: #000000' > <?php echo $pname; ?></span></h3>
							<br/>
							<h3 style='color: #17C2A4' >Description: <span style='color: #000000'> <?php echo $pdesc; ?></span></h3>
							<br/>
							<h3 style='color: #17C2A4'>Price: <span style='color: #000000'>Rs.  <?php echo $price; ?>/-</span> </h3>
						  <form  method="post" name="form1">
							 <div class="form_details">
								  
								  <input type="text" class="text" placeholder="Enter Quantity" name="txtqty">
								  
								  
								  <div class="clearfix"> </div>
									 <div class="sub-button">
										<input type="submit" value="ADD TO CART" name="btncart" onclick="return validation();">
										
									
									 </div>
							  </div>
							  </form>
						</div>
						<div class="col-md-6 company-right">
							   <div class="company_ad">
									<img src="<?php echo $pimg; ?>" style="width:500px; height:328px;">
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