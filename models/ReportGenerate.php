<?php 
namespace models;
require_once "Database.php";

class ReportGenerate extends Database {

    public function getComplaints($firstDate, $secondDate) {
        // $query = "SELECT complaint.lp_id, complainer.Name, complainer.phone_no, complaint.recorded_on, repair.status, repair.technician_id
        // FROM complaint
        // INNER JOIN complainer
        // ON complaint.complainer_id = complainer.complainer_id
        // INNER JOIN repair
        // ON repair.complainer_id  = complaint.complainer_id 
        // WHERE complaint.recorded_on BETWEEN '$firstDate' AND '$secondDate' ORDER BY complaint.recorded_on DESC";

        $query = "SELECT complaint.lp_id, complainer.Name, complainer.phone_no, complaint.recorded_on, repair.status, repair.technician_id
        FROM complaint
        INNER JOIN complainer
        ON complaint.complainer_id = complainer.complainer_id
        INNER JOIN repair
        ON repair.repair_id  = complaint.repair_id
        WHERE complaint.recorded_on BETWEEN '$firstDate' AND '$secondDate' ORDER BY complaint.recorded_on DESC";

        $result = $this->conn->query($query);
        return $result;
    }
  
    public function getLpRecords($firstDate, $secondDate) {
      
        $query = "SELECT newlamppostrecord.date,newlamppostrecord.auth_by,newlamppostrecord.requested_by,newlamppostrecord.notes,newlamppostrecord.lp_id,lamppost.division FROM newlamppostrecord INNER JOIN lamppost ON
        newlamppostrecord.lp_id = lamppost.lp_id
        WHERE newlamppostrecord.date BETWEEN '$firstDate' AND '$secondDate' ORDER BY newlamppostrecord.date DESC";

        $result = $this->conn->query($query);
        return $result;
    }
    
    public function getnormalRepairCount($firstDate, $secondDate) {
      
        $query = "SELECT COUNT(*) AS count FROM repair WHERE date BETWEEN '$firstDate' AND '$secondDate'";
        $count =   $this->conn->query($query);
        $count =   $count->fetch_assoc();
        return $count["count"];
    }
    
    public function getsuspiRepairCount($firstDate, $secondDate) {
      
        $query = "SELECT COUNT(*) AS count FROM fraud WHERE date BETWEEN '$firstDate' AND '$secondDate'";
        $count =   $this->conn->query($query);
        $count =   $count->fetch_assoc();
        return $count["count"];
    }
    public function getRepairCountBydate($firstDate, $secondDate) {
      
        $query = "SELECT date,COUNT(*) AS count FROM repair GROUP BY date HAVING date BETWEEN '$firstDate' AND '$secondDate'";
        $result = $this->conn->query($query);
        return $result;
    }
    

}
