<?php

if (isset($_GET["lpid"])) {
    require_once __DIR__ . '/../../utils/classloader.php';

    $lp = new models\LampPost();
    $user = new models\User();

    $id = $_GET["lpid"];
    $techid = $_GET["tech"];
    $lpdata = $lp->getLampPost_byid($id);
    $tech = $user->getNameById($techid);
    echo json_encode(array('tech' => $tech, 'lp' => $lpdata));
}
