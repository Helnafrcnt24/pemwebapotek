<?php 
if(isset($_GET['page'])){
	$page = $_GET['page'];

	switch ($page) {
		case 'home':
		include "home.php";
		break;

		//admin
		case 'admin':
		include 'home.php';
		break;

		//transaksi
		case 'transaksi':
		include 'modul/transaksi/index.php';
		break;

		case 'tambah_transaksi':
		include 'modul/transaksi/tambah_transaksi2.php';
		break;

		case 'kembali_transaksi':
		include 'modul/transaksi/kembali_transaksi.php';
		break;

		case 'cetak_transaksi':
		include 'modul/transaksi/cetak_transaksi.php';
		break;
		
		default:
		echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
		break;
	}
}else{
	include "home.php";
}

?>