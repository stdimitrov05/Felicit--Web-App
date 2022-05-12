<?php

include_once '../sql/dbFunction.php';
$confing = new dbFunction();
error_reporting();
if (isset($_POST['submit'])) {

    $name =  $_POST['name'];
    $email =  $_POST['email'];
    $pass = $_POST['password'];
    $filename = $_FILES["uploadfile"]["name"];
    
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "image/" . $filename;

    $select = $confing->isUserExitst($name,$email);
    if (!$select) {
        
        if (move_uploaded_file($tempname, $folder)) {
            $confing->CreateNewProfile($name, $email, $pass, $filename);
            header("location: ../index.php");
        } else {
            echo "<script>alert('Registration Not Successful')</script>";
        }
    } else {
        echo "<script>alert('Email Already Exist')</script>";
    }
} else {
    echo "<script>alert('Password Not Match')</script>";
}
