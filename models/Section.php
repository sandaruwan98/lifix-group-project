<?php
namespace models;
require_once "Database.php";

class Section extends Database
{

    
    public function CreateSection($tech_id,$color)
    {
        $query="INSERT INTO `tech_sections` ( `tech_id`, `color`) VALUES ('$tech_id','$color')";
        $this->conn->query($query);
        return $this->conn->insert_id;
    }

    

    // public function getUser($username,$pass)
    // {
        
    //     $q = "SELECT * FROM `user` WHERE `username`='$username' AND `password`='$pass'  ";
    //     // $q = "SELECT `userId`, `Name` FROM `user` WHERE `occuFlag`='$type' AND `statusFlag`= 1";
    //     $list =   $this->conn->query($q);
    //     return $list;
      
    // }




}

