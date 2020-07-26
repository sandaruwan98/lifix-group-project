<?php


require "../class/Map.php";
$map = new Map();
$markers = $map->getMarkers();
echo json_encode($markers);


// completed  c
// avilable  a
// assigned  x
// suggested  s






// include "../connection.php";

// $q = "SELECT repair.repair_id, lamppost.lattitude, lamppost.longitude 
// FROM lamppost
// INNER JOIN repair
// ON lamppost.lpid=repair.lp_id WHERE repair.status!='c'";
// // $q = "SELECT lamppost.lpid, lamppost.division, lamppost.lattitude, lamppost.longitude , repair.date
// // FROM lamppost
// // INNER JOIN repair
// // ON lamppost.lpid=repair.lp_id WHERE repair.status='a'";

// $result =  $conn->query($q);
// $arr = array();
// if ($result->num_rows > 0) {
//     // echo $result->fetch_assoc();
//     while ($row = $result->fetch_assoc()) {
//         $arr[] = $row;
//     }
// }

