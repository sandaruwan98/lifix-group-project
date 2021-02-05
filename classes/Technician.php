<?php
namespace classes;
// include_once '../utils/modelLoader.php';
include_once  __DIR__ . '/../utils/classloader.php';

class Technician extends Framework
{
    public function __construct() {
        $this->session = new Session(TechnicianFL);
    }
    
    public function AvalableRepairsPage()
    {
        $repairmodel = new \models\Repair();
        $repairs = $repairmodel->getAssignedRepairs($this->session->getuserID() );
        $data['repairs'] = $repairs;
        return $data;
    }



    public function CompleteRepairPage()
    {
        if (!isset($_GET["id"])) 
            header('location: ./index.php');
        
        $invmodel = new \models\Inventory();
        $item_names = $invmodel->getItemNames();
        $data['ItemData']= $item_names->fetch_all();

        if (isset($_POST["complete"]) ) {
          $this->CompleteRepair_addUsedReturnedData($data['ItemData']);
        }

        return $data;
    }


    
    public function EmgRepairPage()
    {
        
        
        $invmodel = $this->loadModel('Inventory');
        $item_names = $invmodel->getItemNames();
        $data['ItemData']= $item_names->fetch_all();

        if (isset($_POST["addrepair"]) ) {
          $this->EmgRepair_addUsedReturnedData($data['ItemData']);
        }

        return $data;
    }

    public function TmpInventoryPage()
    {
        $tmpinvmodel = new \models\TmpInventory();
        return $tmpinvmodel->getAllInventory($this->session->getuserID());
       
    }



    public function PendingRequestListPage()
    {
        $itemrequest = new \models\ItemRequest();
        $requestlist = $itemrequest->getPendingRequestList_by_userid($this->session->getuserID());
        return $requestlist;
    }

    public function PendingRequestListDetails()
    {

        $itemrequest = new \models\ItemRequest();
        $itemlist = $itemrequest->getItemsfor_ItemRequest_byId($_GET["id"]);
        $requestdetails = $itemrequest->getItemRequest_byid($_GET["id"]);
        $data['itemlist'] = $itemlist;
        $data['requestdetails'] = $requestdetails;
        return $data;
    }
        

    public function CheckPendingRequestList()
    {
        if (isset($_GET["id"])) {
            $itemrequest = new \models\ItemRequest();
            return $itemrequest->checkItemRequestAvailability($_GET["id"]);
        }
        return true;
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
        


    public function AddRequestpage()
    {
        
        
        $invmodel = $this->loadModel('Inventory');
        $item_names = $invmodel->getItemNames();
        $item_names = $item_names->fetch_all();
        $data['ItemData'] = $item_names;
        if (isset($_POST["addrequest"]) ) {
            $request_items = array(); // item eke id eka ekka quantity eka me array ekata dagannawa

            foreach ($item_names as $item){
                //for collect used items quantities
                $item_name = $item[0]."_u";
                $quantity = $_POST["$item_name"];
        
                if ($quantity!=0 && $quantity!=null) {
        
                    $request_item = array("itemNo"=>$item[0],"Quantity"=>$quantity);
                    $request_items[] = $request_item;
                }
                
            }
        
            if (!empty($request_items)) {
                $itemrequest = $this->loadModel('ItemRequest');
                // var_dump($request_items);
                $itemrequest->CreateItemRequest($this->session->getuserID(),$request_items );
        
                 $this->session->sendMessage("New item request added succesfully",'success');
                // header("location: ./index.php");
            }
        }

        return $data;
    }


    public function LamppostPage()
    {
        
        
        $invmodel = $this->loadModel('Inventory');
        $item_names = $invmodel->getItemNames();
        $item_names = $item_names->fetch_all();
        $data['ItemData'] = $item_names;

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
           $this->session->sendMessage("New Lamppost addded successfully",'success');

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
    
                $used_item = array($item[0], $quantity, $item[1]);
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

            $tmpmodel = new \models\TmpInventory();
            $errmsg = '';
            foreach ($used_items as $item) {
                if (!$tmpmodel->checkAvailability($this->session->getuserID(),$item[0],$item[1])) {
                    $errmsg = $errmsg.$item[2]." ,";
                }

            }


            if ($errmsg == '') {
                $repairmodel = new \models\Repair();
                $r_id = $_GET["id"];
                $repairmodel->CompleteRepair($r_id,$used_items,$return_items);

                foreach ($used_items as $item) {
                    $tmpmodel->updateQuantity($this->session->getuserID(),$item[0],$item[1],'-');
                }


                $this->session->sendMessage("Repair marked as completed",'success');
            }else {
                $this->session->sendMessage("Insuficient ".$errmsg ,'danger');
            }
            // header("location: ./index.php");
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
            
            $this->session->sendMessage("Emergency repir added added succesfully",'success');
            // echo ("<script>alert('repair completed succesfully') </script>");
            // header("location: ./index.php");
        }
    }
  




}
