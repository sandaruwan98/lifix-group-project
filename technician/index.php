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
    
<?php include './nav.html' ?>


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