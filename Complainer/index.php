<?php 
	$page = 'index.php';
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
				<form action="index.php" method="POST">
					<input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>" class="field" placeholder="<?php if($errors['name']) echo 'ඔබගේ නම අත්‍යාවශ්‍ය වේ'; else echo 'නම'; ?>">
					<input type="text" name="nic" value="<?php echo htmlspecialchars($nic) ?>" class="field" placeholder="<?php if($errors['nic']) echo 'හැදුනුම්පත් අංකය අත්‍යාවශ්‍ය වේ'; else echo 'හැඳුනුම්පත් අංකය'; ?>" >				
					<!-- <input type="text" name="lampid" value="<?php echo htmlspecialchars($lampId) ?>" class="field" placeholder="<?php if($errors['lampid']) echo 'පහන් කණු අත්‍යාවශ්‍ය වේ'; else echo 'පහන් කණු අංකය'; ?>" >	 -->
					<div class="phone-box">
						<div class="p-left">
							<input type="text" name="lampid" value="<?php echo htmlspecialchars($lampId) ?>" class="field" placeholder="<?php if($errors['lampid']) echo 'පහන් කණු අත්‍යාවශ්‍ය වේ'; else echo 'පහන් කණු අංකය'; ?>" >					
						</div>
						<div class="bulb">
							<span><label for="bulb">බල්බය තිබේද? </label><input class="checkmark" type="checkbox" name="bulb" id="bulb" value="yes" required></span>
						</div>
						
					</div>
					<input type="text" name="note" value="<?php echo htmlspecialchars($note) ?>" class="field note" placeholder="දෝශය පිළිබඳව විස්තර">					
					<div class="phone-box">
						<div class="p-left">
							<input type="text" name="phone" value="<?php echo htmlspecialchars($phoneNo) ?>" class="field" placeholder="<?php if($errors['phone']) echo 'දුරකථන අංකය අත්‍යාවශ්‍ය වේ'; else echo 'දුරකථන අංකය'; ?>" >					
						</div>
						<div class="p-right">
							<button class="btn2" style="font-size:14px; padding: 0.7rem 1rem;">කේතය ගන්න</button>
						</div>
					</div>
					<input type="text" name="otp" class="field" value="<?php echo htmlspecialchars($otpCode) ?>" placeholder="<?php if($errors['otp']) echo 'කේතය අත්‍යාවශ්‍ය වේ'; else echo 'කේතය'; ?>" >			
					<button name="submit" class="btn">පැමිණිලි කරන්න</button>
				</form>		
			</div>
		</div>
	</div>
	<script src="index.js"></script>
</body>
</html>