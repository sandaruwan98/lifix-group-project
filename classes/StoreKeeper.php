<?php
namespace classes;
// include_once '../utils/modelLoader.php';
include_once '../utils/classloader.php';

class StoreKeeper extends FrameWork
{
    public function __construct() {
        $this->session = new Session(StorekeeperFL);
    }

    
    public function Inventory()
    {
        $samodel = $this->loadModel('StockAddition');
        $result = $samodel->get_SA_List('0');
        $result= $result->fetch_all(MYSQLI_ASSOC);
        $data['newstock'] = $result;
        
        foreach ($result as $sa_item) {
            $sa_id = $sa_item['sa_id'];
            
            $data[$sa_id] = $samodel->getItemsfor_SA_byId($sa_id);
        }
        return $data;
    }




}