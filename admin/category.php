<?php
	session_start();
 	if(($_SESSION['login'])==0||($_SESSION['type'])=="user")
    {   
 header('location:../login.php');
 }
   include 'include/config.php';
 if(isset($_POST['create']))
{
	$category=$_POST['category'];
$sql=mysqli_query($mysqli,"INSERT INTO `categories`(`cname`) VALUES ('$category')");
echo "<script>location.href='category.php';</script>";
}
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Category</title>
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
								<h3>Category</h3>
							</div>
							<div class="module-body">


			<form action=""class="form-horizontal row-fluid"method="post" >
													
				<div class="control-group">
				<label class="control-label" for="basicinput">Category Name</label>
				<div class="controls">
				<input type="text" placeholder="Enter category Name"  name="category" class="span8 tip" required>
				</div>
				</div>


	<div class="control-group">
				<div class="control-group">
											<div class="controls">
												
												<button type="submit" name="create" class="btn">Create</button>

											</div>
										</div>
											
									</form>
							</div>
						</div>


				<div class="module">
							<div class="module-head">
								<h3>Manage Categories</h3>
							</div>
							<div class="module-body">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Category</th>
											<th>Action</th>
										</tr>
									</thead>
								    <tbody>
								    	<form action="edit-category.php"method="post">
								    	<?php
                                         $in="select * from categories";
								    	 $query=mysqli_query($mysqli,$in);

                                        while($row=mysqli_fetch_array($query))
                                         {
                                          ?>									
										<tr>
											<td><?php echo $row['cid'];?></td>
											<td><?php echo $row['cname'];?></td>
											<td>
											<a href="edit-category.php?id=<?php echo $row['cid']?>" ><i class="icon-edit"></i></a>
											<a href="category.php?id=<?php echo $row['cid']?>&del=delete"onClick="return confirm('Are you sure you want to delete?')"><i class="icon-remove-sign"></i></a></td>
										</tr>
										<?php  } ?>
									</form>
								    </tbody>
										
								</table>
							</div>
						</div>						

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>	
</body>
</html>

<?php
	include 'include/config.php';
if(isset($_GET['del']))
		  {
		  	$id=$_GET['id'];
		  	echo $id;
		          $sql=mysqli_query($mysqli,"DELETE from categories where cid = '$id'");
		          $sql1=mysqli_query($mysqli,"DELETE from products where cid = '$id'");
		  }

?>
