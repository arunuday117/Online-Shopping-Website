<?php
session_start();
error_reporting(0);
include 'includes/config.php';
if(isset($_POST['submit']))
{
	if ($_SESSION['login']==0)
	{
		if(!empty($_SESSION['cart']))
		{
			foreach($_POST['quantity'] as $key => $val)
			{
				if($val==0)
				{
					unset($_SESSION['cart'][$key]);
				}
				else
				{
					$_SESSION['cart'][$key]['quantity']=$val;
				}
			}
			
		}
	}
	else
	{
		
			foreach($_POST['quantity'] as $key=>$val)
				{
					$sq=mysqli_query($mysqli,"UPDATE `addtocart` SET `quantity`='$val' WHERE pid='$key'");
				}
					echo "<script>alert('Your Cart has been Updated');</script>";
		
	}
}
if (isset($_POST['continue']))
{
	
	if ($_SESSION['login']==0)
	{
		if(!empty($_SESSION['cart']))
		{
			foreach($_POST['quantity'] as $key => $val)
			{
				if($val==0)
				{
					unset($_SESSION['cart'][$key]);
				}
				else
				{
					$_SESSION['cart'][$key]['quantity']=$val;
				}
			}
			
			
		}
	}
	else
	{
		
			foreach($_POST['quantity'] as $key=>$val)
				{
					$sq=mysqli_query($mysqli,"UPDATE `addtocart` SET `quantity`='$val' WHERE pid='$key'");
				}
					echo "<script>alert('Your Cart has been Updated');</script>";
	}
header('location:index.php');
}
if(isset($_POST['remove_code']))
{
    if ($_SESSION['login']==0)
    {
		if(!empty($_SESSION['cart']))
		{
			foreach($_POST['remove_code'] as $key)
			{
					
				unset($_SESSION['cart'][$key]);
			}
				echo "<script>alert('Your Cart has been Updated');</script>";
		}
	}
	if ($_SESSION['login']==1)
	{
		foreach($_POST['remove_code'] as $key)
			{
				$sq=mysqli_query($mysqli,"DELETE FROM `addtocart` WHERE pid='$key'");
			}
				echo "<script>alert('Your Cart has been Updated');</script>";
	}
	
}

if(isset($_POST['checkout'])) 
{
	
		if(($_SESSION['login'])==0)
	   	{   
	   		
		 	header('location:login.php');
		}
		if ($_SESSION['login']==1)
		{
			header('location:checkout.php');
		}
}

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


	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Your cart</h4>
		</div>
	</div>
	<!-- Page info end -->


	<!-- cart section end -->
	<section class="cart-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="cart-table">
						<div class="cart-table-warp">
							<form name="cart" method="post">		
								<table>
									<thead>
										<tr>
											<th class="product-th"><h5>Product</h5></th>
											<th class="quy-th"><h5>Quantity</h5></th>
											<th class="total-th"><h5>Price</h5></th>
											<th class="product-th"><h5>Remove</h5></th>
										</tr>
									</thead>
									<tbody>
										<?php
										if ($_SESSION['login']==0)
										{
										 $pdtid=array();
										 $totalprice=0;
										foreach($_SESSION['cart'] as $id => $value){
										$sql = "SELECT * FROM products WHERE pid ='$id' ORDER BY pid ASC";
										$query = mysqli_query($mysqli,$sql);
										$totalqunty=0;
										if(!empty($query))
										{
											while($row = mysqli_fetch_array($query))
											{
												$quantity=$_SESSION['cart'][$row['pid']]['quantity'];
												$subtotal= $_SESSION['cart'][$row['pid']]['quantity']*$row['pprice']+$row['shippingcharge'];
												$totalprice += $subtotal;
												$_SESSION['pid']=$row['pid'];
												$_SESSION['qnty']=$totalqunty+=$quantity;
											    $_SESSION['tot']=$subtotal;
												array_push($pdtid,$row['pid']);

											?>
										<tr>
											<td class="product-col">
												<img src="admin/productimages/<?php echo $row['pid'];?>/<?php echo $row['pimage1'];?>" alt="">
												<div class="pc-title">
													<h4><a href="product-details.php?pid=<?php echo $pd=$row['pid'];?>" ><?php echo $row['pname'];$_SESSION['sid']=$pd;?></a></h4>
													<p><?php echo "Rs"." ".$row['pprice']; ?>.00</p>
												</div>
											</td>
											<td class="quy-col">
												<div class="quantity">
											        <div class="pro-qty">
														<input type="text" value="<?php echo $_SESSION['cart'][$row['pid']]['quantity']; ?>" name="quantity[<?php echo $row['pid']; ?>]" id="<?php echo $row['pid']; ?>" class="qnty">
													</div>
						                    	</div>
											</td>
											<td class="total-col">
												<h4><?php echo "Rs"." ".$row['pprice']; ?>.00</h4>
											</td>
											<td class="romove-item">
												<input type="checkbox" name="remove_code[]" value="<?php echo $row['pid'];?>" />
											</td>
										</tr>
									</tbody>
									<?php } } }
									$_SESSION['qnty']=$_POST['quantity'];
										$_SESSION['pid']=$pdtid;

									?>
									
									<?php }
										if($_SESSION['login']==1)
										{
											$id=$_SESSION['id'];
											$totalprice=0;
											$sq=mysqli_query($mysqli,"SELECT * FROM addtocart WHERE uid='$id'");
											while ($row=mysqli_fetch_array($sq))
											{ 
												$subtotal=0;
												$subtotal=$row['quantity']*$row['amount'];
												$totalprice+=$subtotal;
												$apid=$row['pid'];
												$po=mysqli_query($mysqli,"SELECT * FROM addtocart NATURAL JOIN products WHERE pid='$apid'");
												$nrow=mysqli_fetch_array($po)
												
									?>
										<tr>
											<td class="product-col">
												<img src="admin/productimages/<?php echo $nrow['pid'];?>/<?php echo $nrow['pimage1'];?>" alt="">
												<div class="pc-title">
													<h4><a href="product-details.php?pid=<?php echo $pd=$nrow['pid'];?>" ><?php echo $nrow['pname'];?></a></h4>
													<p><?php echo "Rs"." ".$nrow['pprice']; ?>.00</p>
												</div>
											</td>
											<td class="quy-col">
												<div class="quantity">
							                        <div class="pro-qty">
														<input type="text" value="<?php echo $row['quantity']; ?>" name="quantity[<?php echo $row['pid']; ?>]" id="<?php echo $row['pid']; ?>" class="qnty">
													</div>
		                    					</div>
											</td>
											
											<td class="total-col">
												<h4><?php echo "Rs"." ".$subtotal; ?>.00</h4>
											</td>
											<td class="romove-item">
												<input type="checkbox" name="remove_code[]" value="<?php echo $row['pid'];?>" />
											</td>
										</tr>
									</tbody>
				<?php }}?>								
									<tfoot>
										<tr>
											<td colspan="7">
												<div class="shopping-cart-btn">
													<span class="">
													<input type="submit" name="submit" value="Update shopping cart" class="btn btn-upper btn-primary pull-right outer-right-xs">	
													</span>
												</div><!-- /.shopping-cart-btn -->
											</td>
										</tr>
									</tfoot>	
						
								</table>
							<div class="total-cost">
								<h6>Total <span>&#8377;<?php echo "$totalprice". ".00"; ?></span></h6>
							</div>
						</div>
					</div>

					
				</div>
				<div class="col-lg-4 card-right">
					
					<button name="checkout" class="site-btn">Proceed to checkout</button>
					<button name="continue" class="site-btn sb-dark">Continue shopping</button>
				</div>
				</form>
			</div>
		</div>
	</section>
	<!-- cart section end -->




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


	<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
$(document).ready(function(){

	$(".qtybtn").click(function(e){ 
	        //e.preventDefault();
	     var $button = $(this);
		var oldValue = $button.parent().find('input').val();
		if ($button.hasClass('inc')) {
			var newVal = parseFloat(oldValue) + 1;
		} else {
			// Don't allow decrementing below zero
			if (oldValue > 0) {
				var newVal = parseFloat(oldValue) - 1;
			} else {
				newVal = 0;
			}
		}
		//$button.parent().find('input').val(newVal); 
	        // alert($button.parent().find('input').attr('id'))    
	        $.ajax({
	            url: 'cart-update.php',
	            type: "POST",
	            data: "id=" + $button.parent().find('input').attr('id') +"&val=" + newVal,
	            dataType: 'json',
	            success: function (data) {
	               
	            }
	        });
	});
});
</script>

	</body>
</html>
