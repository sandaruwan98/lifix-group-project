<?php
require "../databaseconn.php";
class Map extends Database
{

    public function getMarkers()
    {

        $q = "SELECT repair.repair_id, lamppost.lattitude, lamppost.longitude 
        FROM lamppost INNER JOIN repair 
        ON lamppost.lpid=repair.lp_id WHERE repair.status!='c'";
        
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
