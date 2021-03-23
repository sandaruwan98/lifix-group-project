<div class="add-new" style="display: none;">

    <div class="feild-row">
        <h2 class="feild-h">Issue Items</h2>
    </div>

    <div class="col-12">
        <!-- -----------------select technician  part-->
        <div class="feild-row">
            <div class="field col-4">Select technician</div>

            <select name="techSelect" id="techSelect" class="field">
                <option value="" disabled="">Select the technician</option>
                <?php $technicians = $data['technicians'];
                while ($tech = $technicians->fetch_assoc()) : ?>
                    <option value="<?= $tech['userId'] ?>"><?= $tech['Name'] ?></option>
                <?php endwhile ?>
            </select>

        </div>

        <!-- --------------select item to issue  part-->
        <div class="feild-row">

            <select name="userroll" id="item-select" class="field col-4" required>

                <option value="-1" disabled selected>Select the item</option>
                <?php
                $item_names = $data['item_names'];
                foreach ($item_names as $item) :  ?>
                    <option value="<?= $item[0] . '-' . $item[1] ?>"><?= $item[1] ?></option>
                <?php endforeach ?>

            </select>

            <input id="item-quantity" class="field col-4" type="text" placeholder="Enter Quantity" aria-label="Enter to do text" autofocus>
        </div>




        <ul id="item-list" class="item-list" aria-label="List of to do tasks"></ul>
    </div>


    <!----------------- Submit button -->
    <div class="feild-row">
        <button id="addpurchase" onclick="SendAjax('ajax/save_itemrequestlist')" class="btn">SUBMIT</button>
    </div>
</div>
<script src="../js/itemList.js"></script>