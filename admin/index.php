<?php
include_once  __DIR__ . '/../utils/classloader.php';
$admin = new classes\Admin();
$data =  $admin->SectionAssign();
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Show drawn polygon area</title>
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/favicon-16x16.png">
	<link rel="manifest" href="../assets/favicon/site.webmanifest">
    <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://api.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/slider.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/clerk/clerk.css">

</head>

<body>

    <style>
        .map-section {
            position: relative;
        }

        #map {
            height: 100%;
            width: 100%;
        }

        .mapboxgl-ctrl-group button {
            width: 49px;
            height: 39px;
        }

        .calculation-box {
            height: 150px;
            width: 300px;
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 15px;
            text-align: center;
        }

        p {
            font-family: 'Open Sans';
            margin: 0;
            font-size: 13px;
        }

        #delete {
            background-color: red;
        }


        .disabled-button {
            -webkit-filter: opacity(.3) drop-shadow(0 0 0 #FFF);
            filter: opacity(.3) drop-shadow(0 0 0 #FFF);
            cursor: default !important;
        }
    </style>

    <script src="https://api.tiles.mapbox.com/mapbox.js/plugins/turf/v3.0.11/turf.min.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.2.0/mapbox-gl-draw.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.2.0/mapbox-gl-draw.css" type="text/css" />



    <?php include "./views/nav.php" ?>

    <?php  $admin->getSession()->showMessage() ?>

    <div class="main_content">
        <header>
            <h1>Assign Sections</h1>
        </header>
        <div class="main">

            <div class="list-section" style="min-width: 300px;">

                <div class="tech-section">
                    <?php foreach ($data['technicians'] as  $tech) { ?>
                        <div id="<?= $tech["userId"] ?>" class="radio" onclick="techListClick(this.id)">
                            <input id="<?= "input" . $tech["userId"] ?>" type="radio" name="radio">
                            <label for="<?= "input" . $tech["userId"] ?>" class="tech-item"> <span>ID- <?= $tech["userId"] ?> </span> <span>Name: <?= $tech["Name"] ?> </span> <input id="<?= "color-display" . $tech["userId"] ?>" type="color" value="<?= $data["color"][$tech["userId"]] ?>" name="" id="1" disabled> </label>
                        </div>
                    <?php } ?>

                </div>


            </div>
            <div class="map-section">
                <div id="map"></div>
                <div class="calculation-box">
                    <span>select color</span> <input type="color" name="" id="colorselect">
                    <button id="delete" class="btn">Delete</button>
                    <button id="add" class="btn">Add</button>
                    <div id="calculated-area"></div>
                </div>

            </div>

        </div>
    </div>







    <script>
        var has_section = false;
        var tech_id = 0;
        var drawData = null;
        var color = '#000000';
        var feateredata = null;
        var techs_who_have_section = [];
        const addBtn = document.querySelector('#add');
        const deleteBtn = document.querySelector('#delete');
        const colorSelect = document.querySelector('#colorselect');



        deleteBtn.disabled = true;
        addBtn.disabled = true;
        //map-------------------------------------
        mapboxgl.accessToken = 'pk.eyJ1IjoibGFrc2hhbnM5OCIsImEiOiJja2J4aXc1ZGowMXlnMnlsbXN5bGNhczEwIn0.c7hzHhRTqXx4CycvscjHww';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [79.861489, 6.885039],
            zoom: 12
        });


        var draw = new MapboxDraw({
            displayControlsDefault: false,
            controls: {
                polygon: true,
                trash: true
            }
        });
        map.addControl(draw);

        map.on('draw.create', updateArea);
        map.on('draw.update', updateArea);
        map.on('draw.delete', onDelete);

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                feateredata = JSON.parse(this.responseText)
                console.log(feateredata);
                map.on('load', function() {
                    feateredata.forEach(feature => {

                        Add_section_to_map(feature.tech_id, feature.coords, feature.color)
                    });

                });



            }
        };
        xmlhttp.open("GET", "./ajax/getMapSectionData.php", true);
        xmlhttp.send();

        function Add_section_to_map(id, coords, color) {

            techs_who_have_section.push(id);
            var fea = {
                'type': 'geojson',
                'data': {
                    'type': 'Feature',
                    'geometry': {
                        'type': 'Polygon',
                        'coordinates': [coords]
                    }
                }
            }


            map.addSource(id, fea);

            map.addLayer({
                'id': id,
                'type': 'fill',
                'source': id,
                'layout': {},
                'paint': {
                    'fill-color': color,
                    'fill-opacity': 0.6
                }
            });

        }

        function updateArea(e) {
            var data = draw.getAll();

            if (data.features.length == 1) {
                var drawPolygon = document.getElementsByClassName('mapbox-gl-draw_polygon');
                drawData = data.features[0].geometry.coordinates;
                console.log(JSON.stringify(drawData));
                drawPolygon[0].disabled = true;
                drawPolygon[0].classList.add('disabled-button');


            }

        }

        function onDelete(e) {
            var data = draw.getAll();

            if (data.features.length == 0) {
                var drawPolygon = document.getElementsByClassName('mapbox-gl-draw_polygon');

                drawPolygon[0].disabled = false;
                drawPolygon[0].classList.remove('disabled-button');
            }

        }
        //----------------------------------------------------

        function setAddButtonActive(state) {
            deleteBtn.disabled = state;
            addBtn.disabled = !state;
            if (state) {
                deleteBtn.classList.add('disabled-button');
                addBtn.classList.remove('disabled-button');
            } else {
                deleteBtn.classList.remove('disabled-button');
                addBtn.classList.add('disabled-button');
            }
        }

        function techListClick(id) {

            // e.preventDefault();
            tech_id = id;
            drawData = null
            if (techs_who_have_section.indexOf(tech_id) != -1) {
                setAddButtonActive(false);
            } else {
                setAddButtonActive(true);
            }


        }


        addBtn.addEventListener('click', () => {
            console.log("add");
            if (drawData != null) {
                //diasble add btn and enable delete btn
                setAddButtonActive(false)

                //set color of tech list
                const colorDisplay = document.querySelector('#color-display' + tech_id);
                colorDisplay.value = color;


                console.log(techs_who_have_section);
                //send data to backend
                $.post("./ajax/saveNewSection.php", {
                        id: tech_id,
                        coords: drawData,
                        color: color
                    })
                    .done((data) => {
                        console.log("recived" + data);
                    });
                Add_section_to_map(tech_id, drawData[0], color)
            }
        })


        deleteBtn.addEventListener('click', () => {
            // console.log("del");
            //diasble delete btn and add btn



            setAddButtonActive(true)
            //set color of tech list
            const colorDisplay = document.querySelector('#color-display' + tech_id);
            colorDisplay.value = '#e8edee'

            // delete techs_who_have_section item
            var index = techs_who_have_section.indexOf(tech_id)
            techs_who_have_section[index] = techs_who_have_section[0];
            techs_who_have_section.shift()

            map.removeLayer(tech_id);
            map.removeSource(tech_id);

            //send data to backend
            $.get("./ajax/deleteSection.php?id=" + tech_id)
                .done((data) => {
                    console.log("recived" + data);
                });


        })

        colorSelect.addEventListener('change', () => {
            color = colorSelect.value;
        })
    </script>

</body>

</html>