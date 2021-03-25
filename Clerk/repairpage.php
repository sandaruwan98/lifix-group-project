<?php
include_once  __DIR__ . '/../utils/classloader.php';
$clerck = new classes\Clerck();
$data =  $clerck->RepairPage();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/favicon-16x16.png">
	<link rel="manifest" href="../assets/favicon/site.webmanifest">
    <link rel="stylesheet" href="../css/slider.css">
    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="../css/clerk/clerk.css">
    <link rel="stylesheet" href="../css/clerk/repairpage.css">
    <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.css' rel='stylesheet' />
    <title>Repair</title>

</head>

<body>


    <?php
    include "./views/nav.php";

    $rp = $data['repair_details'];
    $cp = $data['complaint_details'];

    ?>
    <?php $clerck->getSession()->showMessage() ?>

    <div class="main_content">
        <header>
            <h1>Repair - <?= $rp['repair_id'] ?></h1>
        </header>
        <div class="main">

            <div class="list-section sc-bar">
                <div class="details repair-details">
                    <H2> Repair Details</H2>

                    <table class="content-table">

                        <tbody>
                            <tr>
                                <td>Repair ID</td>
                                <td><?= $rp['repair_id'] ?></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td><?php if ($rp['status'] == 'a') echo 'Pending';
                                    elseif ($rp['status'] == 'e') echo "Emergency Repair";
                                    elseif ($rp['status'] == 'x') echo "Assigned but not complted";
                                    else echo "Completed";  ?></td>
                            </tr>
                            <tr>
                                <td>Date</td>
                                <td><?= $rp['date'] ?></td>
                            </tr>
                            <tr>
                                <td>Is bulb there</td>
                                <td><?= $cp['is_bulb_there'] ?></td>
                            </tr>
                            <tr>
                                <td>Notes</td>
                                <td><?= $cp['Notes'] ?></td>
                            </tr>

                            <tr>
                                <td>Completed by</td>
                                <td><?= $rp['completed_by'] ?></td>
                            </tr>
                            <tr>
                                <td>Lamppost ID</td>
                                <td>#<?= $rp['lp_id'] ?></td>
                            </tr>
                            <tr>
                                <td>Lamp post Divisoin</td>
                                <td><?= $rp['division'] ?>
                                </td>
                            </tr>


                        </tbody>


                    </table>
                </div>
                <div class="details complainer-details">
                    <H2> Complainer Details</H2>
                    <table class="content-table">

                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td><?= $cp['Name'] ?></td>
                            </tr>

                            <tr>
                                <td>NIC</td>
                                <td><?= $cp['NIC'] ?></td>
                            </tr>
                            <tr>
                                <td>Phone No</td>
                                <td><?= $cp['phone_no'] ?></td>
                            </tr>



                        </tbody>


                    </table>
                </div>

                <div class="details complainer-details">
                    <H2> Used Item List</H2>
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>ITEM ID</th>
                                <th>ITEM NAME</th>
                                <th>QUANTITY</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $used_items = $data['used_items'];
                            foreach ($used_items as $used_item) :
                            ?>

                                <tr>
                                    <td><?= $used_item["item_id"]  ?></td>
                                    <td><?= $used_item["name"] ?></td>
                                    <td><?= $used_item["quantity"] ?></td>
                                </tr>

                            <?php endforeach ?>


                        </tbody>


                    </table>
                </div>
                <div class="details complainer-details">
                    <H2> Damaged return item List</H2>
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>ITEM ID</th>
                                <th>ITEM NAME</th>
                                <th>QUANTITY</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $return_items = $data['return_items'];
                            foreach ($return_items as $return_item) :
                            ?>

                                <tr>
                                    <td><?= $return_item["item_id"]  ?></td>
                                    <td><?= $return_item["name"] ?></td>
                                    <td><?= $return_item["quantity"] ?></td>
                                </tr>

                            <?php endforeach ?>




                        </tbody>


                    </table>
                </div>
            </div>

            <div id="map" class="map-section"></div>

        </div>
    </div>

    <!-- load map from mapbox api -->
    <script>
        let markerArr = new Map()



        mapboxgl.accessToken =
            'pk.eyJ1IjoibGFrc2hhbnM5OCIsImEiOiJja2J4aXc1ZGowMXlnMnlsbXN5bGNhczEwIn0.c7hzHhRTqXx4CycvscjHww';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [<?= $rp['longitude'] . ' , ' . $rp['lattitude']  ?>],
            zoom: 15
        });


        var marker = new mapboxgl.Marker({
                color: "blue"
            })
            .setLngLat([<?= $rp['longitude'] . ' , ' . $rp['lattitude']  ?>])
            .addTo(map);
    </script>
    <script src="./../js/clerck/app.js"></script>
</body>

</html>