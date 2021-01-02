<?php 

if($_SESSION['id_level']=="3"){
	echo '<script language="javascript">alert("Selain Admin Dan Operator Tidak Bisa Melakukan Aksi Ini !"); document.location="index.php?page=home";</script>';
}
else
{
	include ("config/database.php");
	date_default_timezone_set('Asia/Jakarta');
	$id_transaksi 	= $_GET['id_transaksi'];
	$id_barang 	= $_GET['id_barang'];
	$jumlah 	= $_GET['jumlah'];
	$kembali		= date("Y-m-d h:i");
	$ambil=mysqli_query($mysqli, "SELECT * FROM transaksi WHERE ID_TRANSAKSI = '$id_transaksi'");
	$hasil=mysqli_fetch_array($ambil);
	$status = $hasil['STATUS_TRANSAKSI'];
	if($status == 'Kembali'){
		?> 
		<script language="JavaScript">
			document.location='index.php?page=transaksi&alert=7'; 
		</script> 
		<?php 
	}else if($status == 'Keluar'){
		$query = mysqli_query($mysqli, "UPDATE transaksi SET TANGGAL_TRANSAKSI='$masuk', STATUS_TRANSAKSI='Masuk' where ID_TRANSAKSI = '$id_transaksi'")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
		$query2	= mysqli_query($mysqli, "UPDATE barang SET JUMLAH=(JUMLAH+$jumlah) WHERE ID_BARANG='$id_barang' ")or die('Ada kesalahan pada query insert: '.mysqli_error($mysqli));
		if($query&&$query2) 
		{ 
			?> 
			<script language="JavaScript">
				document.location='index.php?page=transaksi&alert=6';
			</script> 
			<?php 
		}
	}else 
	{
		echo "Terjadi Kesalahan";
	}
}