<?php include('partials/head.php'); ?>
<body>
	<?php include('partials/header.php'); ?>
	<div class="wrapper">
		<h1>Dodavanje robe</h1>
		<form action="#" method="POST">
			<input type="text" name="naziv" id="naziv" placeholder="Naziv..."><br><br>
			<input type="text" name="lokacija" id="lokacija" placeholder="Lokacija..."><br><br>
			<button type="submit">Sačuvaj</button>
		</form>
		<?php 
		if (!empty($_POST['naziv']) && !empty($_POST['lokacija'])) {
			if (isset($_POST['naziv']) && isset($_POST['lokacija'])) {
				$naziv = mysqli_real_escape_string($conn, $_POST['naziv']);
				$lokacija = mysqli_real_escape_string($conn, $_POST['lokacija']);

				$sql = "
				INSERT INTO 
				Magacin (Naziv, Lokacija) 
				values 
				('$naziv', '$lokacija')";

				if (mysqli_query($conn, $sql)) {
					echo "<p>Novi magacin je dodat u bazu</p>";
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