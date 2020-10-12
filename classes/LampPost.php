<?php
require_once "Database.php";

class LampPost extends Database
{

    
    public function addLampost( $lp_id,$road,$division,$lat,$lng)
    {
       $address= $road.' , '.$division;

        $q = "INSERT INTO `lamppost`(`lp_id`, `division`, `lattitude`, `longitude`) VALUES
         ('$lp_id','$address','$lat','$lng'  )";
        
        $this->conn->query($q);
        return $this->conn->insert_id;
    }
    




    



}

