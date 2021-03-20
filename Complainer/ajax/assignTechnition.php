<?php 

if (isset($_GET["id"])) {
    require_once __DIR__ . '/../../utils/classloader.php';

    session_start();
    if (isset($_SESSION["rid"])) {
        $repair = new models\Repair();
        $repair->assignRepair($_SESSION["rid"], $_GET["id"]);
        session_destroy();
        // echo $_GET["id"];
    }
    
}