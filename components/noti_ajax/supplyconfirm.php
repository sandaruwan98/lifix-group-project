<?php


require_once __DIR__ . '/../../utils/classloader.php';

$session = new classes\Session(TechnicianFL);
if (isset($_GET['id'])) {
    $ir_id = $_GET['id'];
    $irmodel = new models\ItemRequest();
    $ir = $irmodel->getItemRequest_byid($ir_id);
    $items = $irmodel->getItemsfor_ItemRequest_byId($ir_id);

    $invmanger = new classes\InventoryManager();
    
    //  decrease inventory
    $invmanger->DecreaseInventory($items);
    
    // increase tmpinventory
    $invmanger->IncreasetmpInventory($items,$ir['created_by']);

    // mark notification complete
    // 0000

    $session->sendMessage("Supply confirmed","success");
    
}

