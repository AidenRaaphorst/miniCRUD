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

		<title>New York Pizza | Home</title>
	</head>

	<body>
		<!-- Header -->
		<?php include_once("includes/header.php") ?>

		<!-- Main -->
		<main class="long">
			<!-- <?php
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
				} ?> -->

			<h2>Pizza's</h2>
			<div class="items">
				<?php
					// $sql = "SELECT * FROM menu WHERE category = 'pizza'";
					$sql = "SELECT * FROM menu";
					$stmt = $connect -> prepare($sql);
					$stmt -> execute();
					$result = $stmt -> fetchAll();

					foreach($result as $res) {
						if($res["amount"] <= 0) {
							continue;
						}
				?>

				<div class="item-box">
					<div class="item-name">
						<h3><?php echo $res["name"]; ?></h3>
					</div>
					<div class="item-img">
						<img src="img/<?php echo $res["imagelink"]; ?>">
					</div>
					<div class="item-desc">
						<p>€<?php echo $res["price"] ?></p>
						<a href="php/addToCart.php?id=<?php echo $res["id"]; ?>"><button>Kopen</button></a>
					</div>
				</div>
				
				<?php } ?>

			</div>
		</main>

		<!-- Footer -->
		<?php include_once("includes/footer.php") ?>

		<!-- Scripts -->
		<script src="js/main.js"></script>
	</body>
</html>