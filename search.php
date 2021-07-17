<?php
include 'includes/config.php';

?>


<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>E-MART </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/logo.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<?php include 'includes/header.php';?>
	<!-- Category section -->
	<section class="category-section spad">
		<div class="container">
			<div class="row">
				
				<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
					<div class="container">
					<div class="row">
									
						<?php
						
						   $searchq=mysqli_real_escape_string($mysqli,$_POST['text']);
						   $searchq=preg_replace("#[^0-9a-z]#i","", $searchq);


							$ret=mysqli_query($mysqli,"SELECT * FROM categories WHERE cname LIKE '%$searchq%' ");
							$num=mysqli_num_rows($ret);
							if($num>0)
							{

							 while($pe=mysqli_fetch_array($ret))
								{
									$cid=$pe['cid'];
									$re=mysqli_query($mysqli,"SELECT * FROM products WHERE cid='$cid'");
									while($row=mysqli_fetch_array($re))
									{
									?>	
								
						<div class="col-lg-4 col-sm-6">
							<div class="product-item">
								<div class="pi-pic">
									<a href="product.php?pid=<?php echo $row['pid'];?>&cid=<?php echo $row['cid'];?>">
										<img src="admin/productimages/<?php echo $row['pid'];?>/<?php echo $row['pimage1'];?>" alt="" class="cat-image"></a>
									<div class="pi-links">
										<a href="category.php?page=product&action=add&id=<?php echo $row['pid']; ?>" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
									</div>
								</div>
								<div class="pi-text">
									<h6>&#8377;<?php echo $row['pprice'];?></h6>
									<p><?php echo $row['pname'];?></p>
								</div>
							</div>
						</div>
					
						<?php } } } 
						elseif ($num==0)
						{
							$se=mysqli_query($mysqli,"SELECT * FROM products WHERE pname LIKE '%$searchq%'OR pprice LIKE '%$searchq%'OR pcompany LIKE '%$searchq%'");
							while ($row=mysqli_fetch_array($se))
							{
							?>
							<div class="col-lg-4 col-sm-6">
							<div class="product-item">
								<div class="pi-pic">
									<a href="product.php?pid=<?php echo $row['pid'];?>&cid=<?php echo $row['cid'];?>">
										<img src="admin/productimages/<?php echo $row['pid'];?>/<?php echo $row['pimage1'];?>" alt="" class="cat-image"></a>
									<div class="pi-links">
										<a href="category.php?page=product&action=add&id=<?php echo $row['pid']; ?>" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
									</div>
								</div>
								<div class="pi-text">
									<h6>&#8377;<?php echo $row['pprice'];?></h6>
									<h6>&#8377;<strike><?php echo $row['ppricebd'];?></strike></h6>
									<p><?php echo $row['pname'];?></p>
								</div>
							</div>
						</div>
						<?php }}
						else{?>
							 	<div class="col-sm-6 col-md-4 wow fadeInUp"> <h3>No Product Found</h3>
		</div>

<?php } ?>						
					</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Category section end -->


	<!-- Footer section -->
	<?php
	include 'includes/footer.php';
	?>
	<!-- Footer section end -->



	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>
