<?php
include_once  __DIR__ . '/../utils/classloader.php';
$storekeeper = new classes\StoreKeeper();
$data = $storekeeper->ReqHistory();

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



        <!-- searchbox -->
        <form action="requestHistory.php" method="post">

            <div class="searchbox-sm">
                <input name="searchbox" id="search" type="text" placeholder="Search..." name="search" class="search" style="font-size: small;">
                <button name="search" class="btn-search"><i class="fas fa-search"></i></button>
            </div>
            <?php if( isset($_SESSION["search"]) ): ?>
                <div class="sdisplay">
                    <p>Search Results for "<?= $_SESSION["search"] ?>"</p>
                    <button name="clearsearch" type="submit" class="btn btn-search "><i class="fas fa-times"> Clear Search</i></button>

                </div>
            <?php endif ?>




        </form>
                <!-- request list -->

                <?php

                $request_list = $data['reqlist'];
                while ($row = $request_list->fetch_assoc()) {
                ?>
                    <div id="<?= $row['Itemrequest_id'] ?>" class="repair-item">
                        <div class="row">
                            <span>ID: <?= $row['Itemrequest_id'] ?></span>
                            <span>Supplied Date: <?= $row['supplied_date'] ?></span>
                            <?php

                            if ($row['status'] == 'd')
                                echo '<i class="s fas fa-check"></i>';
                            else
                                echo '<i class="s fas fa-times"></i>';

                            ?>
                        </div>
                    </div>

                <?php } ?>

                <?php include "../components/pagination.php" ?>


            </div>




            <div class="table-section sc-bar">
                <div class="details">
                    <h2>Request Details</h2>



                    <table class="tbl1 content-table">

                        <tbody>
                            <tr>
                                <td>Technician Name</td>
                                <td id="name">Not selected</td>
                            </tr>
                            <tr>
                                <td>Requested Date</td>
                                <td id="reqdate">Not selected</td>
                            </tr>
                            <tr>
                                <td>Supplied Date</td>
                                <td id="supdate">Not selected</td>
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
                        <tbody>
                            <tr>
                                <td>Not selected</td>
                                <td>Not selected</td>
                                <td>Not selected</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>



            <script src="../js/st/requestHistory.js"></script>


</body>

</html>