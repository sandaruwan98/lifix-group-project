<?php
include "../connection.php";

// $myObj = new \stdClass();
// $myObj->name = "John";
// $myObj->age = 30;
// $myObj->city = "New York";

// $myObj2 = new \stdClass();
// $myObj2->name = "Fuck";
// $myObj2->age = 60;
// $myObj2->city = " York";

// $arr[] = $myObj;
// $arr[] = $myObj2;


$q = "SELECT lamppost.lpid, lamppost.division, lamppost.lattitude, lamppost.longitude , repair.date
FROM lamppost
INNER JOIN repair
ON lamppost.lpid=repair.lp_id WHERE repair.status='a'";
$result =  $conn->query($q);
$arr = array();
if ($result->num_rows > 0) {
    // echo $result->fetch_assoc();
    while ($row = $result->fetch_assoc()) {
        $arr[] = $row;
    }
}
// $conn = new mysqli("myServer", "myUser", "myPassword", "Northwind");
// $stmt = $conn->prepare("SELECT name FROM customers LIMIT ?");
// $stmt->bind_param("s", $obj->limit);
// $stmt->execute();
// $result = $stmt->get_result();
// $outp = $result->fetch_all(MYSQLI_ASSOC);

// echo json_encode($outp);
echo json_encode($arr);

// echo $myJSON;
