<h2 class="title-r">Pending Item Requsts</h2>

<div class="list">
    <?php while ($row = $requestlist->fetch_assoc()) :
    ?>

    <div class="list-item" id="<?= $row["Itemrequest_id"] ?>" onclick="location.href='<?= "./requestlist.php?id=" . $row['Itemrequest_id']  ?>' ;">
        
            <div class="row">
                <div class="id"># <?= $row['Itemrequest_id'] ?> </div>
                <div class="date"><?= $row["added_date"] ?></div>
            </div>

            
        
        <!-- <button onclick="location.href='./repairComplete.php?id=<?= $row["repair_id"] ?> ';" id="btnComplete" class="btn"> <i class="s fas fa-check"></i></button> -->
    </div>

    <?php endwhile ?>


</div>
    