<?php 
include_once  __DIR__ . '/../utils/classloader.php';
include_once __DIR__ . '/../classes/notification.php'; 
$clerck = new classes\Clerck();
// $data =  $clerck->();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/slider.css">
    <link rel="stylesheet" href="../css/fab.css">
    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="./css/clerk.css">
    <link rel="stylesheet" href="./css/purchase.css">
    <link rel="stylesheet" href="./css/newlamp.css">
    <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
    <title>New Lamp Post</title>

</head>

<body>

<?php include "./views/nav.php" ?>
   

    <!-- <div class="notification-container-wrap">
        <div class="notification-container  popup-ani">
            <header>
                <h1>Notifications</h1>
            </header>
            <input name="email" placeholder="hello@barrel.im" type="email" value=""><br>
            <input class="go-ani" name="submit" type="submit"> <input name="uri" type="hidden" value="barreldotim">
        </div>
        <div class="notification-fab">
            <div class="wrap">
                <div class="img-fab img"></div>
            </div>
        </div>
    </div> -->

    <script>
        const fab = document.querySelector('.notification-fab');
        fab.addEventListener('click', () => {

            document.querySelector('.notification-fab .wrap').classList.toggle("ani");
            document.querySelector('.notification-container').classList.toggle("open");
            document.querySelector('.img-fab.img').classList.toggle("close");
        })
    </script>

    <div class="main_content">
        <header>
            <h1>Confirm Lamppost</h1>
        </header>
        <div class="container-lp">

            <div class="add-new">
                <form>

                    <div class="feild-row">
                        <h2 class="feild-h">Confirm Lamppost</h2>

                    </div>
                    <div class="feild-row">



                        <label>Lamppost</label>
                        <input class="field" type="text" placeholder="#xxxx" name="lp" id="">
                    </div>
                    <div class="feild-row">
                        <label>Added technician</Address></label>
                            <input class="field" type="text" disabled placeholder="Damish Nisal" name="sunbox" id="">
                    </div>
                    <div class="feild-row">
                        <label>Address</Address></label>
                            <input class="field" type="text" placeholder="Road,Division" name="sunbox" id="">
                    </div>
                    <div class="feild-row">
                        <label>Date</label>
                        <input class="field" type="date" placeholder="DD/MM/YYYY" name="wire" id="">
                    </div>
                    <div class="feild-row">
                        <label>Requested By</label>
                        <input class="field" type="text" placeholder="person" name="wire" id="">
                    </div>
                    <div class="feild-row">
                        <label>Authorized By</label>
                        <input class="field" type="text" placeholder="person" name="wire" id="">
                    </div>
                    <div class="feild-row">
                        <label>Additional Notes</label>
                        <input class="field" style="height: 80px;" type="text" placeholder="Notes" name="wire" id="">
                    </div>

                    <div class="feild-row">
                        <button class="btn" type="submit">SUBMIT</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</body>

</html>