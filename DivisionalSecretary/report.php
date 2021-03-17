<?php

use models\ReportGenerate;

include_once  __DIR__ . '/../models/ReportGenerate.php';
include_once  __DIR__ . '/../utils/classloader.php';
$inventryModel = new models\Inventory();

$session = new classes\Session(DSFL);

$fetchObj = new ReportGenerate();
$secondDate = date("Y-m-d");
$d = strtotime("-1 Months");
$firstDate = date("Y-m-d", $d);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Report Generate</title>
  <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/slider.css">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/report.css">
  <link rel="stylesheet" href="./css/charts.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="../js/jquery-3.5.1.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</head>

<body>
  <?php include "../components/userfeild.php" ?>
  <?php include "./nav.html" ?>
  <div class="container">
    <h1>Report Generate</h1>
    <div class="top-bar">
        <div class="range">
          <p>From</p>
          <input type="date" id="firstDate" class="field" required>
          <p>To</p>
          <input type="date" id="secondDate" class="field" required>
          <button class="btn">Generate</button>
        </div>
    </div>

    <div class="chart-row">
      <div class="chart-column">
        <div class="chart-title">
          <h2>Recieved Complaints</h2>
        </div>
        <div class="chart-column-data">

          <!-- <?php
            // $list = $fetchObj->getComplaints($firstDate, $secondDate);
          ?> -->

            <p class="chart-column-data-p">
            
</p>
        </div>
      </div>

      <div class="chart-column-middle"></div>

      <div class="chart-column">
        <div class="chart-title">
          <h2>Completed Repairs</h2>
        </div>

        <p>Some text..</p>
      </div>
    </div>

    <div class="chart-row">
      <div class="chart-column">
        <div class="chart-title">
          <h2>Inventory</h2>
        </div>

        <div id="myfirstchart" style="height:max-content;"></div>
      </div>
      <div class="chart-column-middle"></div>
      <div class="chart-column">
        <div class="chart-title">
          <h2>Used Items</h2>
        </div>

        <p>Some text..</p>
      </div>
    </div>

  </div>

<script>
  $(document).ready(function() {
    $('.btn').click(function(){

      let date1 = $("#firstDate").val();
      let date2 = $("#secondDate").val();

      console.log(date1);

    $.ajax({
        type: "POST",
        url: "../utils/reportFetch.php",
        data: {firstDate: date1, secondDate: date2},
              success: function(data) {
                // console.log(data);
                $(".chart-column-data-p").html(data);
        }
    });

  })}
  );


  let data;

  $(document).ready(function() {
    $.ajax({
        type: "POST",
        url: "../utils/reportFetch.php",
        data: {function: 2},
        success: function(data) {
          if(data != undefined) {
            new Morris.Bar({
            element: 'myfirstchart',
            data: data,
            xkey: 'name',
            ykeys: ['total'],
            labels: ['Value']
          });
          }
          
          
        }
    });
  });

  
</script>

</body>

</html>