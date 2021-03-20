<div id="x" class="list sc-bar">
    <h2>Assigned</h2>
    <select name="techSelect" id="techSelect" class="field" >
        <option value="" disabled="" >Select the technician</option>
        <?php
              $technicians = $data['technicians'];

              while($tech = $technicians->fetch_assoc()) :?>
              
                <option <?php  if($_SESSION["tid"]==$tech['userId']) echo 'selected'; ?> value= "<?= $tech['userId'] ?>" ><?= $tech['Name'] ?></option>

        <?php endwhile ?>
    </select>

    <?php
   
    
   $list_assign = $data['assignedrepairs'];

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


<div id="a" class="list sc-bar">
    <h2>Other</h2>
    <?php

    $list_avail = $data['availablerepairs'];

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