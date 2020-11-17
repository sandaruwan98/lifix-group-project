<?php 


require __DIR__ . '/../../utils/classloader.php';

$ir = new classes\ItemRequest();


$id = $_GET["id"];
$list = $ir->getItemsfor_ItemRequest_byId($id);

echo json_encode($list);