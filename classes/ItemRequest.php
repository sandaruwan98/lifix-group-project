<?php
require_once "Database.php";

class ItemRequest extends Database
{

   
    public function AddRequestItemRecord($created_user_id,$storekeeper_id,$status){
        $q = "INSERT INTO `itemrequest`( `status`, `completed_by`, `created_by`) VALUES 
        ('$status', '$storekeeper_id' , '$created_user_id')";

        $this->conn->query($q);
    }
   
    public function AddRequestedItemAsc($req_id,$item_id,$quantity){
        $q = "INSERT INTO `itemrequest_inventory_asc`( `Itemrequest_id`, `item_id`, `quantity`) VALUES 
        ('$req_id','$item_id' , '$quantity')";

        $this->conn->query($q);
    }






    
    public function CreateItemRequest($created_user_id,$request_items){
        // 
        $this->AddRequestItemRecord($created_user_id, 0 ,'o');
        $last_id = $this->conn->insert_id;
        // add ussed items to database
        foreach ($request_items as $item){
            $this->AddRequestedItemAsc($last_id, $item[0],$item[1]);
        }
        
    }
}
