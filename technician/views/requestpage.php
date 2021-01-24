<?php 
$data = $tech->PendingRequestListDetails();
$itemlist = $data['itemlist'];
$details = $data['requestdetails'];
?>
<h2 class="title-r">Item Requst <?= $details['Itemrequest_id']  ?></h2>
<h4 class="title-date">Date : <?= $details['added_date']  ?></h2>


<form method="POST" style="padding: 10px;" action="">
    <table class="content-table" >
        <thead>
                <tr>
                    <th>ITEM NAME</th>
                    <th>QUANTITY</th>
                </tr>
        </thead>
        <tbody>
            <?php foreach ($itemlist as $item) :?>
                <tr>
                    <td><?= $item["name"]  ?></td>
                    <td><?= $item["quantity"]  ?></td>
                </tr>
            <?php endforeach ?>  
        </tbody>


    </table>




</form>
