<?php

$st = $_GET["st"];
$id = $_GET["id"];
include "../connection.php";

$q = "UPDATE `repair` SET `status`='$st' WHERE `repair_id`= '$id'";
$conn->query($q);


// assign button :-/
// $ids = json_decode($_POST['data']);
// $st = $_POST["st"];
// include "../connection.php";
// foreach ($ids as $id) {
//     $q = "UPDATE `repair` SET `status`='$st' WHERE `repair_id`= '$id'";
//     $conn->query($q);
// }
