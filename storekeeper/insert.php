<?php
$conn=new PDO("mysql:host=localhost;dbname=lifix","root","");
if(isset($_POST['save'])){	
$lp_id=$_POST['lp_id'];
$bulb=$_POST['bulb'];
$wires=$_POST['wires'];
$switch=$_POST['switch'];
$holder=$_POST['holder'];
$save=$conn->prepare("insert into issue_item(lp_id,date,bulb,wires,switch,holder)values('$lp_id',curdate(),'$bulb','$wires','$switch','$holder')");
	
	if($save->execute()){
		
		echo "successfully";
	
	}
	else{
		echo "failed";
	}
}




?>
