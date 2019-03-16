<?php

	if(isset($_GET['delete_region'])) {

		$id_region		= $_GET['delete_region'];

		

		$check_warga 	= mysqli_query($connect_db, "SELECT * FROM persons WHERE persons.region_id = '$id_region'");
		$total_warga	= mysqli_num_rows($check_warga);

		if($total_warga > 0) {

			mysqli_query($connect_db, "DELETE persons.*, regions.* FROM persons, regions 
			WHERE persons.region_id = '$id_region' AND regions.id = '$id_region'");

		} else {

			mysqli_query($connect_db, "DELETE FROM regions WHERE regions.id = '$id_region'");

		}

		header('location:index.php?daftar_region&delete');

	}

?>