<?php

  $id_region   = $_GET['update_region'];

  if(isset($_POST['update'])) {

    $id_update    = $_POST['id_region'];
    $updated_name  = $_POST['nama_region'];
    $date_time    = date('Y-m-d H:i:s');

    if($updated_name != '') {

      mysqli_query($connect_db, "UPDATE regions SET name = '$updated_name' WHERE id = '$id_update'");
    
      header('location:index.php?daftar_region&updated');

    } else {

      header('location:index.php?update_region='.$id_update.'&error');

    }
  }

  $daftar_region  = mysqli_query($connect_db, "SELECT * FROM regions ORDER BY id ASC");

  $update_region  = mysqli_query($connect_db, "SELECT * FROM regions WHERE id = '$id_region'");
  $update_result  = mysqli_fetch_array($update_region);

?>

<?php if(isset($_GET['error'])) {?>

  <div class="alert alert-danger" role="alert">
    Harap mengisi nama region untuk melakukan proses update.
  </div>

<?php } ?>

<h2>Update Region</h2>
<form method="post">
    <div class="form-group">
       <label for="NamaRegion">Nama Region</label>
       <input type="text" name="nama_region" class="form-control" id="EmailAddress" aria-describedby="emailHelp" placeholder="Nama region" value="<?php echo $update_result['name']?>">
    </div>
    <button type="submit" name="update" class="btn btn-primary mb-4">Update Region</button>
    <input type="hidden" name="id_region" value="<?php echo $update_result['id']?>">
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
