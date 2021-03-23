<?php

if (isset($_GET["lpid"])) {
    require_once __DIR__ . '/../../utils/classloader.php';

    $lp = new models\LampPost();
    $user = new models\User();

    $id = $_GET["lpid"];
    $lpdata = $lp->getLampPost_byid($id);
    if ($lpdata != NULL) {
        $tech = $user->getNameById($lpdata['added_by']);
        echo json_encode(array('tech' => $tech, 'adr' => $lpdata['division']));
    } else {
        echo json_encode($lpdata);
    }
}
