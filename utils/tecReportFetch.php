<?php

include_once  __DIR__ . '/classloader.php';

session_start();

$reportmodel = new models\User();
$repairModel = new models\Repair();
$fraudMoedl = new models\Fraud();

if (isset($_POST["name"])) {

    $result = $reportmodel->getUserDetails($_POST["name"]);
    $row = mysqli_fetch_array($result);

    $resultRepair = $repairModel->getRepairsCountById($row['userId']);
    $rowRepair = mysqli_fetch_array($resultRepair);

    $output = "<table><tbody><tr><td>Name</td>";


    if (!empty($row['Name'])) {
        $output .= "<td>" . $row['Name'] . "</td></tr><tr><td>Phone</td><td>" . $row['phone'] . "</td></tr><tr><td>Total completed repairs</td><td>" . $rowRepair['count'] . "</td></tr></tbody></table>";
    } else {
        $output = "No data on this period";
    }

    $fraudResult = $fraudMoedl->getFraudsByUserID($row['userId'], $_POST["firstDate"], $_POST["secondDate"]);

    $output2 = "<table>
    <tr>
      <th>ID</th>
      <th>description</th>
      <th>recorded date</th>
      <th>difference</th>
      <th>item</th>
    </tr> ";

    if (mysqli_num_rows($fraudResult) > 0) {

        while ($rowFraud = mysqli_fetch_array($fraudResult)) {
            $output2 .= "<tr><td>" . $rowFraud['fraud_id'] . "</td><td>" . $rowFraud['description'] . "</td><td>" . $rowFraud['date'] . "</td><td>" . $rowFraud['difference'] . "</td><td>" . $rowFraud['item_id'] . "</td></tr>";
        }
        $output2 .= "</table>";
    } else {
        $output2 = "No data on this period";
    }

    $data = array(
        'bio'   => $output,
        'fraud' => $output2,
    );

    echo json_encode($data);
}
