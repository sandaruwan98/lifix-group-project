<?php
require_once "Database.php";

class ItemRequest extends Database
{

   
    public function AddRequestItemRecord($tecnnician_id){
        $q = "INSERT INTO `itemrequest`( `status`, `completed_by`, `created_by`) VALUES 
        ('o', 0 , '$tecnnician_id')";

        $this->conn->query($q);
    }
   


    public function AddRequestedItemAsc($req_id,$item_id,$quantity){
        $q = "INSERT INTO `itemrequest_inventory_asc`( `Itemrequest_id`, `item_id`, `quantity`) VALUES 
        ('$req_id','$item_id' , '$quantity')";

        $this->conn->query($q);
    }



    
    public function CreateItemRequest($req_id,$tecnnician_id,$request_items){
        $this->AddRequestItemRecord($tecnnician_id);

        // add ussed items to database
        foreach ($request_items as $item){
            $this->AddRequestedItemAsc($req_id, $item[0],$item[1]);
        }
        
    }
}
