<?php session_start(); ?>

<header>
	<a href="index.php"><h2>New York Pizza</h2></a>
	<div class="account-details">
		<?php
			if(isset($_SESSION["userinfo"])) {
				echo "<h3>".$_SESSION["userinfo"]["name"]."</h3>";
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
		<?php
			if(isset($_SESSION["userinfo"])) { ?>
				<div class="account-profile">
					<h2>Naam: <?php echo $_SESSION["userinfo"]["name"] ?></h2>
					<div class="account-profile-photo">
						<i class="fa-solid fa-user"></i>
					</div>
				</div>
				
				<div class="account-buttons">
					<!-- <a href="loginreg.php"><button class="button">Inloggen</button></a> -->
					<button>Test1</button>
					<button>Test2</button>
					<button>Test3</button>
					<button>Test4</button>
				</div>
			<?php } else { ?>
				<div class="account-profile">
					<h2>Naam:</h2>
					<div class="account-profile-photo">
						<i class="fa-solid fa-user"></i>
					</div>
				</div>
				
				<h2 id="logged-in">Niet ingelogd</h2>
				<div class="account-buttons">
					<a href="loginreg.php"><button class="button">Inloggen</button></a>
				</div>
				<?php } ?>
		</div>
		
		

	<!-- Shopping Cart -->
	<div class="shopping-cart">
		<div class="items">
			<form action="" method="post">
				<?php
					if(isset($_SESSION["winkelwagen"])) {
						// Krijg alle id's en zet ze goed voor sql
						$arrayString = "";

						foreach($_SESSION["winkelwagen"] as $key => $value) {
							$arrayString .= $value["id"].",";
						}

						$arrayString = trim($arrayString, ",");
						
						$sql = "SELECT * FROM `menu` WHERE `id` IN ({$arrayString})";
						$stmt = $connect -> prepare($sql);
						$stmt -> execute();
						$result = $stmt -> fetchAll();
						
						foreach($result as $res) { 
							echo "<tr>";
							echo "<td>{$res['name']}</td>";
							echo "<td>{$res['price']}</td>";
							echo "</tr>";
						}
					}
				?>
			</form>
		</div>
		
	</div>
</header>