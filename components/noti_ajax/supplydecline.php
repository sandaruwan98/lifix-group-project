<?php


require_once __DIR__ . '/../../utils/classloader.php';

$session = new classes\Session(TechnicianFL);
if (isset($_GET['id'])) {
    $ir_id = $_GET['id'];
    $noti_id = $_GET['noti_id'];

    $irmodel = new models\ItemRequest();
   
    // mark ir as declined
    $irmodel->setStatus($ir_id,IR_DENY);
    
    // mark notification as complete
    $noti = new models\Notification();
    $noti->MarkasRead($noti_id);

    // add notification to  Storekeeper 
    $ir = $irmodel->getItemRequest_byid($ir_id);
    $subject = 'Item Supply Cancelled';
    $user = new models\User();
    $techname = $user->getNameById($session->getuserID());

    $body = $techname.' cancelled your Item Supply - ID : '.$ir_id ;
    $noti->AddNotification($subject,$body, $session->getuserID()  ,  $ir['completed_by']  ,'norm','');

    $session->sendMessage("Supply declined successfully","success");
    exit;
}

