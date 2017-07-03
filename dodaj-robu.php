<?php include('partials/head.php'); ?>
<body>
	<?php include('partials/header.php'); ?>
	<div class="wrapper">
		<h1>Dodavanje robe</h1>
		<form action="" method="POST">
			<select name="magacin">
				<?php
				$sql = "SELECT * FROM Magacin";
				$result = mysqli_query($conn, $sql);

				if (mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_assoc($result)) {
						?>
						<option value="<?php echo $row['ID']; ?>"><?php echo $row['Naziv']; ?></option>
						<?php
					}
				} else {
					echo "Trenutno nema nijedan magacin";
				}

				// mysqli_close($conn);
				?>
			</select><br><br>
			<input type="text" name="naziv" id="naziv" placeholder="Naziv..."><br><br>
			<input type="number" name="kolicina" id="kolicina" placeholder="Kolicina..."><br><br>
			<button type="submit">Sačuvaj</button>
		</form>
		<?php 
		if (!empty($_POST['naziv']) && !empty($_POST['kolicina'])) {
			if (isset($_POST['naziv']) && isset($_POST['kolicina'])) {

				$magacin_id = $_POST['magacin'];
				$naziv = mysqli_real_escape_string($conn, $_POST['naziv']);
				$kolicina = mysqli_real_escape_string($conn, $_POST['kolicina']);

				$sql = "
				INSERT INTO 
				Roba (Magacin_ID, Naziv, Kolicina) 
				values 
				($magacin_id, '$naziv', $kolicina)";

				if (mysqli_query($conn, $sql)) {
					echo "<p>Nova roba je dodata u bazu</p>";
				} else {
					echo "Greška: " . $sql . "<br>" . mysqli_error($conn);
				}

				mysqli_close($conn);
			}
		}
		?>
	</div>
</body>
</html>