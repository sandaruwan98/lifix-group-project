<?php


require_once __DIR__ . '/../../utils/classloader.php';

$sa = new models\StockAddition();

$id = $_GET["id"];
$list = $sa->getItemsfor_SA_byId($id);

echo json_encode($list);
