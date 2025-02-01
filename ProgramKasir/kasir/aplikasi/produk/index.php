<?php 

include 'sesi.php';
$modul = (isset($_GET['s']))?$_GET['s']:"transaksi";
$nama_app = "Kelompok2B : Kasir -";
switch ($modul) {
	case 'title': $judul = "$nama_app Produk"; include 'title.php'; break;
	default:
		break;
}
?>