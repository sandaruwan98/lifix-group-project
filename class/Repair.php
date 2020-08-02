<?php
require "../databaseconn.php";
class Repair extends Database
{

    public function getRepairs($status)
    {
        $q = "SELECT repair.repair_id, repair.lp_id, lamppost.division , repair.date 
        FROM lamppost INNER JOIN repair 
        ON lamppost.lpid=repair.lp_id WHERE repair.status='$status'";

        $list =   $this->conn->query($q);
        return $list;
    }

    public function changeStatus($id, $st)
    {
        $q = "UPDATE `repair` SET `status`='$st' WHERE `repair_id`= '$id'";
        $this->conn->query($q);
    }
    public function createRepair($name, $st)
    {
        // $q = "UPDATE `repair` SET `status`='$st' WHERE `repair_id`= '$id'";
        // $this->conn->query($q);
    }
}
