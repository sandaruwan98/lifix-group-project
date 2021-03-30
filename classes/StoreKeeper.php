<?php

namespace classes;
// include_once '../utils/modelLoader.php';
include_once  __DIR__ . '/../utils/classloader.php';

class StoreKeeper extends Framework
{
    public function __construct()
    {
        $this->session = new Session(StorekeeperFL);
    }


    public function Index()
    {
        $inv = new \models\Inventory();
        $item_names = $inv->getItemNames();
        $data['item_names'] = $item_names->fetch_all();

        $usermodel = new \models\User();
        $technicians = $usermodel->getUsers(TechnicianFL);
        $data['technicians'] = $technicians;

        $itemrequest = new \models\ItemRequest();
        $totalpages = $itemrequest->getPendingRequestListCount();
        $p = new Pagination(9, $totalpages);

        $data['request_list'] = $itemrequest->getPendingRequestList($p->fiteringText());

        $data['pagination'] = $p;

        return $data;
    }
    public function ReqHistory()
    {
        $searchfilter = '';
        if( isset($_POST["search"]) ){
            $_SESSION["search"] = $_POST["searchbox"];
        }

        if( isset($_POST["clearsearch"]) ){
            unset($_SESSION["search"]);
            header('location: ./requestHistory.php');
        }

        if(isset($_SESSION["search"]))
            $searchfilter = $_SESSION["search"];

            
        $itemrequest = new \models\ItemRequest();

        $totalpages = $itemrequest->getItemReqHistorytCount($searchfilter);

        $p = new Pagination(9, $totalpages);

        $data['reqlist'] = $itemrequest->getItemReqHistory($p->fiteringText() , $searchfilter);

        $data['pagination'] = $p;

        return $data;
    }

    public function Inventory()
    {

        $inventory = new \models\Inventory();


        $data['inventory'] = $inventory->getAllInventory();

        $samodel = $this->loadModel('StockAddition');
        $result = $samodel->get_SA_List('0');
        $result = $result->fetch_all(MYSQLI_ASSOC);
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


            $this->session->sendMessage("New stock confirmed and Inventory updated", 'success');
            header("Location: ./inventory.php");
            exit();
        }

        if (isset($_POST["decline"])) {
            $samodel->setStatus('2', $_POST["sa_id"]);
            $sa = $samodel->get_SA_byid($_POST["sa_id"]);

            // add notification to inform clerck
            $notimodel = new \models\Notification();
            $subject = 'Stock Addition Rejection';
            $body = 'Storekeeper declined stock addition.  ID - ' . $_POST["sa_id"] . '   Date - ' . $sa['date'];
            $notimodel->AddNotification($subject, $body, $this->session->getuserID(), $sa['clerk_id'], 'norm', $_POST["sa_id"]);


            $this->session->sendMessage("New stock declined", 'success');
            header("Location: ./inventory.php");
            exit();
        }

        return $data;
    }



    public function ReturnItem()
    {
        // get technician list to show in select.
        $usermodel = new \models\User();
        $technicians = $usermodel->getUsers(TechnicianFL);
        $data['technicians'] = $technicians;



        $ritemcheck = new \models\ReturnItem();
        // GET TECH ID FROM SELECT
        if (isset($_POST["techselect"])) {
            if ($_POST["techSelectoption"] != '' && isset($_POST["techSelectoption"])) {
                // check whether alredy done today or not
                if ($ritemcheck->checkAlredyDoneorNot($_POST["techSelectoption"])) {
                    unset($_SESSION["techid"]);
                    $this->session->sendMessage("Damage Items Check for this technician is already done", 'danger');
                    header("Location: ./returnitem.php");
                    exit;
                } else {

                    $_SESSION["techid"] = $_POST["techSelectoption"];
                }
            }
        }


        // if tech was selected only process data
        if (isset($_SESSION["techid"])) {

            $data['techname'] = $usermodel->getNameById($_SESSION["techid"]);

            $invmodel = new \models\Inventory();
            $items = $invmodel->getItemNames();
            $items = $items->fetch_all();

            $repairmodel = new \models\Repair();

            for ($i = 0; $i < count($items); $i++) {
                $tmp = $repairmodel->getTotal_damageitems_forday($_SESSION["techid"], $items[$i][0]);
                if ($tmp == NULL)
                    $items[$i][2] = '0';
                else
                    $items[$i][2] = $tmp;
            }
            $data['items'] = $items;

            $rdata = NULL;
            // if all differnce data submitted
            if (isset($_POST["done"])) {

                foreach ($_POST as $key => $value) {
                    if ($key != 'done') {
                        [$type, $item_id] = explode("_", $key);

                        if ($type == 'diff') {
                            $rdata[$item_id][0] = $value;
                        } elseif ($type == 'notes') {
                            $rdata[$item_id][1] = $value;
                        }
                    }
                }
                unset($_POST["done"]);

                // add a fraud
                if ($rdata != NULL) {

                    $f = new \models\Fraud();
                    $discription = 'There is a mismatch in damaged repair items of ' . $data['techname'] . '(technician) on ' . date('Y-m-d') . '. Added by - ' . $this->session->getuserName() . " (Storekeeper)";
                    $f->addFraud($_SESSION["techid"], $this->session->getuserID(), $discription, 'a', $rdata);

                    $this->session->sendMessage("Damage Item count success,fraud added", 'success');
                } else {
                    $this->session->sendMessage("Damage Item count success,No frauds", 'success');
                }


                // mark as done to prevent doing this multiple times
                $ritemcheck->addRecord($_SESSION["techid"]);
                unset($_SESSION["techid"]);

                header("Location: ./returnitem.php");
                exit();
            }
        }




        return $data;
    }
}
