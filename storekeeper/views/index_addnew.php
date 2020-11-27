<?php 

$inv = new models\Inventory();
$item_names = $inv->getItemNames();
$item_names= $item_names->fetch_all();

?>


<div class="add-new" style="display: none;">

    <div class="feild-row">
        <h2 class="feild-h">Issue Items</h2>
    </div>

    <div  class="col-12">
        <div class="feild-row">

        <select name="userroll" id="item-select" class="field col-4" required>

                <option value="-1" disabled selected>Select the item</option>    
            <?php 
            foreach ($item_names as $item):  ?>
                <option value="<?= $item[0].'-'.$item[1] ?>"><?= $item[1] ?></option>
            <?php endforeach ?>

        </select>

        <input id="item-quantity" class="field col-4" type="text" placeholder="Enter Quantity" aria-label="Enter to do text" autofocus>
        </div>

        <ul id="item-list" class="item-list" aria-label="List of to do tasks"></ul>
    
        </div>

    <div class="feild-row">
        <button id="addpurchase" onclick="SendAjax('ajax/save_itemrequestlist')" class="btn" >SUBMIT</button>
    </div>
</div>
<script src="../js/itemList.js"></script>