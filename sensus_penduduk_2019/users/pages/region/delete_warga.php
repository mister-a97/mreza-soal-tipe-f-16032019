<?php

	if(isset($_GET['delete_warga'])) {

		$id_warga	= $_GET['delete_warga'];

		$check_region_id    = mysqli_query($connect_db,"SELECT persons.region_id FROM persons WHERE id = $id_warga");
  		$hasil_data     = mysqli_fetch_array($check_region_id);

		mysqli_query($connect_db, "DELETE FROM persons WHERE id = '$id_warga'");

		header('location:index.php?id_region='.$hasil_data['region_id'].'&success_delete');
	}

?>