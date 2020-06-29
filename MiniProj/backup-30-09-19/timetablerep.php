<?php 
include("dbconnect.php");
if(isset($_POST['register']))
{
    $examname=$_POST['examname'];
    $department=$_POST['department'];
    $sem=$_POST['sem'];
    $edate=$_POST['edate'];
    $session=$_POST['session'];
    $scode=$_POST['scode'];
    $sname=$_POST['sname'];
    $f=0;
    if($examname==" ")
    {
        $f=1;
        $ename_err="You Cannot Leave this Field Empty!";
    }
    if($department==" ")
    {
        $f=1;
        $dept_err="You Cannot Leave this Field Empty!";
    }
    if(empty($sem))
    {
        $f=1;
        $sem_err="You Cannot Leave this Field Empty!";
    }
    if(empty($edate))
    {
        $f=1;
        $edate_err="You Cannot Leave this Field Empty!";
    }
    if($session=="")
    {
        $f=1;
        $session_err="You Cannot Leave this Field Empty!";
    }
    if(empty($scode))
    {
        $f=1;
        $scode_err="You Cannot Leave this Field Empty!";
    }
    if(empty($sname))
    {
        $f=1;
        $sname_err="You Cannot Leave this Field Empty!";
    }
    if($f==0)
    {
        $sql_insert="insert into timetable (exam_name,dept_name,semester,exam_date,session,subject_code,subject_name) values('$examname','$department','$sem','$edate','$session','$scode','$sname')";    
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

            $sel="select * from timetable ";
            $exam="select exam_name from exam";
            $dep="select dept_name from department";
            $result_exam=$conn->query($exam);
            $result_sel=$conn->query($sel);
            $result_dep=$conn->query($dep);
            if($result_sel->num_rows>0)
            {
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
                                        <strong>Time Table </strong>| Registration</div>
                                        <form method="post" enctype="multipart/form-data" class="form-horizontal">
                                          <div class="card-body card-block">                    
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
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Department</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <select name="department" id="department" class="form-control">
                                                    <option value=" ">-- Select A Department --</option>
                                                    <?php
                                                        while($dep=$result_dep->fetch_assoc())
                                                        {
                                                            $dept=$dep['dept_name'];
                                                    ?>
                                                        <option value="<?php echo $dept ?>"><?php echo $dept ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <span id="dept_err"></span>
                                                    <?php echo(isset($dept_err))?$dept_err:""?>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Semester</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="sem" name="sem" placeholder="Enter Semester" class="form-control">
                                                    <span id="sem_err"></span>
                                                    <?php echo(isset($sem_err))?$sem_err:""?>
                                                </div>
                                            </div>
                                         </div>
                                        <div class="card-body card-block">
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
                                                    <select name="session" id="session" class="form-control">
                                                        <option value="">-- Select A Session --</option>
                                                        <option value="FN">FN : Forenoon</option>
                                                        <option value="AN">AN : Afternoon</option>
                                                    </select>
                                                    <span id="session_err"></span>
                                                    <?php echo(isset($session_err))?$session_err:""?>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Subject Code</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="scode" name="scode" placeholder="Enter Subject Code" class="form-control">
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
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-primary btn-sm" name="register" id="register">Register
                                        </button>
                                        <button class="btn btn-danger btn-sm">Clear
                                        </button>
                                    </div>
                                 </div>
                                </form>
                            </div> 
                            <br>
                            <div class="row m-t-30">
                                <div class="col-md-12">

                                    <!-- DATA TABLE-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- DATA TABLE -->
                                            <h3 class="title-5 m-b-35">Timetable Management</h3>
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
                                                            <td><?php echo $dept ?></td>                                                         </td>
                                                            <td><?php echo $sem ?></td>
                                                            <td><?php echo $date ?></td>
                                                            <td><?php echo $session ?></td>                                                         </td>
                                                            <td><?php echo $scode ?></td>
                                                            <td><?php echo $sname ?></td>
                                                            <td>
                                                                <div class="table-data-feature">
                                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Send">
                                                                        <i class="zmdi zmdi-mail-send"></i>
                                                                    </button>
                                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                                        <i class="zmdi zmdi-edit"></i>
                                                                    </button>
                                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                                        <i class="zmdi zmdi-delete"></i>
                                                                    </button>
                                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="More">
                                                                        <i class="zmdi zmdi-more"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php 
                                                            }
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




<!-- end document-->
</body>
</html>