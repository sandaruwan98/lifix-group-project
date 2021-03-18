<?php

namespace models;

require_once "Database.php";

class Fraud extends Database
{

    public function getFraudsByUserID($id, $firstDate, $secondDate)
    {
        $query = "SELECT fraud.fraud_id, fraud.description, fraud.date, fraud_item.difference, fraud_item.item_id 
        FROM fraud
        join fraud_item
        ON fraud.fraud_id = fraud_item.fraud_id
        WHERE fraud.date BETWEEN '$firstDate' AND '$secondDate' AND (fraud.doneBy = $id)";
        $result = $this->conn->query($query);
        return $result;
    }
}
