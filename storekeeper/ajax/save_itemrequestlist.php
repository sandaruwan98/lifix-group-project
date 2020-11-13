<?php 
$data = file_get_contents('php://input');
$items = json_decode($data,true);

require_once __DIR__ . '/../../classes/ItemRequest.php';


$itemrequest = new ItemRequest();

//  danata created_user_id eka 1 authentication nathi nisa
 $itemrequest->CreateItemRequest(1,$items);

echo("done");