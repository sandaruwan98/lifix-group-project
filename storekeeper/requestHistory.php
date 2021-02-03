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
            <?php
             $servername = "localhost";
             $username = "root";
             $password = "";
             $dbname = "lifix";
             $port = "3306";
            
             $mysqli = new mysqli($servername, $username, $password, $dbname, $port);

               $query = "SELECT supplied_date,username FROM itemrequest INNER JOIN user ON itemrequest.created_by=user.userid WHERE itemrequest.status='c'";
               if($result = $mysqli->query($query)){
                while ($row = $result->fetch_assoc()) { ?>
                <div id="" class="repair-item">
                <div class="row">
                                <span>Supplied Date: <?= $row['supplied_date'] ?></span>
                                <span>Technician: <?= $row['username'] ?></span>
                                <i class="s fas fa-check"></i>
                </div>
                </div>
                <?php 
                }
                 $result->free();
            } 
            ?>
            </div>
            <div class="table-section sc-bar">
                    <div class="details">
                        <h2>Request Details</h2>
    
                        <table class="content-table">
    
                            <tbody>
                                <tr>
                                    <td>Technician Name</td>
                                    <td>Bla Bla</td>
                                </tr>
                                <tr>
                                    <td>Requested Date</td>
                                    <td>2020-10-14</td>
                                </tr>
                                <tr>
                                    <td>Supplied Date</td>
                                    <td>2020-10-15</td>
                                </tr>
                               
    
                            </tbody>
    
    
                        </table>
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

                         

</body>
</html>
