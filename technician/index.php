<?php
include_once  __DIR__ . '/../utils/classloader.php';
$tech = new classes\Technician();
$data =  $tech->AvalableRepairsPage();
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
    <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Avalable Repairs</title>
</head>

<body>

    <?php include './nav.php' ?>
    <?php $tech->getSession()->showMessage() ?>


    <div class="main">
        <div class="con">
            <h2 class="title-r">Pending Repairs</h2>
            <div class="list">
                <?php

                $list_assign = $data['repairs'];
                while ($row = $list_assign->fetch_assoc()) :
                ?>

                    <div class="list-item" id="<?= $row["repair_id"] ?>">
                        <div class="content">
                            <div class="row">
                                <div class="id"># <?= $row['lp_id'] ?> </div>
                                <div class="id"><?= $row["date"] ?></div>
                            </div>

                            <div class="address"><?= $row["division"] ?></div>
                        </div>
                        <button onclick="location.href='./repairComplete.php?id=<?= $row["repair_id"] ?> ';" id="btnComplete" class="btn"> <i class="s fas fa-check"></i></button>
                    </div>

                <?php endwhile ?>


            </div>

        </div>
    </div>

</body>

</html>