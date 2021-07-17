<?php
session_start();
include 'include/config.php';
if(isset($_POST['submit']))
{
	$category=$_POST['category'];
	$productname=$_POST['productname'];
	$productcompany=$_POST['productcompany'];
	$productprice=$_POST['productprice'];
	$productpricebd=$_POST['productpricebd'];
	$productdescription=$_POST['productdescription'];
	$productscharge=$_POST['productshippingcharge'];
	$productavailability=$_POST['pavailability'];
	$pquantity=$_POST['pquantity'];
	$id=$_GET['id'];
	$cid=$_POST['category'];
	$sql=mysqli_query($mysqli,"UPDATE  products set cid='$cid',pname='$productname',pcompany='$productcompany',pprice='$productprice',pdescription='$productdescription',shippingcharge='$productscharge',pavailability='$productavailability',pquantity='$pquantity',ppricebd='$productpricebd' where pid='$id' ");
	echo "<script>alert('Data Updated');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Edit Product</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>


</head>
<body>
<?php include 'include/header.php';?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include'include/sidebar.php';?>				
				<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Insert Product</h3>
							</div>
							<div class="module-body">
								<form action=""class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">
 									
									<?php 
										$id=$_GET['id'];
										$query=mysqli_query($mysqli,"SELECT * FROM products JOIN categories ON products.cid=categories.cid where pid='$id'");
										while($row=mysqli_fetch_array($query))
										{
											?>

										
									<div class="control-group">
										<label class="control-label" for="basicinput">Category</label>
											<div class="controls">
												<select name="category" class="span8 tip"required>
													<option value="<?php echo $row['cid'];?>"><?php echo $row['cname'];?></option> 
												</select>
											</div>
									</div>
									
									<div class="control-group">
										<label class="control-label" for="basicinput">Product Name</label>
											<div class="controls">
												<input type="text"    name="productname"  placeholder="Enter Product Name" value="<?php echo $row['pname'];?>" class="span8 tip" >
											</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="basicinput">Product Company</label>
											<div class="controls">
												<input type="text"    name="productcompany"  placeholder="Enter Product Comapny Name" value="<?php echo $row['pcompany'];?>" class="span8 tip" required>
											</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="basicinput">Product Price Before Discount</label>
											<div class="controls">
												<input type="text"    name="productpricebd"  placeholder="Enter Product Price" value="<?php echo $row['ppricebd'];?>"  class="span8 tip" required>
											</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="basicinput">Product Price</label>
											<div class="controls">
												<input type="text"    name="productprice"  placeholder="Enter Product Price" value="<?php echo $row['pprice'];?>" class="span8 tip" required>
											</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="basicinput">Product Description</label>
											<div class="controls">
												<textarea  name="productdescription"  placeholder="Enter Product Description" rows="6" class="span8 tip"><?php echo $row['pdescription'];?>
												</textarea>  
											</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="basicinput">Product Shipping Charge</label>
											<div class="controls">
												<input type="text"    name="productshippingcharge"  placeholder="Enter Product Shipping Charge" value="<?php echo $row['shippingcharge'];?>" class="span8 tip" required>
											</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="basicinput">Product Availability</label>
											<div class="controls">
												<select   name="pavailability"  id="productAvailability" class="span8 tip" required>
													<option value="<?php echo $row['pavailability'];?>"><?php echo $row['pavailability'];?></option>
													<option value="In Stock">In Stock</option>
													<option value="Out of Stock">Out of Stock</option>
												</select>
											</div>
									</div><div class="control-group">
										<label class="control-label" for="basicinput">Product Quantity</label>
											<div class="controls">
												<input type="text"    name="pquantity"  placeholder="Enter Product Quantity" value="<?php echo $row['pquantity'];?>" class="span8 tip" required>
											</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="basicinput">Product Image1</label>
											<div class="controls">
												<img src="productimages/<?php echo $row['pid'];?>/<?php echo $row['pimage1'];?>" width="200" height="100">
												<a href="update-image1.php?id=<?php echo $row['pid'];?>">Change Image</a>
											</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="basicinput">Product Image2</label>
											<div class="controls">
												<img src="productimages/<?php echo $row['pid'];?>/<?php echo $row['pimage2'];?>" width="200" height="100">
												<a href="update-image2.php?id=<?php echo $row['pid'];?>">Change Image</a>
											</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="basicinput">Product Image3</label>
											<div class="controls">
												<img src="productimages/<?php echo $row['pid'];?>/<?php echo $row['pimage3'];?>" width="200" height="100">
												<a href="update-image3.php?id=<?php echo $row['pid'];?>">Change Image</a>
											</div>
									</div>
									<?php }?>
									<div class="control-group">
										<div class="controls">
											<button type="submit" name="submit" class="btn">Update</button>
										</div>
									</div>
								</form>
							</div>
						</div>				
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include'include/footer.php';?>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>

</body>
</html>