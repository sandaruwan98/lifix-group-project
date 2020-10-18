<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/slider.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../Clerk/css/clerk.css">
    <link rel="stylesheet" href="../Clerk/css/purchase.css">
    <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
    <title>Issue Items</title>

</head>

<body>

    <nav class="sidebar">
        <!-- <h2 class="link-text">MENU</h2> -->
        <ul>
            <li class="nav-logo"><span class="nav-link"><i class="fas fa-lightbulb"></i><span class="link-text"
                        style="margin-left: 5px;">Li-Fix</span> </span>
            </li>
            <li class="nav-item"><a class="nav-link" href="./index.php"><i class="fas fa-home"></i><span
                        class="link-text">Home</span> </a></li>
            <li class="nav-item"><a class="nav-link " href="./Requestitem.html"> <i class='far fa-list-alt'></i><span
                            class="link-text">Request Items</span></a></li>	
            <li class="nav-item"><a class="nav-link active " href="#"><i class="fas fa-file-invoice"></i><span
                                class="link-text">Issue Items Form</span></a></li>              
            <li class="nav-item"><a class="nav-link " href="./display.php"><i class="fas fa-history"></i><span
                                class="link-text">Issued Item History</span></a></li>
             <li class="nav-item"><a class="nav-link " href="./inventory.php"><i class='far fa-file-alt'></i><span
                                    class="link-text">Inventory Details</span></a></li>
            

        </ul>

    </nav>
		<?php
$conn=new PDO("mysql:host=localhost;dbname=lifix","root","");
if(isset($_POST['save'])){	
$lp_id=$_POST['lp_id'];
$bulb=$_POST['bulb'];
$sunbox=$_POST['sunbox'];
$wires=$_POST['wire'];
$switch=$_POST['switch'];
$holder=$_POST['holder'];
$screw_holder=$_POST['sholder'];
$pin_holder=$_POST['pin_holder'];
$save=$conn->prepare("insert into issue_item(lp_id,date,bulb,sunbox,wire,switch,Holder,Screw_holder,3_pin_holder)values('$lp_id',curdate(),'$bulb','$sunbox','$wires','$switch','$holder','$screw_holder','$pin_holder')");
	
	if($save->execute()){
	echo "<script> alert('successfully added') </script>";
	    
	}
	else{
		echo "<script>alert('failed')</script>";
	}
}


?>
  


        
</body>

</html>

