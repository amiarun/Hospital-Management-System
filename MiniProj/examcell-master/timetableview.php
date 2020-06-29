<?php 
include("dbconnect.php");
// if(isset($_POST['search']))
// {
//     $examname=$_POST['examname'];
//     $department=$_POST['dept'];   
// }
// if(isset($_POST['search']))
// $sel="select * from timetable where exam_name='$examname' and dept_name='$department'";
// else
$sel="select * from timetable"; 
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
    <title>Time Table View</title>
    <h6 class="hidden">time</h6>
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
                            <br>
                            <!-- <form method="post" enctype="multipart/form-data" class="form-horizontal">  
                            <h4>Search By </h4>
                            <br>                      
                                            <div class="row form-group">
                                                <div class="col-12 col-md-5">
                                                    <input type="text" id="examname" name="examname" placeholder="Enter Exam Name" class="form-control">
                                                </div>
                                                <div class="col-12 col-md-5">
                                                    <input type="text" id="dept" name="dept" placeholder="Enter Department Name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <button class="btn btn-warning btn-sm" name="search" id="search" value="search">Search
                                                </button>
                                            </div>
                            </form>
                            <br><br> -->
                            <div class="row m-t-30">
                                <div class="col-md-12">

                                    <!-- DATA TABLE-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- DATA TABLE -->
                                            <h3 class="title-5 m-b-35">Timetable View</h3>
                                            <div class="table-data__tool">
                                            </div>
                                            <div class="table-responsive table-responsive-data2">
                                                <table class="table table-data2">
                                                    <thead>
                                                        <tr>
                                                            <th>Exam Name</th>
                                                            <th>Department</th>
                                                            <th>Semester</th>
                                                            <th>Exam Date</th>
                                                            <th>Session</th>
                                                            <th>Subject Code</th>
                                                            <th>Subject Name</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        while($tim=$result_sel->fetch_assoc())
                                                        {
                                                            $examname=$tim['exam_name'];
                                                            $department=$tim['dept_name'];
                                                            $sem=$tim['semester'];
                                                            $date=$tim['exam_date'];
                                                            $session=$tim['session'];
                                                            $scode=$tim['subject_code'];
                                                            $sname=$tim['subject_name'];
                                                    ?>
                                                        <tr class="tr-shadow">
                                                            <td><?php echo $examname ?></td>
                                                            <td><?php echo $department ?></td>                                                         </td>
                                                            <td><?php echo $sem ?></td>
                                                            <td><?php echo $date ?></td>
                                                            <td><?php echo $session ?></td>                                                         </td>
                                                            <td><?php echo $scode ?></td>
                                                            <td><?php echo $sname ?></td>
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




<!-- end document-->
</body>
</html>