<html>
<head>
<title>Repository Data</title>	
<body>
<center>
	<h1>Repository Data Barang Elektronik</h1>


	<br>
	<h2> Tambah Data </h2>
	<hr>
	<form action="" method="post">
	<table>
		<tr>
			<td>Nama Barang</td>
			<td>:</td>
			<td><input type="text" name="nama_barang"></td>
		</tr>

		<tr>
			<td>Jenis Barang</td>
			<td>:</td>
			<td><input type="text" name="jenis_barang"></td>
		</tr>

		<tr>
			<td colspan="3">
				<center>
					<input type="submit" name="simpan" value="Simpan">
				</center>
			</td>
		</tr>
		
	</table>
	</form>
		
	<h2> List Data Repository </h2>
	<hr>

	<table>
		<tr>
			<th>ID</th>
			<th>Nama Barang</th>
			<th>Jenis Barang</th>
		</tr>

		<?php
		if(!empty($repository)):
			$no=1;
			foreach ($repository as $repository):
		?>
		<tr>
			<td><?php echo $repository['id'];?></td>
			<td><?php echo $repository['nama_barang'];?></td>
			<td><?php echo $repository['jenis_barang'];?></td>
			<td>
				<a href="<?php echo site_url('web/detail/'.$repository['id']);?>">
					Lihat
				</a> | 
				<a href="<?php echo site_url('web/ubah/'.$repository['id']);?>">
					Ubah
				</a> | 
				<a href="<?php echo site_url('web/hapus/'.$repository['id']);?>">
					Hapus
				</a>
			</td>
		</tr>
		<?php
			$no++;
			endforeach;
		endif;
		?>
	</table>

	</center>

</body>

</head>
</html>