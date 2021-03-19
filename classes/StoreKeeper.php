<?php
namespace classes;
// include_once '../utils/modelLoader.php';
include_once  __DIR__ . '/../utils/classloader.php';

class StoreKeeper extends Framework
{
    public function __construct() {
        $this->session = new Session(StorekeeperFL);
    }

    
    public function Index()
    {
        $inv = new \models\Inventory();
        $item_names = $inv->getItemNames();
        $data['item_names']= $item_names->fetch_all();
        
        $usermodel = new \models\User();
        $technicians = $usermodel->getUsers(TechnicianFL);
        $data['technicians'] = $technicians;

        $itemrequest= new \models\ItemRequest();
        $totalpages = $itemrequest->getPendingRequestListCount();
        $p = new Pagination(5,$totalpages);
        
        $data['request_list'] = $itemrequest->getPendingRequestList($p->fiteringText());
       
        $data['pagination'] = $p;

        return $data;
    }
    
    public function Inventory()
    {
        $inventory = new \models\Inventory();
        $data['inventory'] = $inventory->getAllInventory();

        $samodel = $this->loadModel('StockAddition');
        $result = $samodel->get_SA_List('0');
        $result= $result->fetch_all(MYSQLI_ASSOC);
        $data['newstock'] = $result;
        
        foreach ($result as $sa_item) {
            $sa_id = $sa_item['sa_id'];
            
            $data[$sa_id] = $samodel->getItemsfor_SA_byId($sa_id);
        }

        if (isset($_POST["confirm"])) {
            $samodel->setStatus('1', $_POST["sa_id"]);
            
            // increase the inventory
            $invmanager = new InventoryManager();
            $invmanager->IncreaseInventory($data[$_POST["sa_id"]]);
            

            $this->session->sendMessage("New stock confirmed and Inventory updated",'success');
            header("Location: ./inventory.php");
            exit();

        }

        if (isset($_POST["decline"])) {
            $samodel->setStatus('2', $_POST["sa_id"]);
            $sa = $samodel->get_SA_byid($_POST["sa_id"]);

            // add notification to inform clerck
            $notimodel = new \models\Notification();
            $subject = 'Stock Addition Rejection';
            $body = 'Storekeeper declined stock addition.  ID - '.$_POST["sa_id"].'   Date - '.$sa['date'] ;
            $notimodel->AddNotification($subject,$body,$this->session->getuserID(),$sa['clerk_id'],'norm', $_POST["sa_id"]);


            $this->session->sendMessage("New stock declined",'success');
            header("Location: ./inventory.php");
            exit();
        }
        return $data;
    }



    public function ReturnItem()
    {
         
        $invmodel = new \models\Inventory();
        $items = $invmodel->getItemNames();
        $items = $items->fetch_all();
    
        
        $repairmodel = new \models\Repair();
        
        for ($i=0; $i < count($items); $i++) { 
            $tmp = $repairmodel->getTotal_damageitems_forday(33,$items[$i][0]);
            if($tmp == NULL)
                $items[$i][2] = '0';
            else
                $items[$i][2] = $tmp;
        }
        

        return $items;
    }


}
