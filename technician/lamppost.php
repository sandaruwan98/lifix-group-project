<?php 
include_once  __DIR__ . '/../utils/classloader.php';
$tech = new classes\Technician();
$data =  $tech->LamppostPage();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/slider.css">
    <link rel="stylesheet" href="./css/tech.css">
    <link rel="stylesheet" href="./css/request.css">
    <link rel="stylesheet" href="./css/complete.css">
    <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Add Lamp Post</title>
</head>

<body>


<?php include './nav.php' ?>

<?php  $tech->getSession()->showMessage() ?>

    <div class="main">
        <div class="con">


            <form method="POST" action="lamppost.php">
                <h2>Add Lamp Post</h2>
                <div class="feild-row">
                    <label for="lp_id">Lamp Post ID</label>
                    <input class="field" type="text" placeholder="#xxxx" name="lp_id" id="">

                </div>
                <div onclick="getLocation()" class="btn" style="text-align: center;">Get Location</div>
                <!-- <div class="feild-row">
                    <label for="lp_id">Road</label>
                    <input class="field" type="text" placeholder="" name="bulb" id="">

                </div> -->
                <div class="feild-row">
                    <label for="lp_id">Address</label>
                    <input class="field" type="text" placeholder="" disabled name="adr" id="adr">
                    <!-- hidden input for lat,lng -->
                    <input hidden type="text" placeholder=""  name="lat" id="lat">
                    <input hidden type="text" placeholder=""  name="lng" id="lng">

                </div>
                <!-- <div class="feild-row"> -->
                    <label for="is_new">Is it new : </label>
                    <input type="checkbox" name="is_new" value="is_new" id="newcheck" onclick="toggleCollapse()">
                <!-- </div> -->
              

                <!-- collapse -->
                <div class="collapse" style="display: none;margin-top: 5px;">
                        
                    <?php 
                    $item_names=$data['ItemData'];
                    foreach ($item_names as $item):
                    ?>
                    <div class="collapsible"><?= $item[1] ?></div>
                    <div class="content">
                        <input class="field" type="text" placeholder="Enter Used Amount" name="<?= $item[0] ?>_u" id="">
                    </div>
                    <?php endforeach ?>

                </div>
                <button type="submit" name="addlp" id="addlp" disabled class="btn disable">Add Lamp Post</button>


            </form>

        </div>
    </div>

    <script>
        const adrInput = document.querySelector('#adr');
        const latInput = document.querySelector('#lat');
        const lngInput = document.querySelector('#lng');
        const addlpButton = document.querySelector('#addlp');

      function getLocation() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition((position) => {
            let lat = position.coords.latitude;
            let lng = position.coords.longitude;
            // console.log(position.coords.longitude);
            latInput.value = lat;
            lngInput.value = lng;

            const url =
              "https://maps.googleapis.com/maps/api/geocode/json?latlng=" +
              lat +
              "," +
              lng +
              "&key=AIzaSyBs3xcz7WtgWjnoSMnJi4zBzGReOijrJrU";

            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function () {
              if (this.readyState == 4 && this.status == 200) {
                
                data = JSON.parse(this.responseText);
                adrInput.value = data.results[0].formatted_address
                adrInput.disabled = false
                addlpButton.disabled = false
                addlpButton.classList.remove('disable')
                // console.log(data.results[0].formatted_address);
                // console.log(data.results[1].formatted_address);
              }
            };
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
          });
        } else {
          document.body.innerHTML =
            "Geolocation is not supported by this browser.";
        }
      }
    </script>

    <script>
        //for collapse
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                } else {
                    content.style.maxHeight = "50px";
                }
            });
        }


        //for checkbox
        function toggleCollapse() {
       
            var checkBox = document.getElementById("newcheck");
            var collapse = document.querySelector('.collapse');

            if (checkBox.checked == true){
                collapse.style.display = "block";
            } else {
                collapse.style.display = "none";
            }
        }
    </script>
</body>

</html>