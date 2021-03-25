<?php
include_once  __DIR__ . '/../utils/classloader.php';
$tech = new classes\Technician();
$data = $tech->TmpInventoryPage();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/favicon-16x16.png">
	<link rel="manifest" href="../assets/favicon/site.webmanifest">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/slider.css">

    <link rel="stylesheet" href="../css/tech/tech.css">
    <link rel="stylesheet" href="../css/tech/request.css">

    <!-- <link rel="stylesheet" href="./css/complete.css"> -->
    <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
    <title>Temporary Inventory</title>
</head>

<body>

    <?php include './nav.php' ?>

    <div class="main">
        <div class="con">

            <form method="POST" action="">
                <h2>Temporary Inventory</h2>
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>ITEM NAME</th>
                            <th>TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $data->fetch_assoc()) { ?>
                            <tr>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['quantity'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <!-- <button type="submit" id="" name="complete" class="btn">Report a change</button> -->
            </form>
        </div>
    </div>

</body>

</html>