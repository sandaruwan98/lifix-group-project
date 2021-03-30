<?php
include_once  __DIR__ . '/../utils/classloader.php';
$clerck = new classes\Clerck();
$data =  $clerck->LampPostPage();
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
    
    <link rel="stylesheet" href="../css/slider.css">
    <link rel="stylesheet" href="../css/fab.css">
    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="../css/clerk/clerk.css">
    <link rel="stylesheet" href="../css/clerk/purchase.css">
    <link rel="stylesheet" href="../css/clerk/newlamp.css">

    <!-- <link rel="stylesheet" href="<?= BASE ?>css/slider.css">
    <link rel="stylesheet" href="<?= BASE ?>css/fab.css">
    <link rel="stylesheet" href="<?= BASE ?>css/style.css">

    <link rel="stylesheet" href="<?= BASE ?>clerk/css/clerk.css">
    <link rel="stylesheet" href="<?= BASE ?>clerk/css/purchase.css">
    <link rel="stylesheet" href="<?= BASE ?>clerk/css/newlamp.css"> -->

    <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
    <title>New Lamp Post</title>

</head>

<body>

    <?php include "./views/nav.php" ?>


    <?php $clerck->getSession()->showMessage() ?>


    <div class="main_content">
        <header>
            <h1>Confirm Lamppost</h1>
        </header>
        <div class="container-lp">

            <div class="add-new">
                <form method="POST" action="newlamp.php">

                    <div class="feild-row">
                        <h2 class="feild-h">Confirm Lamppost</h2>

                    </div>
                    <div class="feild-row">
                        <label>Lamppost</label>
                        <div>
                            <input id="lp" class="field lp-field" type="text" placeholder="#xxxx" name="lp">
                            <button id="check-btn" class="btn c" type="button">Check</button>
                        </div>

                    </div>
                    <div class="feild-row">
                        <label>Added technician</Address></label>
                        <input id="inputtech" class="field" type="text" placeholder="" name="technician" disabled>
                    </div>
                    <div class="feild-row">
                        <label>Address</Address></label>
                        <input id="inputadr" class="field" type="text" placeholder="Road,Division" name="adr" disabled>
                    </div>
                    <div class="feild-row">
                        <label>Date</label>
                        <input class="field" type="date" placeholder="DD/MM/YYYY" name="date" value="<?= date('Y-m-d') ?>">
                    </div>
                    <div class="feild-row">
                        <label>Requested By</label>
                        <input class="field" type="text" placeholder="person" name="reqby">
                    </div>
                    <div class="feild-row">
                        <label>Authorized By</label>
                        <input class="field" type="text" placeholder="person" name="authby">
                    </div>
                    <div class="feild-row">
                        <label>Additional Notes</label>
                        <input class="field" style="height: 80px;" type="text" placeholder="Notes" name="notes">
                    </div>

                    <div class="feild-row">
                        <button name="addlampdetail" class="btn" type="submit">SUBMIT</button>
                    </div>
                </form>
            </div>


        </div>
    </div>

    <script>
        $("#check-btn").click(function() {

            var lpid = $('#lp').val();
            $.get("./ajax/checkLamppost.php?lpid=" + lpid, function(data, status) {
                if (status == "success") {
                    var data = JSON.parse(data)
                    console.log(data);
                    if (data != null) {
                        $('#inputtech').val(data.tech);
                        $('#inputadr').val(data.adr);
                    }else{
                        $('#inputtech').val('Invalid ID');
                        $('#inputadr').val('Invalid ID');
                    }
                }

            })

        })
    </script>

</body>

</html>