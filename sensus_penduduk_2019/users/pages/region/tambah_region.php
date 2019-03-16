<?php

	if(isset($_POST['tambah_region'])) {

		$region 	= $_POST['nama_region'];
		$date_time	= date('Y-m-d H:i:s');

		$duplicate_region	= mysqli_query($connect_db, "SELECT * FROM regions WHERE name = '$region'");
		$check_duplicate	= mysqli_num_rows($duplicate_region);

		if($check_duplicate > 0) {

			header('location:index.php?tambah_region&duplicate_region');
		
		} else {

			if($region != '') {
				
				mysqli_query($connect_db,"INSERT INTO regions VALUES('','$region','$date_time')");
				header('location:index.php?tambah_region&success');
			
			} else {

				header('location:index.php?tambah_region&error');
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
<?php }?>

<h2>Tambah Region</h2>
<form method="post">
    <div class="form-group">
       <label for="NamaRegion">Nama Region</label>
       <input type="text" name="nama_region" class="form-control" id="EmailAddress" aria-describedby="emailHelp" placeholder="Nama region">
    </div>
    <button type="submit" name="tambah_region" class="btn btn-primary mb-2">Tambah Region</button>
</form>
