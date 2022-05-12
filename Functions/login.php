<?php

include_once '../sql/dbFunction.php';
include_once 'customfun.php';
$confing =  new dbFunction();

error_reporting();
if (isset($_POST['login'])) {
    $profileName = $_POST['name'];
    $pass = $_POST['password'];
    $profile = $confing->Login($profileName, $pass);
    var_dump($profile);
    

    if ($profile) {
        InsertIP($confing);
        InsertStatus($confing);
        
        header("location:../Page/index.php");
    } else {
        header("location:../index.php");
    }
}
