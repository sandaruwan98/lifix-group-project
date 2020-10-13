<?php 

require_once __DIR__ . '/../classes/Repair.php';
require_once __DIR__ . '/../classes/Inventory.php';

$inv = new Inventory();
$item_names = $inv->getItemNames();
$item_names= $item_names->fetch_all();



if (isset($_POST["addrepair"]) ) {
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

    // get lamppost id
    $lp_id = $_POST["lp_id"];

    if (!empty($used_items) && $lp_id!=null && $lp_id!=0) {
    
        $repair = new Repair();
     
        // danata technician_id eka 1 denoo. authentication nathi nisa
        $repair->CreateEmergencyRepair($lp_id,1,$used_items,$return_items);

        echo ("<script>alert('repair completed succesfully') </script>");
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
    <title>Emegency Repair</title>
</head>

<body>
    <nav class="sidebar">
        <!-- <h2 class="link-text">MENU</h2> -->
        <ul>
            <li class="nav-logo"><span class="nav-link" href="#"><i class="fas fa-lightbulb"></i><span class="link-text"
                        style="margin-left: 5px;">LiFix</span></span></li>
            <li class="nav-item"><a class="nav-link " href="./index.php"><i class="fas fa-home"></i><span
                        class="link-text">Home</span> </a></li>
            <li class="nav-item"><a class="nav-link " href="./map.html"><i class="fas fa-map"></i><span
                        class="link-text">ViewMap</span> </a></li>
            <li class="nav-item"><a class="nav-link " href="./request.php"><i
                        class="fas fa-plus-square"></i><span class="link-text ">Request</span></a></li>
            <li class="nav-item"><a class="nav-link active" href="#"><i class="fas fa-exclamation-circle"></i><span
                        class="link-text">EmgRepair</span></a></li>
            <li class="nav-item"><a class="nav-link" href="./lamppost.php"><i class="fas fa-shower"></i><span
                        class="link-text">Lamppost</span></a></li>

        </ul>

    </nav>

    <script src="../js/slider.js"></script>


    <div class="main">
        <div class="con">


            <form method="POST" action="EmgRepair.php">
                <h2>Add Repair Manually</h2>
                <div class="feild-row">
                    <label for="lp_id">Lamp Post ID</label>
                    <input class="field" type="text" placeholder="#xxxx" name="lp_id" id="lp_id">

                </div>

                <?php 
                foreach ($item_names as $item):
                 ?>
                <div class="collapsible"><?= $item[1] ?></div>
                <div class="content">
                    <input class="field" type="text" placeholder="Enter used Amount" name="<?= $item[0] ?>_u" id="">
                    <input class="field" type="text" placeholder="Enter returned Amount" name="<?= $item[0] ?>_r" id="">
                </div>
                <?php endforeach ?>

                <button type="submit" name="addrepair" class="btn">ADD REPAIR</button>


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