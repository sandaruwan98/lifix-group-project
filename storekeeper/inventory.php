<?php 
include_once '../utils/classloader.php';

$session = new classes\Session(StorekeeperFL);
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/slider.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="./store.css">
    <link rel="stylesheet" href="./display.css">
    <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
    <title>Inventory Records</title>

</head> 
<body>


    <?php include "./views/nav.php" ?>


<div class="main_content sc-bar">


    
    <div class="frow">
        <h1>Inventory Details</h1>
    </div>
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


        $inventory = new models\Inventory();
        $result = $inventory->getAllInventory();


        while($row=mysqli_fetch_assoc($result)){
            echo"<tr>";
            echo "<td>".$row['Item_id']."</td>";
            // echo "<td>".$row['date']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['total']."</td>";
            echo"</tr>";
        }

        ?>
        </table>
    </div>



    <div class="con">
        <div class="new-stock">
            <h1 class="heading">New Stocks</h1>

            <!-- Nothing new yet -->
            <div class="row">
            <span class="lft">Date : </span>  <span class="right">10-04-2020</span>
            </div>
            <!-- <br> -->
            <div class="row">
            <span class="lft">Added by : </span> <span class="right">Mr. </span>
            </div>

            <table class="content-table">
                <thead> 
                    <tr>
                    <th>Item Id</th>
                    <th><span>Name</span></th>
                    <th><span>Current Balance</span></th>

                    </tr>
                    </div>
                    </div>
                </thead>

                <?php


                $inventory = new models\Inventory();
                $result = $inventory->getAllInventory();


                while($row=mysqli_fetch_assoc($result)){
                    echo"<tr>";
                    echo "<td>".$row['Item_id']."</td>";
                    // echo "<td>".$row['date']."</td>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['total']."</td>";
                    echo"</tr>";
                }

                ?>
            </table>
        </div>
    </div>
</div>  
</body>
</html>

