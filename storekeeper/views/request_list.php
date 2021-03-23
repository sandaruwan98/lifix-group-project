<div class="p-list-section sc-bar">


    <div class="xx">
        <h2>Request List</h2>
    </div>

    <!-- searchbox -->
    <div class="searchbox-sm">
        <input id="search" type="text" placeholder="Search..." name="search" class="search" style="font-size: small;">
        <button class="btn-search"><i class="fas fa-search"></i></button>
    </div>


    <!-- repair list -->
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lifix";
    $port = "3306";

    $mysqli = new mysqli($servername, $username, $password, $dbname, $port);

    $query = "SELECT supplied_date,username,itemrequest_id,added_date FROM itemrequest INNER JOIN user ON itemrequest.created_by=user.userid WHERE itemrequest.status='c'";
    if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) { ?>
            <div id="" class="repair-item">

                <div id="<?= $row['itemrequest_id'] ?>" class="repair-item" onclick="location.href='<?= "./detail.php?id=" . $row['itemrequest_id']  ?>' ;">

                    <div class="row1"><span>#<?= $row["itemrequest_id"] ?></span>
                        <span><?= $row["supplied_date"] ?></span>
                    </div>
                </div>
            </div>

    <?php }

        $result->free();
    } ?>


</div>