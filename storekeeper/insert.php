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
		
		echo "successfully";
	
	}
	else{
		echo "failed";
	}
}




?>
