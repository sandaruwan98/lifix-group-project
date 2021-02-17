<?php
namespace models;
require_once "Database.php";

class Notification extends Database
{

    
    public function MarkasRead($nt_id)
    {
        $update_query = "UPDATE notification SET status=1 WHERE id='$nt_id'";
        $this->conn->query($update_query);
    }

    public function AddNotification($subject,$body,$from,$to,$type,$ref)
    {
        $query = "INSERT INTO `notification`(`subject`, `body`, `status`, `from_user`, `to_user`, `type`, `ref_id`) 
        VALUES ('$subject','$body',0,'$from','$to','$type','$ref')";
        echo $query;
        $this->conn->query($query);
    }
    
    
    public function getunReadNotifications($user_id)
    {
        $query = "SELECT * FROM notification WHERE status=0 AND to_user='$user_id' ORDER BY id DESC";
        $result = $this->conn->query($query);
        return $result;
    }

    public function getunReadNotificationCount($user_id)
    {
        
        $query_1 = "SELECT COUNT(*) AS count FROM notification WHERE status=0 AND to_user='$user_id'";
        $count = $this->conn->query($query_1);
        $count= $count->fetch_assoc();
        return  $count["count"];
    }

    




    



}

