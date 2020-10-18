<?php 

require_once __DIR__ . '/../classes/Repair.php';

$repair = new Repair();
// user id eka danna one.danata is eka 4 
$list_assign = $repair->getAssignedRepairs(4);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/slider.css">
    <link rel="stylesheet" href="./css/tech.css">
    <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
    <title>Avalable Repairs</title>
</head>

<body>
    <nav class="sidebar">
        <!-- <h2 class="link-text">MENU</h2> -->
        <ul>
            <li class="nav-logo"><span class="nav-link" href="#"><i class="fas fa-lightbulb"></i><span class="link-text"
                        style="margin-left: 5px;">Li-Fix</span></span></li>
            <li class="nav-item"><a class="nav-link active" href="./index.php"><i class="fas fa-home"></i><span
                        class="link-text">Home</span> </a></li>
            <li class="nav-item"><a class="nav-link " href="./map.html"><i class="fas fa-map"></i><span
                        class="link-text">View Map</span> </a></li>
            <li class="nav-item"><a class="nav-link" href="./request.php"><i class="fas fa-plus-square"></i><span
                        class="link-text">Request</span></a></li>
            <li class="nav-item"><a class="nav-link" href="./EmgRepair.php"><i class="fas fa-exclamation-circle"></i><span
                        class="link-text">EmgRepair</span></a></li>
            <li class="nav-item"><a class="nav-link" href="./lamppost.php"><i class="fas fa-shower"></i><span
                        class="link-text">Lamp post</span></a></li>
            <li class="nav-item"><a class="nav-link" href="./tmpinventory.html"><i class="far fa-file-alt"></i><span
                        class="link-text">TmpInventory</span></a></li>

        </ul>

    </nav>

    <script src="../js/slider.js"></script>


    <div class="main">
        <div class="con">
            <h2 class="title-r">Pending Repairs</h2>
            <div class="list">
                <?php while ($row = $list_assign->fetch_assoc()) :
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