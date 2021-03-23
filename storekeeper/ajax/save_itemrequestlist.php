<?php
$data = file_get_contents('php://input');
$items = json_decode($data, true);

require_once __DIR__ . '/../../utils/classloader.php';

$session = new classes\Session(StorekeeperFL);
$itemrequest = new models\ItemRequest();
$tech_id = $_GET["tid"];

$id = $itemrequest->CreateItemRequest($tech_id, $items);



// get the items for for item request
$items = $itemrequest->getItemsfor_ItemRequest_byId($id);

// check inventory has enough items to issue
$invmanger = new classes\InventoryManager();
$errors = $invmanger->CheckInventoryBeforeReduce($items);

// if all items can be supplied
if ($errors == '') {

    $bool = $itemrequest->SupplyItemRequest($id, $session->getuserID());
    if ($bool) {

        // add notification to inform tech
        $notimodel = new models\Notification();
        $subject = 'Item Supply Confirmation';
        $body = 'Storekeeper(' . $session->getuserID() . ') issued these items,Confirm them - itemrequest id : ' . $id;


        $notimodel->AddNotification($subject, $body, $session->getuserID(), $tech_id, 'c-supply', $id);

        $session->sendMessage("Item supply successfull", 'success');
    } else
        $session->sendMessage("Item supply unsuccessfull", 'danger');
} else {
    $session->sendMessage("Cannot supply the request. " . $errors . " items are not enough", 'danger');
}
