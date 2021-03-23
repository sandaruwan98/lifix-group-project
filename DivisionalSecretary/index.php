<?php 
require_once __DIR__ . '/../classes/Session.php';
include_once  __DIR__ . '/../utils/classloader.php';
include "../components/notification.php";


$session = new classes\Session(DSFL);
?>


<?php 
    include "userCtrlDb.php";
    $ref =new DbAccess();
    if(isset($_POST['add'])){
        //remaining part
        
        $ref =new DbAccess();
        $ref->addNewUser($_POST['userroll'], $_POST['name']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Control</title>
    <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/slider.css">
    <link rel="stylesheet" href="../css/complainer/style.css">
</head>
<body>
    
<?php include "./nav.html"?>
<?php include "../components/userfeild.php" ?>
<div class="hidden" id="my-popup">
    <p>some msg</p>
</div>

<div class="container">
    <h1>User Control</h1>
    <div class="row">
        <div class="column1">
            <div class="card">
                <h2>New User</h2>
                    <form action="index.php" method="POST" id="my-form">

                        <select name="userroll" id="userroll" class="field" required>
                            <option value="" disabled selected>Select the user roll</option>
                            <option value="1">Divisional Secretary</option>
                            <option value="2">Clerk</option>
                            <option value="3">Storekeeper</option>
                            <option value="4">Technician</option>
                        </select>

                        <input type="text" name="name" id="name" class="field" placeholder="Enter the name" required>

                        <!-- <input type="email" name="email" id="email" class="field" placeholder="Enter the Email Address" required> -->

                        <!-- <input type="password" name="password2" id="password2" class="field" placeholder="Re-enter the Password" required> -->
                        

                        <!-- <button name="submit" class="btn b0">CREATE</button> -->
                        <input type="submit" name="add" value="CREATE" class="btn b0">
                            

                    </form>
            </div>
        </div>
        <div class="column2">
            <div class="card">
                <h2>Password Reset</h2>

                <?php
                    $fetchObj = new DbAccess();
                    $list = $fetchObj->fetchData();
                ?>

                <form action="index.php" method="POST">
                    <select name="useracc" id="useracc" class="field" required>
                        <option value="" disabled selected>Select the user Account</option>

                        <?php while ($row = $list->fetch_assoc()): ?>
                        <option value="<?=$row['name'] ?>"><?=$row['name'] ?></option>
                        <?php endwhile ?>

                    </select>

                    <!-- <input type="password" name="password" id="password" class="field" placeholder="Create New Password" required>

                    <input type="password" name="password2" id="password2" class="field" placeholder="Re-enter the Password" required> -->
                    
                    <input type="submit" name="reset" value="RESET" class="btn b1">

                </form>
            </div>
        </div>
        <div class="column3">
            <div class="card">
                <h2>Revoke Access</h2>

                <?php
                    $fetchObj = new DbAccess();
                    $list = $fetchObj->fetchData();
                ?>

                <form action="index.php" method="POST">

                    <select name="useracc" id="useracc" class="field" required>
                        <option value="" disabled selected>Select the user Account</option>

                        <?php while ($row = $list->fetch_assoc()): ?>
                        <option value="<?=$row['name'] ?>"><?=$row['name'] ?></option>
                        <?php endwhile ?>

                    </select>

                    <input type="submit" name="revoke" value="REVOKE" class="btn b2">

                </form>
            </div>
        </div>
    </div>
</div>
<!-- <script src="ds.js"></script> -->
</body>
</html>