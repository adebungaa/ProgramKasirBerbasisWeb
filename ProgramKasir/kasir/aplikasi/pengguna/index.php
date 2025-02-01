<?php 
include 'sesi.php';
$modul = (isset($_GET['s']))?$_GET['s']:"transaksi";
$nama_app = "Kelompok2B : Kasir -";
switch ($modul) {
	case 'title': default: include 'title.php'; break;
	case 'detail': $judul = "$nama_app Pengaturan"; include 'detail.php'; break;		
}
?>