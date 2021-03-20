<?php


require_once __DIR__ . '/../../utils/classloader.php';

$tid = $_GET["tid"];
$id = $_GET["id"];

$repair = new models\Repair();
$repair->assignRepair($id, $tid);
