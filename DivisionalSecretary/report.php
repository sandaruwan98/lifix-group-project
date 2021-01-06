<?php 
include_once  __DIR__ . '/../utils/classloader.php';

$session = new classes\Session(DSFL);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Generate</title>
    <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/slider.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/report.css">
</head>
<body>
<?php include "../components/userfeild.php" ?>
    <?php include "./nav.html"?>
    <div class="container">
    <h1>Report Generate</h1>
    <div class="top-bar">
        <form action="">
            <div class="range">
                <p>From</p>
                <input type="date" name="" id="" class="field">
                <p>To</p>
                <input type="date" name="" id="" class="field">
                <button type="submit" class="btn">Generate</button>
            </div>
        </form>
    </div>
    
    </div>
    
</body>
</html>