<?php include_once("connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>New York Pizza | Inloggen/Registreren</title>
	</head>
	
	<body>
		<!-- Header -->
		<?php include_once("header.php") ?>

		<!-- Main -->
		<main class="flex">
			<!-- Login -->
			<div class="login">
				<div class="title">
					<h2>Inloggen</h2>
				</div>
				<form action="index.php" method="post">
					<div class="email">
						<label for="email">Email:</label>
						<input type="email" name="email" placeholder="bijv: johndoe@mail.com" />
					</div>

					<div class="password">
						<label for="password">Wachtwoord:</label>
						<input type="password" name="password" placeholder="wachtwoord" />
					</div>

					<div class="buttons">
						<input type="submit" name="login-button" class="button" value="Inloggen" />
						<button type="button" class="button toggle" data-toggle=".register .login">Registreren</button>
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
				<form action="index.php" method="post">
					<div class="container">
						<div class="left">
							<div class="name">
								<label for="full-name">Volledige naam:</label>
								<input type="text" name="full-name" placeholder="John Doe" />
							</div>
							
							<div class="shipping-info">
								<label for="street-num">Huisnummer:</label>
								<input type="text" name="street-num" placeholder="12" />
								<label for="postalcode">Postcode:</label>
								<input type="text" name="postalcode" placeholder="1234AB" />
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
						<button type="button" class="button toggle" data-toggle=".login .register">Inloggen</button>
						<input type="submit" name="register-button" class="button" value="Registreren" />
					</div>

					<div class="misc">
						<a href="contact.php">Contact</a>
					</div>
				</form>
		</main>

		<!-- Footer -->
		<?php include_once("footer.php") ?>

		<!-- Scripts -->
		<script src="js/main.js"></script>
	</body>
</html>
