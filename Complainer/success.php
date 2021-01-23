<?php


include_once  __DIR__ . '/../utils/classloader.php';
$caa = new classes\ComplainAutoAssign();
$data = $caa->coordinates();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/success.css">
    <title>Li - Fix</title>
</head>
    <body>
    <script src="https://api.tiles.mapbox.com/mapbox.js/plugins/turf/v3.0.11/turf.min.js"></script>

        <div class="outer">
            <div class="middle">
                <div class="inner">
                    <img src="img/3.svg" alt="checkmark">
                    <h1><?php echo $_SESSION['h1'];?></h1>
                    <p><?php echo $_SESSION['p'];?></p>
                    <a href="<?php echo $_SESSION['page'];?>"><button class="btn"><?php echo $_SESSION['btn'];?></button></a>
                </div>
            </div>
        </div>

    <script>

        

        var point = turf.point(<?= $caa->getLampPostLngLat() ?>); 

        var sectionarr = <?=json_encode($data['techarr']) ?>;
        var dataarr = <?=json_encode($data['coords']) ?>;
            
        dataarr.every((data,index) => {
            var polygon = turf.polygon([data], { name: 'poly1'});

            


            var inside = turf.inside(point, polygon)
            // console.log(inside);
            // console.log(sectionarr[index]);
            
            if (inside) {
                // send section index to php
                var xmlhttp = new XMLHttpRequest();
                // xmlhttp.onreadystatechange = function() {
                //     if (this.readyState == 4 && this.status == 200) {console.log(this.responseText);}
                // };
                xmlhttp.open("GET", "./ajax/assignTechnition.php?id=" + sectionarr[index] , true);
                xmlhttp.send();
                
            }
            return !inside;

        });
       
        

        

    </script>

    </body>
</html>