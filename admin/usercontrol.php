<?php 
require_once __DIR__ . '/../classes/Session.php';
include_once  __DIR__ . '/../utils/classloader.php';

$admin = new \classes\Admin();
$data = $admin->UserControl();

?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Control</title>
        <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="../css/slider.css">
        <link rel="stylesheet" href="../css/ds/style.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        
    <?php 
        include "./views/nav.php";
      

        
    ?>

<?php  $admin->getSession()->showMessage() ?>

<div class="hidden" id="my-popup">
    <p>some msg</p>
</div>

<div class="container">
    <h1>User Control</h1>
    <div class="row">
        <div class="column1">
            <div class="card">
                <h2>Add Role</h2>
                    <form action="usercontrol.php" method="POST" >
                    <select name="useracc" id="useracc1" class="field" required>
                        <option value="" disabled selected>Select the user Account</option>

                        <?php foreach ($data as $row) : ?>
                           
                        <option value="<?=$row['userId'] ?>"><?=$row['username'] ?></option>
                        <?php endforeach ?>

                    </select>

                        <select name="userroll" id="userroll1" class="field" required>
                            <option value="" disabled selected>Select the user roll</option>
                            <option value="5">Admin</option>
                            <option value="1">Divisional Secretary</option>
                            <option value="2">Clerk</option>
                            <option value="3">Storekeeper</option>
                            <option value="4">Technician</option>
                        </select>

                        <div class="con1 role-container"></div>

                        <!-- <input type="text" name="name" id="name" class="field" placeholder="Enter the name" required> -->

                        <!-- <input type="email" name="email" id="email" class="field" placeholder="Enter the Email Address" required> -->

                        <!-- <input type="password" name="password2" id="password2" class="field" placeholder="Re-enter the Password" required> -->
                        

                        <!-- <button name="submit" class="btn b0">CREATE</button> -->
                        <input type="submit" name="add" value="ADD" class="btn b0">
                            

                    </form>
            </div>
        </div>
     
        <div class="column2">
            <div class="card">
                <h2>Remove Role</h2>
                    <form action="usercontrol.php" method="POST" id="my-form">

                    <select name="useracc" id="useracc2" class="field" required>
                        <option value="" disabled selected>Select the user Account</option>

                        <?php foreach ($data as $row) : ?>
                        <option value="<?=$row['userId'] ?>"><?=$row['username'] ?></option>
                        <?php endforeach ?>

                    </select>

                        <select name="userroll" id="userroll2" class="field" required>
                            <option value="" disabled selected>Select the user roll</option>
                            <option value="5">Admin</option>
                            <option value="1">Divisional Secretary</option>
                            <option value="2">Clerk</option>
                            <option value="3">Storekeeper</option>
                            <option value="4">Technician</option>
                        </select>



                        <div class="con2 role-container"></div>

                        <input type="submit" name="remove" value="REMOVE" class="btn b0">
                            

                    </form>
            </div>
        </div>
     
        <div class="column3">
            <div class="card">
                <h2>Revoke Access</h2>
                <form action="usercontrol.php" method="POST">
                    <select name="useracc" id="useracc3" class="field" required>
                        <option value="" disabled selected>Select the user Account</option>
                        <?php foreach ($data as $row) : ?>
                        <option value="<?=$row['userId'] ?>"><?=$row['username'] ?></option>
                        <?php endforeach ?>
                    </select>

                    <input type="submit" name="revoke" value="REVOKE" class="btn b2">

                </form>
            </div>
        </div>
    </div>


</div>
<script>
var userselect = document.querySelector('#useracc1');
userselect.addEventListener("change", function () {
    $.get("./ajax/getActiveroles.php?accid=" + this.value, function (data, status) {
      if (status == "success") {
          var con = $('.con1');
          con.html('');
          var roles = JSON.parse(data);
          rolearr = [' ','Divisional Secretary','Clerk', 'Storekeeper', 'Technician' ,'Admin'];
          roles.forEach(role => {
              
              var span = $('<span />').html(rolearr[ role[0] ]);
            con.append(span);
          });
      }
    });
});
var userselect = document.querySelector('#useracc2');
userselect.addEventListener("change", function () {
    $.get("./ajax/getActiveroles.php?accid=" + this.value, function (data, status) {
      if (status == "success") {
          var con = $('.con2');
          con.html('');
          var roles = JSON.parse(data);
          rolearr = [' ','Divisional Secretary','Clerk', 'Storekeeper', 'Technician' ,'Admin'];
          roles.forEach(role => {
              
              var span = $('<span />').html(rolearr[ role[0] ]);
            con.append(span);
          });
      }
    });
});


</script>

<!-- <script src="ds.js"></script> -->
</body>
</html>