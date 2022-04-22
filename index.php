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
			<div class="title-search">
				<h2>Menu</h2>
				<form class="search" action="index.php" method="get">
					<input type="text" name="search" placeholder="Zoek iets?">
					<button type="submit">Zoeken</button>
				</form>
			</div>

			<!-- Pizzas -->
			<div class="pizzas">
				<h3 class="category">Pizza's</h3>
				<div class="items">
					<?php
						if(isset($_GET["search"])) {
							$search = "%".$_GET['search']."%";
							$sql = "SELECT * FROM menu WHERE category = 'Pizza' AND name LIKE :search";
							$stmt = $connect -> prepare($sql);
							$stmt -> bindParam(":search", $search);
						} else {
							$sql = "SELECT * FROM menu WHERE category = 'Pizza'";
							$stmt = $connect -> prepare($sql);
						}
	
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
							<!-- <img src="img/<?php echo $res["imagelink"]; ?>"> -->
							<img src="<?php echo $res["imagelink"]; ?>">
						</div>
						<div class="item-desc">
							<p>€<?php echo $res["price"] ?></p>
							<a href="php/addToCart.php?id=<?php echo $res["id"]; ?>"><button>Kopen</button></a>
						</div>
					</div>
					
					<?php } ?>
	
				</div>
			</div>

			<!-- Drinken -->
			<div class="drinken">
				<h3 class="category">Drinken</h3>
				<div class="items">
					<?php
						if(isset($_GET["search"])) {
							$search = "%".$_GET['search']."%";
							$sql = "SELECT * FROM menu WHERE category = 'Drinken' AND name LIKE :search";
							$stmt = $connect -> prepare($sql);
							$stmt -> bindParam(":search", $search);
						} else {
							$sql = "SELECT * FROM menu WHERE category = 'Drinken'";
							$stmt = $connect -> prepare($sql);
						}
	
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
							<!-- <img src="img/<?php echo $res["imagelink"]; ?>"> -->
							<img src="<?php echo $res["imagelink"]; ?>">
						</div>
						<div class="item-desc">
							<p>€<?php echo $res["price"] ?></p>
							<a href="php/addToCart.php?id=<?php echo $res["id"]; ?>"><button>Kopen</button></a>
						</div>
					</div>
					
					<?php } ?>
	
				</div>
			</div>

			<!-- Eten -->
			<div class="eten">
				<h3 class="category">Eten</h3>
				<div class="items">
					<?php
						if(isset($_GET["search"])) {
							$search = "%".$_GET['search']."%";
							$sql = "SELECT * FROM menu WHERE category = 'Eten' AND name LIKE :search";
							$stmt = $connect -> prepare($sql);
							$stmt -> bindParam(":search", $search);
						} else {
							$sql = "SELECT * FROM menu WHERE category = 'Eten'";
							$stmt = $connect -> prepare($sql);
						}
	
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
							<img src="<?php echo $res["imagelink"]; ?>">
						</div>
						<div class="item-desc">
							<p>€<?php echo $res["price"] ?></p>
							<a href="php/addToCart.php?id=<?php echo $res["id"]; ?>"><button>Kopen</button></a>
						</div>
					</div>
					
					<?php } ?>
	
				</div>
			</div>
		</main>

		<!-- Footer -->
		<?php include_once("includes/footer.php") ?>

		<!-- Scripts -->
		<script src="js/main.js"></script>
	</body>
</html>