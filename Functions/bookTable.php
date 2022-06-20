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
            
        
        header("location:../Page/index.php#book?Msg=Booking/Food for home  Successful  ");
       
    } else {
        header("location:../Page/index.php#book?Msg=Booking Not Successful");
    }
}
