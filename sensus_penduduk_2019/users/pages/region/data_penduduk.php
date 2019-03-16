<?php

	$all_region 	= mysqli_query($connect_db, "SELECT * FROM regions");

	if(isset($_POST['filter'])) {

		$pilihan	= $_POST['pilihan'];

		header("location:index.php?data_penduduk&filter_data=".$pilihan);
	}


?>

<h2>Data Penduduk</h2>

<p>Filter Data Berdasarkan Region</p>

<form method="post">

	<select name="pilihan">
		<option value="all">Semua Region</option>
		<?php if(mysqli_num_rows($all_region) > 0) {?>
			<?php while ($hasil_region = mysqli_fetch_array($all_region)) { ?>
				<option value="<?php echo $hasil_region['id']?>"> <?php echo $hasil_region['name']?> </option>
			<?php } ?>
		<?php } ?>
	</select>

	<input type="submit" name="filter" value="Filter" class="btn btn-info">

</form>