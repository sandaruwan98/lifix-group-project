<?php
require "Database.php";
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
}
