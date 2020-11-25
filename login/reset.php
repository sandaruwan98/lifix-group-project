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
    <link rel="shortcut icon" href="../Complainer/img/1.jpg" type="image/x-icon">
    <link rel="stylesheet" href="res.css">
    <link rel="stylesheet" href="../Complainer/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@900&family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@900&family=Source+Sans+Pro&display=swap" rel="stylesheet"> -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css2?family=Fugaz+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet">
    
    <title>Welcome to Li-Fix</title>
</head>
<body>
<div class="container">
		
		<div class="contact-box">
			<div class="left"></div>
			<div class="right">
				<img src="../Complainer/img/" alt="" srcset="">
				<h2>Reset</h2>
				<form action="./reset.php" method="POST">
                    <!-- <h3>Welcome To The Li-Fix</h2>
                    <br>
                    <p>
                    Have a nice day !. -->
                    <br>
                    Enter a new password to reset the old password </p>


                    
                    
                    
                    <br>
                    <input type="text" placeholder="User Name" class="field" name="username" value="<?php echo $con->getSessionName();?>"  >
                       
                         
                        <input type="password" placeholder="Password" class="field" name="pass">
                        <div id="div-2"><?php echo $con->getdiv_2();?></div>
                        <input type="password" placeholder="Confirm Password" class="field" name="pass_com">
                        <div id="div-3"><?php echo $con->getdiv_3();?></div>

                    <button type="submit" name="loginBtn" class="btn">Reset</button>
                    <br>
                    <br>
				</form>		
			</div>
		</div>	
	</div>
</body>
</html>