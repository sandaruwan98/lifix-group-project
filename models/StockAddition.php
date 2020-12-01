<?php
namespace models;
require_once "Database.php";

class StockAddition extends Database
{

    public function get_SA_ListAll()
    {
        $q = "SELECT `sa_id`, `date`, `status`, `clerk_id` FROM `stock_addition`";

        $list =   $this->conn->query($q);
        return $list;
    }
    public function get_SA_List($status)
    {
        $q = "SELECT `sa_id`, `date`, `clerk_id` FROM `stock_addition` WHERE status='$status' ";

        $list =   $this->conn->query($q);
        return $list;
    }



    

    public function getItemsfor_SA_byId($sa_id)
    {
        // $q = "SELECT `Itemrequest_id`, `created_by`, `added_date` FROM `itemrequest` WHERE `status`='o' ";
        $q = "SELECT stock_addition_inventory_asc.item_id, stock_addition_inventory_asc.quantity, inventory.name
         FROM `stock_addition_inventory_asc` INNER JOIN `inventory`
         ON stock_addition_inventory_asc.item_id=inventory.Item_id 
         WHERE `sa_id`='$sa_id' ";

        $list =   $this->conn->query($q);
        return $list->fetch_all(MYSQLI_ASSOC);
    }
 

    public function setStatus($st,$id){
        $q = "UPDATE `stock_addition` SET `status` = '$st' WHERE `stock_addition`.`sa_id` = '$id' ";
        $this->conn->query($q);
    }




    public function Add_SA_Record($created_user_id){
        $date = date("yy-m-d");
        $q = "INSERT INTO `stock_addition`( `date`, `status`, `clerk_id`) VALUES 
        ('$date','0','$created_user_id')";

        $this->conn->query($q);
    }
   
    private function Add_SA_Asc($sa_id,$item_id,$quantity){
        $q = "INSERT INTO `stock_addition_inventory_asc`(`sa_id`, `item_id`, `quantity`) VALUES 
        ('$sa_id','$item_id' , '$quantity')";

        $this->conn->query($q);
    }






    
    public function Create_SA($created_user_id,$added_items){
        // 
        $this->Add_SA_Record($created_user_id);
        $last_id = $this->conn->insert_id;
        // add added items to database
        foreach ($added_items as $item){
            $this->Add_SA_Asc($last_id, $item["itemNo"],$item["Quantity"]);
        }
        
    }
}
