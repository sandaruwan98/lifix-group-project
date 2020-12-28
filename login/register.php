
<?php 
include_once  __DIR__ . '/../utils/classloader.php';

$auth = new \classes\Authentication();
$auth->Register();
$data = $auth->getRegData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../complainer/img/1.jpg" type="image/x-icon">
    <!-- <link rel="stylesheet" href="res.css"> -->
    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="../complainer/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
       <link href="https://fonts.googleapis.com/css2?family=Fugaz+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <title>Welcome to Li-Fix</title>
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
				<h2>Register</h2>
				<form action="./register.php" method="POST">
                   
                    <br>
                    

                    <input type="text" placeholder="UserName" class="field" name="username" value="<?= $data[0] ?>" required >
                    <input type="text" placeholder="Name" class="field" name="name" value="<?= $data[1] ?>" required>
                    <input type="text" placeholder="Phone Number" class="field" name="phone" value="<?= $data[2] ?>"  required>
                    <select name="role" id="userroll" class="field" required>
                        <option value="" disabled selected>Select the user roll</option>
                        <option value="5">Admin</option>
                        <option value="1">Divisional Secretary</option>
                        <option value="2">Clerk</option>
                        <option value="3">Storekeeper</option>
                        <option value="4">Technician</option>
                    </select>
                    <input type="password" placeholder="Password" class="field" name="pass" value="<?= $data[3] ?>"  required>
                    <input type="password" placeholder="Confirm Password" class="field" name="confirmpass" value="<?= $data[4] ?>" required>
                       
                         
                      

                    <button type="submit" class="btn" value="" name="register">Register</button>
                    <br>
                    <br>
				</form>		
			</div>
		</div>	
	</div>
</body>
</html>