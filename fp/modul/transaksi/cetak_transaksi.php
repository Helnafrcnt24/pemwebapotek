<?php
include ("config/database.php");
header("Content-type: application/vnd.ms-word");
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=data transaksi.doc");
header("Pragma: no-cache");
header("Expires: 0");
header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); //always modified
?>	

<table align="center" border="0" cellpadding="0" cellspacing="0">
	<h3 align="center"><font color="black">Data Apotek</font></h3>
	<table border="1" align="center" cellpadding="5" cellspacing="0">
		<tr>
			<th>ID Transaksi</th>
			<th>Tanggal Transaksi</th>
			<th>ID Detail Transaksi</th>
			<th>Status Transaksi</th>
			<th>Nama</th>
			<th>Jumlah</th>
			<th>Nama Petugas</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$query=mysqli_query($mysqli, "SELECT * FROM transaksi ORDER BY ID_TRANSAKSI DESC")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli)); 

		while ($data = mysqli_fetch_assoc($query)) {
			?>
			<tr>
				<td><?php echo $data['ID_TRANSAKSI']?></td>
				<td><?php echo $data['TANGGAL_TRANSAKSI']?></td>
				<td><?php echo $data['STATUS_TRANSAKSI']?></td>
				<td><?php echo $data['NAMA']?></td>
				<td><?php echo $data['JUMLAH']?></td>
				<td><?php echo $data['NAMA_PETUGAS']?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<?php ?>
	
	<!-- END DATA TABLE -->