<?php
$p = $data['pagination'];
$maxpages = $p->getMax();
$page_no = $p->getPageNo();
$page_arr = $p->getpageArr();
?>



<div class="pagination">
    <?php
    // first
    if ($page_no < 4) {   ?>

        <a class="link first" href="<?= $_SERVER["PHP_SELF"] . "?p=1" ?>">&lt;&lt;</a>
        <a class="link disabled" href="<?= ($page_no > 1) ? $_SERVER["PHP_SELF"] . "?p=" . ($page_no - 1) : $_SERVER["PHP_SELF"] . "?p=" . ($page_no) ?>">&lt;</a>
        <?php foreach ($page_arr as $i) :
            $class = $i == $page_no ? "current" : ""; ?>
            <a class="link <?= $class ?>" href="<?= $_SERVER["PHP_SELF"] . "?p=" . $i ?>"><?= $i ?></a>
        <?php endforeach ?>


        <?= ($maxpages > 5) ? '<span class="dot">...</span>' : ''; ?>
        <a class="link" href="<?= ($page_no < $maxpages) ? $_SERVER["PHP_SELF"] . "?p=" . ($page_no + 1) : $_SERVER["PHP_SELF"] . "?p=" . ($page_no) ?>">&gt;</a>
        <a class="link" href="<?= $_SERVER["PHP_SELF"] . "?p=" . $maxpages ?>">&gt;&gt;</a>



    <?php
        //  last
    } elseif ($page_no > $maxpages - 3) { ?>

        <a class="link  first" href="<?= $_SERVER["PHP_SELF"] . "?p=1" ?>">&lt;&lt;</a>
        <a class="link " href="<?= $_SERVER["PHP_SELF"] . "?p=" . ($page_no - 1) ?>">&lt;</a>
        <?= ($maxpages > 5) ? '<span class="dot">...</span>' : ''; ?>

        <?php foreach ($page_arr as $i) :
            $class = $i == $page_no ? "current" : ""; ?>
            <a class="link <?= $class ?>" href="<?= $_SERVER["PHP_SELF"] . "?p=" . $i ?>"><?= $i ?></a>
        <?php endforeach ?>

        <a class="link" href="<?= ($page_no < $maxpages) ? $_SERVER["PHP_SELF"] . "?p=" . ($page_no + 1) : $_SERVER["PHP_SELF"] . "?p=" . ($page_no) ?>">&gt;</a>
        <a class="link" href="<?= $_SERVER["PHP_SELF"] . "?p=" . $maxpages ?>">&gt;&gt;</a>


    <?php
        // mid
    } else { ?>

        <a class="link  first" href="<?= $_SERVER["PHP_SELF"] . "?p=1" ?>">&lt;&lt;</a>
        <a class="link " href="<?= $_SERVER["PHP_SELF"] . "?p=" . ($page_no - 1) ?>">&lt;</a>
        <span class="dot">...</span>


        <?php foreach ($page_arr as $i) :
            $class = $i == $page_no ? "current" : ""; ?>
            <a class="link <?= $class ?>" href="<?= $_SERVER["PHP_SELF"] . "?p=" . $i ?>"><?= $i ?></a>
        <?php endforeach ?>


        <span class="dot">...</span>
        <a class="link" href="<?= $_SERVER["PHP_SELF"] . "?p=" . ($page_no + 1) ?>">&gt;</a>
        <a class="link" href="<?= $_SERVER["PHP_SELF"] . "?p=" . $maxpages ?>">&gt;&gt;</a>




    <?php } ?>
</div>
<div class="pagination">

</div>