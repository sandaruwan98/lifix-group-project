<div class="p-list-section sc-bar">

    <button id="btnAdd" class="btn">ADD NEW</button>
    <!-- searchbox -->
    <form action="purchase.php" method="post">

        <div class="searchbox-sm">
            <input name="searchbox" id="search" type="text" placeholder="Search..." name="search" class="search" style="font-size: small;">
            <button name="search" class="btn-search"><i class="fas fa-search"></i></button>
        </div>
        <?php if( isset($_SESSION["psearch"]) ): ?>

        <div class="sdisplay">
            <p>Search Results for "<?= $_SESSION["psearch"] ?>"</p>
            <button name="clearsearch" type="submit" class="btn btn-search "><i class="fas fa-times"> Clear Search</i></button>

        </div>
        <?php endif ?>

    </form>

    <!-- repair list -->
    <?php
    $sa_list = $data['StockAdditionList'];

    while ($row = $sa_list->fetch_assoc()) :
    ?>
        <div id="<?= $row['sa_id'] ?>" class="repair-item">
            <div class="row">
            <div>
                <span>#<?= $row['sa_id'] ?></span>
                <span><?= $row['Name'] ?></span>
            </div>
            <div>
                <span><?= $row['date'] ?></span>
                <i class="s fas fa-check"></i>
            </div>
            </div>
        </div>
    <?php endwhile ?>


    <?php include "../components/pagination.php" ?>
</div>