<?php
include("header.php");
include("connect.php");
?>
<script type="text/javascript">
function validation()
{
	var v=/^[a-zA-Z ]+$/
	if(form1.txtname.value=="")
	{
		alert("Please Enter Your Name.");
		form1.txtname.focus();
		return false;
	}else{
		if(!v.test(form1.txtname.value))
		{
			alert("Please Enter Only Alphabets in Name");
			form1.txtname.focus();
			return false;
		}
	}
	
	if(form1.txtadd.value=="")
	{
		alert("Please Enter Your Address.");
		form1.txtadd.focus();
		return false;
	}
	
	
	if(form1.txtcity.value=="")
	{
		alert("Please Enter Your City Name.");
		form1.txtcity.focus();
		return false;
	}else{
		if(!v.test(form1.txtcity.value))
		{
			alert("Please Enter Only Alphabets in City Name");
			form1.txtcity.focus();
			return false;
		}
	}
	
	var v=/^[0-9]+$/
	if(form1.txtpincode.value=="")
	{
		alert("Please Enter Your Pincode.");
		form1.txtpincode.focus();
		return false;
	}else if(form1.txtpincode.value.length!=6)
	{
		alert("Please Enter Only 6 Digit in Pincode.");
		form1.txtpincode.focus();
		return false;
	}
	else{
		if(!v.test(form1.txtpincode.value))
		{
			alert("Please Enter Only Digits in Pincode");
			form1.txtpincode.focus();
			return false;
		}
	}
	
	var v=/^[0-9]+$/
	if(form1.txtmno.value=="")
	{
		alert("Please Enter Your Mobile No.");
		form1.txtmno.focus();
		return false;
	}else if(form1.txtmno.value.length!=10)
	{
		alert("Please Enter Only 10 Digit in Mobile No.");
		form1.txtmno.focus();
		return false;
	}
	else{
		if(!v.test(form1.txtmno.value))
		{
			alert("Please Enter Only Digits in Mobile No");
			form1.txtmno.focus();
			return false;
		}
	}
	
	var v=/^[a-zA-Z0-9.-_]+@[a-zA-Z0-9.-_]+\.([a-zA-Z]{2,4})$/;
	if(form1.txtemail.value=="")
	{
		alert("Please Enter Your Email ID.");
		form1.txtemail.focus();
		return false;
	}else{
		if(!v.test(form1.txtemail.value))
		{
			alert("Please Enter Valid Email ID");
			form1.txtemail.focus();
			return false;
		}
	}
	
	
	if(form1.txtpwd.value=="")
	{
		alert("Please Enter Password");
		form1.txtpwd.focus();
		return false;
	}else if(form1.txtpwd.value.length<6){
		alert("Please Enter Password More than 6 Characters.");
		form1.txtpwd.focus();
		return false;
	}else if(form1.txtpwd.value.length>10){
		alert("Please Enter Password Less than 10 Characters.");
		form1.txtpwd.focus();
		return false;
	}
	
}
</script>
<?php
if(isset($_POST['btnregis']))
{
	$name=$_POST['txtname'];
	$add=$_POST['txtadd'];
	$city=$_POST['txtcity'];
	$pincode=$_POST['txtpincode'];
	$mno=$_POST['txtmno'];
	$email=$_POST['txtemail'];
	$pwd=$_POST['txtpwd'];
	
	$res=mysql_query("select * from cust_regis where email_id='$email'");
	
	if(mysql_num_rows($res)>0)
	{
		echo "<script type='text/javascript'>";
		echo "alert('Email Id Already Exists....');";
		echo "</script>";
	}
	else
	{
		//auto number code start...
		$res1=mysql_query("select max(cust_id) from cust_regis");
		$custid=0;
		while($r1=mysql_fetch_array($res1))
		{
			$custid=$r1[0];
		}
		$custid++;
		
		//auto number code finish....
		
		$query="insert into cust_regis values('$custid','$name','$add','$city','$pincode','$mno','$email','$pwd')";
		
		if(mysql_query($query))
		{
			echo "<script type='text/javascript'>";
			echo "alert('Registration Successfull');";
			echo "window.location.href='login.php';";
			echo "</script>";
		}
		
	}
}
?>
<div class="content">
			<div class="contact-w3l">
				<div class="container">
					<h2 class="tittle">REGISTRATION FORM</h2>
					<div class="contact-map">
						
					<div class="contact_top">
						<div class="col-md-6 contact_left">
							
						  <form method="post" name="form1">
							 <div class="form_details">
								  <input type="text" class="text" placeholder="Your Name" name="txtname">
								  <textarea name="txtadd" placeholder="Your Address"></textarea>
								  <input type="text" class="text" placeholder="Your City" name="txtcity">
								  <input type="text" class="text" placeholder="Your Pincode" name="txtpincode">
								  <input type="text" class="text" placeholder="Your Mobile No" name="txtmno">
								  <input type="text" class="text" placeholder="Your Email ID" name="txtemail">
								  <input type="password" class="text" placeholder="******" name="txtpwd" >
								  
								  <div class="clearfix"> </div>
									 <div class="sub-button">
										<input type="submit" value="REGISTER" name="btnregis" onclick="return validation();">
										
									 </div>
							  </div>
							  </form>
						</div>
						<div class="col-md-6 company-right">
							   <div class="company_ad">
									<br/><br/>
									<img src="images/regis1.gif" style="width=100%; height:400px;">
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