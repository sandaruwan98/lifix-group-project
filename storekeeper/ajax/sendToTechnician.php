<?php 


require __DIR__ . '/../../utils/classloader.php';
$sesion = new \classes\Session(StorekeeperFL);

$itemReq = new models\ItemRequest();
$id=$_GET["id"];

$bool=$itemReq->SupplyItemRequest($id, $sesion->getuserID() );
if($bool)
    $sesion->sendMessage("Item supply successfull",'success');
else
    $sesion->sendMessage("Item supply unsuccessfull",'danger');