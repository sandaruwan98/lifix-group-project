<?php
include_once  __DIR__ . '/../utils/classloader.php';
$storekeeper = new classes\StoreKeeper();
$data =  $storekeeper->Inventory();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/favicon-16x16.png">
	<link rel="manifest" href="../assets/favicon/site.webmanifest">
    <link rel="stylesheet" href="../css/slider.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/st/store.css">
    <link rel="stylesheet" href="../css/st/display.css">
    <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Inventory Records</title>

</head>

<body>


    <?php include "./views/nav.php" ?>


    <div class="main_content sc-bar">

        <?php $storekeeper->getSession()->showMessage() ?>

        <header>
            <h1>Inventory Details</h1>
        </header>
        <div class="con">

            <h1 class="heading" style="margin-left: 2.5%;margin-right: 2.5%;">Inventory Balance</h1>
            <table class="content-table ctable">
                <thead>
                    <tr>
                        <th>Item Id</th>
                        <!-- <th><span>Date</span></th> -->
                        <th><span>Name</span></th>
                        <th><span>Current Balance</span></th>

                    </tr>
        </div>
    </div>
    </thead>

    <?php
    $result = $data['inventory'];
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['Item_id'] . "</td>";
        // echo "<td>".$row['date']."</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['total'] . "</td>";
        echo "</tr>";
    }

    ?>
    </table>
    </div>


    <?php include "./views/inventory_newstock.php" ?>

    </div>
</body>

</html>