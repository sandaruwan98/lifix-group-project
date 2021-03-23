<?php 
namespace models;
require_once "Database.php";

class ReportGenerate extends Database {

    public function getComplaints($firstDate, $secondDate) {
        $query = "SELECT complaint.lp_id, complainer.Name, complainer.phone_no, complaint.recorded_on, repair.status, repair.technician_id
        FROM complaint
        INNER JOIN complainer
        ON complaint.complainer_id = complainer.complainer_id
        INNER JOIN repair
        ON repair.complainer_id  = complaint.complainer_id 
        WHERE complaint.recorded_on BETWEEN '$firstDate' AND '$secondDate' ORDER BY complaint.recorded_on DESC";

        $result = $this->conn->query($query);
        return $result;
    }

}
