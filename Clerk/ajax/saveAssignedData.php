<?php


require_once __DIR__ . '/../../utils/classloader.php';

$tid = $_GET["tid"];
$id = $_GET["id"];

$repair = new classes\Repair();
$repair->assignRepair($id, $tid);
