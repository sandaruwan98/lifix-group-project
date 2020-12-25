<?php
namespace models;
require_once "Database.php";

class Role extends Database
{

    
    public function addRole($userid,$role)
    {
        $date = date("yy-m-d");
        $query="INSERT INTO `roles`( `role`, `startdate`, `user_id`) VALUES ('$role', '$date','$userid')";
        return $this->conn->query($query);
    }


    public function getActiveRoles($userid)
    {
        
      
      
    }
    public function getallRoles($userid)
    {
        
      
      
    }



    



}

