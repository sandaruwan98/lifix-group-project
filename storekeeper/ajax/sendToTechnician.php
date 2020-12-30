<?php 


require __DIR__ . '/../../utils/classloader.php';

$itemReq = new models\ItemRequest();
$id=$_GET["id"];
echo "just get into php";
$bool=$itemReq->sendToTech($id);
