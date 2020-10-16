<?php 
    include "UserCtrlDb.php";
    $fetchObj = new DbAccess();
    $list = $fetchObj->fetchData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Control</title>
    <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/slider.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    
<?php include "./nav.html"?>

<div class="container">
    <h1>User Control</h1>
    <div class="row">
        <div class="column1">
            <div class="card">
                <h2>New User</h2>
                    <form action="UserCtrl.php" method="POST">

                        <select name="userroll" id="userroll" class="field" required>
                            <option value="" disabled selected>Select the user roll</option>
                            <option value="Clerk">Clerk</option>
                            <option value="Storekeeper">Storekeeper</option>
                            <option value="Technician">Technician</option>
                        </select>

                        <input type="text" name="username" id="username" class="field" placeholder="Create a Username" required>

                        <input type="password" name="password" id="password" class="field" placeholder="Create a Password" required>

                        <input type="password" name="password2" id="password2" class="field" placeholder="Re-enter the Password" required>
                        <p style="color: red;"><?php echo htmlspecialchars($pwd2); ?></p>

                        <button name="submit" class="btn b0">CREATE</button>

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

                <form action="userCtrl.php" method="POST">
                    <select name="useracc" id="useracc" class="field" required>
                        <option value="" disabled selected>Select the user Account</option>

                        <?php while ($row = $list->fetch_assoc()): ?>
                        <option value="<?=$row['username'] ?>"><?=$row['username'] ?></option>
                        <?php endwhile ?>

                    </select>

                    <input type="password" name="password" id="password" class="field" placeholder="Create New Password" required>

                    <input type="password" name="password2" id="password2" class="field" placeholder="Re-enter the Password" required>
                    <p style="color: red;"><?php echo htmlspecialchars($pwd3); ?></p>
                    <button name="submit" class="btn b1">RESET</button>

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


                <form action="userCtrl.php" method="POST">

                    <select name="useracc" id="useracc" class="field" required>
                        <option value="" disabled selected>Select the user Account</option>

                        <?php while ($row = $list->fetch_assoc()): ?>
                        <option value="<?=$row['username'] ?>"><?=$row['username'] ?></option>
                        <?php endwhile ?>

                    </select>

                    <button name="submit" class="btn b2">REVOKE</button>

                </form>
            </div>
        </div>
    </div>
</div>


<script src="ds.js"></script>
</body>
</html>