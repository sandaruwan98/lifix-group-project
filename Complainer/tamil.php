<?php 
	$greeting = 'நன்றி!';
	$msg = 'உங்கள் புகார் வெற்றிகரமாக பதிவு செய்யப்பட்டது.';
	$btnText = 'மற்றொரு புகாரைச் சமர்ப்பிக்கவும்';
	$page = 'tamil.php';
	include "DbAccess.php"; 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Li - Fix</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
</head>
<body>

	<div class="container">
	<section>
		<a id="lan" class="floating-btn">த</a>
	</section>

	<div class="contact-box">
			<div class="left"></div>
			<div class="right">
				<h2>முறைப்பாடு</h2>
				<form action="tamil.php" method="POST">
					<input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>" class="field <?php if($errors['name']) echo "err";?>" placeholder="<?php if($errors['name']) echo 'பெயர் சரியான பெயராக இருக்க வேண்டும்'; else echo 'உங்களது பெயர்'; ?>" id="f1">
					<input type="text" name="nic" value="<?php echo htmlspecialchars($nic) ?>" class="field <?php if($errors['nic']) echo "err";?>" placeholder="<?php if($errors['nic']) echo 'என்ஐசி செல்லுபடியாகும் என்ஐசி எண்ணாக இருக்க வேண்டும்'; else echo 'அடையாள அட்டை இல'; ?> " id="f2">
					<!-- <input type="text" name="lampid" value="<?php echo htmlspecialchars($lampId) ?>" class="field" placeholder="<?php if($errors['lampid']) echo 'சரியான அடையாள எண்ணாக இருக்க வேண்டும்'; else echo 'மின்விளக்கு கம்ப இல'; ?>" id="f3"> -->
					<div class="box">
						<div class="p-left">
							<input type="text" name="lampid" value="<?php echo htmlspecialchars($lampId) ?>" class="field <?php if($errors['lampid']) echo "err";?>" placeholder="<?php if($errors['lampid']) echo 'சரியான அடையாள எண்ணாக இருக்க வேண்டும்'; else echo 'மின்விளக்கு கம்ப இல'; ?>" >					
						</div>
						<div class="bulb">
							<span><label for="bulb">விளக்கை? </label><input class="checkmark" type="checkbox" name="bulb" id="bulb" value="yes"></span>
						</div>
					</div>
					<input type="text" name="note" value="<?php echo htmlspecialchars($note) ?>" class="field note" placeholder="பிரச்சனை குறிப்பு" id="f4">
					<div class="box">
						<div class="p-left">
							<input type="text" name="phone" value="<?php echo htmlspecialchars($phoneNo) ?>" class="field <?php if($errors['phone']) echo "err";?>" placeholder="<?php if($errors['phone']) echo 'சரியான எண்ணை உள்ளிடவும்'; else echo 'தொலைபேசி'; ?>" id="f5">
						</div>
						<div class="p-right">
							<button class="btn2">குறியீடு</button>
						</div>
					</div>
					<input type="text" name="otp" class="field <?php if($errors['otp']) echo "err";?>" value="<?php echo htmlspecialchars($otpCode) ?>" placeholder="<?php if($errors['otp']) echo 'OTP சரியான  இருக்க வேண்டும்'; else echo 'OTP குறியீடு'; ?>" id="f6">
					<button name="submit" class="btn">சமர்ப்பி</button>
				</form>
			</div>
		</div>
		
	</div>
	<script src="index.js"></script>
</body>
</html>