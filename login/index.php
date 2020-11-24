
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
<html>
<head>
    <title>Li - Fix</title>
    
    <link rel="stylesheet" type="text/css" href="../Complainer/css/style.css">
    <link rel="stylesheet" href="auth.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
</head>
<body>
	
	<div class="container">
		
		<div class="contact-box">
			<div class="left"></div>
			<div class="right">
				<img src="../Complainer/img/" alt="" srcset="">
				<h2>Login</h2>
				<form action="index.php" method="POST">
                    <h3>Welcome To The Li-Fix</h2>
                    <br>
                    <p>
                    Have a nice day !.
                    <br>
                    Enter username and password to login to the system </p>


                    <div id="wrong-div"><?php echo $a_con->getWrongCredentials();?></div>
                    
                    
                    <br>
                    <input type="text" name="userName" value="" class="field <?php if ($a_con->getUsrTag() != "Username") echo "err";?>" placeholder="<?php echo $a_con->getUsrTag();?>" id="f1">

                    <div id="middle-div"></div>

					<input type="password" name="password" value="" class="field <?php if ($a_con->getPassTag() != "Password") echo "err";?>" placeholder="<?php echo $a_con->getPassTag();?>" id="f2">
                    
                    <div id="last-div"></div>

                    <button type="submit" name="loginBtn" class="btn">Login</button>
                    <br>
                    <br>
				</form>		
			</div>
		</div>	
	</div>
</body>
</html>