<?php
require_once "Database.php";

class Complaint extends Database
{

    public function getCompliant_by_id($c_id)
    {
        $q = "SELECT complaint.complaint_id, complaint.is_bulb_there, complaint.Notes, complainer.NIC, complainer.phone_no
        FROM complaint INNER JOIN complainer 
        ON complaint.complainer_id=complainer.complainer_id WHERE complaint.complaint_id='$c_id'";

       

        $list =   $this->conn->query($q);
        // echo $list;
        return $list->fetch_assoc();
    
    }

   
    public function getCompliant_by_repair_id($r_id)
    {
        $q = "SELECT complaint.complaint_id, complaint.is_bulb_there, complaint.Notes, complainer.NIC, complainer.phone_no ,complainer.Name
        FROM complaint INNER JOIN complainer 
        ON complaint.complainer_id=complainer.complainer_id WHERE complaint.repair_id='$r_id'";

        $list =   $this->conn->query($q);
        // echo $list;
        return $list->fetch_assoc();
    }
}
