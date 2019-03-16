<?php
	
	$daftar_region	= mysqli_query($connect_db, "SELECT * FROM regions ORDER BY id ASC");

	if(isset($_POST['tambah_region'])) {

		$region 	= $_POST['nama_region'];
		$date_time	= date('Y-m-d H:i:s');

		$duplicate_region	= mysqli_query($connect_db, "SELECT * FROM regions WHERE name = '$region'");

		$check_duplicate	= mysqli_num_rows($duplicate_region);

		if($check_duplicate > 0) {

			header('location:index.php?daftar_region&duplicate_region');
		
		} else {

			if($region != '') {
				
				mysqli_query($connect_db,"INSERT INTO regions VALUES('','$region','$date_time')");
				header('location:index.php?daftar_region&success');
			
			} else {

				header('location:index.php?daftar_region&error');
			}
		
		}	
	}

?>

<?php if(isset($_GET['error'])) {?>

  <div class="alert alert-danger" role="alert">
    Harap mengisi nama region untuk menambahkan.
  </div>

<?php } else if(isset($_GET['success'])) {?>

  <div class="alert alert-success" role="alert">
    Anda berhasil menambahkan region baru. Untuk melihat daftar-daftar region lainnya bisa <a href="index.php?daftar_region">klik di sini</a>
  </div>

<?php } else if(isset($_GET['duplicate_region'])) {?>

  <div class="alert alert-danger" role="alert">
    Nama region sudah terdaftar. Silahkan check nama region yang belum terdaftar dengan <a href="index.php?daftar_region">klik di sini.</a>
  </div>

<?php } else if(isset($_GET['delete'])) {?>

  <div class="alert alert-success" role="alert">
    Region berhasil dihapus.
  </div>

<?php } else if(isset($_GET['updated'])) {?>

  <div class="alert alert-success" role="alert">
    Region berhasil diupdate.
  </div>

<?php } ?>

<h2>Tambah Region</h2>
<form method="post">
    <div class="form-group">
       <label for="NamaRegion">Nama Region</label>
       <input type="text" name="nama_region" class="form-control" id="EmailAddress" aria-describedby="emailHelp" placeholder="Nama region">
    </div>
    <button type="submit" name="tambah_region" class="btn btn-primary mb-4">Tambah Region</button>
</form>

<h2>Daftar Region</h2>
<table class="table text-center">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Region</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>

  	<?php if(mysqli_num_rows($daftar_region) > 0) { ?>
  		<?php $no = 1;?>
  		<?php while($nama_region = mysqli_fetch_array($daftar_region)) {?>
    <tr>
      <th scope="row"><?php echo $no;?></th>
      <td><a href="index.php?id_region=<?php echo $nama_region['id']; ?>"><?php echo $nama_region['name'];?></a></td>
      <td><a href="index.php?update_region=<?php echo $nama_region['id'];?>" class="text-dark btn btn-warning">Update</a></td>
      <td><a href="index.php?delete_region=<?php echo $nama_region['id'];?>" class="text-light btn btn-danger">Delete</a></td>
    </tr>

		<?php $no++; } ?>
	<?php } ?>

</table>
