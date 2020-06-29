<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Tables</title>

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
                            <img src="images/icon/logo.png" alt="CoolAdmin">
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
                    <img src="images/icon/logo.png" alt="Cool Admin">
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
                        <div class="header-wrap">

                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <!-- DATA TABLE-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- DATA TABLE -->
                                            <h3 class="title-5 m-b-35">Student Management</h3>
                                            <form class="form-header" action="" method="POST">
                                                    <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports...">
                                                    &nbsp;&nbsp;
                                                        <select>
                                                            <option></option>
                                                        </select>
                                                        &nbsp;&nbsp;
                                                        <button class="au-btn--submit" type="submit">
                                                            <i class="zmdi zmdi-search"></i>
                                                        </button>
                                                    </form>
                                            <div class="table-data__tool">
                                            </div>
                                            <div class="table-responsive table-responsive-data2">
                                                <table class="table table-data2">
                                                    <thead>
                                                        <tr>
                                                            <th>Student ID</th>
                                                            <th>Name</th>
                                                            <th>Register Number</th>
                                                            <th>Department Name</th>
                                                            <th>Semester</th>
                                                            <th>Year of Admission</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="tr-shadow">
                                                            <td>Lori Lynch</td>
                                                            <td>
                                                                <span class="block-email">lori@example.com</span>
                                                            </td>
                                                            <td class="desc">Samsung S8 Black</td>
                                                            <td>2018-09-27 02:12</td>
                                                            <td>
                                                                <span class="status--process">Processed</span>
                                                            </td>
                                                            <td>$679.00</td>
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
                                                        <tr class="spacer"></tr>
                                                        <tr class="tr-shadow">
                                                            <td>Lori Lynch</td>
                                                            <td>
                                                                <span class="block-email">john@example.com</span>
                                                            </td>
                                                            <td class="desc">iPhone X 64Gb Grey</td>
                                                            <td>2018-09-29 05:57</td>
                                                            <td>
                                                                <span class="status--process">Processed</span>
                                                            </td>
                                                            <td>$999.00</td>
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
                                                        <tr class="spacer"></tr>
                                                        <tr class="tr-shadow">
                                                            <td>Lori Lynch</td>
                                                            <td>
                                                                <span class="block-email">lyn@example.com</span>
                                                            </td>
                                                            <td class="desc">iPhone X 256Gb Black</td>
                                                            <td>2018-09-25 19:03</td>
                                                            <td>
                                                                <span class="status--denied">Denied</span>
                                                            </td>
                                                            <td>$1199.00</td>
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
                                                        <tr class="spacer"></tr>
                                                        <tr class="tr-shadow">
                                                            <td>Lori Lynch</td>
                                                            <td>
                                                                <span class="block-email">doe@example.com</span>
                                                            </td>
                                                            <td class="desc">Camera C430W 4k</td>
                                                            <td>2018-09-24 19:10</td>
                                                            <td>
                                                                <span class="status--process">Processed</span>
                                                            </td>
                                                            <td>$699.00</td>
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
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- END DATA TABLE -->
                                        </div>
                                    </div>
                                    <!-- END DATA TABLE-->
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
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



<!-- end document-->



<!-- end document-->



<!-- end document-->
</body>

</html>
<!-- end document-->
