<?php
include './AuthenticationController/ResetController.php';
$con=new RestController();
if(isset($_POST['myButton'])){
    $con->resetUser($_POST['username'],$_POST['pass'],$_POST['pass_com']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../complainer/img/1.jpg" type="image/x-icon">
    <link rel="stylesheet" href="res.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@900&family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@900&family=Source+Sans+Pro&display=swap" rel="stylesheet"> -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css2?family=Fugaz+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet">
    
    <title>Welcome to Li-Fix</title>
</head>
<body>
    <div id="fist_div">
        <div id="common-div">
            <div id="outer-left">
                <h1 id="welcome-note">Welcome To The</h1>
                <h1 id="welcome-note2">Li-Fix</h1>
                <p id="par_id">Have a nice day!. You are going to enter in to the Li-Fix, the lamp post management system of the Baddegama Pradeshiya Sabha. This is the dashbord for the system.</p>
                <div id="left-viwew">
                    
                </div>
            </div>
            
            
            <div id="right-view">
                
                <div id="form-div"> 
                    <form action="./reset.php" method="post">
                        <h1 id="login-header">Reset</h1>
                        <div id="di-1"><p></p></div>
                       
                        <br><br>
                        <input type="text" placeholder="User Name" class="field-1" name="username" value="<?php echo $con->getSessionName();?>"  >
                       
                         
                        <input type="password" placeholder="<?php if($con->getdiv_2()) echo $con->getdiv_2(); else echo "Password"?>" class="field-2" name="pass">
                        <div id="div-2"><?php echo $con->getdiv_2();?></div>
                        <input type="password" placeholder="Confirm Password" class="field-3" name="pass_com">
                        <div id="div-3"><?php echo $con->getdiv_3();?></div>
                        <input type="submit" value="reset" id="myButton" name="myButton">
                    </form>
                 </div> 
                 <div id="right-inner">

                 </div>   
            </div>
            
        </div>
    </div>
</body>
</html>