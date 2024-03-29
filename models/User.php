<?php

namespace models;

require_once "Database.php";

class User extends Database
{


    public function CreateUser($username, $name, $role, $phone, $pass)
    {
        $query = "INSERT INTO user(`username`, `Name`, `phone` , `occuFlag`, `statusFlag`,`password`) VALUES ('$username','$name', '$phone','$role',0,'$pass')";
        $this->conn->query($query);
        return $this->conn->insert_id;
    }

    public function isUsernameAvailable($username)
    {
        $q = "SELECT `username` FROM `user` WHERE `username`='$username' ";
        $result = $this->conn->query($q);
        if ($result->num_rows > 0)
            return false;
        else
            return true;
    }
    public function getPhoneNumByusername($username)
    {
        $q = "SELECT `phone` FROM `user` WHERE `username`='$username' ";
        $result = $this->conn->query($q);
        if ($result->num_rows > 0)
            return $result->fetch_assoc()['phone'];
    }

    public function updatePassword($username, $pass)
    {

        $q = "UPDATE `user` SET  `password`='$pass' WHERE `username`='$username' ";
        return $this->conn->query($q);
    }
    public function getUser($username, $pass)
    {

        $q = "SELECT * FROM `user` WHERE `username`='$username' AND `password`='$pass'  ";
        $list =   $this->conn->query($q);
        return $list;
    }


    public function getUsers($type)
    {
        $q = "SELECT `userId`, `Name` FROM `user` WHERE `occuFlag`='$type' AND NOT statusFlag = 0 ";
        $list =   $this->conn->query($q);
        return $list;
    }



    public function getUserById($id)
    {
        $q = "SELECT `userId`, `Name`,`phone`,`username`,`occuFlag` FROM `user` WHERE userId='$id'";
        $list =   $this->conn->query($q);
        return $list->fetch_assoc();
    }

    public function getNameById($id)
    {
        $q = "SELECT `userId`, `Name` FROM `user` WHERE userId='$id'";
        $list =   $this->conn->query($q);
        $list = $list->fetch_assoc();
        return $list['Name'];
    }

    public function getUserDetails($id)
    {
        $q = "SELECT `userId`,`username`, `Name`, `phone` FROM `user` WHERE userId='$id'";
        $list =   $this->conn->query($q);
        return $list->fetch_assoc();
    }





    function getActiveUsers() {
        $query = "SELECT userId,username FROM user WHERE NOT statusFlag = 2 AND NOT statusFlag = 0";
        $list =   $this->conn->query($query);
        return $list->fetch_all(MYSQLI_ASSOC);
    }


    function revoke($username) {
        $q = "UPDATE user SET statusFlag = 2 WHERE username = '$username'";
        return $this->conn->query($q);
        
    }
    function ActivateUser($id) {
        $q = "UPDATE user SET statusFlag = 1 WHERE userId = '$id'";
        return $this->conn->query($q);
        
    }
    function DeleteUser($id) {
        $q = "DELETE FROM user WHERE userId = '$id'";
        return $this->conn->query($q);
        
    }

  



}
