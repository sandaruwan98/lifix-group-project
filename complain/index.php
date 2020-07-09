<?php
session_start();
// if (!isset($_SESSION["s_id"])) {
//     $_SESSION["s_id"] = rand(0, 99);
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/complain.css">
    <title>Complain Page <?php echo $_SESSION["s_id"] ?></title>
</head>

<body>
    <?php
    if (isset($_SESSION["invalid"])) {
        echo "<script>
        document.documentElement.style.setProperty('--input-clr-bg','rgba(255, 14, 14, 0.233)');
        document.documentElement.style.setProperty('--input-clr','red');
        </script>";
        unset($_SESSION["invalid"]);
    }
    ?>

    <?php if (!isset($_GET['q']) || ($_GET['q'] == 0)) { ?>

        <form action="save.php?q=data" method="post">
            <h1 style="color: rgb(34, 114, 241)">LI-Fix</h1>
            <div class="feild-container">
                <label for="">Name</label>
                <div class="input-container">
                    <input name="name" type="text">
                    <div class="under-line"></div>
                </div><!-- input-container -->
            </div><!-- feild-container -->

            <div class="feild-container">
                <label for="">NIC</label>
                <div class="input-container">
                    <input name="nic" type="text">
                    <div class="under-line"></div>
                </div><!-- input-container -->
            </div><!-- feild-container -->

            <div class="feild-container">
                <label for="">Phone Number</label>
                <div class="input-container">
                    <input name="phoneno" type="text">
                    <div class="under-line"></div>
                </div><!-- input-container -->
            </div><!-- feild-container -->

            <div class="feild-container">
                <label for="">Lamp post ID</label>
                <div class="input-container">
                    <input type="text" name="lp_id">
                    <div class="under-line"></div>
                </div><!-- input-container -->
            </div><!-- feild-container -->
            <input type="submit" value="Submit">

        </form>

    <?php } ?>

    <?php
    if (isset($_GET["s"]) && isset($_GET["q"])) {
        if ($_GET['s'] == $_SESSION["s_id"]  &&  $_GET['q'] == 1) {
    ?>

            <!-- sendmessage form -->
            <form action="save.php?q=sendmessage" method="post">
                <h1 style="color: rgb(34, 114, 241)">LI-Fix</h1>
                <br>
                <br>
                <h4>You need to verify your phone number</h4>
                <div class="feild-container">
                    <!-- <label for="">Phone Number</label> -->
                    <div class="input-container">
                        <input type="text" value="<?php if (isset($_SESSION["phoneno"])) {
                                                        echo ($_SESSION["phoneno"]);
                                                    } ?>" disabled>
                        <div class="under-line"></div>
                    </div><!-- input-container -->
                </div><!-- feild-container -->

                <input type="submit" value="Send Message">
                <!-- <a href="index.php?s=<?php echo $_SESSION["s_id"] ?>&q=2">Send Message</a> -->
                <a href="index.php">Back</a>
            </form>


        <?php }
        ?>

        <?php if ($_GET['s'] == $_SESSION["s_id"]  &&  $_GET['q'] == 2) { ?>
            <!-- verify code -->
            <form action="save.php?q=verify" method="post">
                <h1 style="color: rgb(34, 114, 241)">LI-Fix</h1>
                <br>
                <br>
                <!-- <h4>You need to verify your phone number</h4> -->
                <div class="feild-container">
                    <label for="">Enter verification Number</label>
                    <div class="input-container">
                        <input name="vcode" type="text">
                        <div class="under-line"></div>
                    </div><!-- input-container -->
                </div><!-- feild-container -->

                <input type="submit" value="Verify">
                <a href="">Send Again</a>
            </form>
    <?php }
    } ?>

</body>

</html>