<form method="POST" action="purchase.php">

                   
<?php 
foreach ($item_names as $item):  ?>
<div class="feild-row">
    <label> <?= $item[1] ?></label>
    <input class="field" type="text" placeholder="Enter Amount" name=" <?= $item[0] ?>" >
</div>
    <?php endforeach ?>


<div class="feild-row">
    <button name="addpurchase" class="btn" type="submit">SUBMIT</button>
</div>

</form>