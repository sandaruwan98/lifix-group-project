<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/slider.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="./css/clerk.css">
    <link rel="stylesheet" href="./css/repairHistory.css">
    <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
    <title>Repair History</title>

</head>

<body>

    <nav class="sidebar">
        <!-- <h2 class="link-text">MENU</h2> -->
        <ul>
            <li class="nav-logo"><span class="nav-link"><i class="fas fa-lightbulb"></i><span class="link-text" style="margin-left: 5px;">LiFix</span> </span>
            </li>
            <li class="nav-item"><a class="nav-link" href="./index.php"><i class="fas fa-home"></i><span class="link-text">Home</span> </a></li>
            <li class="nav-item"><a class="nav-link" href="./index.php"><i class="fas fa-columns"></i><span class="link-text">DailyRepairs</span> </a></li>
            <li class="nav-item"><a class="nav-link active" href="./repairHistory.html"><i class="fas fa-history"></i><span class="link-text">RepairHistory</span></a></li>
            <li class="nav-item"><a class="nav-link" href="./purchase.html"><i class="fas fa-file-invoice"></i><span class="link-text">Purchases</span></a></li>
            <li class="nav-item"><a class="nav-link" href="./newlamp.html"><i class="fas fa-plus-square"></i><span class="link-text">LampPost</span></a></li>
            <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-cog"></i><span class="link-text">Settings</span></a></li>

        </ul>

    </nav>

    <script src="../js/slider.js"></script>

    <div class="main_content">
        <header>
            <h1>Repair History</h1>
        </header>
        <div class="container1">
            <!-- searchbox -->
            <div class="searchbox">
                <input id="search" type="text" placeholder="Search..." name="search" class="search">
                <button class="btn-search"><i class="fas fa-search"></i></button>
            </div>


            <!-- repair list -->
            <?php
            require __DIR__ . '/../classes/Repair.php';
            $repair = new Repair();
            $list = $repair->getRepairs('a');

            while ($row = $list->fetch_assoc()) :
            ?>
                <div id="<?= $row['repair_id'] ?>" class="repair-item">

                    <div class="row1"><span>#<?= $row["lp_id"] ?></span>
                        <div class="address"><?= $row["division"] ?></div><span><?= $row["date"] ?></span>
                    </div>
                </div>

            <?php endwhile ?>

        </div>
    </div>

</body>

</html>