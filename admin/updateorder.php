<?php
session_start();
include 'include/config.php';
if($_SESSION['login']==0)
  { 
    header('location:../login.php');
  }
else
  {
    $id=$_SESSION['id'];
    $oid=$_GET['oid'];
    if(isset($_POST['submit1']))
      {
        $status=$_POST['status'];
        $query=mysqli_query($mysqli,"INSERT INTO `ordertrack`(`uid`, `orid`, `status`) VALUES ('$id','$oid','$status')");
        $sql=mysqli_query($mysqli,"UPDATE orders set ostatus='$status' where orid='$oid'");
        echo "<script>alert('Order updated sucessfully...');</script>";
      }
  }
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Update Orders</title>
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
                         	 	<b>Update Order</b>
                        	</div>
						<div class="module-body">
							<form name="updateticket" id="updateticket" method="post">	
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display table-responsive" >
									<tr height="30">
				                      <td  ><b>Order Id:</b></td>
				                      <td  ><?php echo $oid;?></td>
				                    </tr>
				                        <?php 
				                          $ret=mysqli_query($mysqli,"SELECT * FROM orders WHERE orid='$oid'");
				                          while($row=mysqli_fetch_array($ret))
				                            {
				                             ?>
				              		  <tr >
				                      <td ><b>At Date:</b></td>
				                      <td  ><?php echo $row['orderdate'];?></td>
				                    </tr>
				                    <tr >
				                      <td  ><b>Status:</b></td>
				                      <td  ><?php echo $row['ostatus'];?></td>
				                    </tr>
				                    <tr>
				                      <td colspan="2"><hr></td>
				                    </tr>
				                        <?php } ?>
				                        <?php 
				                          $st='Delivered';
				                          $rt = mysqli_query($mysqli,"SELECT * FROM orders WHERE orid='$oid'");
				                           while($num=mysqli_fetch_array($rt))
				                           {
				                           $currrentSt=$num['ostatus'];
				                           }
				                           if($st==$currrentSt)
				                           { ?>
				                    <tr>
				                      <td colspan="2"><b>Product Delivered </b></td>
				                    </tr>
				                        <?php }else  {
				                        ?>
				                    <tr >
				                      <td >Status: </td>
				                      <td ><span class="fontkink1" >
				                        <select name="status" class="fontkink" required="required" >
				                          <option value="">Select Status</option>
				                          <option value="in Process">In Process</option>
				                          <option value="Delivered">Delivered</option>
				                        </select>
				                        </span></td>
				                    </tr>
				                    <tr>
				                      <td>&nbsp;</td>
				                      <td>&nbsp;</td>
				                    </tr>
				                    <tr>
				                      <td >       </td>
				                      <td  > <input type="submit" name="submit1"  value="update"   size="40"  style="cursor: pointer;" /> &nbsp;&nbsp;   
				                      </td>
				                    </tr>
				                   <?php } ?>
								</table>
							</form>
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
	
</body>
</html>