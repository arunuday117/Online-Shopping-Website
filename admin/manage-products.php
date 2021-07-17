
<?php
session_start();
if(($_SESSION['login'])==0||($_SESSION['type'])=="user")
    {   
header('location:../login.php');
}
include 'include/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Manage Products</title>
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
								<h3>Manage Products</h3>
						</div>
						<div class="module-body">

							<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
								<thead>
									<tr>
										<th>#</th>
										<th>Category Name</th>
										<th>Product Name</th>
										<th>Company Name</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>

								<?php 
								$query=mysqli_query($mysqli,"select * from products natural join categories");
									$c=1;
								while($row=mysqli_fetch_array($query))
								{
								?>									
									<tr>
										<td><?php echo $c;?></td>
									    <td><?php echo $row['cname'];?></td>
										<td><?php echo $row['pname'];?></td>
										<td><?php echo $row['pcompany'];?></td>
										<td>
											<a href="edit-products.php?id=<?php echo $row['pid']?>" ><i class="icon-edit"></i></a>
											<a href="manage-products.php?id=<?php echo $row['pid']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="icon-remove-sign"></i></a>
										</td>
									</tr>
										<?php $c++; } ?>
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
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
</html>
<?php
include 'include/config.php';
if(isset($_GET['del']))
		  {
		  	$id=$_GET['id'];
		          mysqli_query($mysqli,"DELETE FROM products WHERE pid= '$id'");
		  }
?>