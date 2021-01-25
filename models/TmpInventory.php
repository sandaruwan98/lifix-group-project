<?php
namespace models;
require_once "Database.php";
class TmpInventory extends Database
{

    public function updateQuantity($tech,$itemid)
    {
        // $q = "SELECT * FROM tmpinventory WHERE name='$name'";

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
