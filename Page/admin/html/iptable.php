<?php
include '../../../sql/dbFunction.php';
error_reporting();
$con = new dbFunction();
$id = $_SESSION['id'];

if (!isset($id)) {
    header('location:../../../index.php');
};
$name  = $_SESSION['name'];
setcookie("profile", $name, time() + 3600, '/');
$res = $con->SelectAllIp();
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, severny admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, severny design, severny dashboard bootstrap 4 dashboard template">
    <meta name="description" content="Severny is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Profile Table</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../../image/icon-admin.png">
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
                        <!-- Logo icon -->

                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                        </span>
                        </a>
                    </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <div class="user-profile text-center pt-2">
                <div class="d-flex align-items-center justify-content-center pb-3">
                    <div class="dropdown sub-dropdown">


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
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Profile data Table</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                <li class="breadcrumb-item"><a href="dashboard.php" class="text-muted">Home</a></li>
                                <li class="breadcrumb-item"><a href="../sql/ipexport.php" >Export</a></li>
                                <li class="breadcrumb-item"><a href="../sql/truncate.php" >Reset DB</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>
            <div class="container-fluid">
                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
System Log</h4>

                            </div>

                            <?php if (mysqli_num_rows($res) > 0) {    ?>
                                <div class="table-responsive mt-3">
                                    <table class="table table-bordered table-responsive-lg">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Ip</th>
                                                <th scope="col">Browser</th>
                                                <th scope="col">OS</th>
                                                <th scope="col">Devaice</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Profile Name</th>
                                            
                                            </tr>
                                        </thead>
                                        <?php
                                        $i = 0;

                                        while ($row = mysqli_fetch_array($res)) {

                                        ?>
                                            <tbody>
                                                <tr>
                                                    <th><?php echo $row["id"]; ?></th>
                                                    <td><?php echo $row["ipAdress"]; ?></td>
                                                    <td><?php echo $row["browser"]; ?></td>
                                                    <td><?php echo $row["os"]; ?></td>
                                                    <td><?php echo $row["device"]; ?></td>
                                                    <td><?php echo $row["loginAt"]; ?></td>
                                                    <?php $name = $con->SelectNameByID($row['profileId'])?>
                                                    <td><?php echo  $name ?></td>
                                                  

                                                </tr>
                                                <tr>


                                            <?php
                                            $i++;
                                        }
                                    }
                                            ?>
                                            </tbody>
                                    </table>
                                </div>
                                
                        </div>
                    </div>

                </div>
                

                <footer class="footer text-center text-muted"> © 2022 created by Stdimitrov </footer>

            </div>

        </div>
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
</body>

</html>