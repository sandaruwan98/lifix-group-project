<?php

namespace models;

require_once "Database.php";

class ReturnItem extends Database
{

    public function addRecord($tech)
    {
        $date = date("y-m-d");

        $q1 = " INSERT INTO `returnitemcheck`(`tech_id`, `date`) VALUES ( '$tech','$date' ) ";

        $this->conn->query($q1);
    }

    public function checkAlredyDoneorNot($tech)
    {
        $date = date("y-m-d");
        $query = " SELECT * FROM returnitemcheck WHERE tech_id='$tech' AND date='$date' ";
        $result = $this->conn->query($query);
        if ($result->num_rows == 0)
            return false;
        else
            return true;
    }
}
