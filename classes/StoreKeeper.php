<?php
namespace classes;
// include_once '../utils/modelLoader.php';
include_once  __DIR__ . '/../utils/classloader.php';

class StoreKeeper extends Framework
{
    public function __construct() {
        $this->session = new Session(StorekeeperFL);
    }

    
    public function ItemRequest()
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
            $this->session->sendMessage("New stock confirmed",'success');

        }
        return $data;
    }




}
