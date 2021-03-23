<?php
if(isset($_POST["view"]))
{

include_once  __DIR__ . '/classloader.php';
session_start();
 $notificationmodel = new models\Notification();
 if($_POST["view"] != '')
 {
  $notificationmodel->MarkasRead($_POST["view"]);
 }
 

 $result = $notificationmodel->getunReadNotifications($_SESSION["id"],$_SESSION["role"] );
 
 $output = '
    <h1 class="notification-header" >Notifications</h1>
    
 ';
 
 if($result->num_rows > 0)
 {
  while($row = $result->fetch_array())
  {
   $output .= '
   <li data-type="'.$row["type"].'" data-ref_id="'.$row["ref_id"].'" class="notification type" id='.$row["id"].'>
     <h4>'.$row["id"].' - '.$row["subject"].'</h4>
     <h6>'.$row["body"].'</h6>
    </a>
    <span id="'.$row["id"].'"  class="clear cl-'.$row["id"].'"><i class="fas fa-times"></i></span>
   </li>
   ';
  }
 }
 else
 {
  $output .= '<li><a href="#" class="text-bold text-italic">No notifications</a></li>';
 }
 

 $count= $notificationmodel->getunReadNotificationCount($_SESSION["id"],$_SESSION["role"]);


 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
