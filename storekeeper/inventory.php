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
<nav class="sidebar">
        <!-- <h2 class="link-text">MENU</h2> -->
        <ul>
            <li class="nav-logo"><span class="nav-link"><i class="fas fa-lightbulb"></i><span class="link-text"
                        style="margin-left: 5px;">Li-Fix</span> </span>
            </li>
            <!-- <li class="nav-item"><a class="nav-link" href="./index.php"><i class="fas fa-home"></i><span
                        class="link-text">Home</span> </a></li> -->
			<li class="nav-item"><a class="nav-link active" href="./ItemRequest.php"><i class='far fa-list-alt'></i><span
                        class="link-text"> Request Items</span></a></li>	
            <li class="nav-item"><a class="nav-link " href="./requestHistory.html"><i class="fas fa-history"></i><span
                            class="link-text">Item Request History</span></a></li>	
            <li class="nav-item"><a class="nav-link " href="./inventory.php"><i class='far fa-file-alt'></i><span
                class="link-text">Inventory Details</span></a></li>
            <li class="nav-item"><a class="nav-link " href="./stockaddition.html"><i class="fas fa-file-invoice"></i><span
                class="link-text">Issue Items</span></a></li>  	

        </ul>

    </nav>

    <script src="../js/slider.js"></script>

    
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

