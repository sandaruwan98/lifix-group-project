<?php 


require __DIR__ . '/../../utils/classloader.php';
$sesion = new classes\Session(StorekeeperFL);

$itemReq = new models\ItemRequest();
$id=$_GET["id"];

// get the items for for item request
$items = $itemReq->getItemsfor_ItemRequest_byId($id);

// check inventory has enough items to issue
$invmanger = new classes\InventoryManager();
$errors = $invmanger->CheckInventoryBeforeReduce($items);

// if all items can be supplied
if ($errors == '') {
    
    $bool=$itemReq->SupplyItemRequest($id, $sesion->getuserID() );
    if($bool){

        // add notification to inform tech
         $notimodel = new models\Notification();
         $subject = 'Item Supply Confirmation';
         $body = 'Storekeeper('.$sesion->getuserID().') supplied items,confirm it - itemrequest id : '.$id ;
         
         $ir = $itemReq->getItemRequest_byid($id);

         $notimodel->AddNotification($subject,$body,$sesion->getuserID(), $ir['created_by']  ,'c-supply',$id);

        $sesion->sendMessage("Item supply successfull",'success');
    }
    else
        $sesion->sendMessage("Item supply unsuccessfull",'danger');


}else{
    $sesion->sendMessage("Cannot supply the request. ".$errors." items are not enough"  ,'danger');
}