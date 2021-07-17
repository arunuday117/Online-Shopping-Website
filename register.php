<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Page-->
    <title>Register</title>
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
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Registration Form</h2>
                    <form method="POST">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">first name</label>
                                    <input class="input--style-4" type="text" name="first_name">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">    
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">last name</label>
                                    <input class="input--style-4" type="text" name="last_name">
                                </div>
                            </div>
                        </div>
       
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
                                     Address   
                                    </label>
                                    <textarea class="input--style-4" name="address" rows='3' cols='50'>
                                        
                                    </textarea>
                                     
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">    
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">
                                        Pin Code
                                    </label>
                                    <input class="input--style-4" type="text" name="pin">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">    
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">
                                        Landmark*
                                    </label>

                                    <textarea class="input--style-4" type="text" name="landmark" rows='2' cols='50'>
                                    </textarea>
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
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="submit">Submit</button>
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
<!-- end document-->
<?php
include 'includes/config.php';
if(isset($_POST['submit']))
                {
                    if($_POST['pass']==$_POST['cpass'])
                        {
                            $flag=0;
                            $first_name=$_POST['first_name'];
                            $last_name=$_POST['last_name'];
                            $email=$_POST['email'];
                            $phone=$_POST['phone'];
                            $address=$_POST['address'];
                            $pin=$_POST['pin'];
                            $landmark=$_POST['landmark'];
                            $pass=md5($_POST['pass']);
                            $data="select * from userdetails natural join login";
                            $c=0;
                            $sd="select * from userdetails";
                            $p=mysqli_query($mysqli,$sd);
                             while($row=mysqli_fetch_array($p))
                                {
                                    $c++;
                                }
                            $c++;
                            $sq=mysqli_query($mysqli,$data);
                            while($row=mysqli_fetch_array($sq))
                                {
                                        if($row['useremail']==$email||$row['contactno']==$phone)
                                            {
                                                    $flag=1;
                                            }

                                }
                            if($flag==1)
                            {
                                echo"<script>alert('This  account already exits');</script>";
                            }
                            else if($flag==0)
                            {
                                $sql="INSERT INTO `userdetails`(`First Name`, `Last Name`, `uaddress`, `contactno`, `pincode`, `landmark`) VALUES ('$first_name','$last_name','$address','$phone','$pin','$landmark')";
                                if(mysqli_query($mysqli,$sql))
                                {
                                    $sql1="INSERT INTO `login`(`did`, `useremail`, `password`, `utype`, `status`) VALUES ('$c','$email','$pass','user',0)";
                                    if(mysqli_query($mysqli,$sql1))
                                    {

                                        echo"<script>alert('Data inserted');</script>";
                                        echo"<script>location.href='login.php';</script>";
                                    }
                                }
                            }
                        }
                        else
                        {
                            echo"<script>alert('Incorrect password!');</script>";
                        }
                }
            
            ?>

