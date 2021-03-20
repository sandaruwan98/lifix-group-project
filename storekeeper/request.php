<?php 
include_once  __DIR__ . '/../utils/classloader.php';
include_once __DIR__ . '/../classes/notification.php'; 
$store = new classes\StoreKeeper();
$data =  $store->Details();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/slider.css">
    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="./css/clerk.css">
    <link rel="stylesheet" href="./css/repairpage.css">
    <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
    
    <title>Repair</title>

</head>

<body>


<?php
    include "./views/nav.php";
    $cp = $data['user_details'];
?>

    <div class="main_content">
        
        <div class="main">

            <div class="list-section sc-bar">
              
                <div class="details complainer-details">
                    <H2> request Details</H2>
                    <table class="content-table">

                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td><?= $cp['username'] ?></td> 
                            </tr>

                            <tr>
                                <td>request date</td>
                                  <td><?= $cp['added_date'] ?></td>
                            </tr>
                            <tr>
                                <td>supplied date</td>
                                  <td><?= $cp['supplied_date'] ?></td>
                            </tr>



                        </tbody>


                    </table>
                </div>
                <div class="details complainer-details">
                    <H2> Supplied Item List</H2>
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>ITEM ID</th>
                                <th>ITEM NAME</th>
                                <th>QUANTITY</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $used_items= $data['used_items'];
                            foreach ($used_items as $used_item):
                        ?>

                                <tr>
                                    <td><?=  $used_item["item_id"]  ?></td>
                                    <td><?=  $used_item["name"] ?></td>
                                    <td><?=  $used_item["quantity"] ?></td>
                                </tr>

                            <?php endforeach ?>


                        </tbody>


                    </table>
                </div>
             
            </div>

            
            

        </div>
    </div>

    
    
    
    
</body>

</html>