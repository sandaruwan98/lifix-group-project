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
            <button style="margin-top: 10px;" onclick="AssignRepairs()">Assign</button>
        </div>

        <div id="map" class="map-section">
        </div>
    </div>
    <script>
        function AssignRepairs() {
            const lists = document.querySelectorAll('.list');
            const assign_list = lists[0].children;
            const sug_list = lists[1].children;
            const normal_list = lists[2].children;


            // save assign  list
            var ids = [];
            for (let i = 1; i < assign_list.length; i++) {
                ids.push(assign_list[i].getAttribute("id"));
            }
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "saveAssignedData.php", true);
            // xhr.onreadystatechange = function() {
            //     if (xhr.readyState == 4 && xhr.status == 200) {
            //         console.log("Done. ", xhr.responseText);
            //     }
            // }
            let data = new FormData();
            data.append('data', JSON.stringify(ids));
            data.append('st', "x");
            xhr.send(data);



            // save normal list
            var ids1 = [];
            for (let i = 1; i < normal_list.length; i++) {
                ids1.push(normal_list[i].getAttribute("id"));
            }

            var xhr1 = new XMLHttpRequest();
            xhr1.open("POST", "saveAssignedData.php", true);

            let data1 = new FormData();
            data1.append('data', JSON.stringify(ids1));
            data1.append('st', "a");
            xhr1.send(data1);




            // save suggested list
            var ids2 = [];
            for (let i = 1; i < sug_list.length; i++) {
                ids2.push(sug_list[i].getAttribute("id"));
            }

            var xhr2 = new XMLHttpRequest();
            xhr2.open("POST", "saveAssignedData.php", true);

            let data2 = new FormData();
            data2.append('data', JSON.stringify(ids2));
            data2.append('st', "s");
            xhr2.send(data2);



        }
    </script>
    <!-- 
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

        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                mapdata = JSON.parse(this.responseText);
                // add markers to the map
                for (let i = 0; i < mapdata.length; i++) {
                    const mk = mapdata[i];
                    var marke2 = new mapboxgl.Marker()
                        .setLngLat([mk.longitude, mk.lattitude])
                        .addTo(map);
                }
                // load list
            }
        };
        xmlhttp.open("GET", "getMapdata.php", true);
        xmlhttp.send();
    </script> -->
    <script src="app.js"></script>
</body>

</html>