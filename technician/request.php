<?php

include_once  __DIR__ . '/../utils/classloader.php';
$tech = new classes\Technician();
$data =  $tech->AddRequestpage();

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
    <link rel="stylesheet" href="../css/tech/request.css">
    <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Add Request</title>
</head>

<body>


    <?php include './nav.php' ?>


    <?php $tech->getSession()->showMessage() ?>

    <div class="main">
        <div class="con">


            <form method="POST" action="request.php">
                <h2>Add Item Request</h2>


                <?php


                $item_names =  $data['ItemData'];
                foreach ($item_names as $item) :
                ?>
                    <div class="collapsible"><?= $item[1] ?></div>
                    <div class="content">
                        <input class="field" type="text" placeholder="Enter Amount" name="<?= $item[0] ?>_u" id="">
                    </div>
                <?php endforeach ?>




                <button type="submit" name="addrequest" class="btn">ADD REQUEST</button>


            </form>

        </div>
    </div>

    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                }
            });
        }
    </script>

</body>

</html>