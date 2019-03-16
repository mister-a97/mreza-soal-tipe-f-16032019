<?php

  $id_warga = $_GET['update_warga'];

  $check_warga    = mysqli_query($connect_db,"SELECT * FROM persons WHERE id = $id_warga");
  $hasil_data     = mysqli_fetch_array($check_warga);

  if(isset($_POST['update_data'])) {

    $id_region         = $_POST['id_region'];
    $id_warga          = $_POST['id_warga'];
    $nama_warga        = $_POST['nama_warga'];
    $alamat            = $_POST['alamat'];
    $income            = $_POST['income'];
    $date_time         = date('Y-m-d H:i:s');

    if($nama_warga != '' && $alamat != '' && $income != '') {

      mysqli_query($connect_db,
        "UPDATE persons SET name = '$nama_warga', address = '$alamat', income = '$income' 
        WHERE id = '$id_warga'");

      header('location:index.php?id_region='.$id_region.'&success_update');
    
    } else {

      header('location:index.php?update_warga='.$id_warga.'&error');
      
    }
  }

?>

<?php if(isset($_GET['error'])) {?>

  <div class="alert alert-danger" role="alert">
    Nama, Alamat dan Income harus di isi untuk mengupdate data warga
  </div>

<?php } ?>

<h2>Update Data Warga</h2>

<form method="post">
    
    <div class="form-group">
       <label>Nama Warga</label>
       <input type="text" name="nama_warga" class="form-control" placeholder="Nama warga" value="<?php echo $hasil_data['name'];?>">
    </div>
    
    <div class="form-group">
       <label>Address</label>
       <input type="text" name="alamat" class="form-control" placeholder="Alamat warga" value="<?php echo $hasil_data['address'];?>">
    </div>
    
    <div class="form-group">
       <label>Income</label>
       <input type="text" name="income" class="form-control" placeholder="Income" value="<?php echo $hasil_data['income'];?>">
    </div>
    
    <button type="submit" name="update_data" class="btn btn-warning mb-2">Update Data</button>
    <input type="hidden" name="id_warga" value="<?php echo $hasil_data['id']?>">
    <input type="hidden" name="id_region" value="<?php echo $hasil_data['region_id']?>">

</form>

<a href="index.php?id_region=<?php echo $hasil_data['region_id'] ?>">Klik untuk melihat daftar warga lainnya</a>