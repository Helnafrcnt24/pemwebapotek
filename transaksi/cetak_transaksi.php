<?php 
include '../../session.php';
if($_SESSION['id_level']=="3"){
	echo '<script language="javascript">alert("Selain Admin Tidak Bisa Mengakses Halaman Ini"); document.location="../../index.php?page=home";</script>';
}
elseif ($_SESSION['id_level']=="2") {
	echo '<script language="javascript">alert("Selain Admin Tidak Bisa Mengakses Halaman Ini"); document.location="../../index.php?page=home";</script>';
}

else { ?>


<?php
include ("config/database.php");
header("Content-type: application/vnd.ms-word");
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=data transaksi.pdf");
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
		$query=mysqli_query($mysqli, "SELECT detail_transaksi.*, transaksi.*, barang.* FROM detail_transaksi
			LEFT JOIN transaksi ON transaksi.ID_TRANSAKSI=detail_transaksi.ID_TRANSAKSI
			LEFT JOIN barang ON barang.ID_BARANG=detail_transaksi.ID_BARANG")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli)); 

		while ($data = mysqli_fetch_assoc($query)) {
			?>
			<tr>
				<td><?php echo $data['ID_PEMINJAMAN']?></td>
				<td><?php echo $data['TANGGAL_PINJAM']?></td>
				<td><?php echo $data['ID_DETAIL_PINJAM']?></td>
				<td><?php echo $data['STATUS_PEMINJAMAN']?></td>
				<td><?php echo $data['NAMA']?></td>
				<td><?php echo $data['JUMLAH']?></td>
				<td><?php echo $data['NAMA_PEGAWAI']?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<!-- END DATA TABLE -->


	<?php } ?>

