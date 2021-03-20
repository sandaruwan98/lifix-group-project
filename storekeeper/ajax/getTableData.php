<?php 


require __DIR__ . '/../../utils/classloader.php';

$ir = new models\ItemRequest();


$id = $_GET["id"];
$list = $ir->getItemsfor_ItemRequest_byId($id);

echo json_encode($list);
