<?php 

require_once __DIR__ . '/../classes/ItemRequest.php';

$itemrequest = new ItemRequest();
// user id eka danna one.danata is eka 4 
$requestlist = $itemrequest->getPendingRequestList_by_userid(1);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/slider.css">
    <link rel="stylesheet" href="./css/tech.css">
    <link rel="stylesheet" href="./css/reqlist.css">
    <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
    <title>Pending Item Requsts</title>
</head>

<body>
   
<?php include './nav.html' ?>



    <div class="main">
        <div class="con">


            <?php
            
            if(isset($_GET["id"])){
                include './views/requestpage.php';
            }else{
                include './views/pendingRequestList.php';
            }

            ?>
                
                   



            
        </div>
    </div>
</body>

</html>