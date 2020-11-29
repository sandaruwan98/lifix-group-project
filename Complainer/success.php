<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/success.css">
    <title>Li - Fix</title>
</head>
    <body>
        <div class="outer">
            <div class="middle">
                <div class="inner">
                    <img src="img/3.svg" alt="checkmark">
                    <h1><?php echo $_SESSION['h1'];?></h1>
                    <p><?php echo $_SESSION['p'];?></p>
                    <a href="<?php echo $_SESSION['page'];?>"><button class="btn"><?php echo $_SESSION['btn'];?></button></a>
                </div>
            </div>
        </div>
    </body>
</html>