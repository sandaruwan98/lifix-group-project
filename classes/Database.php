<?php


class Database {

 public $conn;
 
 public function __construct()
 {
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "lifix";
   $port = "3306";
   $this->conn = new mysqli($servername, $username, $password, $dbname, $port);  
   if ($this->conn->connect_error) {
    die("Connection failed: " . $this->conn->connect_error);
  }
 
 }
 

 public function __destruct()  {
  $this->conn->close();
 }
 
  
}

