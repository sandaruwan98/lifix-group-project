<?php
if(isset($_POST["view"]))
{

include_once  __DIR__ . '/classloader.php';

 $obj = new models\Database();
 if($_POST["view"] != '')
 {
  $update_query = "UPDATE notification SET status=1 WHERE id={$_POST["view"]}";
  $obj->conn->query($update_query);
 }
 
 $query = "SELECT * FROM notification WHERE status=0 ORDER BY id DESC";
 $result = $obj->conn->query($query);
 $output = '
    <h1>Notifications</h1>
    <hr>
 ';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
   <li class="notification" id='.$row["id"].'>
     <strong>'.$row["subject"].'</strong>
     <small><em>'.$row["body"].'</em></small>
    </a>
   </li>
   <li>
    <hr>
   </li>
   ';
  }
 }
 else
 {
  $output .= '<li><a href="#" class="text-bold text-italic">No notifications</a></li>';
 }
 
 $query_1 = "SELECT COUNT(*) AS count FROM notification WHERE status=0";
//  $result_1 = $obj->conn->query($query_1);
 $count = $obj->conn->query($query_1);
 $count= $count->fetch_assoc();
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count["count"]
 );
 echo json_encode($data);
}

?>