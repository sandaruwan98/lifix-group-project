<?php

require __DIR__ . '/../../classes/Repair.php';
require __DIR__ . '/../../classes/User.php';
session_start();
$repair = new Repair();

$list_avail = $repair->getUnassignedRepairs();

$user = new User();
$technicians = $user->getUsers(4);
// echo $_SESSION["tid"];
?>


<div id="x" class="list">
    <h2>Assigned</h2>
    <select name="techSelect" id="techSelect" class="field" >
        <option value="" disabled="" >Select the technician</option>
        <?php
               
              while($tech = $technicians->fetch_assoc()) :?>
              
                <option <?php if(!isset($_SESSION["tid"])){echo 'selected';$_SESSION["tid"]=$tech['userId']; }else{  if($_SESSION["tid"]==$tech['userId']) echo 'selected' ;} ?> value= "<?= $tech['userId'] ?>" ><?= $tech['Name'] ?></option>

        <?php endwhile ?>
    </select>

    <?php
   
    $list_assign = $repair->getAssignedRepairs($_SESSION["tid"]);
    
    if ($list_assign->num_rows > 0) {
        while ($row = $list_assign->fetch_assoc()) { ?>
            <div id="<?= $row["repair_id"] ?>" class="list-item" draggable="true">
                <div class="address"><?= $row["division"] ?></div>
                <div class="row1">
                    <span>#<?= $row["lp_id"] ?></span>
                    <span><?= $row["date"] ?></span>
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