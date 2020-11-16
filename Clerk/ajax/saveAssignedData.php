<?php

require __DIR__ . '/../../classes/Repair.php';

$tid = $_GET["tid"];
$id = $_GET["id"];

$repair = new Repair();
$repair->assignRepair($id, $tid);
