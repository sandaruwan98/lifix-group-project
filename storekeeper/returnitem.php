<?php 

include_once '../utils/classloader.php';
$session = new classes\Session(StorekeeperFL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/slider.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="./style.css">
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
    <script src="script.js"></script>
    <script src="https://www.google.com/jsapi"></script>	
    <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
    <title>return items</title>

</head>
<body>
    <?php include "./views/nav.php" ?>

    
    <div class="main_content">
        <header>
            <h1>Return Items</h1>
        </header>
                
                    <div class="details">
                        <h2>Return  Details</h2>
    
                        <table class="content-table">
    
                            <tbody>
                                <tr>
                                    <td>Technician Name</td>
                                    <td>Alex</td>
                                </tr>
                                <tr>
                                    <td>Returned Date</td>
                                    <td>2020-10-14</td>
                                </tr>
                               
    
                            </tbody>
    
    
                        </table>
                    </div>

                    <!-- supply items -->
                    <div class="details">
                        <h2 style="margin-bottom: 8px;"> Returned Items</h2>
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>ITEM ID</th>
                                <th>ITEM NAME</th>
                                <th>QUANTITY</th>
                                <th></th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>LED BULB</td>
                                <td>1</td>
                                <td><button  class="bttn" id="demo" onclick="myFunction()">confirm</button></td>
                                <td><button class="bttn button1" id="emo" onclick="myFunction1()" >Decline</button></td>

                            </tr>
                            
                            <tr>
                                <td>2</td>
                                <td>SUNBOXES</td>
                                <td>2</td>
                                <td><button  class="bttn" id="demo1" onclick="myFunction2()">confirm</button></td>
                                <td><button class="bttn button1" id="emo1" onclick="myFunction22()" >Decline</button></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>WIRES</td>
                                <td>3m</td>
                                <td><button  class="bttn"  id="demo3" onclick="myFunction3()">confirm</button></td>
                                <td><button class="bttn button1" id="emo3" onclick="myFunction33()">Decline</button></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>FUSE</td>
                                <td>4</td>
                                <td><button  class="bttn" id="demo4" onclick="myFunction4()">confirm</button></td>
                                <td><button class="bttn button1" id="emo4" onclick="myFunction44()">Decline</button></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>BULB</td>
                                <td>3</td>
                                <td><button  class="bttn">confirm</button></td>
                                <td><button class="bttn button1">Decline</button></td>
                            </tr>
                            
                            

                        </tbody>


                    </table>
                 
                    </div>
                    
    
                </div>
     <script>
function myFunction() {
    x=document.getElementById("demo");
    y=document.getElementById("emo");
    if (x.style.visibility === 'hidden'  ) {
      x.style.visibility = 'hidden';
  } else {
    y.style.visibility = 'hidden';
    document.getElementById("demo").innerHTML = "Equal";
  }
}
function myFunction1() {
    x=document.getElementById("demo");
    y=document.getElementById("emo");
    if (y.style.visibility === 'hidden' ) {
      y.style.visibility = 'hidden';
  } else {
    x.style.visibility = 'hidden';
    document.getElementById("emo").innerHTML = "Fraud";
  }
}

function myFunction2() {
    x=document.getElementById("demo1");
    y=document.getElementById("emo1");
    if (x.style.visibility === 'hidden' ) {
      x.style.visibility = 'hidden';
  } else {
    y.style.visibility = 'hidden';
    document.getElementById("demo1").innerHTML = "Equal";
  }
}
function myFunction22() {
    x=document.getElementById("demo1");
    y=document.getElementById("emo1");
    if (y.style.visibility === 'hidden' ) {
      y.style.visibility = 'hidden';
  } else {
    x.style.visibility = 'hidden';
    document.getElementById("emo1").innerHTML = "Fraud";
  }
}

function myFunction3() {
    x=document.getElementById("demo3");
    y=document.getElementById("emo3");
    if (x.style.visibility === 'hidden' ) {
      x.style.visibility = 'hidden';
  } else {
    y.style.visibility = 'hidden';
    document.getElementById("demo3").innerHTML = "Equal";
  }
}
function myFunction33() {
    x=document.getElementById("demo3");
    y=document.getElementById("emo3");
    if (y.style.visibility === 'hidden' ) {
      y.style.visibility = 'hidden';
  } else {
    x.style.visibility = 'hidden';
    document.getElementById("emo3").innerHTML = "Fraud";
  }
}

function myFunction4() {
    x=document.getElementById("demo4");
    y=document.getElementById("emo4");
    if (x.style.visibility === 'hidden' ) {
      x.style.visibility = 'hidden';
  } else {
    y.style.visibility = 'hidden';
    document.getElementById("demo4").innerHTML = "Equal";
  }
}
function myFunction44() {
    x=document.getElementById("demo4");
    y=document.getElementById("emo4");
    if (y.style.visibility === 'hidden' ) {
      y.style.visibility = 'hidden';
  } else {
    x.style.visibility = 'hidden';
    document.getElementById("emo4").innerHTML = "Fraud";
  }
}
</script>
</body>
</html>