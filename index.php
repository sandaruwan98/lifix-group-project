
<!DOCTYPE html>
<html>
<head>
	<title>Li - Fix</title>
	<link rel="stylesheet" type="text/css" href="./Complainer/style.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
</head>
<body>
	<div class="container">
		<section>
			<a id="lan" class="floating-btn">En</a>
		</section>
		<div class="contact-box">
			<div class="left"></div>
			<div class="right">
				<h2>Make a Complaint</h2>
				<form action="index.php" method="POST">
				<input type="text" name="name" value="" class="field" placeholder="Your Name" id="f1">
				<input type="text" name="nic" value="" class="field" placeholder="Your NIC" id="f2">
				<input type="text" name="lampid" value="" class="field" placeholder="Lamppost ID" id="f3">
				<input type="text" name="note" value="" class="field note" placeholder="Notes about the problem" id="f4">

				<div class="phone-box">
					<div class="p-left">
						<input type="text" name="phone" value="" class="field" placeholder="Phone" id="f5">
						<div class="error"></div>
					</div>
					<div class="p-right">
						<button class="btn2">Get Code</button>
					</div>
				</div>

				<input type="text" name="otp" class="field" value="" placeholder="OTP Code" id="f6">
				<div class="error"></div>
				<a href="./Authentication/" class="btn">auth</a>
				<a href="./clerk/" class="btn">clerk</a>
				<a href="./DivisionalSecretary/" class="btn">ds</a>
				<a href="./storekeeper/" class="btn">storekeeper</a>
				<a href="./technician/" class="btn">tech</a>
			</form>		
			</div>
		</div>
		
	</div>
	<script src="./Complainer/index.js"></script>
</body>
</html>