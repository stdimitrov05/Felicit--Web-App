<?php
include '../../../sql/dbFunction.php';

error_reporting();
$con = new dbFunction();
$id = $_SESSION['id'];
if (isset($_GET['logout'])) {

    session_destroy();
    header('location:../../index.php');
}
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../../image/icon-admin.png">
    <!-- Custom CSS -->
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">

</head>

<body>

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin1" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="relative" data-boxed-layout="full">
        <div class="app-container" data-navbarbg="skin1"></div>

        <header class="topbar" data-navbarbg="skin1">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">

                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">

                        <a href="dashboard.php">

                            <!-- Logo text -->
                            <span class="logo-text">
                                <!-- dark Logo text -->
                                <img src="../assets/images/logo-light-text.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo text -->
                                <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                            </span>
                        </a>
                    </div>
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>

        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <div class="user-profile text-center pt-2">
                <div class="d-flex align-items-center justify-content-center pb-3">
                    <div class="dropdown sub-dropdown">
                        <img class="profile-pic" src="../../../Functions/image/<?php $con->SelectImageProfile($id) ?>">


                    </div>
                </div>

            </div>
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap"><span class="hide-menu">Pages</span></li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="dashboard.php" aria-expanded="false">
                                <i data-feather="grid" class="feather-icon"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="table-basic.php" aria-expanded="false">
                                <i data-feather="grid" class="feather-icon"></i>
                                <span class="hide-menu">Table</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="../../../Functions/adminProfile.php" aria-expanded="false">
                                <i data-feather="grid"  class="feather-icon" ></i>
                                <span class="hide-menu">Pofile</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="dashboard.php?logout=<?php echo $id; ?>" aria-expanded="false">
                                <i data-feather="home" ></i>
                                <span class="hide-menu">Logout</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Welcome Back <?php $con->InsertNameByID($id); ?>!</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="dashboard.html" class="text-muted">Dashboard</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>

            <div class="container-fluid">

                <div class="row align-items-stretch">
                    <div class="col-xl-9 col-lg-8 col-md-12 d-flex align-items-stretch justify-content-strech">
                        <div class="card w-100">
                            <div class="card-body">
                                <h4 class="card-title">Money</h4>
                                <div class="pt-5" style="height: 290px;">
                                    <canvas id="bar-chart" width="400"></canvas>
                                </div>
                                <ul class="list-inline text-center mt-4 mb-0">
                                    <li class="list-inline-item text-muted"><i class="font-10 fas fa-circle mr-2 text-info"></i>Sales
                                    </li>
                                    <li class="list-inline-item text-muted"><i class="font-10 fas fa-circle mr-2 text-light"></i>Earnings
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>


            </div>

            <footer class="footer text-center text-muted"> © 2022 created by Stdimitrov </footer>

        </div>

    </div>

    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="../dist/js/app-style-switcher.js"></script>
    <script src="../dist/js/feather.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="../assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 charts -->
    <script src="../assets/extra-libs/c3/d3.min.js"></script>
    <script src="../assets/extra-libs/c3/c3.min.js"></script>
    <!--chartjs -->
    <script src="../assets/libs/chart.js/dist/Chart.min.js"></script>
    <script src="../dist/js/pages/dashboards/dashboard1.js"></script>
</body>

</html>