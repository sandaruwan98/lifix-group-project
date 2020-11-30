<?php
namespace models;
require_once "Database.php";

class User extends Database
{

    
    public function addUser()
    {

      
    }

    
    public function getUsers($type)
    {
        $q = "SELECT `userId`, `Name` FROM `user` WHERE `occuFlag`='$type' ";
        // $q = "SELECT `userId`, `Name` FROM `user` WHERE `occuFlag`='$type' AND `statusFlag`= 1";
        $list =   $this->conn->query($q);
        return $list;
    }
    public function getUserById($id)
    {
        $q = "SELECT `userId`, `Name` FROM `user` WHERE userId='$id'";
        // $q = "SELECT `userId`, `Name` FROM `user` WHERE `occuFlag`='$type' AND `statusFlag`= 1";
        $list =   $this->conn->query($q);
        return $list->fetch_assoc();
    }
    public function getNameById($id)
    {
        $q = "SELECT `userId`, `Name` FROM `user` WHERE userId='$id'";
        // $q = "SELECT `userId`, `Name` FROM `user` WHERE `occuFlag`='$type' AND `statusFlag`= 1";
        $list =   $this->conn->query($q);
        $list = $list->fetch_assoc();
        return $list['Name'];
    }





    



}

