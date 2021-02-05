<?php
namespace classes;
// include_once '../utils/modelLoader.php';
include_once  __DIR__ . '/../utils/classloader.php';

class InventoryManager
{

    // create tmpinv when new tech account is created
    public function AddTmpInventoryfortech($tech)
    {
        $inv = new \models\Inventory();
        $tmpinv = new \models\TmpInventory();
        $items = $inv->getItemIDs();
        foreach ($items->fetch_all() as $item) {
            $tmpinv->addTmpInventoryItem($tech,$item[0]);
        }
    }

    // check is there tmpinventory have enough items to reduce
    public function CheckTmpInventoryBeforeReduce($items,$tech_id)
    {
        $err = '';
        $tmpmodel = new \models\TmpInventory();
        foreach ($items as $item) {
            if (!$tmpmodel->checkAvailability($tech_id,$item[0],$item[1])) {
                $err = $err.$item[2]." ,";
            }
        }
        return $err;
    }

    // reduce quntities from tmpinv when repair complete 
    public function DecreasetmpInventory($items,$tech_id)
    {
        $tmpmodel = new \models\TmpInventory();
        foreach ($items as $item) {
            $tmpmodel->updateQuantity($tech_id,$item[0],$item[1],'-');
        }
    }


    // increase quntities from tmpinv when tech confim the supplied itemrequst
    public function IncreasetmpInventory($items,$tech_id)
    {
        $tmpmodel = new \models\TmpInventory();
        foreach ($items as $item) {
            $tmpmodel->updateQuantity($tech_id,$item[0],$item[1],'+');
        }
    }
        
    // public function AddItems($tech,$items)
    // {
    //     $tmpmodel = new \models\TmpInventory();
    //     foreach ($items as $item) {
    //         $tmpmodel->updateQuantity($tech,$item[0],$item[1],'-');
    //     }
        
    // }
    // public function check($tech,$items)
    // {
    //     $tmpmodel = new \models\TmpInventory();
    //     foreach ($items as $item) {
    //         $tmpmodel->checkAvailability($tech,$item[0],$item[1]);
    //     }
        
    // }




}
