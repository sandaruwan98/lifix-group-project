<?php 
include_once '../utils/classloader.php';
$session = new classes\Session(CleckFL);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/slider.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="./css/clerk.css">
    <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.css' rel='stylesheet' />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Repairs</title>

</head>

<body>
   



<?php include "./views/nav.php" ?>

   
    <div class="main_content">
        <header>
            <h1>Available Repairs</h1>
        </header>
        <div class="main">

            <div class="list-section">
                <div class="lists">
                    <!-- load available repairlist from database -->
                    <?php include "./views/AvailRepairList.php" ?>
                </div>
                <!-- <button style="margin-top: 10px;" onclick="AssignRepairs()">Assign</button> -->
            </div>

            <div id="map" class="map-section"></div>

        </div>
    </div>

    <!-- load map from mapbox api -->
    <script>
        let markerArr = new Map()



        mapboxgl.accessToken = 'pk.eyJ1IjoibGFrc2hhbnM5OCIsImEiOiJja2J4aXc1ZGowMXlnMnlsbXN5bGNhczEwIn0.c7hzHhRTqXx4CycvscjHww';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [79.861489, 6.885039],
            zoom: 14
        });



        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                mapdata = JSON.parse(this.responseText);
                // add markers to the map
                mapdata.forEach(mk => {
                    //for popup to display lamppost id
                    var popup = new mapboxgl.Popup({closeButton: false})
                    .setHTML("<h2>#" + mk.lp_id + "</h2>")
                    .addTo(map);

                    var marker = new mapboxgl.Marker({
                            color: "black"
                            // color: "#3FB1CE"
                        })
                        .setLngLat([mk.longitude, mk.lattitude])
                        .addTo(map).setPopup(popup);;
                    markerArr.set(mk.repair_id, [mk.longitude, mk.lattitude]);
                });

            }
        };
        xmlhttp.open("GET", "./ajax/getMapdata.php", true);
        xmlhttp.send();
    </script>
    <script src="./../js/clerck/app.js"></script>
</body>

</html>