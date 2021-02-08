<?php 
$data = file_get_contents('php://input');
$items = json_decode($data,true);

require_once __DIR__ . '/../../utils/classloader.php';

$session = new classes\Session(StorekeeperFL);
$itemrequest = new models\ItemRequest();
$tech_id = $_GET["tid"];

$itemrequest->CreateItemRequest($tech_id,$items);
$session->sendMessage("Item issue is succesfully completed",'success');
