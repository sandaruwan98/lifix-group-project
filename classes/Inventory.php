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

   
    public function getAllItems()
    {
        $q = "SELECT * FROM inventory";

        $list =   $this->conn->query($q);
        return $list;
    }

   
}
