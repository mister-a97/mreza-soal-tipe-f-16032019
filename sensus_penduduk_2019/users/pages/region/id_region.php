<?php

  $id_region = $_GET['id_region'];

  $region_warga = mysqli_query($connect_db, "SELECT regions.name as nama_region, persons.* 
    FROM regions, persons 
    WHERE persons.region_id = $id_region AND regions.id = $id_region"
  );

  $nama_region = mysqli_query($connect_db,"SELECT regions.name as nama_region FROM regions 
    WHERE regions.id = $id_region");
  $hasil_nama  = mysqli_fetch_array($nama_region);

   if(isset($_POST['tambah_warga'])) {

    $id_region_warga   = $id_region;
    $nama_warga        = $_POST['nama_warga'];
    $alamat            = $_POST['alamat'];
    $income            = $_POST['income'];
    $date_time         = date('Y-m-d H:i:s');

    if($nama_warga != '' && $alamat != '' && $income != '') {

      mysqli_query($connect_db,"INSERT INTO persons 
        VALUES('','$nama_warga','$id_region_warga', '$alamat', '$income', '$date_time')");
      
      header('location: index.php?id_region='.$id_region.'&success');
    
    } else {

      header('location:index.php?id_region='.$id_region.'&error');
    }
  }

?>

<?php if(isset($_GET['error'])) {?>

  <div class="alert alert-danger" role="alert">
    Nama, Alamat dan Income harus di isi untuk menambahkan data warga
  </div>

<?php } else if(isset($_GET['success'])) {?>

  <div class="alert alert-success" role="alert">
    Anda berhasil menambahkan data warga
  </div>

<?php } else if(isset($_GET['success_update'])) {?>

  <div class="alert alert-success" role="alert">
    Anda berhasil mengupdate data warga
  </div>

<?php } else if(isset($_GET['success_delete'])) {?>

  <div class="alert alert-success" role="alert">
    Anda berhasil menghapus data
  </div>

<?php } ?>

<h2>Tambah Data Warga</h2>
<form method="post">
    <div class="form-group">
       <label>Nama Warga</label>
       <input type="text" name="nama_warga" class="form-control" placeholder="Nama warga">
    </div>
    <div class="form-group">
       <label>Address</label>
       <input type="text" name="alamat" class="form-control" placeholder="Alamat warga">
    </div>
    <div class="form-group">
       <label>Income</label>
       <input type="text" name="income" class="form-control" placeholder="Income">
    </div>
    <button type="submit" name="tambah_warga" class="btn btn-primary mb-2">Tambah Data</button>
</form>


<h2 class="mb-3">Warga yang tinggal di <?php echo $hasil_nama['nama_region']?></h2>
<table class="table text-center">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Warga</th>
      <th scope="col">Region</th>
      <th scope="col">Alamat</th> 
      <th scope="col">Income</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>

    <?php if(mysqli_num_rows($region_warga) > 0) { ?>
      <?php $no = 1;?>
      <?php while($data_warga = mysqli_fetch_array($region_warga)) {?>
    
    <tr>
      <th scope="row"><?php echo $no;?></th>
      <td><?php echo $data_warga['name'];?></td>
      <td><?php echo $data_warga['nama_region'];?></td>
      <td><?php echo $data_warga['address'];?></td>
      <td>Rp <?php echo number_format($data_warga['income'],0,',','.');?></td>
      <td><a href="index.php?update_warga=<?php echo $data_warga['id'];?>" class="text-dark btn btn-warning">Update</a></td>
      <td><a href="index.php?delete_warga=<?php echo $data_warga['id'];?>" class="text-light btn btn-danger">Delete</a></td>
    </tr>

    <?php $no++; } ?>
  <?php } ?>

</table>

<a href="index.php?daftar_region">Klik untuk melihat daftar region lainnya</a>