<?php
require_once "Database.php";

class Repair extends Database
{

    public function getRepairs($status)
    {
        $q = "SELECT repair.repair_id, repair.lp_id, lamppost.division , repair.date 
        FROM lamppost INNER JOIN repair 
        ON lamppost.lp_id=repair.lp_id WHERE repair.status='$status'";

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

    public function getRepairByid($r_id)
    {
        $q = "SELECT repair.repair_id, repair.lp_id,repair.status,repair.date  , lamppost.division , lamppost.lattitude,lamppost.longitude
        FROM lamppost INNER JOIN repair 
        ON lamppost.lp_id=repair.lp_id WHERE repair.repair_id='$r_id'";

        $list =   $this->conn->query($q);
        // echo $list;
        return $list->fetch_assoc();
    }

    public function CompleteRepair($r_id){
        
    }
}
