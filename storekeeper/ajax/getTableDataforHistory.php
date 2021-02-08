<?php 


require __DIR__ . '/../../utils/classloader.php';

$ir = new models\ItemRequest();


$id = $_GET["id"];
$data['table'] = $ir->getItemsfor_ItemRequest_byId($id);
$data['detail'] = $ir->getItemReqWithTechName($id);

echo json_encode($data);