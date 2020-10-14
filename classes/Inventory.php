<?php
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
    public function getAllInventory()
    {
        $q = "SELECT Item_id,name,total FROM inventory";

        $list =   $this->conn->query($q);
        return $list;
    }

   
}
