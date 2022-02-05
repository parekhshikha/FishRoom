<?php
session_start();
include("header.php");
include("connect.php");


?>
<div class="content">
			<div class="gallery-agile">
				<div class="container">
					<h2 class="tittle">PRODUCTS</h2>
					<div class="col-md-3">
						<BR/><BR/><BR/>
						<h3 class="title">CATEGORY</h3>
					<ul>
					<?php
					$res1=mysql_query("select * from category_master");
					while($r1=mysql_fetch_array($res1))
					{
						?>
						<br/>
						<li><h4><a href='product.php?cid=<?php echo $r1[0]; ?>'><?php echo $r1[1];?></a></h4></li>
						<?php
					}
					?>
					</ul>
					</div>
					<div class="gal-btm col-md-9">
					<?php
					if(isset($_REQUEST['cid']))
					{
						$cid=$_REQUEST['cid'];
						$qur1=mysql_query("select * from product_detail where cat_id='$cid'");
					}
					else
					{
						$qur1=mysql_query("select * from product_detail where cat_id='1'");
					}
					
					if(mysql_num_rows($qur1)>0)
					{
						while($q1=mysql_fetch_array($qur1))
						{
					?>
						
						
						<div class="col-md-6 gal-gd-sec text-center wow fadeInDownBig animated animated" data-wow-delay="0.4s">
							<a href="product_detail.php?pid=<?php echo $q1[0]; ?>" class="b-link-stripe b-animate-go  swipebox">
								<div class="gallery-gal-effect slow-zoom horizontal">
									<div class="img-box"><img src="<?php echo $q1[5]; ?>" alt=" " style='width:367px; height:244px;' /></div>
										<div class="gallery-text-box">
											<div class="gallery-gal-text">
												<h4><?php echo $q1[1]; ?></h4>
												<span class="separator"></span>
												<p>Rs. <?php echo $q1[4]; ?> /-</p>
												<span class="separator"></span>
											</div>
										</div>
								</div>
							</a>
						</div>
					
					<?php
						}
					}else
					{
						echo "<h3>No Product Found</h3>";
					}
					?>	
						<div class="clearfix"></div>
					</div>
				</div>
			</div>

		</div>
<?php
include("footer.php");
?>