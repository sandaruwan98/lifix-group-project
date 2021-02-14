<?php
namespace classes;
include_once  __DIR__ . '/../utils/classloader.php';

class InventoryManager
{

    //--------------------------------- Inventory --------------------------------


     // check is there inventory have enough items to reduce
     public function CheckInventoryBeforeReduce($items)
     {
         $err = '';
         $invmodel = new \models\Inventory();
         foreach ($items as $item) {
             if (!$invmodel->checkAvailability($item[0],$item[1])) {
                 $err = $err.$item[2]." ,";
             }
         }
         return $err;
     }

    // decrease quntities from inv when tech confirm the supplied itemrequst
    public function DecreaseInventory($items)
    {
        $invmodel = new \models\Inventory();
        foreach ($items as $item) {
            $invmodel->updateQuantity($item[0],$item[1],'-');
            // $invmodel->updateQuantity($item['item_id'],$item['quantity'],'-');

        }
    }


    // increase quntities from inv when when storekeeper confirm the stockaddition
    public function IncreaseInventory($items)
    {
        $invmodel = new \models\Inventory();
        foreach ($items as $item) {
            $invmodel->updateQuantity($item['item_id'],$item['quantity'],'+');
        }
    }
     






    //--------------------------------- TmpInventory --------------------------------




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

    // increase quntities from inv when tech confim the supplied itemrequst
    public function IncreasetmpInventory($items,$tech_id)
    {
        $tmpmodel = new \models\TmpInventory();
        foreach ($items as $item) {
            $tmpmodel->updateQuantity($tech_id,$item[0],$item[1],'+');
        }
    }





}
