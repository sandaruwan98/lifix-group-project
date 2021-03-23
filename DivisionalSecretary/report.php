<?php

use models\ReportGenerate;

include_once  __DIR__ . '/../models/ReportGenerate.php';
include_once  __DIR__ . '/../utils/classloader.php';

$inventryModel = new models\Inventory();
$usermodel = new models\User();
$fraudmodel = new models\Fraud();

$session = new classes\Session(DSFL);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technician Report</title>
    <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/slider.css">
    <link rel="stylesheet" href="../css/ds/style.css">
    <link rel="stylesheet" href="../css/ds/report.css">
    <link rel="stylesheet" href="../css/ds/charts.css">
    <link rel="stylesheet" href="../css/morris.css">
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="../js/morris.min.js"></script>
</head>

<body>
    <?php include "../components/userfeild.php" ?>
    <?php include "./nav.html" ?>
    <div class="container">
        <h1>Report Generate</h1>
        <div class="top-bar">
            <div class="range">
                <p>Check</p>
                <?php
                $result = $usermodel->getUsers(4);
                ?>
                <select name="useracc" id="useracc" class="field" required>
                    <option value="" disabled selected>select account</option>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <option value="<?= $row['Name'] ?>"><?= $row['Name'] ?></option>
                    <?php endwhile ?>
                </select>
                <p>From</p>
                <input type="date" id="firstDate" class="field" required>
                <p>To</p>
                <input type="date" id="secondDate" class="field" required>
                <button class="btn">Generate</button>
            </div>
        </div>

        <div class="chart-row" style="display: flex; align-items:center">
            <div class="chart-column" style="height: 130px;">
                <div class="chart-title">
                    <h2>Technician's Bio</h2>
                </div>
                <div class="chart-column-data" style="height: 130px;">

                    <p class="chart-column-data-p">
                        No data to show
                    </p>
                </div>
            </div>

            <div class="chart-column-middle"></div>
            <div class="chart-row" style="display: flex; align-items:center">
                <div class="chart-column" style="max-height: 130px;">
                    <div class="chart-title">
                        <h2>Returned Items Mismatches</h2>
                    </div>
                    <div id="chart-column-data" class="chart-column-data" style="height: 130px; display: flex !important;">
                        <p class="fraud-data chart-column-data-p">
                            No data to show
                        </p>
                    </div>

                </div>
            </div </div>

            <script>
                $(document).ready(function() {

                    $('.btn').click(function() {

                        let name = $("#useracc").val();
                        let date1 = $("#firstDate").val();
                        let date2 = $("#secondDate").val();

                        console.log(name);

                        $.ajax({
                            type: "POST",
                            url: "../utils/tecReportFetch.php",
                            data: {
                                name: name,
                                firstDate: date1,
                                secondDate: date2
                            },
                            success: function(data) {
                                data = JSON.parse(data);
                                if (data.bio != "No data on this period") {
                                    $(".chart-column-data").css({
                                        "display": "block"
                                    });
                                    $("#chart-column-data").css({
                                        "display": "flex"
                                    });
                                    console.log(data)
                                    $(".chart-column-data-p").html(data.bio);
                                    $(".fraud-data").html(data.fraud);

                                } else {
                                    $(".chart-column-data").css({
                                        "display": "flex"
                                    });
                                    $(".chart-column-data-p").html(data.bio);
                                    $(".fraud-data").html(data.fraud);
                                }
                            }
                        });

                    })
                });
            </script>
</body>

</html>