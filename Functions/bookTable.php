<?php

include_once '../sql/dbFunction.php';
include_once 'customfun.php';
$confing =  new dbFunction();

error_reporting();
if (isset($_POST['btn'])) {

    $profileName = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_SESSION['email'];
    $person = $_POST['book'];
    $date = $_POST['date'];
    $info = $_POST['text'];

    $booktable = $confing ->BookTableByName($profileName,$phone,$email,$person,$date,$info);
    

    if ($booktable) {
            
        echo "<script>alert('Booking/Food for home  Successful')</script>";
        header("location:../Page/index.php");
       
    } else {
        echo "<script>alert('Booking Not Successful')</script>";
        header("location:../Page/index.php");
    }
}
