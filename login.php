<?php
session_start();
include("header.php");
include("connect.php");

if(isset($_POST['btnlogin']))
{
	$email=$_POST['txtemail'];
	$pwd=$_POST['txtpwd'];
	
	$res=mysql_query("select * from admin_detail where email_id='$email' and pwd='$pwd'");
	if(mysql_num_rows($res)>0)
	{
		echo "<script type='text/javascript'>";
		echo "alert('Admin Login Successfull');";
		echo "window.location.href='admin_manage_cat.php';";
		echo "</script>";
	}
	else
	{
		$res1=mysql_query("select * from cust_regis where email_id='$email' and pwd='$pwd'");
		if(mysql_num_rows($res1)>0)
		{
			$r1=mysql_fetch_array($res1);
			$_SESSION['custid']=$r1[0];
			if(isset($_SESSION['cartid']))
			{
				echo "<script type='text/javascript'>";
				echo "alert('Customer Login Successfull');";
				echo "window.location.href='order_form.php';";
				echo "</script>";
			}else{
				echo "<script type='text/javascript'>";
				echo "alert('Customer Login Successfull');";
				echo "window.location.href='product.php';";
				echo "</script>";
			}
		}
		else
		{
			echo "<script type='text/javascript'>";
			echo "alert('Check Email ID or Password');";
			echo "</script>";
		}
	}
}
?>


<div class="content">
			<div class="contact-w3l">
				<div class="container">
					<h2 class="tittle">LOGIN</h2>
					<div class="contact-map">
						
					<div class="contact_top">
						<div class="col-md-6 contact_left">
							
						  <form  method="post">
							 <div class="form_details">
								  
								  <input type="text" class="text" placeholder="Your Email ID" name="txtemail">
								  <input type="password" class="text" placeholder="******" name="txtpwd" >
								  
								  <div class="clearfix"> </div>
									 <div class="sub-button">
										<input type="submit" value="LOGIN" name="btnlogin">
										<br/><br/>
										<a href="regis.php"><h4>New User? Click Here</h4></a>
									 </div>
							  </div>
							  </form>
						</div>
						<div class="col-md-6 company-right">
							   <div class="company_ad">
									<img src="images/login1.gif">
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