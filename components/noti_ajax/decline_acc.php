<?php


require_once __DIR__ . '/../../utils/classloader.php';

$session = new classes\Session(AdminFL);

  
if (isset($_GET['noti_id']) ) {

    // delete user
    $user_id = $_GET['id'];
    $user = new models\User();
    if ($user->DeleteUser($user_id) )
        $session->sendMessage("Account Deleted","success");
    else
        $session->sendMessage("Something went wrong","danger");

}

