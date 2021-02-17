<?php


require_once __DIR__ . '/../../utils/classloader.php';

$session = new classes\Session(TechnicianFL);
if (isset($_GET['id'])) {

    $lp = new models\ItemRequest();
    $ir = $irmodel->getItemRequest_byid($ir_id);
    // mark ir as declined
    
    // mark notification as complete

    // add notification to supplied st 
    
    $session->sendMessage("Supply declined","success");
    exit;
}

