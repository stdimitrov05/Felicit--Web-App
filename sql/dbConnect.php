<?php
class dbConnecting
{
    public function connDB()
    {
        require_once 'config.php';
        $connecting = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if (!$connecting) {
            die("Cant conneting to Db");
        } else {
            return $connecting;
        }
    }
    public function Close($connecting)
    {
        mysqli_close($connecting);
    }
}
