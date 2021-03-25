<?php
include_once  __DIR__ . '/../utils/classloader.php';

$auth = new \classes\Authentication();
$auth->Register();
$data = $auth->getRegData();
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
    <link rel="shortcut icon" href="../complainer/img/1.jpg" type="image/x-icon">
    <!-- <link rel="stylesheet" href="res.css"> -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/complainer/style.css">
    <link rel="stylesheet" href="../css/login/reg.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fugaz+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Welcome to Li-Fix</title>
</head>

<body>


    <?php include "../components/toast.php" ?>

    <?php $auth->getSession()->showMessage(); ?>

    <div class="container">

        <div class="contact-box">
            <div class="left"></div>
            <div class="right">
                <img src="../complainer/img/" alt="" srcset="">
                <h2>Register</h2>
                <form action="./register.php" method="POST">

                    <br>

                    <input type="text" placeholder="UserName" class="field" name="username" value="<?= $data[0] ?>" required>
                    <input type="text" placeholder="Name" class="field" name="name" value="<?= $data[1] ?>" required>
                    <input type="text" placeholder="Phone Number" class="field" name="phone" value="<?= $data[2] ?>" required>
                    <select name="role" id="userroll" class="field" required>
                        <option value="" disabled selected>Select the user roll</option>
                        <option value="5">Admin</option>
                        <option value="1">Divisional Secretary</option>
                        <option value="2">Clerk</option>
                        <option value="3">Storekeeper</option>
                        <option value="4">Technician</option>
                    </select>
                    <input type="password" placeholder="Password" class="field" name="pass" value="<?= $data[3] ?>" required>
                    <input type="password" placeholder="Confirm Password" class="field" name="confirmpass" value="<?= $data[4] ?>" required>




                    <button type="submit" class="btn" value="" name="register">Register</button>
                    <br>
                    <br>
                </form>
            </div>
        </div>
    </div>
</body>

</html>