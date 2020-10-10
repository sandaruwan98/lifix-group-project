<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/slider.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="./store.css">
    <link rel="stylesheet" href="./display.css">
    <link rel="stylesheet" href="./clerk/css/repairHistory.css">
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
            <li class="nav-item"><a class="nav-link " href="./Requestitem.html"><i class='far fa-list-alt'></i><span
                            class="link-text">Request Items</span></a></li>	
            <li class="nav-item"><a class="nav-link " href="./issueitems.html"><i class="fas fa-file-invoice"></i><span
                                class="link-text">Issue Items Form</span></a></li>  
            <li class="nav-item"><a class="nav-link active" href="./display.php"><i class="fas fa-history"></i><span
                        class="link-text">Issued ItemHistory</span></a></li>
            <li class="nav-item"><a class="nav-link " href="./inventory.php"><i class='far fa-file-alt'></i><span
                        class="link-text">Inventory Details</span></a></li>
           

        </ul>

</nav>     
<div class="frow">
     <h1>Issued Items History</h1>
  </div>
  <div class="container1">
            <!-- searchbox -->
            <div class="searchbox">
                <input id="search" type="text" placeholder="Search..." name="search" class="search">
                <button class="btn-search"><i class="fas fa-search"></i></button>
            </div>
<table class="ctable">
<thead>                 
<div id="" class="repair-item">
     <div class="row">

<tr>
<th>lamppost Id</th>
<th>Date</th>
<th>Bulb</th>
<th>sunbox</th>
<th>Wires</th>
<th>Switch</th>
<th>Holders</th>
<th>Screw holder</th>
<th>3 Pin holder</th>
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

