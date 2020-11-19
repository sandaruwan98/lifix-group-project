<?php
//insert.php
require_once "../models/Database.php";
$obj = new Database();

if(isset($_POST["comment"]))
{
    $comment = $_POST["comment"];
 $query = "
 INSERT INTO notification(comment)
 VALUES ('$comment')
 ";
 $obj->conn->query($query);
}
?>