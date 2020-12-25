
<?php 
include_once  __DIR__ . '/../utils/classloader.php';

$auth = new \classes\Authentication();
$auth->Loginuser();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Li - Fix</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../complainer/css/style.css">
    <link rel="stylesheet" href="auth.css">
    
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
</head>
<body>
	
<div class="toast-message">
    <span class="close"></span>
    <div class="message">
        This is an Alert! But these are some junks to see how alert looks in long messages.
    </div>
</div>

<script src="../js/toast.js"></script>


<?php $auth->getSession()->showMessage(); ?>


	<div class="container">
		
		<div class="contact-box">
			<div class="left"></div>
			<div class="right">
				<img src="../complainer/img/" alt="" srcset="">
				<h2>Login</h2>
				<form action="index.php" method="POST">
                    <h3>Welcome To The Li-Fix</h2>
                    <br>
                    <p>
                    Have a nice day !.
                    <br>
                    Enter the username and password to login to the system </p>


                    
                    <br>
                    <input type="text" name="username" value="" class="field" placeholder="UserName" id="f1" required>

                    <div id="middle-div"></div>

					<input type="password" name="password" value="" class="field" placeholder="Password" id="f2" required>
                    
                    <div id="last-div"></div>

                    <button type="submit" name="loginBtn" class="btn">Login</button>
                    <a  href="./register.php" class="btn">Register</a>
                    <a  href="./register.php" class="btn">fogot password</a>
                    <br>
                    <br>
				</form>		
			</div>
		</div>	
	</div>
</body>
</html>