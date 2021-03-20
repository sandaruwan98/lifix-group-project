<title>Repairs</title>

<?php 
session_start();

$id = $_GET["tid"];
$_SESSION["tid"] = $id;
header("location: ./index.php");

?>