<?php 
include("dbconnect.php");
session_start();
$user_id=$_SESSION['u_id'];
$sel="select * from user where user_id = '$user_id'";
$result_sel=$conn->query($sel);
while($user=$result_sel->fetch_assoc())
{
    $db_username=$user['username'];
    $db_password=$user['password'];
}

if(isset($_POST['register']))
{
   
    $currentpassword=$_POST['currentpassword'];
    $newpassword=$_POST['newpassword'];
    $confirmpassword=$_POST['confirmpassword'];
    $f=0;
    if(empty($currentpassword))
    {
        $f=1;
        $currentpassword_err="You Cannot Leave this Field Empty!";
    }
    if(empty($newpassword))
    {
        $f=1;
        $newpassword_err="You Cannot Leave this Field Empty!";
    }
    if(empty($confirmpassword))
    {
        $f=1;
        $confirmpassword_err="You Cannot Leave this Field Empty!";
    }
    if($newpassword!=$confirmpassword)
    {
        $f=1;
        $confirmpassword_err="Please Confirm The Passwords!";
    }
    if($currentpassword!=$db_password)
    {
        $f=1;
        $currentpassword_err="Please Confirm The Passwords!";
    }
    if($currentpassword==$newpassword)
    {
        $f=1;
        $newpassword_err="Passwords Cannot be Same!";
    }
    if($f==0)
    {
        $sql_update="update user set password='$newpassword' where user_id='$user_id'";  
        $qresult =$conn->query($sql_update);
        if($conn->query($sql_update))
        {
            $confirmpassword_err="Details Added Successfully";
        }
        else
        {
            $confirmpassword_err="Registration Failed".$sql_update;
        }
    }
}

// $sel="select * from user where user_id = '$user_id'";
// $result_sel=$conn->query($sel);
//             if($result_sel->num_rows>0)
//             {
?>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Change Password</title>
    <h6 class="hidden">user</h6>
    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition" style="animation-duration: 900ms; opacity: 1;">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/logo.png" alt="Exam Cell Automation">
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/logo.png" alt="Exam Cell Automation">
                </a>
            </div>
            <?php include("nav.php")?>
        </aside>
        <!-- END MENU SIDEBAR-->
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Change </strong>| Password</div>
                                    <div class="card-body card-block">
                                        <form method="post" enctype="multipart/form-data" class="form-horizontal">                        
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Current Password</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="password" id="currentpassword" name="currentpassword" placeholder="Enter Current Password" class="form-control">
                                                    <span id="currentpassword_err"></span>
                                                    <?php echo(isset($currentpassword_err))?$currentpassword_err:""?>
                                                </div>
                                            </div>  
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">New Password</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="password" id="newpassword" name="newpassword" placeholder="Enter New Password" class="form-control">
                                                    <span id="newpassword_err"></span>
                                                    <?php echo(isset($newpassword_err))?$newpassword_err:""?>
                                                </div>
                                            </div>  
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Confirm Password</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="password" id="confirmpassword" name="confirmpassword" placeholder="Re-Enter New Password" class="form-control">
                                                    <span id="confirmpassword_err"></span>
                                                    <?php echo(isset($confirmpassword_err))?$confirmpassword_err:""?>
                                                </div>
                                            </div>  
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-primary btn-sm" name="register" id="register">Register
                                        </button>
                                        <button class="btn btn-danger btn-sm">Clear
                                        </button>
                                    </div>
                                    </form>
                                </div>
                            </div> 
                            <br>
                            <div class="row m-t-30">
                                <div class="col-md-12">


                                </div>
                            </div> 
                        </div>
                        <?php 
                                                                
                                                            // }
                                                        //echo  $db_username;
                                                        // echo $db_password;
                                                        // echo $currentpassword;
                                                        // echo $newpassword;
                                                        // echo $confirmpassword;
                                                        // echo $qresult;
                                                            ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2019 Exam Cell Automation. All rights reserved. .</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
    <script src="js/navselect.js"></script>                                                       





<!-- end document-->
</body>
</html>