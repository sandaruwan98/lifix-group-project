<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/slider.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="./store.css">
    <link rel="stylesheet" href="./display.css">
    <link rel="stylesheet" href="../clerk/css/repairHistory.css">
    <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
    <title>Inventory Records</title>

</head> 
<body>


    <?php include "./views/nav.php" ?>


    
<div class="frow">
     <h1>Inventory Details</h1>
  </div>
            
<table class="ctable">
<thead>                 
<div id="" class="repair-item">
     <div class="row">

<tr>
<th>Item Id</th>
<!-- <th><span>Date</span></th> -->
<th><span>Name</span></th>
<th><span>Total</span></th>

</tr>
</div>
 </div>
</thead>

<?php

require_once __DIR__ . '/../classes/Inventory.php';

$inventory = new Inventory();
$result = $inventory->getAllInventory();


while($row=mysqli_fetch_assoc($result)){
    echo"<tr>";
    echo "<td>".$row['Item_id']."</td>";
    // echo "<td>".$row['date']."</td>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['total']."</td>";
    echo"</tr>";
}

?>
</table>
</body>
</html>

