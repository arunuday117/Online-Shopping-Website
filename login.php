<?php
	session_start();
	include 'includes/config.php';
    $_SESSION['username']='0';
  if(isset($_POST['submit']))
	{
		$email=$_POST['email'];
		$pass=md5($_POST['pass']);
		$type="null";
		$data="SELECT * from login natural join userdetails";
		$query=mysqli_query($mysqli,$data);
		while ($row=mysqli_fetch_array($query))
		{
			if($row['useremail']==$email&&$row['password']==$pass)
			{
				$uid=$row['uid'];
				if(!empty($_SESSION['cart']))
				{
					foreach ($_SESSION['pid'] as $id)
					{
						$s=$_SESSION['cart'][$id]['quantity'];
						$query=mysqli_query($mysqli,"SELECT * FROM products WHERE pid='$id'");
						while ($row=mysqli_fetch_array($query))
						{
							$price=$row['pprice'];
							$sq=mysqli_query($mysqli,"INSERT INTO `addtocart`(`uid`, `pid`, `quantity`, `amount`) VALUES ('$uid','$id','$s','$price')");
						}
							
						
					}
				}
			}
		}
	}
	if(isset($_POST['submit']))
	{
		$email=$_POST['email'];
		$pass=md5($_POST['pass']);
		$type="null";
		$data="SELECT * from login natural join userdetails";
		$query=mysqli_query($mysqli,$data);
		while ($row=mysqli_fetch_array($query))
		{
			if($row['useremail']==$email&&$row['password']==$pass)
			{
				$_SESSION['id']=$row['uid'];
				$_SESSION['username']=$row['First Name']." ".$row['Last Name'];
				$_SESSION['email']=$row['useremail'];
				$type=$row['utype'];
				$_SESSION['type']=$row['utype'];
				$_SESSION['login']=1;
				$_SESSION['did']=$row['did'];
			}
		}
		if($type=="admin")
		{
			echo "<script>location.href='admin/index.php';</script>";
		}
		elseif ($type=='user')
		{
			
			echo "<script>location.href='index.php';</script>";
		}
		else
		{
			echo "<script>alert('Invalid username or password');</script>";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/logo.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form class="login100-form validate-form" action=""method="post">
					<span class="login100-form-title p-b-33">
						Account Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="container-login100-form-btn m-t-20">
						<button class="login100-form-btn" type="submit" name="submit">
							Sign in
						</button>
					</div>
					</form>
					<div class="text-center p-t-45 p-b-4">
						<span class="txt1">
							Forgot
						</span>

						<a href="forgot.php" class="txt2 hov1">
						 	Password?
						</a>
					</div>

					<div class="text-center">
						<span class="txt1">
							Create an account?<a href="register.php">Create Account</a>
						</span>

						
						</a>
					</div>
				
			</div>
		</div>
	</div>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>	

	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
