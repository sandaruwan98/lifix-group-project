<?php


require_once __DIR__ . '/../../utils/classloader.php';

$session = new classes\Session(TechnicianFL);
if (isset($_GET['id'])) {
    $ir_id = $_GET['id'];
    $noti_id = $_GET['noti_id'];

    $lp = new models\ItemRequest();
    // mark ir as declined
    $ir = $irmodel->setStatus($ir_id,IR_DENY);
    
    // mark notification as complete
    $noti = new models\Notification();
    $noti->MarkasRead($noti_id);
    
    // add notification to supplied st 
    
    $session->sendMessage("Supply declined","success");
    exit;
}

