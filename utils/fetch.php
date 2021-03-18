<?php
if (isset($_POST["view"])) {

   include_once  __DIR__ . '/classloader.php';
   session_start();
   $notificationmodel = new models\Notification();
   if ($_POST["view"] != '') {
      $notificationmodel->MarkasRead($_POST["view"]);
   }

   $result = $notificationmodel->getunReadNotifications($_SESSION["id"]);

   $output = '<h1 class="notification-header" >Notifications</h1>';

   if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_array($result)) {
         $output .= '<li data-type="' . $row["type"] . '" data-ref_id="' . $row["ref_id"] . '" class="notification type" id=' . $row["id"] . '>
     <h4>' . $row["id"] . ' - ' . $row["subject"] . '</h4>
     <h6>' . $row["body"] . '</h6>
    </a>
   </li>';
   }
   } else {
      $output .= '<li><a href="#" class="text-bold text-italic">No notifications</a></li>';
   }

   $count = $notificationmodel->getunReadNotificationCount($_SESSION["id"]);

   $data = array(
      'notification'   => $output,
      'unseen_notification' => $count
   );
   echo json_encode($data);
}
