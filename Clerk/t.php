<?php 
include_once  __DIR__ . '/../utils/classloader.php';
$clerck = new classes\Clerck();
$data =  $clerck->SectionAssign();
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Show drawn polygon area</title>
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
<script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://api.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.js"></script>
<link href="https://api.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.css" rel="stylesheet" />
<link rel="stylesheet" href="../css/slider.css">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="./css/clerk.css">

</head>
<body>

<style>
    .map-section{
        position: relative;
    }
    #map{
        height: 100%;
        width: 100%;
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


    
    .disabled-button {
    -webkit-filter: opacity(.3) drop-shadow(0 0 0 #FFF);
    filter: opacity(.3) drop-shadow(0 0 0 #FFF);
    cursor: default !important;
    }
</style>

<script src="https://api.tiles.mapbox.com/mapbox.js/plugins/turf/v3.0.11/turf.min.js"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.2.0/mapbox-gl-draw.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.2.0/mapbox-gl-draw.css" type="text/css"/>



<?php include "./views/nav.php" ?>

   
    <div class="main_content">
        <header>
            <h1>Assign Sections</h1>
        </header>
        <div class="main">

            <div class="list-section" style="min-width: 300px;">
               
                    <div class="tech-section">
                        <?php foreach ($data['technicians'] as  $tech) { ?>
                            <div id="<?= $tech["userId"] ?>" class="radio" onclick="tech_id=this.id">
                                <input id="<?= "input".$tech["userId"] ?>" type="radio"  name="radio"> 
                                <label for="<?= "input".$tech["userId"] ?>"  class="tech-item"> <span>ID- <?= $tech["userId"] ?> </span>  <span>Name: <?= $tech["Name"] ?> </span>  <input type="color" value="#ff0000" name="" id="1" disabled> </label>
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
    
    var tech_id = 0;
    var drawData = null;
    var color = '#000000'; 
    const addBtn = document.querySelector('#add');
    const deleteBtn = document.querySelector('#delete');
    const colorSelect = document.querySelector('#colorselect');
   
    mapboxgl.accessToken = 'pk.eyJ1IjoibGFrc2hhbnM5OCIsImEiOiJja2J4aXc1ZGowMXlnMnlsbXN5bGNhczEwIn0.c7hzHhRTqXx4CycvscjHww';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [79.861489, 6.885039],
            zoom: 14
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
    map.on('draw.delete', onDelete);
   // map.on('draw.update', updateArea);
  
    

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

    addBtn.addEventListener('click',()=>{
        console.log(tech_id);
        $.post( "./ajax/saveNewSection.php", {id:tech_id,coords:drawData,color:color})
        .done((data)=>{console.log("recived" + data);});
    })
    deleteBtn.addEventListener('click',()=>{
        console.log(tech_id);
        $.get( "./ajax/deteteSection.php?id="+tech_id)
        .done((data)=>{console.log("recived" + data);});
    })

    colorSelect.addEventListener('change',()=>{color = colorSelect.value;})

    var feateredata = {
            'type': 'geojson',
            'data': 
            {
                'type': 'Feature',
                'geometry': 
                    {
                        'type': 'Polygon',
                        'coordinates': [[
                            [79.84822483549044,6.910831874933763],
                            [79.87118673431127,6.921241070475986],
                            [79.8773585741672,6.914718879850213],
                            [79.87702675482046,6.895217651947021],
                            [79.8765622077342,6.888629217769434],
                            [79.85698486625415,6.878812281080769],
                            [79.84822483549044,6.910831874933763]
                        ]]
                    }
            }
            }



    map.on('load', function () {

        if (feateredata != null) {
            
        
            map.addSource('maine',feateredata );

            map.addLayer({
                'id': 'maine',
                'type': 'fill',
                'source': 'maine',
                'layout': {},
                'paint': {
                    'fill-color': '#088',
                    'fill-opacity': 0.6
                }
            });


    }
    });
</script>

</body>
</html>