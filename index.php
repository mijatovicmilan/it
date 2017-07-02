<?php include('partials/head.php'); ?>
<body>
	<?php include('partials/header.php'); ?>
	 <div class="wrapper" style="text-align: left;">
	 	<?php 
	 		$sql = "SELECT id, Naziv, Lokacija FROM Magacin";
	 		$result = mysqli_query($conn, $sql);

	 		if (mysqli_num_rows($result) > 0) {
	 		    // output data of each row
	 		  	?>
	 		  	<table>
	 		  		<tr>
	 		  			<th>ID</th>
	 		  			<th>Naziv</th>
	 		  			<th>Lokacija</th>
	 		  			<th>#</th>
	 		  			<th>#</th>
	 		  		</tr>
	 		  	<?php
		 		    while($row = mysqli_fetch_assoc($result)) {
		 		        ?>
		 		        	<tr>
		 		        		<td><?php echo $row['id'] ?></td>
		 		        		<td><?php echo $row['Naziv'] ?></td>
		 		        		<td><?php echo $row['Lokacija'] ?></td>
		 		        		<td class="center">
		 		        			<a href="/magacin/izmeni-magacin.php?id=<?php echo $row['id'] ?>">
		 		        				<i class="fa fa-edit" aria-hidden="true"></i>
		 		        			</a>
		 		        		</td>
		 		        		<td class="center">
		 		        			<a href="/magacin/obrisi-magacin.php?id=<?php echo $row['id'] ?>">
		 		        				<i class="fa fa-trash" aria-hidden="true"></i>
		 		        			</a>
		 		        		</td>
		 		        	</tr>
		 		        <?php
		 		    }
		 		?>
		 		</table>
		 		<?php
	 		    
	 		} else {
	 		    echo "Trenutno nema nijedan magacin u bazi";
	 		}

	 		mysqli_close($conn);
	 	?>
	 </div>
</body>
</html>