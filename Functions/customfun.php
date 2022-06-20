<?php
include 'ip.php';
function InsertIP($confing)
{
    $loginID = $_SESSION['id'];
    $ipAdress =  UserInfo::get_ip();
    $os = UserInfo::get_os();
    $device = UserInfo::get_device();
    $browser = UserInfo::get_browser();
    $ip =  $confing->IP($ipAdress, $loginID,$os,$device,$browser);
    return $ip;
}
function InsertStatus($confing)
{
    $loginID = $_SESSION['id'];
    $token = openssl_random_pseudo_bytes(5);
    $token = bin2hex($token);
    $status =  $confing->InsertStatus($loginID, $token);
    return $status;
}
function DeleteToken($confing)
{
    $loginID = $_SESSION['id'];
    $delete = $confing->DeleteTokenById($loginID);
    return $delete;
}
