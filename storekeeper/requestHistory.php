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

<!-- repair list -->
<?php
             $servername = "localhost";
             $username = "root";
             $password = "";
             $dbname = "lifix";
             $port = "3306";
            
             $mysqli = new mysqli($servername, $username, $password, $dbname, $port);

               $query = "SELECT supplied_date,userId,username,itemrequest_id,added_date FROM itemrequest INNER JOIN user ON itemrequest.created_by=user.userId WHERE itemrequest.status='c'";
               if($result = $mysqli->query($query)){
                while ($row = $result->fetch_assoc()) { ?>
                <div id="" class="repair-item">
               
                <div id="<?= $row['userId'] ?>" class="repair-item" onclick="location.href='<?= "./request.php?id=" . $row['userId']  ?>' ;">

                <div class="row1"><span>#<?= $row["itemrequest_id"] ?></span>
               <span><?= $row["supplied_date"] ?></span>
                </div>
                </div>
            </div>                            
               
             <?php }
                
                $result->free();
             } ?>


</div>
                         

</body>
</html>
