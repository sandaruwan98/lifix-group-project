<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/slider.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../Clerk/css/clerk.css">
    <link rel="stylesheet" href="../clerk/css/repairHistory.css">
    <link rel="stylesheet" href="./display.css">
    <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
    <title>Display Records</title>

</head> 
<body>
<nav class="sidebar">
        <!-- <h2 class="link-text">MENU</h2> -->
        <ul>
            <li class="nav-logo"><span class="nav-link"><i class="fas fa-lightbulb"></i><span class="link-text"
                        style="margin-left: 5px;">LiFix</span> </span>
            </li>
            <li class="nav-item"><a class="nav-link" href="./index.php"><i class="fas fa-home"></i><span
                        class="link-text">Home</span> </a></li>
            <li class="nav-item"><a class="nav-link" href="../clerk/index.php"><i class="fas fa-columns"></i><span
                        class="link-text">DailyRepairs</span> </a></li>
            <li class="nav-item"><a class="nav-link" href="../clerk/repairHistory.php"><i class="fas fa-history"></i><span
                        class="link-text">RepairHistory</span></a></li>
            <li class="nav-item"><a class="nav-link " href="../clerk/purchase.html"><i class="fas fa-file-invoice"></i><span
                        class="link-text">Purchases</span></a></li>
            <li class="nav-item"><a class="nav-link " href="./Requestitem.html"><i class="fas fa-file-invoice"></i><span
                            class="link-text">Request Items</span></a></li>	
            <li class="nav-item"><a class="nav-link active" href="./display.php"><i class="fas fa-history"></i><span
                        class="link-text">Issued ItemHistory</span></a></li>
            <li class="nav-item"><a class="nav-link" href="../clerk/newlamp.html"><i class="fas fa-plus-square"></i><span
                        class="link-text">LampPost</span></a></li>
            <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-cog"></i><span
                        class="link-text">Settings</span></a></li>

        </ul>

</nav>     
<div class="feild-row">
     <h2>Issued Items History</h2>
  </div>
<table class="content-table">
<thead>                 
<div id="" class="repair-item">
     <div class="row">

<tr>
<th><span>lamppost Id</span></th>
<th><span>Date</span></th>
<th><span>Bulb</span></th>
<th><span>sunbox</span></th>
<th><span>Wires</span></th>
<th><span>Switch</span></th>
<th><span>Holders</span></th>
<th><span>Screw holder</span></th>
<th><span>3 Pin holder</span></th>
</tr>
</div>
 </div>
</thead>
<?php
//include "../connection.php";
$conn = new mysqli("localhost", "root", "", "lifix","3306");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql="select *from issue_item";
$result=mysqli_query($conn,$sql);
$resultcheck=mysqli_num_rows($result);
if($resultcheck >0)
{
while($row=mysqli_fetch_assoc($result)){
    echo"<tr>";
    echo "<td>".$row['lp_id']."</td>";
    echo "<td>".$row['date']."</td>";
    echo "<td>".$row['bulb']."</td>";
    echo "<td>".$row['sunbox']."</td>";
    echo "<td>".$row['wire']."</td>";
    echo "<td>".$row['switch']."</td>";
    echo "<td>".$row['Holder']."</td>";
    echo "<td>".$row['Screw_holder']."</td>";
    echo "<td>".$row['3_pin_holder']."</td>";
    echo"</tr>";
}
}
?>
</table>
</body>
</html>

