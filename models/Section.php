<?php
namespace models;
require_once "Database.php";

class Section extends Database
{

    
    public function DeleteSection($tech_id)
    {
        $query="DELETE FROM `tech_sections` WHERE `tech_id`='$tech_id' ";
        
        return $this->conn->query($query);
    }
    public function CreateSection($tech_id,$color)
    {
        $query="INSERT INTO `tech_sections` ( `tech_id`, `color`) VALUES ('$tech_id','$color')";
        $this->conn->query($query);
        return $this->conn->insert_id;
    }
    
    public function AddPoint($sec_id,$lng,$lat)
    {
        $query="INSERT INTO `section_points`(`section_id`, `lng`, `lat`)  VALUES ('$sec_id','$lng','$lat')";
        return $this->conn->query($query);
    }

    public function GetPointsForSection($sec_id)
    {
        $query="SELECT (`section_id`, `lng`, `lat`)  FROM `section_points` WHERE `section_id`='$sec_id' ";
        
        return $this->conn->query($query);
    }



    // public function getUser($username,$pass)
    // {
        
    //     $q = "SELECT * FROM `user` WHERE `username`='$username' AND `password`='$pass'  ";
    //     // $q = "SELECT `userId`, `Name` FROM `user` WHERE `occuFlag`='$type' AND `statusFlag`= 1";
    //     $list =   $this->conn->query($q);
    //     return $list;
      
    // }




}

