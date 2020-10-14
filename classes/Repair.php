<?php
require_once "Database.php";

class Repair extends Database
{

    
    public function createRepair( $status,$lp_id,$technician_id,$clerk_id)
    {
        $date = date("yy-m-d");

        $q = "INSERT INTO `repair`(`date`, `status`, `lp_id`, `technician_id`, `clerk_id`) VALUES 
        ('$date', '$status','$lp_id', '$technician_id' , '$clerk_id' )";
        
        $this->conn->query($q);
        return $this->conn->insert_id;
    }
    


    public function getRepairs($status)
    {
        $q = "SELECT repair.repair_id, repair.lp_id, lamppost.division , repair.date 
        FROM lamppost INNER JOIN repair 
        ON lamppost.lp_id=repair.lp_id WHERE repair.status='$status' ORDER BY repair.date DESC " ;

        $list =   $this->conn->query($q);
        return $list;
    }

    public function changeStatus($id, $st)
    {
        $q = "UPDATE `repair` SET `status`='$st' WHERE `repair_id`= '$id'";
        $this->conn->query($q);
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

    private function AddUsedReturnItem($r_id,$item_id,$quantity,$returnflag){
        $q = "INSERT INTO `repair_inventory_asc`( `repair_id`, `item_id`, `quantity`, `damage_used_flag`) VALUES 
        ('$r_id','$item_id' , '$quantity', '$returnflag')";

       if( $this->conn->query($q) !== TRUE)
            echo (' <h4 style="background-color: red;color: #fff;padding: 5px;border-radius: 5px;margin: 5px 0;">Process failed '.$this->conn->error .'</h4> ');
       
    }












    public function CompleteRepair($r_id,$used_items,$return_items){
        // add used items to database
        foreach ($used_items as $item){
            $this->AddUsedReturnItem($r_id, $item[0],$item[1],0);
        }
        // add return items to database
        foreach ($return_items as $item){
            $this->AddUsedReturnItem($r_id, $item[0],$item[1],1);
        }
        // chansge repair status as completed
        $this->changeStatus($r_id,'c');

        
       
    }

    public function CreateEmergencyRepair($lp_id,$technician_id,$used_items,$return_items){
        // hence this is emgrepair status is e, clerkid is 0 (defalt one) because he did not assign that to technician
        $r_id = $this->createRepair('e',$lp_id,$technician_id,0);
        
        // add used items to database
        foreach ($used_items as $item){
            $this->AddUsedReturnItem($r_id, $item[0],$item[1],0);
        }
        // add return items to database
        foreach ($return_items as $item){
            $this->AddUsedReturnItem($r_id, $item[0],$item[1],1);
        }
        
    }



    



}

