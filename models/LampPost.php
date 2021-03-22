<?php
namespace models;
require_once "Database.php";
class LampPost extends Database
{  
    
    
    public function getLangLat_byid( $lp_id)
    {

        $q = "SELECT longitude,lattitude FROM `lamppost` WHERE  lp_id='$lp_id'";
        
        $result = $this->conn->query($q);
        return $result->fetch_assoc();
    }
    public function getLampPost_byid( $lp_id)
    {

        $q = "SELECT * FROM `lamppost` WHERE  lp_id='$lp_id'";
        
        $result = $this->conn->query($q);
        return $result->fetch_assoc();
    }
    
    public function addLampost( $lp_id,$address,$lat,$lng,$technician_id)
    {
        $date = date("yy-m-d");
        $q = "INSERT INTO `lamppost`(`lp_id`, `division`, `lattitude`, `longitude`,`added_by`,`date`) VALUES
         ('$lp_id','$address','$lat','$lng' ,$technician_id ,$date)";
        
        $this->conn->query($q);
    }
    public function addNewLampostRecord( $lp_id,$req,$auth,$notes,$date)
    {
        $q = "INSERT INTO `newlamppostrecord`( `date`, `auth_by`, `requested_by`, `notes`, `lp_id`) VALUES ('$date','$auth','$req','$notes','$lp_id')";
        
        return $this->conn->query($q);
    }


    public function DeleteLampost( $lp_id)
    {
        $q = "DELETE FROM `lamppost` WHERE lp_id='$lp_id'";
        $this->conn->query($q);
    }

    

}

