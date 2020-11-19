<?php 
require_once "../models/Database.php";
$obj = new Database();

    $connect = mysqli_connect("localhost", "root", "root", "lifix");
    $query = "SELECT * FROM notification ORDER BY id";
    $result = $obj->conn->query($query);
    $output = "";

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result)) {
            $output .= '
                <li>
                    <a href="#">' . $row["comment"] . '</a>
                </li>
            ';
        }
    }
    else {
        $output .= '
                <li>
                    <a href="#">No notifications</a>
                </li>
            ';
    }
    $q = "SELECT * FROM notification WHERE status = 0";
    $res = mysqli_query($connect, $q);
    $count = mysqli_num_rows($res);
    $data = array(
        'notification' => $output,
        'unseen_count' => $count
    );
    echo json_encode($data);
?>