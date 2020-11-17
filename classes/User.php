<?php
namespace classes;
require_once "Database.php";

class User extends Database
{

    
    public function addUser()
    {

      
    }

    
    public function getUsers($type)
    {
        $q = "SELECT `userId`, `Name` FROM `user` WHERE `occuFlag`='$type' AND `statusFlag`= 0";
        $list =   $this->conn->query($q);
        return $list;
    }





    



}

