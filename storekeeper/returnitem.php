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
    <link rel="stylesheet" href="../css/st/style.css">
    
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
    <script src="script.js"></script>
    <script src="https://www.google.com/jsapi"></script>	
    <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>
    <title>Return item Checking</title>

</head>

<style>

.field{
  /* display: none; */
  width: 30%;
    margin: 0 auto;
    background-color: #ffffffb5;
}
.label{
  /* display: none; */
  width: 30%;
    margin: 0 auto;
}
.t-row{
  display: flex;
  align-items: center;
  width: 95%;
    padding: 10px;
    padding-bottom: 10px;
    margin-bottom: 5px;
    margin: 0 auto;
}
.t-btn{
  width: 30%;
  margin: 0 auto;

}
.dInput{
 width: 90%;
}

.content-table th, .content-table td {
    padding: 6px 15px;
}

.main-btn{
  box-sizing:border-box;
  height:60px;
  width: 90%;
  margin: 0 5% 20px 5%; 
  font-size:1.7em ;
  background-color:#009879;
}

</style>
<body>
    <?php include "./views/nav.php" ?>

    <?php  $storekeeper->getSession()->showMessage() ?>
    <div class="main_content">
        <header>
            <h1>Return Item Checking</h1>
        </header>
        
        
        
        <!-- -----------------select technician  part-->
        <form action="returnitem.php" method="post">
          <div class="t-row">
              <div class="label"><h2>Select technician</h2></div>

              <select name="techSelectoption" id="techSelectoption" class="field" >
                <option value="" disabled="" >Select the technician</option>
                <?php $technicians = $data['technicians'];
                    while($tech = $technicians->fetch_assoc()) :?>
                      <option value= "<?= $tech['userId'] ?>" ><?= $tech['Name'] ?></option>
                      <?php endwhile ?>
              </select>
              <button name="techselect" type="submit"  class="btn t-btn">Click</button>
              
          </div>
          </form>


          <?php if(isset($_SESSION["techid"])): ?>

          <div class="details">
              <h2>Return  Details</h2>

              <table class="content-table">

                  <tbody>
                      <tr>
                          <td>Technician Name</td>
                          <td><?= $data['techname'] ?></td>
                      </tr>
                      <tr>
                          <td>Returned Date</td>
                          <td><?= date('yy-m-d')  ?></td>
                      </tr>
                      

                  </tbody>


              </table>
          </div>


          <form action="returnitem.php" method="post">


        
          <!-- supply items -->
          <div class="details">
          <button type="submit" name="done" class="btn main-btn" id="emo"  >Complete Damage Check</button>

          <h2 style="margin-bottom: 8px;"> Returned Items</h2>
          <table class="content-table">
              <thead>
                  <tr>
                      <th>ITEM ID</th>
                      <th>ITEM NAME</th>
                      <th>QUANTITY</th>
                      <th></th>
                      <th></th>
                      <th></th>

                  </tr>
              </thead>
              <tbody>
                  
              <?php 
                $items = $data['items'];
               
                foreach ($items as $item): ?>
                    <tr>
                      <td><?= $item[0] ?></td>
                      <td><?= $item[1] ?></td>
                      <td><?= $item[2] ?></td>
                      <td><input name="diff_<?= $item[0] ?>" class="field dInput diff" type="text" placeholder="Enter difference" disabled></td>
                      <td><input name="notes_<?= $item[0] ?>" class="field dInput notes" type="text" placeholder="Notes" disabled></td>
                      <td><button type="button" id="dec_<?= $item[0] ?>" class="bttn button1 decline" id="emo"  >Decline</button></td>

                  </tr>
                <?php endforeach ?>




                
                
                  

              </tbody>


          </table>
        
          </div>
          </form>
          <?php endif ?>
      </div>
     <script>
       var declineBtns = document.querySelectorAll('.decline');
       var diffInputs = document.querySelectorAll('.diff');
       var noteInputs = document.querySelectorAll('.notes');


       declineBtns.forEach( (declinebtn,index) => {

          declinebtn.addEventListener('click',()=>{

            diffInput = diffInputs[index];
            noteInput = noteInputs[index];
            diffInput.disabled = false;
            noteInput.disabled = false;

          })

          
        } )


</script>
</body>
</html>