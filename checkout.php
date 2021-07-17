<?php
session_start();
include 'includes/config.php';
if(($_SESSION['login'])==0)
{   
	header('location:login.php');
}
if (isset($_POST['order']))
{
		$id=$_SESSION['id'];
		$method=$_POST['mode'];
		$query=mysqli_query($mysqli,"SELECT * FROM addtocart WHERE uid='$id'");
		while ($row=mysqli_fetch_array($query))
		{
			$pid=$row['pid'];
			$qnty=$row['quantity'];
			$price=$row['amount'];
			$sq=mysqli_query($mysqli,"INSERT INTO `orders`(`uid`, `pid`, `qnty`, `oamount`, `ostatus`, `paymentmethod`) VALUES ('$id','$pid','$qnty','$price','NULL','$method')");
			
		}
		$firstname=$_POST['first_name'];
		$lastname=$_POST['last_name'];
		$address=$_POST['address'];
		$landmark=$_POST['landmark'];
		$pincode=$_POST['zipcode'];
		$phno=$_POST['phno'];
		date_default_timezone_set('Asia/Kolkata');// change according timezone

		$date=date('Y-m-d H:i:s',time());
		
		$k=mysqli_query($mysqli,"SELECT * FROM orders WHERE uid='$id' AND orderdate='$date'");
		while ($ne=mysqli_fetch_array($k))
		{
			if ($ne['ostatus']=='NULL')
			{
				$oid=$ne['orid'];
				$che="INSERT INTO `orderdetails`(`orid`, `ofirstname`, `olastname`, `oaddress`, `olandmark`, `opincode`, `ophone`) VALUES ('$oid','$firstname','$lastname','$address','$landmark','$pincode','$phno')";
				$opd=mysqli_query($mysqli,$che);
			}
		}
		$de=mysqli_query($mysqli,"DELETE FROM `addtocart` WHERE uid='$id'");
		echo "<script>location.href='account.php';</script>";
	 	
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
	<link rel="stylesheet" type="text/css" href="css/sweetalert.css">

	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
<?php include 'includes/header.php';?>

	<!-- checkout section  -->
	<section class="checkout-section spad">
		<div class="container">
		<div class="row">
				<div class="col-lg-8 order-2 order-lg-1">
					<form class="checkout-form" method="post">
						
						<div class="cf-title">Billing Address</div>
						<div class="row">
							<div class="col-md-7">
								<p>*Billing Information</p>
							</div>
						</div>
						<?php
						$sql=mysqli_query($mysqli,"SELECT * FROM userdetails WHERE did='".$_SESSION['did']."'");
						while ($row=mysqli_fetch_array($sql)) {
						?>
						<div class="row address-inputs">
							<div class="col-md-12">
								<input type="text" placeholder="First Name"value="<?php echo $row['First Name'];?>" name="first_name">
								<input type="text" placeholder="Last Name"value="<?php echo $row['Last Name'];?>" name="last_name" >
								<input type="text" name="address" value="<?php echo $row['uaddress'];?>"name="address">
								<input type="text" name="landmark" value="<?php echo $row['landmark'];?>"name="landmark">
								
							</div>
							<div class="col-md-6">
								<input type="text" name="zipcode" value="<?php echo $row['pincode'];?>">
							</div>
							<div class="col-md-6">
								<input type="text" name="phno" value="<?php echo $row['contactno'];?>">
							</div>
						</div>
					<?php } ?>
						<div class="cf-title">Delievery Info</div>
							<div class="row shipping-btns">
								<div class="col-6">
									<h4>Standard</h4>
								</div>
								<div class="col-6">
									<div class="cfr-item">
										<label for="ship-1">Free</label>
									</div>
								</div>
							</div>
							
						
						<div class="cf-title">Payment</div>
							<div class="cfr-item">
								<input type="radio" name="mode"value="paypal">Paypal<img src="img/paypal.png" alt="">
							</div>
							<div class="cfr-item">
								<input type="radio" name="mode"value="credit card">Credit / Debit card
									<img src="img/mastercart.png" alt="">
							</div>
							<div class="cfr-item">
								<input type="radio" name="mode"value="cod">COD
							</div>
						
					
					
						<button class="site-btn submit-order-btn" onclick="popup()"name="order">Place Order</button>
					</form>
				</div>
				<div class="col-lg-4 order-1 order-lg-2">
					<div class="checkout-cart">
						<h3>Your Cart</h3>
						<?php
						$stot=0;
					 $po=mysqli_query($mysqli,"SELECT * FROM addtocart natural join products where addtocart.pid=products.pid");
                     while ($row=mysqli_fetch_array($po)) {
                     	$stot=$stot+$row['quantity']*$row['amount'];
                     		?>
						<ul class="product-list">
							<li>
								<div class="pl-thumb"><img src="admin/productimages/<?php echo $row['pid'];?>/<?php echo $row['pimage1'];?>" alt=""></div>
								<h6><?php echo $row['pname'];?></h6>
								<p><?php echo $row['pprice']; ?></p>
							</li>
						</ul>
							<?php }?>
						 <?php 
						?>
						 <ul class="price-list">
						<li>Shipping<span>free</span></li>
							<li class="total">Total<span><?php echo $stot;?></span></li>
						</ul>
						 <?php ?> 
					</div>

				</div>
			</div>
		</div>
	</section>
	
	<!-- checkout section end -->

	 <?php include 'includes/footer.php';?>
<script type="text/javascript">

if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
function popup(){
 swal("Payment Successfull!");

}


</script>


	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/sweetalert.min.js"></script>



	</body>
</html>
