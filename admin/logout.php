<?php
session_start();
include("include/config.php");
session_unset();
echo "<script>alert('You have successfully logged out');
       location.href='../index.php'</script>;
</script>
";
?>
