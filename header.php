<html>
	<head>
	<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet" />
		<script src="https://kit.fontawesome.com/02358b2fc2.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="css/main.css" />
</head>
<body>

<header>
	<a href="index.php"><h2>New York Pizza</h2></a>
	<div class="account-details">
		<!-- <h3 class="account-name">Account: niet ingelogd</h3> -->
		<?php
			if(isset($_POST["login-button"])) {
				echo "<h3>".$_POST["email"]."</h3>";
			} else {
				echo "<h3>Account</h3>";
			}
		?>

		<div class="account-icon toggle" title="Account" data-toggle=".account-box">
			<i class="fa-solid fa-user"></i>
		</div>

		<h3 id="cart-text">Winkelwagen</h3>
		<div class="cart toggle" title="Winkelwagen" data-toggle=".shopping-cart">
			<i class="fa-solid fa-cart-shopping"></i>
		</div>
	</div>

	<!-- Account Box -->
	<div class="account-box">
		<div class="account-profile">
			<h2>Naam:</h2>
			<div class="account-profile-photo">
				<i class="fa-solid fa-user"></i>
				<!-- <img src="img/unknown-user.png" alt="Unknown user" /> -->
			</div>
		</div>
		<h2 id="logged-in">Niet ingelogd</h2>
		<div class="account-buttons">
			<a href="loginreg.php"><button class="button">Inloggen</button></a>
		</div>
	</div>

	<!-- Shopping Cart -->
	<div class="shopping-cart">
		
	</div>
</header>
</body>
</html>