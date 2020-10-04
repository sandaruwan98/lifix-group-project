<?php

require __DIR__ . '/../../classes/Repair.php';

$st = $_GET["st"];
$id = $_GET["id"];

$repair = new Repair();
$repair->changeStatus($id, $st);
