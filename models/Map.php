<?php

namespace models;
require_once "Database.php";
class Map extends Database
{

    public function getMarkers()
    {

        $q = "SELECT repair.repair_id, lamppost.lattitude, lamppost.longitude ,lamppost.lp_id
        FROM lamppost INNER JOIN repair 
        ON lamppost.lp_id=repair.lp_id WHERE repair.status!='c'";

        $result =  $this->conn->query($q);
        $arr = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
        }
        return $arr;
    }

    
    
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

    public function getSectionById($sec_id)
    {
        $query="SELECT * FROM `tech_sections` WHERE `section_id`='$sec_id' ";
        
        return $this->conn->query($query);
    }
    public function getAllSections()
    {
        $query="SELECT * FROM `tech_sections`";
        
        return $this->conn->query($query);
    }

    // public function getSectionColors()
    // {
    //     $query="SELECT * FROM `tech_sections`";
        
    //     $list = $this->conn->query($query);
    //     return $list->fetch_all(MYSQLI_ASSOC);
    // }
    public function getPointsForSection($sec_id)
    {
        $q="SELECT `lng`, `lat`  FROM `section_points` WHERE `section_id`='$sec_id' ";
        $list = $this->conn->query($q);
        return $list->fetch_all();
    }
}
