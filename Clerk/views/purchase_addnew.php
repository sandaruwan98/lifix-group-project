<div class="add-new" style="display: none;">


    <div class="feild-row">
        <h2 class="feild-h">Add new purchase</h2>
    </div>

    <div  class="col-12">
        <div class="feild-row">
            

            <select name="userroll" id="item-select" class="field col-4" required>

            <option value="-1" disabled selected>Select the item</option>    
            <?php 
            $item_names = $data['ItemData'];
            foreach ($item_names as $item):  ?>

                <option value="<?= $item[0].'-'.$item[1] ?>"><?= $item[1] ?></option>


            <?php endforeach ?>



        </select>

        <input id="item-quantity" class="field col-4" type="text" placeholder="Enter Quantity" aria-label="Enter to do text" autofocus>
        </div>


        <ul id="item-list" class="item-list" aria-label="List of to do tasks"></ul>
    

        
        </div>

    <div class="feild-row">
        <button id="addpurchase" onclick="SendAjax2()" class="btn" >SUBMIT</button>
    </div>
</div>
<script src="../js/itemList.js"></script>
