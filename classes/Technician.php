<?php

namespace classes;

include_once  __DIR__ . '/../utils/classloader.php';

class Technician extends Framework
{
    public function __construct()
    {
        $this->session = new Session(TechnicianFL);
    }

    public function AvalableRepairsPage()
    {
        $repairmodel = new \models\Repair();
        $repairs = $repairmodel->getAssignedRepairs($this->session->getuserID());
        $data['repairs'] = $repairs;
        return $data;
    }



    public function CompleteRepairPage()
    {
        if (!isset($_GET["id"]))
            header('location: ./index.php');

        $invmodel = new \models\Inventory();
        $item_names = $invmodel->getItemNames();
        $data['ItemData'] = $item_names->fetch_all();

        if (isset($_POST["complete"])) {
            $this->CompleteRepair_addUsedReturnedData($data['ItemData']);
        }

        return $data;
    }



    public function EmgRepairPage()
    {


        $invmodel = $this->loadModel('Inventory');
        $item_names = $invmodel->getItemNames();
        $data['ItemData'] = $item_names->fetch_all();

        if (isset($_POST["addrepair"])) {
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
            $tmpinv->addTmpInventoryItem($tech, $item[0]);
        }
    }



    public function AddRequestpage()
    {

        $invmodel = new \models\Inventory();
        $item_names = $invmodel->getItemNames();
        $item_names = $item_names->fetch_all();
        $data['ItemData'] = $item_names;
        if (isset($_POST["addrequest"])) {
            $request_items = array(); // item eke id eka ekka quantity eka me array ekata dagannawa

            foreach ($item_names as $item) {
                //for collect used items quantities
                $item_name = $item[0] . "_u";
                $quantity = $_POST["$item_name"];

                if ($quantity != 0 && $quantity != null) {

                    $request_item = array("itemNo" => $item[0], "Quantity" => $quantity);
                    $request_items[] = $request_item;
                }
            }

            if (!empty($request_items)) {
                $itemrequest = new \models\ItemRequest();
                // var_dump($request_items);
                $itemrequest->CreateItemRequest($this->session->getuserID(), $request_items);

                $this->session->sendMessage("New item request added succesfully", 'success');
                // header("location: ./index.php");
            }
        }

        return $data;
    }


    public function LamppostPage()
    {


        $invmodel = new \models\Inventory();
        $item_names = $invmodel->getItemNames();
        $item_names = $item_names->fetch_all();
        $data['ItemData'] = $item_names;

        if (isset($_POST["addlp"]) && $_POST["lp_id"] != null) {
            $lp_id = $_POST["lp_id"];
            $adr = $_POST["adr"];
            $lat = $_POST["lat"];
            $lng = $_POST["lng"];

            $lp = new \models\LampPost();
            // add lampost to database
            $lp->addLampost($lp_id, $adr, $lat, $lng, $this->session->getuserID());

            // send notification to clerck to confirm
            $noti = new \models\Notification();

            $user = new \models\User();
            $techname = $user->getNameById($this->session->getuserID());

            $subject = 'New Lamppost cofirmation';
            $body = $techname . ' has added new lamp post. - LPID : #' . $lp_id;
            $noti->AddNotification($subject, $body, $this->session->getuserID(), 2, 'c-lp', $lp_id . '-' . $this->session->getuserID());

            // show a toast
            $this->session->sendMessage("New Lamppost addded successfully", 'success');
        }

        return $data;
    }


    private function CompleteRepair_addUsedReturnedData($item_names)
    {

        $used_items = array();
        $return_items = array();
        foreach ($item_names as $item) {
            //for collect used items quantities from text inputs
            $item_name = $item[0] . "_u";
            $quantity = $_POST["$item_name"];

            if ($quantity != 0 && $quantity != null) {

                $used_item = array($item[0], $quantity, $item[1]);
                $used_items[] = $used_item;
            }

            //for collect return items quantities from text inputs
            $item_name = $item[0] . "_u";
            $item_name = $item[0] . "_r";
            $quantity = $_POST["$item_name"];

            if ($quantity != 0 && $quantity != null) {
                $return_item = array($item[0], $quantity);
                $return_items[] = $return_item;
            }
        }

        if (!empty($used_items)) {
            
            $invmanger = new InventoryManager();
            $errmsg = $invmanger->CheckTmpInventoryBeforeReduce($used_items, $this->session->getuserID());

            if ($errmsg == '') {
                $comp = new \models\Complaint();
                
                // ---------------------------------------------------------
                // get bulb return/used count for fraud check
                $bulb_usedcount = $_POST["1_u"];
                $bulb_damagecount = $_POST["1_r"];

                // if bulbs are used for the repair
                if ($bulb_usedcount != 0 && $bulb_usedcount != null) {
                    $complainer_said_value = $comp->getIsBulbThere($_GET["id"]);
                    if (($bulb_usedcount != $bulb_damagecount) && $complainer_said_value == '1') {
                        // mark this scnario as a fraud
                        $discription = 'There is a suspicious activity from ' . $this->session->getuserName() . ' (technician). Complainer claims that damaged bulb is on the lamppost but technician did not return the damaged bulb';
                        $f = new \models\Fraud();
                        $f->addFraud($this->session->getuserID(), 0, $discription, 'b', NULL);
                    }
                }

                // complte repair ---------------------------------------------------------------
                $repairmodel = new \models\Repair();
                $r_id = $_GET["id"];
                $repairmodel->CompleteRepair($r_id, $used_items, $return_items);

                $invmanger->DecreasetmpInventory($used_items, $this->session->getuserID());

                //get complainer phone and complaint lamppost id
                $complainer_phone = $comp->getComplainerPhoneNoandLampId_by_repair_id($r_id);
                $complaint_lamp_id = $comp->getComplainerPhoneNoandLampId_by_repair_id($r_id);

                //send sms confirmation
                $sms = new \classes\Sms($complainer_phone['phone_no']);
                $sms->sendConfirmation($complaint_lamp_id['lp_id']);

                $this->session->sendMessage("Repair marked as completed", 'success');
            } else {
                $this->session->sendMessage("Insuficient " . $errmsg, 'danger');
            }
            header("location: ./index.php");
            exit;
        }
    }



    private function EmgRepair_addUsedReturnedData($item_names)
    {
        $used_items = array();
        $return_items = array();
        foreach ($item_names as $item) {
            //for collect used items quantities
            $item_name = $item[0] . "_u";
            $quantity = $_POST["$item_name"];

            if ($quantity != 0 && $quantity != null) {

                $used_item = array($item[0], $quantity);
                $used_items[] = $used_item;
            }

            //for collect return items quantities
            $item_name = $item[0] . "_r";
            $quantity = $_POST["$item_name"];

            if ($quantity != 0 && $quantity != null) {

                $return_item = array($item[0], $quantity);
                $return_items[] = $return_item;
            }
        }

        // get lamppost id
        $lp_id = $_POST["lp_id"];

        if (!empty($used_items) && $lp_id != null && $lp_id != 0) {

            $repairmodel = $this->loadModel('Repair');

            $repairmodel->CreateEmergencyRepair($lp_id, $this->session->getuserID(), $used_items, $return_items);

            $this->session->sendMessage("Emergency repir added added succesfully", 'success');
            // echo ("<script>alert('repair completed succesfully') </script>");
            // header("location: ./index.php");
        }
    }
}
