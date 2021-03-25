<?php


require_once __DIR__ . '/../../utils/classloader.php';

$session = new classes\Session(AdminFL);

  
if (isset($_GET['noti_id']) && isset($_GET['id'])) {

    // activate user
    $user_id = $_GET['id'];
    $user = new models\User();
    $user->ActivateUser($user_id);

    // mark current notifi as read
    $noti_id = $_GET['noti_id'];
    $noti = new models\Notification();
    $noti->MarkasRead($noti_id);
    
    // send toast message
    $session->sendMessage("Account Activated","success");

}

