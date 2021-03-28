<?php

use models\ReportGenerate;



include_once  __DIR__ . '/../models/ReportGenerate.php';
include_once  __DIR__ . '/../utils/classloader.php';
$inventryModel = new models\Inventory();

$session = new classes\Session(DSFL);
$inventry = $inventryModel->getInventory();
$barlabel = "";
$barval = "";
while ($row = mysqli_fetch_array($inventry)) {
  $barlabel .= '"'.$row["name"] . '" ,';
  $barval .= $row["total"] . ",";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Report Generate</title>
  <link rel="apple-touch-icon" sizes="180x180" href="../assets/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/favicon-16x16.png">
	<link rel="manifest" href="../assets/favicon/site.webmanifest">
  <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/slider.css">
  <link rel="stylesheet" href="../css/ds/style.css">
  <link rel="stylesheet" href="../css/ds/report.css">
  <!-- <link rel="stylesheet" href="../css/ds/charts.css"> -->
  <link rel="stylesheet" href="../css/ds/dash.css">
  <!-- <link rel="stylesheet" href="../css/morris.css"> -->
  <link rel="stylesheet" href="../css/style.css">

  <script src="../js/jquery-3.5.1.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="../js/morris.min.js"></script>
</head>

<body>

  <?php include "../components/userfeild.php" ?>
  <?php include "./nav.html" ?>

  <div class="container">

    <h1>System Overview</h1>

    <div class="admin">
       
       
    <main class="admin__main">
        <div class="dashboard1">
            <!-- area chart -->
            <div class="dashboard__item">
                <div class="card">
                    <div class="card__header">
                        <i class="fa fa-area-chart"></i> Complaints last month
                    </div>
                    <div class="card__content">
                        <div class="card__item">
                            <canvas id="myAreaChart" width="100%" height="35"></canvas>
                        </div>
                    </div>
                </div>
            </div>
           <!-- pie -->
            <div class="dashboard__item dashboard__item--col">
                <div class="card">
                    <div class="card__header">
                        <i class="fa fa-pie-chart"></i>  Disk usage
                    </div>
                    <div class="card__content">
                        <div class="card__item">
                              <canvas id="myPieChart" width="100%" height="70"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- bar -->
           

            </div>
            <div class="dashboard2">

            <div class="dashboard__item dashboard__item--col">
                <div class="card">
                    <div class="card__header">
                        <i class="fa fa-bar-chart"></i>  Current Invetory Balance
                    </div>
                    <div class="card__content">
                        <div class="card__item">
                            <canvas id="myBarChart" width="100%" height="40"></canvas>

                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard__item dashboard__item--col">
                <div class="card">
                    <div class="card__header">
                        Card
                    </div>
                    <div class="card__content">
                        <div class="card__item">
                        <div class="h4 mb-0 text-primary">$34,693</div>
                  <div class="small text-muted">YTD Revenue</div>
                  <hr>
                  <div class="h4 mb-0 text-warning">$18,474</div>
                  <div class="small text-muted">YTD Expenses</div>
                  <hr>
                  <div class="h4 mb-0 text-success">$16,219</div>
                  <div class="small text-muted">YTD Margin</div>
                        </div>
                    </div>
                </div>
            </div>
            
       
            <div class="dashboard__item dashboard__item--full">
                <div class="card">
                    <!-- <div class="card__header">
                        Card full width
                    </div> -->
                    <div class="card__content">
                              
                                <div class="range">
                                  <p>From</p>
                                  <input type="date" id="firstDate" class="field" value="<?=   date('Y-m-d',strtotime(date('Y-m-d')." -1 Months"))  ?>" required>
                                  <p>To</p>
                                  <input type="date" id="secondDate" class="field" value="<?= date('Y-m-d') ?>" required>
                                  <button class="btn">Generate</button>
                                </div>
                              
                    </div>
                </div>
            </div>
            <div class="dashboard__item dashboard__item--col">
                <div class="card">
                    <div class="card__header">
                      <h3>Recieved Complaints</h3> 
                    </div>
                    <div class="card__content">
                        <div class="card_item">
                            <div class="chart-column-data1">
                              
                                No data to show
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard__item dashboard__item--col">
                <div class="card">
                    <div class="card__header">
                        New LampPost Records
                    </div>
                    <div class="card__content">
                        <div class="card_item">
                        <div class="chart-column-data2">
                              
                              No data to show
                          
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard__item dashboard__item--full">
                <div class="card">
                    <div class="card__header">
                        Card full width
                    </div>
                    <div class="card__content">
                        <div class="card__item">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium labore id culpa sit nisi nostrum, excepturi cumque eos laborum ducimus alias, provident doloribus et facere explicabo ab repudiandae perferendis earum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima dolore laudantium est, vel illo labore nostrum cupiditate perspiciatis, doloremque sit enim sequi, quasi cumque dolorum voluptate! Aliquam corrupti laboriosam nostrum. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Assumenda cupiditate porro dolores optio dicta tempora quas, culpa itaque, unde recusandae tempore. Voluptas quia perferendis est veritatis nobis, iusto voluptate dolor?
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
 
    </div>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js'></script>
<script src='../js/ds/new.js'></script>
  <script>
    $(document).ready(function() {
      $('.btn').click(function() {

        let date1 = $("#firstDate").val();
        let date2 = $("#secondDate").val();
        console.log(date1);
        $.ajax({
          type: "POST",
          url: "./ajax/reportComp.php",
          data: {
            firstDate: date1,
            secondDate: date2
          },
          success: function(data) {
            if (data != "No data on this period") {
              $(".chart-column-data1").css({
                "display": "block"
              });
              $(".chart-column-data1").html(data);
            } else
              $(".chart-column-data1").html(data);
          }
        });

        $.ajax({
          type: "POST",
          url: "./ajax/reportlp.php",
          data: {
            firstDate: date1,
            secondDate: date2
          },
          success: function(data) {
            if (data != "No data on this period") {
              $(".chart-column-data2").css({
                "display": "block"
              });
              $(".chart-column-data2").html(data);
            } else
              $(".chart-column-data2").html(data);
          }
        });
      })
    });

 
// -- Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: [ <?=$barlabel ?> ],
    datasets: [{
      label: "Toatal",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: [<?=$barval ?>],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 6
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 250,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});


  </script>


</body>

</html>