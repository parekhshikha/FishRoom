<?php
session_start();
include("admin_header.php");
include("connect.php");

//auto number code start...
$res1=mysql_query("select max(prod_id) from product_detail");
$prodid=0;
while($r1=mysql_fetch_array($res1))
{
	$prodid=$r1[0];
}
$prodid++;
//auto number code finish....
?>
<script type="text/javascript">
function validate()
{
	var v=/^[a-zA-Z ]+$/;
	if(form1.txtname.value=="")
	{
		alert("Please Enter Product Name");
		form1.txtname.focus();
		return false;
	}else{
		if(!v.test(form1.txtname.value))
		{
			alert("Please Enter Only Alphabets in Product Name");
			form1.txtname.focus();
			return false;
		}
	}
	
	if(form1.txtdesc.value=="")
	{
		alert("Please Enter Product Description");
		form1.txtdesc.focus();
		return false;
	}
	
	if(form1.selcat.value=="0")
	{
		alert("Please Select Category");
		form1.selcat.focus();
		return false;
	}
	
	var v=/^[0-9]+$/;
	if(form1.txtprice.value=="")
	{
		alert("Please Enter Product Price");
		form1.txtprice.focus();
		return false;
	}else if(form1.txtprice.value=="0")
	{
		alert("Please Enter Product Price Greater Than 0");
		form1.txtprice.focus();
		return false;
	}
	else{
		if(!v.test(form1.txtprice.value))
		{
			alert("Please Enter Only Digits in Product Price");
			form1.txtprice.focus();
			return false;
		}
	}
	
	var fname=document.getElementById('txtimg').value;
	var ext=fname.substr(fname.lastIndexOf('.')+1).toLowerCase().trim();
	if(document.getElementById('txtimg').value=="")
	{
		alert("Please Select Product Image");
		return false;
	}else{
		if(!(ext=="jpg" || ext=="jpeg" || ext=="png"))
		{
			//alert(extension);
			alert("Please Select Product Image in Format like jpg png or jpeg");
			return false;
		}
	}
}

function validate1()
{
	var v=/^[a-zA-Z ]+$/;
	if(form1.txtname.value=="")
	{
		alert("Please Enter Product Name");
		form1.txtname.focus();
		return false;
	}else{
		if(!v.test(form1.txtname.value))
		{
			alert("Please Enter Only Alphabets in Product Name");
			form1.txtname.focus();
			return false;
		}
	}
	
	if(form1.txtdesc.value=="")
	{
		alert("Please Enter Product Description");
		form1.txtdesc.focus();
		return false;
	}
	
	if(form1.selcat.value=="0")
	{
		alert("Please Select Category");
		form1.selcat.focus();
		return false;
	}
	
	var v=/^[0-9]+$/;
	if(form1.txtprice.value=="")
	{
		alert("Please Enter Product Price");
		form1.txtprice.focus();
		return false;
	}else if(form1.txtprice.value=="0")
	{
		alert("Please Enter Product Price Greater Than 0");
		form1.txtprice.focus();
		return false;
	}
	else{
		if(!v.test(form1.txtprice.value))
		{
			alert("Please Enter Only Digits in Product Price");
			form1.txtprice.focus();
			return false;
		}
	}
	
	var fname=document.getElementById('txtimg').value;
	var ext=fname.substr(fname.lastIndexOf('.')+1).toLowerCase().trim();
	if(document.getElementById('txtimg').value!="")
	{
		if(!(ext=="jpg" || ext=="jpeg" || ext=="png"))
		{
			//alert(extension);
			alert("Please Select Product Image in Format like jpg png or jpeg");
			return false;
		}
	}
}
</script>
<?php
if(isset($_POST['btnsave']))
{
	$pid=$_POST['txtpid'];
	$pname=$_POST['txtname'];
	$cid=$_POST['selcat'];
	$desc=$_POST['txtdesc'];
	$price=$_POST['txtprice'];
	
	$tpath=$_FILES['txtimg']['tmp_name'];
	$ipath="prod_img/P".$pid."_".rand(1000,9999).".jpg";
	$query="insert into product_detail values('$pid','$pname','$cid','$desc','$price','$ipath')";

	if(mysql_query($query))	
	{
		move_uploaded_file($tpath,$ipath);
		echo "<script type='text/javascript'>";
		echo "alert('Product Added Successfully');";
		echo "window.location.href='admin_manage_product.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['pdid']))
{
	$pid1=$_REQUEST['pdid'];
	$query="delete from product_detail where prod_id='$pid1'";
	if(mysql_query($query))	
	{
		echo "<script type='text/javascript'>";
		echo "alert('Product Removed Successfully');";
		echo "window.location.href='admin_manage_product.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['puid']))
{
	$prodid=$_REQUEST['puid'];
	$res2=mysql_query("select * from product_detail where prod_id='$prodid'");
	$r2=mysql_fetch_array($res2);
	$pname=$r2[1];
	$catid1=$r2[2];
	$pdesc=$r2[3];
	$price=$r2[4];
	$pimg=$r2[5];
}

if(isset($_POST['btnupdate']))
{
	$pid=$_POST['txtpid'];
	$pname=$_POST['txtname'];
	$cid=$_POST['selcat'];
	$desc=$_POST['txtdesc'];
	$price=$_POST['txtprice'];
	
	if($_FILES['txtimg']['size']>0)
	{
		$tpath=$_FILES['txtimg']['tmp_name'];
		$ipath="prod_img/P".$pid."_".rand(1000,9999).".jpg";
		move_uploaded_file($tpath,$ipath);
		$query="update product_detail set prod_name='$pname',cat_id='$cid',description='$desc',price='$price',prod_img='$ipath' where prod_id='$pid'";
	}else{
		$query="update product_detail set prod_name='$pname',cat_id='$cid',description='$desc',price='$price' where prod_id='$pid'";
	}
	if(mysql_query($query))	
	{
		echo "<script type='text/javascript'>";
		echo "alert('Product Updated Successfully');";
		echo "window.location.href='admin_manage_product.php';";
		echo "</script>";
	}
}
?>
<div class="content">
			<div class="contact-w3l">
				<div class="container">
					<h2 class="tittle">MANAGE PRODUCT</h2>
					<div class="contact-map">
						
					<div class="contact_top">
						<div class="col-md-12 contact_left">
							
						  <form  method="post" name="form1" enctype="multipart/form-data">
							 <div class="form_details">
								<div class="col-md-6 contact_left">  
								  <input type="text" class="text" placeholder="Enter Product ID" name="txtpid" value="<?php echo $prodid; ?>" readonly="readonly">
								  <input type="text" class="text" placeholder="Enter Product Name" name="txtname" value="<?php echo $pname; ?>">
								  
								  <textarea name="txtdesc" placeholder="Enter Product Description"><?php echo $pdesc;?></textarea>
								  
							  </div>
							  <div class="col-md-6 contact_left">  
								  
								  <select class="text"  name="selcat">
									<option value="0">--Select Category--</option>
								<?php
									$qur5=mysql_query("select * from category_master");
									while($q5=mysql_fetch_array($qur5))
									{
										?>
										<option value="<?php echo $q5[0]; ?>" <?php if($q5[0]==$catid1){ echo "selected='selected'"; } ?>><?php echo $q5[1]; ?></option>
										<?php
									}
								?>
								  </select>

								  <input type="text" class="text" placeholder="Enter Product Price" name="txtprice" value="<?php echo $price; ?>">
								  Select Product Image:
								  <input type="file" class="text" name="txtimg" id="txtimg" >
								  <div class="clearfix"> </div>
									 <div class="sub-button">
									<?php
									if(isset($_REQUEST['puid']))
									{
										?>
										<img src="<?php echo $pimg; ?>" style="width:150px; height:150px;">
										<input type="submit" value="UPDATE" name="btnupdate" onclick="return validate1();">
										<?php
									}else{
									?>	
										<input type="submit" value="SAVE" name="btnsave" onclick="return validate();">
									<?php
									}
									?>
									 </div>
							  </div>
							  </form>
							   </div>
						</div>
						<div class="col-md-12 company-right">
							<div class="company_ad">
							<?php
							$qur=mysql_query("select * from product_detail");
							if(mysql_num_rows($qur)>0)
							{
								echo "<table class='table table-bordered'>
										<tr>
											<th>PRODUCT ID</th>
											
											<th>PRODUCT NAME</th>
											<th>CATEGORY</th>
											<th>DESCRIPTION</th>
											<th>PRICE</th>
											<th>IMAGE</th>
											<th>UPDATE</th>
											<th>DELETE</th>
										</tr>";
									while($q=mysql_fetch_array($qur))
									{
										echo "<tr>";
										echo "<td>$q[0]</td>";
										echo "<td>$q[1]</td>";
										//echo "<td>$q[2]</td>";
										$qur1=mysql_query("select * from category_master where cat_id='$q[2]'");
										$q1=mysql_fetch_array($qur1);
										echo "<td>$q1[1]</td>";
										
										echo "<td>$q[3]</td>";
										echo "<td>$q[4]</td>";
										echo "<td><img src='$q[5]' style='width:150px; height:150px;'></td>";
										echo "<td><a href='admin_manage_product.php?puid=$q[0]'>UPDATE</a></td>";
										echo "<td><a href='admin_manage_product.php?pdid=$q[0]'>DELETE</a></td>";
										echo "</tr>";
									}
								echo "</table>";
							}
							else{
								echo "<h2>No Product Found</h2>";
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