<?php
session_start();
include("header.php");
include("connect.php");

?>
<script type="text/javascript">
function validation()
{
	
	
	if(form1.txtadd.value=="")
	{
		alert("Please Enter Your Delivery Address.");
		form1.txtadd.focus();
		return false;
	}
	
	
	
	var v=/^[0-9]+$/
	if(form1.txtmno.value=="")
	{
		alert("Please Enter Your Delievery Mobile No.");
		form1.txtmno.focus();
		return false;
	}else if(form1.txtmno.value.length!=10)
	{
		alert("Please Enter Only 10 Digit in Delievery Mobile No.");
		form1.txtmno.focus();
		return false;
	}
	else{
		if(!v.test(form1.txtmno.value))
		{
			alert("Please Enter Only Digits in Delievery Mobile No");
			form1.txtmno.focus();
			return false;
		}
	}
	
	
	
	
	
}
</script>
<?php
if(isset($_POST['btnplaced']))
{
	$dadd=$_POST['txtadd'];
	$dmno=$_POST['txtmno'];
	$cartid=$_SESSION['cartid'];
	$custid=$_SESSION['custid'];
	$odate=date("Y-m-d");
	//auto number code start...
	$res1=mysql_query("select max(order_id) from order_detail");
	$oid=0;
	while($r1=mysql_fetch_array($res1))
	{
		$oid=$r1[0];
	}
	$oid++;
	//auto number code finish....
	$res2=mysql_query("select sum(qty*price) from cart_detail where cart_id='$cartid'");
	$r2=mysql_fetch_array($res2);
	$totamt=$r2[0];
	
	$query="insert into order_detail values('$oid','$odate','$custid','$cartid','$dadd','$dmno','$totamt')";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Order Placed Successfully');";
		echo "window.location.href='thank_you.php?oid=$oid&tamt=$totamt';";
		echo "</script>";
	}
}
?>
<div class="content">
			<div class="contact-w3l">
				<div class="container">
					<h2 class="tittle">ORDER FORM</h2>
					<div class="contact-map">
						
					<div class="contact_top">
						<div class="col-md-6 contact_left">
							
						  <form  method="post" name="form1">
							 <div class="form_details">
								  
								 <textarea name="txtadd" placeholder="Your Delievery Address"></textarea>
								  <input type="text" class="text" placeholder="Your Mobile No" name="txtmno" >
								  
								  <div class="clearfix"> </div>
									 <div class="sub-button">
										<input type="submit" value="PLACED ORDER" name="btnplaced" onclick="return validation();">
										
									 </div>
							  </div>
							  </form>
						</div>
						<div class="col-md-6 company-right">
							   <div class="company_ad">
									<img src="images/order1.jpg" style="width:500px; height:350px;">
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