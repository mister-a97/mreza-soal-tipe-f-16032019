<?php

	$pendapatan_region = mysqli_query($connect_db, 
		"SELECT regions.name as nama_region,
		SUM(persons.income) as total_pendapatan,
		COUNT(persons.name) as total_warga,
		SUM(persons.income) / COUNT(persons.name) as rata_rata
		FROM regions, persons WHERE regions.id = persons.region_id GROUP BY regions.id, persons.region_id"
	);

?>

<h2>Daftar Seluruh Pendapatan Masing-masing Region</h2>

<table class="table text-center">
  <thead class="thead-dark">

    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Region</th>
      <th scope="col">Jumlah Penduduk</th>
      <th scope="col">Total Pendapatan</th>
      <th scope="col">Rata-rata Pendapatan</th>
      <th scope="col">Status</th>
    </tr>
  
  </thead>
  <tbody>

  	<?php if(mysqli_num_rows($pendapatan_region) > 0) {?>
		<?php $no = 1;?>
			<?php while($hasil_data = mysqli_fetch_array($pendapatan_region)) {?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $hasil_data['nama_region']?></td>
					<td><?php echo $hasil_data['total_warga']?> Orang</td>
					<td>Rp <?php echo number_format($hasil_data['total_pendapatan'],0,',','.')?></td>
					<td>Rp <?php echo number_format($hasil_data['rata_rata'],0,',','.')?></td>
					<?php if($hasil_data['rata_rata'] >= 2200000) {?>
						<td class="text-success">Hijau</td>
					<?php } else if($hasil_data['rata_rata'] < 2200000 && $hasil_data['rata_rata'] > 1700000) {?>
						<td class="text-warning">Kuning</td>
					<?php } else if($hasil_data['rata_rata'] <= 1700000) {?>
						<td class="text-danger">Merah</td>
					<?php }?>
				</tr>
			<?php $no++;}?>
  	<?php } ?>

</table>

<div class="text-center">
	<p><span class="text-success">Hijau</span> rata- rata pendapatan > 2.200.000</p>
	<p><span class="text-warning">Kuning</span> rata- rata pendapatan > 1.700.000 dan < 2.200.000</p>
	<p><span class="text-danger">Merah</span> rata- rata pendapatan < 1.700.000</p>
</div>