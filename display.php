<?php
include "../connection.php";
$sql="select *from issue_item";
$result=mysql_query($sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Display Records</title>
<style>
table,td,th{
border:1px solid black;
}
td{
padding:5px;
text-align:center;
}
</style>
</head> 
<body>
<h2><b>Successfuly issued</b></h2>
<table width="100%">
<tr>
<th>Bulb</th>
<th>Switch</th>
<th>Wires</th>
<th>Holders</th>

</tr>
<?php
foreach ($data as $row){
echo"<tr>";
echo "<td>".$row->id."</td>";
echo "<td>".$row->Bulb."</td>";
echo "<td>".$row->Switch."</td>";
echo "<td>".$row->Wires."</td>";
echo "<td>".$row->Holders."</td>";
echo"</tr>";
}

?>
</table>
</body>
</html>
