<?php 
$itemlist = $tech->PendingRequestListDetails();

?>
<h2 class="title-r">Item Requst 1</h2>
<h4 class="title-date">Date : 2020/11/17</h2>


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
