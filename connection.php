<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lifix";
$port = "3306";

// $servername = "db4free.net";
// $username = "lifixdemo1234";
// $password = "lifix1234ucsc";
// $dbname = "lifixdemo";
// $port = "3306";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//    echo "Connected successfully";

