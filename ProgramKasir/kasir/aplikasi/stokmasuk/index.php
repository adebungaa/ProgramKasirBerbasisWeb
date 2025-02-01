<?php 

include 'sesi.php';
$modul = (isset($_GET['s']))?$_GET['s']:"transaksi";
$nama_app = "Kelompok2B : Kasir -";
switch ($modul) {
	case 'title': default: $judul = "$nama_app Stok Masuk"; include 'title.php'; break;
}

?>