<?php 
include_once  __DIR__ . '/../utils/classloader.php';
$storekeeper = new classes\StoreKeeper();
$data =  $storekeeper->ReturnItem();
// echo( $data['QData'] );
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
                            
                        <?php 
                         
                          foreach ($data as $item): ?>
                              <tr>
                                <td><?= $item[0] ?></td>
                                <td><?= $item[1] ?></td>
                                <td><?= $item[2] ?></td>
                                <td><button  class="bttn confirm" id="con-<?= $item[0] ?>" >confirm</button><input class="field declineInput" type="text" placeholder="Enter difference" ></td>
                                <td><button id="dec-<?= $item[0] ?>" class="bttn button1 decline" id="emo"  >Decline</button></td>

                            </tr>
                          <?php endforeach ?>




                          
                          
                            

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