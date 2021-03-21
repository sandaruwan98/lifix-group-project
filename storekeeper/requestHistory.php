<?php 
include_once  __DIR__ . '/../utils/classloader.php';

$session = new classes\Session(StorekeeperFL);
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/slider.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="./store.css">
   
    <!-- <link rel="stylesheet" href="../Clerk/css/repairpage.css"> -->
    <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Item Requests</title>

</head>
<body>
   
    <?php 
    include "./views/nav.php" ?>


    
    <div class="main_content">
        <header>
            <h1>Item Request History</h1>
        </header>
        <div class="container">
           
        <div class="p-list-section sc-bar">



                <div class="xx">
                    <h2>Request List</h2>
                </div>

                <!-- request list -->
               
                <?php 
                    

                    $itemrequest= new models\ItemRequest();
                    $request_list = $itemrequest->details();


                    while ($row = $request_list->fetch_assoc()) {
                        
                    
                ?>
                        <div id="<?= $row['Itemrequest_id'] ?>" class="repair-item">
                            <div class="row">
                                <span>ID: <?= $row['Itemrequest_id'] ?></span>
                                <span>Supplied Date: <?= $row['supplied_date'] ?></span>
                                <i class="s fas fa-check"></i>
                            </div>
                        </div>
                    
                    <?php } ?>

                </div>
               

                

                <div class="table-section sc-bar" >
                    <div class="details">
                        <h2>Request Details</h2>
                        <?php 
                    

                    $itemrequest= new models\ItemRequest();
                    $request_list = $itemrequest->details();


                     $row = $request_list->fetch_assoc();
                                        
                ?>
                
                        <table class="tbl1 content-table" >
    
                            <tbody>
                                <tr>
                                    <td>Technician Name</td>
                                    <td id="name"><?= $row['username'] ?></td>
                                </tr>
                                <tr>
                                    <td>Requested Date</td>
                                    <td id="reqdate"><?= $row['added_date'] ?></td>
                                </tr>
                                <tr>
                                    <td>Supplied Date</td>
                                    <td id="supdate"><?= $row['supplied_date'] ?></td>
                                </tr>
                               
    
                            </tbody>
    
    
                        </table>
                       
                    </div>

                    <!-- supply items -->
                    <div class="details">
                        <h2 style="margin-bottom: 8px;"> Supplied Items</h2>
                    <table class="tbl2 content-table">
                        <thead>
                            <tr>
                                <th>ITEM ID</th>
                                <th>ITEM NAME</th>
                                <th>QUANTITY</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>

                    </div>
                </div>
     


        <script src="requestHistory.js"></script>
      

</body>
</html>