<?php 
include("dbconnect.php");
session_start();
if(isset($_POST['register']))
{
    $ename=$_POST['examname'];
    // $edate=$_POST['edate'];
    // $sess=$_POST['sess'];
    
     $f=0;
    if($ename==" ")
    {
        $f=1;
        $ename_err="You Cannot Leave this Field Empty!";
    }
    if($f==0)
    {
        
        $user_id=$_SESSION['u_id'];
        $sel="select * from user where user_id = '$user_id'";
        $result_sel=$conn->query($sel);
        while($user=$result_sel->fetch_assoc())
        {
            $db_username=$user['username'];
            $db_dept=$user['dept_name'];
        }
        //$_SESSION['dept']=$db_dept;
        $_SESSION['ename']=$ename;
        header('location:allocation2.php');
        // $_SESSION['edate']=$edate;
        // $_SESSION['sess']=$sess;
        // $sql_insert="insert into timetable (exam_name,dept_name,semester,exam_date,session,subject_code,subject_name) values('$examname','$department','$sem','$edate','$session','$scode','$sname')";    
        // if($conn->query($sql_insert))
        // {
        //     $log="Details Added Successfully";
        // }
        // else
        // {
        //     $log="Registration Failed".$sql_insert;
        // }
    }
}
            // $hall="select * from examhall";
            //$sel="select * from timetable ";
            $exam="select exam_name from exam";
            // $tt="select distinct exam_date from timetable";
            //$dep="select dept_name from department";
            $result_exam=$conn->query($exam);
            // $result_hall=$conn->query($hall);
            // $result_tt=$conn->query($tt);
            //$result_hall=$conn->query($hall);
            //$result_sel=$conn->query($sel);
            //$result_dep=$conn->query($dep);
            // if($result_sel->num_rows>0)
            // {
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
    <title>Time Table Registration</title>

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
                                        <strong>Exam Hall </strong>| Allocation</div>
                                    <div class="card-body card-block">
                                        <form method="post" enctype="multipart/form-data" class="form-horizontal">                        
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Exam Name </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <select name="examname" id="examname" class="form-control">
                                                    <option value=" ">-- Select An Exam --</option>
                                                    <?php
                                                        while($exam=$result_exam->fetch_assoc())
                                                        {
                                                            $ename=$exam['exam_name'];
                                                    ?>
                                                        <option value="<?php echo $ename ?>"><?php echo $ename ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <span id="ename_err"></span>
                                                    <?php echo(isset($ename_err))?$ename_err:""?>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-primary btn-sm" name="register" id="register">Save and Next
                                        </button>
                                    </div>
                                    </form>
                                </div>
                            </div> 
                            <br>
                            <div class="row m-t-30">
                                <div class="col-md-12">

                                                        <?php //} ?>
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




<!-- end document-->
</body>
</html>