<html>
<head>
	
<body>
	<h2> Ubah Data <?php echo $repository['nama_barang'];?></h2>
	<hr>
	<form action="" method="post">
	<table>
		<tr>
			<td> Nama Barang</td>
			<td>:</td>
			<td><input type="text" name="nama_barang" value="<?php echo $repository['nama_barang'];?>"></td>
		</tr>

		<tr>
			<td> Jenis Barang </td>
			<td>:</td>
			<td><input type="text" name="jenis_barang" value="<?php echo $repository['jenis_barang'];?>"></td>
		</tr>

		<tr>
			<td colspan="3">
				<center>
					<input type="submit" name="ubah" value="Ubah">
				</center>
			</td>
		</tr>
		
	</table>
	</form>

</body>

</head>
</html>