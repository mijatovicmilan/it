<?php include('partials/head.php'); ?>
<body>
	<?php include('partials/header.php'); ?>
	<?php 
		$id = (int)$_REQUEST['id'];

		$sql = "SELECT * FROM Magacin WHERE ID=$id";

		$result = mysqli_query($conn, $sql);

		if (!mysqli_num_rows($result) > 0) {
		     die("Ne postoji izabrani magacin");
		} 

		$magacin = mysqli_fetch_object($result);
	?>
	 <div class="wrapper">
	 	<form action="" method="POST">
	 		<label>Naziv:</label>
			<input type="text" name="naziv" id="naziv" value="<?php echo $magacin->Naziv ?>"><br><br>
			<label>Lokacija:</label>
			<input type="text" name="lokacija" id="lokacija" value="<?php echo $magacin->Lokacija ?>"><br><br>
			<button type="submit">Sačuvaj</button>
		</form>

		<?php 
		if (!empty($_POST['naziv']) && !empty($_POST['lokacija'])) {
			if (isset($_POST['naziv']) && isset($_POST['lokacija'])) {
				$naziv = mysqli_real_escape_string($conn, $_POST['naziv']);
				$lokacija = mysqli_real_escape_string($conn, $_POST['lokacija']);

				$sql = "UPDATE Magacin SET Naziv='$naziv', Lokacija='$lokacija' WHERE ID=$id";

				$res = mysqli_query($conn, $sql);

				if(!$res) {
					die(mysql_error($conn));
				}
				
				mysqli_close($conn);
			}
		}
		?>
	 </div>
</body>
</html>