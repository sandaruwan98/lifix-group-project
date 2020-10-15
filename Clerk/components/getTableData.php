<?php 


require __DIR__ . '/../../classes/StockAddition.php';
$sa= new StockAddition();

$id = $_GET["id"];
$list = $sa->getItemsfor_SA_byId($id);

echo json_encode($list);