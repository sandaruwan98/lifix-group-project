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


    
    public function EmgRepair()
    {
        
        
        $invmodel = $this->loadModel('Inventory');
        $item_names = $invmodel->getItemNames();
        $data['ItemData']= $item_names->fetch_all();

        if (isset($_POST["addrepair"]) ) {
          $this->EmgRepair_addUsedReturnedData($data['ItemData']);
        }

        return $data;
    }
    public function AddRequestpage()
    {
        
        
        $invmodel = $this->loadModel('Inventory');
        $item_names = $invmodel->getItemNames();
        $data['ItemData']= $item_names->fetch_all();

        if (isset($_POST["addrequest"]) ) {
            $request_items = array(); // item eke id eka ekka quantity eka me array ekata dagannawa

            foreach ($item_names as $item){
                //for collect used items quantities
                $item_name = $item[0]."_u";
                $quantity = $_POST["$item_name"];
        
                if ($quantity!=0 && $quantity!=null) {
        
                    $request_item = array($item[0], $quantity);
                    $request_items[] = $request_item;
                }
                
            }
        
            if (!empty($request_items)) {
                $itemrequest = $this->loadModel('ItemRequest');
                
                $itemrequest->CreateItemRequest($this->session->getuserID(),$request_items );
        
                echo ("<script>alert('repair completed succesfully') </script>");
                header("location: ./index.php");
            }
        }

        return $data;
    }


    public function Lamppost()
    {
        
        
        $invmodel = $this->loadModel('Inventory');
        $item_names = $invmodel->getItemNames();
        $data['ItemData']= $item_names->fetch_all();

        if (isset($_POST["addlp"]) && $_POST["lp_id"] != null) {
            $lp_id = $_POST["lp_id"];
            $adr = $_POST["adr"];
            $lat = $_POST["lat"];
            $lng = $_POST["lng"];
        
            $lp = $this->loadModel('LampPost');
              // danata tecnician_id eka 1 authentication nathi nisa
            $lp->addLampost($lp_id,$adr,$lat,$lng, $this->session->getuserID() );
        
        
            //if checbox checked we have add used items for new lamppost
           if (isset($_POST["is_new"])) {
            $used_items = array();
            foreach ($item_names as $item){
                //for collect used items quantities
                $item_name = $item[0]."_u";
                $quantity = $_POST["$item_name"];
        
                if ($quantity!=0 && $quantity!=null) {
        
                    $used_item = array($item[0], $quantity);
                    $used_items[] = $used_item;
                }
                
            }
        
            if (!empty($used_item)) {
                $lp->Add_All_Used_Items_forNewLP($lp_id,$used_items);
            }
           }
        
        }
        return $data;
    }


    private function CompleteRepair_addUsedReturnedData($item_names)
    {
        
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
            $repairmodel = $this->loadModel('Repair');
            $r_id = $_GET["id"];
            $repairmodel->CompleteRepair($r_id,$used_items,$return_items);
            header("location: ./index.php");
        }
    }



    private function EmgRepair_addUsedReturnedData($item_names)
    {
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
    
        // get lamppost id
        $lp_id = $_POST["lp_id"];

        if (!empty($used_items) && $lp_id!=null && $lp_id!=0) {
        
            $repairmodel = $this->loadModel('Repair');
           
            $repairmodel->CreateEmergencyRepair($lp_id,$this->session->getuserID() ,$used_items,$return_items);

            // echo ("<script>alert('repair completed succesfully') </script>");
            header("location: ./index.php");
        }
    }
  




}
