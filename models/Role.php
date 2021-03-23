<?php
namespace models;
require_once "Database.php";

class Role extends Database
{

    
    public function addRole($userid,$role)
    {

        $date = date("yy-m-d");

        if ($this->checkRole($userid,$role)) {
          $query="UPDATE `roles` SET `is_active`='1',`enddate`='0000-00-00' WHERE role='$role' AND user_id='$userid' ";
          return $this->conn->query($query);
        }

        $query="INSERT INTO `roles`( `role`, `startdate`, `user_id`) VALUES ('$role', '$date','$userid')";
        echo $query;
        return $this->conn->query($query);

    }

    public function removeRole($userid,$role)
    {
        $date = date("yy-m-d");
        // $query="DELETE FROM roles WHERE role='$role' AND user_id='$userid' ";
        $query="UPDATE `roles` SET `is_active`='0',`enddate`='$date' WHERE role='$role' AND user_id='$userid' ";
        return $this->conn->query($query);
    }


    public function getActiveRoles($userid)
    {
        
      $query = "SELECT  `role`  FROM `roles` WHERE `is_active`=1 AND `user_id`='$userid' ";
      return $this->conn->query($query);
    }
    
    public function checkRole($userid,$role)
    {
      $query = "SELECT  *  FROM `roles` WHERE role='$role' AND user_id='$userid' ";
      $result = $this->conn->query($query);
      if ($result->num_rows > 0) 
        return true;
      else
        return false;
      
    }



}

