<?php 
	$page = 'sinhala.php';
	include "DbAccess.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Li - Fix</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
</head>
<body>
	<div class="container">
	<section>
		<a id="lan" class="floating-btn">සිං</a>
	</section>
		<div class="contact-box">
		
			<div class="left"></div>
			<div class="right">
				<h2>පැමිණිලි</h2>
				<form action="sinhala.php" method="POST" class="contact-us">
					<input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>" class="field" placeholder="<?php if($errors['name']) echo 'නිවැරදි නම යොදන්න'; else echo 'නම'; ?>">
					<input type="text" name="nic" value="<?php echo htmlspecialchars($nic) ?>" class="field" placeholder="<?php if($errors['nic']) echo 'නිවැරදි හැඳුනුම්පත් අංකය යොදන්න'; else echo 'හැඳුනුම්පත් අංකය'; ?>" >
					<div class="box">
						<div class="p-left">
							<input type="text" name="lampid" value="<?php echo htmlspecialchars($lampId) ?>" class="field" placeholder="<?php if($errors['lampid']) echo 'කණු අංකය යොදන්න'; else echo 'පහන් කණු අංකය'; ?>" >					
						</div>
						<div class="bulb">
							<span><label for="bulb">බල්බය තිබේද? </label><input class="checkmark" type="checkbox" name="bulb" id="bulb" value="yes"></span>
						</div>
					</div>
					<input type="text" name="note" value="<?php echo htmlspecialchars($note) ?>" class="field note" placeholder="දෝශය පිළිබඳව විස්තර">					
					<div class="box">
						<div class="p-left">
							<input type="text" name="phone" value="<?php echo htmlspecialchars($phoneNo) ?>" class="field" placeholder="<?php if($errors['phone']) echo 'දුරකථන අංකය යොදන්න'; else echo 'දුරකථන අංකය'; ?>" >					
						</div>
						<div class="p-right">
							<button class="btn2" style="font-size:14px; padding: 0.7rem 1rem;">කේතය ගන්න</button>
						</div>
					</div>
					<input type="text" name="otp" class="field" value="<?php echo htmlspecialchars($otpCode) ?>" placeholder="<?php if($errors['otp']) echo 'කේතය අත්‍යාවශ්‍ය වේ'; else echo 'කේතය'; ?>" >			
					<button name="submit" class="btn" id="submitBtn">පැමිණිලි කරන්න</button>
					
				</form>		
			</div>
		</div>
		
	</div>
	
	<script src="index.js"></script>
</body>
</html>