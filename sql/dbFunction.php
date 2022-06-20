
<?php
require_once 'dbConnect.php';
session_start();
class dbFunction
{

    function __construct()
    {

        // connecting to database  
        $conToDb = new dbConnecting();
        $this->conToDb = $conToDb->connDB();
    }
    // destructor  
    function __destruct()
    {
    }


    //INSERT FUNCIONS


    public function InsertRoleProfileDataByID($role, $id)
    {
        $insert =  mysqli_query($this->conToDb, "INSERT INTO profle role VALUES ('$role') WHERE id='$id' ");
        return $insert;
    }
    public function InsertStatus($id, $token)
    {

        $sql = mysqli_query($this->conToDb, "INSERT INTO status (profileId,token) VALUES ('$id','$token') ");
        return $sql;
    }

    public function BookTableByName($name, $phone, $email, $persons, $date, $info)
    {
        $sql =  mysqli_query($this->conToDb, "INSERT INTO `bookTable` (name,phone,email,persons,date,info) VALUES ('$name','$phone','$email','$persons','$date','$info')");
        return $sql;
    }

    public function Ip($ipAdress, $loginID, $os, $device, $browser)
    {
        $sql = mysqli_query($this->conToDb, "INSERT INTO ip (ipAdress,browser,os,device,profileId) VALUES ('$ipAdress','$browser','$os','$device','$loginID' ) ");
        return $sql;
    }


    public function CreateNewProfile($name, $email, $password, $img)
    {
        $pass =  md5($password);
        $sql =  mysqli_query($this->conToDb, "INSERT INTO `profile` (name,email,password,image) VALUES ('$name','$email','$pass','$img')");
        return $sql;
    }


    public function SelectToken($id )
   {
    return mysqli_query($this->conToDb,"SELECT * FROM `status` WHERE id = '$id'");
   }

    //SELECT FUNCTIONS
    public function SelectAllIp()
    {
        $all = mysqli_query($this->conToDb, "SELECT * FROM ip ORDER BY profileId ASC");
        return $all;
    }

    public function SelectAllProfile()
    {
        $all = mysqli_query($this->conToDb, "SELECT * FROM profile ORDER BY email  ASC ");
        return $all;
    }

    public function SelectProfileByID($id)
    {
        $select = mysqli_query($this->conToDb, "SELECT * FROM profile WHERE id = '" . $id . "'");
        $profileId = mysqli_fetch_array($select);
        $row = mysqli_num_rows($select);
        if ($row == 1) {
            return $profileId['id'];
        } else {
            echo "Error";
        }
    }



    public function SelectNameByID($id)
    {
        $select = mysqli_query($this->conToDb, "SELECT * FROM profile WHERE id = '" . $id . "'");
        $profileId = mysqli_fetch_array($select);
        $row = mysqli_num_rows($select);
        if ($row == 1) {
            return $profileId['name'];
        } else {
            echo "Error";
        }
    }

    public function SelectDataProfileBy()
    {
        $select = mysqli_query($this->conToDb, "SELECT * FROM profile  ");
        $profileId = mysqli_fetch_array($select);
        $row = mysqli_num_rows($select);
        if ($row == 1) {
            $_SESSION['id'] = $profileId['id'];
            $_SESSION['name'] = $profileId['name'];
            $_SESSION['email'] = $profileId['email'];
            $_SESSION['role'] = $profileId['role'];
        } else {
            echo "Error";
        }
    }

    public function SelectDataBokking()
    {
        $select = mysqli_query($this->conToDb, "SELECT * FROM bookTable  ");
        if (!$select) {
            echo "Error";
        }
        return $select;
    }

    public function SelectImageProfile($id)
    {
        $select = mysqli_query($this->conToDb, "SELECT * FROM profile WHERE id = '" . $id . "'");
        $profileImg = mysqli_fetch_array($select);
        $row = mysqli_num_rows($select);
        if ($row == 1) {
            $img = $profileImg['image'];
            echo $img;
        } else {
            echo "Error";
        }
    }

    public function SelectRoleById($id)
    {
        $role =  mysqli_query($this->conToDb, "SELECT * FROM profile WHERE id = '" . $id . "'");
        $roleData = mysqli_fetch_array($role);
        $row = mysqli_num_rows($role);
        if ($row == 1) {
            $role = $roleData['role'];
            return $role;
        } else {
            echo "Error";
        }

        return $role;
    }
    public function InsertNameByID($id)
    {
        $select = mysqli_query($this->conToDb, "SELECT * FROM profile WHERE id = '" . $id . "'");
        $profileName = mysqli_fetch_array($select);
        $row = mysqli_num_rows($select);
        if ($row == 1) {
            $name = $profileName['name'];
            echo $name;
        } else {
            echo "Error";
        }
    }

    public function isUserExitst($name, $email)
    {
        $sql =  mysqli_query($this->conToDb, "SELECT * FROM profile WHERE name =  '" . $name . "'AND email=  '" . $email . "'");
        echo $row = mysqli_num_rows($sql);
        if ($row > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function Login($name, $password)
    {


        $sql = mysqli_query($this->conToDb, "SELECT * FROM profile WHERE name = '" . $name . "' AND password = '" . md5($password) . "'");
        print_r($sql);
        $profile_data = mysqli_fetch_array($sql);
        $number_rows =  mysqli_num_rows($sql);

        if ($number_rows == 1) {
            $_SESSION['login'] = true;
            $_SESSION['id'] = $profile_data['id'];
            $_SESSION['name'] = $profile_data['name'];
            $_SESSION['email'] = $profile_data['email'];

            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function ProfileDataByID($id)
    {
        $select = mysqli_query($this->conToDb, " SELECT * FROM profile WHERE id='$id'");

        return $select;
    }

    // DELETE FUNCTIONS
    public function DeleteBookingById($id)
    {
        $delete = mysqli_query($this->conToDb, "DELETE FROM bookTable WHERE bookTable. id='$id' ");

        return $delete;
    }
    public function DeleteProfileById($id)
    {
        $delete = mysqli_query($this->conToDb, "DELETE FROM profile WHERE profile. id='$id' ");

        return $delete;
    }
    public function TruncateIpTable(){
       return   mysqli_query($this->conToDb, "TRUNCATE TABLE ip ");
        
    }
    public function DeleteTokenById($id)
    {
        $delete = mysqli_query($this->conToDb, "DELETE FROM status WHERE status. profileId='$id' ");

        return $delete;
    }

  
}
