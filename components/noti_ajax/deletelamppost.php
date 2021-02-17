<?php


require_once __DIR__ . '/../../utils/classloader.php';

$session = new classes\Session(CleckFL);
if (isset($_GET['id'])) {

    $lp = new models\LampPost();
    // $lp->DeleteLampost($_GET['id']);
    $session->sendMessage("Lampost declined and deleted","success");
    
    // add notification to added tech that lp deleted
}

