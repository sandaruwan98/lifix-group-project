<?php 
$data = file_get_contents('php://input');
$items = json_decode($data,true);


require_once __DIR__ . '/../../utils/classloader.php';

$session = new classes\Session(CleckFL);
$sa = new models\StockAddition();

//  danata created_user_id eka 1 authentication nathi nisa
 $sa->Create_SA($session->getuserID(),$items );

echo("success");