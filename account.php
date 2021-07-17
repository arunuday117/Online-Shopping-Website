<?php
	session_start();
	include 'includes/config.php';
	if($_SESSION['login']==0)
    {   
		header('location:index.php');
	}
	else
	{
		if(isset($_POST['update']))
		{
			
			$firstname=$_POST['firstname'];
			$lastname=$_POST['lastname'];
			$contactno=$_POST['contactno'];
			$id=$_SESSION['id'];
			$query=mysqli_query($mysqli,"UPDATE `userdetails` SET `First Name`='$firstname',`Last Name`='$lastname',`contactno`='$contactno' WHERE did='$id'");

			if($query)
			{
				echo "<script>alert('Your info has been updated');</script>";
			}
		}
	}
	if(isset($_POST['submit']))
	{
		if($_POST['newpassword']==$_POST['confirmpassword'])
        {
            $pass=md5($_POST['password']);
            $email=$_SESSION['email'];
            $newpass=md5($_POST['newpassword']);
			$sql=mysqli_query($mysqli,"SELECT * FROM  login WHERE password='$pass' AND useremail='$email'");
			if($sql)
			{
				$sqli=mysqli_query($mysqli,"UPDATE login set password='$newpass' WHERE useremail='$email'");
				echo"<script>alert('Password Successfull Changed');</script>";
			}
			else
			{
				echo "<script>alert('Cannot Update');</script>";
			}
        }
		else
		{
			echo "<script>alert('Current Password not match !!');</script>";
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
	
	<link rel="stylesheet" href="assets/css/main.css">
	<link rel="stylesheet" href="assets/css/green.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="css/bootstrap-select.min.css">

		<!-- Demo Purpose Only. Should be removed in production -->
		<link rel="stylesheet" href="assets/css/config.css">

		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link rel="shortcut icon" href="assets/images/favicon.ico">
		<script language="javascript" type="text/javascript">
		var popUpWin=0;
		function popUpWindow(URLStr, left, top, width, height)
		{
		 if(popUpWin)
		{
		if(!popUpWin.closed) popUpWin.close();
		}
		popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
		}

		</script>
	
</head>
<body>
	<?php include 'includes/header.php';?>
<div class="body-content outer-top-bd">
	<div class="container">
		<div class="checkout-box inner-bottom-sm">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<div class="panel panel-default checkout-step-01">
							<div class="panel-heading">
						    	<h4 class="unicase-checkout-title">
							        <a  data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
							          	<span>1</span>My Profile
							        </a>
							     </h4>
					    	</div>
							<div id="collapseOne" class="panel-collapse collapse in">
								<div class="panel-body">
									<div class="row">		
										<h4>Personal info</h4>
										<div class="col-md-12 col-sm-12 already-registered-login">

										<?php
											$query=mysqli_query($mysqli,"SELECT * FROM userdetails JOIN login ON userdetails.did=login.did WHERE uid='".$_SESSION['id']."'");
											while($row=mysqli_fetch_array($query))
											{
											?>

											<form class="register-form" role="form"action="" method="post">
												<div class="form-group">
												   	<label class="info-title" for="name">First Name<span>*</span></label>
												    	<input type="text" class="form-control unicase-form-control text-input" value="<?php echo $row['First Name'];?>" id="name" name="firstname" required="required">
												</div>

												<div class="form-group">
												    <label class="info-title" for="name">Last Name<span>*</span></label>
												    	<input type="text" class="form-control unicase-form-control text-input" value="<?php echo $row['Last Name'];?>" id="name" name="lastname" required="required">
												</div>

												<div class="form-group">
													<label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
												 		<input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" value="<?php echo $row['useremail'];?>" readonly>
												</div>
												<div class="form-group">
													<label class="info-title" for="Contact No.">Contact No. <span>*</span></label>
													   	<input type="text" class="form-control unicase-form-control text-input" id="contactno" name="contactno" required="required" value="<?php echo $row['contactno'];?>"  maxlength="10">
												</div>
						  						<button type="submit" name="update" class="btn-upper btn btn-primary checkout-page-button">Update</button>
											</form>
												<?php } ?>
										</div>	
									</div>			
								</div>
							</div>
						</div>
						<div class="panel panel-default checkout-step-02">
							<div id="collapseOne" class="panel-collapse collapse in">
								<div class="panel-heading">
									<h4 class="unicase-checkout-title">
								 	<a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseTwo">
									<span>2</span>Change Password
									</a>
									</h4>
								</div>
								<div id="collapseTwo" class="panel-collapse collapse">
								    <div class="panel-body">
								     	<form class="register-form" role="form" method="post" name="chngpwd" onSubmit="return valid();">
										<div class="form-group">
							    			<label class="info-title" for="Current Password">Current Password<span>*</span></label>
							    				<input type="password" class="form-control unicase-form-control text-input" id="cpass" name="password" required="required">
							 			</div>
										<div class="form-group">
							    			<label class="info-title" for="New Password">New Password <span>*</span></label>
					 						<input type="password" class="form-control unicase-form-control text-input" id="newpass" name="newpassword">
							  			</div>
							  			<div class="form-group">
										    <label class="info-title" for="Confirm Password">Confirm Password <span>*</span></label>
										    	<input type="password" class="form-control unicase-form-control text-input" id="cnfpass" name="confirmpassword" required="required" >
										</div>
							  			<button type="submit" name="submit" class="btn-upper btn btn-primary checkout-page-button">Change </button>
										</form>
									</div>
								</div>
							</div>
						</div><!-- /.checkout-steps -->
					</div><!-- /.row -->
			</div><!-- /.checkout-box -->
		</div>
	</div>
</div>
							
							<h4 style="margin-left: 30px;
									    padding-left: 20px;
									    text-transform: uppercase;
									    font-size: 21px;">Order History</h4>

								<div class="body-content outer-top-xs">
									<div class="container">
										<div class="row inner-bottom-sm">
											<div class="shopping-cart">
												<div class="col-md-12 col-sm-12 shopping-cart-table ">
													<div class="table-responsive">
													<form name="cart" method="post">	

													<table class="table table-bordered">
														<thead>
															<tr>
																<th class="cart-romove item">#</th>
																<th class="cart-description item">Image</th>
																<th class="cart-product-name item">Product Name</th>
														
																<th class="cart-qty item">Quantity</th>
																<th class="cart-sub-total item">Price Per unit</th>
																<th class="cart-sub-total item">Shipping Charge</th>
																<th class="cart-total item">Grandtotal</th>
																<th class="cart-total item">Payment Method</th>
																<th class="cart-description item">Order Date</th>
																<th class="cart-total last-item">Action</th>
															</tr>
														</thead><!-- /thead -->
														
														<tbody>

														<?php 
														$id=$_SESSION['id'];
														$query=mysqli_query($mysqli,"SELECT * FROM products JOIN orders ON products.pid=orders.pid JOIN orderdetails ON orders.orid=orderdetails.orid  where orders.uid='$id' AND orders.paymentmethod is not null");
														$cnt=1;
														while($row=mysqli_fetch_array($query))
														{
														?>
															<tr>
																<td><?php echo $cnt;?></td>
																<td class="cart-image">
																	<a class="entry-thumbnail" href="detail.html">
																	    <img src="admin/productimages/<?php echo $row['pid'];?>/<?php echo $row['pimage1'];?>" alt="" width="84" height="146">
																	</a>
																</td>
																<td class="cart-product-name-info">
																	<h4 class='cart-product-description'><a href="product-details.php?pid=<?php echo $row['pid'];?>">
																	<?php echo $row['pname'];?></a></h4>
																	
																	
																</td>
																<td class="cart-product-quantity">
																	<?php echo $qty=$row['qnty']; ?>   
													            </td>
																<td class="cart-product-sub-total"><?php echo $price=$row['pprice']; ?>  </td>
																<td class="cart-product-sub-total"><?php echo $shippcharge=$row['shippingcharge']; ?>  </td>
																<td class="cart-product-grand-total"><?php echo (($qty*$price)+$shippcharge);?></td>
																<td class="cart-product-sub-total"><?php echo $row['paymentmethod']; ?>  </td>
																<td class="cart-product-sub-total"><?php echo $row['orderdate']; ?>  </td>
																
																<td>
											 					<a href="javascript:void(0);" onClick="popUpWindow('track-order.php?oid=<?php echo ($row['orid']);?>');" title="Track order">
																Track</td>
															</tr>
															<?php $cnt=$cnt+1;} ?>
															
														</tbody><!-- /tbody -->
													</table><!-- /table -->
													</form>
												</div>
											</div>
										</div><!-- /.shopping-cart -->
									</div> <!-- /.row -->
								</div><!-- /.container -->
							</div><!-- /.body-content -->
						</div>
				

	<?php include 'includes/footer.php';?>
<script>
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
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/main.js"></script>
	<script src="assets/js/jquery-1.11.1.min.js"></script>
		
	<script src="js/bootstrap-hover-dropdown.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	
	<script src="js/echo.min.js"></script>
	<script src="js/jquery.easing-1.3.min.js"></script>
	<script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/wow.min.js"></script>
	<script src="js/scripts.js"></script>

	<!-- For demo purposes – can be removed on production -->
	
	<script src="switchstylesheet/switchstylesheet.js"></script>
	
	
</body>
</html>