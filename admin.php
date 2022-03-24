<?php include_once("connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>New York Pizza | Admin</title>
	</head>

	<body>
		<!-- Header -->
		<?php include_once("header.php") ?>

		<!-- Main -->
		<main class="long">
			<div class="admin-panel">
				<div class="panel">
					<!-- Sorting Options -->
					<form action="admin.php" method="post">
						<label for="sort-by">Sort by: </label>
						<select name="sort-by">
							<option value="ID">ID</option>
							<option value="Name">Name</option>
							<option value="Price">Price</option>
							<option value="Category">Category</option>
							<option value="Amount">Amount</option>
						</select>
						<br>
						<input type="radio" id="asc" name="asc-desc" value="asc">
						<label for="asc">Ascending</label>
						<br>
						<input type="radio" id="desc" name="asc-desc" value="desc">
						<label for="desc">Descending</label>
						<br>

						<input type="submit" class="button" name="sort" value="Go" />
					</form>

					<br><br><br>

					<!-- Create items -->
					<form action="admin.php" method="post">
						<label for="item-id">ID: </label>
						<input type="text" name="item-id" placeholder="12, laat leeg voor automatisch">
						<br>
						<label for="item-name">Name: </label>
						<input type="text" name="item-name" placeholder="Cola">
						<br>
						<label for="item-photo">Photo: </label>
						<input type="file" name="item-photo" accept=".png, .jpg, .jpeg">
						<br>
						<label for="item-price">Prijs: </label>
						<input type="text" name="item-price" placeholder="1.99">
						<br>
						<label for="item-category">Categorie: </label>
						<input type="text" name="item-category" placeholder="Drinken">
						<br>

						<input type="submit" class="button" name="create" value="Toevoegen" />
					</form>
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
						</tr>

						<?php
							$sql = "SELECT * FROM menu";
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
								echo "</tr>";
							} ?>
					</table>
				</div>
			</div>
		</main>

		<!--Footer -->
		<?php require_once("footer.php") ?>

		<script src="js/main.js"></script>
	</body>
</html>
