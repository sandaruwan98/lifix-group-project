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

        $q = "INSERT INTO `lamppost`(`lp_id`, `division`, `lattitude`, `longitude`,`added_by`) VALUES
         ('$lp_id','$address','$lat','$lng' ,$technician_id )";
        
        $this->conn->query($q);
    }


    public function DeleteLampost( $lp_id)
    {
        $q = "DELETE FROM `lamppost` WHERE lp_id='$lp_id'";
        $this->conn->query($q);
    }

    
    private function AddUsedItemforLP($lp_id,$item_id,$quantity){
        $q = "INSERT INTO `inventory_lamppost_asc`( `lamppost_id`, `item_id`, `quantity`) VALUES 
        ('$lp_id','$item_id' , '$quantity')";

       if( $this->conn->query($q) !== TRUE)
            echo (' <h4 style="background-color: red;color: #fff;padding: 5px;border-radius: 5px;margin: 5px 0;">Process failed '.$this->conn->error .'</h4> ');
       
    }

    public function Add_All_Used_Items_forNewLP($lp_id,$used_items){
        // add ussed items to database
        foreach ($used_items as $item){
            $this->AddUsedItemforLP($lp_id, $item[0],$item[1]);
        }
        
    }

}

