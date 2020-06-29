<?php
session_start(); 
include("dbconnect.php");
//include("function.php");
$ename=$_SESSION['ename'];
$edate=$_SESSION['edate'];
$sess=$_SESSION['sess'];
// echo("<script>alert('$edate');</script>");
// echo("<script>alert('$sess');</script>");
// $broken_date=str_replace("-","_",$edate);
// $tablename=$sess."_".$broken_date;
//$_SESSION['tablename']=$tablename;
$sum=0;
if(isset($_POST['confirm']))
{     
    $ename=$_SESSION['ename'];
    $edate=$_SESSION['edate'];
    $sess=$_SESSION['sess'];
    // $edate=$_SESSION['edate'];
    // $sess=$_SESSION['sess'];
    
    //FUNCTION HERE
    
    $hall_query="select * from examhall";
    $result_hall=$conn->query($hall_query);
    $hall_count= (int)$result_hall->num_rows;
    //echo $hall_count;
    $hall=array();
    $total_rows = $result_hall->num_rows;
    while($hall_fetched=$result_hall->fetch_assoc())
    {
        $hall[]=$hall_fetched;
    }
    //END OF HALL ARRAY
    //EXAM ARRAY
    $tt_query="select * from timetable where exam_date='$edate' and session='$sess'";
    $result_tt=$conn->query($tt_query);
    $tt_count= (int)$result_tt->num_rows;
    //echo $tt_count;
    $tt=array();
    while($tt_fetched=$result_tt->fetch_assoc())
    {
        $tt[]=$tt_fetched;
    }
    //END OF EXAM ARRAY
    
    
    $start;
    $end;
    $benches = array();
    
    //e be exam counter
    //h be hall counter
    for($e=0; $e < $tt_count; $e++)
    {   
        $no_of_students = $tt[$e]['num'];
        $students_allocated = 0;
        for($h=0; $h < $hall_count; $h++)
        {
            if(!array_key_exists($h, $benches)) {
                $benches[$h] = $hall[$h]['no_of_benches'];
            }
            
            $benchesLeft=$hall[$h]['no_of_benches'];
            $studentsLeft = $no_of_students - $students_allocated;
            
            if($studentsLeft == 0) {
                break;
            }
            if($benchesLeft == 0) {
                continue;
            }
            
            $start = $students_allocated + 1;
            
            if(($benchesLeft)>(floor(0.65*$benches[$h])))
            {
                $maxSeat = floor($benchesLeft/2);
            }
            else {
                $maxSeat = $benchesLeft;
            }
            
            if ($studentsLeft <= $maxSeat) 
            {
                $students_allocated += $studentsLeft;
            }
            else
            {
                $students_allocated += $maxSeat;
            }
            $hall[$h]['no_of_benches'] -= ($students_allocated - ($no_of_students - $studentsLeft));
            $studentsLeft = $no_of_students - $students_allocated;
            $end = $students_allocated;
            
            //CREATE TABLE QUERY               
            
            // $table_create="CREATE TABLE $tablename(alloc_id int(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            // exam_id int(5),
            // exam_name varchar(15),
            // exam_date varchar(10),
            // sess varchar(2),
            // dept_name varchar(50),
            // semester int(2),
            // subject_code varchar(6),
            // subject_name varchar(30),
            // hall_id int(5),
            // room_no varchar(10),
            // start_no int(3),
            // end_no int(3))";
            // $table_create="CREATE TABLE $tablename(alloc_id int(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            //   exam_id int(5),
            //   exam_date varchar(10),
            //   sess varchar(2),
            //   hall_id int(5),
            //   room_no varchar(8),
            //   dep_name varchar(50),
            //   semester int(3),
            //   sub_code varchar(8),
            //   sub_name varchar(8),
            //   start_no int(3),
            //   end_no int(3))";
            // $result_table_create=$conn->query($table_create);
            
                
            
            //INSERT VARIABLES
            
                $dep_name=$tt[$e]['dept_name'];
                $sess=$tt[$e]['session'];
                $sem=$tt[$e]['semester'];
                $subcode=$tt[$e]['subject_code'];
                $subname=$tt[$e]['subject_name'];
                $roomno=$hall[$h]['room_no'];
                $examid=$tt[$e]['t_id'];
                $hallid=$hall[$h]['hall_id'];
                $examname=$tt[$e]['exam_name'];
                $examdate=$tt[$e]['exam_date'];
                
                
                
                //INSERT QUERY
                //$table_insert="INSERT INTO $tablename(exam_name,exam_date,sess,department,semester,subject_name,hall_id,room_no,start_no,end_no) VALUES ('$ename','$edate','$sess','$dept_name','$sem','$subcode','$subname','$hallid','$roomno','$start','$end')";
                $insert_query="INSERT INTO allocation (exam_id,exam_name,exam_date,sess,hall_id,room_no,dep_name,semester,sub_code,sub_name,start_no,end_no) VALUES ('$examid','$examname','$examdate','$sess','$hallid','$roomno','$dep_name','$sem','$subcode','$subname','$start','$end')";    
                $result_table_insert=$conn->query($insert_query);
                
                //TRIAL PRINT
                // echo$tt[$e]['subject_name'],"<br>";
                // echo$hall[$h]['room_no'],"<br>";
                // echo$start,"<br>";
                // echo$end,"<br><br>";
                
            }
        }
        
        //END OF FUNCTION
        
        
        //FUNCTION CALL
        // allocatenow();
        
        
        header('location:viewallocation.php');
        //$selhall=$_POST['halls'];
            //echo"<script>alert('$tablename');</script>";
            
        }
        $sel="select * from timetable where exam_date='$edate' and session='$sess'";
        $result_sel=$conn->query($sel);
        $halls="select * from examhall";
        $result_hall=$conn->query($halls);
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
                            <br>
                            <div class="row m-t-30">
                                <div class="col-md-12">

                                    <!-- DATA TABLE-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- DATA TABLE -->
                                            <h3 class="title-5 m-b-35">Allocation</h3>
                                            <div class="table-data__tool">
                                            </div>
                                            <div class="table-responsive table-responsive-data2">
                                            <form method="post" enctype="multipart/form-data" name="form1" >
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
                                                            <th>Number of Students</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        while($tim=$result_sel->fetch_assoc())
                                                        {
                                                            // $examname=$tim['exam_name'];
                                                            $department=$tim['dept_name'];
                                                            $sem=$tim['semester'];
                                                            //$date=$tim['exam_date'];
                                                            //$session=$tim['session'];
                                                            $scode=$tim['subject_code'];
                                                            $sname=$tim['subject_name'];
                                                            $num=$tim['num'];
                                                            ?>
                                                        <tr class="tr-shadow">
                                                            <td><?php echo $ename; ?></td>
                                                            <td><?php echo $department; ?></td>                                                         </td>
                                                            <td><?php echo $sem; ?></td>
                                                            <td><?php echo $edate; ?></td>
                                                            <td><?php echo $sess; ?></td>                                                         </td>
                                                            <td><?php echo $scode; ?></td>
                                                            <td><?php echo $sname; ?></td>
                                                            <td><?php echo $num;
                                                            $_SESSION['num']=$num;
                                                            ?></td>
                                                            <td>
                                                            
                                                            </td>
                                                        </tr>
                                                        <?php
                                                         $sum+=$num; 
                                                            }
                                                            
                                                        ?>
                                                            <tr class="spacer"></tr>
                                                    </tbody>
                                                </table> <br>
                                                    <button class="btn btn-primary btn-sm" name="confirm" id="confirm" value="confirm">Allocate
                                                    </button>
                                                                                              
                                            </div>
                        </form>
                                            <!-- END DATA TABLE -->
                                        </div>
                                    </div>
                                    <!-- END DATA TABLE-->
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                        <br><br>
                        <!-- <h3>Select Halls</h3> -->
                        <br><br>
                        <div class="hidden">
                        <select name="halls" multiple>
                        <?php 
                        while($hall=$result_hall->fetch_assoc())
                        {
                            $hallno=$hall['room_no'];
                            $benches=$hall['no_of_benches'];
                            ?>
                        <option value="<?php echo $hallno;?>"><?php echo $hallno."<br>";?>-
                        <?php echo $benches;?></option>
                        <?php } ?>
                        </select>
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