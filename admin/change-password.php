
<?php
session_start();
include('include/config.php');
if(($_SESSION['login'])==0||($_SESSION['type'])=="user")
    {   
header('location:../login.php');
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
                            echo"<script>alert('Incorrect password!');</script>";
                        }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Change Password</title>
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
								<h3>Admin Change Password</h3>
							</div>
							<div class="module-body">

			<form class="form-horizontal row-fluid" name="chngpwd" method="post" onSubmit="return valid();">
									
				<div class="control-group">
				<label class="control-label" for="basicinput">Current Password</label>
				<div class="controls">
				<input type="password" placeholder="Enter your current Password"  name="password" class="span8 tip" required>
				</div>
				</div>


				<div class="control-group">
				<label class="control-label" for="basicinput">New Password</label>
				<div class="controls">
				<input type="password" placeholder="Enter your new current Password"  name="newpassword" class="span8 tip" required>
				</div>
				</div>

				<div class="control-group">
				<label class="control-label" for="basicinput">Current Password</label>
				<div class="controls">
				<input type="password" placeholder="Enter your new Password again"  name="confirmpassword" class="span8 tip" required>
				</div>
				</div>




										

										<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Submit</button>
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

<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
</body>
</html>
