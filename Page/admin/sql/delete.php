<?php
require('../../../sql/dbFunction.php');
$confing =  new dbFunction();
$id = $_GET['id'];
$sql = $confing->DeleteProfileById($id);
if (!$sql) {
   echo "Error";

}else{
    header("location:../html/table-basic.php");
}
