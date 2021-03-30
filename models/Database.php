<?php

namespace models;

class Database
{

  public $conn;

  public function __construct()
  {

     $servername = "88.211.101.187";
     $username = "lysjfdgs_lifix";
     $password = "Zs6oTewG";
     $dbname = "lysjfdgs_lifix";
     $port = "3306";

    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $dbname = "lifix";
    // $port = "3306";

    $this->conn = new \mysqli($servername, $username, $password, $dbname, $port);
    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    }
  }


  public function __destruct()
  {
    $this->conn->close();
  }
}
