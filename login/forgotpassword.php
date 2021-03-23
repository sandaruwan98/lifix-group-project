<?php
include_once  __DIR__ . '/../utils/classloader.php';

$auth = new \classes\Authentication();
$auth->FogotPass();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../complainer/img/1.jpg" type="image/x-icon">
    <!-- <link rel="stylesheet" href="res.css"> -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/complainer/style.css">
    <link rel="stylesheet" href="../css/login/reg.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fugaz+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Reset Password</title>
</head>

<body>

    <style>
        .contact-box {
            max-width: 700px;
        }
    </style>

    <?php include "../components/toast.php" ?>

    <?php $auth->getSession()->showMessage(); ?>

    <div class="container">

        <div class="contact-box">
            <div class="left"></div>
            <div class="right">
                <img src="../complainer/img/" alt="" srcset="">


                <?php if (!isset($_SESSION["fp"])) { ?>

                    <!-- page 1 -->
                    <h2>Reset Password</h2>
                    <form action="./forgotpassword.php" method="POST">
                        <p>Enter the username to reset password</p>
                        <br>
                        <input type="text" placeholder="UserName" class="field" name="username" value="">
                        <button type="submit" class="btn" value="" name="getuser">Next</button>
                    </form>


                <?php } elseif ($_SESSION["fp"] == 0) { ?>
                    <!-- page 2 -->
                    <h2>Reset Password</h2>
                    <form action="./forgotpassword.php" method="POST">

                        <p>Verification code will be sent to this mobile number</p>
                        <p style="color: #f39c0f;"><?= $_SESSION["phone"] ?></p>
                        <br>
                        <button type="submit" class="btn" value="" name="send">Send</button>
                        <button class="btn back" name="back">Back</button>
                    </form>
                    <br><br>

                    <!-- page 3 -->
                <?php } elseif ($_SESSION["fp"] == 1) { ?>
                    <?php echo "<script>console.log('" . $_SESSION["code"] . "')</script>" ?>
                    <h2>Reset Password</h2>
                    <form action="./forgotpassword.php" method="POST">
                        <p>Enter the verification code sent to </p>
                        <p style="color: #f39c0f;"><?= $_SESSION["phone"] ?></p>
                        <br>

                        <input type="text" placeholder="Verification Code" class="field" name="code" value="">
                        <button type="submit" class="btn" value="" name="verify">Verify</button>
                        <button class="btn back disabled" id="resend" name="resend" disabled>Resend <span class="countdown"></span></button>
                    </form>

                    <button class="btn back" onclick="location.href='./forgotpassword.php?cancel=1' " name="cancel">Cancel</button>

                    <script>
                        const resendBtn = document.querySelector('#resend');
                        const countdown = document.querySelector('.countdown');
                        var duration = 60;
                        countdown.innerHTML = '(' + duration + ')';
                        setInterval(() => {
                            if (duration > 0) {
                                duration--;
                                countdown.innerHTML = '(' + duration + ')';
                            } else {
                                resendBtn.disabled = false;
                                resendBtn.classList.remove("disabled");
                                countdown.innerHTML = '';
                            }
                        }, 1000)
                    </script>

                    <!-- page 4 -->
                <?php } elseif ($_SESSION["fp"] == 2) { ?>
                    <h2>Reset Password</h2>

                    <form action="./forgotpassword.php" method="POST">

                        <p>Enter the new password</p>
                        <br>

                        <input type="password" placeholder="Password" class="field" name="pass" value="" required>
                        <input type="password" placeholder="Confirm Password" class="field" name="pass2" value="" required>

                        <button type="submit" class="btn" value="" name="reset">Reset</button>
                    </form>

                    <button class="btn back" onclick="location.href='./forgotpassword.php?cancel=1' " name="cancel">Cancel</button><br><br>
                <?php } ?>


            </div>
        </div>
    </div>
</body>

</html>