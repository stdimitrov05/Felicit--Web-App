<?php
require('../sql/dbFunction.php');
$confing =  new dbFunction();
$id = $_GET['id'];
$sql = $confing->DeleteBookingById($id);
if (!$sql) {
   echo "Error";

}else{
    header("location:../Page/Staff/home.php");
}
