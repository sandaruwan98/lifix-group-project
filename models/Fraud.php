<?php

namespace models;

require_once "Database.php";

class Fraud extends Database
{

    public function addFraud($doneBy,$addedBy,$discription,$type,$arr){
        // first add new fraud record 
        $date = date("yy-m-d");

        $q1 = " INSERT INTO `fraud`(`doneBy`, `added_by`, `description`, `date`, `type`) VALUES ('$doneBy','$addedBy','$discription', '$date' ,'$type' ) ";
        
        $this->conn->query($q1);
        $fraud_id = $this->conn->insert_id;


        //then add fraud items for the fraud
        foreach ($arr as $item_id => $values) {
            $q = " INSERT INTO `fraud_item`(`item_id`, `difference`, `fraud_id`, `notes`) VALUES ( '$item_id' , '$values[0]', '$fraud_id' , '$values[1]'  ) ";
            $this->conn->query($q);
        } 
    }

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
