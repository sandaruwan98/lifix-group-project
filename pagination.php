<?php

use classes\Pagination;

require './classes/Pagination.php';

$maxpages = 8;

$p = new Pagination(3,$maxpages);

$page_no=$_GET["id"];
$page_arr=$p->getpageArr($page_no);
print_r($page_arr);
?>



    <div class="pagination">
    <?php 
        // first
        if ($page_no<4) {   ?>
            
                <a class="link first" href="<?= $_SERVER["PHP_SELF"]."?id=1" ?>" >&lt;&lt;</a>
                <a class="link disabled" href="<?= ($page_no > 1) ? $_SERVER["PHP_SELF"]."?id=" . ($page_no-1) : $_SERVER["PHP_SELF"]."?id=" . ($page_no) ?>"   >&lt;</a>
                <?php foreach ($page_arr as $i) :
                    $class= $i==$page_no ? "current" : ""; ?>
                    <a class="link <?= $class?>" href="<?= $_SERVER["PHP_SELF"]."?id=" . $i ?>" ><?= $i ?></a>
                <?php endforeach ?>

                
                <?= ($maxpages>5) ? '<span class="dot">...</span>' : '' ;?>
                <a class="link" href="<?= ($page_no < $maxpages) ? $_SERVER["PHP_SELF"]."?id=" . ($page_no+1) : $_SERVER["PHP_SELF"]."?id=" . ($page_no) ?>" >&gt;</a>
                <a class="link" href="<?= $_SERVER["PHP_SELF"]."?id=" . $maxpages ?>" >&gt;&gt;</a>
            

        
        <?php 
        //  last
        }elseif ($page_no>$maxpages-3) {?>

        <a class="link  first" href="<?= $_SERVER["PHP_SELF"]."?id=1" ?>" >&lt;&lt;</a>
        <a class="link " href="<?= $_SERVER["PHP_SELF"]."?id=" . ($page_no-1) ?>" >&lt;</a>
        <?= ($maxpages>5) ? '<span class="dot">...</span>' : '' ;?>
       
        <?php foreach ($page_arr as $i) :
            $class= $i==$page_no ? "current" : ""; ?>
            <a class="link <?= $class?>" href="<?= $_SERVER["PHP_SELF"]."?id=" . $i ?>" ><?= $i ?></a>
        <?php endforeach ?>

        <a class="link" href="<?= ($page_no < $maxpages) ? $_SERVER["PHP_SELF"]."?id=" . ($page_no+1) : $_SERVER["PHP_SELF"]."?id=" . ($page_no) ?>" >&gt;</a>
        <a class="link" href="<?= $_SERVER["PHP_SELF"]."?id=" . $maxpages ?>" >&gt;&gt;</a>


        <?php
        // mid
        }else { ?>

        <a class="link  first" href="<?= $_SERVER["PHP_SELF"]."?id=1" ?>" >&lt;&lt;</a>
        <a class="link "  href="<?= $_SERVER["PHP_SELF"]."?id=" . ($page_no-1) ?>" >&lt;</a>
        <span class="dot">...</span>
       
       
        <?php foreach ($page_arr as $i) :
            $class= $i==$page_no ? "current" : ""; ?>
            <a class="link <?= $class?>" href="<?= $_SERVER["PHP_SELF"]."?id=" . $i ?>" ><?= $i ?></a>
        <?php endforeach ?>
       
       
        <span class="dot">...</span>
        <a class="link" href="<?= $_SERVER["PHP_SELF"]."?id=" . ($page_no+1) ?>" >&gt;</a>
        <a class="link" href="<?= $_SERVER["PHP_SELF"]."?id=" . $maxpages ?>" >&gt;&gt;</a>




        <?php } ?>
    </div>
    <div class="pagination">
      
    </div>
