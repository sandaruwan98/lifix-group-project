<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/slider.css" />
    <link rel="stylesheet" href="./css/tech.css" />
    <script
      src="https://kit.fontawesome.com/2b554022ef.js"
      crossorigin="anonymous"
    ></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.js"></script>
    <link
      href="https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.css"
      rel="stylesheet"
    />

    <title>Map</title>
  </head>

  <body>

    
    <?php include './nav.html' ?>


    <div class="main">
      <div id="map" class="map"></div>
    </div>

    <!-- load map from mapbox api -->
    <script>

      mapboxgl.accessToken =
        "pk.eyJ1IjoibGFrc2hhbnM5OCIsImEiOiJja2J4aXc1ZGowMXlnMnlsbXN5bGNhczEwIn0.c7hzHhRTqXx4CycvscjHww";
      var map = new mapboxgl.Map({
        container: "map",
        style: "mapbox://styles/mapbox/streets-v11",
        center: [79.861489, 6.885039],
        zoom: 14,
      });

      var xmlhttp = new XMLHttpRequest();

      xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          mapdata = JSON.parse(this.responseText);
          // add markers to the map
          mapdata.forEach((mk) => {

            var popup = new mapboxgl.Popup()
              .setHTML("<h4>#" + mk.lp_id + "</h4>")
              .addTo(map);

            var marker = new mapboxgl.Marker({
              color: "#12bfeb"
            })
              .setLngLat([mk.longitude, mk.lattitude])
              .addTo(map)
              .setPopup(popup);
          });
        }
      };
      xmlhttp.open("GET", "./../Clerk/components/getMapdata.php", true);
      xmlhttp.send();
    </script>
  </body>
</html>
