<?php

require '../sql/config.php';
error_reporting();
$servername=DB_HOST;
$username=DB_USER;
$password=DB_PASSWORD;
$dbname = DB_DATABASE;
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
   die('Could not Connect My Sql:' );
}
