<?php include_once("connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>New York Pizza | Home</title>
	</head>

	<body>
		<!-- Header -->
		<?php include_once("header.php") ?>

		<!-- Main -->
		<main class="long">
			<?php
				if(isset($_POST["login-button"])) {
					echo "<h2>Login Info</h2>";
					echo "<h3>".$_POST["email"]."</h3>";
					echo "<h3>".$_POST["password"]."</h3>";
				}

				if(isset($_POST["register-button"])) {
					echo "<h2>Register Info</h2>";
					echo "<h3>".$_POST["full-name"]."</h3>";
					echo "<h3>".$_POST["street-num"]."</h3>";
					echo "<h3>".$_POST["postalcode"]."</h3>";
					echo "<h3>".$_POST["email"]."</h3>";
					echo "<h3>".$_POST["password"]."</h3>";
					echo "<h3>".$_POST["password-repeat"]."</h3>";
				}
			?>

			<h3>Main</h3>
			<div class="items">
				<?php
						$items = 40;
						for ($i=0; $i < $items ; $i++) { 
							include("item.php");
						}
					?>
			</div>
		</main>

		<!-- Footer -->
		<?php include_once("footer.php") ?>

		<!-- Scripts -->
		<script src="js/main.js"></script>
	</body>
</html>