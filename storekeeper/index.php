<?php
include_once  __DIR__ . '/../utils/classloader.php';
$storekeeper = new classes\StoreKeeper();
$data = $storekeeper->Index();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/favicon-16x16.png">
	<link rel="manifest" href="../assets/favicon/site.webmanifest">
    <link rel="stylesheet" href="../css/slider.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/st/store.css">
    <link rel="stylesheet" href="../css/itemList.css">
    <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Item Requests</title>

</head>

<body>


    <?php include "./views/nav.php" ?>


    <?php $storekeeper->getSession()->showMessage() ?>

    <div class="main_content">
        <header>
            <h1>Item Requests</h1>
        </header>
        <div class="container">
            <div class="p-list-section sc-bar">

                <button id="btnAdd" class="btn">Issue Items</button>

                <div class="xx">
                    <h2>Pending Requests</h2>
                </div>

                <!-- request list -->
                <?php
                $request_list = $data['request_list'];
                while ($row = $request_list->fetch_assoc()) { ?>

                    <div id="<?= $row['Itemrequest_id'] ?>" class="repair-item">
                        <div class="row">
                            <span>Date: <?= $row['added_date'] ?></span>
                            <span>Technician: <?= $row['username'] ?></span>
                            <i class="s fas fa-check"></i>
                        </div>
                    </div>

                <?php } ?>

                <?php include "../components/pagination.php" ?>

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

                        </tbody>


                    </table>

                    <!-- supply button -->
                    <button class="btn" id="supplybtn" style="font-size: large;">Supply items to technician</button>

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
    <script src="../js/st/index.js"></script>
</body>

</html>