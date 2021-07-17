
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin|Dashboard</title>
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
							<div class="module-body">

                          

 <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-success back-widget-set text-center">
                            <i class="icon-tasks"></i>
<?php 
									 $f1="00:00:00";
									$from=date('Y-m-d')." ".$f1;
									$t1="23:59:59";
									$to=date('Y-m-d')." ".$t1;
									$query=mysqli_query($mysqli,"SELECT * FROM products JOIN orders ON products.pid=orders.pid JOIN orderdetails ON orders.orid=orderdetails.orid WHERE orders.orderdate BETWEEN '$from' AND '$to'");
										
$no=mysqli_num_rows($query);
?>


                            <h3><?php echo ($no);?></h3>
                      Today's Orders
                        </div>
                    </div>
             
               <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-warning back-widget-set text-center">
                            <i class="icon-tasks"></i>
<?php 
										$status='Delivered';
										$query=mysqli_query($mysqli,"SELECT * FROM products JOIN orders ON products.pid=orders.pid JOIN orderdetails ON orders.orid=orderdetails.orid WHERE ostatus!='$status' OR ostatus='NULL'");
$no=mysqli_num_rows($query);
?>


                            <h3><?php echo ($no);?></h3>
                          Pending Order's
                        </div>
                    </div>
               <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-danger back-widget-set text-center">
                            <i class="icon-tasks"></i>
                            <?php 
$sql ="SELECT uid from login ";
$query = mysqli_query($mysqli,$sql);
$no=mysqli_num_rows($query);
?>


                            <h3><?php echo ($no);?></h3>
                           Registered Users
                        </div>
                    </div>

			
							</div>
						</div>				
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>