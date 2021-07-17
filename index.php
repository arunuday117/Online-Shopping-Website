<?php
session_start();
 include 'includes/config.php';
if(!isset($_SESSION['login']))
{
	$_SESSION['login']=0;
}
 
 if(isset($_GET['action']) && $_GET['action']=="add")
{
	$id=$_GET['id'];
	if ($_SESSION['login']==0)
		{
			if(isset($_SESSION['cart'][$id]))
				{ 
					$_SESSION['cart'][$id]['quantity']++;
				}
			else
				{
					$sql_p="SELECT * FROM products WHERE pid='$id'";
					$query_p=mysqli_query($mysqli,$sql_p);
					if(mysqli_num_rows($query_p)!=0)
						{
							$row_p=mysqli_fetch_array($query_p);
							$_SESSION['cart'][$row_p['pid']]=array("quantity" => 1, "price" => $row_p['pprice']);
							header('location:cart.php?ip=$ip');
						}

				}
		}
		if (($_SESSION['login'])==1) 
		{
			$uid=$_SESSION['id'];
			$sql = "SELECT * FROM products WHERE pid ='$id'";
			$query=mysqli_query($mysqli,$sql);
			while($row = mysqli_fetch_array($query))
				{
					$price=$row['pprice'];
					$try="INSERT INTO `addtocart`(`uid`, `pid`, `quantity`, `amount`) VALUES ('$uid','$id','1','$price')";
					$sql=mysqli_query($mysqli,$try);
					header('location:cart.php');
				}
		}
}
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>E-MART</title>
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
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
	<!-- Hero section -->
	<section class="hero-section">
		<div class="hero-slider owl-carousel">
			<div class="hs-item set-bg" data-setbg="img/bg.jpg">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-7 text-white">
							<span>New Arrivals</span>
						</div>
					</div>
					
				</div>
			</div>
			<div class="hs-item set-bg" data-setbg="img/bg-2.jpg">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-7 text-white">
							<span>New Arrivals</span>
							
						</div>
					</div>
				
				</div>
			</div>
		</div>
		<div class="container">
			<div class="slide-num-holder" id="snh-1"></div>
		</div>
	</section>
	<!-- Hero section end -->



	<!-- Features section -->
	<section class="features-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="img/icons/1.png" alt="#">
						</div>
						<h2>Fast Secure Payments</h2>
					</div>
				</div>
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="img/icons/2.png" alt="#">
						</div>
						<h2>Premium Products</h2>
					</div>
				</div>
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="img/icons/3.png" alt="#">
						</div>
						<h2>Free & fast Delivery</h2>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Features section end -->


	<!-- letest product section -->
	<section class="top-letest-product-section">
		<div class="container">
			<div class="section-title">
				<h2>LATEST PRODUCTS</h2>
			</div>
			<div class="product-slider owl-carousel">
					<?php
		$rep=mysqli_query($mysqli,"SELECT * FROM products where pid BETWEEN '10' AND '20'");
		while ($row=mysqli_fetch_array($rep))
		{
			?>
				<div class="product-item">
					
					<div class="pi-pic">
						<a href="product.php?pid=<?php echo $row['pid'];?>&cid=<?php echo $row['cid'];?>">
						<img src="admin/productimages/<?php echo $row['pid'];?>/<?php echo $row['pimage1'];?>" alt="" class="cat-image"></a>
						<div class="pi-links">
							<a href="index.php?page=product&action=add&id=<?php echo $row['pid']; ?>" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>&#8377;<?php echo $row['pprice'];?></h6>
						<h6>&#8377;<strike><?php echo $row['ppricebd'];?></strike></h6>
						<p><?php echo $row['pname'];?> </p>
					</div>
					
				</div>

		<?php }?>
			</div>
		</div>
	</section>
	<!-- letest product section end -->



	<!-- Product filter section -->
	<section class="product-filter-section">
		<div class="container">
			<div class="section-title">
				<h2>BROWSE TOP SELLING PRODUCTS</h2>
			</div>
			<div class="row">
				<?php
		$rep=mysqli_query($mysqli,"SELECT * FROM products where pid<='12'");
		while ($row=mysqli_fetch_array($rep))
		{
			?>
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="admin/productimages/<?php echo $row['pid'];?>/<?php echo $row['pimage1'];?>" alt=""class="cat-image">
							<div class="pi-links">
								<a href="product.php?page=product&action=add&id=<?php echo $row['pid']; ?>" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								
							</div>
						</div>
						<div class="pi-text">
							<h6>&#8377;<?php echo $row['pprice'];?></h6>
							<h6>&#8377;<strike><?php echo $row['ppricebd'];?></strike></h6>
							<p><?php echo $row['pname'];?> </p>
						</div>
					</div>
				</div>
				<?php }?>
			</div>
		</div>
	</section>
	<!-- Product filter section end -->


	
<?php include 'includes/footer.php';?>



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