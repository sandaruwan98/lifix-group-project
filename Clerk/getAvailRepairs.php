<?php

include "../connection.php";

$q = "SELECT repair.repair_id, repair.lp_id, lamppost.division , repair.date
FROM lamppost
INNER JOIN repair
ON lamppost.lpid=repair.lp_id WHERE repair.status='a'";

$list_avail =  $conn->query($q);


$q = "SELECT repair.repair_id, repair.lp_id, lamppost.division , repair.date
FROM lamppost
INNER JOIN repair
ON lamppost.lpid=repair.lp_id WHERE repair.status='s'";

$list_suggest =  $conn->query($q);

$q = "SELECT repair.repair_id, repair.lp_id, lamppost.division , repair.date
FROM lamppost
INNER JOIN repair
ON lamppost.lpid=repair.lp_id WHERE repair.status='x'";

$list_assign =  $conn->query($q);

?>

<div id="x" class="list">
    <h2>Assigned</h2>
    <?php
    if ($list_assign->num_rows > 0) {
        while ($row = $list_assign->fetch_assoc()) { ?>
            <div id="<?php echo $row["repair_id"] ?>" class="list-item" draggable="true">
                <div class="address"><?php echo $row["division"] ?></div>
                <div class="row1">
                    <span>#<?php echo $row["lp_id"] ?></span>
                    <span><?php echo $row["date"] ?></span>
                </div>
            </div>

    <?php
        }
    }
    ?>

</div>
<div id="s" class="list">
    <h2>Suggested</h2>
    <?php
    if ($list_suggest->num_rows > 0) {
        while ($row = $list_suggest->fetch_assoc()) { ?>
            <div id="<?php echo $row["repair_id"] ?>" class="list-item" draggable="true">
                <div class="address"><?php echo $row["division"] ?></div>
                <div class="row1">
                    <span>#<?php echo $row["lp_id"] ?></span>
                    <span><?php echo $row["date"] ?></span>
                </div>
            </div>

    <?php
        }
    }
    ?>
</div>

<div id="a" class="list">
    <h2>Other</h2>
    <?php
    if ($list_avail->num_rows > 0) {
        while ($row = $list_avail->fetch_assoc()) { ?>
            <div id="<?php echo $row["repair_id"] ?>" class="list-item" draggable="true">
                <div class="address"><?php echo $row["division"] ?></div>
                <div class="row1">
                    <span>#<?php echo $row["lp_id"] ?></span>
                    <span><?php echo $row["date"] ?></span>
                </div>
            </div>

    <?php
        }
    }
    ?>

</div>