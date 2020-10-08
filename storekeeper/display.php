<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="display.css">
    <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
    <title>Display Records</title>

</head> 
<body>
<table width="100%">
<tr>
<th>lamppost Id</th>
<th>Date</th>
<th>Bulb</th>
<th>Switch</th>
<th>Wires</th>
<th>Holders</th>

</tr>
<?php
include "../connection.php";
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
    echo "<td>".$row['switch']."</td>";
    echo "<td>".$row['wires']."</td>";
    echo "<td>".$row['Holder']."</td>";
    echo"</tr>";
}
}
?>
</table>
</body>
</html>

