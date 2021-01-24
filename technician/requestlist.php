<?php 

include_once  __DIR__ . '/../utils/classloader.php';
$tech = new classes\Technician();
$requestlist = $tech->PendingRequestList();

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
   
<?php include './nav.php' ?>



    <div class="main">
        <div class="con">


            <?php
            
            if($tech->CheckPendingRequestList())
                include './views/pendingRequestList.php';
            else
                include './views/requestpage.php';
            

            ?>
                
                   



            
        </div>
    </div>
</body>

</html>