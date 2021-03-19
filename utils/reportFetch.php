<?php

include_once  __DIR__ . '/classloader.php';

session_start();

$reportmodel = new models\ReportGenerate();

if (isset($_POST["firstDate"])) {

  $result = $reportmodel->getComplaints($_POST["firstDate"], $_POST["secondDate"]);

  if (mysqli_num_rows($result) > 0) {

    echo "<table>
    <tr>
      <th>Lamppost</th>
      <th>Complainer</th>
      <th>Phone</th>
      <th>Date</th>
      <th>Status</th>
    </tr> ";

    while ($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $row['lp_id'] . "</td>";
      echo "<td>" . $row['Name'] . "</td>";
      echo "<td>" . $row['phone_no'] . "</td>";
      echo "<td>" . $row['recorded_on'] . "</td>";
      if ($row['status'] == "a") {
        echo "<td>" . "Pending"  . "</td>";
      } elseif ($row['status'] == "c") {
        echo "<td>" . "Completed"  . "</td>";
      } elseif ($row['status'] == "x") {
        echo "<td>" . "Ongoing"  . "</td>";
      } elseif ($row['status'] == "e") {
        echo "<td>" . "Emergency"  . "</td>";
      } elseif ($row['status'] == "s") {
        echo "<td>" . "Suggested"  . "</td>";
      }
      echo "</tr>";
    }
    echo "</table>";
  } else {
    echo "No data on this period";
  }
}
