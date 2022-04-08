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

		<title>New York Pizza | Admin</title>
	</head>

	<body>
		<!-- Header -->
		<?php include_once("includes/header.php") ?>

		<!-- Check if user is admin -->
		<?php
			if(!$_SESSION["userinfo"]["admin"] == 1) {
				header("Location: loginreg.php");
			}
		?>

		<!-- Main -->
		<main class="long">
			<div class="admin-panel">
				<div class="panel">
					<!-- Sorting Options -->
					<form action="admin.php" method="post">
						<label for="sort-by">Sort by: </label>
						<select name="sort-by">
							<option value="id">ID</option>
							<option value="name">Name</option>
							<option value="price">Price</option>
							<option value="category">Category</option>
							<option value="amount">Amount</option>
						</select>
						<br>
						<input type="radio" id="asc" name="asc-desc" value="ASC" checked>
						<label for="asc">Ascending</label>
						<br>
						<input type="radio" id="desc" name="asc-desc" value="DESC">
						<label for="desc">Descending</label>
						<br>

						<input type="submit" class="button" name="sort" value="Go" />
					</form>

					<br><br><br>

					<!-- Create, Update and Delete items -->
					<?php 
						if(isset($_GET["id"])) {
							// Delete items
							if(isset($_GET["delete"])) {
								if($_GET["delete"] == "true") {
									$sql = "DELETE FROM menu 
											WHERE id = :id";
									$stmt = $connect -> prepare($sql);
									$stmt -> bindParam(":id", $_GET["id"]);
									$stmt -> execute();

									header("Location: admin.php");
								}
							} else{
								// Update items
								$sql = "SELECT * 
										FROM menu 
										WHERE id = :id";
								$stmt = $connect -> prepare($sql);
								$stmt -> bindParam(":id", $_GET["id"]);
								$stmt -> execute();
								$result = $stmt -> fetchAll();

								foreach($result as $res) { ?>
									<form action="php/sendtodb.php" method="post">
										<table>
											<tr>
												<td><p>ID:</p></td>
												<td><input type="text" name="id" value="<?php echo $res["id"] ?>" placeholder="12, laat leeg voor automatisch"></td>
											</tr>
											<tr>
												<td><p>Naam:</p></td>
												<td><input type="text" name="name" value="<?php echo $res["name"] ?>" placeholder="Cola"></td>
											</tr>
											<tr>
												<td><p>Prijs</p></td>
												<td><input type="text" name="price" value="<?php echo $res["price"] ?>" placeholder="1.99">	</td>
											</tr>
											<tr>
												<td><p>Categorie:</p></td>
												<td><input type="text" name="category" value="<?php echo $res["category"] ?>" placeholder="Drinken"></td>
											</tr>
											<tr>
												<td><p>Hoeveelheid:</p></td>
												<td><input type="text" name="amount" value="<?php echo $res["amount"] ?>" placeholder="123"></td>
											</tr>
											<tr>
												<td><p>Foto:</p></td>
												<td><input type="file" name="photo" accept=".png, .jpg, .jpeg"></td>
											</tr>
										</table>

										<input type="submit" class="button" name="update" value="Veranderen" />
									</form>
								<?php 
								}
							}} else {
							// Create items 
						?>
							<form action="php/sendtodb.php" method="post">
								<table>
									<tr>
										<td><p>ID:</p></td>
										<td><input type="text" name="id" placeholder="12, laat leeg voor automatisch"></td>
									</tr>
									<tr>
										<td><p>Naam:</p></td>
										<td><input type="text" name="name" placeholder="Cola"></td>
									</tr>
									<tr>
										<td><p>Prijs</p></td>
										<td><input type="text" name="price" placeholder="1.99">	</td>
									</tr>
									<tr>
										<td><p>Categorie:</p></td>
										<td><input type="text" name="category" placeholder="Drinken"></td>
									</tr>
									<tr>
										<td><p>Hoeveelheid:</p></td>
										<td><input type="text" name="amount" placeholder="123"></td>
									</tr>
									<tr>
										<td><p>Foto:</p></td>
										<td><input type="file" name="photo" accept=".png, .jpg, .jpeg"></td>
									</tr>
								</table>

								<input type="submit" class="button" name="create" value="Toevoegen" />
							</form>
						<?php } ?>
				</div>

				<!-- Database -->
				<div class="database">
					<table>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Price</th>
							<th>Category</th>
							<th>Amount</th>
							<th>Image Link</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>

						<?php
							if(isset($_POST["sort"])) {
								$sql = "SELECT * FROM menu ORDER BY {$_POST['sort-by']} {$_POST['asc-desc']}";
								// $sql = "SELECT * FROM menu ORDER BY :sortby asc";
								// $stmt = $connect -> prepare($sql);

								// $stmt->bindParam(":sortby", $_POST["sort-by"]);
								// $stmt->bindParam(":ascdesc", $_POST["asc-desc"]);
							} else {
								$sql = "SELECT * FROM menu";
							}

							$stmt = $connect -> prepare($sql);
							$stmt -> execute();
							$result = $stmt -> fetchAll();

							foreach($result as $res) { 
								echo "<tr>";
								echo "<td>{$res['id']}</td>";
								echo "<td>{$res['name']}</td>";
								echo "<td>{$res['price']}</td>";
								echo "<td>{$res['category']}</td>";
								echo "<td>{$res['amount']}</td>";
								echo "<td>{$res['imagelink']}</td>";
								echo "<td><a href='?id={$res["id"]}'>Edit</a></td>";
								echo "<td><a href='?id={$res["id"]}&delete=true'>Delete</a></td>";
								echo "</tr>";
							} ?>
							<a href=""></a>
					</table>
				</div>
			</div>
		</main>

		<!--Footer -->
		<?php include_once("includes/footer.php") ?>

		<script src="js/main.js"></script>
	</body>
</html>
