<?php 
include_once '../utils/classloader.php';

$session = new models\Session(StorekeeperFL);
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/slider.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="./store.css">
    <link rel="stylesheet" href="../css/itemList.css">
    <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Item Requests</title>

</head>
<body>
    

    <?php include "./views/nav.php" ?>


    <div class="main_content">
        <header>
            <h1>Item Requests</h1>
        </header>
        <div class="container">
            <div class="p-list-section">

                <button id="btnAdd" class="btn">Issue Items</button>

                <div class="xx">
                    <h2>Pending Requests</h2>
                </div>

                <!-- request list -->
                <?php 
                    

                    $itemrequest= new models\ItemRequest();
                    $request_list = $itemrequest->getPendingRequestList();


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
                <div class="table-section">

                <?php include_once "./views/index_addnew.php"  ?>
         

                    <div class="supply">
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
                            <tr>
                                <td>6</td>
                                <td>BULB</td>
                                <td>80</td>

                            </tr>
                            <tr>
                                <td>7</td>
                                <td>BULB</td>
                                <td>80</td>

                            </tr>
                            <tr>
                                <td>8</td>
                                <td>BULB</td>
                                <td>80</td>

                            </tr>

                        </tbody>


                    </table>

                    <!-- supply button -->
                    <button class="btn " style="font-size: large;">Supply items to technician</button>

                    </div>
                   

                </div>


            </div>
        </div>

        <script>
            const btnAdd = document.querySelector('#btnAdd');
            const table_section = document.querySelector('.supply');
            const addnew_section = document.querySelector('.add-new');
            const list_items = document.querySelectorAll('.repair-item');

            btnAdd.addEventListener('click', () => {
                table_section.style.display = 'none';
                addnew_section.style.display = 'block';

            })

            list_items.forEach(item => {
                item.addEventListener('click', () => {
                    addnew_section.style.display = 'none';
                    table_section.style.display = 'block ';

                })
            })
        </script>
        <script src="index.js"></script>
</body>
</html>