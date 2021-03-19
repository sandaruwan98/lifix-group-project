<?php
namespace models;
require_once "Database.php";
class Inventory extends Database
{

    public function getItemByName($name)
    {
        $q = "SELECT * FROM inventory WHERE name='$name'";

        $list =   $this->conn->query($q);
        return $list->fetch_assoc();
    }

   
    public function getItemNames()
    {
        $q = "SELECT Item_id,name FROM inventory";

        $list =   $this->conn->query($q);
        return $list;
    }
    public function getItemIDs()
    {
        $q = "SELECT Item_id FROM inventory";

        $list =   $this->conn->query($q);
        return $list;
    }
    public function getAllInventory()
    {
        $q = "SELECT Item_id,name,total FROM inventory";

        $list =   $this->conn->query($q);
        return $list;
    }


    public function getInventory()
    {
    
    $q = "SELECT name,total FROM inventory";

        $list =   $this->conn->query($q);
        return $list;
    }
   
   

   



    public function updateQuantity($itemid,$quantity,$operator)
    {
       
        $q = " UPDATE inventory SET total=total $operator '$quantity' WHERE Item_id='$itemid' ";
        return $this->conn->query($q);
    }

    public function checkAvailability($itemid,$quantity)
    {
        $q = "SELECT total FROM inventory WHERE Item_id='$itemid'  ";
        $result = $this->conn->query($q);
        $result = $result->fetch_assoc();
        if ($result['total'] < $quantity ){
            return false;
        }else {
            return true;
        }

        
    }
    
}

