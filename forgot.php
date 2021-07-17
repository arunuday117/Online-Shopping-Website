<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Page-->
    <title>Forgot Username/Password</title>
    <link href="img/logo.ico" rel="shortcut icon"/>
    <!-- Icons font CSS-->
    <link href="vendor2/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor2/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor2/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor2/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="log/css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-01 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Forgot Username/Password?</h2>
                    <form method="POST">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email">
                                </div>
                            </div>
                        </div>    
                        <div class="row row-space">    
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone Number</label>
                                    <input class="input--style-4" type="text" name="phone">
                                </div>
                            </div>
                        </div>
                       
                        <div class="row row-space">    
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">
                                        Enter Password
                                    </label>
                                    <input class="input--style-4" type="Password" name="pass">
                                </div>

                            </div>
                        </div>
                        <div class="row row-space">    
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">
                                        Confirm Password
                                    </label>
                                    <input class="input--style-4" type="Password" name="cpass">
                                </div>

                            </div>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="submit">Continue</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
    <!-- Jquery JS-->
    <script src="vendor2/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor2/select2/select2.min.js"></script>
    <script src="vendor2/datepicker/moment.min.js"></script>
    <script src="vendor2/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="log/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<?php
include 'includes/config.php';
    if(isset($_POST['submit']))
    {
        $email=$_POST['email'];
        $ph=$_POST['phone'];
        $pass=md5($_POST['pass']);
        $data="SELECT * from login natural join userdetails";
        $query=mysqli_query($mysqli,$data);
        while ($row=mysqli_fetch_array($query))
        {
            if($row['useremail']==$email&&$row['contactno']==$ph)
            {
                $flag=1;
            }
        }
        if($flag==1)
        {
            if($_POST['pass']==$_POST['cpass'])
            {

                $sq=mysqli_query($mysqli,"UPDATE login SET password='$pass'WHERE useremail='$email'");  
                echo "<script>alert('Password updated login with new password!');</script>";
                echo "<script>location.href='login.php';</script>";
            }
            else
            {
                echo "<script>alert('Password does not match!');</script>";
            }
        }
        else
        {
            echo "<script>alert('Account doesn't exist!');</script>";
        }
    }
?>