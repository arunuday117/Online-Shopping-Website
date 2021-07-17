<?php
session_start();
error_reporting(0);
include 'includes/config.php';
if(isset($_GET['action']) && $_GET['action']=="add")
{
	if ($_SESSION['login']==0)
	{
		$id=$_GET['id'];
		
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
				header('location:cart.php');
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
if (isset($_POST['add']))
{
	if($_SESSION['login']==1)
	{
	 	$id=$_GET['pid'];
	 	$name=$_POST['name'];
	 	$rate=$_POST['rating'];
	 	$review=$_POST['review'];
	 	$sq=mysqli_query($mysqli,"INSERT INTO `productreviews`(`pid`, `username`, `prating`, `preview`) VALUES ('$id','$name','$rate','$review')");
	 	echo "<script>alert('Review added!');</script>";
	 }
	 else
	 {
	 	echo "<script>alert(' login to add review !');</script>";
	 }
}
 if (isset($_POST['add']))
 {
 	if ($_SESSION['login']==0)
 	{
 		echo "<script>alert('Please login in to add review!');</script>";
 	}
 	else
 	{
 		$cid=$_GET['cid'];
 		$id=$_GET['pid'];
 		$name=$_POST['name'];
 		$rate=$_POST['rating'];
 		$review=$_POST['review'];
 		$sq=mysqli_query($mysqli,"INSERT INTO `productreviews`(`pid`, `username`, `prating`, `preview`) VALUES ('$pid','$name','$rate','$review')");
 		echo "<script>alert('Review added!');</script>";
 		header('location:product.php?pid='.$id.'&cid='.$cid);
 	}
}
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>E-MART</title>
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
	<?php
	include 'includes/header.php';
	?>
	
	<!-- Header section end -->
	<!-- product section -->
	<section class="product-section">
		<?php
		$id=$_GET['pid'];
		$res=mysqli_query($mysqli,"SELECT * FROM products where pid='$id'");
		while ($row=mysqli_fetch_array($res))
		{
			?>
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="product-pic-zoom">
						<img class="product-big-img" src="admin/productimages/<?php echo $row['pid'];?>/<?php echo $row['pimage1'];?>" alt="">
					</div>
					<div class="product-thumbs" tabindex="1" style="overflow: hidden; outline: none;">
						<div class="product-thumbs-track">
							<div class="pt active" data-imgbigurl="admin/productimages/<?php echo $row['pid'];?>/<?php echo $row['pimage1'];?>"><img src="admin/productimages/<?php echo $row['pid'];?>/<?php echo $row['pimage1'];?>" alt="">
							</div>
							<div class="pt" data-imgbigurl="admin/productimages/<?php echo $row['pid'];?>/<?php echo $row['pimage2'];?>"><img src="admin/productimages/<?php echo $row['pid'];?>/<?php echo $row['pimage2'];?>" alt="">
							</div>
							<div class="pt" data-imgbigurl="admin/productimages/<?php echo $row['pid'];?>/<?php echo $row['pimage3'];?>"><img src="admin/productimages/<?php echo $row['pid'];?>/<?php echo $row['pimage3'];?>" alt="">
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 product-details">
					<h2 class="p-title"><?php echo $row['pname'];?></h2>
					&#8377;<strike><?php echo $row['ppricebd'];?></strike>
					<h3 class="p-price">&#8377;<?php echo $row['pprice'];?></h3>
					<h4 class="p-stock">Available: <span><?php echo $row['pavailability'];?></span></h4>
					
					
					
					<a href="product.php?page=product&action=add&id=<?php echo $row['pid']; ?>" class="site-btn">SHOP NOW</a>
					<div id="accordion" class="accordion-area">
						<div class="panel">
							<div class="panel-header" id="headingOne">
								<button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">Description</button>
							</div>
							<div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="panel-body">
									<p><?php echo $row['pdescription'];?></p>
								</div>
							</div>
						</div>
						<div class="panel">
							<div class="panel-header" id="headingTwo">
								<button class="panel-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">care details </button>
							</div>
							<div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
								<div class="panel-body">
									<img src="./img/cards.png" alt="">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
								</div>
							</div>
						</div>
						<div class="panel">
							<div class="panel-header" id="headingThree">
								<button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">shipping & Returns</button>
							</div>
							<div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
								<div class="panel-body">
									<h4>7 Days Returns</h4>
									<p>Cash on Delivery Available<br>Home Delivery <span>3 - 4 days</span></p>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
								</div>
							</div>
						</div>
					</div>

					<div class="social-sharing">
						<a href=""><i class="fa fa-google-plus"></i></a>
						<a href=""><i class="fa fa-pinterest"></i></a>
						<a href=""><i class="fa fa-facebook"></i></a>
						<a href=""><i class="fa fa-twitter"></i></a>
						<a href=""><i class="fa fa-youtube"></i></a>
					</div>
				</div>
				<div class="col-lg-6">

					<div class="mod-head">
						<h3>Reviews</h3>
					</div>
						<?php
								$id=$_GET['pid'];
								$sq=mysqli_query($mysqli,"SELECT * FROM productreviews WHERE pid='$id'");
								if (mysqli_num_rows($sq)>0)
								{
									while($row=mysqli_fetch_array($sq))
									{?>
										
										
										<div class="module-body">
											<?php
												echo "<b>USERNAME:</b>".$row['username']."<hr>";
												echo "<b>POSTING DATE:</b>".$row['rdate']."<hr>";
												
												echo "<b>RATING:</b>".$row['prating']."<hr>";
												echo "<b>REVIEW:</b>".$row['preview']."<br><br>";
											?>
										</div>
							  <?php }}
							  		else
							  		{
									?>
									<h3>NO REVIEWS TO SHOW</h3>
							<?php  }?>
				
				</div>
				<div class="col-lg-6 bd">
					<?php
					$id=$_GET['pid'];
					$qu=mysqli_query($mysqli,"SELECT pname FROM products WHERE pid='$id'");
					$row=mysqli_fetch_array($qu);
					?>
					<h3>Write your review here!</h3>
					<form action=""class="contact-form"method="post">
						<input type="text" placeholder="Your name"name="pname"value="<?php echo $row['pname'];?>" >
						<input type="text" placeholder="Your name"name="name" >
						<input type="text" placeholder="Rating"name="rating" >
						<textarea placeholder="Review"name="review" ></textarea>
						<button class="site-btn"name="add" >Add Review</button>
					</form>
				</div>
			</div>
		</div>
		<?php }?>
	</section>
	<!-- product section end -->


	<!-- RELATED PRODUCTS section -->

	<section class="related-product-section">
		<div class="container">
			<div class="section-title">
				<h2>RELATED PRODUCTS</h2>
			</div>
			
			
			<div class="product-slider owl-carousel">
				<?php
		$id=$_GET['cid'];
		$rep=mysqli_query($mysqli,"SELECT * FROM products where cid='$id'");
		while ($row=mysqli_fetch_array($rep))
		{
			?>
				<div class="product-item">
					
					<div class="pi-pic">
						<a href="product.php?pid=<?php echo $row['pid'];?>&cid=<?php echo $row['cid'];?>">
						<img src="admin/productimages/<?php echo $row['pid'];?>/<?php echo $row['pimage1'];?>" alt="" class="cat-image"></a>
						<div class="pi-links">
							<a href="product.php?page=product&action=add&id=<?php echo $row['pid']; ?>" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
						</div>
					</div>
					<div class="pi-text">
						<h6><?php echo $row['pprice'];?></h6>
						<p><?php echo $row['pname'];?> </p>
					</div>
					
				</div>

		<?php }?>
		
		</div>
	</section>
	<!-- RELATED PRODUCTS section end -->


	<!-- Footer section -->
	<?php
	include 'includes/footer.php';
	?>
	<!-- Footer section end -->
	<script type="text/javascript">

	if ( window.history.replaceState ) {
 		 window.history.replaceState( null, null, window.location.href );
	}
	</script>


	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<!-- <script src="js/jquery.zoom.min.js"></script> -->
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>
