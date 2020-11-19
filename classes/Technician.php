<?php
namespace classes;
// include_once '../utils/modelLoader.php';
include_once '../utils/classloader.php';

class Technician extends FrameWork
{
    public function __construct() {
        $this->session = new Session(TechnicianFL);
    }
    
    public function AvalableRepairs()
    {
        $repairmodel = $this->loadModel('Repair');
        $repairs = $repairmodel->getAssignedRepairs($this->session->getuserID() );
        $data['repairs'] = $repairs;
        return $data;
    }



    public function CompleteRepair()
    {
        if (!isset($_GET["id"])) 
            header('location: ./index.php');
   
        
        $invmodel = $this->loadModel('Inventory');

        $item_names = $invmodel->getItemNames();
        $data['ItemData']= $item_names->fetch_all();

        if (isset($_POST["complete"]) ) {
          $this->CompleteRepair_addUsedReturnedData($data['ItemData']);
        }

        return $data;
    }

    private function CompleteRepair_addUsedReturnedData($item_names)
    {
        $repairmodel = $this->loadModel('Repair');
        $used_items = array();
        $return_items = array();
        foreach ($item_names as $item){
            //for collect used items quantities
            $item_name = $item[0]."_u";
            $quantity = $_POST["$item_name"];
    
            if ($quantity!=0 && $quantity!=null) {
    
                $used_item = array($item[0], $quantity);
                $used_items[] = $used_item;
            }
            
            //for collect return items quantities
            $item_name = $item[0]."_r";
            $quantity = $_POST["$item_name"];
    
            if ($quantity!=0 && $quantity!=null) {
    
                $return_item = array($item[0], $quantity);
                $return_items[] = $return_item;
            }
        }
    
        if (!empty($used_items)) {

            $r_id = $_GET["id"];
            $repairmodel->CompleteRepair($r_id,$used_items,$return_items);
            header("location: ./index.php");
        }
    }
  




}
