<?php
session_start();
include'includes/config.php';
		$id=$_POST['id'];
		$value=$_POST['val'];
		$uid=$_SESSION['id'];

	if($_SESSION['login']==0)
	{ 
		
		$_SESSION['cart'][$id]['quantity']=$value;
		die;
	}
	else
	{
					$sq=mysqli_query($mysqli,"UPDATE `addtocart` SET `quantity`='$value' WHERE pid='$id'AND uid='$uid'");
	}
	die;
?>