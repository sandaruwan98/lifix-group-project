<?php
include_once  __DIR__ . '/../utils/classloader.php';

$auth = new \classes\Authentication();
$auth->Loginuser();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Li - Fix</title>
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/favicon-16x16.png">
	<link rel="manifest" href="../assets/favicon/site.webmanifest">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/complainer/style.css">
    <link rel="stylesheet" href="../css/login/auth.css">

    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
</head>

<body>


    <?php include "../components/toast.php" ?>


    <?php $auth->getSession()->showMessage(); ?>


    <div class="container">

        <div class="contact-box">
            <div class="left"></div>
            <div class="right">
                <img src="../complainer/img/" alt="" srcset="">
                <h2>Login</h2>

                <?php if (isset($_SESSION["role"]) && $_SESSION["role"] == -1 && !is_null($auth->getRoles_to_select())) : ?>

                    <h3>Choose a role</h2>
                        <?php
                        $roletext = ['', 'Divisional Secetary', 'Clerck', 'Storekeeper', 'Technician', 'Admin'];
                        $roles = $auth->getRoles_to_select();
                        ?>
                        <div class="role-select">

                            <?php foreach ($roles as $role) : ?>

                                <a type="submit" href="./loginredirect.php?role=<?= $role[0] ?>" class="role-btn"><?= $roletext[$role[0]] ?></a>

                            <?php endforeach ?>

                            <a type="submit" href="./loginredirect.php?role=-1" class="btn">Back</a>
                        </div>


                    <?php else : ?>


                        <form action="index.php" method="POST">
                            <h3>Welcome To The Li-Fix</h2>
                                <br>
                                <p>
                                    Have a nice day !.
                                    <br>
                                    Enter the username and password to login to the system
                                </p>

                                <br>
                                <input type="text" name="username" value="" class="field" placeholder="UserName" id="f1" required>

                                <div id="middle-div"></div>

                                <input type="password" name="password" value="" class="field" placeholder="Password" id="f2" required>

                                <div id="last-div"></div>

                                <button type="submit" name="loginBtn" class="btn">Login</button>


                                <a href="./register.php" class="btn-log">Register</a>
                                <a href="./forgotpassword.php" class="btn-log">Forgot password?</a>
                                <br>
                                <br>
                        </form>

                    <?php endif ?>
            </div>
        </div>
    </div>
</body>

</html>