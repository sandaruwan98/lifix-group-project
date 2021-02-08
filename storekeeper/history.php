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
    <title>Item Requests</title>

</head>
<body>
   
    <?php include "./views/nav.php" ?>


    
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
                                <span>Date: <?= $row['added_date'] ?></span>
                                <span>Technician: <?= $row['username'] ?></span>
                                <i class="s fas fa-check"></i>
                            </div>
                        </div>
                    
                    <?php } ?>

                </div>
               

                

                <div class="table-section sc-bar">
                    <div class="details">
                        <h2>Request Details</h2>
                        <?php 
                    

                    $itemrequest= new models\ItemRequest();
                    $request_list = $itemrequest->details();


                    while ($row = $request_list->fetch_assoc()) {
                        
                    
                ?>
                        <table class="content-table">
    
                            <tbody>
                                <tr>
                                    <td>Technician Name</td>
                                    <td><?= $row['username'] ?></td>
                                </tr>
                                <tr>
                                    <td>Requested Date</td>
                                    <td><?= $row['added_date'] ?></td>
                                </tr>
                                <tr>
                                    <td>Supplied Date</td>
                                    <td><?= $row['supplied_date'] ?></td>
                                </tr>
                               
    
                            </tbody>
    
    
                        </table>
                        <?php } ?>
                    </div>

                    <!-- supply items -->
                    <div class="details">
                        <h2 style="margin-bottom: 8px;"> Supplied Items</h2>
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>ITEM ID</th>
                                <th>ITEM NAME</th>
                                <th>QUANTITY</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>LED BULB</td>
                                <td>80</td>

                            </tr>
                            <tr>
                                <td>1</td>
                                <td>LED BULB</td>
                                <td>80</td>

                            </tr>
                            <tr>
                                <td>2</td>
                                <td>SUNBOXES</td>
                                <td>20</td>

                            </tr>
                            <tr>
                                <td>3</td>
                                <td>WIRES</td>
                                <td>50m</td>

                            </tr>
                            <tr>
                                <td>4</td>
                                <td>FUSE</td>
                                <td>20</td>

                            </tr>
                            <tr>
                                <td>5</td>
                                <td>BULB</td>
                                <td>80</td>

                            </tr>
                        

                        </tbody>


                    </table>

                    </div>
                </div>


            </div>
        </div>

        <script>
            const btnAdd = document.querySelector('#btnAdd');
            const table_section = document.querySelector('.content-table');
            const addnew_section = document.querySelector('.add-new');
            const list_items = document.querySelectorAll('.repair-item');

            btnAdd.addEventListener('click', () => {
                table_section.style.display = 'none';
                addnew_section.style.display = 'block';

            })

            list_items.forEach(item => {
                item.addEventListener('click', () => {
                    addnew_section.style.display = 'none';
                    table_section.style.display = 'table ';

                })
            })
        </script>
</body>
</html>