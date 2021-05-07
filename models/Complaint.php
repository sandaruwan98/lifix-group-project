<?php

namespace models;

require_once "Database.php";
class Complaint extends Database
{

    // start
    // added for nic no check(if it exists on db)

    public function checkComplainerExists($nic)
    {
        $q = "SELECT `complainer_id` FROM `complainer` WHERE `NIC`='$nic'";
        $list =   $this->conn->query($q);
        if ($list->num_rows > 0) {
            $id = $list->fetch_assoc();
            return $id['complainer_id'];
        } else {
            return -1;
        }
    }

    // end

    public function addComplainer($id, $nic, $name, $phone_no)
    {
        if ($id == -1) {
            $q = " INSERT INTO `complainer`( `NIC`, `Name`, `phone_no`) VALUES 
            ('$nic','$name','$phone_no') ";
            $this->conn->query($q);
            return $this->conn->insert_id;
        } else {
            $q = "UPDATE `complainer` SET `NIC`='$nic',`Name`='$name',`phone_no`='$phone_no' WHERE `complainer_id`='$id'  ";
            $this->conn->query($q);

            return $id;
        }
    }


    public function addComplaint($bulb, $note, $lp_id, $repair_id, $complainer_id)
    {
        $q = "INSERT INTO `complaint`( `is_bulb_there`, `Notes`, `lp_id`, `repair_id`, `complainer_id`) VALUES ('$bulb','$note','$lp_id', '$repair_id', '$complainer_id') ";

        $this->conn->query($q);
        return $this->conn->insert_id;
    }

    // public function addComplaint() {
    //     $q = "SELECT `complainer_id` FROM `complainer` WHERE `NIC`=''";
    //     $this->conn->query($q);
    //     return $this->conn->insert_id;
    // }

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

    public function getComplainerPhoneNoandLampId_by_repair_id($r_id)
    {
        $q = "SELECT complainer.phone_no, complaint.lp_id
        FROM complaint INNER JOIN complainer 
        ON complaint.complainer_id=complainer.complainer_id WHERE complaint.repair_id=$r_id";

        $list =   $this->conn->query($q);
        // echo $list;
        return $list->fetch_assoc();
    }


    public function getIsBulbThere($r_id)
    {
        $q = "SELECT is_bulb_there FROM complaint WHERE repair_id='$r_id'";

        $list =   $this->conn->query($q);
        if ($list->num_rows != 0) {
            $list = $list->fetch_assoc();
            return $list['is_bulb_there'];
        } else {
            die('<h4 style="background-color: red;color: #fff;padding: 5px;border-radius: 5px;margin: 5px 0;">Process failed - Invalid repair id</h4> ');
        }
    }
}
