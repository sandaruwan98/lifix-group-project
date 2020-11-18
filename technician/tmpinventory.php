<?php 
include_once '../utils/classloader.php';

$session = new models\Session(TechnicianFL);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/slider.css">

    <link rel="stylesheet" href="./css/tech.css">
    <link rel="stylesheet" href="./css/request.css">
    <!-- <link rel="stylesheet" href="./css/complete.css"> -->
    <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
    <title>Temporary Inventory</title>
</head>

<body>
    
    <?php include './nav.html' ?>



    <div class="main">
        <div class="con">


            <form method="POST" action="">
                <h2>Temporary Inventory</h2>
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>ITEM NAME</th>
                            <th>QUANTITY</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>LED BULB</td>
                            <td>80</td>

                        </tr>
                        <tr>
                            <td>LED BULB</td>
                            <td>80</td>

                        </tr>
                        <tr>
                            <td>SUNBOXES</td>
                            <td>20</td>

                        </tr>
                        <tr>
                            <td>WIRES</td>
                            <td>50m</td>

                        </tr>
                        <tr>
                            <td>FUSE</td>
                            <td>20</td>

                        </tr>
                        <tr>
                            <td>BULB</td>
                            <td>80</td>

                        </tr>
                        <tr>
                            <td>BULB</td>
                            <td>80</td>

                        </tr>
                        <tr>
                            <td>BULB</td>
                            <td>80</td>

                        </tr>
                        <tr>
                            <td>BULB</td>
                            <td>80</td>

                        </tr>

                    </tbody>


                </table>


                <button type="submit" id="" name="complete" class="btn">Report a change</button>


            </form>

        </div>
    </div>

   
</body>

</html>