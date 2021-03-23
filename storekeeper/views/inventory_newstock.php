<?php
$newstocks = $data['newstock'];
foreach ($newstocks as $newstock) :

?>
    <div class="con">
        <div class="new-stock">
            <h1 class="heading">New Stocks</h1>

            <!-- Nothing new yet -->
            <div class="row">
                <span>Date : </span> <span class="right"> <?= $newstock['date'] ?> </span>
            </div>

            <div class="row">
                <span>Added by : </span> <span class="right"> <?= $newstock['clerk_id'] ?> </span>
            </div>

            <table class="content-table">
                <thead>
                    <tr>
                        <th>Item Id</th>
                        <th><span>Name</span></th>
                        <th><span>Current Balance</span></th>

                    </tr>
        </div>
    </div>
    </thead>

    <?php
    $sa_id = $newstock['sa_id'];
    foreach ($data[$sa_id] as $item) {
        echo "<tr>";
        echo "<td>" . $item['item_id'] . "</td>";
        // echo "<td>".$row['date']."</td>";
        echo "<td>" . $item['name'] . "</td>";
        echo "<td>" . $item['quantity'] . "</td>";
        echo "</tr>";
    }

    ?>
    </table>
    <form method="POST" action="inventory.php">
        <div class="btn-row">

            <button id="confirm" name="confirm" class="btn">Confirm</button>
            <input name="sa_id" type="text" hidden value="<?= $sa_id ?>">
            <button id="decline" name="decline" class="btn danger">Decline</button>


        </div>
    </form>
    </div>
    </div>
<?php endforeach ?>


<?php
if (!$newstocks) :
?>
    <div class="con">
        <div class="new-stock">
            <h1 class="heading">New Stocks</h1>

            Nothing new yet

        </div>
    </div>

<?php endif ?>