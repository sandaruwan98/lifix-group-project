<?php
namespace models;
require_once "Database.php";
class TmpInventory extends Database
{

    public function updateQuantity($tech,$itemid)
    {
        $q1 = "SELECT quantity FROM tmpinventory WHERE Item_id='$itemid' AND tecnician_id='$tech' ";
        
        $q2 = " UPDATE `tmpinventory` SET `quantity`=[value-2] WHERE Item_id='$itemid' AND tecnician_id='$tech' ";

        // $list =   $this->conn->query($q);
        // return $list->fetch_assoc();
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
