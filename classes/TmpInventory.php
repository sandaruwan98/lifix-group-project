<?php
namespace classes;
// include_once '../utils/modelLoader.php';
include_once  __DIR__ . '/../utils/classloader.php';

class TmpInventory extends Framework
{
    public function __construct() {
        $this->session = new Session('login');
    }
    
 
        
    public function AddTmpInventoryfortech($tech)
    {
        $inv = new \models\Inventory();
        $tmpinv = new \models\TmpInventory();
        $items = $inv->getItemIDs();
        foreach ($items->fetch_all() as $item) {
            $tmpinv->addTmpInventoryItem($tech,$item[0]);
        }
    }
        
    public function AddItems($tech,$items)
    {
        
    }




}
