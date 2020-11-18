<?php 
include_once '../utils/classloader.php';

$session = new models\Session(TechnicianFL);
?>


<?php 
if (!isset($_GET["id"])) 
    header('location: ./index.php');

$r_id = $_GET["id"];




//  to laod repair items
$inv = new models\Inventory();
$item_names = $inv->getItemNames();
$item_names= $item_names->fetch_all();

$repair = new models\Repair();

if (isset($_POST["complete"]) ) {
    $used_items = array();
    $return_items = array();
    foreach ($item_names as $item){
        //for collect used items quantities
        $item_name = $item[0]."_u";
        $quantity = $_POST["$item_name"];

        if ($quantity!=0 && $quantity!=null) {

            $used_item = array($item[0], $quantity);
            $used_items[] = $used_item;
        }
        
        //for collect return items quantities
        $item_name = $item[0]."_r";
        $quantity = $_POST["$item_name"];

        if ($quantity!=0 && $quantity!=null) {

            $return_item = array($item[0], $quantity);
            $return_items[] = $return_item;
        }
    }

    if (!empty($used_items)) {
       
        $repair->CompleteRepair($r_id,$used_items,$return_items);

        header("location: ./index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/slider.css">

    <link rel="stylesheet" href="./css/tech.css">
    <link rel="stylesheet" href="./css/request.css">
    <link rel="stylesheet" href="./css/complete.css">
    <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
    <title>Comlpete Repair</title>
</head>

<body>


<?php include './nav.html' ?>


<div class="main">
        <div class="con">


            <form method="POST" action="repairComplete.php?id=<?= $r_id ?>">
                <h2>Complete Repair</h2>
                <?php 
                foreach ($item_names as $item):
                 ?>
                <div class="collapsible"><?= $item[1] ?></div>
                <div class="content">
                    <input class="field" type="text" placeholder="Enter used Amount" name="<?= $item[0] ?>_u" id="">
                    <input class="field" type="text" placeholder="Enter returned Amount" name="<?= $item[0] ?>_r" id="">
                </div>
                <?php endforeach ?>

                <button type="submit" id="" name="complete" class="btn">COMPLETE REPAIR</button>


            </form>

        </div>
    </div>

    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                } else {
                    content.style.maxHeight = "90px";
                }
            });
        }
    </script>
</body>

</html>