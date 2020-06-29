<?php 
include("dbconnect.php");
if(isset($_POST['deleter']))
{
    $hallid=$_POST['hidden'];
    $sql_delete="delete from examhall where hall_id='$hallid'";
    $conn->query($sql_delete);
}
if(isset($_POST['register'])||isset($_POST['update']))
{
    $hallid=$_POST['hidden'];
    $roomno=$_POST['roomno'];
    $block=$_POST['block'];
    $floor=$_POST['floor'];
    $benches=$_POST['benches'];
    $f=0;
    if(empty($roomno))
    {
        $f=1;
        $room_err="You Cannot Leave this Field Empty!";
    }
    if(empty($block))
    {
        $f=1;
        $block_err="You Cannot Leave this Field Empty!";
    }
    if(empty($floor))
    {
        $f=1;
        $floor_err="You Cannot Leave this Field Empty!";
    }
    if(empty($benches))
    {
        $f=1;
        $benches_err="You Cannot Leave this Field Empty!";
    }
    if($f==0)
    {
        if($_POST['register'])
        {
            $sql_insert="insert into examhall (room_no,block,floor,no_of_benches) values('$roomno','$block','$floor','$benches')";    
        }
       else
       {
           $sql_insert="update examhall set room_no='$roomno',block='$block',floor='$floor',no_of_benches='$benches' where hall_id='$hallid'" ;    
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
            $sel="select * from examhall ";
            $result_sel=$conn->query($sel);
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
    <title>Exam Hall Registration</title>
    <h6 class="hidden">hall</h6>

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
                                        <strong>Exam Hall </strong>| Registration</div>
                                    <div class="card-body card-block">
                                        <form method="post" enctype="multipart/form-data" class="form-horizontal">                        
                                            <div class="row form-group">
                                                <input type="hidden" id="hidden" name="hidden">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Room Number</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="roomno" name="roomno" placeholder="Enter Room No" class="form-control">
                                                    <span id="roomno_err"></span>
                                                    <?php echo(isset($roomno_err))?$roomno_err:""?>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Floor</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="floor" name="floor" placeholder="Enter Floor Number (0, 1, 2, ..)" class="form-control">
                                                    <span id="floor_err"></span>
                                                    <?php echo(isset($floor_err))?$floor_err:""?>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Block</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="block" name="block" placeholder="Enter Block" class="form-control">
                                                    <span id="block_err"></span>
                                                    <?php echo(isset($block_err))?$block_err:""?>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Number of Benches</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="benches" id="benches" name="benches" placeholder="Enter Here" class="form-control">
                                                    <span id="benches_err"></span>
                                                    <?php echo(isset($benches_err))?$benches_err:""?>
                                                </div>
                                                <?php echo(isset($log))?$log:"" ?>
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
                                            <h3 class="title-5 m-b-35">Hall Management</h3>
                                            <div class="table-data__tool">
                                            </div>
                                            <div class="table-responsive table-responsive-data2">
                                                <table class="table table-data2">
                                                    <thead>
                                                        <tr>
                                                            <th>Hall ID</th>
                                                            <th>Room Number</th>
                                                            <th>Block</th>
                                                            <th>Floor</th>
                                                            <th>Number of Benches</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        while($examhall=$result_sel->fetch_assoc())
                                                        {
                                                            $hallid=$examhall['hall_id'];
                                                            $roomno=$examhall['room_no'];
                                                            $block=$examhall['block'];
                                                            $floor=$examhall['floor'];
                                                            $benches=$examhall['no_of_benches'];
                                                    ?>
                                                     
                                                        <tr class="tr-shadow">
                                                            <td><?php echo $hallid ?></td>
                                                            <td><?php echo $roomno ?></td>                                                        
                                                            <td><?php echo $block ?></td>
                                                            <td><?php echo $floor ?></td>
                                                            <td><?php echo $benches ?></td>
                                                            <td>
                                                                <div class="table-data-feature">
                                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                                        <i class="zmdi zmdi-edit"></i>
                                                                    </button>
                                                                       
                                                                    
                                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" name="delet" value="delet" id="delet">
                                                                        <i class="zmdi zmdi-delete"></i>   
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
    <script src="js/examhallreg.js"></script>
    <script src="js/navselect.js"></script>                                                       




<!-- end document-->
</body>
</html>