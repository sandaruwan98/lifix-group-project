<div class="p-list-section sc-bar">

<button id="btnAdd" class="btn">ADD NEW</button>
<!-- searchbox -->
<div class="searchbox-sm">
    <input id="search" type="text" placeholder="Search..." name="search" class="search"
        style="font-size: small;">
    <button class="btn-search"><i class="fas fa-search"></i></button>
</div>


<!-- repair list -->
<?php 
    $sa_list = $data['StockAdditionList'];

    while ($row = $sa_list->fetch_assoc()) :
?>
    <div id="<?= $row['sa_id'] ?>" class="repair-item">
        <div class="row">
            <span>#<?= $row['sa_id'] ?></span>
            <span><?= $row['date'] ?></span>
            <i class="s fas fa-check"></i>
        </div>
    </div>
<?php endwhile ?>


<<<<<<< HEAD
<?php include "../pagination.php" ?>
</div>
=======
<?php include "../components/pagination.php" ?>
</div>
>>>>>>> 08a157d0598b7cdb56ae21fb1bb910afb177cd79
