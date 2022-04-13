<?php 
include_once("php/connect.php"); 
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet" />
		<script src="https://kit.fontawesome.com/02358b2fc2.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="css/main.css" />

		<title>New York Pizza | Inloggen/Registreren</title>
	</head>
	
	<body>
		<!-- Header -->
		<?php include_once("includes/header.php") ?>

		<!-- Main -->
		<main class="flex">
			<!-- Login -->
			<div class="login">
				<div class="title">
					<h2>Inloggen</h2>
				</div>
				<form action="php/login.php" method="post">
					<div class="email">
						<label for="email">Email:</label>
						<input type="email" name="email" placeholder="bijv: johndoe@mail.com" required />
					</div>

					<div class="password">
						<label for="password">Wachtwoord:</label>
						<input type="password" name="password" placeholder="wachtwoord" required />
						<!-- <input type="submit" name="hol" placeholder="wachtwoord" /> -->
					</div>

					<div class="buttons">
						<input type="submit" name="loginButton" class="button" value="Inloggen" />
						<button class="button toggle" data-toggle=".register .login">Registreren</button>
					</div>

					<div class="misc">
						<a href="">Wachtwoord vergeten?</a>
						<a href="contact.php">Contact</a>
					</div>
				</form>
			</div>

			<!-- Register -->
			<div class="register">
				<div class="title">
					<h2>Registreren</h2>
				</div>
				<form action="php/register.php" method="post">
					<div class="container">
						<div class="left">
							<div class="name">
								<label for="full-name">Volledige naam:</label>
								<input type="text" name="name" placeholder="John Doe" />
							</div>
							
							<div class="shipping-info">
								<label for="postalcode">Postcode:</label>
								<input type="text" name="postalcode" placeholder="1234AB" />
								<label for="street-num">Huisnummer:</label>
								<input type="text" name="streetnum" id="testing" placeholder="12" />
							</div>
						</div>

						<div class="right">
							<div class="email">
								<label for="email">Email:</label>
								<input type="email" name="email" placeholder="bijv: johndoe@mail.com" />
							</div>
		
							<div class="password">
								<label for="password">Wachtwoord:</label>
								<input type="password" name="password" placeholder="wachtwoord" />
								<label for="password-repeat">Wachtwoord herhalen:</label>
								<input type="password" name="password-repeat" placeholder="wachtwoord" />
							</div>
						</div>
					</div>

					<div class="buttons">
						<button class="button toggle" data-toggle=".login .register">Inloggen</button>
						<input type="submit" name="register-button" class="button" value="Registreren"/>
					</div>

					<div class="misc">
						<a href="contact.php">Contact</a>
					</div>
				</form>
		</main>

		<!-- Footer -->
		<?php include_once("includes/footer.php") ?>

		<!-- Scripts -->
		<script src="js/main.js"></script>
	</body>
</html>
