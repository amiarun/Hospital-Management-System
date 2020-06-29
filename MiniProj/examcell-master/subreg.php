<?php 
include("dbconnect.php");
session_start();
$db_dept=$_SESSION['dept'];
$ename=$_SESSION['ename'];
$sem=$_SESSION['sem'];
//$examno=$_SESSION['examno'];
//  $db_dept="MCA";
//  $ename="Series 1";
//  $sem = "5";
if(isset($_POST['register']))
{

    $edate=$_POST['edate'];
    $sess=$_POST['sess'];
    $scode=$_POST['scode'];
    $sname=$_POST['sname'];
    $num=$_POST['num'];
    $f=0; 
    if(empty($edate))
    {
        $f=1;
    }
    if(empty($sess))
    {
        $f=1;
    }
    if(empty($scode))
    {
        $f=1;
    }
    if(empty($sname))
    {
        $f=1;
    }
    if(empty($num))
    {
        $f=1;
    }
    if($f==0)
    {
        
        $sql_insert="insert into temptt (exam_name,dept_name,semester,exam_date,session,sub_code,sub_name,num) values('$ename','$db_dept','$sem','$edate','$sess','$scode','$sname','$num')";    
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

if(isset($_POST['submit']))
{
    header('location:viewtt.php');    
}

            //$sel="select * from timetable ";
            //$exam="select exam_name from exam";
            $dep="select dept_name from department";
            //$result_exam=$conn->query($exam);
            //$result_sel=$conn->query($sel);
            //$result_dep=$conn->query($dep);
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
    <title>Subject Registration</title>

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
            <?php include("usernav.php")?>
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
                                        <strong>Time Table </strong>| Registration</div>
                                    <div class="card-body card-block">
                                        <form method="post" enctype="multipart/form-data" class="form-horizontal">                        
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Exam Date</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="date" id="edate" name="edate" placeholder="Enter Date" class="form-control">
                                                    <span id="edate_err"></span>
                                                    <?php echo(isset($edate_err))?$edate_err:""?>
                                                </div>
                                            </div>  
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Session</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="sess" id="sess" class="form-control">
                                                        <option value="">-- Select A Session --</option>
                                                        <option value="FN">FN : Forenoon</option>
                                                        <option value="AN">AN : Afternoon</option>
                                                    </select>
                                                    <span id="sess_err"></span>
                                                    <?php echo(isset($sess_err))?$sess_err:""?>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Subject Code</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="scode" name="scode" placeholder="Enter Subject Code" class="form-control" >
                                                    <span id="scode_err"></span>
                                                    <?php echo(isset($scode_err))?$scode_err:""?>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Subject Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="sname" name="sname" placeholder="Enter Subject Name" class="form-control">
                                                    <span id="sname_err"></span>
                                                    <?php echo(isset($sname_err))?$sname_err:""?>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Number of Students</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="num" name="num" placeholder="Enter Number of Students" class="form-control">
                                                    <span id="num_err"></span>
                                                    <?php echo(isset($num_err))?$num_err:""?>
                                                </div>
                                            </div>  
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-primary btn-sm" name="register" id="register">Add Next
                                        </button>
                                        <button class="btn btn-danger btn-sm">Clear
                                        </button>
                                        <button class="btn btn-success btn-sm" name="submit" id="submit"> Review & Submit
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