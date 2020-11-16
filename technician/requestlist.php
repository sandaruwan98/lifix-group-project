<?php 

require_once __DIR__ . '/../classes/ItemRequest.php';

$itemrequest = new ItemRequest();
// user id eka danna one.danata is eka 4 
$requestlist = $itemrequest->getPendingRequestList_by_userid(1);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/slider.css">
    <link rel="stylesheet" href="./css/tech.css">
    <link rel="stylesheet" href="./css/reqlist.css">
    <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
    <title>Pending Item Requsts</title>
</head>

<body>
   
<?php include './nav.html' ?>



    <div class="main">
        <div class="con">
            <h2 class="title-r">Pending Item Requsts</h2>
            <div class="list">
                <?php while ($row = $requestlist->fetch_assoc()) :
                ?>

                <div class="list-item" id="<?= $row["Itemrequest_id"] ?>">
                    
                        <div class="row">
                            <div class="id"># <?= $row['Itemrequest_id'] ?> </div>
                            <div class="date"><?= $row["added_date"] ?></div>
                        </div>

                        
                    
                    <!-- <button onclick="location.href='./repairComplete.php?id=<?= $row["repair_id"] ?> ';" id="btnComplete" class="btn"> <i class="s fas fa-check"></i></button> -->
                </div>

                <?php endwhile ?>


            </div>

        </div>
    </div>
</body>

</html>