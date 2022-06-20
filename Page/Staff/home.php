<?php
include '../../sql/dbFunction.php';
include '../../Functions/customfun.php';
error_reporting();
$con = new dbFunction();
$id = $_SESSION['id'];

if (!isset($id)) {
    header('location:../index.php');
};
if (isset($_GET['logout'])) {
    DeleteToken($con);
    session_destroy();
    header('location:../../index.php');
}
$name  = $_SESSION['name'];
setcookie("profile", $name, time() + 3600, '/');
$res = $con->SelectDataBokking();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Staff Panel </title>
    <link rel="icon" type="image/x-icon" href="../images/service.png" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="./style/table.css">
    <link href="./style/home.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
            <span class="d-block d-lg-none"><?php $con->InsertNameByID($id); ?></span>
           
            <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="../../Functions/image/<?php $con->SelectImageProfile($id) ?>" /></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#table">ToDay Table</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="../../Functions/staffProfile.php">Profile</a></li>
                <li class="nav-item"> <a class="nav-link js-scroll-trigger" href="home.php?logout=<?php echo $id; ?>">logout</a></li>
            </ul>
        </div>
    </nav>
    <!-- Page Content-->
    <div class="container-fluid p-0">
        <!-- About-->
        <section class="resume-section" id="about">
            <div class="resume-section-content">
                <h1 class="mb-0">
                    Hello
                    <span class="text-primary"><?php $con->InsertNameByID($id); ?></span>
                </h1>
            </div>
        </section>
        <hr class="m-0" />
        <!-- Experience-->
        <section class="resume-section" id="table">
            <div class="resume-section-content">

                <?php if (mysqli_num_rows($res) > 0) {    ?>


                    <div class="content">

                        <table class="table" cellspacing="0">

                            <thead>
                                <div class="text">
                                <tr>

                                   
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Booking</th>
                                    <th>Date</th>

                                    <th>Info</th>
                                    <th>Make At</th>
                                </tr>
                                </div>
                            </thead>
                            <?php
                            $i = 0;

                            while ($row = mysqli_fetch_array($res)) {

                            ?>
                                <tbody>
                                    <tr>

                                        
                                        <td data-label="Name"><?php echo $row["name"]; ?></td>
                                        <td data-label="Email"><?php echo $row["email"]; ?></td>
                                        <td data-label="Phone"><?php echo $row["phone"]; ?></td>
                                        <td data-label="Booking"><?php echo $row["persons"]; ?></td>
                                        <td data-label="Date"><?php echo $row["date"]; ?></td>
                                        <td data-label="Info"><?php echo $row["info"]; ?></td>
                                        <td data-label="Make"><?php echo $row["make"]; ?></td>

                                        <td data-label="Delete"><a href="../../Functions/delete.php?id=<?php echo $row["id"] ?>">Ready</a></td>
                                    </tr>

                            <?php
                                $i++;
                            }
                        }
                            ?>
                                </tbody>
                        </table>
                    </div>

            </div>
        </section>

    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="
    ./style/js/home.js"></script>
</body>

</html>