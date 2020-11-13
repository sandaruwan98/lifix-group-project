
<?php
    include './AuthenticationController/AuthController.php';
    $a_con=new AuthController();

    $pass=$a_con->getPassTag();
    $usr=$a_con->getUsrTag();
    $wrn=$a_con->getWrongCredentials();

    if(isset($_POST['loginBtn'])){
        $a_con->loginUser($_POST['userName'],$_POST['password']);
    }
    
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Complainer/img/1.jpg" type="image/x-icon">
    <link rel="stylesheet" href="auth.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@900&family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@900&family=Source+Sans+Pro&display=swap" rel="stylesheet"> -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css2?family=Fugaz+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet">
    
    <title>Welcome to lifix</title>
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
                    <form action="index.php" method="post">
                        <h1 id="login-header">Login</h1>
                        <div id="wrong-div"><?php echo $a_con->getWrongCredentials();?></div>
                       
                        <br><br>
                        <input type="text" placeholder="User Name" class="field-1" name="userName" value="" >
                        <div id="middle-div"><?php echo $a_con->getUsrTag();?></div>
                        <input type="password" placeholder="Password" class="field-2" name="password" value="">
                        <div id="last-div"><?php echo $a_con->getPassTag();?></div>
                        <input type="submit" value="login" id="myButton" name="loginBtn">
                    </form>
                 </div> 
                 <div id="right-inner">

                 </div>   
            </div>
            
        </div>
    </div>
</body>
</html>