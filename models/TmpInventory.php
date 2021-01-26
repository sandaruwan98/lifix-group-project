<?php
namespace models;
require_once "Database.php";
class TmpInventory extends Database
{

    public function updateQuantity($tech,$itemid,$quantity,$operator)
    {
        // $q1 = "SELECT quantity FROM tmpinventory WHERE Item_id='$itemid' AND tecnician_id='$tech' ";
        
        $q = " UPDATE tmpinventory SET quantity=quantity $operator '$quantity' WHERE Item_id='$itemid' AND tecnician_id='$tech' ";
        echo $q;
        return $this->conn->query($q);
        
    }

    public function checkAvailability($tech,$itemid,$quantity)
    {
        $q = "SELECT quantity FROM tmpinventory WHERE Item_id='$itemid' AND tecnician_id='$tech' ";
        
        
        $result = $this->conn->query($q);
        $result = $result->fetch_assoc();
        if ($result['quantity'] < $quantity ){
            return false;
        }else {
            return true;
        }

        
    }
    

   
    
    public function getAllInventory($tech)
    {
        $q = "SELECT inventory.name,tmpinventory.quantity 
        FROM tmpinventory INNER JOIN inventory
        ON tmpinventory.Item_id=inventory.Item_id 
        WHERE tmpinventory.tecnician_id='$tech' ";

        $result =   $this->conn->query($q);
        return $result;
    }


    

    public function addTmpInventoryItem($tech,$item)
    {
        $q = " INSERT INTO `tmpinventory`( `tecnician_id`, `Item_id`) VALUES ( '$tech','$item' ) ";
        return $this->conn->query($q);
        
    }

   
}
