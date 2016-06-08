<html>
<head>
	
<body>
		
	<h2> Detail Tamu <?php echo $repository['nama_barang'];?></h2>
	<hr>

	<table>
		<tr>
			<td>No</td>
			<td>:</td>
			<td><?php echo $repository['id'];?></td>
		</tr>

		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><?php echo $repository['nama_barang'];?></td>
		</tr>

		<tr>
			<td>Jenis Barang</td>
			<td>:</td>
			<td><?php echo $repository['jenis_barang'];?></td>
		</tr>

		<tr>
			<td colspan="3">
				<center>
					<a href="<?php echo site_url('web');?>">
						Back
					</a>
				</center>
			</td>
		</tr>
		
	</table>

</body>

</head>
</html>