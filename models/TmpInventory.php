<?php
namespace models;
require_once "Database.php";
class TmpInventory extends Database
{

    public function getItemByName($name)
    {
        $q = "SELECT * FROM tmpinventory WHERE name='$name'";

        $list =   $this->conn->query($q);
        return $list->fetch_assoc();
    }

   
    public function getItemNames()
    {
        $q = "SELECT Item_id,name FROM tmpinventory";

        $list =   $this->conn->query($q);
        return $list;
    }
    public function getAllInventory($tech)
    {
        $q = "SELECT Item_id,name,total FROM tmpinventory WHERE tecnician_id='$tech' ";

        $list =   $this->conn->query($q);
        return $list;
    }


    public function addTmpInventory($tech)
    {
        $q = "SELECT Item_id,name,total FROM tmpinventory WHERE tecnician_id='$tech' ";

        $list =   $this->conn->query($q);
        return $list;
    }
    
    public function addTmpInventoryItem($tech,$item)
    {
        $q = " INSERT INTO `tmpinventory`( `tecnician_id`, `Item_id`) VALUES ( '$tech','$item' ) ";
        return $this->conn->query($q);
        
    }

   
}
