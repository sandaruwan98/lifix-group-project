<?php


require_once __DIR__ . '/../../utils/classloader.php';

$session = new classes\Session(CleckFL);
if (isset($_GET['id'])) {
    $lpid = $_GET['id'];
    $noti_id = $_GET['noti_id'];

    $lp = new models\LampPost();
    // get name of the added tech
    $lamp = $lp->getLampPost_byid($lpid);
    $techid = $lamp['added_by'];

    // delete the added lamppost
    $lp->DeleteLampost($lpid);
    
    // mark current notifi as read
    $noti = new models\Notification();
    $noti->MarkasRead($noti_id);
    
    // add notification to added tech saying lp deleted
    $subject = 'LampPost Denied - #'.$lpid;
    $user = new models\User();
    $clerkname = $user->getNameById($session->getuserID());
    $body = $clerkname.'(Clerck) denied your lamppost adding - LPID : #'.$lpid ;
    $noti->AddNotification($subject,$body, $session->getuserID()  , $techid   ,'norm','');


    // send toast message
    $session->sendMessage("Lampost declined and deleted","success");

}

