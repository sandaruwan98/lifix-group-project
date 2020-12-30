<?php
namespace models;
require_once "Database.php";
class ItemRequest extends Database
{


    

    public function getItemsfor_ItemRequest_byId($ir_id)
    {
        $q = "SELECT itemrequest_inventory_asc.Item_id, itemrequest_inventory_asc.quantity, inventory.name
         FROM `itemrequest_inventory_asc` INNER JOIN `inventory`
         ON itemrequest_inventory_asc.Item_id=inventory.Item_id 
         WHERE `Itemrequest_id`='$ir_id' ";

        $list =   $this->conn->query($q);
        return $list->fetch_all(MYSQLI_ASSOC);
    }
 


    public function getPendingRequestList()
    {
        // $q = "SELECT `Itemrequest_id`, `created_by`, `added_date` FROM `itemrequest` WHERE `status`='o' ";
        $q = "SELECT itemrequest.Itemrequest_id,user.username , itemrequest.added_date 
        FROM itemrequest INNER JOIN user 
        ON itemrequest.created_by=user.userId
         WHERE itemrequest.status='a' ";

        $list =   $this->conn->query($q);
        return $list;
    }

    public function getPendingRequestList_by_userid($id)
    {
        $q = "SELECT Itemrequest_id , added_date FROM itemrequest WHERE status='o' AND  created_by='$id' ";
        $list =   $this->conn->query($q);
        return $list;
    }




    public function AddRequestItemRecord($created_user_id,$storekeeper_id,$status){
        $date = date("yy-m-d");
        $q = "INSERT INTO `itemrequest`( `status`, `completed_by`, `created_by`,`added_date`) VALUES 
        ('$status', '$storekeeper_id' , '$created_user_id','$date')";

        $this->conn->query($q);
    }
   
    private function AddRequestedItemAsc($req_id,$item_id,$quantity){
        $q = "INSERT INTO `itemrequest_inventory_asc`( `Itemrequest_id`, `item_id`, `quantity`) VALUES 
        ('$req_id','$item_id' , '$quantity')";

        $this->conn->query($q);
    }

    public function sendToTech($id){
        $date = date("yy-m-d");
        echo "done";
        $qurey= "UPDATE `itemrequest` SET `status`='b',`supplied_date`=$date WHERE `Itemrequest_id`=$id";
        $this->conn->query($qurey);
        return true;
    }





////////////////////////////////////
    
    public function CreateItemRequest($created_user_id,$request_items){
        // 
        $this->AddRequestItemRecord($created_user_id, 0 ,'a');
        $last_id = $this->conn->insert_id;
        // add ussed items to database
        foreach ($request_items as $item){
            $this->AddRequestedItemAsc($last_id, $item["itemNo"],$item["Quantity"]);
        }
        
    }
}
