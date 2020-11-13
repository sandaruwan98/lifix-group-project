<?php 


require __DIR__ . '/../../classes/ItemRequest.php';
$ir = new ItemRequest();

$id = $_GET["id"];
$list = $ir->getItemsfor_ItemRequest_byId($id);

echo json_encode($list);