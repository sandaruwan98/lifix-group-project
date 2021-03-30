<?php

require_once __DIR__ . '/../../utils/classloader.php';

session_start();

$reportmodel = new models\ReportGenerate();

if (isset($_POST["firstDate"])) {

  $result = $reportmodel->getLpRecords($_POST["firstDate"], $_POST["secondDate"]);

  if ($result->num_rows > 0) {

    echo "<table class='content-table font-sm' >
    <tr>
      <th>Lamppost</th>
      <th>Address</th>
      <th>Date</th>
      <th>Requested By</th>
      <th>Authorized By</th>
      <th>Notes</th>
    </tr> ";

    while ($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $row['lp_id'] . "</td>";
      echo "<td>" . $row['division'] . "</td>";
      echo "<td>" . $row['date'] . "</td>";
      echo "<td>" . $row['requested_by'] . "</td>";
      echo "<td>" . $row['auth_by'] . "</td>";
      echo "<td>" . $row['notes'] . "</td>";
      
      echo "</tr>";
    }
    echo "</table>";
  } else {
    echo "<p>No data on this period</p>";
  }
}
