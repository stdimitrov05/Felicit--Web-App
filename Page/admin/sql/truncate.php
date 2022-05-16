<?php
require('../../../Functions/customfun.php');
include('../../../sql/dbFunction.php');
$confing =  new dbFunction();

$sql = $confing->TruncateIpTable();
if (!$sql) {
   echo "Error";

}else{
    DeleteToken($confing);
    session_destroy();
    header("location:../../index.php");
}
