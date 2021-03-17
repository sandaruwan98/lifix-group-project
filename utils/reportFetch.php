<?php

include_once  __DIR__ . '/classloader.php';
session_start();
 $reportmodel = new models\ReportGenerate();
 $inventryModel = new models\Inventory();

if(isset($_POST["firstDate"]))
{

 $result = $reportmodel->getComplaints($_POST["firstDate"], $_POST["secondDate"]);
 $row = mysqli_fetch_array($result);

if (!empty($row['lp_id'])) {

    echo "<table>
    <tr>
      <th>Lamppost</th>
      <th>Complainer</th>
      <th>Phone</th>
      <th>Date</th>
      <th>Status</th>
    </tr> ";

  while($row = mysqli_fetch_array($result))

      {

      echo "<tr>";

      echo "<td>" . $row['lp_id'] . "</td>";

      echo "<td>" . $row['Name'] . "</td>";
      echo "<td>" . $row['phone_no'] . "</td>";
      echo "<td>" . $row['recorded_on'] . "</td>";
      if ($row['status'] == "a") {
        echo "<td>" . "Pending"  . "</td>";
      }
      elseif ($row['status'] == "c") {
        echo "<td>" . "Completed"  . "</td>";
      }
      elseif ($row['status'] == "x") {
        echo "<td>" . "Ongoing"  . "</td>";
      }
      elseif ($row['status'] == "e") {
        echo "<td>" . "Emergency"  . "</td>";
      }
      elseif ($row['status'] == "s") {
        echo "<td>" . "Suggested"  . "</td>";
      }
      

      // echo "<td>" . $row['technician_id'] . "</td>";

      echo "</tr>";

      }

    echo "</table>";

}
else {
    echo "No Data on this period";
}
}
elseif(isset($_POST["function"])) {
    $inventry = $inventryModel->getInventory();
    $rows = array();
    while($r = mysqli_fetch_assoc($inventry)) {
        $rows[] = $r;
    }
    echo json_encode($rows);
}

?>