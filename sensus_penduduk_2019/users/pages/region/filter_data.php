<?php
	
	$pilihan = $_GET['filter_data'];

	if($pilihan == "all") {

		$filter_data = mysqli_query($connect_db, "SELECT regions.name as nama_region, persons.* 
      FROM regions, persons 
      WHERE persons.region_id = regions.id"
    );
	
	} else {

		$filter_data = mysqli_query($connect_db, "SELECT regions.name as nama_region, persons.* 
      FROM regions, persons 
      WHERE persons.region_id = '$pilihan' AND regions.id = '$pilihan'"
    );

		$nama_region = mysqli_query($connect_db, "SELECT regions.name as nama_region 
      FROM regions 
      WHERE id = '$pilihan'");
		$hasil_data	 = mysqli_fetch_array($nama_region);
    
	}

?>

<?php if($pilihan == "all") {?>
	<h2 class="mb-3">Data Warga untuk Seluruh Region</h2>
<?php } else {?>
	<h2 class="mb-3">Data Warga untuk Region <?php echo $hasil_data['nama_region']?></h2>
<?php }?>

<table class="table mt-3">
  <thead class="thead-dark text-center">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Warga</th>
      <th scope="col">Income</th>
      <th scope="col">Alamat</th> 
      <th scope="col">Region</th>
      <th scope="col">Update</th> 
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody class="text-center">

  	<?php if(mysqli_num_rows($filter_data) > 0) { ?>
  		<?php $no = 1;?>
  		<?php while($hasil_data = mysqli_fetch_array($filter_data)) {?>
    
    <tr>
      <th scope="row"><?php echo $no;?></th>
      <td><?php echo $hasil_data['name'];?></td>
      <td>Rp <?php echo number_format($hasil_data['income'],0,',','.');?></td>
      <td><?php echo $hasil_data['address'];?></td>
      <td><?php echo $hasil_data['nama_region'];?></td>
      <td><a href="index.php?update_warga=<?php echo $hasil_data['id']?>" class="text-dark btn btn-warning">Update</a></td>
      <td><a href="index.php?delete_warga=<?php echo $hasil_data['id']?>" class="text-light btn btn-danger">Delete</a></td>
    </tr>

		<?php $no++; } ?>
	<?php } else { ?>
    <tr>
      <td>
        <p>Data tidak tersedia. <a href="index.php?id_region=<?php echo $pilihan; ?>">Klik di sini untuk menambah data warga berdasarkan regionnya.</a></p>
      </td>
    </tr>
  <?php }?>

</table>