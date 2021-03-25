<?php

include_once  __DIR__ . '/../utils/classloader.php';
$tech = new classes\Technician();
$requestlist = $tech->PendingRequestListPage();

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
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/slider.css">
    <link rel="stylesheet" href="../css/tech/tech.css">
    <link rel="stylesheet" href="../css/tech/reqlist.css">
    <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
    <title>Pending Item Requsts</title>
</head>

<body>

    <?php include './nav.php' ?>



    <div class="main">
        <div class="con">


            <?php

            if ($tech->CheckPendingRequestList())
                include './views/pendingRequestList.php';
            else
                include './views/requestpage.php';


            ?>






        </div>
    </div>
</body>

</html>