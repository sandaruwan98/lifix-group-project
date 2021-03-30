<?php

include_once  __DIR__ . '/../utils/classloader.php';
$ds = new classes\DS();
$data =  $ds->TechOverview();

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

    <h1>Technician Overview</h1>

    <div class="admin">
       
       
    <main class="admin__main">
        <div class="dashboard1">
          
        <div class="dashboard__item dashboard__item--full">
                <div class="card">
                    <!-- <div class="card__header">
                        Card full width
                    </div> -->
                    <div class="card__content">
                              <form action="techreport.php" method="post">
                                  <div class="range">
                                  <p>Check</p>
                                  <?php
                                     
                                  ?>
                                  <select name="techid" id="useracc" class="field" required>
                                      <option value="" disabled selected>select account</option>
                                      <?php 
                                      $result = $data['techs'];
                                            while ($row = $result->fetch_assoc()) : ?>
                                              <option value="<?= $row['userId'] ?>"><?= $row['Name'] ?></option>
                                      <?php endwhile ?>
                                  </select>
                                    <p>From</p>
                                    <input type="date" name="firstDate" id="firstDate" class="field" value="<?=   date('Y-m-d',strtotime(date('Y-m-d')." -1 Months"))  ?>" required>
                                    <p>To</p>
                                    <input type="date" name="secondDate" id="secondDate" class="field" value="<?= date('Y-m-d') ?>" required>
                                    <button name="generate" type="submit" class="btn">Generate</button>
                                  </div>
                              </form>
                    </div>
                </div>
            </div>


            <div class="dashboard__item dashboard__item--col">
                <div class="card">
                    <div class="card__header">
                       Technician Details
                    </div>
                    <div class="card__content">
                        <div class="card__item">
                            <?php 
                             if (isset($_POST["generate"])) {
                                $techdetail = $data['techdetail'];
                            ?>
                                <div class="small text-muted">username</div>
                                <h3 class="h4 mb-0 text-primary"><?= $techdetail['username'] ?></h3>
                                <hr>
                                <div class="small text-muted">Full Name</div>
                                <h3 class="h4 mb-0 text-primary"><?= $techdetail['Name'] ?></h3>

                                <hr>
                                <div class="small text-muted">Phone Number</div>
                                <h3 class="h4 mb-0 text-primary"><?= $techdetail['phone'] ?></h3>
                            <?php } else{
                                 echo "Select data";
                            } ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dashboard__item dashboard__item--col">
                <div class="card">
                    <div class="card__header">
                        Summary
                    </div>
                    <div class="card__content">
                        <div class="card__item">
                        <?php 
                             if (isset($_POST["generate"])) {
                                $techdetail = $data['techdetail'];
                            ?>
                                <div class="text-muted">Days worked</div>
                                <h3 class="text-primary"><?= $data['daycount'] ?></h3>
                                <hr>
                                <div class="text-muted">No. of repairs done</div>
                                <h3 class="text-primary"><?= $data['normcount'] ?></h3>

                                <hr>
                                <div class="text-muted">Suspicious activities</div>
                                <h3 style="color: #dc3545;"><?= $data['suscount'] ?></h3>
                            <?php } else{
                                echo "Select data";
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
           <!-- pie -->
            <div class="dashboard__item dashboard__item--col">
                <div class="card">
                    <div class="card__header">
                        <i class="fa fa-pie-chart"></i>  Technician Accuracy
                    </div>
                    <div class="card__content">
                        <div class="card__item">
                              <canvas id="myPieChart" width="100%" height="60"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- bar -->
           

          </div>

          <div class="dashboard2">
            
         
            <div class="dashboard__item dashboard__item--full">
                <div class="card">
                    <div class="card__header">
                      <h3>Damage item Mismatches</h3> 
                    </div>
                    <div class="card__content">
                        <div class="card_item">
                            <div class="chart-column-data1">
                                <?php 
                                    if (isset($_POST["generate"])) {

                                        $fraudaResult=$data['fraudAlist'];
                                        
                                        
                            
                                        if ($fraudaResult->num_rows > 0) {
                                          echo "<table class='content-table' >
                                          <tr>
                                          <th>ID</th>
                                          <th>Description</th>
                                          <th>Recorded date</th>
                                          <th>Item</th>
                                          <th>Difference</th>
                                          </tr> ";
                                            $names = $data['itemName'];
                                            while ($rowFraud = $fraudaResult->fetch_array() ) {
                                                echo "<tr><td>" . $rowFraud['fraud_id'] . "</td><td>" . $rowFraud['description'] . "</td><td>" . $rowFraud['date'] . "</td><td>" . $names[ $rowFraud['item_id'] -1 ]['name'] . "</td><td>" . $rowFraud['difference'] . "</td></tr>";
                                            }
                                            echo "</table>";
                                        } else {
                                          echo "No data on this period";
                                        }


                                        $fraudbResult=$data['fraudBlist'];
                                        
                                        echo '<div class="card__header">
                                        <h3>Other Frauds</h3> 
                                      </div>';
                                        
                                        if ($fraudbResult->num_rows > 0) {
                                          echo "<table class='content-table' >
                                          <tr>
                                          <th>ID</th>
                                          <th>Description</th>
                                          <th>Recorded date</th>
                                          </tr> ";
                                          
                                            while ($rowFraud = $fraudbResult->fetch_array() ) {
                                                echo "<tr><td>" . $rowFraud['fraud_id'] . "</td><td>" . $rowFraud['description'] . "</td><td>" . $rowFraud['date']. "</td></tr>";
                                            }
                                            echo "</table>";
                                        } else {
                                          echo "No data on this period";
                                        }
                                    }else{
                                        echo "No data to show";
                                    }
                                ?>
                                
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         
            
        </div>
     
    </main>
 
    </div>
    </div>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js'></script>
<script src='../js/ds/new.js'></script>
  <script>
    // $(document).ready(function() {
    //   $('.btn').click(function() {

    //     let date1 = $("#firstDate").val();
    //     let date2 = $("#secondDate").val();
    //     console.log(date1);
    //     $.ajax({
    //       type: "POST",
    //       url: "./ajax/reportComp.php",
    //       data: {
    //         firstDate: date1,
    //         secondDate: date2
    //       },
    //       success: function(data) {
    //         if (data != "No data on this period") {
    //           $(".chart-column-data1").css({
    //             "display": "block"
    //           });
    //           $(".chart-column-data1").html(data);
    //         } else
    //           $(".chart-column-data1").html(data);
    //       }
    //     });

    //     $.ajax({
    //       type: "POST",
    //       url: "./ajax/reportlp.php",
    //       data: {
    //         firstDate: date1,
    //         secondDate: date2
    //       },
    //       success: function(data) {
    //         if (data != "No data on this period") {
    //           $(".chart-column-data2").css({
    //             "display": "block"
    //           });
    //           $(".chart-column-data2").html(data);
    //         } else
    //           $(".chart-column-data2").html(data);
    //       }
    //     });
    //   })
    // });


 // Chart.js scripts
// -- Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// -- Pie Chart Example
var ctx = document.getElementById("myPieChart");
piedata =  [<?=$data['normcount'].','.$data['suscount'] ?> ];

var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Normal Repairs", "Suspicious Repairs"],
    datasets: [{
      data: piedata,
      backgroundColor: ['#007bff', '#dc3545'],
    }],
  },
});

  </script>


</body>

</html>