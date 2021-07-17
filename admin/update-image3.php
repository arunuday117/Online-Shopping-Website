
<?php
session_start();
include 'include/config.php';
if($_SESSION['login']==0)
{	
	header('location:../login.php');
}
else
{
	$pid=$_GET['id'];
	if(isset($_POST['submit']))
	{

		$productimage3=$_FILES["productimage3"]["name"];
		move_uploaded_file($_FILES["productimage3"]["tmp_name"],"productimages/$pid/".$_FILES["productimage3"]["name"]);
		$sql=mysqli_query($mysqli,"UPDATE products SET pimage3='$productimage3' where pid='$pid'");

	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Update Product Image</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>				
				<div class="span9">
					<div class="content">
						<div class="module">
							<div class="module-head">
								<h3>Update Product Image 3</h3>
							</div>
							<div class="module-body">
								<form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">

								<?php 
								$pid=$_GET['id'];
								$query=mysqli_query($mysqli,"SELECT pname,pimage3 FROM products WHERE pid='$pid'");
								while($row=mysqli_fetch_array($query))
								{
								?>


									<div class="control-group">
										<label class="control-label" for="basicinput">Product Name</label>
											<div class="controls">
												<input type="text"    name="productname"  readonly value="<?php echo $row['pname'];?>" class="span8 tip" required>
											</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="basicinput">Current Product Image3</label>
											<div class="controls">
												<img src="productimages/<?php echo $pid;?>/<?php echo $row['pimage3'];?>" width="200" height="100"> 
											</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="basicinput">New Product Image3</label>
											<div class="controls">
												<input type="file" name="productimage3" id="productimage3" value="" class="span8 tip" required>
											</div>
									</div>
								<?php } ?>

									<div class="control-group">
										<div class="controls">
											<button type="submit" name="submit" class="btn">Update</button>
										</div>
									</div>
								</form>
							</div>
						</div>		
					</div>
				</div>
			</div>
		</div>
	</div>

<?php include('include/footer.php');?>
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