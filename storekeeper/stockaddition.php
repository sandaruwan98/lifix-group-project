<?php 

include_once '../utils/classloader.php';
$session = new models\Session(StorekeeperFL);
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/slider.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="./store.css">
    <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
    <title>Stock Additions</title>

</head>
<body>
   
    <?php include "./views/nav.php" ?>


    <div class="main_content">
        <header>
            <h1>Stock Additions</h1>
        </header>
        <div class="container">
            <div class="p-list-section">


                <div class="xx">
                    <h2>List</h2>
                </div>

                <!-- request list -->

                <div id="" class="repair-item">
                    <div class="row">
                        <span>Date: 2020-06-22</span>
                        <span>Added By: Uditha Ishan</span>
                        <i class="s fas fa-check"></i>
                    </div>
                </div>
                <div id="" class="repair-item">
                    <div class="row">
                        <span>Date: 2020-06-22</span>
                        <span>Added By: Uditha Ishan</span>
                        <i class="s fas fa-check"></i>
                    </div>
                </div>
                <div id="" class="repair-item">
                    <div class="row">
                        <span>Date: 2020-06-22</span>
                        <span>Added By: Uditha Ishan</span>
                        <i class="s fas fa-check"></i>
                    </div>
                </div>
                <div id="" class="repair-item">
                    <div class="row">
                        <span>Date: 2020-06-22</span>
                        <span>Added By: Uditha Ishan</span>
                        <i class="s fas fa-check"></i>
                    </div>
                </div>
               
                </div>
                <div class="table-section">

                    <div class="add-new" style="display: none;">
                        <form>

                            <div class="feild-row">
                                <h2>Issue Items</h2>

                            </div>
                            <div class="feild-row">



                                <label>Bulb</label>
                                <input class="field" type="text" placeholder="Enter Amount" name="bulb" id="">
                            </div>
                            <div class="feild-row">
                                <label>Sunbox</label>
                                <input class="field" type="text" placeholder="Enter Amount" name="sunbox" id="">
                            </div>
                            <div class="feild-row">
                                <label>Wire</label>
                                <input class="field" type="text" placeholder="Enter Amount" name="wire" id="">
                            </div>
                            <div class="feild-row">
                                <label>Switch</label>
                                <input class="field" type="text" placeholder="Enter Amount" name="wire" id="">
                            </div>
                            <div class="feild-row">
                                <label>Holder</label>
                                <input class="field" type="text" placeholder="Enter Amount" name="wire" id="">
                            </div>
                            <div class="feild-row">
                                <label>Screw holder</label>
                                <input class="field" type="text" placeholder="Enter Amount" name="wire" id="">
                            </div>
                            <div class="feild-row">
                                <label>3 Pin holder</label>
                                <input class="field" type="text" placeholder="Enter Amount" name="wire" id="">
                            </div>
                            <div class="feild-row">
                                <button class="btn" type="submit">SUBMIT</button>
                            </div>
                        </form>
                    </div>

                    <div class="supply">
                         <table class="content-table">
                        <thead>
                            <tr>
                                <th>ITEM ID</th>
                                <th>ITEM NAME</th>
                                <th>QUANTITY</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>LED BULB</td>
                                <td>80</td>

                            </tr>
                            <tr>
                                <td>1</td>
                                <td>LED BULB</td>
                                <td>80</td>

                            </tr>
                            <tr>
                                <td>2</td>
                                <td>SUNBOXES</td>
                                <td>20</td>

                            </tr>
                            <tr>
                                <td>3</td>
                                <td>WIRES</td>
                                <td>50m</td>

                            </tr>
                            <tr>
                                <td>4</td>
                                <td>FUSE</td>
                                <td>20</td>

                            </tr>
                            <tr>
                                <td>5</td>
                                <td>BULB</td>
                                <td>80</td>

                            </tr>
                            <tr>
                                <td>6</td>
                                <td>BULB</td>
                                <td>80</td>

                            </tr>
                            <tr>
                                <td>7</td>
                                <td>BULB</td>
                                <td>80</td>

                            </tr>
                            <tr>
                                <td>8</td>
                                <td>BULB</td>
                                <td>80</td>

                            </tr>

                        </tbody>


                    </table>


                    </div>
                   

                </div>


            </div>
        </div>

     
</body>
</html>