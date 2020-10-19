<?php 
$page = 'tamil.php';
include "DbAccess.php"; 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Li - Fix</title>
	<link rel="stylesheet" type="text/css" href="style.css">
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
				<input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>" class="field" placeholder="உங்களது பெயர்" id="f1">
				<div class="error"><?php echo $errors['name']; ?></div>
				<input type="text" name="nic" value="<?php echo htmlspecialchars($nic) ?>" class="field" placeholder="அடையாள அட்டை இல " id="f2">
				<div class="error"><?php echo $errors['nic']; ?></div>
				<input type="text" name="lampid" value="<?php echo htmlspecialchars($lampId) ?>" class="field" placeholder="மின்விளக்கு கம்ப இல" id="f3">
				<input type="text" name="note" value="<?php echo htmlspecialchars($note) ?>" class="field note" placeholder="பிரச்சனை குறிப்பு" id="f4">
				<div class="error"><?php echo $errors['lampid']; ?></div>

				<div class="phone-box">
					<div class="p-left">
						<input type="text" name="phone" value="<?php echo htmlspecialchars($phoneNo) ?>" class="field" placeholder="தொலைபேசி " id="f5">
						<div class="error"><?php echo $errors['phone']; ?></div>
					</div>
					<div class="p-right">
						<button class="btn2">இரகசிய குறியீடு</button>
					</div>
				</div>

				<input type="text" name="otp" class="field" value="<?php echo htmlspecialchars($otpCode) ?>" placeholder="OTP குறியீடு" id="f6">
				<div class="error"><?php echo $errors['otp']; ?></div>
				<button name="submit" class="btn">SUBMIT</button>
			</form>		
			</div>
		</div>
		
	</div>
	<script src="index.js"></script>
</body>
</html>