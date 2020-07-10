<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="clerk.css">
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.css' rel='stylesheet' />
    <title>Repairs</title>

</head>

<body>
    <header>
        <h1>Available Repairs</h1>
    </header>
    <div class="main">


        <div class="list-section">

            <div class="lists">

                <?php include "getAvailRepairs.php" ?>

                <!-- <div class="list">
                    <h2>Assigned</h2>
                    <div class="list-item" draggable="true">
                        <div class="address">Ambagagathote Rd - Bandaragama</div>
                        <div class="row1">
                            <span>#1000</span>
                            <span>2012-03-23</span>
                        </div>
                    </div> -->




            </div>
            
            <!-- <button style="margin-top: 10px;" onclick="AssignRepairs()">Assign</button> -->
        </div>

        <div id="map" class="map-section">
        </div>
    </div>


    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoibGFrc2hhbnM5OCIsImEiOiJja2J4aXc1ZGowMXlnMnlsbXN5bGNhczEwIn0.c7hzHhRTqXx4CycvscjHww';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [79.861489, 6.885039],
            zoom: 14
        });

        // var marke2 = new mapboxgl.Marker()
        //     .setLngLat([79.854770, 6.891551])
        //     .addTo(map);
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                mapdata = JSON.parse(this.responseText);
                // add markers to the map
                for (let i = 0; i < mapdata.length; i++) {
                    const mk = mapdata[i];
                    var marke2 = new mapboxgl.Marker({
                            color: "red"
                            // color: "#3FB1CE"
                        })
                        .setLngLat([mk.longitude, mk.lattitude])
                        .addTo(map);
                }
                // load list
            }
        };
        xmlhttp.open("GET", "getMapdata.php", true);
        xmlhttp.send();
    </script>
    <script src="app.js"></script>
</body>

</html>