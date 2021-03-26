<?php
include_once  __DIR__ . '/../utils/classloader.php';
$clerck = new classes\Clerck();
$data =  $clerck->RepairHistory();
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
    <!-- <link rel="stylesheet" href="<?= BASE ?>css/slider.css">
    <link rel="stylesheet" href="<?= BASE ?>css/style.css">
    <link rel="stylesheet" href="<?= BASE ?>clerk/css/clerk.css">-->

    <link rel="stylesheet" href="../css/slider.css">
    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="../css/clerk/clerk.css">
    <link rel="stylesheet" href="../css/clerk/repairHistory.css">

    <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
    <title>Repair History</title>

</head>

<body>


    <?php include "./views/nav.php" ?>
    <?php $clerck->getSession()->showMessage() ?>



    <div class="main_content">
        <header>
            <h1>Repair History</h1>
        </header>
        <div class="container1">
            <!-- searchbox -->
            <form action="repairHistory.php" method="post">
                <div class="searchbox">
                        <input name="searchbox" id="search" type="text" placeholder="Search..." name="search" class="search">
                        <button name="search" type="submit" class="btn-search"><i class="fas fa-search"></i></button>
                </div>
                <?php if( isset($_SESSION["search"]) ): ?>
                <div class="sdisplay">
                    <p>Search Results for "<?= $_SESSION["search"] ?>"</p>
                    <button name="clearsearch" type="submit" class="btn btn-search "><i class="fas fa-times"> Clear Search</i></button>

                </div>
                <?php endif ?>
            </form>


            <!-- repair list -->
            <?php

            $list = $data['repairs'];

            while ($row = $list->fetch_assoc()) :
            ?>

                <div id="<?= $row['repair_id'] ?>" class="repair-item" onclick="location.href='<?= "./repairpage.php?id=" . $row['repair_id']  ?>' ;">

                    <div class="row1"><span>#<?= $row["lp_id"] ?></span>
                        <div class="address"><?= $row["division"] ?></div><span><?= $row["date"] ?></span>
                    </div>
                </div>

            <?php endwhile ?>

        </div>

        <?php include "../components/pagination.php" ?>
    </div>

</body>

</html>