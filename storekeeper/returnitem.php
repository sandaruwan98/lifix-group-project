<?php 

include_once  __DIR__ . '/../utils/classloader.php';
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
    <title>Return item Checking</title>

</head>

<style>

.field{
  display: none;
  width: 150px;
  margin: 0;
}

</style>
<body>
    <?php include "./views/nav.php" ?>

    
    <div class="main_content">
        <header>
            <h1>Return Item Checking</h1>
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
                                <td><button  class="bttn confirm" id="1" >confirm</button><input class="field declineInput" type="text" placeholder="Enter difference" ></td>
                                <td><button class="bttn button1 decline" id="emo"  >Decline</button></td>

                            </tr>
                            
                            <tr>
                                <td>2</td>
                                <td>SUNBOXES</td>
                                <td>2</td>
                                <td><button  class="bttn confirm" id="demo1" >confirm</button><input class="field declineInput" type="text" placeholder="Enter difference" ></td>
                                <td><button class="bttn button1 decline" id="emo1"  >Decline</button></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>WIRES</td>
                                <td>3m</td>
                                <td><button  class="bttn confirm"  id="demo3" >confirm</button><input class="field declineInput" type="text" placeholder="Enter difference" ></td>
                                <td><button class="bttn button1 decline" id="emo3" >Decline</button></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>FUSE</td>
                                <td>4</td>
                                <td><button  class="bttn confirm" id="demo4" >confirm</button><input class="field declineInput" type="text" placeholder="Enter difference" ></td>
                                <td><button class="bttn button1 decline" id="emo4" >Decline</button></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>BULB</td>
                                <td>3</td>
                                <td><button  class="bttn confirm">confirm</button><input class="field declineInput" type="text" placeholder="Enter difference" ></td>
                                <td><button class="bttn button1 decline">Decline</button></td>
                            </tr>
                            
                            

                        </tbody>


                    </table>
                 
                    </div>
                    
    
                </div>
     <script>
       var confirmBtns = document.querySelectorAll('.confirm');
       var declineBtns = document.querySelectorAll('.decline');
       var declineInputs = document.querySelectorAll('.declineInput');

        confirmBtns.forEach( (confirmbtn,index) => {

          confirmbtn.addEventListener('click',()=>{

            declinebtn = declineBtns[index];
          if (confirmbtn.style.visibility === 'hidden'  ) {
            confirmbtn.style.visibility = 'hidden';
          } else {
            declinebtn.style.visibility = 'hidden';
            confirmbtn.innerHTML = "Equal";
          }


          })

          
        } )

        declineBtns.forEach( (declinebtn,index) => {

          declinebtn.addEventListener('click',()=>{

            confirmbtn = confirmBtns[index];
            if (declinebtn.style.visibility === 'hidden' ) {
              declinebtn.style.visibility = 'hidden';
            } else {
              confirmbtn.style.display = 'none';
              declineInputs[index].style.display = 'block';
              declinebtn.innerHTML = "Fraud";
            }


          })

          
        } )


</script>
</body>
</html>