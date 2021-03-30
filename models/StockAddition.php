<?php

namespace models;

require_once "Database.php";

class StockAddition extends Database
{

    public function get_SA_ListAll($paginationFilter, $searchfilter)
    {
        $search_word = " WHERE sa_id LIKE '%$searchfilter%' OR Name LIKE '%$searchfilter%' OR date LIKE '%$searchfilter%' ";

        if ($searchfilter == '') {
        
            $q = "SELECT * FROM stock_addition_view" . $paginationFilter;
        }else{
            
            $q = "SELECT * FROM stock_addition_view" . $search_word . $paginationFilter;
        }


        $list =   $this->conn->query($q);
        return $list;
    }

    public function get_SA_ListAll_Count($searchfilter)
    {
        $search_word = " WHERE sa_id LIKE '%$searchfilter%' OR Name LIKE '%$searchfilter%' OR date LIKE '%$searchfilter%' ";
        
        if ($searchfilter == '') {
        
            $q = "SELECT COUNT(sa_id) AS count FROM stock_addition_view " ;
        }else{
            
            $q = "SELECT COUNT(sa_id) AS count FROM stock_addition_view " . $search_word ;
        }
        $count =   $this->conn->query($q);
        $count =   $count->fetch_assoc();
        return $count["count"];
    }



    public function get_SA_List($status)
    {
        $q = "SELECT `sa_id`, `date`, `clerk_id` FROM `stock_addition` WHERE status='$status' ";

        $list =   $this->conn->query($q);
        return $list;
    }

    public function get_SA_byid($id)
    {
        $q = "SELECT `sa_id`, `date`, `clerk_id` FROM `stock_addition` WHERE sa_id='$id' ";

        $list =   $this->conn->query($q);
        return $list->fetch_assoc();
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


    public function setStatus($st, $id)
    {
        $q = "UPDATE `stock_addition` SET `status` = '$st' WHERE `stock_addition`.`sa_id` = '$id' ";
        $this->conn->query($q);
    }




    public function Add_SA_Record($created_user_id)
    {
        $date = date("Y-m-d");
        $q = "INSERT INTO `stock_addition`( `date`, `status`, `clerk_id`) VALUES 
        ('$date','0','$created_user_id')";

        $this->conn->query($q);
    }

    private function Add_SA_Asc($sa_id, $item_id, $quantity)
    {
        $q = "INSERT INTO `stock_addition_inventory_asc`(`sa_id`, `item_id`, `quantity`) VALUES 
        ('$sa_id','$item_id' , '$quantity')";

        $this->conn->query($q);
    }







    public function Create_SA($created_user_id, $added_items)
    {
        // 
        $this->Add_SA_Record($created_user_id);
        $last_id = $this->conn->insert_id;
        // add added items to database
        foreach ($added_items as $item) {
            $this->Add_SA_Asc($last_id, $item["itemNo"], $item["Quantity"]);
        }
    }
}
