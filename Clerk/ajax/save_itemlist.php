<?php 
$data = file_get_contents('php://input');
$items = json_decode($data,true);


require_once __DIR__ . '/../../utils/classloader.php';


$sa = new models\StockAddition();

//  danata created_user_id eka 1 authentication nathi nisa
 $sa->Create_SA(1,$items );

echo("success");