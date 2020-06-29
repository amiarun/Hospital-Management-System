<?php 
include("dbconnect.php");
if(isset($_POST['deleter']))
{
    $userid=$_POST['hidden'];
    $sql_delete="delete from user where user_id='$userid'";
    $conn->query($sql_delete);
}
if(isset($_POST['register'])||isset($_POST['update']))
{
    $userid=$_POST['hidden'];
    $department=$_POST['department'];
    $username=$_POST['username'];
    $pass=$_POST['pass'];
    echo $department;
    echo $username;
    echo $password;
    $f=0;
    if($f==0)
    {
        if($_POST['register'])
        {
            $sql_insert="insert into user(dept_name,username,password) values('$department','$username','$pass')";    
        }
       else
       {
            $sql_insert="update user set dept_name='$department',username='$username',password='$pass' where user_id='$userid'" ;    
       }
        if($conn->query($sql_insert))
        {
            $log="Details Added Successfully";
        }
         else
         {
             $log="Registration Failed".$sql_insert;
         }
    
        if($conn->query($sql_insert))
        {
            $log="Details Added Successfully";
        }
        else
        {
            $log="Registration Failed".$sql_insert;
        }
    }
}

            $sel="select * from user ";
            $dep="select dept_name from department";
            $result_dep=$conn->query($dep);
            $result_sel=$conn->query($sel);
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
    <title>User Registration</title>
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
                                        <strong>User </strong>| Registration</div>
                                    <div class="card-body card-block">
                                        <form method="post" enctype="multipart/form-data" class="form-horizontal">                        
                                            <div class="row form-group">
                                            <input type="hidden" id="hidden" name="hidden">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Department</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <select name="department" id="department" class="form-control">
                                                    <option value="">-- Select A Department --</option>
                                                    <?php
                                                        while($dep=$result_dep->fetch_assoc())
                                                        {
                                                            $dept=$dep['dept_name'];
                                                    ?>
                                                        <option value="<?php echo $dept ?>"><?php echo $dept ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">User Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="username" name="username" placeholder="Enter Username" class="form-control">
                                                    
                                                    
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Password</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="password" id="pass" name="pass" placeholder="Enter Password" class="form-control"> 
                                                </div>
                                            </div>  
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-primary btn-sm" name="register" id="register" value="register">Register
                                        </button>
                                        <button class="btn btn-danger btn-sm">Clear
                                        </button>
                                        <button class="btn btn-success btn-sm" name="deleter" id="deleter" value="deleter" hidden>Delete
                                        </button>
                                    </div>
                                    </form>
                                </div>
                            </div> 
                            <br>
                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    
                                    <!-- DATA TABLE-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- DATA TABLE -->
                                            <h3 class="title-5 m-b-35">User Management</h3>
                                            <div class="table-data__tool">
                                            </div>
                                            <div class="table-responsive table-responsive-data2">
                                                <table class="table table-data2">
                                                    <thead>
                                                        <tr>
                                                            <th>User ID</th>
                                                            <th>Department</th>
                                                            <th>User Name</th>
                                                            <th>Password</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        while($user=$result_sel->fetch_assoc())
                                                        {
                                                            $userid=$user['user_id'];
                                                            $dept=$user['dept_name'];
                                                            $username=$user['username'];
                                                            $password=$user['password'];
                                                    ?>
                                                        <tr class="tr-shadow">
                                                            <td><?php echo $userid ?></td>
                                                            <td><?php echo $dept ?></td>                                                         </td>
                                                            <td><?php echo $username ?></td>
                                                            <td><?php echo $password ?></td>
                                                            <td>
                                                                <div class="table-data-feature">
                                                                    
                                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                                        <i class="zmdi zmdi-edit"></i>
                                                                    </button>
                                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                                        <i class="zmdi zmdi-delete"></i>
                                                                    </button>
                                                                    
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php 
                                                                
                                                            }
                                                            ?>
                                                            <tr class="spacer"></tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- END DATA TABLE -->
                                        </div>
                                    </div>
                                    <!-- END DATA TABLE-->
                                </div>
                            </div> 
                        </div>
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
    <script src="js/userreg.js"></script>                                                     





<!-- end document-->
</body>
</html>