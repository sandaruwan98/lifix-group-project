<?php


require_once __DIR__ . '/../../utils/classloader.php';

$session = new classes\Session(CleckFL);

  
if (isset($_GET['noti_id'])) {

// mark current notifi as read
    $noti_id = $_GET['noti_id'];
    $noti = new models\Notification();
    $noti->MarkasRead($noti_id);
    
    // send toast message
    $session->sendMessage("Lampost confirmed","success");

}

