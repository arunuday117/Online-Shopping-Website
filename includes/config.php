<?php
$mysqli = mysqli_connect("localhost","root","","shopping");
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>