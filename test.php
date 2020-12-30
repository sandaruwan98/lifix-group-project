<?php 

$maxpages = 10;
$page_no=$_GET["id"];
$page_arr=[$page_no-2,$page_no-1,$page_no,$page_no+1,$page_no+2];
print_r($page_arr);
?>

<style>
    body{
        background-color: #0e7d8b;
    }
    .link {
        padding: 10px 15px;
        background: transparent;
        border:#bccfd8 1px solid;
        cursor:
        pointer;
        color:#bccfd8
    }
    .disabled {
        cursor:not-allowed;
        color: #bccfd8;
    }
    .current {background: #bccfd8;color: #0e7d8b;}
    .first{border-left:#bccfd8 1px solid;}
    .pagination{padding-top: 30px;}
    
    .dot {
        padding: 10px 15px; 
        color: #bccfd8; 
        font-size: x-large;
        background: transparent;
    }
   </style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="pagination">
    <?php 
        // first
        if ($page_no<4) {   ?>
            
                <a class="link first" href="<?= $_SERVER["PHP_SELF"]."?id=0" ?>" >&lt;&lt;</a>
                <a class="link disabled" href="<?= ($page_no > 0) ? $_SERVER["PHP_SELF"]."?id=" . ($page_no+1) : $_SERVER["PHP_SELF"]."?id=" . ($page_no) ?>"   >&lt;</a>
                <?php foreach ($page_arr as $i) :
                    $class= $i==$page_no ? "current" : ""; ?>
                    <a class="link <?= $class?>" href="<?= $_SERVER["PHP_SELF"]."?id=" . $i ?>" ><?= $i ?></a>
                <?php endforeach ?>

                <span class="dot">...</span>
                <a class="link" href="<?= $_SERVER["PHP_SELF"]."?id=" . ($page_no+1) ?>" >&gt;</a>
                <a class="link" href="<?= $_SERVER["PHP_SELF"]."?id=" . $maxpages ?>" >&gt;&gt;</a>
            

        
        <?php 
        //  last
        }elseif ($page_no>$maxpages-3) {?>

        <a class="link  first" href="<?= $_SERVER["PHP_SELF"]."?id=0" ?>" >&lt;&lt;</a>
        <a class="link " href="<?= $_SERVER["PHP_SELF"]."?id=" . ($page_no-1) ?>" >&lt;</a>
        <span class="dot">...</span>
       
        <?php foreach ($page_arr as $i) :
            $class= $i==$page_no ? "current" : ""; ?>
            <a class="link <?= $class?>" href="<?= $_SERVER["PHP_SELF"]."?id=" . $i ?>" ><?= $i ?></a>
        <?php endforeach ?>

        <a class="link" href="<?= ($page_no < $maxpages) ? $_SERVER["PHP_SELF"]."?id=" . ($page_no+1) : $_SERVER["PHP_SELF"]."?id=" . ($page_no) ?>" >&gt;</a>
        <a class="link" href="<?= $_SERVER["PHP_SELF"]."?id=" . $maxpages ?>" >&gt;&gt;</a>


        <?php
        // mid
        }else { ?>

        <a class="link  first" href="<?= $_SERVER["PHP_SELF"]."?id=0" ?>" >&lt;&lt;</a>
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
</body>
</html>
