<?php 

include 'sesi.php';
$modul = (isset($_GET['s']))?$_GET['s']:"transaksi";
$nama_app = "Kelompok2B : Kasir -";
switch ($modul) {
	case 'pelanggan': default: $judul = "$nama_app Pelanggan"; include 'title.php'; break;			
}
?>