<?php
session_start();
include("admin_header.php");
include("connect.php");

//auto number code start...
$res1=mysql_query("select max(cat_id) from category_master");
$catid=0;
while($r1=mysql_fetch_array($res1))
{
	$catid=$r1[0];
}
$catid++;
//auto number code finish....
?>
<script type="text/javascript">
function validate()
{
	var v=/^[a-zA-Z ]+$/;
	if(form1.txtcat.value=="")
	{
		alert("Please Enter Category");
		form1.txtcat.focus();
		return false;
	}else{
		if(!v.test(form1.txtcat.value))
		{
			alert("Please Enter Only Alphabets in  Category");
			form1.txtcat.focus();
			return false;
		}
	}
}
</script>
<?php
if(isset($_POST['btnsave']))
{
	$catid=$_POST['txtcid'];
	$cat=$_POST['txtcat'];
	
	$query="insert into category_master values('$catid','$cat')";

	if(mysql_query($query))	
	{
		echo "<script type='text/javascript'>";
		echo "alert('Category Added Successfully');";
		echo "window.location.href='admin_manage_cat.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['cdid']))
{
	$catid1=$_REQUEST['cdid'];
	$query="delete from category_master where cat_id='$catid1'";
	if(mysql_query($query))	
	{
		echo "<script type='text/javascript'>";
		echo "alert('Category Removed Successfully');";
		echo "window.location.href='admin_manage_cat.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['cuid']))
{
	$catid=$_REQUEST['cuid'];
	$res2=mysql_query("select * from category_master where cat_id='$catid'");
	$r2=mysql_fetch_array($res2);
	$cat=$r2[1];
}

if(isset($_POST['btnupdate']))
{
	$catid=$_POST['txtcid'];
	$cat=$_POST['txtcat'];
	
	$query="update category_master set category='$cat' where cat_id='$catid'";

	if(mysql_query($query))	
	{
		echo "<script type='text/javascript'>";
		echo "alert('Category Updated Successfully');";
		echo "window.location.href='admin_manage_cat.php';";
		echo "</script>";
	}
}
?>
<div class="content">
			<div class="contact-w3l">
				<div class="container">
					<h2 class="tittle">MANAGE CATEGORY</h2>
					<div class="contact-map">
						
					<div class="contact_top">
						<div class="col-md-6 contact_left">
							
						  <form  method="post" name="form1">
							 <div class="form_details">
								  
								  <input type="text" class="text" placeholder="Enter Category ID" name="txtcid" value="<?php echo $catid; ?>" readonly="readonly">
								  <input type="text" class="text" placeholder="Enter Category" name="txtcat" value="<?php echo $cat; ?>">
								  
								  <div class="clearfix"> </div>
									 <div class="sub-button">
									<?php
									if(isset($_REQUEST['cuid']))
									{
										?>
										<input type="submit" value="UPDATE" name="btnupdate" onclick="return validate();">
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
						<div class="col-md-6 company-right">
							<div class="company_ad">
							<?php
							$qur=mysql_query("select * from category_master");
							if(mysql_num_rows($qur)>0)
							{
								echo "<table class='table table-bordered'>
										<tr>
											<th>CATEGORY ID</th>
											<th>CATEGORY</th>
											<th>UPDATE</th>
											<th>DELETE</th>
										</tr>";
									while($q=mysql_fetch_array($qur))
									{
										echo "<tr>";
										echo "<td>$q[0]</td>";
										echo "<td>$q[1]</td>";
										echo "<td><a href='admin_manage_cat.php?cuid=$q[0]'>UPDATE</a></td>";
										echo "<td><a href='admin_manage_cat.php?cdid=$q[0]'>DELETE</a></td>";
										echo "</tr>";
									}
								echo "</table>";
							}
							else{
								echo "<h2>No Category Found</h2>";
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